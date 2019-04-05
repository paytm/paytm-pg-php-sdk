<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response\interfaces;

    use paytmpg\pg\response\BaseResponseBody;
    use paytmpg\pg\response\ResponseHeader;

    /**
     * Interface Response
     * @package Paytm\pg\response\interfaces
     */
    interface Response
    {

        /**
         * @return ResponseHeader
         */
        public function getHead();

        /**
         * @return BaseResponseBody
         */
        public function getBody();
    }
