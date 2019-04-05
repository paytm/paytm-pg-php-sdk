<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    /**
     * Class RefundInitiateRequestBody
     * @package Paytm\pg\request
     */
    class RefundInitiateRequestBody extends RefundBaseRequest
    {
        /**
         * @var string
         */
        private $txnId;

        /**
         * @var string
         */
        private $refundAmount;

        /**
         * @var string
         */
        private $comments;

        /**
         * @var string
         */
        private $txnType;

        /**
         * @var string
         */
        private $preferredDestination;

        /**
         * @var string
         */
        private $requestId;

        /**
         * @var array
         */
        private $subwalletAmount;

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

        /*@Size(
            max = 255,
            message = "Length validation failed on "
        )*/
        /**
         * @return string
         */
        public function getComments()
        {
            return $this->comments;
        }

        /**
         * @param string $comments
         */
        public function setComments($comments)
        {
            $this->comments = $comments;
        }

        /**
         * @return string
         */
        public function getPreferredDestination()
        {
            return $this->preferredDestination;
        }

        /**
         * @param string $preferredDestination
         */
        public function setPreferredDestination($preferredDestination)
        {
            $this->preferredDestination = $preferredDestination;
        }

        /**
         * @return string
         */
        public function getRequestId()
        {
            if ($this->requestId != null && !is_null($this->requestId)) {
                return $this->requestId;
            }
            else {
                return $this->getRefId();
            }
        }

        /**
         * @param string $requestId
         */
        public function setRequestId($requestId)
        {
            $this->requestId = $requestId;
        }

        /**
         * @return array
         */
        public function getSubwalletAmount()
        {
            return $this->subwalletAmount;
        }

        /**
         * @param array $subwalletAmount
         */
        public function setSubwalletAmount($subwalletAmount)
        {
            $this->subwalletAmount = $subwalletAmount;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'txnId' => $this->getTxnId(),
                    'refundAmount' => $this->getRefundAmount(),
                    'comments' => $this->getComments(),
                    'txnType' => $this->getTxnType(),
                    'preferredDestination' => $this->getPreferredDestination(),
                    'requestId' => $this->getRequestId(),
                    'subwalletAmount' => $this->getSubwalletAmount(),
                    'mid' => $this->getMid(),
                    'orderId' => $this->getOrderId(),
                    'refId' => $this->getRefId(),
                    'extraParamsMap' => $this->getExtraParamsMap()
                ];
        }
    }
