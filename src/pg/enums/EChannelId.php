<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\enums;

    use Exception;

    /**
     * Class EChannelId
     * @package Paytm\pg\enums
     */
    class EChannelId
    {
        const
            APP = "APP",
            WEB = "WEB",
            WAP = "WAP",
            SYSTEM = "SYSTEM";

        /**
         * @var string
         */
        private $value;

        /**
         * EChannelId constructor.
         */
        public function __construct()
        {

        }

        /**
         * @param string $value
         */
        public function setValue($value)
        {
            $this->value = $value;
        }

        /**
         * @return string
         */
        public function getValue()
        {
            return $this->value;
        }

        /**
         * @return array
         */
        public static function getEChannelIdOptions()
        {
            return [
                self::APP,
                self::WEB,
                self::WAP,
                self::SYSTEM
            ];
        }

        /**
         * @param $value
         * @return int|string
         * @throws Exception
         */
        public static function getEChannelIdByValue($value)
        {

            $EChannelIdOptions = self::getEChannelIdOptions();
            foreach ($EChannelIdOptions as $key => $val) {
                if ($val == $value) {
                    return $key;
                }
            }
            throw new Exception("Given value of Currency is not supported");
        }

    }