<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    use JsonSerializable;

    /**
     * Class AsyncRefundResponseBody
     * @package Paytm\pg\response
     */
    class AsyncRefundResponseBody extends BaseResponseBody implements JsonSerializable
    {

        /**
         * @var string
         */
        private $refundId;

        /**
         * @var string
         */
        private $mid;

        /**
         * @var string
         */
        private $txnId;

        /**
         * @var string
         */
        private $orderId;

        /**
         * @var string
         */
        private $txnAmount;

        /**
         * @var string
         */
        private $refundAmount;

        /**
         * @var string
         */
        private $refId;

        /**
         * @return string
         */
        public function getRefundId()
        {
            return $this->refundId;
        }

        /**
         * @param string $refundId
         */
        public function setRefundId($refundId)
        {
            $this->refundId = $refundId;
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
        public function getTxnId()
        {
            return $this->txnId;
        }

        /**
         * @param string $txnId
         */
        public function setTxnId($txnId)
        {
            $this->txnId = $txnId;
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
        public function getTxnAmount()
        {
            return $this->txnAmount;
        }

        /**
         * @param string $txnAmount
         */
        public function setTxnAmount($txnAmount)
        {
            $this->txnAmount = $txnAmount;
        }

        /**
         * @return string
         */
        public function getRefundAmount()
        {
            return $this->refundAmount;
        }

        /**
         * @param string $refundAmount
         */
        public function setRefundAmount($refundAmount)
        {
            $this->refundAmount = $refundAmount;
        }

        /**
         * @return string
         */
        public function getRefId()
        {
            return $this->refId;
        }

        /**
         * @param string $refId
         */
        public function setRefId($refId)
        {
            $this->refId = $refId;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'refundId' => $this->getRefundId(),
                    'mid' => $this->getMid(),
                    'txnId' => $this->getTxnId(),
                    'orderId' => $this->getOrderId(),
                    'txnAmount' => $this->getTxnAmount(),
                    'refundAmount' => $this->getRefundAmount(),
                    'refId' => $this->getRefId(),
                    'resultInfo' => $this->getResultInfo(),
                    'extraParamsMap' => $this->getExtraParamsMap()
                ];
        }
    }
