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
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon  -->
    <link rel="icon" href="../img/core-img/icon.ico">
    <!-- css file-->
    <link rel="stylesheet" href="../style.css">
    <style>
    body{
      overflow-x:hidden;
    }
    .profile_img{
    width:90%;
    margin:auto;
    display:block;
    height:100%;
    object-fit:contain;
    }
    .edit_image{
      width:100px;
      height:100px;
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
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <img src="../img/core-img/Nandi_OTOP_4.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../shop.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav me-auto">
      <?php
      if(!isset($_SESSION['username'])){
        echo 
        "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
      }else{
        echo 
        "<li class='nav-item'>
        <a class='nav-link' href='profile.php'>Welcome ".$_SESSION['username']."</a>
        </li>";
      }
      if(!isset($_SESSION['username'])){
        echo 
        "<li class='nav-item'>
        <a class='nav-link' href='./user_login.php'>Login</a>
        </li>";
      }else{
        echo 
        "<li class='nav-item'>
        <a class='nav-link' href='./logout.php'>Logout</a>
        </li>";
      }
      ?>
    </ul>
</nav>

<!-- third child -->

<!-- fourth child -->
<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-dark text-center" style="height:100vh">
        <li class="nav-item bg-warning">
            <a class="nav-link  text-dark" aria-current="page" href="#"><h4>Your profile</h4></a>
        </li>
        <?php
        $username=$_SESSION['username'];
        $user_image="select * from `user_table` where username='$username'";
        $user_image=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($user_image);
        $user_image=$row_image['user_image'];
        echo 
        " <li class='nav-item'>
          <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
          </li>";
        ?>
        <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="profile.php">Pending orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="profile.php?my_orders">My orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="logout.php">Logout</a>
        </li>
        </ul>
    </div>
    <div class="col-md-10 text-center">
    <?php
      get_user_order_details();
      if(isset($_GET['edit_account'])){
        include('edit_account.php');
      }
      if(isset($_GET['my_orders'])){
        include('user_orders.php');
      }
      if(isset($_GET['delete_account'])){
        include('delete_account.php');
      }
    ?>
    </div>
</div>


<!-- last child -->
<!-- include footer -->
<?php
include("../includes/footer_profile.php")
?>
    </div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>