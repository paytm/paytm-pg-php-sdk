<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\merchant\models;

    use paytmpg\merchant\models\RefundStatusDetail\RefundStatusDetailBuilder;
    use paytmpg\pg\constants\MerchantProperties;
    use paytmpg\pg\request\NativeRefundStatusRequestBody;

    /**
     * This class is used to store all the refundStatusDetail information
     * Request of refundStatus api is translated by refundStatusDetail object
     *
     * Class RefundStatusDetail
     * @package Paytm\merchant\models
     */
    class RefundStatusDetail
    {

        /**
         * Unique order for each order request
         *
         * @var string
         * required
         */
        private $orderId;
        /**
         * Unique ref id for each refund request
         *
         * @var string $refId
         * required
         */
        private $refId;

        /**
         * @var int $readTimeout
         * optional
         */
        private $readTimeout;

        /**
         * RefundStatusDetail constructor.
         * @param RefundStatusDetailBuilder $refundStatusDetailBuilder
         */
        public function __construct($refundStatusDetailBuilder)
        {
            $this->orderId = $refundStatusDetailBuilder->orderId;
            $this->refId = $refundStatusDetailBuilder->refId;
            $this->readTimeout = $refundStatusDetailBuilder->readTimeout;
        }

        /**
         * @return NativeRefundStatusRequestBody
         */
        public function createNativeRefundStatusRequestBody()
        {
            return new NativeRefundStatusRequestBody(MerchantProperties::getMid(), $this->orderId, $this->refId);
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
         * @return int
         */
        public function getReadTimeout()
        {
            return $this->readTimeout;
        }
    }
