<?php
include_once "../config.php";
include_once ROOT."/model/categoryModel.php";
include_once ROOT."/model/productModel.php";
include_once ROOT."/model/productModel.php";
include_once ROOT."/model/orderModel.php";
include_once ROOT."/model/orderDetailModel.php";
include_once ROOT."/model/userModel.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Admin HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->

</head>

<body id="reportsPage">
    <?php include_once "./masterPage/menu.php" ?>
    <div class="container mt-5">
        <div >
            <div >
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER ID</th>
                                    <th scope="col">DATE</th>
                                    <th scope="col">NAME CUSTOMMER</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ADDRESS</th>
                                    <th scope="col">CASH</th>
                                </tr>
                            </thead>

                            <!-- START List Order-->
                            <?php

                            $order = new orderModel("", "", "", "", "", "", "");
                            $data = $order->getAll();
    
                            for ($i = 0; $i < count($data); $i++) {
                                $maDonhang = $data[$i]["maDonHang"];
                            ?>
                             <form action="../Controller/orderController.php../Controller/orderController.php?action=update&id=<?php echo $data[$i]["maDonHang"]  ?>" method="POST"  enctype="multipart/form-data">
                                <tr>
                                    <td>
                                        <p><?php echo $data[$i]["maDonHang"] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $data[$i]["ngayXuat"] ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $data[$i]["tenKH"] ?></p>
                                    </td>
                                    <td>
                                    <select class="custom-select tm-select-accounts" id="status" name="status">                
                                        <?php
                                        ?> 
                                        <option value="0" <?php if($data[$i]["trangThai"]==0) echo "selected" ?>>Chưa hoàn thành</option>
                                        <option value="1"  <?php if($data[$i]["trangThai"]==1) echo "selected" ?>>Đã hoàn thành</option>
                                        <?php 
                                        ?>
                                    </select>
                              
                                    </td>
                                    <td>
                                        <p><?php echo $data[$i]["diaChi"] ?></p>

                                    </td>

                                    <td>
                                        <p><?php echo number_format($data[$i]["tongTien"]) ?><sub>đ</sub></p>
                                    </td>

                                    <td>
                                        <div class="cart-content-right-button">
                                
                                            <a href="../Controller/orderController.php?action=delete&idDel=<?php echo $data[$i]["maDonHang"] ?>">
                                            <i class="far fa-trash-alt"></i>
                                            </a>
                                          

                                        </div>

                                    </td>
                                    <td class="text-center">
                                        <button><a href="../Controller/orderController.php?action=update&id=<?php echo $data[$i]["maDonHang"]  ?>">
                                        <i class="fas fa-edit"></i>
                                        </a></button>
                                    
                                </td>              
                                </tr>
                                 
                                </form>
                            <?php
                            }
                          ?>
                            <!-- END List order-->
                        </table>
                       
                    </div>
                    <!-- table container -->
                   
                </div>
            </div>

          
                  
            </div>
        </div>
    </div>

    <?php include_once "./masterPage/footer.php" ?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $(".tm-product-name").on("click", function() {
                window.location.href = "edit-product.php";
            });
        });
    </script>
</body>

</html>