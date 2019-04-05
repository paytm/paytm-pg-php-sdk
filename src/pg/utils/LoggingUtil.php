<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\utils;

    use Exception;
    use Monolog\Formatter\LineFormatter;
    use Monolog\Handler\StreamHandler;
    use Monolog\Logger;
    use paytmpg\pg\constants\Config;

    /**
     * Class LoggingUtil
     * @package Paytm\pg\utils
     */
    class LoggingUtil
    {

        /**
         * @var Logger
         */
        protected static $logger = null;

        /**
         * LoggingUtil constructor.
         */
        protected function __construct()
        {
        }

        /**
         * @param string $severity
         * @param string $className
         * @param string $msg
         * @throws Exception
         */
        public static function addLog($severity, $className, $msg)
        {
            if (!isset(static::$logger)) {
                static::$logger = new Logger(Config::$monologName);
                $stream = new StreamHandler(Config::$monologLogfile, Config::$monologLevel);
                $formatter = new LineFormatter(null, null, false, true);
                /** Uncomment the below line to use Json formatted logs */
                //$formatter = new JsonFormatter($stream);
                $stream->setFormatter($formatter);
                static::$logger->pushHandler($stream);
                /** Uncomment the below line to disable logs */
                //static::$logger->pushHandler(new \Monolog\Handler\NullHandler());
            }
            static::$logger->log($severity, "[" . Config::$requestId . "] " . "<" . $className . ">" . ": " . $msg);
        }
    }