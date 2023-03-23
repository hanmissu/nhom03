<?php
include_once "../config.php";
include_once ROOT."/Model/userModel.php" ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">

    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <?php include_once "nav/nav.php" ?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php include_once "header/header.php" ?>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Start Content Page -->
    <!-- pages-title-start -->

    <!-- pages-title-end -->
    <!-- login content section start -->
    <section class="pages login-page section-padding">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <?php
                                $userID = isset( $_SESSION["userID"]) ? $_SESSION["userID"] : "";
                                $user = new userModel($userID, "", 0, "", "", "","","",0);
                                $data = $user->getDataByID();
                             
                                //   var_dump($data);die;

                                if ($userID != "") {
                                ?>

                                    <form class="mx-1 mx-md-4" action="../Controller/userController.php" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Full Name</label>
                                                <input type="text" id="form3Example1c" class="form-control" name="userName" value="<?php echo $data[0]["tenKH"] ?>" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">User Name</label>
                                                <input type="text" id="form3Example1c" class="form-control" name="userName" value="<?php echo $data[0]["taiKhoan"] ?>" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Phone number</label>
                                                <input type="text" id="form3Example1c" class="form-control" name="userName" value="<?php echo $data[0]["SDT"] ?>" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Email</label>
                                                <input type="text" id="form3Example1c" class="form-control" name="userName" value="<?php echo $data[0]["email"] ?>" />

                                            </div>
                                        </div>
                                        
                                        <button type="submit" name="action" value="logOut" class="btn btn-danger">Đăng xuất</button>
                                        <button type="submit" name="action" value="updateInfo" class="btn">Cập nhật</button>
                                    </form>
                                <?php

                                } else {
                                ?>

                                    <form class="mx-1 mx-md-4" action="../Controller/userController.php?action=signIn" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Full Name</label>
                                                <input type="text" id="form3Example1c" class="form-control" name="userName" value="" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">User Name</label>
                                                <input type="text" id="form3Example1c" class="form-control" name="userName" value="" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Phone number</label>
                                                <input type="text" id="form3Example1c" class="form-control" name="userName" value="" />

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">

                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Email</label>
                                                <input type="text" id="form3Example1c" class="form-control" name="userName" value="" />

                                            </div>
                                        </div>
                                        
                                    </form>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- login content section end -->
    <!-- End Contact -->


    <!-- Start Footer -->
    <?php include_once "footer/footer.php" ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <?php include_once "script/script.php" ?>
    <!-- End Script -->
</body>

</html>