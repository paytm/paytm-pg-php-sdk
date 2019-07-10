<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    /**
     * Class NativePaymentStatusRequestBody
     * @package Paytm\pg\request
     */
    class NativePaymentStatusRequestBody implements \JsonSerializable
    {

        /**
         * @var string
         */
        private $mid;

        /**
         * @var string
         */
        private $orderId;

        /**
         * @var string
         */
        private $txnType;

        /**
         * @var bool
         */
        private $fromAoaMerchant;

        /**
         * NativePaymentStatusRequestBody constructor.
         */
        public function __construct()
        {
        }

        /**
         * @return string
         */
        public function getMid()
        {
            return $this->mid;
        }

        /**
         * @param string $mid
         */
        public function setMid($mid)
        {
            $this->mid = $mid;
        }

        /**
         * @return string
         */
        public function getOrderId()
        {
            return $this->orderId;
        }

        /**
         * @param string $orderId
         */
        public function setOrderId($orderId)
        {
            $this->orderId = $orderId;
        }

        /**
         * @return string
         */
        public function getTxnType()
        {
            return $this->txnType;
        }

        /**
         * @param string $txnType
         */
        public function setTxnType($txnType)
        {
            $this->txnType = $txnType;
        }

        /**
         * @return bool
         */
        public function isFromAoaMerchant()
        {
            return $this->fromAoaMerchant;
        }

        /**
         * @param bool $fromAoaMerchant
         */
        public function setFromAoaMerchant($fromAoaMerchant)
        {
            $this->fromAoaMerchant = $fromAoaMerchant;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'mid' => $this->getMid(),
                    'orderId' => $this->getOrderId(),
                    'txnType' => $this->getTxnType(),
                ];
        }
    }
