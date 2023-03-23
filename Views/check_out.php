<!DOCTYPE html>
<html lang="en">

<?php include_once "head/head.php";
include_once "../config.php"; ?>

<body>
    <!-- Start Top Nav -->
    <?php include_once "nav/nav.php" ?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php include_once "header/header.php" ?>
    <!-- Close Header -->

    <!-- Modal -->
    <?php include_once "modal/modal.php" ?>

    <?php include_once ROOT . "/Model/productModel.php";
    include_once ROOT . "/Model/userModel.php";
    ?>
    <div class="container">
        <div class="py-5 text-center">

            <h2>Checkout</h2>

        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <?php
                if (!empty($_SESSION["cart"])) {
                    $product = $_SESSION["cart"];
                    foreach ($product as $pro) {
                ?>

                        <ul class="list-group mb-3">




                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Product name</h6>
                                    <small class="text-muted"><?php echo $pro[0]["tenGiay"] ?></small>
                                </div>
                                <span class="text-muted"><?php echo number_format($pro[0]["gia"]) ?></span>
                            </li>

                        <?php

                    }
                        ?>
                        <form class="card p-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Promo code">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Redeem</button>
                                </div>
                            </div>
                        </form>
                    <?php

                } else {
                    ?>
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart empy</span>
                            <span class="badge badge-secondary badge-pill">3</span>
                        </h4>
                    <?php
                }


                    ?>
                        </ul>

            </div>

            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate action="../Controller/orderController.php" method="POST">
                    <?php
                    $userID = $_SESSION['userID'];
                    $user = new userModel($userID, "", "", "", "", "", "", "", 0);
                    $dataUser = $user->getDataByID();
                    if(!isset($_SESSION["shoppingCart_FullName"])){
                        $_SESSION["shoppingCart_FullName"]=$_POST["shoppingCart_FullName"];
                        $_SESSION["shoppingCart_PhoneNumber"]=$_POST["shoppingCart_PhoneNumber"];
                        $_SESSION["shoppingCart_Email"]=$_POST["shoppingCart_Email"];
                    }
                    ?>
                    <div class="col-md-9 mb-3">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Full name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo  $_SESSION["shoppingCart_FullName"] ?>" required disabled>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                    </div>

                    <div class="col-md-9 mb-3">
                        <label for="username">Phone Number</label>
                        <div class="input-group">

                            <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $_SESSION["shoppingCart_PhoneNumber"] ?>" required disabled>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo  $_SESSION["shoppingCart_Email"] ?>" required disabled>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="address">Address</label>
                        <div class="input-group ">
                            <div class="row ">
                                <div class="col-md-4 mb-4">
                                    <select name="province" id="province" class="select form-control">
                                        <option value="">Tỉnh/Thành phố</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4 ">
                                    <select name="district" id="district" class="select form-control">
                                        <option value="">Quận/Huyện</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-4 ">
                                    <select name="ward" id="ward" class="select form-control">
                                        <option value="">Phường/Xã</option>
                                    </select>
                                </div>
                                <span><input type="text" class="form-control" id="address" name="address" required /> </span>
                                <?php

                                if (isset($_SESSION["emptyAddress"]) == true &&   $_SESSION["emptyAddress"] == true) {
                                    echo ' <label style="color:red" class="form-label" for="form3Example1c">Plese enter your address</label>';
                                    unset($_SESSION["emptyAddress"]);
                                }
                                ?>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" name="action" value="checkOut" type="submit">Checkout</button>
                    <hr class="mb-4">
                </form>
                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="./xulythanhtoanmomo.php">
                    <input type="hidden" value="<?php echo $_SESSION['sum']; ?>" name="tongtien_vnd">
                    <input type="submit" name="momo" value="Thanh toán MOMO QRCode" class="btn btn-danger">
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2021 - 2045 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <!-- Start Footer -->
    <?php include_once "footer/footer.php" ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <?php include_once "script/script.php" ?>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="../assets/js/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./address.js"></script>

    <!-- End Slider Script -->

</body>

</html>