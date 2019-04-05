<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\merchant\app;

    use paytmpg\pg\constants\LibraryConstants;
    use paytmpg\pg\enums\EChannelId;
    use paytmpg\pg\enums\EnumCurrency;
    use paytmpg\pg\enums\UserSubWalletType;
    use paytmpg\pg\models\ExtendInfo;
    use paytmpg\pg\models\GoodsInfo;
    use paytmpg\pg\models\Money;
    use paytmpg\pg\models\PaymentMode;
    use paytmpg\pg\models\ShippingInfo;
    use paytmpg\pg\models\UserInfo;

    /**
     * Class SampleData
     * @package Paytm\merchant\app
     */
    class SampleData
    {

        /**
         * @return string
         */
        public static function getEChannelId()
        {
            return EChannelId::WEB;
        }

        /**
         * @return Money
         */
        public static function getMoney()
        {
            return Money::constructWithCurrencyAndValue(EnumCurrency::INR, "1.00");
        }

        /**
         * @return string
         */
        public static function getOrderId()
        {
            return self::generateRandomString(4);
        }

        /**
         * @return UserInfo
         */
        public static function getUserInfo()
        {
            $userInfo = new UserInfo("cid");
            $userInfo->setAddress("address str");
            $userInfo->setEmail("XXXX@gmail.com");
            $userInfo->setFirstName("JOHN");
            $userInfo->setLastName("MILLER");
            $userInfo->setMobile("9882554568");
            $userInfo->setPincode("224121");
            return $userInfo;
        }

        /**
         * @return string
         */
        public static function getPaytmSsoToken()
        {
            return null; //null should be replaced with actual value of paytm sso token
        }

        /**
         * @return string
         */
        public static function getPromocode()
        {
            return "promo value";
        }

        /**
         * @return string
         */
        public static function getEmiOption()
        {
            return "emi value";
        }

        /**
         * @return string
         */
        public static function getCardTokenRequired()
        {
            return "token value";
        }

        /**
         * @return array of PaymentMode
         */
        public static function getEnablePaymentModes()
        {
            $paymentMode1 = new PaymentMode();
            $paymentMode1->setMode("CC");
            $channels1 = array(EChannelId::WEB, EChannelId::APP);
            $paymentMode1->setChannels($channels1);

            $paymentMode2 = new PaymentMode();
            $paymentMode2->setMode("CC");
            $channels2 = array(EChannelId::WEB, EChannelId::APP);
            $paymentMode2->setChannels($channels2);

            return array($paymentMode1, $paymentMode2);
        }

        /**
         * @return array of PaymentMode
         */
        public static function getDisablePaymentModes()
        {
            $paymentMode1 = new PaymentMode();
            $paymentMode1->setMode("DC");
            $channels1 = array(EChannelId::WEB, EChannelId::APP);
            $paymentMode1->setChannels($channels1);

            $paymentMode2 = new PaymentMode();
            $paymentMode2->setMode("CC");
            $channels2 = array(EChannelId::WEB, EChannelId::APP);
            $paymentMode2->setChannels($channels2);

            return array($paymentMode1, $paymentMode2);
        }

        /**
         * @return array of GoodsInfo
         */
        public static function getGoodsInfo()
        {
            $goodsInfo1 = new GoodsInfo();
            $goodsInfo1->setMerchantGoodsId("goods_id1");
            $goodsInfo1->setMerchantShippingId("shipping_id1");
            $goodsInfo1->setSnapshotUrl("snapshot_url");
            $goodsInfo1->setDescription("desc");
            $goodsInfo1->setCategory("category");
            $goodsInfo1->setQuantity("qty");
            $goodsInfo1->setUnit("unit");
            $goodsInfo1->setPrice(self::getMoney());
            $goodsInfo1->setExtendInfo(self::getExtendInfo());
            $goodsInfo2 = new GoodsInfo();
            $goodsInfo2->setMerchantGoodsId("goods_id2");
            $goodsInfo2->setMerchantShippingId("shipping_id2");
            $goodsInfo2->setSnapshotUrl("url");
            $goodsInfo2->setDescription("description");
            $goodsInfo2->setCategory("ctgry");
            $goodsInfo2->setQuantity("quantity");
            $goodsInfo2->setUnit("unit");
            $goodsInfo2->setPrice(self::getMoney());
            $goodsInfo2->setExtendInfo(self::getExtendInfo());

            return array($goodsInfo1, $goodsInfo2);
        }

        /**
         * @return array of ShippingInfo
         */
        public static function getShippingInfo()
        {
            $shippingInfo1 = new ShippingInfo();
            $shippingInfo1->setFirstName("fname");
            $shippingInfo1->setLastName("lname");
            $shippingInfo1->setEmail("XXX@gmail.com");
            $shippingInfo1->setMerchantShippingId("id");
            $shippingInfo1->setAddress1("Address 1");
            $shippingInfo1->setAddress2("Address 2");
            $shippingInfo1->setCarrier("str carrier");
            $shippingInfo1->setChargeAmount(SampleData::getMoney());
            $shippingInfo1->setCityName("xyz");
            $shippingInfo1->setStateName("xxx");
            $shippingInfo1->setMobileNo("9887754568");
            $shippingInfo1->setTrackingNo("xxxxxxxxxx");

            $shippingInfo2 = new ShippingInfo();
            $shippingInfo2->setFirstName("firstname");
            $shippingInfo2->setLastName("lastname");
            $shippingInfo2->setEmail("XXX@gmail.com");
            $shippingInfo2->setMerchantShippingId("id4");
            $shippingInfo2->setAddress1("Address 1");
            $shippingInfo2->setAddress2("Address 2");
            $shippingInfo2->setCarrier("carrier");
            $shippingInfo2->setChargeAmount(SampleData::getMoney());
            $shippingInfo2->setCityName("xxx");
            $shippingInfo2->setStateName("xxx");
            $shippingInfo2->setMobileNo("9772554568");
            $shippingInfo2->setTrackingNo("xxxxxxxxxx");

            return array($shippingInfo1, $shippingInfo2);
        }

        /**
         * @return ExtendInfo
         */
        public static function getExtendInfo()
        {
            $extendInfo = new ExtendInfo();
            $extendInfo->setUdf1('udf1');
            $extendInfo->setUdf2('udf2');
            $extendInfo->setUdf3('udf3');
            $extendInfo->setMercUnqRef('mercUnqRef');
            $extendInfo->setComments('comment');
            $extendInfo->setAmountToBeRefunded('1');

            $subwalletAmount = array();
            $subwalletAmount[LibraryConstants\Request::FOOD_WALLET] = '2';
            $subwalletAmount[LibraryConstants\Request::GIFT_WALLET] = '2.5';

            $extendInfo->setSubwalletAmount($subwalletAmount);

            return $extendInfo;
        }

        /**
         * @param $count
         * @return string
         */
        public static function generateRandomString($count)
        {

            $ALPHA_NUMERIC_STRING = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $charactersLength = strlen($ALPHA_NUMERIC_STRING);
            $rand = '';
            for ($i = 0; $i < $count; $i++) {
                $rand .= $ALPHA_NUMERIC_STRING[rand(0, $charactersLength - 1)];
            }
            return $rand;
        }

        /**
         * @return array
         */
        public static function getSubWalletAmount()
        {
            $subWalletAmount = array();
            $subWalletAmount[UserSubWalletType::FOOD] = 1.00;
            $subWalletAmount[UserSubWalletType::GIFT] = 1.00;
            return $subWalletAmount;
        }

        /**
         * @return array
         */
        public static function getExtraParamsMap()
        {
            $extraParamsMap = array();
            $extraParamsMap["data"] = "data";
            $extraParamsMap["purpose"] = "merchant purpose";
            return $extraParamsMap;
        }
    }