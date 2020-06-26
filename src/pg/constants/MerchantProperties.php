<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\constants;

    use Exception;
    use paytmpg\pg\exceptions\SDKException;
    use paytmpg\pg\utils\CommonUtil;
    use paytmpg\pg\utils\LoggingUtil;
    use Psr\Log\LogLevel;

    /**
     * This class is used to store all the merchant related constants
     * that are common to all payments and orders
     *
     * Class MerchantProperties
     * @package Paytm\pg\constants
     */
    class MerchantProperties
    {
        /**
         * @var bool
         */
        static $isInitialized = false;

        // TEST for Testing and PROD for Production.
        /**
         * @var string
         * ENVIRONMENT is used to set URLs(TESTING or PRODUCTION)
         */
        private static $environment = LibraryConstants::STAGING_ENVIRONMENT;

        /**
         * @var int
         * timeout constants
         */
        private static $connectTimeout = 30000; // 30 * 1000

        /**
         * @var string
         */
        private static $mid;
        /**
         * @var string
         */
        private static $merchantKey;

        /**
         * @var string
         */
        private static $website = "WEBSTAGING";

        /**
         * @var string
         */
        private static $clientId;

        /**
         * @var string $callbackUrl callback url on which paytm will respond for api calls
         */
        private static $callbackUrl = "";

        /** URLs */
        /**
         * @var string
         */
        private static $initiateTxnUrl = "https://securegw-stage.paytm.in/order/initiate";
        /**
         * @var string
         */
        private static $refundUrl = "https://securegw-stage.paytm.in/refund/apply";
        /**
         * @var string
         */
        private static $paymentStatusUrl = "https://securegw-stage.paytm.in/v3/order/status";
        /**
         * @var string
         */
        private static $refundStatusUrl = "https://securegw-stage.paytm.in/v2/refund/status";

        /**
         * @param string $environment
         * @param string $mid
         * @param string $merchantKey
         * @param string $clientId
         * @param string $website
         * @param string $callbackUrl
         * @throws Exception
         */
        public static function initialize($environment, $mid, $merchantKey, $clientId, $website)
        {
            if (!self::$isInitialized) {
                LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "initialize called");

                if (CommonUtil::checkStringForEmptyOrNull($environment)) {
                    throw new SDKException("Environment can not be null or empty");
                }
                elseif (CommonUtil::checkStringForEmptyOrNull($mid)) {
                    throw new SDKException("Mid can not be null or empty");
                }
                elseif (CommonUtil::checkStringForEmptyOrNull($merchantKey)) {
                    throw new SDKException("Merchant key can not be null or empty");
                }
                elseif (CommonUtil::checkStringForEmptyOrNull($clientId)) {
                    throw new SDKException("Client Id can not be null or empty");
                }
                elseif (CommonUtil::checkStringForEmptyOrNull($website)) {
                    throw new SDKException("Website can not be null or empty");
                }
                else {
                    self::$isInitialized = true;
                    self::setEnvironment($environment);
                    self::setMid($mid);
                    self::setMerchantKey($merchantKey);
                    self::setClientId($clientId);
                    self::setWebsite($website);
                }
            }
        }

        /**
         * @return string
         */
        public static function getEnvironment()
        {
            return self::$environment;
        }

        /**
         * @return string
         */
        public static function getMid()
        {
            return self::$mid;
        }

        /**
         * @return string
         */
        public static function getMerchantKey()
        {
            return self::$merchantKey;
        }

        /**
         * @return string
         */
        public static function getWebsite()
        {
            return self::$website;
        }

        /**
         * @return string
         */
        public static function getClientId()
        {
            return self::$clientId;
        }

        /**
         * @return string
         */
        public static function getCallbackUrl()
        {
            return self::$callbackUrl;
        }

        /**
         * @return string
         */
        public static function getInitiateTxnUrl()
        {
            return self::$initiateTxnUrl;
        }

        /**
         * @return string
         */
        public static function getRefundUrl()
        {
            return self::$refundUrl;
        }

        /**
         * @return string
         */
        public static function getRefundStatusUrl()
        {
            return self::$refundStatusUrl;
        }

        /**
         * @return string
         */
        public static function getPaymentStatusUrl()
        {
            return self::$paymentStatusUrl;
        }

        /**
         * @return int
         */
        public static function getConnectionTimeout()
        {
            return self::$connectTimeout;
        }

        /**
         * @param int $connectionTimeout
         */
        public static function setConnectionTimeout($connectionTimeout)
        {
            self::$connectTimeout = $connectionTimeout;
        }

        /**
         * @param string $mid
         */
        public static function setMid($mid)
        {
            self::$mid = $mid;
        }

        /**
         * @param string $merchantKey
         */
        public static function setMerchantKey($merchantKey)
        {
            self::$merchantKey = $merchantKey;
        }

        /**
         * @param string $website
         */
        public static function setWebsite($website)
        {
            self::$website = $website;
        }

        /**
         * @param string $clientId
         */
        public static function setClientId($clientId)
        {
            self::$clientId = $clientId;
        }

        /**
         * @param string $callbackUrl
         */
        public static function setCallbackUrl($callbackUrl)
        {
            self::$callbackUrl = $callbackUrl;
        }

        /**
         * @param string $environment
         * @throws Exception
         */
        public static function setEnvironment($environment)
        {
            self::$environment = $environment;
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "Setting Environment for " . $environment);
            if ($environment === LibraryConstants::PRODUCTION_ENVIRONMENT) {
                self::$initiateTxnUrl   = "https://securegw.paytm.in/order/initiate";
                self::$refundUrl        = "https://securegw.paytm.in/refund/apply";
                self::$paymentStatusUrl = "https://securegw.paytm.in/v3/order/status";
                self::$refundStatusUrl  = "https://securegw.paytm.in/v2/refund/status";
            }
        }
    }