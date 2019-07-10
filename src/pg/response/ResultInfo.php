<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    use JsonSerializable;

    /**
     * Class ResultInfo
     * @package Paytm\pg\response
     */
    class ResultInfo implements JsonSerializable
    {

        /**
         * @var string
         */
        public $resultStatus;

        /**
         * @var string
         */
        public $resultCode;

        /**
         * @var string
         */
        public $resultMsg;

        /**
         * @var bool
         */
        public $isRedirect;

        /**
         * ResultInfo constructor.
         */
        public function __construct()
        {
        }

        /**
         * @return string
         */
        public function getResultStatus()
        {
            return $this->resultStatus;
        }

        /**
         * @param string $resultStatus
         */
        public function setResultStatus($resultStatus)
        {
            $this->resultStatus = $resultStatus;
        }

        /**
         * @return string
         */
        public function getResultCode()
        {
            return $this->resultCode;
        }

        /**
         * @param string $resultCode
         */
        public function setResultCode($resultCode)
        {
            $this->resultCode = $resultCode;
        }

        /**
         * @return string
         */
        public function getResultMsg()
        {
            return $this->resultMsg;
        }

        /**
         * @param string $resultMsg
         */
        public function setResultMsg($resultMsg)
        {
            $this->resultMsg = $resultMsg;
        }

        /**
         * @return bool
         */
        public function isRedirect()
        {
            return $this->isRedirect;
        }

        /**
         * @param bool $isRedirect
         */
        public function setRedirect($isRedirect)
        {
            $this->isRedirect = $isRedirect;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'resultStatus' => $this->getResultStatus(),
                    'resultMsg' => $this->getResultMsg(),
                    'resultCode' => $this->getResultCode(),
                    'isRedirect' => $this->isRedirect()
                ];
        }
    }
