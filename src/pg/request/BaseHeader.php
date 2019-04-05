<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    use JsonSerializable;
    use paytmpg\pg\enums\EChannelId;

    /**
     * Class BaseHeader
     * @package Paytm\pg\request
     */
    class BaseHeader implements JsonSerializable
    {

        /**
         * @var string
         */
        public $version;

        /**
         * @var EChannelId
         */
        public $channelId;

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
         * @return string
         */
        public function getChannelId()
        {
            return $this->channelId;
        }

        /**
         * @param string $channelId
         */
        public function setChannelId($channelId)
        {
            $this->channelId = $channelId;
        }

        /**
         * BaseHeader constructor.
         */
        public function __construct()
        {
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'version' => $this->getVersion(),
                    'channelId' => $this->getChannelId()
                ];
        }
    }
