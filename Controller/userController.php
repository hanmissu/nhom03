<?php
session_start();
$_SESSION["signIn"] = false;
include_once "../config.php";
include_once ROOT . '/Model/userModel.php';
include_once ROOT . "/Model/mail/sendmail.php";
$userName = isset($_POST['userName']) ? $_POST['userName'] : "";
$userEmail = isset($_POST['userEmail']) ? $_POST['userEmail'] : "";
$userPhoneNumber = isset($_POST['userPhoneNumber']) ? $_POST['userPhoneNumber'] : "";
$userPassword = isset($_POST['userPassword']) ? $_POST['userPassword'] : "";
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : "";
$rpswd = isset($_POST['rpswd']) ? $_POST['rpswd'] : "";
$action = isset($_GET['action']) ? $_GET['action'] : '';
$actionLog = isset($_POST["action"]) ? $_POST["action"] : "";
$_SESSION["userMail"] = $userEmail;
$codeVerify = rand(100000, 999999);
$user = new userModel(0, $fullName, $userPhoneNumber, $userEmail, $userName, $userPassword, "", $codeVerify, 0);
$dataByUserName = $user->getDataByUserName();
$dataByEmail = $user->getDataByEmail();
$dataByNumberPhone = $user->getDataNumberPhone();
switch ($action) {
    case 'signIn':
        if($dataByUserName[0]["status"] == '0'){
            $_SESSION["unVerify"]=true;
            header("Location: ../Views/verifyEmail.php");
        }
        else if ($dataByUserName[0]['taiKhoan'] == $userName && $dataByUserName[0]['matKhau'] == $userPassword) {
            $_SESSION["signIn"] = true;
            $_SESSION["isSign"] = true;
            $_SESSION["userName"] = $dataByUserName[0]["taiKhoan"];
            $_SESSION['userID'] = $dataByUserName[0]["maKH"];
            header("Location: .././index.php");
        } else {
            $_SESSION["signIn"] = false;
            header("Location: ../Views/sign-in.php");
        }
        break;
    case 'signUp':
        if ($dataByUserName != null) {
            if ($dataByUserName[0]['taiKhoan'] == $userName) {
                $_SESSION["existUserName"] = true;
                header("Location: ../Views/sign-up.php");
            }
        } else if ($dataByEmail != null) {
            $_SESSION["existEmail"] = true;
            header("Location: ../Views/sign-up.php");
        } else if ($dataByNumberPhone != null) {
            $_SESSION["existPhone"] = true;
            header("Location: ../Views/sign-up.php");
        } else if ($userPassword != $rpswd) {
            $_SESSION["rePws"] = true;
            header("Location: ../Views/sign-up.php");
        } else {
           // var_dump($_SESSION["emailVerify"]);die;
            $user->inssertUser();
            // gửi mail
            $title = "Xác thực đăng ký zay shop!";
            $Content = "<p>Cảm ơn quý khách đã đăng ký website zay shop của chúng tôi với email : " . $_SESSION["emailVerify"]. "</p>";
            $Content .= "<h4>Mã xác nhận của bạn là: $codeVerify</h4p>";
            $mail=new Mailer();
            $mail->veryfyEmail($title,$Content,$_SESSION["emailVerify"]);
            header("Location: ../Views/verifyEmail.php");
        }
        break;
    case 'verify':
        $code = $_POST["codeVerify"] ? $_POST["codeVerify"] : "";
        $userVerify = new userModel(0, "", "", $_SESSION["emailVerify"], "", "", "", 0, 1);
        $dataVerify = $userVerify->getDataByEmail();
        if ($code == $dataVerify[0]["codeVerify"]) {
            $userVerify->updateStatusByID($dataVerify[0]["maKH"]);
            $_SESSION["isSignUp"] = true;
            header("Location: ../Views/sign-in.php");
        } else {
            $_SESSION["verifyFalse"] = true;
            header("Location: ../Views/verifyEmail.php");
        }
        break;
}
if ($actionLog == "logOut") {
    session_unset();
    session_destroy();
    header("Location: ../Views/sign-in.php");
}
