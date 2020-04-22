<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\merchant\models;

    use paytmpg\merchant\models\PaymentStatusDetail\PaymentStatusDetailBuilder;
    use paytmpg\pg\constants\MerchantProperties;
    use paytmpg\pg\request\NativePaymentStatusRequestBody;

    /**
     * This class is used to store all the paymentStatusDetail information
     * Request of getPaymentStatus api is translated by paymentStatusDetail object
     *
     * Class PaymentStatusDetail
     * @package Paytm\merchant\models
     */
    class PaymentStatusDetail
    {
        /**
         * @var string
         * required
         */
        private $orderId;
        /**
         * @var int
         * optional
         */
        private $readTimeout;

        /**
         * PaymentStatusDetail constructor.
         * @param PaymentStatusDetailBuilder $paymentStatusDetailBuilder
         */
        public function __construct($paymentStatusDetailBuilder)
        {
            $this->orderId = $paymentStatusDetailBuilder->orderId;
            $this->readTimeout = $paymentStatusDetailBuilder->readTimeout;
        }

        /**
         * @return string
         */
        public function getOrderId()
        {
            return $this->orderId;
        }

        /**
         * @return int
         */
        public function getReadTimeout()
        {
            return $this->readTimeout;
        }

        /**
         * @return NativePaymentStatusRequestBody
         */
        public function createNativePaymentStatusRequestBody()
        {
            $nativePaymentStatusRequestBody = new NativePaymentStatusRequestBody();
            $nativePaymentStatusRequestBody->setMid(MerchantProperties::getMid());
            $nativePaymentStatusRequestBody->setOrderId($this->orderId);
            return $nativePaymentStatusRequestBody;
        }
    }
