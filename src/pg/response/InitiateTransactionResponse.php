<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    use paytmpg\pg\response\interfaces\SecureResponse;

    /**
     * Class InitiateTransactionResponse
     * @package Paytm\pg\response
     */
    class InitiateTransactionResponse implements SecureResponse
    {

        /**
         * @var SecureResponseHeader
         */
        private $head;

        /**
         * @var InitiateTransactionResponseBody
         */
        private $body;

        /**
         * InitiateTransactionResponse constructor.
         * @param SecureResponseHeader            $head
         * @param InitiateTransactionResponseBody $body
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
         * @return BaseResponseBody|InitiateTransactionResponseBody
         */
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @param InitiateTransactionResponseBody $body
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

