<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\request;

    use JsonSerializable;

    /**
     * Class InitiateTransactionRequest
     * @package Paytm\pg\request
     */
    class InitiateTransactionRequest implements JsonSerializable
    {
        /**
         * @var SecureRequestHeader
         */
        private $head;

        /**
         * @var InitiateTransactionRequestBody
         */
        private $body;

        /**
         * @return SecureRequestHeader
         */
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
         * @return InitiateTransactionRequestBody
         */
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @param InitiateTransactionRequestBody $body
         */
        public function setBody($body)
        {
            $this->body = $body;
        }

        /**
         * InitiateTransactionRequest constructor.
         * @param SecureRequestHeader            $head
         * @param InitiateTransactionRequestBody $body
         */
        public function __construct($head, $body)
        {
            if (isset($head)) {
                $this->head = $head;
            }
            else {
                $this->head = null;
            }
            if (isset($body)) {
                $this->body = $body;
            }
            else {
                $this->body = null;
            }
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            $headObj = $this->getHead();
            $bodyObj = $this->getBody();
            return
                [
                    'head' => $headObj->jsonSerialize(),
                    'body' => $bodyObj->jsonSerialize()
                ];
        }
    }