<!DOCTYPE html>
<html lang="en">

<?php include_once "head/head.php";include_once "../config.php"; ?>

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
    $ProductID = $_GET['id'];
    // var_dump($ProductID);

    $product = new productModel($ProductID, "", 0, "", "", "", "", 0, 0);
    $dataProduct = $product->getData($ProductID);
    // var_dump($dataProduct);die;
    ?>


    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="../img/<?php echo $dataProduct[0]["anh"] ?>" alt="Card image cap" id="product-detail">
                    </div>


                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="../Controller/CartController.php?id=<?php echo $dataProduct[0]["maGiay"] ?>" method="POST">
                                <h1 class="h2"><?php echo $dataProduct[0]["tenGiay"] ?></h1>
                                <p class="h3 py-2"><?php echo number_format($dataProduct[0]["gia"]) ?>VNĐ</p>
                                <p class="py-2">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                                </p>

                                <!-- <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>Easy Wear</strong></p>
                                </li>   
                            </ul> -->

                                <h6>Description:</h6>
                                <p><?php echo $dataProduct[0]["moTa"] ?></p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Avaliable Color :</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong><?php echo $dataProduct[0]["mauSac"] ?></strong></p>
                                    </li>
                                </ul>

                                <!-- <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>Lorem ipsum dolor sit</li>
                                <li>Amet, consectetur</li>
                                <li>Adipiscing elit,set</li>
                                <li>Duis aute irure</li>
                                <li>Ut enim ad minim</li>
                                <li>Dolore magna aliqua</li>
                                <li>Excepteur sint</li>
                            </ul> -->


                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p style="font-weight: bold;">Size</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="product-content-right-product-size">
                                                <select name="size" class="custom-select tm-select-accounts">
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <p style="font-weight: bold;">Quantity</p>
                                        </li>
                                        <li class="list-inline-item">
                                        <div class="quantity">
                                       
                                        <input name=number type="number" min="1" max="10" value="1">

                                    </div>
                                        </li>
                                    </ul>
                                  
                                    <!-- <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="number" id="number"  min="1" max="10" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div> -->
                                </div>
                                <div class="row pb-3">

                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="action" value="add">Add To Cart</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->


    <!-- Start Footer -->
    <?php include_once "footer/footer.php" ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <?php include_once "script/script.php" ?>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="../assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>