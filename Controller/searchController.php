<?php
session_start();
include_once "../config.php";
include_once ROOT."/Model/productModel.php";

$search = isset($_POST['search'])?$_POST['search']:"";
$product = new productModel("", $search, "", "", "", "", "", "");
$data = $product->getSearch($search);
$_SESSION['dataSearch'] = $data;
$_SESSION['Search'] = $search;
header("Location: ../Views/shop.php");
?>