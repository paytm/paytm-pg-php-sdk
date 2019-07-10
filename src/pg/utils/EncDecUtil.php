<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\utils;

    use Exception;
    use Psr\Log\LogLevel;

    /**
     * Class EncDecUtil
     * @package Paytm\pg\utils
     */
    class EncDecUtil
    {

        /**
         * @param $str
         * @param $key
         * @return string
         * @throws Exception
         */
        public static function generateSignature($str, $key)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "checksum generation from string is called ");

            $salt = self::generateRandomString(4);
            $finalString = $str . "|" . $salt;
            $hash = hash("sha256", $finalString);
            $hashString = $hash . $salt;
            $checksum = self::encrypt($hashString, $key);

            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "checksum generated: " . $checksum);
            return $checksum;
        }

        /**
         * @param $length
         * @return string
         * @throws Exception
         */
        public static function generateRandomString($length)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "generateSalt called ");

            $random = "";
            srand((double)microtime() * 1000000);

            $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
            $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
            $data .= "0FGH45OP89";

            for ($i = 0; $i < $length; $i++) {
                $random .= substr($data, (rand() % (strlen($data))), 1);
            }

            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "generated random salt: " . $random);
            return $random;
        }

        /**
         * @param $input
         * @param $ky
         * @return string
         * @throws Exception
         */
        public static function encrypt($input, $ky)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, sprintf("encrypt called with input: %s and key: %s ", $input, $ky));

            $key = html_entity_decode($ky);
            $iv = "@@@@&&&&####$$$$";
            $data = openssl_encrypt($input, "AES-128-CBC", $key, 0, $iv);

            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "encrypted data: " . $data);
            return $data;
        }

        /**
         * @param $str
         * @param $key
         * @param $checksumvalue
         * @return string
         * @throws Exception
         */
        public static function verifySignature($str, $key, $checksumvalue)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "verify checksum called ");

            $paytm_hash = self::decrypt($checksumvalue, $key);
            $salt = substr($paytm_hash, -4);

            $finalString = $str . "|" . $salt;

            $website_hash = hash("sha256", $finalString);
            $website_hash .= $salt;

            $res = $website_hash == $paytm_hash ? true : false;

            $msgRes = $res ? 'true' : 'false';
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "checksum validation flag: " . $msgRes);

            return $res;
        }

        /**
         * @param $crypt
         * @param $ky
         * @return string
         * @throws Exception
         */
        public static function decrypt($crypt, $ky)
        {
            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, sprintf("decrypt called with input: %s and key: %s ", $crypt, $ky));

            $key = html_entity_decode($ky);
            $iv = "@@@@&&&&####$$$$";
            $data = openssl_decrypt($crypt, "AES-128-CBC", $key, 0, $iv);

            LoggingUtil::addLog(LogLevel::INFO, __CLASS__, "decrypted data: " . $data);
            return $data;
        }
    }