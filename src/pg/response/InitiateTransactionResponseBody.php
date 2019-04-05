<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    /**
     * Class InitiateTransactionResponseBody
     * @package Paytm\pg\response
     */
    class InitiateTransactionResponseBody extends BaseResponseBody
    {
        /**
         * @var string
         */
        private $txnToken;

        /**
         * @var bool
         */
        private $isPromoCodeValid;

        /**
         * @var string
         */
        private $subscriptionId;

        /**
         * @var bool
         */
        private $isAuthenticated;

        /**
         * @var string
         */
        private $callbackUrl;

        /**
         * Paytm\pg\response\InitiateTransactionResponseBody constructor.
         */
        public function __construct()
        {
        }

        /**
         * @return string
         */
        public function getTxnToken()
        {
            return $this->txnToken;
        }

        /**
         * @param string $txnToken
         */
        public function setTxnToken($txnToken)
        {
            $this->txnToken = $txnToken;
        }

        /**
         * @return bool
         */
        public function isAuthenticated()
        {
            return $this->isAuthenticated;
        }

        /**
         * @param bool $isAuthenticated
         */
        public function setAuthenticated($isAuthenticated)
        {
            $this->isAuthenticated = $isAuthenticated;
        }

        /**
         * @return bool
         */
        public function isPromocodeValid()
        {
            return $this->isPromoCodeValid;
        }

        /**
         * @param bool $isPromoCodeValid
         */
        public function setPromocodeValid($isPromoCodeValid)
        {
            $this->isPromoCodeValid = $isPromoCodeValid;
        }

        /**
         * @return string
         */
        public function getSubscriptionId()
        {
            return $this->subscriptionId;
        }

        /**
         * @param string $subscriptionId
         */
        public function setSubscriptionId($subscriptionId)
        {
            $this->subscriptionId = $subscriptionId;
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
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'txnToken' => $this->getTxnToken(),
                    'isPromoCodeValid' => $this->isPromocodeValid(),
                    'subscriptionId' => $this->getSubscriptionId(),
                    'isAuthenticated' => $this->isAuthenticated(),
                    'callbackUrl' => $this->getCallbackUrl(),
                    'resultInfo' => $this->getResultInfo(),
                    'extraParamsMap' => $this->getExtraParamsMap()
                ];
        }
    }