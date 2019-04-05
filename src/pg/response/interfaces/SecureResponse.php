<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response\interfaces;

    use paytmpg\pg\response\SecureResponseHeader;

    /**
     * Interface SecureResponse
     * @package Paytm\pg\response\interfaces
     */
    interface SecureResponse extends Response
    {

        /**
         * @return SecureResponseHeader
         */
        public function getHead();

    }
