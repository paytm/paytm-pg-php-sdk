<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\process;

    use Exception;
    use paytmpg\merchant\models\PaymentDetail;
    use paytmpg\merchant\models\PaymentStatusDetail;
    use paytmpg\merchant\models\SDKResponse;
    use paytmpg\pg\constants\Config;
    use paytmpg\pg\constants\ErrorConstants\ErrorMessage;
    use paytmpg\pg\constants\LibraryConstants;
    use paytmpg\pg\constants\MerchantProperties;
    use paytmpg\pg\exceptions\SDKException;
    use paytmpg\pg\models\Money;
    use paytmpg\pg\models\UserInfo;
    use paytmpg\pg\request\InitiateTransactionRequest;
    use paytmpg\pg\request\InitiateTransactionRequestBody;
    use paytmpg\pg\request\NativePaymentStatusRequest;
    use paytmpg\pg\request\NativePaymentStatusRequestBody;
    use paytmpg\pg\request\SecureRequestHeader;
    use paytmpg\pg\response\InitiateTransactionResponse;
    use paytmpg\pg\response\InitiateTransactionResponseBody;
    use paytmpg\pg\response\NativePaymentStatusResponse;
    use paytmpg\pg\response\NativePaymentStatusResponseBody;
    use paytmpg\pg\utils\CommonUtil;
    use paytmpg\pg\utils\EncDecUtil;
    use paytmpg\pg\utils\JSONUtil;
    use paytmpg\pg\utils\LoggingUtil;
    use Psr\Log\LogLevel;

    /**
     * This class is used to validate the Api call on the basis of required parameters and create request object
     * and make respective function calls after setting signature, if required.
     *
     * Class Payment
     * @package Paytm\pg\process
     */
    class Payment
    {

        /**
         * createTxnToken gets PaymentDetail object as parameter and creates request object to call process method of Request class.
         * It returns SDKResponse which holds the createTxnToken result parameters which will be used by merchant.
         * Also, it can hold error message and other relevant information in case an exception occurs.
         *
         * @param PaymentDetail
         * @return SDKResponse
         * @throws Exception
         */
        public static function createTxnToken($paymentDetails)
        {
            if ($paymentDetails instanceof PaymentDetail) {
                try {
                    Config::$requestId= CommonUtil::getUniqueRequestId();
                    if (!MerchantProperties::$isInitialized) {
                        LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "MerchantProperties are not initialized ");
                        return CommonUtil::getSDKResponse(SDKException::getMerchantPropertyInitializationException(),
                            new InitiateTransactionResponse(null, new InitiateTransactionResponseBody()));
                    }

                    LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "In createTxnToken PaymentDetail: " . print_r($paymentDetails, true));

                    self::validatePaymentDetailsObject($paymentDetails);
                    $request = self::createInitiateTransactionRequest($paymentDetails);

                    $requestHead = $request->getHead();
                    $requestBody = $request->getBody();
                    self::setSignature($requestHead, $requestBody);

                    $url = self::urlBuilder(MerchantProperties::getInitiateTxnUrl(), $requestBody->getMid(), $requestBody->getOrderId());
                    return Request::process($request, $url,
                        'paytmpg\pg\response\InitiateTransactionResponse', $paymentDetails->getReadTimeout(), MerchantProperties::getConnectionTimeout());

                } catch (Exception $e) {
                    LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, "Exception caught in createTxnToken: " . print_r($e, true));
                    return CommonUtil::getSDKResponse($e, new InitiateTransactionResponse(null, new InitiateTransactionResponseBody()));
                }
            } else {
                $e = SDKException::getSDKException('In createTxnToken, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
                return CommonUtil::getSDKResponse($e, new InitiateTransactionResponse(null, new InitiateTransactionResponseBody()));
            }
        }

        /**
         * validateCreateTxnToken checks if all mandatory parameters are present for createTxnToken api call.
         * If not, then it will throw SDKException exception
         *
         * @param PaymentDetail
         * @throws Exception
         */
        private static function validatePaymentDetailsObject($paymentDetails)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "validatePaymentDetailsObject for object: " . print_r($paymentDetails, true));
            if ($paymentDetails instanceof PaymentDetail) {
                $txnAmount = $paymentDetails->getTxnAmount();
                $userInfo = $paymentDetails->getUserInfo();
                if (
                    CommonUtil::checkStringForEmptyOrNull($paymentDetails->getOrderId())
                    || (!$txnAmount instanceof Money)
                    || CommonUtil::checkStringForEmptyOrNull($txnAmount->getValue())
                    || (!$userInfo instanceof UserInfo)
                    || CommonUtil::checkStringForEmptyOrNull($userInfo->getCustId())) {

                    LoggingUtil::addLog(LogLevel::INFO, __CLASS__, " validatePaymentDetailsObject returns false ");
                    throw SDKException::getMissingMandatoryParametersException();
                }
            } else {
                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "In validatePaymentDetailsObject, " . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM);
                throw SDKException::getSDKException('In validatePaymentDetailsObject, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
            }
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, " validatePaymentDetailsObject returns true ");
        }

        /**
         * @param PaymentDetail
         * @return InitiateTransactionRequest
         * @throws Exception
         */
        private static function createInitiateTransactionRequest($paymentDetails)
        {
            if ($paymentDetails instanceof PaymentDetail) {
                $head = CommonUtil::getSecureRequestHeader(MerchantProperties::getClientId(), null, $paymentDetails->getChannelId());
                $body = $paymentDetails->createInitiateTransactionRequestBody();
                $request = new InitiateTransactionRequest($head, $body);
                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "InitiateTransactionRequest object %s " . print_r($request, true));
                return $request;
            } else {
                throw SDKException::getSDKException('In createInitiateTransactionRequest, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
            }
        }

        /**
         * setSignature sets the signature in head(SecureRequestHeader), signature will be generated using the body
         *
         * @param SecureRequestHeader
         * @param InitiateTransactionRequestBody|NativePaymentStatusRequestBody
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
         * getPaymentStatus uses paymentStatusDetail object and creates request object to call process method of Request class.
         * It returns the SDKResponse which holds the getPaymentStatus result parameters which will be used by merchant.
         * Also, it can hold error message and other relevant information in case an exception occurs.
         *
         * @param PaymentStatusDetail
         * @return SDKResponse
         * @throws Exception
         */
        public static function getPaymentStatus($paymentStatusDetail)
        {
            if ($paymentStatusDetail instanceof PaymentStatusDetail) {
                Config::$requestId= CommonUtil::getUniqueRequestId();
                try {
                    if (!MerchantProperties::$isInitialized) {
                        LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "Paytm\pg\constants\MerchantProperties are not initialized ");
                        return CommonUtil::getSDKResponse(SDKException::getMerchantPropertyInitializationException(),
                            new NativePaymentStatusResponse(null, new NativePaymentStatusResponseBody()));
                    }

                    LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "In getPaymentStatus Paytm\merchant\models\PaymentStatusDetail: %s " . print_r($paymentStatusDetail, true));

                    self::validatePaymentStatusDetailObject($paymentStatusDetail);
                    $request = self::createNativePaymentStatusRequest($paymentStatusDetail);

                    $requestHead = $request->getHead();
                    $requestBody = $request->getBody();
                    self::setSignature($requestHead, $requestBody);

                    return Request::process($request, MerchantProperties::getPaymentStatusUrl(),
                        'paytmpg\pg\response\NativePaymentStatusResponse', $paymentStatusDetail->getReadTimeout(), MerchantProperties::getConnectionTimeout());

                } catch (Exception $e) {
                    LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, "Caught exception in getPaymentStatus: " . print_r($e->getMessage(), true));
                    return CommonUtil::getSDKResponse($e, new NativePaymentStatusResponse(null, new NativePaymentStatusResponseBody()));
                }
            } else {
                $e = SDKException::getSDKException('In getPaymentStatus, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
                return CommonUtil::getSDKResponse($e, new NativePaymentStatusResponse(null, new NativePaymentStatusResponseBody()));
            }
        }

        /**
         * validateGetPaymentStatus checks if all mandatory parameters are present for Payment Status api call.
         * If not, then is will throw an object of SDKException.
         *
         * @param PaymentStatusDetail
         * @throws Exception
         */
        private static function validatePaymentStatusDetailObject($paymentStatusDetail)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "validatePaymentStatusDetailObject for request: %s " . print_r($paymentStatusDetail, true));

            if ($paymentStatusDetail instanceof PaymentStatusDetail) {
                if (CommonUtil::checkStringForEmptyOrNull($paymentStatusDetail->getOrderId())) {
                    LoggingUtil::addLog(LogLevel::INFO, __CLASS__, " validatePaymentStatusDetailObject returns false ");
                    throw SDKException::getMissingMandatoryParametersException();
                }
            } else {
                throw SDKException::getSDKException('In validatePaymentStatusDetailObject, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
            }
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, " validatePaymentStatusDetailObject returns true ");
        }

        /**
         * @param PaymentStatusDetail
         * @return NativePaymentStatusRequest
         * @throws Exception
         */
        private static function createNativePaymentStatusRequest($paymentStatusDetail)
        {

            if ($paymentStatusDetail instanceof PaymentStatusDetail) {
                $head = CommonUtil::getSecureRequestHeader(MerchantProperties::getClientId(), null);
                $body = $paymentStatusDetail->createNativePaymentStatusRequestBody();

                $request = new NativePaymentStatusRequest();
                $request->setHead($head);
                $request->setBody($body);

                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "NativePaymentStatusRequest object %s " . print_r($request, true));
                return $request;
            } else {
                throw SDKException::getSDKException('In createNativePaymentStatusRequest, ' . ErrorMessage::UNEXPECTED_OBJECT_PASSED_AS_PARAM, null);
            }
        }

        /**
         * Returns the url string with adding queryParameters
         *
         * @param $url
         * @param $mid
         * @param $orderId
         * @return string
         */
        private static function urlBuilder($url, $mid, $orderId)
        {
            return $url . "?mid=" . $mid . "&orderId=" . $orderId;
        }
    }
