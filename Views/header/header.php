<?php session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light shadow">
    <?php
    
    if(isset(  $_SESSION["isSignUp"])==true &&   $_SESSION["isSignUp"] == true){
        echo '<script>alert("Register successful")</script>';
        $_SESSION["isSignUp"]=false;
    }

    ?>
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="./../index.php">
            Zay
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a>
                    <form action="../Controller/searchController.php" method="post">
                    <div class="input-group" style="padding-right: 20px;">
                        <div class="form-outline">
                            <input type="text" id="form1" class="form-control" name="search"/>
                        </div>
                        <button type="submit" name="btn_search" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    </form>
                 </a>
                <a class="nav-icon position-relative text-decoration-none" href="./shoppingCart.php">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                        <?php
                        if (!empty($_SESSION['cart'])) {
                        ?>
                            <?php echo count($_SESSION['cart']) ?>
                        <?php
                        } ?>
                    </span>
                </a>
                <?php

                if (isset($_SESSION["signIn"]) == false || $_SESSION["signIn"] == false) {
                ?>
                    <a class="nav-icon position-relative text-decoration-none" href="./sign-in.php">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <!-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span> -->
                    </a>
                <?php
                } else {
                ?>
                    <a class="nav-icon position-relative text-decoration-none" href="./account_info.php">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <!-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span> -->
                    </a>

                <?php
                }
                if (isset($_SESSION["thanhToan"]) &&  $_SESSION["thanhToan"] == true) {
                    ?>
                        <script type='text/javascript'>
                            alert('Thanh toán thành công');
                        </script>
                        
                    <?php
                    unset($_SESSION["thanhToan"]);
                    }
                ?>




            </div>
        </div>

    </div>
</nav>