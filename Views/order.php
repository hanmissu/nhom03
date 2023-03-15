<?php 
include_once "../config.php";
include_once ROOT."/Model/userModel.php";
include_once ROOT."/Model/orderModel.php";
include_once ROOT."/Model/orderDetailModel.php";
include_once ROOT."/Model/productModel.php";
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

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ngày xuất đơn</th>
                        <th scope="col">Tên người nhận</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $userID = isset($_SESSION["userID"]) ? $_SESSION["userID"] : "";
                        $order = new orderModel("", "", "", "", "", "", "");
                        $data = $order->getAll();
                        
                     
                        for ($i = 0; $i < count($data); $i++) {
                            $maDonhang=$data[$i]["maDonHang"];
                           // var_dump($data);die;
                            if ($data[$i]["maKH"] == $userID) {
                             
                                 ?>
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
                                        <?php
                                        if ($data[$i]["trangThai"] == 0) {
                                        ?> <p>Chưa hoàn thành</p><?php } 
                                        else { ?> <p>Đã hoàn thành</p><?php }?>
                                    </td>
                                    <td>
                                        <p><?php echo $data[$i]["diaChi"] ?></p>

                                    </td>

                                    <td>
                                        <p><?php echo number_format($data[$i]["tongTien"]) ?><sub>đ</sub></p>
                                    </td>
                                
                                    <td>
                                    <div class="cart-content-right-button">
                                    <?php
                                        if ($data[$i]["trangThai"] == 0) {
                                        ?>  <a href="../Controller/orderController.php?action=delete&idDel=<?php echo $data[$i]["maDonHang"] ?>"><button type="button" class="btn btn-danger">Hủy đơn</button></a><?php } 
                                        
                                        
                                    ?>
                                       
                                    </div>
                                      
                                    </td>
                                    
                                </tr>
                            <?php
                            }
                        }

                        ?>
                </tbody>
            </table>
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