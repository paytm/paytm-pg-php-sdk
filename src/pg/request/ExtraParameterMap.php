<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    use JsonSerializable;

    /**
     * Class ExtraParameterMap
     * @package Paytm\pg\request
     */
    class ExtraParameterMap implements JsonSerializable
    {

        /**
         * @var array
         */
        private $extraParamsMap = array();

        /**
         * Paytm\pg\request\ExtraParameterMap constructor.
         */
        protected function __construct()
        {
        }

        /**
         * @return array
         */
        public function getExtraParamsMap()
        {
            return $this->extraParamsMap;
        }

        /**
         * @param array $extraParamsMap
         */
        public function setExtraParamsMap($extraParamsMap = array())
        {
            $this->extraParamsMap = $extraParamsMap;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'extraParamsMap' => $this->getExtraParamsMap()
                ];
        }

    }
