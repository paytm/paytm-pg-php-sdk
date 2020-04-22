<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\merchant\models\PaymentStatusDetail;

    use paytmpg\merchant\models\PaymentStatusDetail;
    use paytmpg\pg\exceptions\SDKException;
    use paytmpg\pg\utils\CommonUtil;

    /**
     * PaymentStatusDetailBuilder is used to build the paymentStatus object
     *
     * Class PaymentStatusDetailBuilder
     * @package Paytm\merchant\models\PaymentStatusDetail
     */
    class PaymentStatusDetailBuilder
    {

        /**
         * @var string
         * required
         */
        public $orderId;
        /**
         * @var int
         * optional
         * Default value of readTimeout is  80000
         */
        public $readTimeout = 80000;

        /**
         * PaymentStatusDetailBuilder constructor.
         * @param string $orderId
         * @throws \Exception
         */
        public function __construct($orderId)
        {
            if (CommonUtil::checkStringForEmptyOrNull($orderId)) {
                throw new SDKException("ChannelId can not be null or empty");
            }
            else {
                $this->orderId = $orderId;
            }
        }

        /**
         * @return PaymentStatusDetail
         */
        public function build()
        {
            return new PaymentStatusDetail($this);
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