<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\enums;

    /**
     * Class UserSubWalletType
     * @package Paytm\pg\enums
     */
    class UserSubWalletType
    {

        const FOOD = "FOOD";
        const GIFT = "GIFT";
        const MULTI_PURPOSE_GIFT = "MULTI_PURPOSE_GIFT";
        const TOLL = "TOLL";
        const CLOSED_LOOP_WALLET = "CLOSED_LOOP_WALLET";
        const CLOSED_LOOP_SUB_WALLET = "CLOSED_LOOP_SUB_WALLET";
        const FUEL = "FUEL";
        const INTERNATIONAL_FUNDS_TRANSFER = "INTERNATIONAL_FUNDS_TRANSFER";
        const CASHBACK = "CASHBACK";
        const GIFT_VOUCHER = "GIFT_VOUCHER";
        const COMMUNICATION = "COMMUNICATION";

        /**
         * @var string
         */
        public $code;
        /**
         * @var string
         */
        public $type;

        /**
         * UserSubWalletType constructor.
         * @param string $code
         * @param string $type
         */
        private function __construct($code, $type)
        {
            $this->code = $code;
            $this->type = $type;
        }

        /**
         * @return string
         */
        public function getCode()
        {
            return $this->code;
        }

        /**
         * @param string $code
         */
        public function setCode($code)
        {
            $this->code = $code;
        }

        /**
         * @return string
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * @param string $type
         */
        public function setType($type)
        {
            $this->type = $type;
        }
    }
