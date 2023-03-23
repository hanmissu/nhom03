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

    <?php include_once "../Model/productModel.php";
    include_once "../Model/userModel.php";
    ?>


    <!-- Open Content -->
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <h5 class="mb-3"><a href="./shop.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                <h5 class="mb-3"><a href="./order.php" class="text-body"><i class="fas fa-long-arrow-alt-right me-2"></i>View order</a></h5>
                                <h5></h5>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Shopping cart</p>
                                        <p class="mb-0">You have <?php if (!empty($_SESSION["cart"])) echo count($_SESSION['cart']);
                                                                    else echo 0 ?> items in your cart</p>
                                    </div>
                                    <div>
                                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                    </div>
                                </div>
                                <?php
                                $_SESSION['sum'] = 0;
                                $product = isset($_SESSION["cart"]) ? $_SESSION["cart"] : "";
                                if ($product == "") {
                                ?>
                                    <h1>GIỎ HÀNG TRỐNG</h1>
                                    <div class="col-lg-12">

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">

                                                        <div>
                                                            <a href="#">

                                                            </a>

                                                        </div>

                                                        <div class="ms-2">
                                                            <a style=" text-decoration: none; color: #000;" href="#">
                                                                <h5></h5>
                                                                <p class="small mb-0"></p>
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 500px;">
                                                            <h5 class="fw-normal mb-0"> </h5>
                                                        </div>
                                                        <div style="width: 150px;">
                                                            <h5 class="mb-0"><sub></sub></h5>
                                                        </div>

                                                        <a href="#" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    foreach ($product as $pro) {
                                        $soLuong = $_SESSION['number'][$pro[0]["maGiay"]];
                                        $size = $_SESSION['size'][$pro[0]['maGiay']];
                                    ?>

                                        <div class="col-lg-12">

                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">

                                                            <div>
                                                                <a href="./shop-single.php?id=<?php $pro[0]["maGiay"]  ?>">
                                                                    <img src="../img/<?php echo $pro[0]["anh"] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                                </a>

                                                            </div>

                                                            <div class="ms-2">
                                                                <a style=" text-decoration: none; color: #000;" href="./shop-single.php?id=<?php $pro[0]["maGiay"]  ?>">
                                                                    <h5><?php echo $pro[0]["tenGiay"] ?></h5>
                                                                    <p class="small mb-0">Size: <?php echo $pro[0]["size"] ?></p>
                                                                </a>

                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 500px;">
                                                                <h5 class="fw-normal mb-0"> <?php echo $soLuong ?></h5>
                                                            </div>
                                                            <div style="width: 150px;">
                                                                <h5 class="mb-0"><?php echo number_format($pro[0]["gia"] * $soLuong);
                                                                                    $_SESSION['sum'] += $_SESSION["tongTien"][$pro[0]["maGiay"]] = $pro[0]['gia'] * $soLuong;
                                                                                    ?><sub>đ</sub></h5>
                                                            </div>

                                                            <a href="../Controller/CartController.php?action=delete&idDel=<?php echo $pro[0]["maGiay"] ?>" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <div class="col-lg-12">
                                    <?php
                                    $userID = isset($_SESSION['userID']) ? $_SESSION["userID"] : "";
                                    $user = new userModel($userID, "", "", "", "", "", "", "", 0);
                                    $dataUser = $user->getDataByID();
                                    if (isset($_SESSION["signIn"]) == false) {
                                    ?>

                                        <div class="card bg-primary text-white rounded-3">
                                            <div class="card-body">


                                                <p class="small mb-2">Check out</p>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                                                <form class="mt-4" action="./check_out.php" method="POST">
                                                    <div class="form-outline form-white mb-4">
                                                        <input name="shoppingCart_FullName" type="text" id="typeName" class="form-control form-control-lg" siez="17" value="" required />
                                                        <label class="form-label" for="typeName">Full name</label>
                                                    </div>

                                                    <div class="form-outline form-white mb-4">
                                                        <input name="shoppingCart_PhoneNumber" type="text" id="typeText" class="form-control form-control-lg" siez="17" minlength="19" maxlength="19" value="" />
                                                        <label class="form-label" for="typeText">Phone Number</label>
                                                    </div>

                                                    <div class="form-outline form-white mb-4">
                                                        <input name="shoppingCart_Email" type="email" id="typeText" class="form-control form-control-lg" value="" required />
                                                        <label class="form-label" for="typeText">Email</label>
                                                    </div>

                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Subtotal</p>
                                                        <p class="mb-2"><?php echo number_format($_SESSION["sum"])  ?></p>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Shipping</p>
                                                        <p class="mb-2">$20.00</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-4">
                                                        <p class="mb-2">Total(Incl. taxes)</p>
                                                        <p class="mb-2"><?php echo number_format($_SESSION["sum"] + 20) ?></p>
                                                    </div>

                                                    <button type="button" class="btn btn-info btn-block btn-lg">
                                                        <div class="d-flex justify-content-between">
                                                            <?php
                                                            if (!empty($_SESSION['cart'])) {
                                                            ?>
                                                                <a style=" text-decoration: none" href="./sign-in.php"> <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span></a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a style=" text-decoration: none" href="#"> <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span></a>
                                                            <?php
                                                            } ?>


                                                        </div>
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    if (isset($_SESSION["signIn"]) && $_SESSION["signIn"] == true) {
                                    ?>
                                        <div class="card bg-primary text-white rounded-3">
                                            <div class="card-body">


                                                <p class="small mb-2">Check out</p>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                                                <form class="mt-4" action="./check_out.php" method="POST">
                                                    <div class="form-outline form-white mb-4">
                                                        <input name="shoppingCart_FullName" type="text" id="typeName" class="form-control form-control-lg" value="<?php echo $dataUser[0]['tenKH'] ?>" required />
                                                        <label class="form-label" for="typeName">Full name</label>
                                                    </div>

                                                    <div class="form-outline form-white mb-4">
                                                        <input name="shoppingCart_PhoneNumber" type="text" id="typeText" class="form-control form-control-lg" minlength="10" maxlength="11" value="<?php echo $dataUser[0]['SDT'] ?>" required />
                                                        <label class="form-label" for="typeText">Phone Number</label>
                                                    </div>

                                                    <div class="form-outline form-white mb-4">
                                                        <input name="shoppingCart_Email" type="email" id="typeText" class="form-control form-control-lg" value="<?php echo $dataUser[0]['email'] ?>" required />
                                                        <label class="form-label" for="typeText">Email</label>
                                                    </div>
                                                    <!-- <div class="form-outline form-white mb-4">
                                                    <input type="text" id="typeText" name="address" class="form-control form-control-lg" siez="17" minlength="19" maxlength="19" required />
                                                    <label class="form-label" for="typeText">Address</label>
                                                </div> -->


                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Subtotal</p>
                                                        <p class="mb-2"><?php echo number_format($_SESSION["sum"])  ?></p>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Shipping</p>
                                                        <p class="mb-2">$20.00</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-4">
                                                        <p class="mb-2">Total(Incl. taxes)</p>
                                                        <p class="mb-2"><?php echo number_format($_SESSION["sum"] + 20) ?></p>
                                                    </div>


                                                    <div class="d-flex justify-content-between">
                                                        <?php
                                                        if (!empty($_SESSION['cart'])) {
                                                        ?>

                                                            <button type="submit" class="btn btn-success"><span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span></button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button type="submit" class="btn btn-success"><span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span></button>
                                                        <?php
                                                        } ?>


                                                    </div>
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>


                                </div>

                            </div>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Start Footer -->
    <?php include_once "footer/footer.php" ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <?php include_once "script/script.php" ?>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="../assets/js/slick.min.js"></script>

    <!-- End Slider Script -->

</body>

</html>