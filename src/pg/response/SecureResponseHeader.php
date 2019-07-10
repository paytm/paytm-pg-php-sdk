<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    /**
     * Class SecureResponseHeader
     * @package Paytm\pg\response
     */
    class SecureResponseHeader extends ResponseHeader
    {

        /**
         * @var string
         */
        public $clientId;

        /**
         * @var string
         */
        public $signature;

        /**
         * @return string
         */
        public function getClientId()
        {
            return $this->clientId;
        }

        /**
         * @param string $clientId
         */
        public function setClientId($clientId)
        {
            $this->clientId = $clientId;
        }

        /**
         * @return string
         */
        public function getSignature()
        {
            return $this->signature;
        }

        /**
         * @param string $signature
         */
        public function setSignature($signature)
        {
            $this->signature = $signature;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'clientId' => $this->getClientId(),
                    'signature' => $this->getSignature(),
                    'responseTimestamp' => $this->getResponseTimestamp(),
                    'version' => $this->getVersion()
                ];
        }
    }
