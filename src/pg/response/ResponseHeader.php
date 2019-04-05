<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    use JsonSerializable;

    /**
     * Class ResponseHeader
     * @package Paytm\pg\response
     */
    class ResponseHeader implements JsonSerializable
    {

        /**
         * @var string
         */
        public $responseTimestamp;

        /**
         * @var string
         */
        public $version;

        /**
         * ResponseHeader constructor.
         */
        public function __construct()
        {
            $this->responseTimestamp = date('Y-m-d h:i:s T');
            $this->version = "v2";
        }

        /**
         * @return string
         */
        public function getResponseTimestamp()
        {
            return $this->responseTimestamp;
        }

        /**
         * @param string $responseTimestamp
         */
        public function setResponseTimestamp($responseTimestamp)
        {
            $this->responseTimestamp = $responseTimestamp;
        }

        /**
         * @return string
         */
        public function getVersion()
        {
            return $this->version;
        }

        /**
         * @param string $version
         */
        public function setVersion($version)
        {
            $this->version = $version;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'responseTimestamp' => $this->getResponseTimestamp(),
                    'version' => $this->getVersion()
                ];
        }
    }
