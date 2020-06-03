<?php
header('Content-type: text/html; charset=utf-8');

$config = file_get_contents('../config.json');
$array = json_decode($config, true);

include "../common/helper.php";


$endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
// $amount = "10000";
if (!empty($amount)) {
    $partnerCode = "MOMOBKUN20180529";
    $accessKey   = "klm05TvNBzhg7h7j";
    $serectkey   = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
    $orderId     = time() .""; // Mã đơn hàng
    $orderInfo   = "Thanh toán qua MoMo";
    $amount      = $amount;
    $notifyurl   = "http://localhost/do-an/order/NotifyUrl";
    $returnUrl   = "http://localhost/do-an/order/ReturnUrl/$insert_id";
    $extraData   = "merchantName=MoMo Partner";
    
    $requestId   = time() . "";
    $requestType = "captureMoMoWallet";
    $extraData   = ($extraData ? $extraData : "");
    //before sign HMAC SHA256 signature
    $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
    $signature = hash_hmac("sha256", $rawHash, $serectkey);
    $data = array('partnerCode' => $partnerCode,
        'accessKey'   => $accessKey,
        'requestId'   => $requestId,
        'amount'      => $amount,
        'orderId'     => $orderId,
        'orderInfo'   => $orderInfo,
        'returnUrl'   => $returnUrl,
        'notifyUrl'   => $notifyurl,
        'extraData'   => $extraData,
        'requestType' => $requestType,
        'signature'   => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there
    header('Location: ' . $jsonResult['payUrl']);
}
?>
