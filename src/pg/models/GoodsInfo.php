<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\models;

    use JsonSerializable;

    /**
     * Class GoodsInfo
     * @package Paytm\pg\models
     */
    class GoodsInfo implements JsonSerializable
    {

        /**
         * @var string
         */
        private $merchantGoodsId;

        /**
         * @var string
         */
        private $merchantShippingId;

        /**
         * @var string
         */
        private $snapshotUrl;

        /**
         * @var string
         */
        private $description;

        /**
         * @var string
         */
        private $category;

        /**
         * @var string
         */
        private $quantity;

        /**
         * @var string
         */
        private $unit;

        /**
         * @var Money
         */
        private $price;

        /**
         * @var ExtendInfo
         */
        private $extendInfo;

        /**
         * @return string
         */
        public function getMerchantGoodsId()
        {
            return $this->merchantGoodsId;
        }

        /**
         * @param string $merchantGoodsId
         */
        public function setMerchantGoodsId($merchantGoodsId)
        {
            $this->merchantGoodsId = $merchantGoodsId;
        }

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
        public function getSnapshotUrl()
        {
            return $this->snapshotUrl;
        }

        /**
         * @param string $snapshotUrl
         */
        public function setSnapshotUrl($snapshotUrl)
        {
            $this->snapshotUrl = $snapshotUrl;
        }

        /**
         * @return string
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param string $description
         */
        public function setDescription($description)
        {
            $this->description = $description;
        }

        /**
         * @return string
         */
        public function getCategory()
        {
            return $this->category;
        }

        /**
         * @param string $category
         */
        public function setCategory($category)
        {
            $this->category = $category;
        }

        /**
         * @return string
         */
        public function getQuantity()
        {
            return $this->quantity;
        }

        /**
         * @param string $quantity
         */
        public function setQuantity($quantity)
        {
            $this->quantity = $quantity;
        }

        /**
         * @return string
         */
        public function getUnit()
        {
            return $this->unit;
        }

        /**
         * @param string $unit
         */
        public function setUnit($unit)
        {
            $this->unit = $unit;
        }

        /**
         * @return Money
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param Money $price
         */
        public function setPrice($price)
        {
            $this->price = $price;
        }

        /**
         * @return ExtendInfo
         */
        public function getExtendInfo()
        {
            return $this->extendInfo;
        }

        /**
         * @param ExtendInfo $extendInfo
         */
        public function setExtendInfo($extendInfo)
        {
            $this->extendInfo = $extendInfo;
        }

        /**
         * Paytm\pg\models\GoodsInfo constructor.
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
                    'merchantGoodsId' => $this->getMerchantGoodsId(),
                    'merchantShippingId' => $this->getMerchantShippingId(),
                    'snapshotUrl' => $this->getSnapshotUrl(),
                    'description' => $this->getDescription(),
                    'category' => $this->getCategory(),
                    'quantity' => $this->getQuantity(),
                    'unit' => $this->getUnit(),
                    'price' => $this->getPrice(),
                    'extendInfo' => $this->getExtendInfo()
                ];
        }
    }
