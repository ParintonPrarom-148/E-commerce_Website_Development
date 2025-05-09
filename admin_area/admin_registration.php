<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin registration</title>
        <!-- Favicon  -->
        <link rel="icon" href="../img/core-img/icon.ico">
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <!-- Core Style CSS -->
     <link rel="stylesheet" href="../css/core-style.css">
<body>
<div class="container-fluid m-3">
    <h2 class="text-center">Admin Registration</h2>
    <div class="row d-flex align-item-center justify-content-center">
        <div class="lg-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <!-- username field -->
    <div class="form-outline mb-4">
        <label for="admin_username" class="form-label">Username</label>
        <input type="text" id="admin_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="admin_username"/>
    </div>
    <!-- email field -->
    <div class="form-outline mb-4">
        <label for="admin_email" class="form-label">Email</label>
        <input type="email" id="admin_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="admin_email"/>
    </div>
    <!-- password field -->
    <div class="form-outline mb-4">
        <label for="admin_password" class="form-label">Password</label>
        <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="admin_password"/>
    </div>
    <!-- confirm password field -->
    <div class="form-outline mb-4">
        <label for="conf_admin_password" class="form-label">Confirm Password</label>
        <input type="password" id="conf_admin_password" class="form-control" placeholder="confirm password" autocomplete="off" required="required" name="conf_admin_password"/>
    </div>
    <div class="mt-4 pt-2">
        <input type="submit" value="Register" class="btn amado-btn mb-15" name="admin_register">
    </div>
</form>
        </div>
    </div>
</div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['admin_register'])){
    $admin_username=$_POST['admin_username'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['conf_admin_password'];
    $user_ip=getIPAddress();
    //select query
    $select_query="select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Email already exist')</script>";
    }else if($admin_password!=$conf_admin_password){
        echo "<script>alert('Password do not match')</script>";
    }

    else{
        $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password,admin_ip)
        values ('$admin_username','$admin_email','$hash_password','$user_ip')";
        $sql_execute=mysqli_query($con,$insert_query);
        echo "<script>window.open('admin_login.php','_self')</script>";
    }
}
?>