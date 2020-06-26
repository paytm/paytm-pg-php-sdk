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
        private $txnType;
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
            $this->txnType = $refundBuilder->txnType;
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
        public function getTxnType()
        {
        return $this->txnType;
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
            $refundInitiateRequestBody->setTxnType($this->getTxnType());
            $refundInitiateRequestBody->setRefundAmount($this->getRefundAmount());
            $refundInitiateRequestBody->setComments($this->getComments());
            $refundInitiateRequestBody->setSubwalletAmount($this->getSubwalletAmount());

            return $refundInitiateRequestBody;
        }
    }

    namespace paytmpg\merchant\models\RefundDetail;

    use paytmpg\merchant\models\RefundDetail;
    use paytmpg\pg\exceptions\SDKException;
    use paytmpg\pg\utils\CommonUtil;

    /**
     * RefundBuilder is used to build the Refund object
     *
     * Class RefundDetailBuilder
     * @package Paytm\merchant\models\RefundDetail
     */
    class RefundDetailBuilder
    {

        /**
         * @var string
         * required
         */
        public $orderId;
        /**
         * @var string
         * required
         */
        public $refId;
        /**
         * @var string
         * required
         */
        public $txnId;
         /**
         * @var string
         */
        public $txnType;
        /**
         * @var string
         * required
         */
        public $refundAmount;
        /**
         * @var string
         * optional
         */
        public $workFlow;
        /**
         * @var string
         * optional
         */
        public $comments;
        /**
         * @var array
         * optional
         */
        public $subwalletAmount;
        /**
         * @var array
         * optional
         */
        public $extraParamsMap;
        /**
         * @var int
         * Read TimeOut for Refund Api
         * optional
         */
        public $readTimeout;

        /**
         * RefundDetailBuilder constructor.
         * @param string $orderId
         * @param string $refId
         * @param string $txnId
         * @param string $txnType
         * @param string $refundAmount
         * @throws \Exception
         */
        public function __construct($orderId, $refId, $txnId, $txnType, $refundAmount)
        {
            if (CommonUtil::checkStringForEmptyOrNull($orderId)) {
                throw new SDKException("OrderId can not be null or empty");
            }
            elseif (CommonUtil::checkStringForEmptyOrNull($refId)) {
                throw new SDKException("RefId can not be null or empty");
            }
            elseif (CommonUtil::checkStringForEmptyOrNull($txnId)) {
                throw new SDKException("Txn ID can not be null or empty");
            }
            else if (CommonUtil::checkStringForEmptyOrNull($txnType)) {
                 throw new SDKException("Txn type can not be null or empty");
            }
            elseif (CommonUtil::checkStringForEmptyOrNull($refundAmount)) {
                throw new SDKException("Refund amount can not be null or empty");
            }
            else {
                $this->orderId = $orderId;
                $this->refId = $refId;
                $this->txnId = $txnId;
                $this->txnType = $txnType;
                $this->refundAmount = $refundAmount;
            }
        }

        /**
         * @return RefundDetail
         */
        public function build()
        {
            return new RefundDetail($this);
        }

        /**
         * @param string $orderId
         * @return $this
         */
        public function setOrderId($orderId)
        {
            $this->orderId = $orderId;
            return $this;
        }

        /**
         * @param string $refId
         * @return $this
         */
        public function setRefId($refId)
        {
            $this->refId = $refId;
            return $this;
        }

        /**
         * @param array $extraParamsMap
         * @return $this
         */
        public function setExtraParamsMap($extraParamsMap)
        {
            $this->extraParamsMap = $extraParamsMap;
            return $this;
        }

        /**
         * @param string $txnId
         * @return $this
         */
        public function setTxnId($txnId)
        {
            $this->txnId = $txnId;
            return $this;
        }
        
        /**
         * @param string txnType
         * @return $this
         */
        public function setTxnType($txnType) 
        {
            $this->txnType = $txnType;
            return this;
         }

        /**
         * @param string $refundAmount
         * @return $this
         */
        public function setRefundAmount($refundAmount)
        {
            $this->refundAmount = $refundAmount;
            return $this;
        }

        /**
         * @param string $comments
         * @return $this
         */
        public function setComments($comments)
        {
            $this->comments = $comments;
            return $this;
        }

        /**
         * @param array $subwalletAmount
         * @return $this
         */
        public function setSubwalletAmount($subwalletAmount)
        {
            $this->subwalletAmount = $subwalletAmount;
            return $this;
        }

        /**
         * @param int $readTimeout
         * @return $this
         */
        public function setReadTimeout($readTimeout)
        {
            $this->readTimeout = $readTimeout;
            return $this;
        }
    }