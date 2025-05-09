
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline">
            <input type="submit" class="form-control w-50 m-auto bg-warning" name="delete" value="Delete account">
        </div>
        <div class="form-outline">
            <input type="submit" class="form-control w-50 m-auto bg-dark text-white" name="dont_delete" value="Don't delete account">
        </div>
    </form>

    <?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="delete from `user_table` where username='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account Deleted succssfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}
    ?>