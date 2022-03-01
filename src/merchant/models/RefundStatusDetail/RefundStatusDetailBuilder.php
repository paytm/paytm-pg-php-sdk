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

    namespace paytmpg\merchant\models\RefundStatusDetail;

    use paytmpg\merchant\models\RefundStatusDetail;
    use paytmpg\pg\exceptions\SDKException;
    use paytmpg\pg\utils\CommonUtil;

    /**
     *
     */

    /**
     * RefundStatusDetailBuilder is used to build the refundStatusDetail object
     *
     * Class RefundStatusDetailBuilder
     * @package Paytm\merchant\models\RefundStatusDetail
     */
    class RefundStatusDetailBuilder
    {
        /**
         * Unique order for each order request
         *
         * @var string
         * required
         */
        public $orderId;
        /**
         * Unique ref id for each refund request
         *
         * @var string $refId
         * required
         */
        public $refId;

        /**
         * @var int $readTimeout
         * optional
         */
        public $readTimeout;

        /**
         * RefundStatusDetailBuilder constructor.
         * @param string $orderId
         * @param string $refId
         * @throws \Exception
         */
        public function __construct($orderId, $refId)
        {
            if (CommonUtil::checkStringForEmptyOrNull($orderId)) {
                throw new SDKException("OrderId can not be null or empty");
            }
            elseif (CommonUtil::checkStringForEmptyOrNull($refId)) {
                throw new SDKException("RefId can not be null or empty");
            }
            else {
                $this->orderId = $orderId;
                $this->refId = $refId;
            }
        }

        /**
         * builder method
         * @return RefundStatusDetail
         */
        public function build()
        {
            return new RefundStatusDetail($this);
        }

        /**
         * @param $readTimeout
         * @return $this
         */
        public function setReadTimeout($readTimeout)
        {
            $this->readTimeout = $readTimeout;
            return $this;
        }
    }