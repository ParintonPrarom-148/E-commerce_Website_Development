<?php
// getting products
function getproducts(){
    global $con;
    // condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['district'])){
            $select_query="select * from `products` order by rand() LIMIT 0,6";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $district_id=$row['district_id'];
                echo 
                "
                <div class='single-products-catagory clearfix'>
                    <a href='product_details.php?product_id=$product_id'>
                        <img src='./admin_area/product_images/$product_image1' alt=''>
                        <div class='hover-content'>
                            <div class='line'></div>
                            <p class='text-white'>$product_price ฿</p>
                            <h4 class='text-white'>$product_title</h4>
                        </div>
                    </a>
                </div>"
                ;
            }
        }
    }
}
//getting all products
function get_all_products(){
    global $con;
    $num_per_page=06;
if(isset($_GET["page"])){
    $page=$_GET["page"];
}else{
    $page=1;
}
$start_from=($page-1)*06;
    if(!isset($_GET['category'])){
        if(!isset($_GET['district'])){
            $select_query="select * from products limit $start_from,$num_per_page";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_image2=$row['product_image2'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $district_id=$row['district_id'];
                
                echo 
                "<div class='col-12 col-sm-6 col-md-12 col-xl-6'>
                <div class='single-product-wrapper'>
                    <div class='product-img'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <img class='hover-img' src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='product-description d-flex align-items-center justify-content-between'>
                        <div class='product-meta-data'>
                            <div class='line'></div>
                            <p class='product-price'>$product_price ฿</p>
                            <a href='product_details.php?product_id=$product_id'>
                                <h6>$product_title</h6>
                            </a>
                        </div>
                        <div class='ratings-cart text-right'>
                            <div class='ratings'>
                            </div>
                            <div class='cart'>
                                <a href='index.php?add_to_cart=$product_id' data-toggle='tooltip' data-placement='left' title='Add to Cart'><img src='img/core-img/cart.png' alt=''></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            }
        }
    }
}
//getting unique categories
function get_unique_categories(){
    global $con;
    // condition to check isset or not
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        $select_query="select * from products where category_id= $category_id ";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $district_id=$row['district_id'];
            echo 
            "<div class='col-12 col-sm-6 col-md-12 col-xl-6'>
            <div class='single-product-wrapper'>
                <div class='product-img'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <img class='hover-img' src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                </div>
                <div class='product-description d-flex align-items-center justify-content-between'>
                    <div class='product-meta-data'>
                        <div class='line'></div>
                        <p class='product-price'>$product_price ฿</p>
                        <a href='product_details.php?product_id=$product_id'>
                            <h6>$product_title</h6>
                        </a>
                    </div>
                    <div class='ratings-cart text-right'>
                        <div class='ratings'>
                        </div>
                        <div class='cart'>
                            <a href='index.php?add_to_cart=$product_id' data-toggle='tooltip' data-placement='left' title='Add to Cart'><img src='img/core-img/cart.png' alt=''></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        }
    }
}
// displaying districts in sidenav
function getdistricts(){
    global $con;
    $select_districts="Select * from `districts`";
    $result_districts=mysqli_query($con,$select_districts);
    while($row_data=mysqli_fetch_assoc($result_districts)){
    $district_title=$row_data['district_title'];
    $district_id=$row_data['district_id'];
    echo "
    <li><a href='shop.php?district=$district_id'>$district_title</a></li>";
    }
}
//getting unique districts
function get_unique_districts(){
    global $con;
    // condition to check isset or not
    if(isset($_GET['district'])){
        $district_id=$_GET['district'];
        $select_query="select * from `products` where district_id= $district_id ";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"<h2 class='text-center text-danger'>This district is not available for service</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $district_id=$row['district_id'];
            echo 
            "<div class='col-12 col-sm-6 col-md-12 col-xl-6'>
                <div class='single-product-wrapper'>
                    <div class='product-img'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <img class='hover-img' src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='product-description d-flex align-items-center justify-content-between'>
                        <div class='product-meta-data'>
                            <div class='line'></div>
                            <p class='product-price'>$product_price ฿</p>
                            <a href='product_details.php?product_id=$product_id'>
                                <h6>$product_title</h6>
                            </a>
                        </div>
                        <div class='ratings-cart text-right'>
                            <div class='ratings'>
                            </div>
                            <div class='cart'>
                                <a href='index.php?add_to_cart=$product_id' data-toggle='tooltip' data-placement='left' title='Add to Cart'><img src='img/core-img/cart.png' alt=''></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
        }
    }
}
// displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories="Select * from `categories`";
    $result_categories=mysqli_query($con,$select_categories);
