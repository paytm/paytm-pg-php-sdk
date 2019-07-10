<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\models;

    use JsonSerializable;

    /**
     * Class ShippingInfo
     * @package Paytm\pg\models
     */
    class ShippingInfo implements JsonSerializable
    {
        /**
         * @var string
         */
        private $merchantShippingId;

        /**
         * @var string
         */
        private $trackingNo;

        /**
         * @var string
         */
        private $carrier;

        /**
         * @var Money
         */
        private $chargeAmount;

        /**
         * @var string
         */
        private $countryName;

        /**
         * @var string
         */
        private $stateName;

        /**
         * @var string
         */
        private $cityName;

        /**
         * @var string
         */
        private $address1;

        /**
         * @var string
         */
        private $address2;

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
        private $mobileNo;

        /**
         * @var string
         */
        private $zipCode;

        /**
         * @var string
         */
        private $email;

        /**
         * @return string
         */
        public function getMerchantShippingId()
        {
            return $this->merchantShippingId;
        }

        /**
         * @param string $merchantShippingId
         */
        public function setMerchantShippingId($merchantShippingId)
        {
            $this->merchantShippingId = $merchantShippingId;
        }

        /**
         * @return string
         */
        public function getTrackingNo()
        {
            return $this->trackingNo;
        }

        /**
         * @param string $trackingNo
         */
        public function setTrackingNo($trackingNo)
        {
            $this->trackingNo = $trackingNo;
        }

        /**
         * @return string
         */
        public function getCarrier()
        {
            return $this->carrier;
        }

        /**
         * @param string $carrier
         */
        public function setCarrier($carrier)
        {
            $this->carrier = $carrier;
        }

        /**
         * @return Money
         */
        public function getChargeAmount()
        {
            return $this->chargeAmount;
        }

        /**
         * @param Money $chargeAmount
         */
        public function setChargeAmount($chargeAmount)
        {
            $this->chargeAmount = $chargeAmount;
        }

        /**
         * @return string
         */
        public function getCountryName()
        {
            return $this->countryName;
        }

        /**
         * @param string $countryName
         */
        public function setCountryName($countryName)
        {
            $this->countryName = $countryName;
        }

        /**
         * @return string
         */
        public function getStateName()
        {
            return $this->stateName;
        }

        /**
         * @param string $stateName
         */
        public function setStateName($stateName)
        {
            $this->stateName = $stateName;
        }

        /**
         * @return string
         */
        public function getCityName()
        {
            return $this->cityName;
        }

        /**
         * @param string $cityName
         */
        public function setCityName($cityName)
        {
            $this->cityName = $cityName;
        }

        /**
         * @return string
         */
        public function getAddress1()
        {
            return $this->address1;
        }

        /**
         * @param string $address1
         */
        public function setAddress1($address1)
        {
            $this->address1 = $address1;
        }

        /**
         * @return string
         */
        public function getAddress2()
        {
            return $this->address2;
        }

        /**
         * @param string $address2
         */
        public function setAddress2($address2)
        {
            $this->address2 = $address2;
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
        public function getMobileNo()
        {
            return $this->mobileNo;
        }

        /**
         * @param string $mobileNo
         */
        public function setMobileNo($mobileNo)
        {
            $this->mobileNo = $mobileNo;
        }

        /**
         * @return string
         */
        public function getZipCode()
        {
            return $this->zipCode;
        }

        /**
         * @param string $zipCode
         */
        public function setZipCode($zipCode)
        {
            $this->zipCode = $zipCode;
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
         * Paytm\pg\models\ShippingInfo constructor.
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
                    'merchantShippingId' => $this->getMerchantShippingId(),
                    'trackingNo' => $this->getTrackingNo(),
                    'carrier' => $this->getCarrier(),
                    'chargeAmount' => $this->getChargeAmount(),
                    'countryName' => $this->getCountryName(),
                    'stateName' => $this->getStateName(),
                    'cityName' => $this->getCityName(),
                    'address1' => $this->getAddress1(),
                    'address2' => $this->getAddress2(),
                    'firstName' => $this->getFirstName(),
                    'lastName' => $this->getLastName(),
                    'mobileNo' => $this->getMobileNo(),
                    'zipCode' => $this->getZipCode(),
                    'email' => $this->getEmail()
                ];
        }
    }
