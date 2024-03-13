<?php
// Fixing path issues for includes
include(__DIR__ . '/../includes/connect.php');
include(__DIR__ . '/../function/common_function.php');
@session_start();

// Check if the admin is not logged in, redirect to login page
if (empty($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmHub Admin</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- custom css link-->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-x: hidden;
        }

        .logo {
            width: 7%;
            height: auto; /* Fixed aspect ratio */
        }
    </style>
</head>

<body>
    <header>
        <!--nav bar-->
        <div class="container-fluid p-0">
            <!-- first child-->
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8BC34A;">
                <div class="container-fluid">
                    <img class="logo" src="../images/logo.png" alt="logo">
                    <ul class="navbar-nav ml-auto"> <!-- Use an unordered list for the navbar items -->
                        <?php
                        $admin_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '';

                        if (empty($admin_name)) {
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='admin_login.php'>Welcome guest</a>
                                  </li>
                                  <li class='nav-item'>
                                    <a class='nav-link' href='admin_login.php'>Login</a>
                                  </li>
                                  <li class='nav-item'>
                                    <a class='nav-link text-light' href='admin_registration.php'>Register</a>
                                  </li>";
                        } else {
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='index.php'>Hello " . $admin_name . "</a>
                                  </li>
                                  <li class='nav-item'>
                                    <a class='nav-link' href='logout.php'>Logout</a>
                                  </li>";
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>

        <!--2nd child-->
        <div class="bg-light">
            <h2 class="text-center p-2">Manage Details</h2>
        </div>
    </header>
    <main>
        <!--3rd child-->
        <div class="bg-light text-center">
        <p>All Needs of farmer under one Roof</p>
        </div>
        <div class="row">
            <div class="col-md-12 p-1 d-flex justify-content-center align-items-center">
                <div class="button text-center">
                    <!-- Corrected the buttons by wrapping the <a> tags around the <button> tags -->
                    <a href="Insert_product.php" class="btn btn-dark my-1 text-light">Insert Products</a>
                    <a href="index.php?view_products" class="btn btn-dark my-1 text-light">View Product</a>
                    <a href="Index.php?Insert_category" class="btn btn-dark my-1 text-light">Insert Categories</a>
                    <a href="Index.php?view_categories" class="btn btn-dark my-1 text-light">View Categories</a>
                    <a href="Index.php?Insert_brands" class="btn btn-dark my-1 text-light">Insert Brands</a>
                    <a href="Index.php?view_brands" class="btn btn-dark my-1 text-light">View Brands</a>
                    <a href="Index.php?all_orders" class="btn btn-dark my-1 text-light">All Orders</a>
                    <a href="Index.php?user_payments" class="btn btn-dark my-1 text-light">All Payments</a>
                    <a href="Index.php?list_users" class="btn btn-dark my-1 text-light">List Users</a>
                </div>
            </div>
        </div>

        <!--4th child-->
        <div class="container my-5">
            <?php
            // Use include_once to avoid including the same file multiple times
            if (isset($_GET['Insert_category'])) {
                include_once('Insert_categories.php');
            }
            if (isset($_GET['Insert_brands'])) {
                include_once('Insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include_once('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include_once('edit_products.php');
            }
            if (isset($_GET['delete_product'])) {
                include_once('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include_once('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include_once('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include_once('edit_category.php');
            }
            if (isset($_GET['edit_brand'])) {
                include_once('edit_brand.php');
            }
            if (isset($_GET['delete_category'])) {
                include_once('delete_category.php');
            }
            if (isset($_GET['delete_brand'])) {
                include_once('delete_brand.php');
            }
            if (isset($_GET['all_orders'])) {
                include_once('list_orders.php');
            }
            if (isset($_GET['delete_order'])) {
                include_once('delete_order.php');
            }
            if (isset($_GET['user_payments'])) {
                include_once('user_payments.php');
            }
            if (isset($_GET['delete_payment'])) {
                include_once('delete_payment.php');
            }
            if (isset($_GET['list_users'])) {
                include_once('list_user.php');
            }
            if (isset($_GET['delete_user'])) {
                include_once('delete_user.php');
            }
            ?>
        </div>
    </main>
    <footer>
        <!-- last child-->
        <!-- include footer-->
        <div class='text-light'id="a">
            <?php
        include(__DIR__ . '/../includes/footer.php');
        ?>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
