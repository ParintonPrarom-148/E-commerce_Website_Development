<?php
if(isset($_GET['delete_user'])){
    $delete_users=$_GET['delete_user'];
    $delete_query="delete from `user_table` where user_id=$delete_users";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Users is been Deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}
?>