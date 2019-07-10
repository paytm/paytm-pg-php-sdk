<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    use JsonSerializable;

    /**
     * Class NativeRefundStatusResponseBody
     * @package Paytm\pg\response
     */
    class NativeRefundStatusResponseBody extends BaseResponseBody implements JsonSerializable
    {

        /**
         * @var string
         */
        protected $txnId;
        /**
         * @var string
         */
        protected $orderId;
        /**
         * @var string
         */
        protected $txnAmount;
        /**
         * @var string
         */
        protected $mid;
        /**
         * @var string
         */
        protected $refundAmount;
        /**
         * @var string
         */
        protected $txnDate;
        /**
         * @var string
         */
        private $totalRefundedAmount;
        /**
         * @var string
         */
        private $refundDate;
        /**
         * @var string
         */
        private $refId;
        /**
         * @var string
         */
        private $bankTxnId;
        /**
         * @var string
         */
        private $txnType;
        /**
         * @var string
         */
        private $gatewayName;
        /**
         * @var string
         */
        private $bankName;
        /**
         * @var string
         */
        private $paymentMode;
        /**
         * @var string
         */
        private $refundId;
        /**
         * @var string
         */
        private $refundType;
        /**
         * @var string
         */
        private $ssoId;

        /**
         * NativeRefundStatusResponseBody constructor.
         */
        public function __construct()
        {
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
        public function getTxnDate()
        {
            return $this->txnDate;
        }

        /**
         * @param string $txnDate
         */
        public function setTxnDate($txnDate)
        {
            $this->txnDate = $txnDate;
        }

        /**
         * @return string
         */
        public function getTotalRefundedAmount()
        {
            return $this->totalRefundedAmount;
        }

        /**
         * @param string $totalRefundedAmount
         */
        public function setTotalRefundedAmount($totalRefundedAmount)
        {
            $this->totalRefundedAmount = $totalRefundedAmount;
        }

        /**
         * @return string
         */
        public function getRefundDate()
        {
            return $this->refundDate;
        }

        /**
         * @param string $refundDate
         */
        public function setRefundDate($refundDate)
        {
            $this->refundDate = $refundDate;
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
         * @return string
         */
        public function getBankTxnId()
        {
            return $this->bankTxnId;
        }

        /**
         * @param string $bankTxnId
         */
        public function setBankTxnId($bankTxnId)
        {
            $this->bankTxnId = $bankTxnId;
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
         * @return string
         */
        public function getGatewayName()
        {
            return $this->gatewayName;
        }

        /**
         * @param string $gatewayName
         */
        public function setGatewayName($gatewayName)
        {
            $this->gatewayName = $gatewayName;
        }

        /**
         * @return string
         */
        public function getBankName()
        {
            return $this->bankName;
        }

        /**
         * @param string $bankName
         */
        public function setBankName($bankName)
        {
            $this->bankName = $bankName;
        }

        /**
         * @return string
         */
        public function getPaymentMode()
        {
            return $this->paymentMode;
        }

        /**
         * @param string $paymentMode
         */
        public function setPaymentMode($paymentMode)
        {
            $this->paymentMode = $paymentMode;
        }

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
        public function getRefundType()
        {
            return $this->refundType;
        }

        /**
         * @param string $refundType
         */
        public function setRefundType($refundType)
        {
            $this->refundType = $refundType;
        }

        /**
         * @return string
         */
        public function getSsoId()
        {
            return $this->ssoId;
        }

        /**
         * @param string $ssoId
         */
        public function setSsoId($ssoId)
        {
            $this->ssoId = $ssoId;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'txnId' => $this->getTxnId(),
                    'orderId' => $this->getOrderId(),
                    'txnAmount' => $this->getTxnAmount(),
                    'mid' => $this->getMid(),
                    'refundAmount' => $this->getRefundAmount(),
                    'txnDate' => $this->getTxnDate(),
                    'totalRefundedAmount' => $this->getTotalRefundedAmount(),
                    'refundDate' => $this->getRefundDate(),
                    'refId' => $this->getRefId(),
                    'bankTxnId' => $this->getBankTxnId(),
                    'txnType' => $this->getTxnType(),
                    'gatewayName' => $this->getGatewayName(),
                    'bankName' => $this->getBankName(),
                    'paymentMode' => $this->getPaymentMode(),
                    'refundId' => $this->getRefundId(),
                    'refundType' => $this->getRefundType(),
                    'ssoId' => $this->getSsoId(),
                    'resultInfo' => $this->getResultInfo(),
                    'extraParamsMap' => $this->getExtraParamsMap()
                ];
        }
    }