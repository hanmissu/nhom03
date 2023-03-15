<?php
session_start();
$_SESSION["signIn"] = false;
include_once '../Model/userModel.php';
$userName = isset($_POST['userName']) ? $_POST['userName'] : "";
$userEmail = isset($_POST['userEmail']) ? $_POST['userEmail'] : "";
$userPhoneNumber = isset($_POST['userPhoneNumber']) ? $_POST['userPhoneNumber'] : "";
$userPassword = isset($_POST['userPassword']) ? $_POST['userPassword'] : "";
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : "";
$rpswd = isset($_POST['rpswd']) ? $_POST['rpswd'] : "";

// var_dump($_POST);
// var_dump($_GET);die;
$action = isset($_GET['action']) ? $_GET['action'] : '';
$actionLog = isset($_POST["action"]) ? $_POST["action"] : "";

$_SESSION["userMail"]=$userEmail;
//

//
$user = new userModel(0, $fullName, $userPhoneNumber, $userEmail, $userName, $userPassword);
$dataByUserName = $user->getDataByUserName();
$dataByEmail = $user->getDataByEmail();
$dataByNumberPhone = $user->getDataNumberPhone();
// var_dump($_POST);
// var_dump($user);
switch ($action) {
    case 'signIn':

        if ($dataByUserName[0]['taiKhoan'] == $userName && $dataByUserName[0]['matKhau'] == $userPassword) {
            $_SESSION["signIn"] = true;
            $_SESSION["isSign"] = true;
            $_SESSION["userName"] = $dataByUserName[0]["taiKhoan"];
            $_SESSION["userID"] = $dataByUserName[0]["maKH"];
          
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
            $user->inssertUser();
            $_SESSION["isSignUp"] = true;
            header("Location: ../Views/sign-in.php");
        }

        
            break;
}
if ($actionLog == "logOut") {
    unset($_SESSION);
    header("Location: ../Views/sign-in.php");
}
