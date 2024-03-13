<!-- connect file-->
<?php
//session_start();
include('../includes/connect.php');
include('../function/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmHub admin login</title>
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
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
            <div id="google_translate_element"></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!--user name field-->
                    <div class="form-outline">
                        <label for="user_username" class="form-label">User Name</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your User Name" 
                        autocomplete="off" required="required" name="user_username">
                    </div>
                    <!--password field-->
                    <div class="form-outline my-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" 
                        autocomplete="off" required="required" name="user_password">
                        <!--<a href="user_login.php" class="small fw-bold mt-1 pt-1 text-danger">reset password</a>-->
                    </div>
                    <div class="m-2 pt-1">
                        <input type="submit" value="Login" class="btn btn-dark" name="user_login">
                    </div>
                    <div class="m-2 pt-1">
                        <b>Don't have a account?<a href="user_registration.php" class="text-danger">Register</a></b>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>


<?php

if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    // Use prepared statement to avoid SQL injection
    $select_query = "SELECT * FROM `user_table` WHERE username=?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $user_username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // Cart item
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address=?";
    $stmt_cart = mysqli_prepare($con, $select_query_cart);
    mysqli_stmt_bind_param($stmt_cart, "s", $user_ip);
    mysqli_stmt_execute($stmt_cart);
    $select_cart = mysqli_stmt_get_result($stmt_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if($row_count > 0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password, $row_data['user_password'])){
            if ($row_count == 1 && $row_count_cart == 0) {
                echo "<script>alert('Login successful')</script>";
                //echo "<script>alert('enter the otp')</script>";
                //echo "<script>window.open('otp.php','_self')</script>";                
                echo "<script>window.open('../index.php','_self')</script>";
            } else {
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payments.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}



/*//cart item
$select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip' ";
$select_cart = mysqli_query($con, $select_query_cart);

// Check if $select_cart is a valid result before using mysqli_num_rows
if ($select_cart !== false) {
    $row_count_cart = mysqli_num_rows($select_cart);
} else {
    $row_count_cart = 0;
}

if ($row_count > 0) { // This line should be corrected to use $row_count_cart
    $row_data = mysqli_fetch_assoc($result);

    if (password_verify($user_password, $row_data['user_password'])) {
        if ($row_count == 1 && $row_count_cart == 0) {
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
} else {
    echo "<script>alert('Invalid Credentials')</script>";
}*/


?>