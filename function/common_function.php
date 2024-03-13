<?php

//including connect file
//include("./includes/connect.php");

//getting product
function getproducts(){
    global $con;

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "SELECT * FROM products order by rand() limit 0,9";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['Product_id'];
            $product_title = $row['Product_Title'];
            $product_description = $row['Product_Description'];
            $product_image1 = $row['Product_image1'];
            $product_price = $row['Product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
                
            echo "<div class='col-md-4'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <b class='card-price'>₹$product_price/-</b>
                            <br>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
        }
}
}
}

//get all products
function get_all_product(){
    global $con;

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "SELECT * FROM products order by rand()";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['Product_id'];
            $product_title = $row['Product_Title'];
            $product_description = $row['Product_Description'];
            $product_image1 = $row['Product_image1'];
            $product_price = $row['Product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
                
            echo "<div class='col-md-4'>
                    <div class='card' style='width: 18rem;'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <b class='card-price'>₹$product_price/-</b>
                            <br>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                            <a href='product_details.php?product_product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
        }
}
}
}  


//getting unique categories
function get_unique_categories() {
    global $con;

    // Condition to check if 'categories' is set in $_GET
    if (isset($_GET['category'])) {
        $category_id = mysqli_real_escape_string($con, $_GET['category']);

        $select_query = "SELECT * FROM products WHERE category_id = $category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger' >No products found for this category</h2>";
        } else {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['Product_id'];
                $product_title = $row['Product_Title'];
                $product_description = $row['Product_Description'];
                $product_image1 = $row['Product_image1'];
                $product_price = $row['Product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top'  alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <b class='card-price'>₹$product_price/-</b>
                                <br>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='product_details.php?product_product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                        </div>
                    </div>";
            }
        }
    }
}


//getting unique brands
function get_unique_brands() {
    global $con;

    // Condition to check if 'brand' is set in $_GET
    if (isset($_GET['brand'])) {
        $brand_id = mysqli_real_escape_string($con, $_GET['brand']);

        $select_query = "SELECT * FROM products WHERE brand_id = $brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No products found for this brand</h2>";
        } else {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['Product_id'];
                $product_title = $row['Product_Title'];
                $product_description = $row['Product_Description'];
                $product_image1 = $row['Product_image1'];
                $product_price = $row['Product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <b class='card-price'>₹$product_price/-</b>
                                <br>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='product_details.php?product_product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                        </div>
                    </div>";
            }
        }
    } 
}



//displaying brands in sidenav
function getbrands(){
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
                <a href='index.php?brand=$brand_id' class='nav-link text-dark'>$brand_title</a>
            </li>";
    }
}

//displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link text-dark'>$category_title</a>
            </li>";
    }
}


//searching products

function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value = $_GET['search_data'];  
        $search_query = "SELECT * FROM products WHERE Product_Keyword LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
          echo "<h2 class='text-center text-danger'>No result match, No product found on this category!</h2>";
        } //else {
        while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['Product_id'];
                $product_title = $row['Product_Title'];
                $product_description = $row['Product_Description'];
                $product_image1 = $row['Product_image1'];
                $product_price = $row['Product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <b class='card-price'>₹$product_price/-</b>
                                <br>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                <a href='product_details.php?product_product_id=$product_id' class='btn btn-secondary'>View More</a>
                                </div>
                        </div>
                    </div>";
            }
        }
    }
//view details
function view_details() {
    global $con;

    // Check if 'product_product_id' is set in the URL
    if (isset($_GET['product_product_id'])) {
        $product_id = mysqli_real_escape_string($con, $_GET['product_product_id']); // Sanitize input

        $select_query = "SELECT * FROM products WHERE Product_id='$product_id'";
        $result_query = mysqli_query($con, $select_query);

        // Check if the query was successful
        if ($result_query) {
            // Check if any rows were returned
            if (mysqli_num_rows($result_query) > 0) {
                while ($row = mysqli_fetch_assoc($result_query)) {
                    // Display details for the specific product
                    $product_id = $row['Product_id'];
                    $product_title = $row['Product_Title'];
                    $product_description = $row['Product_Description'];
                    $product_image1 = $row['Product_image1'];
                    $product_image2 = $row['Product_image2'];
                    $product_image3 = $row['Product_image3'];
                    $product_price = $row['Product_price'];

                    echo "<div class='col-md-4'>
                            <div class='card' style='width: 18rem;'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <b class='card-price'>₹$product_price/-</b>
                                    <br>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='./index.php' class='btn btn-secondary'>Go to Home</a>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-8'>
                            <!-- related images-->
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h4 class='text-center text-info mb-5'>Related images</h4>
                                </div>
                                <div class='col-md-6'>
                                    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                </div>
                                <div class='col-md-6'>
                                    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                </div>
                            </div>
                        </div>";
                }
            } else {
                echo "No product found with the given ID.";
            }
        } else {
            // Handle the case where the query was not successful
            echo "Error executing query: " . mysqli_error($con);
        }
    } else {
        // If 'product_product_id' is not set, display a list of products
        // You can customize this part based on your requirements
        // For now, I'll just print a message.
        echo "No product selected. Display a list of products here.";
    }
}

//get ip address function
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
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;

//cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND Product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            // Fix the variable name here, it should be $insert_query instead of $result_query
            $insert_query = "INSERT INTO `cart_details` (Product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 0)";
            $result_insert = mysqli_query($con, $insert_query);

            // Check if the insertion was successful before redirecting
            if ($result_insert) {
                echo "<script>alert('This item has been added successfully!Shop more ')</script>";
                echo "<script>window.open('index.php','_self')</script>";
  
            } else {
                echo "<script>alert('Error inserting into cart_details')</script>";
            }
        }
    }
}


//function to get cart item number
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        } 
    else {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        }
    echo $count_cart_items;    
}
    
//total price function
function total_cart_price(){
    global $con;  
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['Product_id'];
        $select_products = "SELECT * FROM `products` WHERE Product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price = $row_product_price['Product_price'];
            $price_table = $row_product_price['Product_price'];
            $product_title = $row_product_price['Product_Title'];
            $product_image1 = $row_product_price['Product_image1'];
            $product_price1=array($row_product_price['Product_price']);
            $quantity = $row['quantity'];
            $total_price += max($quantity * $product_price, array_sum($product_price1));
            //$product_price=array($row_product_price['Product_price']);
            //$product_values=array_sum($product_price);
            //$total_price+=$product_values;
        }
    }
    echo $total_price;
}

// get user order details
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="SELECT * FROM `user_table` WHERE username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
                    $result_orders_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    }else{
                        echo "<h3 class='text-center'>Your shopping is pending</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'>Shop Now</a></p>";
                    }
                }
            }
        }
    }
}
?>