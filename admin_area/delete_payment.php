<?php
if(isset($_GET['delete_payment'])){
    $delete_payments=$_GET['delete_payment'];
    $delete_query="delete from `user_payments` where payment_id=$delete_payments";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Payments is been Deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}
?>