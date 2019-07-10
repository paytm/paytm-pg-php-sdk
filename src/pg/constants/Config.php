<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\constants;

    /**
     * Class Config
     * @package Paytm\pg\constants
     */
    class Config
    {

        /**
         * @var string
         */
        static $monologName = '[PAYTM]';

        /**
         * @var int
         */
        static $monologLevel = \Monolog\Logger::INFO;

        /**
         * @var string
         */
        static $monologLogfile = PROJECT . '/logs/app.log';

        /**
         * This holds unique uuid v4
         *
         * @var string
         */
        static $requestId;

    }
    Config::$requestId = LibraryConstants::PHP_SDK_TEXT . LibraryConstants::PHP_SDK_VERSION;