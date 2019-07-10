<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    use paytmpg\pg\constants\LibraryConstants;

    /**
     * Class SecureRequestHeader
     * @package Paytm\pg\request
     */
    class SecureRequestHeader extends RequestHeader
    {
        /**
         * @var string
         */
        private $clientId;

        /**
         * @var string
         */
        private $signature;

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
         * @param string $clientId
         * @param string $workFlow
         * @param string $channelId
         * @return SecureRequestHeader
         */
        public function getSecureRequestHeader($clientId, $workFlow, $channelId)
        {
            $secureRequestHeader = new SecureRequestHeader();
            $secureRequestHeader->setVersion(LibraryConstants::VERSION);
            $secureRequestHeader->setChannelId($channelId);
            $secureRequestHeader->setRequestTimestamp(date('Y-m-d h:i:s T'));
            $secureRequestHeader->setWorkFlow($workFlow);
            $secureRequestHeader->setClientId($clientId);
            return $secureRequestHeader;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'version' => $this->getVersion(),
                    'channelId' => $this->getChannelId(),
                    'requestTimestamp' => $this->getRequestTimestamp(),
                    'workFlow' => $this->getWorkFlow(),
                    'clientId' => $this->getClientId(),
                    'signature' => $this->getSignature()
                ];
        }
    }