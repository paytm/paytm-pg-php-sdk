<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\enums;

    use Exception;

    /**
     * This Enum represents the total list of currencies supported by the system
     *
     * Class EnumCurrency
     * @package Paytm\pg\enums
     */
    class EnumCurrency
    {
        const INR = "INR";

        /**
         * @var string
         */
        public $currency;

        /**
         * @return string
         */
        public function getCurrency()
        {
            return $this->currency;
        }

        /**
         * EnumCurrency constructor.
         * @param string $currency
         */
        public function __construct($currency)
        {
            $this->currency = $currency;
        }

        /**
         * @return array
         */
        public static function getEnumCurrencyOptions()
        {
            return [
                self::INR,
            ];
        }

        /**
         * @param $currency
         * @return int|string
         * @throws Exception
         */
        static function getEnumByCurrency($currency)
        {
            $enumOptions = self::getEnumCurrencyOptions();
            foreach ($enumOptions as $key => $val) {
                if ($currency == $val) {
                    return $key;
                }
            }
            throw new Exception("FacadeInvalidParameterException : Given value of Currency is not supported");
        }
    }



