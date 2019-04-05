<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    /**
     * Class RequestHeader
     * @package Paytm\pg\request
     */
    class RequestHeader extends BaseHeader
    {

        /**
         * @var string
         */
        public $requestTimestamp;

        /**
         * @var string
         */
        private $workFlow;

        /**
         * @return string
         */
        public function getRequestTimestamp()
        {
            return $this->requestTimestamp;
        }

        /**
         * @param string $requestTimestamp
         */
        public function setRequestTimestamp($requestTimestamp)
        {
            $this->requestTimestamp = $requestTimestamp;
        }

        /**
         * @return string
         */
        public function getWorkFlow()
        {
            return $this->workFlow;
        }

        /**
         * @param string $workFlow
         */
        public function setWorkFlow($workFlow)
        {
            $this->workFlow = $workFlow;
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
                    '$requestTimestamp' => $this->getRequestTimestamp(),
                    'workFlow' => $this->getWorkFlow()
                ];
        }
    }
