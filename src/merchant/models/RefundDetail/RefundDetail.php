<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

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
         * @param string $refundAmount
         * @throws \Exception
         */
        public function __construct($orderId, $refId, $txnId, $refundAmount)
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
            elseif (CommonUtil::checkStringForEmptyOrNull($refundAmount)) {
                throw new SDKException("Refund amount can not be null or empty");
            }
            else {
                $this->orderId = $orderId;
                $this->refId = $refId;
                $this->txnId = $txnId;
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