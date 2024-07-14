<?php
header("Content-Type: application/json");
$data = json_decode(file_get_contents('php://input'), true);
$some_data = array(
    'userSecretKey' => 'lgd3v69q-k7jl-u3db-avgi-nyuw6cdt20d8',
    'categoryCode' => 'cmybfjof',
    'billName' => 'Beneficiaries Payment',
    'billDescription' => 'Payment for Mobility',
    'billPriceSetting' => 1,
    'billPayorInfo' => 1,
    'billReturnUrl' => 'localhost/amalvalley/jadi',
    'billAmount' => $data['amount'],
    'billTo' => $data['name'],
    'billEmail' => $data['email'],
    'billPhone' => $data['phonenum'],
    'billPaymentChannel' => '0',
    'billContentEmail' => 'Thank you for staying with us',
    'billChargeToCustomer' => 0,
    'billExpiryDays' => 5
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

$result = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);
$obj = json_decode($result);
echo json_encode($result);