<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\constants;

    use Exception;

    /**
     * This class is used to store error constants
     * Merchant can update these constants as per his need
     *
     * Class ErrorConstants
     * @package Paytm\pg\constants
     */
    class ErrorConstants
    {
        const UTILITY_CLASS_EXCEPTION = "Utility class cannot be instantiated";

        //Result Status In case of Failure
        const FAILURE = "failure";

        /**
         * ErrorConstants constructor.
         * @throws Exception
         */
        private function __construct()
        {
            throw new Exception(self::UTILITY_CLASS_EXCEPTION);
        }
    }

    namespace paytmpg\pg\constants\ErrorConstants;

    use Exception;
    use paytmpg\pg\constants\ErrorConstants;

    /**
     * Result messages in case of failure
     *
     * Class ErrorMessage
     * @package Paytm\pg\constants\ErrorConstants
     */
    class ErrorMessage
    {

        /** Result message when verify signature returns false */
        const SIGNATURE_VALIDATION_FAILED = "Signature Validation Failed";
        /** Result message when any required parameter is missing in api calling */
        const MISSING_MANDATORY_PARAMETERS = "Missing Mandatory Parameters";
        /** Result message when Merchant Property are not initialized */
        const MISSING_MERCHANT_PROPERTY = "Missing merchant property";
        /** Result message when String to object conversion failed */
        const JSONSTRING_TO_OBJECT_CONVERSION_FAILED = "JsonString to object conversion failure";
        /** Result message when object of expected type is not passed in parameter*/
        const UNEXPECTED_OBJECT_PASSED_AS_PARAM = "Object of unexpected type is passed as parameter";

        /**
         * ErrorMessage constructor.
         * @throws Exception
         */
        private function __construct()
        {
            /** @noinspection PhpUnhandledExceptionInspection */
            throw new Exception(ErrorConstants::UTILITY_CLASS_EXCEPTION);
        }
    }

    namespace paytmpg\pg\constants\ErrorConstants;

    /**
     * Class ErrorCode
     * @package Paytm\pg\constants\ErrorConstants
     */
    class ErrorCode
    {
        // Result code in case of failure
        const DEFAULT_CODE = "501";

        /**
         * ErrorCode constructor.
         * @throws \Exception
         */
        private function __construct()
        {
            /** @noinspection PhpUnhandledExceptionInspection */
            throw new Exception(ErrorConstants::UTILITY_CLASS_EXCEPTION);
        }
    }