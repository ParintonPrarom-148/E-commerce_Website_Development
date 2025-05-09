<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $district_id=$row['district_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_price=$row['product_price'];

    // fetchig category name
    $select_category="select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];

    // fetchig district name
    $select_district="select * from `districts` where district_id=$district_id";
    $result_district=mysqli_query($con,$select_district);
    $row_district=mysqli_fetch_assoc($result_district);
    $district_title=$row_district['district_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Tiltle</label>
            <input type="text" id="product_title" name="product_title" value="<?php echo $product_title?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" value="<?php echo $product_description?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords?>" name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
                <?php
                $select_category_all="select * from `categories`";
                $result_category_all=mysqli_query($con,$select_category_all);
                while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                };
                ?> 
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_districts" class="form-label">Product districts</label>
            <select name="product_districts" class="form-select">
                <option value="<?php echo $district_title?>"><?php echo $district_title?></option>
                <?php
                $select_district_all="select * from `districts`";
                $result_district_all=mysqli_query($con,$select_district_all);
                while($row_district_all=mysqli_fetch_assoc($result_district_all)){
                    $district_title=$row_district_all['district_title'];
                    $district_id=$row_district_all['district_id'];
                    echo "<option value='$district_id'>$district_title</option>";
                };
                ?> 
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" require="required">
                <img src="./product_images/<?php echo $product_image1?>"  alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" require="required">
                <img src="./product_images/<?php echo $product_image2?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" require="required" value="<?php echo $product_price?>">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- editing products -->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_districts=$_POST['product_districts'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];

    // checking for fields emply or not
    if($product_title=='' or $product_desc=='' or $product_keywords=='' or $product_category=='' or $product_districts=='' or $product_image1=='' or $product_image2=='' or $product_price==''){
        echo "<script>alert('Please fill all the fileds and continue the process')</script>";
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");

        //query to update products
        $update_product="update `products` set product_title='$product_title',
        product_description='$product_desc',product_keywords='$product_keywords',
        category_id='$product_category',district_id='$product_districts',
        product_image1='$product_image1',product_image2='$product_image2',product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }
}
?>