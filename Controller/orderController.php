<?php
session_start();

include_once "../config.php";
include_once ROOT . "/Model/orderModel.php";
include_once ROOT . "/Model/orderDetailModel.php";
include_once ROOT . "/util/MySQLConnet.php";
include_once ROOT . "/Model/userModel.php";
include_once ROOT . "/Model/mail/sendmail.php";
//$url="https://provinces.open-api.vn/api/";

$product = isset($_SESSION["cart"]) ? $_SESSION["cart"] : "";
$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : "";
$date = date('d-m-Y');
$total = isset($_SESSION['sum']) ? $_SESSION['sum'] : 0;;
$action = isset($_GET["action"]) ? $_GET["action"] : "";
$user = new userModel($userID, "", "", "", "", "","","",0);
$dataUser = $user->getDataByID();
$fullName = isset($dataUser[0]["tenKH"]) ? $dataUser[0]["tenKH"] : "";


$provinceID = isset($_POST["province"]) ? $_POST["province"] : "";
$districtID = isset($_POST["district"]) ? $_POST["district"] : "";
$wardID = isset($_POST["ward"]) ? $_POST["ward"] : "";
$address = isset($_POST["address"]) ? $_POST["address"] : "";



//var_dump($_SESSION["cart"]);die;
if ($provinceID == "" || $districtID == "" || $wardID == "" || $address == "") {
    $_SESSION["emptyAddress"] = true;
    header("Location: ../Views/check_out.php");
} else {
    try {
        //lấy thông tin thành phố
        $urlProvince = "https://provinces.open-api.vn/api/p/" . $provinceID;
        $dataProvince = json_decode(file_get_contents($urlProvince), true);

        $provinceName = $dataProvince["name"];
        //lấy thông tin quận huyện
        $urlDistrict = "https://provinces.open-api.vn/api/d/" . $districtID;
        $dataDistrict = json_decode(file_get_contents($urlDistrict), true);
        $districtName = $dataDistrict["name"];
        //lấy thông tin phường xã
        $urlWard = "https://provinces.open-api.vn/api/w/" . $wardID;
        $dataWard = json_decode(file_get_contents($urlWard), true);
        $wardName = $dataWard["name"];

        $fullAddress = $address . "-" . $wardName . "-" . $districtName . "-" . $provinceName;
    } catch (\Throwable $th) {
        echo "err";
        exit;
    }
    $order = new orderModel(0, $date, $userID, $fullName, 0, $fullAddress, $total);
    if (empty($_SESSION["cart"]) == false) {
        try {

            $order->inssertorder();
            $idOrderLastInsert = $order->getDataLastInsert();

            $product = isset($_SESSION["cart"]) ? $_SESSION["cart"] : "";
            foreach ($product as $pro) {

                $oerDetail = new orderDetailModel($idOrderLastInsert[0]["maDonHang"], $pro[0]["maGiay"], $pro[0]["tenGiay"], $_SESSION['number'][$pro[0]["maGiay"]], $pro[0]["gia"]);
                $oerDetail->inssertOrderDetail();
            }
            
            // gửi mail
            $order = new orderModel(0, $date, $userID, $fullName, 0, "", $total);
            $idOrderLastInsert = $order->getDataLastInsert();
            $title = "Đặt hàng website ZayShop thành công!";
            $Content = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng : " . $idOrderLastInsert[0]["maDonHang"] . "</p>";
            $Content .= "<h4>Đơn hàng được giao đến địa chỉ: $fullAddress</h4p>";
            $Content .= "<h4>Đơn hàng đặt bao gồm :</h4p>";
            foreach ($_SESSION["cart"] as $pro) {
                $Content .= "<ul style='border:1px solid blue;margin:10px;'>
                <li>" . $pro[0]['tenGiay'] . "</li>
                <li>" . number_format($pro[0]['gia']) . "đ</li>
                <li>" ."số lượng: ". $_SESSION['number'][$pro[0]["maGiay"]] . "</li>
                </ul>";
            }

            $userMail =  $_SESSION["shoppingCart_Email"];
            $mail = new Mailer();
            $mail->datHangMail($title, $Content, $userMail);

            unset($_SESSION['cart']);
            header("Location: ../Views/shoppingCart.php");
            $_SESSION["thanhToan"] = true;
        } catch (\Throwable $th) {
            echo "err";
            exit;
            
        }
    }
    if ($action == "delete") {

        $idDel = $_GET["idDel"];
        $oerDetail = new orderDetailModel($idDel, "", "", "", "");
        $oerDetail->deleteData($idDel);
        $order->deleteData($idDel);
        header("Location: ../Views/order.php");
        $_SESSION["deleteOrderOK"] = true;
    }
}
