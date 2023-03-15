<?php
session_start();
include_once "../config.php";
include_once ROOT.'/Facebook/autoload.php';
include_once ROOT.'/fbconfig.php';
include_once ROOT.'/Model/userModel.php';

$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}
try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (!isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}


//Lấy thông tin của người dùng trên Facebook
try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get('/me?fields=name,id,email', $accessToken->getValue());
    
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
var_dump($response);die;
$fbUser = $response->getGraphUser();
$user = new userModel(0, $fbUser["name"], null, $fbUser["email"], null, null);
$data = $user->getDataByEmail();

if($data[0]["email"] == $fbUser["email"]){
    $_SESSION["signIn"] = true;
    $_SESSION["isSign"] = true;
    $_SESSION["userID"]=$data[0]["maKH"];
    $_SESSION["userMail"]=$data[0]["email"];
    header("Location: .././index.php");
}
if ($data == null) {
    $user->inssertUser();
    $_SESSION["signIn"] = true;
    $_SESSION["isSign"] = true;
    $data = $user->getDataByEmail();
    $_SESSION["userID"]=$data[0]["maKH"];
    header("Location: .././index.php");
}
