<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    use JsonSerializable;
    use paytmpg\pg\request\ExtraParameterMap;

    /**
     * Class BaseResponseBody
     * @package Paytm\pg\response
     */
    class BaseResponseBody extends ExtraParameterMap implements JsonSerializable
    {

        /**
         * @var ResultInfo
         */
        private $resultInfo;

        /**
         * BaseResponseBody constructor.
         */
        public function __construct()
        {
        }

        /**
         * @return ResultInfo
         */
        public function getResultInfo()
        {
            return $this->resultInfo;
        }

        /**
         * @param ResultInfo $resultInfo
         */
        public function setResultInfo($resultInfo)
        {
            $this->resultInfo = $resultInfo;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'resultInfo' => $this->getResultInfo(),
                    'extraParamsMap' => $this->getExtraParamsMap(),
                ];
        }
    }