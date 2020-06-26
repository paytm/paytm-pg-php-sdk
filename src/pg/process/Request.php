<?php
    /**
     * Copyright (C) 2019 Paytm.
     */
	/* this is just a comment*/
    namespace paytmpg\pg\process;

    use Exception;
    use paytmpg\merchant\models\SDKResponse;
    use paytmpg\pg\constants\Config;
    use paytmpg\pg\constants\ErrorConstants\ErrorMessage;
    use paytmpg\pg\constants\LibraryConstants;
    use paytmpg\pg\constants\MerchantProperties;
    use paytmpg\pg\exceptions\SDKException;
    use paytmpg\pg\response\AsyncRefundResponse;
    use paytmpg\pg\response\AsyncRefundResponseBody;
    use paytmpg\pg\response\InitiateTransactionResponse;
    use paytmpg\pg\response\InitiateTransactionResponseBody;
    use paytmpg\pg\response\NativePaymentStatusResponse;
    use paytmpg\pg\response\NativePaymentStatusResponseBody;
    use paytmpg\pg\response\NativeRefundStatusResponse;
    use paytmpg\pg\response\NativeRefundStatusResponseBody;
    use paytmpg\pg\response\SecureResponseHeader;
    use paytmpg\pg\utils\EncDecUtil;
    use paytmpg\pg\utils\JSONUtil;
    use paytmpg\pg\utils\LoggingUtil;
    use Psr\Log\LogLevel;

    if (!defined('CURL_SSLVERSION_TLSv1_2')) {
        define('CURL_SSLVERSION_TLSv1_2', '6');
    }

    /**
     * This class receives request from Payment class and Request class for hitting the paytm apis with the received request attributes.
     *
     * Class Request
     * @package Paytm\pg\process
     */
    class Request
    {

        /**
         * @param $request
         * @param $url
         * @param $responseClassName
         * @param $readTimeout
         * @param $connTimeout
         * @return SDKResponse
         * @throws Exception
         */
        public static function process($request, $url, $responseClassName, $readTimeout, $connTimeout)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "process for request: " . print_r($request, true));
            $formattedJsonReq = JSONUtil::mapToJson($request);

            // echo "\n\nJson formatted request body: ";
            // print_r($formattedJsonReq);

            $rawJsonResponse = self::executeCurl($url, $formattedJsonReq, $readTimeout, $connTimeout);
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "response: " . $rawJsonResponse);

            /* Below code is to convert json to object of specified type */
            if ($responseClassName == 'paytmpg\pg\response\AsyncRefundResponse') {
                $responseObj = new AsyncRefundResponse(new SecureResponseHeader(), new AsyncRefundResponseBody());
            }
            elseif ($responseClassName == 'paytmpg\pg\response\InitiateTransactionResponse') {
                $responseObj = new InitiateTransactionResponse(new SecureResponseHeader(), new InitiateTransactionResponseBody());
            }
            elseif ($responseClassName == 'paytmpg\pg\response\NativePaymentStatusResponse') {
                $responseObj = new NativePaymentStatusResponse(new SecureResponseHeader(), new NativePaymentStatusResponseBody());
            }
            elseif ($responseClassName == 'paytmpg\pg\response\NativeRefundStatusResponse') {
                $responseObj = new NativeRefundStatusResponse(new SecureResponseHeader(), new NativeRefundStatusResponseBody());
            }

            JSONUtil::mapResponseJsonToObject($rawJsonResponse, $responseObj);
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "responseData: " . print_r($responseObj, true));

            $responseObjBody = $responseObj->getBody();
            if ($responseObjBody == null) {
                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, ErrorMessage::JSONSTRING_TO_OBJECT_CONVERSION_FAILED .
                    "as responseData->getBody is null and raw json received is: " . $rawJsonResponse);
                throw SDKException::getSDKException(ErrorMessage::JSONSTRING_TO_OBJECT_CONVERSION_FAILED,
                    $rawJsonResponse);
            }

            $head = $responseObj->getHead();
            $signature = $head->getSignature();
            $resultInfo = $responseObjBody->getResultInfo();
            $resultStatus = $resultInfo->getResultStatus();

            self::validateResponseSignature($responseObj, $responseClassName, $resultStatus, $rawJsonResponse, $signature);

            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "Execution completed with raw json response: " . $rawJsonResponse);
            return new SDKResponse($responseObj, $rawJsonResponse);
        }

        /**
         * @param $apiURL
         * @param $requestParamList
         * @param $readTimeout
         * @param $connTimeout
         * @return mixed
         * @throws Exception
         */
        private static function executeCurl($apiURL, $requestParamList, $readTimeout, $connTimeout)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "executeCurl called ");
            $postData = $requestParamList;
            $ch = curl_init($apiURL);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, $connTimeout);
            curl_setopt($ch, CURLOPT_TIMEOUT_MS, $readTimeout);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($postData),
                    Config::$requestId)
            );

            $jsonResponse = curl_exec($ch);
            curl_close($ch);

            if ($jsonResponse) {
                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "API response received upon successful execution: " . $jsonResponse);
            } else {
                $error = "CURL Error:";
                LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, "API Communication Error: " . $error);
                throw new SDKException("API Communication Error" . $error);
            }
            return $jsonResponse;
        }

        /**
         * @param $responseObj
         * @param $responseClassName
         * @param $resultStatus
         * @param $rawJsonResponse
         * @param $signature
         * @throws Exception
         */
        private static function validateResponseSignature($responseObj, $responseClassName, $resultStatus, $rawJsonResponse, $signature)
        {
            if (($responseObj instanceof $responseClassName) &&
                (LibraryConstants::SUCCESS_STATUS == $resultStatus || LibraryConstants::PENDING_STATUS == $resultStatus || LibraryConstants::TXN_SUCCESS_STATUS == $resultStatus)) {

                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "validating signature ");

                $arrayReponse = json_decode($rawJsonResponse, true);
                $body = $arrayReponse['body'];
                $body = json_encode($body);

                $isValidated = EncDecUtil::verifySignature($body, MerchantProperties::getMerchantKey(), $signature);

                if (!$isValidated) {
                    LoggingUtil::addLog(LogLevel::DEBUG, __CLASS__, "signature validation failed ");
                    throw SDKException::getSignatureValidationFailedException($rawJsonResponse);
                }
                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "signature validation passed ");
            }
        }
    }
