


<?php 
include('includes/connect.php');
include('functions/common_function.php');
$num_per_page=06;
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>OTOP - ผลิตภัณฑ์โอทอป จังหวัดชลบุรี | shop</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/icon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="search_product.php" method="get">
                        <input type="search" name="search_data" id="search" placeholder="Type your keyword...">
                            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

     <!-- ##### Main Content Wrapper Start ##### -->
     <div class="main-content-wrapper d-flex clearfix">

<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
    <!-- Navbar district -->
    <div class="amado-navbar-district">
        <a href="index.php"><img src="img/core-img/Nandi_OTOP_4.png" alt=""></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>
<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="index.php"><img src="img/core-img/Nandi_OTOP_4.png" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
        <?php
        if(!isset($_SESSION['username'])){
        echo 
        "<li><a href='./user_area/user_login.php'>Welcome Guest</a></li>";
        }else{
        echo 
        "<li><a href='./user_area/profile.php'>Welcome ".$_SESSION['username']."</a></li>";}
        ?>
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="shop.php">Shop</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="about.php">About</a></li>
            
        </ul>
    </nav>
    <!-- Button Group -->
    <div class="amado-nav">
        <?php
        if(!isset($_SESSION['username'])){
            echo 
            "<a href='./user_area/user_login.php' class='btn amado-btn mb-15'>Login</a>";
        }else{
            echo 
            "<a href='./user_area/logout.php' class='btn amado-btn mb-15'>Logout</a>";
        }
        ?>
    </div>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""><span><?php cart_item();?></span></a>
        <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
    </div>
</header>
<!-- Header Area End -->
<?php
cart();
?>
        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>
                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                    <?php
                    getcategories();
                    ?>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">districts</h6>
                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                    <?php
                    getdistricts();
                    ?>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget color mb-50">
                
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget price mb-50">
                
            </div>
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

            <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <div class="view d-flex">
                                </div>
                            </div>
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                </div>
                                <div class="view-product d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php
                search_product();
                ?>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                            <?php
                            if(isset($_GET['category'])){
                                
                            }elseif(isset($_GET['district'])){

                            }elseif(isset($_GET['search_data'])){
                                
                            }else{
                                $select_query="select * from products";
                                $result_query=mysqli_query($con,$select_query);
                                $total_records=mysqli_num_rows($result_query);
                                $total_pages=ceil($total_records/$num_per_page);
                                for($i=1;$i<=$total_pages;$i++){
                                    echo "<li class='page-item'><a class='page-link' href='shop.php?page=".$i."'>".$i."</a>";
                                }
                            }
                            ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <?php
    include("./includes/footer.php")
    ?>

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>