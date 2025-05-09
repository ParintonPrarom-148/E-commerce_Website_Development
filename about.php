<?php 
include('includes/connect.php');
include('functions/common_function.php');
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
    <title>OTOP - ผลิตภัณฑ์โอทอป จังหวัดชลบุรี | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/icon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">


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
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li class="active"><a href="about.php">About</a></li>
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
            </div>
        </header>
        <!-- Header Area End -->

<?php
cart();
?>
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">
                <div class="">
                    <h3 class="text-center text-dark">About us</h3>
                    
                </div>
                <h2 class="text-center text-warning">ที่มาของ OTOP สวนสาธารณะเฉลิมพระเกียรติ สวนหลวง ร.9 อบจ.ชลบุรี</h3>
                <p class="text-start text-dark">จากยุทธศาสตร์การพัฒนาหนึ่งตำบล หนึ่งผลิตภัณฑ์ (OTOP) ของจังหวัดชลบุรี รวมถึงภารกิจและอำนาจหน้าที่ขององค์การบริหารส่วนจังหวัดชลบุรี ในการส่งเสริมและสนับสนุนผลิตภัณฑ์ OTOP จังหวัดชลบุรี ให้เกิดการพัฒนาด้านผลิตภัณฑ์ ด้านบรรจุภัณฑ์ ให้มีรูปแบบที่เหมาะสมและทันสมัยเป็นที่ต้องการของตลาด มีศักยภาพเชิงพาณิชย์ เพิ่มช่องทางการจำหน่ายให้มากขึ้น รวมถึงการส่งเสริมประชาสัมพันธ์ผลิตภัณฑ์ OTOP จังหวัดชลบุรี ให้เป็นที่รู้จักอย่างกว้างขวางในทุกภาคส่วน ตลอดจนมีสถานที่จำหน่ายที่เป็นศูนย์ OTOP ประจำเพื่อรองรับการเจริญเติบโตของผลิตภัณฑ์ OTOP จังหวัดชลบุรี</p>
                <p class="text-start text-dark">องค์การบริหารส่วนจังหวัดชลบุรี ได้ตอบสนองนโยบายของรัฐบาลและส่งเสริมยุทธศาสตร์การพัฒนาหนึ่งตำบล หนึ่งผลิตภัณฑ์ (OTOP) ของจังหวัดชลบุรี จึงได้จัดทำโครงการก่อสร้างศูนย์ OTOP อบจ.ชลบุรี ขึ้น</p>
                <h3 class="text-start text-warning">วัตถุประสงค์</h3>
                <p class="text-start text-dark">1.เพื่อส่งเสริมยุทธศาสตร์การพัฒนาหนึ่งตำบล หนึ่งผลิตภัณฑ์ (OTOP) ของจังหวัดชลบุรี</p>
                <p class="text-start text-dark">2.เพื่อส่งเสริมช่องทางการจำหน่ายผลิตภัณฑ์ OTOP ให้เพิ่มมากขึ้น</p>
                <p class="text-start text-dark">3.เพื่อรองรับการเจริญเติบโตของผลิตภัณฑ์ OTOP จังหวัดชลบุรี</p>
                <p class="text-center text-dark">“พัฒนาเมืองชล สร้างคน สร้างเศรษฐกิจ”</p>
            </div>
        </div>
        <!-- Product Catagories Area End -->
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