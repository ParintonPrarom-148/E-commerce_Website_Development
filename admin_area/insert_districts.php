<?php
include('../includes/connect.php');
if(isset($_POST['insert_district'])){
    $district_title=$_POST['district_title'];

    //select data from database
    $select_query="Select * from `districts` where district_title='$district_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This district is present inside the database')</script>";
    }else{
    $insert_query="insert into `districts` (district_title) values ('$district_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('district has been inserted successfully')</script>";
    }
}}
?>
<h2 class="text-center">Insert districts</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
    <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="district_title" placeholder="Insert districts" aria-label="districts" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
    
    <input type="submit" class="bg-warning border-0 p-2 my-3" name="insert_district" value="Insert districts">

</div>
</form>