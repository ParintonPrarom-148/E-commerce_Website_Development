<?php
include('../includes/connect.php');
include('../functions/common_function.php');
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
    <title>OTOP - ผลิตภัณฑ์โอทอป จังหวัดชลบุรี | Payment</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/core-img/icon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    
    <!-- php code to access user id -->
    <?php
    $user_ip=getIPAddress();
    $get_user="select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
    <div class="container">
        
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <div class="cart-btn mt-100 text-center">
                <h2 class="text-center text-dark">Payment options</h2>
                <a class="btn btn-primary bg-warning btn-outline-warning text-white" href="order.php?user_id=<?php echo $user_id ?>" role="button">Pay</a>
            </div>
            </div>
        </div>
    </div>
    
    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../js/plugins.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>
</body>
</html>
