<?php include "../config.php" ?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <?php include_once "nav/nav.php"
    ?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php include_once "header/header.php";
    ?>
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
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pages-title-text text-center">
                        <h2>Verify</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pages-title-end -->
    <!-- login content section start -->
    <section class="pages login-page section-padding">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <form class="mx-1 mx-md-4" action="../Controller/userController.php?action=verify" method="post">
                                        <div class="d-flex justify-content-center align-items-center container">
                                            <div class="card py-5 px-3">
                                                <?php
                                                if (isset($_SESSION["unVerify"]) == true &&    $_SESSION["unVerify"] == true) {
                                                    echo ' <label style="color:red" class="form-label" for="form3Example1c">Account unverify, plese check your email</label>';
                                                    unset($_SESSION["unVerify"]);
                                                }
                                                ?>
                                                <h5 class="m-0">Email verification</h5><span class="mobile-text">Enter the code we just send on your Email <b class="text-danger"><?php echo $_SESSION["userMail"] ?></b></span>
                                                <div class="d-flex flex-row mt-5">
                                                    <input name="codeVerify" type="text" class="form-control" require>
                                                    <?php
                                                    $_SESSION["emailVerify"] = $_SESSION["userMail"];
                                                    if (isset($_SESSION["verifyFalse"]) == true &&   $_SESSION["verifyFalse"] == true) {
                                                    ?> <label style="color: red;" for="">false</label> <?php
                                                    unset($_SESSION["verifyFalse"]);
                                                    }

                                                    ?>
                                                </div>
                                                <div class="text-center mt-5">
                                                    <button type="submit" class="btn btn-info">Verify</button>
                                                    <!-- <span class="d-block mobile-text">Don't receive the code?</span>
                                                    <span class="font-weight-bold text-danger cursor">Resend</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

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