<?php
session_start();
include_once "../config.php";
include_once ROOT."/Model/productModel.php";
$action= isset($_POST['action'])?$_POST['action']:"";
$idProduct = isset($_GET['id']) ? $_GET['id'] : "";
$number = isset($_POST['number']) ? $_POST['number'] : "";
$size = isset($_POST['size']) ? $_POST['size'] : "";
$_SESSION['number'][$idProduct] = $number;
$_SESSION['size'][$idProduct] = $size;

$actionDel= isset($_GET['action'])?$_GET['action']:"";

if ($action == "add") {
    $product = new productModel($idProduct, "", "", "", "", "", "", "", 1);
    $data = $product->getData();
    // var_dump($data);
    // $_SESSION["cart"][$idProduct] = $data;
    // var_dump($_SESSION["cart"]);
    if (!empty($_SESSION["cart"])) {
        if (array_key_exists($idProduct, $_SESSION["cart"])) {
            $soLuong = $_SESSION["cart"][$idProduct]["soLuong"];
            $_SESSION["cart"][$idProduct]["soLuong"] = $soLuong + 1;
        } else {
            $_SESSION["cart"][$idProduct] = $data;
        }
    } else {
        $_SESSION["cart"][$idProduct] = $data;
    }
    
    header("Location: ../Views/shoppingCart.php");
}
if($actionDel=="delete"){
    $idDelete=isset($_GET["idDel"])?$_GET["idDel"]:"";
    unset($_SESSION['cart'][$idDelete]);
    header("Location: ../Views/shoppingCart.php");
}
?>
