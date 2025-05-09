<?php
if(isset($_GET['edit_districts'])){
    $edit_district=$_GET['edit_districts'];
    $get_districts="select * from `districts` where district_id=$edit_district";
    $result=mysqli_query($con,$get_districts);
    $row=mysqli_fetch_assoc($result);
    $district_title=$row['district_title'];
}
if(isset($_POST['edit_district'])){
    $district_title=$_POST['district_title'];
    $update_query="update `districts` set district_title='$district_title' where district_id=$edit_district";
    $result_district=mysqli_query($con,$update_query);
    if($result_district){
        echo "<script>alert('district is been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_districts','_self')</script>";
    }
}
?>
<div class="container mt-3">
    <h1 class="text-center">Edit district</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="district_title" class="form-label">district Title</label>
            <input type="text" name="district_title" id="district_title" class="form-control" required="required" value='<?php echo $district_title; ?>'>
        </div>
        <input type="submit" value="Update district" class="btn btn-info px-3 mb-3" name="edit_district">
    </form>
</div>