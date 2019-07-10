<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    use paytmpg\pg\response\interfaces\SecureResponse;

    /**
     * Class NativePaymentStatusResponse
     * @package Paytm\pg\response
     */
    class NativePaymentStatusResponse implements SecureResponse
    {

        /**
         * @var SecureResponseHeader
         */
        public $head;

        /**
         * @var NativePaymentStatusResponseBody
         */
        public $body;

        /**
         * NativePaymentStatusResponse constructor.
         * @param SecureResponseHeader            $head
         * @param NativePaymentStatusResponseBody $body
         */
        public function __construct($head, $body)
        {
            $this->head = $head;
            $this->body = $body;
        }

        /**
         * @return SecureResponseHeader
         */
        public function getHead()
        {
            return $this->head;
        }

        /**
         * @param SecureResponseHeader $head
         */
        public function setHead($head)
        {
            $this->head = $head;
        }

        /**
         * @return BaseResponseBody|NativePaymentStatusResponseBody
         */
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @param NativePaymentStatusResponseBody $body
         */
        public function setBody($body)
        {
            $this->body = $body;
        }

        /**
         * @return array
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

