<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    /**
     * Class RefundBaseRequest
     * @package Paytm\pg\request
     */
    class RefundBaseRequest extends ExtraParameterMap
    {

        /**
         * @var string
         */
        protected $mid;

        /**
         * @var string
         */
        protected $orderId;

        /**
         * @var string
         */
        protected $refId;

        /**
         * RefundBaseRequest constructor.
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
                    'mid' => $this->getMid(),
                    'orderId' => $this->getOrderId(),
                    'refId' => $this->getRefId(),
                    'extraParamsMap' => $this->getExtraParamsMap()
                ];
        }
    }
