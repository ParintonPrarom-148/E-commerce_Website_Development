<?php
if(isset($_GET['delete_district'])){
    $delete_districts=$_GET['delete_district'];
    $delete_query="delete from `districts` where district_id=$delete_districts";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('districts is been Deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_districts','_self')</script>";
    }
}
?>