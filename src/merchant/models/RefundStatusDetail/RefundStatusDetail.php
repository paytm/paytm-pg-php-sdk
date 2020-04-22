<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

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