<?php
if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    $delete_query="delete from `categories` where category_id=$delete_category";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('category is been Deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>