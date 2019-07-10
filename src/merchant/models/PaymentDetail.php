<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\merchant\models;

    use paytmpg\merchant\models\PaymentDetail\PaymentDetailBuilder;
    use paytmpg\pg\constants\LibraryConstants;
    use paytmpg\pg\constants\MerchantProperties;
    use paytmpg\pg\models\ExtendInfo;
    use paytmpg\pg\models\Money;
    use paytmpg\pg\models\UserInfo;
    use paytmpg\pg\request\InitiateTransactionRequestBody;

    /**
     * This class is used to store all the paymentDetail information
     * Request of initiateTransaction api is translated by paymentDetail object
     *
     * Class PaymentDetail
     * @package Paytm\merchant\models
     *
     */
    class PaymentDetail
    {
        /**
         * @var string
         * required
         */
        private $channelId;
        /**
         * @var string
         * required
         */
        private $orderId;
        /**
         * @var Money
         * required
         */
        private $txnAmount;
        /**
         * @var UserInfo
         * required
         */
        private $userInfo;
        /**
         * @var string
         * Paytm Token for a user
         * optional
         */
        private $paytmSsoToken;
        /**
         * @var array
         * optional
         */
        private $enablePaymentMode = array();
        /**
         * @var array
         * optional
         */
        private $disablePaymentMode = array();
        /**
         * @var array
         * optional
         */
        private $goods = array();
        /**
         * @var array
         * optional
         */
        private $shippingInfo = array();
        /**
         * @var string
         * optional
         */
        private $promoCode;
        /**
         * @var ExtendInfo
         * optional
         */
        private $extendInfo;
        /**
         * @var string
         * optional
         */
        private $emiOption;
        /**
         * @var string
         * optional
         */
        private $cardTokenRequired;
        /**
         * @var int
         * Read TimeOut for Payment Api
         * optional
         */
        private $readTimeout;

        /**
         * PaymentDetail constructor.
         * @param PaymentDetailBuilder $paymentDetailBuilder
         */
        public function __construct($paymentDetailBuilder)
        {
            $this->channelId = $paymentDetailBuilder->channelId;
            $this->orderId = $paymentDetailBuilder->orderId;
            $this->txnAmount = $paymentDetailBuilder->txnAmount;
            $this->userInfo = $paymentDetailBuilder->userInfo;

            $this->paytmSsoToken = $paymentDetailBuilder->paytmSsoToken;
            $this->enablePaymentMode = $paymentDetailBuilder->enablePaymentMode;
            $this->disablePaymentMode = $paymentDetailBuilder->disablePaymentMode;
            $this->goods = $paymentDetailBuilder->goods;
            $this->shippingInfo = $paymentDetailBuilder->shippingInfo;
            $this->extendInfo = $paymentDetailBuilder->extendInfo;
            $this->promoCode = $paymentDetailBuilder->promoCode;
            $this->emiOption = $paymentDetailBuilder->emiOption;
            $this->cardTokenRequired = $paymentDetailBuilder->cardTokenRequired;
            $this->readTimeout = $paymentDetailBuilder->readTimeout;
        }

        /**
         * @return string
         */
        public function getChannelId()
        {
            return $this->channelId;
        }

        /**
         * @return string
         */
        public function getPromoCode()
        {
            return $this->promoCode;
        }

        /**
         * @return ExtendInfo
         */
        public function getExtendInfo()
        {
            return $this->extendInfo;
        }

        /**
         * @return string
         */
        public function getEmiOption()
        {
            return $this->emiOption;
        }

        /**
         * @return string
         */
        public function getCardTokenRequired()
        {
            return $this->cardTokenRequired;
        }

        /**
         * @return string
         */
        public function getOrderId()
        {
            return $this->orderId;
        }

        /**
         * @return Money
         */
        public function getTxnAmount()
        {
            return $this->txnAmount;
        }

        /**
         * @return UserInfo
         */
        public function getUserInfo()
        {
            return $this->userInfo;
        }

        /**
         * @return string
         */
        public function getPaytmSsoToken()
        {
            return $this->paytmSsoToken;
        }

        /**
         * @return array of PaymentMode
         */
        public function getEnablePaymentMode()
        {
            return $this->enablePaymentMode;
        }

        /**
         * @return array of PaymentMode
         */
        public function getDisablePaymentMode()
        {
            return $this->disablePaymentMode;
        }

        /**
         * @return array of GoodsInfo
         */
        public function getGoods()
        {
            return $this->goods;
        }

        /**
         * @return array of ShippingInfo
         */
        public function getShippingInfo()
        {
            return $this->shippingInfo;
        }

        /**
         * @return int
         */
        public function getReadTimeout()
        {
            return $this->readTimeout;
        }

        /**
         * @return InitiateTransactionRequestBody
         */
        public function createInitiateTransactionRequestBody()
        {
            $body = new InitiateTransactionRequestBody();
            $body->setRequestType(LibraryConstants::REQUEST_TYPE_PAYMENT);
            $body->setMid(MerchantProperties::getMid());
            $body->setOrderId($this->getOrderId());
            $body->setWebsiteName(MerchantProperties::getWebsite());
            $body->setTxnAmount($this->getTxnAmount());
            $body->setUserInfo($this->getUserInfo());
            $body->setPaytmSsoToken($this->getPaytmSsoToken());
            $body->setEnablePaymentMode($this->getEnablePaymentMode());
            $body->setDisablePaymentMode($this->getDisablePaymentMode());
            $body->setPromoCode($this->getPromoCode());
            $body->setCallbackUrl(MerchantProperties::getCallbackUrl());
            $body->setGoods($this->getGoods());
            $body->setShippingInfo($this->getShippingInfo());
            $body->setExtendInfo($this->getExtendInfo());
            $body->setEmiOption($this->getEmiOption());
            $body->setCardTokenRequired($this->getCardTokenRequired());
            return $body;
        }
    }


    namespace paytmpg\merchant\models\PaymentDetail;

    use paytmpg\merchant\models\paymentDetail;
    use paytmpg\pg\exceptions\SDKException;
    use paytmpg\pg\models\ExtendInfo;
    use paytmpg\pg\models\Money;
    use paytmpg\pg\models\UserInfo;
    use paytmpg\pg\utils\CommonUtil;

    /**
     * PaymentDetailBuilder is used to build the paymentDetail object
     *
     * Class PaymentDetailBuilder
     * @package Paytm\merchant\models\PaymentDetail
     */
    class PaymentDetailBuilder
    {

        /**
         * @var string
         */
        public $channelId;
        /**
         * @var string
         */
        public $orderId;
        /**
         * @var Money
         */
        public $txnAmount;
        /**
         * @var UserInfo
         */
        public $userInfo;
        /**
         * @var string
         */
        public $paytmSsoToken;
        /**
         * @var array of PaymentMode
         */
        public $enablePaymentMode;
        /**
         * @var array of PaymentMode
         */
        public $disablePaymentMode;
        /**
         * @var array of GoodsInfo
         */
        public $goods;
        /**
         * @var array of ShippingInfo
         */
        public $shippingInfo;
        /**
         * @var string
         */
        public $promoCode;
        /**
         * @var ExtendInfo
         */
        public $extendInfo;
        /**
         * @var string
         */
        public $emiOption;
        /**
         * @var string
         */
        public $cardTokenRequired;
        /**
         * @var int
         * Default value of readTimeout is 80000
         */
        public $readTimeout = 80000;

        /**
         * PaymentDetailBuilder constructor.
         * @param string (EChannelId) $channelId
         * @param string   $orderId
         * @param Money    $txnAmount
         * @param UserInfo $userInfo
         * @throws \Exception
         */
        public function __construct($channelId, $orderId, $txnAmount, $userInfo)
        {
            if (CommonUtil::checkStringForEmptyOrNull($channelId)) {
                throw new SDKException("ChannelId can not be null or empty");
            }
            elseif (CommonUtil::checkStringForEmptyOrNull($orderId)) {
                throw new SDKException("OrderId can not be null or empty");
            }
            elseif (!$txnAmount instanceof Money) {
                throw new SDKException("Txn amount should be of type Paytm\pg\models\Money");
            }
            elseif (!$userInfo instanceof UserInfo) {
                throw new SDKException("User info should be of type Paytm\pg\models\UserInfo");
            }
            else {
                $this->channelId = $channelId;
                $this->orderId = $orderId;
                $this->txnAmount = $txnAmount;
                $this->userInfo = $userInfo;
            }
        }

        /**
         * @return paymentDetail
         */
        public function build()
        {
            return new paymentDetail($this);
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
         * @param string $channelId
         */
        public function setChannelId($channelId)
        {
            $this->channelId = $channelId;
        }

        /**
         * @param string $promoCode
         * @return $this
         */
        public function setPromoCode($promoCode)
        {
            $this->promoCode = $promoCode;
            return $this;
        }

        /**
         * @param ExtendInfo $extendInfo
         * @return $this
         */
        public function setExtendInfo($extendInfo)
        {
            $this->extendInfo = $extendInfo;
            return $this;
        }

        /**
         * @param string $emiOption
         * @return $this
         */
        public function setEmiOption($emiOption)
        {
            $this->emiOption = $emiOption;
            return $this;
        }

        /**
         * @param string $cardTokenRequired
         * @return $this
         */
        public function setCardTokenRequired($cardTokenRequired)
        {
            $this->cardTokenRequired = $cardTokenRequired;
            return $this;
        }

        /**
         * @param Money $txnAmount
         * @return $this
         */
        public function setTxnAmount($txnAmount)
        {
            $this->txnAmount = $txnAmount;
            return $this;
        }

        /**
         * @param UserInfo $userInfo
         * @return $this
         */
        public function setUserInfo($userInfo)
        {
            $this->userInfo = $userInfo;
            return $this;
        }

        /**
         * @param string $paytmSsoToken
         * @return $this
         */
        public function setPaytmSsoToken($paytmSsoToken)
        {
            $this->paytmSsoToken = $paytmSsoToken;
            return $this;
        }

        /**
         * @param array (PaymentMode) $enablePaymentMode
         * @return $this
         */
        public function setEnablePaymentMode($enablePaymentMode)
        {
            $this->enablePaymentMode = $enablePaymentMode;
            return $this;
        }

        /**
         * @param array (PaymentMode) $disablePaymentMode
         * @return $this
         */
        public function setDisablePaymentMode($disablePaymentMode)
        {
            $this->disablePaymentMode = $disablePaymentMode;
            return $this;
        }

        /**
         * @param array (GoodsInfo) $goods
         * @return $this
         */
        public function setGoods($goods)
        {
            $this->goods = $goods;
            return $this;
        }

        /**
         * @param array (ShippingInfo) $shippingInfo
         * @return $this
         */
        public function setShippingInfo($shippingInfo)
        {
            $this->shippingInfo = $shippingInfo;
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