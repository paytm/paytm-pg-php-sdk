<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\constants;

    use Exception;

    /**
     * Class LibraryConstants
     * @package Paytm\pg\constants
     */
    class LibraryConstants
    {
        const VERSION = "v2";

        /** Environment constants */
        const STAGING_ENVIRONMENT = "STAGE";
        const PRODUCTION_ENVIRONMENT = "PROD";

        // Status message can be returned in case of Api success
        const SUCCESS_STATUS = "S";
        const PENDING_STATUS = "PENDING";
        const TXN_SUCCESS_STATUS = "TXN_SUCCESS";

        const REQUEST_TYPE_PAYMENT = "Payment";

        /** holds constant value for Request Id text */
        const X_REQUEST_ID = "X-Request-ID";
        /** holds the version of SDK */
        const PHP_SDK_TEXT = "PHP-SDK";
        /** holds the version of SDK */
        const PHP_SDK_VERSION = "1.0.0";

        /**
         * Constants constructor.
         * @throws Exception
         */
        private function __construct()
        {
            throw new Exception(ErrorConstants::UTILITY_CLASS_EXCEPTION);
        }

    }

    namespace paytmpg\pg\constants\LibraryConstants;

    use paytmpg\pg\constants\ErrorConstants;

    /**
     * Class Request
     * @package Paytm\pg\constants\LibraryConstants
     */
    class Request
    {

        /**
         * Request constructor.
         * @throws \Exception
         */
        private function __construct()
        {
            throw new \Exception(ErrorConstants::UTILITY_CLASS_EXCEPTION);
        }

        const FOOD_WALLET = "FOOD";
        const GIFT_WALLET = "GIFT";
    }
