<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\models;

    use JsonSerializable;
    use paytmpg\pg\enums\EnumCurrency;

    /**
     * Class Money
     * @package Paytm\pg\models
     */
    class Money implements JsonSerializable
    {
        /**
         * @var EnumCurrency
         */
        private $currency;

        /**
         * @var string
         */
        private $value;

        /**
         * Money constructor.
         */
        public function __construct()
        {
        }

        /**
         * @param string (Paytm\pg\enums\EnumCurrency) $currency
         * @param string $value
         * @return Money
         */
        public static function constructWithCurrencyAndValue($currency, $value)
        {
            $instance = new self();
            $instance->currency = $currency;
            $instance->value = $value;
            return $instance;
        }

        /**
         * @return EnumCurrency
         */
        public function getCurrency()
        {
            return $this->currency;
        }

        /**
         * @param EnumCurrency $currency
         */
        public function setCurrency($currency)
        {
            $this->currency = $currency;
        }

        /**
         * @return string
         */
        public function getValue()
        {
            return $this->value;
        }

        /**
         * @param string $value
         */
        public function setValue($value)
        {
            $this->value = $value;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'currency' => $this->getCurrency(),
                    'value' => $this->getValue()
                ];
        }
    }
