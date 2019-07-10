<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    use paytmpg\pg\response\interfaces\SecureResponse;

    /**
     * Class AsyncRefundResponse
     * @package Paytm\pg\response
     */
    class AsyncRefundResponse implements SecureResponse
    {

        /**
         * @var SecureResponseHeader
         */
        private $head;

        /**
         * @var AsyncRefundResponseBody
         */
        private $body;

        /**
         * @return SecureResponseHeader
         */
        public function getHead()
        {
            return $this->head;
        }

        /**
         * AsyncRefundResponse constructor.
         * @param SecureResponseHeader    $head
         * @param AsyncRefundResponseBody $body
         */
        public function __construct($head, $body)
        {
            $this->head = $head;
            $this->body = $body;
        }

        /**
         * @param SecureResponseHeader $head
         */
        public function setHead($head)
        {
            $this->head = $head;
        }

        /**
         * @return AsyncRefundResponseBody|BaseResponseBody
         */
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @param AsyncRefundResponseBody $body
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
