<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\models;

    use JsonSerializable;

    /**
     * Class UserInfo
     * @package Paytm\pg\models
     */
    class UserInfo implements JsonSerializable
    {

        /**
         * @var string
         */
        private $custId;

        /**
         * @var string
         */
        private $mobile;

        /**
         * @var string
         */
        private $email;

        /**
         * @var string
         */
        private $firstName;

        /**
         * @var string
         */
        private $lastName;

        /**
         * @var string
         */
        private $address;

        /**
         * @var string
         */
        private $pincode;

        /**
         * @return string
         */
        public function getCustId()
        {
            return $this->custId;
        }

        /**
         * @param string $custId
         */
        public function setCustId($custId)
        {
            $this->custId = $custId;
        }

        /**
         * @return string
         */
        public function getMobile()
        {
            return $this->mobile;
        }

        /**
         * @param string $mobile
         */
        public function setMobile($mobile)
        {
            $this->mobile = $mobile;
        }

        /**
         * @return string
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * @param string $firstName
         */
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        /**
         * @return string
         */
        public function getLastName()
        {
            return $this->lastName;
        }

        /**
         * @param string $lastName
         */
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        /**
         * @return string
         */
        public function getAddress()
        {
            return $this->address;
        }

        /**
         * @param string $address
         */
        public function setAddress($address)
        {
            $this->address = $address;
        }

        /**
         * @return string
         */
        public function getPincode()
        {
            return $this->pincode;
        }

        /**
         * @param string $pincode
         */
        public function setPincode($pincode)
        {
            $this->pincode = $pincode;
        }

        /**
         * Paytm\pg\models\UserInfo constructor.
         * @param $custId
         */
        public function __construct($custId)
        {
            $this->custId = $custId;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'custId' => $this->getCustId(),
                    'mobile' => $this->getMobile(),
                    'email' => $this->getEmail(),
                    'firstName' => $this->getFirstName(),
                    'lastName' => $this->getLastName(),
                    'address' => $this->getAddress(),
                    'pincode' => $this->getPincode()
                ];
        }
    }
