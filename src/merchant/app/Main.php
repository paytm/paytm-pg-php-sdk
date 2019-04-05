<?php
    /**
     * Copyright (C) 2019 Paytm.
     */

    use paytmpg\merchant\app\DemoApp;

    /** Enable error reporting */
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    /** Creating SDK level constant */
    define('PROJECT', realpath(dirname(__DIR__) . '/../../'));

    require_once(PROJECT . '/vendor/autoload.php');

    // Example using only mandatory fields
    DemoApp::createTxnTokenwithRequiredParams();

    // Example using mandatory and enabling and disabling payment modes fields
    DemoApp::createTxnTokenwithPaytmSSotokenAndPaymentMode();

    // Example using all fields
    DemoApp::createTxnTokenwithAllParams();

    // Example of get payment status
    DemoApp::getPaymentStatus();

    // Example of refund
    DemoApp::initiateRefund();

    // Example of get refund status
    DemoApp::getRefundStatus();