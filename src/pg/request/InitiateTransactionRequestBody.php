<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    use JsonSerializable;
    use paytmpg\pg\models\ExtendInfo;
    use paytmpg\pg\models\Money;
    use paytmpg\pg\models\UserInfo;

    /**
     * Class InitiateTransactionRequestBody
     * @package Paytm\pg\request
     */
    class InitiateTransactionRequestBody implements JsonSerializable
    {
        /**
         * @var string
         */
        private $requestType;

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
        private $websiteName;

        /**
         * @var Money
         */
        private $txnAmount;

        /**
         * @var UserInfo
         */
        private $userInfo;

        /**
         * @var string
         */
        private $paytmSsoToken;

        /**
         * @var array
         */
        private $enablePaymentMode = array();

        /**
         * @var array
         */
        private $disablePaymentMode = array();

        /**
         * @var string
         */
        private $promoCode;

        /**
         * @var string
         */
        private $callbackUrl;

        /**
         * @var array
         */
        private $goods = array();

        /**
         * @var array
         */
        private $shippingInfo = array();

        /**
         * @var ExtendInfo
         */
        private $extendInfo;

        /**
         * @var string
         */
        private $emiOption;

        /**
         * @var string
         */
        private $cardTokenRequired;

        /**
         * @var string
         */
        private $cartValidationRequired;

        /**
         * @return string
         */
        public function getCartValidationRequired()
        {
            return $this->cartValidationRequired;
        }

        /**
         * @param string $cartValidationRequired
         */
        public function setCartValidationRequired($cartValidationRequired)
        {
            $this->cartValidationRequired = $cartValidationRequired;
        }

        /**
         * @return string
         */
        public function getEmiOption()
        {
            return $this->emiOption;
        }

        /**
         * @param string $emiOption
         */
        public function setEmiOption($emiOption)
        {
            $this->emiOption = $emiOption;
        }

        /**
         * @return string
         */
        public function getRequestType()
        {
            return $this->requestType;
        }

        /**
         * @param string $requestType
         */
        public function setRequestType($requestType)
        {
            $this->requestType = $requestType;
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
        public function getWebsiteName()
        {
            return $this->websiteName;
        }

        /**
         * @param string $websiteName
         */
        public function setWebsiteName($websiteName)
        {
            $this->websiteName = $websiteName;
        }

        /**
         * @return \Paytm\pg\models\Money
         */
        public function getTxnAmount()
        {
            return $this->txnAmount;
        }

        /**
         * @param Money $txnAmount
         */
        public function setTxnAmount($txnAmount)
        {
            $this->txnAmount = $txnAmount;
        }

        /**
         * @return UserInfo
         */
        public function getUserInfo()
        {
            return $this->userInfo;
        }

        /**
         * @param UserInfo $userInfo
         */
        public function setUserInfo($userInfo)
        {
            $this->userInfo = $userInfo;
        }

        /**
         * @return string
         */
        public function getPaytmSsoToken()
        {
            return $this->paytmSsoToken;
        }

        /**
         * @param string $paytmSsoToken
         */
        public function setPaytmSsoToken($paytmSsoToken)
        {
            $this->paytmSsoToken = $paytmSsoToken;
        }

        /**
         * @return array
         */
        public function getEnablePaymentMode()
        {
            return $this->enablePaymentMode;
        }

        /**
         * @param array $enablePaymentMode
         */
        public function setEnablePaymentMode($enablePaymentMode)
        {
            $this->enablePaymentMode = $enablePaymentMode;
        }

        /**
         * @return array
         */
        public function getDisablePaymentMode()
        {
            return $this->disablePaymentMode;
        }

        /**
         * @param array $disablePaymentMode
         */
        public function setDisablePaymentMode($disablePaymentMode)
        {
            $this->disablePaymentMode = $disablePaymentMode;
        }

        /**
         * @return string
         */
        public function getPromoCode()
        {
            return $this->promoCode;
        }

        /**
         * @param string $promoCode
         */
        public function setPromoCode($promoCode)
        {
            $this->promoCode = $promoCode;
        }

        /**
         * @return string
         */
        public function getCallbackUrl()
        {
            return $this->callbackUrl;
        }

        /**
         * @param string $callbackUrl
         */
        public function setCallbackUrl($callbackUrl)
        {
            $this->callbackUrl = $callbackUrl;
        }

        /**
         * @return array
         */
        public function getGoods()
        {
            return $this->goods;
        }

        /**
         * @param array $goods
         */
        public function setGoods($goods)
        {
            $this->goods = $goods;
        }

        /**
         * @return array
         */
        public function getShippingInfo()
        {
            return $this->shippingInfo;
        }

        /**
         * @param array $shippingInfo
         */
        public function setShippingInfo($shippingInfo)
        {
            $this->shippingInfo = $shippingInfo;
        }

        /**
         * @return \Paytm\pg\models\ExtendInfo
         */
        public function getExtendInfo()
        {
            return $this->extendInfo;
        }

        /**
         * @param ExtendInfo $extendInfo
         */
        public function setExtendInfo($extendInfo)
        {
            $this->extendInfo = $extendInfo;
        }

        /**
         * @return string
         */
        public function getCardTokenRequired()
        {
            return $this->cardTokenRequired;
        }

        /**
         * @param string $cardTokenRequired
         */
        public function setCardTokenRequired($cardTokenRequired)
        {
            $this->cardTokenRequired = $cardTokenRequired;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'requestType' => $this->getRequestType(),
                    'mid' => $this->getMid(),
                    'orderId' => $this->getOrderId(),
                    'websiteName' => $this->getWebsiteName(),
                    'txnAmount' => $this->getTxnAmount(),
                    'userInfo' => $this->getUserInfo(),
                    'paytmSsoToken' => $this->getPaytmSsoToken(),
                    'enablePaymentMode' => $this->getEnablePaymentMode(),
                    'disablePaymentMode' => $this->getDisablePaymentMode(),
                    'promoCode' => $this->getPromoCode(),
                    'callbackUrl' => $this->getCallbackUrl(),
                    'goods' => $this->getGoods(),
                    'shippingInfo' => $this->getShippingInfo(),
                    'extendInfo' => $this->getExtendInfo(),
                    'emiOption' => $this->getEmiOption(),
                    'cardTokenRequired' => $this->getCardTokenRequired(),
                    'cartValidationRequired' => $this->getCartValidationRequired()
                ];
        }
    }