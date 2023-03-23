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
    <?php include_once "nav/nav.php";include_once "../config.php"; ?>
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
    <div class="pages-title section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pages-title-text text-center">
                        <h2>Đăng ký</h2>

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

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" action="../Controller/userController.php?action=signUp" method="post">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control" name="fullName" maxlength="50" required />
                                                <label class="form-label" for="form3Example1c">Full name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control" name="userName" maxlength="50" required />
                                                <?php
                                                if (isset($_SESSION["existUserName"]) == true &&   $_SESSION["existUserName"] == true) {

                                                    echo ' <label style="color:red" class="form-label" for="form3Example1c">User Name isExist</label>';
                                                    unset($_SESSION["existUserName"]);
                                                } else {
                                                    echo '<label class="form-label" for="form3Example1c">User Name</label>';
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" class="form-control" name="userEmail" maxlength="50" required />

                                                <?php


                                                if (isset($_SESSION["existEmail"]) == true &&   $_SESSION["existEmail"] == true) {
                                                    echo ' <label style="color:red" class="form-label" for="form3Example1c">Email is Exist</label>';
                                                    unset($_SESSION["existEmail"]);
                                                } else {
                                                    echo '<label class="form-label" for="form3Example3c">Your Email</label>';
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example4c" class="form-control" name="userPhoneNumber"  maxlength="11"required />
                                       
                                                <?php
                                                 if (isset($_SESSION["existPhone"]) == true &&   $_SESSION["existPhone"] == true) {
                                                    echo ' <label style="color:red" class="form-label" for="form3Example1c">Phone number is Exist</label>';
                                                    unset($_SESSION["existPhone"]);
                                                } else {
                                                    echo '<label class="form-label" for="form3Example3c">Your phone number</label>';
                                                }
                                                
                                                
                                                ?>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c" class="form-control" name="userPassword" id="pswd" maxlength="50" required />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" class="form-control" name="rpswd" id="rpswd" maxlength="50" required />
                                                <?php
                                                if (isset($_SESSION["rePws"]) == true &&   $_SESSION["rePws"] == true) {
                                                    echo ' <label style="color:red" class="form-label" for="form3Example1c">Password or Repassword is incorrect</label>';
                                                    unset($_SESSION["rePws"]);
                                                } else {
                                                    echo ' <label class="form-label" for="form3Example4cd">Repeat your password</label>';
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <!-- <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div> -->

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <a href="../Controller/userController.php?action=signUp">
                                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                            </a>

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
    <script>
        function verifyPassword() {
            var pw = document.getElementById("pswd").value;
            var rpw = document.getElementById("rpswd").value;
            //check empty password field  
            if (pw == "") {
                document.getElementById("message").innerHTML = "**Fill the password please!";
                return false;
            }

            //  //minimum password length validation  
            //   if(pw.length < 8) {  
            //      document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
            //      return false;  
            //   }  

            // //maximum length of password validation  
            //   if(pw.length > 15) {  
            //      document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
            //      return false;  
            //   } 
            if (pw != rpw) {
                document.getElementById("message").innerHTML = "**Repeat your password incorrect";
                return false;
            } else {
                alert("Password is correct");
            }
        }
    </script>
    <!-- End Script -->
</body>

</html>