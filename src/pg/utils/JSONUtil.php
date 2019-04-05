<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\utils;

    use Exception;
    use JsonMapper;
    use Psr\Log\LogLevel;

    /**
     * Class JSONUtil
     * @package Paytm\pg\utils
     */
    class JSONUtil
    {

        /**
         * formats into the json form required to make api call
         *
         * @param $param
         * @return null|string
         */
        public static function formatJson($param)
        {
            return preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $param); //removes null fields
        }

        /**
         * @param $param
         * @return null|string
         * @throws Exception
         * convert object to json String
         */
        public static function mapToJson($param)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "JSONUtil::mapToJson for Object: " . print_r($param, true));
            $json = json_encode($param, JSON_UNESCAPED_SLASHES);
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "JSONUtil::mapToJson non-formatted JSON: " . $json);
            return self::formatJson($json);
        }

        /**
         * @param $jsonObject
         * @param $response
         * @return object
         * @throws Exception
         * convert json String to InitiateTransactionResponse class object
         */
        public static function mapResponseJsonToObject($jsonObject, $response)
        {

            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, sprintf("mapJsonToObject for Object: %s with Class: %s ", $jsonObject, json_encode($response)));

            $json = json_decode($jsonObject);
            $mapper = new JsonMapper();
            $mapper->bStrictNullTypes = false;

            return $mapper->map($json, $response);
        }
    }