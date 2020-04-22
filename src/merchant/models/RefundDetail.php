<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\merchant\models;

    use paytmpg\merchant\models\RefundDetail\RefundDetailBuilder;
    use paytmpg\pg\constants\MerchantProperties;
    use paytmpg\pg\request\RefundInitiateRequestBody;

    /**
     * This class is used to store all the Refund information
     * Request of initiateRefund api is translated from Paytm\pg\process\Refund object
     *
     * Class RefundDetail
     * @package Paytm\merchant\models
     */
    class RefundDetail
    {
        /**
         * @var string
         * required
         */
        private $orderId;
        /**
         * @var string
         * required
         */
        private $refId;
        /**
         * @var string
         * required
         */
        private $txnId;
        /**
         * @var string
         * required
         */
        private $refundAmount;
        /**
         * @var string
         * optional
         */
        private $comments;
        /**
         * @var array
         * optional
         */
        private $subwalletAmount;
        /**
         * @var array
         * optional
         */
        private $extraParamsMap;
        /**
         * @var int
         * Read TimeOut for Refund Api
         * optional
         */
        private $readTimeout;

        /**
         * RefundDetail constructor.
         * @param RefundDetailBuilder $refundBuilder
         */
        public function __construct($refundBuilder)
        {
            $this->orderId = $refundBuilder->orderId;
            $this->refId = $refundBuilder->refId;
            $this->txnId = $refundBuilder->txnId;
            $this->refundAmount = $refundBuilder->refundAmount;

            $this->extraParamsMap = $refundBuilder->extraParamsMap;
            $this->comments = $refundBuilder->comments;
            $this->subwalletAmount = $refundBuilder->subwalletAmount;
            $this->readTimeout = $refundBuilder->readTimeout;
        }

        /**
         * @return string
         */
        public function getOrderId()
        {
            return $this->orderId;
        }

        /**
         * @return string
         */
        public function getRefId()
        {
            return $this->refId;
        }

        /**
         * @return array
         */
        public function getExtraParamsMap()
        {
            return $this->extraParamsMap;
        }

        /**
         * @return string
         */
        public function getTxnId()
        {
            return $this->txnId;
        }

        /**
         * @return string
         */
        public function getRefundAmount()
        {
            return $this->refundAmount;
        }

        /**
         * @return string
         */
        public function getComments()
        {
            return $this->comments;
        }

        /**
         * @return array
         */
        public function getSubwalletAmount()
        {
            return $this->subwalletAmount;
        }

        /**
         * @return int
         */
        public function getReadTimeout()
        {
            return $this->readTimeout;
        }

        /**
         * @return RefundInitiateRequestBody
         */
        public function createRefundInitiateRequestBody()
        {
            $refundInitiateRequestBody = new RefundInitiateRequestBody();
            $refundInitiateRequestBody->setMid(MerchantProperties::getMid());
            $refundInitiateRequestBody->setOrderId($this->getOrderId());
            $refundInitiateRequestBody->setRefId($this->getRefId());
            $refundInitiateRequestBody->setExtraParamsMap($this->getExtraParamsMap());
            $refundInitiateRequestBody->setTxnId($this->getTxnId());
            $refundInitiateRequestBody->setRefundAmount($this->getRefundAmount());
            $refundInitiateRequestBody->setComments($this->getComments());
            $refundInitiateRequestBody->setSubwalletAmount($this->getSubwalletAmount());

            return $refundInitiateRequestBody;
        }
    }
