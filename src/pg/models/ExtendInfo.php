<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\models;

    use JsonSerializable;

    /**
     * Class ExtendInfo
     * @package Paytm\pg\models
     */
    class ExtendInfo implements JsonSerializable
    {
        /**
         * @var string
         */
        private $udf1;

        /**
         * @var string
         */
        private $udf2;

        /**
         * @var string
         */
        private $udf3;

        /**
         * @var string
         */
        private $mercUnqRef;

        /**
         * @var string
         */
        private $comments;

        /**
         * @var string
         */
        private $amountToBeRefunded;

        /**
         * @var string
         */
        private $subwalletAmount;

        /**
         * @param array $subwalletAmount
         */
        public function setSubwalletAmount($subwalletAmount = array())
        {
            $this->subwalletAmount = json_encode($subwalletAmount);
        }

        /**
         * @return string
         */
        public function getUdf1()
        {
            return $this->udf1;
        }

        /**
         * @param string $udf1
         */
        public function setUdf1($udf1)
        {
            $this->udf1 = $udf1;
        }

        /**
         * @return string
         */
        public function getUdf2()
        {
            return $this->udf2;
        }

        /**
         * @param string $udf2
         */
        public function setUdf2($udf2)
        {
            $this->udf2 = $udf2;
        }

        /**
         * @return string
         */
        public function getUdf3()
        {
            return $this->udf3;
        }

        /**
         * @param string $udf3
         */
        public function setUdf3($udf3)
        {
            $this->udf3 = $udf3;
        }

        /**
         * @return string
         */
        public function getMercUnqRef()
        {
            return $this->mercUnqRef;
        }

        /**
         * @param string $mercUnqRef
         */
        public function setMercUnqRef($mercUnqRef)
        {
            $this->mercUnqRef = $mercUnqRef;
        }

        /**
         * @return string
         */
        public function getComments()
        {
            return $this->comments;
        }

        /**
         * @param string $comments
         */
        public function setComments($comments)
        {
            $this->comments = $comments;
        }

        /**
         * @return string
         */
        public function getAmountToBeRefunded()
        {
            return $this->amountToBeRefunded;
        }

        /**
         * @return string
         */
        public function getSubwalletAmount()
        {
            return $this->subwalletAmount;
        }

        /**
         * @param string $amountToBeRefunded
         */
        public function setAmountToBeRefunded($amountToBeRefunded)
        {
            $this->amountToBeRefunded = $amountToBeRefunded;
        }

        /**
         * ExtendInfo constructor.
         */
        public function __construct()
        {
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'udf1' => $this->getUdf1(),
                    'udf2' => $this->getUdf2(),
                    'udf3' => $this->getUdf3(),
                    'mercUnqRef' => $this->getMercUnqRef(),
                    'comments' => $this->getComments(),
                    'amountToBeRefunded' => $this->getAmountToBeRefunded()
                ];
        }
    }