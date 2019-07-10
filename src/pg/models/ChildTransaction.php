<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\models;

    use JsonSerializable;

    /**
     * Class ChildTransaction
     * @package Paytm\pg\models
     */
    class ChildTransaction implements JsonSerializable
    {

        /**
         * @var string
         */
        private $txnId;

        /**
         * @var string
         */
        private $paymentMode;

        /**
         * @var string
         */
        private $txnAmount;

        /**
         * @var string
         */
        private $gateway;

        /**
         * @var string
         */
        private $bankTxnId;

        /**
         * @var string
         */
        private $bankName;

        /**
         * @var string
         */
        private $status;

        /**
         * @var string
         */
        private $cardIndexNo;

        /**
         * @var string
         */
        private $maskedCardNo;

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
        public function getGateway()
        {
            return $this->gateway;
        }

        /**
         * @param string $gateway
         */
        public function setGateway($gateway)
        {
            $this->gateway = $gateway;
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
        public function getStatus()
        {
            return $this->status;
        }

        /**
         * @param string $status
         */
        public function setStatus($status)
        {
            $this->status = $status;
        }

        /**
         * @return string
         */
        public function getCardIndexNo()
        {
            return $this->cardIndexNo;
        }

        /**
         * @param string $cardIndexNo
         */
        public function setCardIndexNo($cardIndexNo)
        {
            $this->cardIndexNo = $cardIndexNo;
        }

        /**
         * @return string
         */
        public function getMaskedCardNo()
        {
            return $this->maskedCardNo;
        }

        /**
         * @param string $maskedCardNo
         */
        public function setMaskedCardNo($maskedCardNo)
        {
            $this->maskedCardNo = $maskedCardNo;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'txnId' => $this->getTxnId(),
                    'paymentMode' => $this->getPaymentMode(),
                    'txnAmount' => $this->getTxnAmount(),
                    'gateway' => $this->getGateway(),
                    'bankTxnId' => $this->getBankTxnId(),
                    'bankName' => $this->getBankName(),
                    'status' => $this->getStatus(),
                    'cardIndexNo' => $this->getCardIndexNo(),
                    'maskedCardNo' => $this->getMaskedCardNo(),
                ];
        }
    }