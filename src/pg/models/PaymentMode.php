<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\models;

    use JsonSerializable;

    /**
     * Class PaymentMode
     * @package Paytm\pg\models
     */
    class PaymentMode implements JsonSerializable
    {
        /**
         * @var string
         */
        private $mode;

        /**
         * @var array
         */
        private $channels = array();

        /**
         * Paytm\pg\models\PaymentMode constructor.
         */
        public function __construct()
        {
        }

        /**
         * @return string
         */
        public function getMode()
        {
            return $this->mode;
        }

        /**
         * @param string $mode
         */
        public function setMode($mode)
        {
            $this->mode = $mode;
        }

        /**
         * @return array
         */
        public function getChannels()
        {
            return $this->channels;
        }

        /**
         * @param array $channels
         */
        public function setChannels($channels = array())
        {
            $this->channels = $channels;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return [
                'paymentMode' => [
                    'mode' => $this->mode,
                    'channels' => $this->channels
                ]
            ];
        }
    }
