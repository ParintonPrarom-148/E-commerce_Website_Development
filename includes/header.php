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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="./user_area/checkout.php">Checkout</a></li>
            
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
        <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span><?php cart_item();?></span></a>
        <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
    </div>
</header>
<!-- Header Area End -->