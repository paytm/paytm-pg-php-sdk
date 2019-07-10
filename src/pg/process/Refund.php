<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\process;

    use Exception;
    use paytmpg\merchant\models\RefundDetail;
    use paytmpg\merchant\models\RefundStatusDetail;
    use paytmpg\merchant\models\SDKResponse;
    use paytmpg\pg\constants\Config;
    use paytmpg\pg\constants\ErrorConstants\ErrorMessage;
    use paytmpg\pg\constants\MerchantProperties;
    use paytmpg\pg\exceptions\SDKException;
    use paytmpg\pg\request\NativeRefundStatusRequest;
    use paytmpg\pg\request\RefundInitiateRequest;
    use paytmpg\pg\request\RefundInitiateRequestBody;
    use paytmpg\pg\request\SecureRequestHeader;
    use paytmpg\pg\response\AsyncRefundResponse;
    use paytmpg\pg\response\AsyncRefundResponseBody;
    use paytmpg\pg\response\NativeRefundStatusResponse;
    use paytmpg\pg\response\NativeRefundStatusResponseBody;
    use paytmpg\pg\utils\CommonUtil;
    use paytmpg\pg\utils\EncDecUtil;
    use paytmpg\pg\utils\JSONUtil;
    use paytmpg\pg\utils\LoggingUtil;
    use Psr\Log\LogLevel;

    /**
     *
     * This class is used to handle all the Refund calls, validate them and create request object
     * and make respective function calls after setting signature, if required.
     *
     * Class Refund
     * @package Paytm\pg\process
     */
    class Refund
    {
        /**
         * This method gets RefundDetail object as parameter and creates request object to call process method of Request class.
         * It returns SDKResponse which holds initiateRefund result parameters which will be used by merchant.
         * Also, it can hold error message and other relevant information in case an exception occurs.
         *
         * @param RefundDetail
         * @return SDKResponse
         * @throws Exception
         */
        public static function initiateRefund($refundDetail)
        {
            if ($refundDetail instanceof RefundDetail) {
                try {
                    Config::$requestId= CommonUtil::getUniqueRequestId();
                    if (!MerchantProperties::$isInitialized) {
                        LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "MerchantProperties are not initialized ");
                        return CommonUtil::getSDKResponse(SDKException::getMerchantPropertyInitializationException(),
                            new AsyncRefundResponse(null, new AsyncRefundResponseBody()));
                    }

                    LoggingUtil::addLog(LogLevel::INFO, __CLASS__, sprintf("In doRefund RefundDetail %s ", print_r($refundDetail, true)));

                    self::validateRefundDetailObject($refundDetail);
                    $request = self::createRefundInitiateRequest($refundDetail);

                    $requestHead = $request->getHead();
                    $requestBody = $request->getBody();
                    self::setSignature($requestHead, $requestBody);

                    return Request::process($request, MerchantProperties::getRefundUrl(), 'paytmpg\pg\response\AsyncRefundResponse',
                        $refundDetail->getReadTimeout(), MerchantProperties::getConnectionTimeout());

                } catch (Exception $e) {
                    LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "Caught exception in doRefund, exception object: " . print_r($e->getMessage()));
                    return CommonUtil::getSDKResponse($e, new AsyncRefundResponse(null, new AsyncRefundResponseBody()));
                }
            } else {
                $e = SDKException::getSDKException('In initiateRefund, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
                return CommonUtil::getSDKResponse($e, new AsyncRefundResponse(null, new AsyncRefundResponseBody()));
            }
        }

        /**
         * setSignature sets the signature in head(SecureRequestHeader), signature will be generated using the body.
         *
         * @param SecureRequestHeader
         * @param RefundInitiateRequestBody
         * @throws Exception
         */
        private static function setSignature($head, $body)
        {
            if ($head instanceof SecureRequestHeader) {
                $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
                $formattedJsonBody = JSONUtil::formatJson($jsonBody);
                $signature = EncDecUtil::generateSignature($formattedJsonBody, MerchantProperties::getMerchantKey());
                $head->setSignature($signature);
            } else {
                throw SDKException::getSDKException('In setSignature, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
            }
        }

        /**
         * @param RefundDetail
         * @return RefundInitiateRequest
         * @throws Exception
         */
        private static function createRefundInitiateRequest($refundDetail)
        {
            if ($refundDetail instanceof RefundDetail) {
                $head = CommonUtil::getSecureRequestHeader(MerchantProperties::getClientId(), null);
                $body = $refundDetail->createRefundInitiateRequestBody();

                $request = new RefundInitiateRequest();
                $request->setHead($head);
                $request->setBody($body);
                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, sprintf(" RefundInitiateRequest object %s ", print_r($request, true)));

                return $request;
            } else {
                throw SDKException::getSDKException('In createRefundInitiateRequestWithRefundDetail' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
            }
        }

        /**
         * validateRefund checks if all mandatory parameters are present for Refund api call.
         * If not, this will throw an object of SDKException
         *
         * @param RefundDetail
         * @throws Exception
         */
        private static function validateRefundDetailObject($refundDetail)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, sprintf("validateRefundDetailObject for object: %s ", print_r($refundDetail, true)));

            if ($refundDetail instanceof RefundDetail) {
                if (CommonUtil::checkStringForEmptyOrNull($refundDetail->getOrderId())
                    || CommonUtil::checkStringForEmptyOrNull($refundDetail->getRefId())
                    || CommonUtil::checkStringForEmptyOrNull($refundDetail->getTxnId())
                    || CommonUtil::checkStringForEmptyOrNull($refundDetail->getRefundAmount())) {

                    LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "validateRefundDetailObject returns false ");
                    throw SDKException::getMissingMandatoryParametersException();
                }
            } else {
                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "In validateRefundDetailObject, " . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM);
                throw SDKException::getSDKException('In validateRefundDetailObject, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
            }
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "validateRefundDetailObject returns true ");
        }

        /**
         * This method gets RefundStatusDetail object as parameter, creates request object to call process method of Request class.
         * It returns SDKResponse which contains getRefundStatus result parameters which will be used by merchant.
         * Also, it can hold error message and other relevant information in case an exception occurs.
         *
         * @param RefundStatusDetail object containing data regarding refund status
         * @return SDKResponse containing response string from api hit and response object
         * @throws Exception
         */
        public static function getRefundStatus($refundStatusDetail)
        {
            if ($refundStatusDetail instanceof RefundStatusDetail) {
                try {
                    Config::$requestId= CommonUtil::getUniqueRequestId();
                    if (!MerchantProperties::$isInitialized) {
                        LoggingUtil::addLog(LogLevel::INFO, __CLASS__, " MerchantProperties are not initialized ");
                        return CommonUtil::getSDKResponse(SDKException::getMerchantPropertyInitializationException(),
                            new NativeRefundStatusResponse(null, new NativeRefundStatusResponseBody()));
                    }

                    LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "In getRefundStatus, RefundStatusDetail: %s " . print_r($refundStatusDetail, true));

                    self::validateRefundStatusDetailObject($refundStatusDetail);
                    $request = self::createRefundStatusRequest($refundStatusDetail);

                    $requestHead = $request->getHead();
                    $requestBody = $request->getBody();
                    self::setSignature($requestHead, $requestBody);

                    return Request::process($request, MerchantProperties::getRefundStatusUrl(),
                        'paytmpg\pg\response\NativeRefundStatusResponse', $refundStatusDetail->getReadTimeout(), MerchantProperties::getConnectionTimeout());

                } catch (Exception $e) {
                    LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, "Caught exception in getRefundStatus: " . print_r($e->getMessage(), true));
                    return CommonUtil::getSDKResponse($e, new NativeRefundStatusResponse(null, new NativeRefundStatusResponseBody()));
                }
            } else {
                $e = SDKException::getSDKException('In getRefundStatus, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
                return CommonUtil::getSDKResponse($e, new NativeRefundStatusResponse(null, new NativeRefundStatusResponseBody()));
            }
        }

        /**
         * @param RefundStatusDetail $refundStatusDetail
         * @return NativeRefundStatusRequest
         * @throws Exception
         */
        private static function createRefundStatusRequest($refundStatusDetail)
        {
            if ($refundStatusDetail instanceof RefundStatusDetail) {
                $head = CommonUtil::getSecureRequestHeader(MerchantProperties::getClientId(), null);
                $body = $refundStatusDetail->createNativeRefundStatusRequestBody();
                $request = new NativeRefundStatusRequest($head, $body);
                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "NativeRefundStatusRequest object %s " . print_r($request, true));
                return $request;
            } else {
                throw SDKException::getSDKException('In createRefundInitiateRequestWithRefundDetail' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
            }
        }

        /**
         * validateRefundStatusDetailObject checks if all mandatory parameters are present for Payment Status api call.
         * If not, then is will throw an object of SDKException.
         *
         * @param RefundStatusDetail
         * @throws Exception
         */
        private static function validateRefundStatusDetailObject($refundStatusDetail)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "validateRefundStatusDetailObject for request: %s " . print_r($refundStatusDetail, true));

            if ($refundStatusDetail instanceof RefundStatusDetail) {
                if (CommonUtil::checkStringForEmptyOrNull($refundStatusDetail->getOrderId())
                    || CommonUtil::checkStringForEmptyOrNull($refundStatusDetail->getRefId())) {
                    LoggingUtil::addLog(LogLevel::INFO, __CLASS__, " validateRefundStatusDetailObject returns false ");
                    throw SDKException::getMissingMandatoryParametersException();
                }
            } else {
                throw SDKException::getSDKException('In validateRefundStatusDetailObject, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
            }
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, " validateRefundStatusDetailObject returns true ");
        }
    }
