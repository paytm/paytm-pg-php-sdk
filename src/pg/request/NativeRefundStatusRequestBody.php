<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    use JsonSerializable;

    /**
     * Class NativeRefundStatusRequestBody
     * @package Paytm\pg\request
     */
    class NativeRefundStatusRequestBody implements JsonSerializable
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
        private $refId;

        /**
         * NativeRefundStatusRequestBody constructor.
         * @param string $mid
         * @param string $orderId
         * @param string $refId
         */
        public function __construct($mid, $orderId, $refId)
        {
            $this->mid = $mid;
            $this->orderId = $orderId;
            $this->refId = $refId;
        }

        /**
         * @return string
         */
        public function getmid()
        {
            return $this->mid;
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
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'mid' => $this->getmid(),
                    'orderId' => $this->getOrderId(),
                    'refId' => $this->getRefId()
                ];
        }
    }