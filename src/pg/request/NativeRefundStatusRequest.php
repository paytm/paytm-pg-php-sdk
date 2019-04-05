<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    use JsonSerializable;

    /**
     * Class NativeRefundStatusRequest
     * @package Paytm\pg\request
     */
    class NativeRefundStatusRequest implements JsonSerializable
    {

        /**
         * @var SecureRequestHeader
         */
        private $head;

        /**
         * @var NativeRefundStatusRequestBody
         */
        private $body;

        public function getHead()
        {
            return $this->head;
        }

        /**
         * @param SecureRequestHeader $head
         */
        public function setHead($head)
        {
            $this->head = $head;
        }

        /**
         * @return NativeRefundStatusRequestBody
         */
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @param NativeRefundStatusRequestBody $body
         */
        public function setBody($body)
        {
            $this->body = $body;
        }

        /**
         * NativeRefundStatusRequest constructor.
         * @param SecureRequestHeader           $head
         * @param NativeRefundStatusRequestBody $body
         */
        public function __construct($head, $body)
        {
            $this->head = $head;
            $this->body = $body;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'head' => $this->getHead(),
                    'body' => $this->getBody()
                ];
        }

    }