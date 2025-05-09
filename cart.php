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
    <title>OTOP - ผลิตภัณฑ์โอทอป จังหวัดชลบุรี | Cart</title>

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
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
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
            <li class="active"><a href="cart.php">Cart</a></li>
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
    </div>
</header>
<!-- Header Area End -->
<?php
cart();
?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
            <form action="" method="post">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                            <?php
                            $get_ip_add = getIPAddress();
                            $total_price=0;
                            $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                            $result=mysqli_query($con,$cart_query);
                            $result_count=mysqli_num_rows($result);
                            if($result_count>0){
                            echo 
                            "<thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>";
                            while($row=mysqli_fetch_array($result)){
                                $product_id=$row['product_id'];
                                $select_products="select * from `products` where product_id='$product_id'";
                                $result_products=mysqli_query($con,$select_products);
                                while($row_product_price=mysqli_fetch_array($result_products)){
                                    $product_price=array($row_product_price['product_price']);
                                    $price_table=$row_product_price['product_price'];
                                    $product_title=$row_product_price['product_title'];
                                    $product_image1=$row_product_price['product_image1'];
                                    $product_values=array_sum($product_price);
                                    $total_price+=$product_values;
                                    ?> 
                                <tbody>
                                    <tr>
                                        <td class="cart_product_img"><a href=""><img src="./admin_area/product_images/<?php echo $product_image1?>" alt=""></a></td>
                                        <td class="cart_product_desc"><h5><?php echo $product_title?></h5></td>
                                        <td class="price"><?php echo $price_table?>฿</td> 
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                                    </tr>
<?php }}}
                                    else{
                                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                                    } 
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                        <h5>Cart Total</h5>
                        <div class="custom-control mr-sm-2"><img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                                </div>
                    <?php
                    $get_ip_add = getIPAddress();
                    $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                        echo 
                        "<ul class='summary-table'><li><span>total:</span> <span>$total_price ฿</span></li></ul>
                        <td><input type='submit' value='Remove Cart' class='btn amado-btn w-100' name='remove_cart'></td>
                        <div class='cart-btn mt-100'><a href='./user_area/checkout.php' class='btn amado-btn w-100'>Checkout</a></div>";
                    }else{
                        echo
                        "<input type='submit' value='Continue Shopping' class='btn amado-btn w-100' name='continue_shopping'>";
                    }
                    if(isset($_POST['continue_shopping'])){
                        echo "<script>window.open('shop.php','_self')</script>";
                    }
                    ?>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ##### Main Content Wrapper End ##### -->
    <?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
    echo $remove_id;
    $delete_query="delete from `cart_details` where product_id=$remove_id";
    $run_delete=mysqli_query($con,$delete_query);
    if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
}
}
echo $remove_item=remove_cart_item();
?>
<!-- include footer -->
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