while($row_data=mysqli_fetch_assoc($result_categories)){
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];
    echo "
    <li><a href='shop.php?category=$category_id'>$category_title</a></li>";
}
}

// searching products function
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"
            <div class=''>
            <h2 class='text-center text-danger'>No results match. No products found on this category!</h2>
            </div>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_image2=$row['product_image2'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $district_id=$row['district_id'];
                echo 
                "<div class='col-12 col-sm-6 col-md-12 col-xl-6'>
                <div class='single-product-wrapper'>
                    <div class='product-img'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <img class='hover-img' src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='product-description d-flex align-items-center justify-content-between'>
                        <div class='product-meta-data'>
                            <div class='line'></div>
                            <p class='product-price'>$product_price ฿</p>
                            <a href='product_details.php?product_id=$product_id'>
                                <h6>$product_title</h6>
                            </a>
                        </div>
                        <div class='ratings-cart text-right'>
                            <div class='ratings'>
                            </div>
                            <div class='cart'>
                                <a href='index.php?add_to_cart=$product_id' data-toggle='tooltip' data-placement='left' title='Add to Cart'><img src='img/core-img/cart.png' alt=''></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            }
        }
    }
// view details function
function view_details_description(){
    global $con;
if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['district'])){
            $product_id=$_GET['product_id'];
            $select_query="select * from `products` where product_id=$product_id";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_image2=$row['product_image2'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $district_id=$row['district_id'];
                echo
                "<div class='single_product_desc'>
                <div class='product-meta-data'>
                    <div class='line'></div>
                    <p class='product-price'>$product_price ฿</p>
                    <a href='product_details.php?product_id=$product_id'>
                        <h6>$product_title</h6>
                    </a>
                </div>
                <div class='short_overview my-5'>
                    <p>$product_description</p>
                </div>
                    <a href='index.php?add_to_cart=$product_id' class='btn amado-btn'>Add to cart</a>
                    <a href='index.php' class='btn amado-secondary'>Go home</a>
                </form>
            </div>";
            }
        }
    }
}
}

function view_details_picture(){
    global $con;
if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['district'])){
            $product_id=$_GET['product_id'];
            $select_query="select * from `products` where product_id=$product_id";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_image2=$row['product_image2'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $district_id=$row['district_id'];
                echo
                "<div class='single_product_thumb'>
                <div id='product_details_slider' class='carousel slide' data-ride='carousel'>
                    <ol class='carousel-indicators'>
                        <li class='active' data-target='#product_details_slider' data-slide-to='0' style='background-image: url(admin_area/product_images/$product_image1);'>
                        </li>
                        <li data-target='#product_details_slider' data-slide-to='1' style='background-image: url(admin_area/product_images/$product_image2);'>
                        </li>
                    </ol>
                    <div class='carousel-inner'>
                        <div class='carousel-item active'>
                            <a class='gallery_img' href='admin_area/product_images/$product_image1'>
                                <img class='d-block w-100' src='admin_area/product_images/$product_image1' alt='First slide'>
                            </a>
                        </div>
                        <div class='carousel-item'>
                            <a class='gallery_img' href='admin_area/product_images/$product_image2'>
                                <img class='d-block w-100' src='admin_area/product_images/$product_image2' alt='Second slide'>
                            </a>
                        </div>
                    </div>
                </div>
            </div>";
            }
        }
    }
}
}

// get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
//whether ip is from the remote address  
    else{  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  

function cart(){
if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();  
    $get_product_id=$_GET['add_to_cart'];
    $select_query="select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo"<script>alert('This item is already present inside cart')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',1)";
            $result_query=mysqli_query($con,$insert_query);
            echo"<script>alert('Item is added to cart')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }
}
}

// function to get cart item numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();  
        $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $con;
        $get_ip_add = getIPAddress();  
        $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

// total price function
function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        }
    }
    echo $total_price;
}

// get user order details
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo
                        "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    }else{
                        echo
                        "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
                    }
                }
            }
        }
    }
}

// get admin
function get_admin_order_details(){
    global $con;
    $admin_username=$_SESSION['admin_username'];
    $get_details="select * from `admin_table` where admin_name='$admin_username'";
    $result_query=mysqli_query($con,$get_details);
    }
?>

