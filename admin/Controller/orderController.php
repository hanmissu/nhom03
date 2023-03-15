<?php
session_start();
include_once "../config.php";
include_once ROOT."/model/orderModel.php";
include_once ROOT."/model/orderDetailModel.php";
include_once ROOT."/util/MySQLConnet.php";

$maKH = isset($_SESSION["maKH"]) ? $_SESSION["maKH"] : "";
$tenKH = isset($_POST["tenKh"]) ? $_POST["tenKh"] : "";
$sdt = isset($_POST["sdt"]) ? $_POST["sdt"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$diaChi = isset($_POST["diaChi"]) ? $_POST["diaChi"] : "";
$trangThai=isset($_POST["status"])?$_POST["status"]:"";

$idOrderUpdate= isset($_GET["id"])?$_GET["id"]:"";
$ngayXuatDon = date('d-m-Y');

$tongTien = isset($_SESSION['sum']) ? $_SESSION['sum'] : 0;
$action= isset($_GET["action"])?$_GET["action"]:"";

$order = new orderModel(0, $ngayXuatDon,$maKH ,$tenKH, 0, $diaChi, $tongTien);

if($action=="delete"){
    $idDel= $_GET["idDel"];
    $oerDetail= new orderDetailModel($idDel,"","","","");
    $oerDetail->deleteData($idDel);
    $order->deleteData($idDel);
  
}
if($action=="update"){
    try {
        $orderUpdate= new orderModel("","","","","","","","");
        $orderUpdate->updateData($idOrderUpdate,$trangThai);
        header("Location: ../view/order.php");
    } catch (\Throwable $th) {
        echo "fail";
    }

}
