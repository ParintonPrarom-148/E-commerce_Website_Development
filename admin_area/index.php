<!-- connect file -->
<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
        <!-- Favicon  -->
        <link rel="icon" href="../img/core-img/icon.ico">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->

    <link rel="stylesheet" href="../style.css">
    <style>
.admin_image{
    width: 100px;
    object-fit: contain;
}
footer {
    position: fixed;
    height: 100px;
    bottom: 0;
    width: 100%;
}
body{
    overflow-x:hidden;
}
.product_img{
    width:100px;
    object-fit:contain;
}
.logo {
    width: 20%;
    height: 20%;
}
</style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0 nn bg-white">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <img src="../img/core-img/Nandi_OTOP_4.png" alt="" class="logo">
                <nav class="navber navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <?php
                        if(!isset($_SESSION['admin_name'])){
                            echo "<script>window.open('admin_login.php','_self')</script>";
                        }else{
                        echo 
                        "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a>
                        </li>";
                        }?>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-white">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col bg-warning p-3 align-items-center">
                <div class= "container text-center ">
                    <button><a href="index.php?insert_product" class="btn-sm btn amado-btn mb-15">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="btn-sm btn amado-btn mb-15">View Products</a></button>
                    <button><a href="index.php?insert_category" class="btn-sm btn amado-btn mb-15">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="btn-sm btn amado-btn mb-15">View Categories</a></button>
                    <button><a href="index.php?insert_district" class="btn-sm btn amado-btn mb-15">Insert districts</a></button>
                    <button><a href="index.php?view_districts" class="btn-sm btn amado-btn mb-15">View districts</a></button>
                    <button><a href="index.php?list_orders" class="btn-sm btn amado-btn mb-15">All orders</a></button>
                    <button><a href="index.php?list_payments" class="btn-sm btn amado-btn mb-15">All payments</a></button>
                    <button><a href="index.php?list_users" class="btn-sm btn amado-btn mb-15">List user</a></button>
                    <button><a href="logout.php" class="btn-sm btn amado-btn mb-15">Logout</a></button>
                </div>      
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3 bg-white">
            <?php 
            if(isset($_GET['insert_product'])){
                include('insert_product.php');
            }
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_district'])){
                include('insert_districts.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_products'])){
                include('delete_products.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['view_districts'])){
                include('view_districts.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['edit_districts'])){
                include('edit_districts.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }
            if(isset($_GET['delete_district'])){
                include('delete_district.php');
            }
            if(isset($_GET['delete_order'])){
                include('delete_order.php');
            }
            if(isset($_GET['delete_payment'])){
                include('delete_payment.php');
            }
            if(isset($_GET['delete_user'])){
                include('delete_user.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            ?>
        </div>   
    </div>




<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
  <!-- last child -->
</html>