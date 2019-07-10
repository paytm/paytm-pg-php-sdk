<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\exceptions;

    use Exception;
    use paytmpg\pg\constants\ErrorConstants\ErrorMessage;
    use paytmpg\pg\utils\LoggingUtil;
    use Psr\Log\LogLevel;
    use RuntimeException;

    /**
     * SDKException creates exception which are originated from Merchant code
     *
     * Class SDKException
     * @package Paytm\pg\exceptions
     */
    class SDKException extends RuntimeException
    {

        /**
         * @var string
         */
        private $rawData;

        /**
         * SDKException constructor.
         * @param string $msg
         * @throws Exception
         */
        public function __construct($msg, $rawData=null)
        {
            parent::__construct($msg);
            if(null != $rawData)
                $this->rawData = $rawData;
            LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, 'SDKException msg' . $msg);
        }

        /**
         * @return string
         */
        public function getRawdata()
        {
            return $this->rawData;
        }

        /**
         * @param string $msg
         * @param string $rawData
         * @throws Exception
         */
        public function setRawData($rawData)
        {
            $this->rawData = $rawData;
            LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, 'SDKExceptions raw response JSON ' . $rawData);
        }

        /**
         * @return SDKException when any mandatory parameter is missing
         * @throws Exception
         */
        public static function getMerchantPropertyInitializationException()
        {
            LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, ErrorMessage::MISSING_MERCHANT_PROPERTY);
            return new SDKException(ErrorMessage::MISSING_MERCHANT_PROPERTY);
        }

        /**
         * @return SDKException when any mandatory parameter is missing
         * @throws Exception
         */
        public static function getMissingMandatoryParametersException()
        {
            LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, ErrorMessage::MISSING_MANDATORY_PARAMETERS);
            return new SDKException(ErrorMessage::MISSING_MANDATORY_PARAMETERS);
        }

        /**
         * @return SDKException when Signature validation failed at merchant side
         * @throws Exception
         */
        public static function getSignatureValidationFailedException($rawJsonResponse)
        {
            LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, ErrorMessage::SIGNATURE_VALIDATION_FAILED);
            return new SDKException(ErrorMessage::SIGNATURE_VALIDATION_FAILED, $rawJsonResponse);
        }

        /**
         * @param $exceptionMessage
         * @param $jsonObject
         * @return SDKException
         * @throws Exception
         */
        public static function getSDKException($exceptionMessage, $rawJsonResponse)
        {
            LoggingUtil::addLog(LogLevel::ERROR, __CLASS__, sprintf("getSDKException message:%s and jsonObject: %s ",
                $exceptionMessage, $rawJsonResponse));
            $sdkException = new SDKException($exceptionMessage);
            return $sdkException->setRawData($rawJsonResponse);
        }
    }
