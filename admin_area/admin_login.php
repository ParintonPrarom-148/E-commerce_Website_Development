<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <!-- Favicon  -->
    <link rel="icon" href="../img/core-img/icon.ico">
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../css/core-style.css">
    <style>
    body{
        overflow-x:hidden;
    }
    </style>
<body>
<div class="container-fluid m-3">
    <h2 class="text-center">Admin Login</h2>
    <div class="row d-flex align-item-center justify-content-center mt-5">
        <div class="lg-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <!-- username field -->
    <div class="form-outline mb-4">
        <label for="admin_username" class="form-label">Username</label>
        <input type="text" id="admin_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="admin_username"/>
    </div>
    <!-- password field -->
    <div class="form-outline mb-4">
        <label for="admin_password" class="form-label">Password</label>
        <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="admin_password"/>
    </div>
    <div class="mt-4 pt-2">
        <input type="submit" value="Login" class="btn amado-btn mb-15" name="admin_login">
    </div>
</form>
        </div>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['admin_login'])){
    $admin_username=$_POST['admin_username'];
    $admin_password=$_POST['admin_password'];
    $select_query="select * from `admin_table` where admin_name='$admin_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    if($row_count>0){
        $_SESSION['admin_name']=$admin_username;
        if(password_verify($admin_password,$row_data['admin_password'])){
            if($row_count==1){
                $_SESSION['admin_name']=$admin_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credintials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credintials')</script>";
    }
}
?>