<?php

    /**
     * Copyright (C) 2019 Paytm.
     */

    namespace paytmpg\pg\response;

    use JsonSerializable;

    /**
     * Class NativePaymentStatusResponseBody
     * @package Paytm\pg\response
     */
    class NativePaymentStatusResponseBody extends BaseResponseBody implements JsonSerializable
    {

        /**
         * @var string
         */
        private $txnId;

        /**
         * @var string
         */
        private $bankTxnId;

        /**
         * @var string
         */
        private $orderId;

        /**
         * @var string
         */
        private $txnAmount;

        /**
         * @var string
         */
        private $txnType;

        /**
         * @var string
         */
        private $gatewayName;

        /**
         * @var string
         */
        private $bankName;

        /**
         * @var string
         */
        private $mid;

        /**
         * @var string
         */
        private $paymentMode;

        /**
         * @var string
         */
        private $refundAmt;

        /**
         * @var string
         */
        private $txnDate;

        /**
         * @var string
         */
        private $refundId;

        /**
         * @var string
         */
        private $refId;

        /**
         * @var array
         */
        private $childTransaction;

        /**
         * @var string
         */
        private $subsId;

        /**
         * @var string
         */
        private $merchantUniqueReference;

        /**
         * @var string
         */
        private $blockedAmount;

        /**
         * @var string
         */
        private $preAuthId;

        /**
         * @var string
         */
        private $customMerchantResponse;

        /**
         * @var string
         */
        private $customChecksumString;

        /**
         * @var string
         */
        private $maskedCardNo;

        /**
         * @var string
         */
        private $cardIndexNo;

        /**
         * @var string
         */
        private $maskedCustomerMobileNumber;
        /**
         * @var string
         */
        private $posId;
        /**
         * @var string
         */
        private $uniqueReferenceLabel;
        /**
         * @var string
         */
        private $uniqueReferenceValue;
        /**
         * @var string
         */
        private $pccCode;
        /**
         * @var string
         */
        private $prn;
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
        private $comments;
        /**
         * @var string
         */
        private $currentTxnCount;
        /**
         * @var string
         */
        private $loyaltyPoints;

        /**
         * NativePaymentStatusResponseBody constructor.
         */
        public function __construct()
        {
        }

        /**
         * @return string
         */
        public function getTxnId()
        {
            return $this->txnId;
        }

        /**
         * @param string $txnId
         */
        public function setTxnId($txnId)
        {
            $this->txnId = $txnId;
        }

        /**
         * @return string
         */
        public function getBankTxnId()
        {
            return $this->bankTxnId;
        }

        /**
         * @param string $bankTxnId
         */
        public function setBankTxnId($bankTxnId)
        {
            $this->bankTxnId = $bankTxnId;
        }

        /**
         * @return string
         */
        public function getOrderId()
        {
            return $this->orderId;
        }

        /**
         * @param string $orderId
         */
        public function setOrderId($orderId)
        {
            $this->orderId = $orderId;
        }

        /**
         * @return string
         */
        public function getTxnAmount()
        {
            return $this->txnAmount;
        }

        /**
         * @param string $txnAmount
         */
        public function setTxnAmount($txnAmount)
        {
            $this->txnAmount = $txnAmount;
        }

        /**
         * @return string
         */
        public function getTxnType()
        {
            return $this->txnType;
        }

        /**
         * @param string $txnType
         */
        public function setTxnType($txnType)
        {
            $this->txnType = $txnType;
        }

        /**
         * @return string
         */
        public function getGatewayName()
        {
            return $this->gatewayName;
        }

        /**
         * @param string $gatewayName
         */
        public function setGatewayName($gatewayName)
        {
            $this->gatewayName = $gatewayName;
        }

        /**
         * @return string
         */
        public function getBankName()
        {
            return $this->bankName;
        }

        /**
         * @param string $bankName
         */
        public function setBankName($bankName)
        {
            $this->bankName = $bankName;
        }

        /**
         * @return string
         */
        public function getMid()
        {
            return $this->mid;
        }

        /**
         * @param string $mid
         */
        public function setMid($mid)
        {
            $this->mid = $mid;
        }

        /**
         * @return string
         */
        public function getPaymentMode()
        {
            return $this->paymentMode;
        }

        /**
         * @param string $paymentMode
         */
        public function setPaymentMode($paymentMode)
        {
            $this->paymentMode = $paymentMode;
        }

        /**
         * @return string
         */
        public function getRefundAmt()
        {
            return $this->refundAmt;
        }

        /**
         * @param string $refundAmt
         */
        public function setRefundAmt($refundAmt)
        {
            $this->refundAmt = $refundAmt;
        }

        /**
         * @return string
         */
        public function getTxnDate()
        {
            return $this->txnDate;
        }

        /**
         * @param string $txnDate
         */
        public function setTxnDate($txnDate)
        {
            $this->txnDate = $txnDate;
        }

        /**
         * @return string
         */
        public function getRefundId()
        {
            return $this->refundId;
        }

        /**
         * @param string $refundId
         */
        public function setRefundId($refundId)
        {
            $this->refundId = $refundId;
        }

        /**
         * @return string
         */
        public function getRefId()
        {
            return $this->refId;
        }

        /**
         * @param string $refId
         */
        public function setRefId($refId)
        {
            $this->refId = $refId;
        }

        /**
         * @return array
         */
        public function getChildTransaction()
        {
            return $this->childTransaction;
        }

        /**
         * @param array $childTransaction
         */
        public function setChildTransaction($childTransaction)
        {
            $this->childTransaction = $childTransaction;
        }

        /**
         * @return string
         */
        public function getSubsId()
        {
            return $this->subsId;
        }

        /**
         * @param string $subsId
         */
        public function setSubsId($subsId)
        {
            $this->subsId = $subsId;
        }

        /**
         * @return string
         */
        public function getMerchantUniqueReference()
        {
            return $this->merchantUniqueReference;
        }

        /**
         * @param string $merchantUniqueReference
         */
        public function setMerchantUniqueReference($merchantUniqueReference)
        {
            $this->merchantUniqueReference = $merchantUniqueReference;
        }

        /**
         * @return string
         */
        public function getBlockedAmount()
        {
            return $this->blockedAmount;
        }

        /**
         * @param string $blockedAmount
         */
        public function setBlockedAmount($blockedAmount)
        {
            $this->blockedAmount = $blockedAmount;
        }

        /**
         * @return string
         */
        public function getPreAuthId()
        {
            return $this->preAuthId;
        }

        /**
         * @param string $preAuthId
         */
        public function setPreAuthId($preAuthId)
        {
            $this->preAuthId = $preAuthId;
        }

        /**
         * @return string
         */
        public function getCustomMerchantResponse()
        {
            return $this->customMerchantResponse;
        }

        /**
         * @param string $customMerchantResponse
         */
        public function setCustomMerchantResponse($customMerchantResponse)
        {
            $this->customMerchantResponse = $customMerchantResponse;
        }

        /**
         * @return string
         */
        public function getCustomChecksumString()
        {
            return $this->customChecksumString;
        }

        /**
         * @param string $customChecksumString
         */
        public function setCustomChecksumString($customChecksumString)
        {
            $this->customChecksumString = $customChecksumString;
        }

        /**
         * @return string
         */
        public function getMaskedCardNo()
        {
            return $this->maskedCardNo;
        }

        /**
         * @param string $maskedCardNo
         */
        public function setMaskedCardNo($maskedCardNo)
        {
            $this->maskedCardNo = $maskedCardNo;
        }

        /**
         * @return string
         */
        public function getCardIndexNo()
        {
            return $this->cardIndexNo;
        }

        /**
         * @param string $cardIndexNo
         */
        public function setCardIndexNo($cardIndexNo)
        {
            $this->cardIndexNo = $cardIndexNo;
        }

        /**
         * @return string
         */
        public function getMaskedCustomerMobileNumber()
        {
            return $this->maskedCustomerMobileNumber;
        }

        /**
         * @param string $maskedCustomerMobileNumber
         */
        public function setMaskedCustomerMobileNumber($maskedCustomerMobileNumber)
        {
            $this->maskedCustomerMobileNumber = $maskedCustomerMobileNumber;
        }

        /**
         * @return string
         */
        public function getPosId()
        {
            return $this->posId;
        }

        /**
         * @param string $posId
         */
        public function setPosId($posId)
        {
            $this->posId = $posId;
        }

        /**
         * @return string
         */
        public function getUniqueReferenceLabel()
        {
            return $this->uniqueReferenceLabel;
        }

        /**
         * @param string $uniqueReferenceLabel
         */
        public function setUniqueReferenceLabel($uniqueReferenceLabel)
        {
            $this->uniqueReferenceLabel = $uniqueReferenceLabel;
        }

        /**
         * @return string
         */
        public function getUniqueReferenceValue()
        {
            return $this->uniqueReferenceValue;
        }

        /**
         * @param string $uniqueReferenceValue
         */
        public function setUniqueReferenceValue($uniqueReferenceValue)
        {
            $this->uniqueReferenceValue = $uniqueReferenceValue;
        }

        /**
         * @return string
         */
        public function getPccCode()
        {
            return $this->pccCode;
        }

        /**
         * @param string $pccCode
         */
        public function setPccCode($pccCode)
        {
            $this->pccCode = $pccCode;
        }

        /**
         * @return string
         */
        public function getPrn()
        {
            return $this->prn;
        }

        /**
         * @param string $prn
         */
        public function setPrn($prn)
        {
            $this->prn = $prn;
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
        public function getCurrentTxnCount()
        {
            return $this->currentTxnCount;
        }

        /**
         * @param string $currentTxnCount
         */
        public function setCurrentTxnCount($currentTxnCount)
        {
            $this->currentTxnCount = $currentTxnCount;
        }

        /**
         * @return string
         */
        public function getLoyaltyPoints()
        {
            return $this->loyaltyPoints;
        }

        /**
         * @param string $loyaltyPoints
         */
        public function setLoyaltyPoints($loyaltyPoints)
        {
            $this->loyaltyPoints = $loyaltyPoints;
        }

        /**
         * @return array|mixed
         */
        public function jsonSerialize()
        {
            return
                [
                    'txnId' => $this->getTxnId(),
                    'bankTxnId' => $this->getBankTxnId(),
                    'orderId' => $this->getOrderId(),
                    'txnAmount' => $this->getTxnAmount(),
                    'txnType' => $this->getTxnType(),
                    'gatewayName' => $this->getGatewayName(),
                    'bankName' => $this->getBankName(),
                    'mid' => $this->getMid(),
                    'paymentMode' => $this->getPaymentMode(),
                    'refundAmt' => $this->getRefundAmt(),
                    'txnDate' => $this->getTxnDate(),
                    'refundId' => $this->getRefundId(),
                    'refId' => $this->getRefId(),
                    'childTransaction' => $this->getChildTransaction(),
                    'subsId' => $this->getSubsId(),
                    'merchantUniqueReference' => $this->getMerchantUniqueReference(),
                    'blockedAmount' => $this->getBlockedAmount(),
                    'preAuthId' => $this->getPreAuthId(),
                    'customMerchantResponse' => $this->getCustomMerchantResponse(),
                    'customChecksumString' => $this->getCustomChecksumString(),
                    'maskedCardNo' => $this->getMaskedCardNo(),
                    'cardIndexNo' => $this->getCardIndexNo(),
                    'maskedCustomerMobileNumber' => $this->getMaskedCustomerMobileNumber(),
                    'posId' => $this->getPosId(),
                    'uniqueReferenceLabel' => $this->getUniqueReferenceLabel(),
                    'uniqueReferenceValue' => $this->getUniqueReferenceValue(),
                    'pccCode' => $this->getPccCode(),
                    'prn' => $this->getPrn(),
                    'udf1' => $this->getUdf1(),
                    'udf2' => $this->getUdf2(),
                    'udf3' => $this->getUdf3(),
                    'comments' => $this->getComments(),
                    'currentTxnCount' => $this->getCurrentTxnCount(),
                    'loyaltyPoints' => $this->getLoyaltyPoints(),
                    'resultInfo' => $this->getResultInfo(),
                    'extraParamsMap' => $this->getExtraParamsMap()
                ];
        }
    }

