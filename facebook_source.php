<?php
include_once "config.php";
include_once ROOT.'/Facebook/autoload.php';
include_once ROOT.'/fbconfig.php';
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://zayshop.local/Controller/fb-callback.php', $permissions);

?>