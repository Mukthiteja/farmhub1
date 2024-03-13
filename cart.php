<!-- connect file-->
<?php
include('./includes/connect.php');
include('./function/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmHub Cart</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- custom css link-->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            autoDisplay: false
        }, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <style>
    /* Styling for Google Translate dropdown */
    #google_translate_element {
        margin-left: 20px;
        margin-right: 20px;
    }

    #google_translate_element select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 14px;
        color: #333;
    }

    #google_translate_element a {
        color: #333;
    }

    .navbar-nav .nav-link:hover {
        background-color: #689F38;
        /* Lighter shade of green */
        color: #ffffff;
        /* White text on hover */
    }

    .col-md-10 {
        max-width: 80%;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /*remove horizontal scrolling*/
    body {
        overflow-x: hidden;
    }
    </style>

</head>

<body>
    <header>
        <!--nav bar-->
        <div class="container-fluid p-0">
            <!-- first child-->
            <nav class="navbar navbar-expand-lg justify-content-center" style="background-color: #8BC34A;">
                <div class="container-fluid">
                    <img class="logo p-2" src="images/logo.png" alt="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item ">
                                <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#a">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="cart.php"><i
                                        class="fas fa-shopping-cart"></i><sup>
                                            <?php cart_item();
                                            ?></sup></a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" action="search_product.php" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                            <input type="submit" value="Search" class="btn btn-dark" name="search_data_product">
                            <!--<button class="btn btn-dark" type="submit">Search</button>-->
                        </form>
                        <div id="google_translate_element"></div>
                    </div>
                </div>
            </nav>
            <!--calling cart function-->
            <?php 
                cart();
            ?>
        </div>
    </header>
    <main>
        <!-- 2nd child-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <?php
if (!isset($_SESSION['username'])) {
    // User is not logged in
    echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/user_login.php'>Welcome guest</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='./users_area/user_login.php'>Login</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link text-light' href='./users_area/user_registration.php'>Register</a>
          </li>";
} else {
    // User is logged in
    
    echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/profile.php'>Hello " . $_SESSION['username'] . "</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='./users_area/logout.php'>Logout</a>
          </li>";
}
?>

            </ul>
        </nav>
        <!--3rd child-->
        <div class="bg-light text-center">
        <p>All Needs of farmer under one Roof</p>
        </div>

        <!-- 4th child-->
        <?php
global $con;
$get_ip_add = getIPAddress();
$total_price = 0;

// Handle updates when 'Update Cart' is clicked
if (isset($_POST['update_cart'])) {
    // Check if 'qty' array is set in the POST data
    if (isset($_POST['qty']) && is_array($_POST['qty'])) {
        foreach ($_POST['qty'] as $product_id => $quantity) {
            // Validate and sanitize the input
            $product_id = mysqli_real_escape_string($con, $product_id);
            $quantity = intval($quantity);

            // Update the cart_details table with the new quantity
            $update_query = "UPDATE cart_details SET quantity = $quantity WHERE ip_address = '$get_ip_add' AND Product_id = '$product_id'";
            mysqli_query($con, $update_query);
        }
    }
}

// Handle removal when 'Remove' is clicked
if (isset($_POST['remove_cart'])) {
    // Check if 'remove' array is set in the POST data
    if (isset($_POST['remove']) && is_array($_POST['remove'])) {
        foreach ($_POST['remove'] as $product_id => $remove) {
            // Validate and sanitize the input
            $product_id = mysqli_real_escape_string($con, $product_id);

            // Remove the item from the cart_details table
            $remove_query = "DELETE FROM cart_details WHERE ip_address = '$get_ip_add' AND Product_id = '$product_id'";
            mysqli_query($con, $remove_query);
        }
    }
}

// Fetch and display cart items
$cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
$result = mysqli_query($con, $cart_query);
$row_count = mysqli_num_rows($result);

// Display cart items or empty cart message
?>
<div class="container">
    <div class="row">
        <form action="" method="post">
            <?php if ($row_count > 0) { ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['Product_id'];
                            $select_products = "SELECT * FROM `products` WHERE Product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = $row_product_price['Product_price'];
                                $price_table = $row_product_price['Product_price'];
                                $product_title = $row_product_price['Product_Title'];
                                $product_image1 = $row_product_price['Product_image1'];
                                $quantity = $row['quantity'];
                                //$product_values = $quantity * $product_price;
                                //$total_price += $product_values;
                        ?>
                                <tr>
                                    <td><?php echo $product_title; ?></td>
                                    <td><img src="./admin_area/product_images/<?php echo $product_image1; ?>" alt="<?php echo $product_title; ?>" class="cart_img"></td>
                                    <td><input type="number" name="qty[<?php echo $product_id; ?>]" class="form-control w-50" value="<?php echo max(1,$quantity); ?>" min="1"></td>
                                    <td><?php echo $price_table; ?></td>
                                    <td><input type="checkbox" name="remove[<?php echo $product_id; ?>]"></td>
                                    <td>
                                        <input type="submit" value="Update Cart" class="btn btn-primary px-3 py-2" name="update_cart">
                                        <button class="btn btn-danger px-3 py-2" name="remove_cart">Remove</button>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <!--total-->
                <div>
    <h4 class="px-3">Total: <strong><?php echo total_cart_price(); ?>/-</strong></h4>
    <!--<a href="index.php"><button class="btn btn-success btn-block my-2">Shop more</button></a>-->
    <a href="index.php" class="btn btn-success btn-block my-2">Shop More</a>
    <a href="users_area/checkout.php" class="btn btn-primary btn-block my-2">checkout</a>
</div>

            <?php } else { ?>
                <h2 class="text-center text-danger">Your cart is empty!</h2>
                <div class="text-center">
                    <a href="index.php" class="btn btn-primary">Shop Now</a>
                </div>
            <?php } ?>
        </form>
    </div>
</div>
    </main>
    <footer>
        <!-- last child-->
        <!-- include footer-->
        <div id="a">
        <?php
        include("./includes/footer.php")
        ?>
        </div>

        
    </footer>
    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>