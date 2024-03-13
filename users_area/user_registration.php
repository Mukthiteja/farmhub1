<!-- connect file-->
<?php
session_start();
include('../includes/connect.php');
include('../function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmHub User Registration</title>
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
    <!-- password strength indicator -->

        #password-strength {
            margin-top: 10px;
        }

        .weak, .instruction {
            color: red;
        }

        .good, .instruction {
            color: orange;
        }

        .strong, .instruction {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        
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
                    <!--email field-->
                    <div class="form-outline my-4">
                        <label for="user_email" class="form-label">User Email</label>
                        <input type="email" id="user_Email" class="form-control" placeholder="Enter your User Email" 
                        autocomplete="off" required="required" name="user_email">
                    </div>
                    <!--image field-->
                    <div class="form-outline my-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control"  required="required" name="user_image">
                    </div>
                    <!--password field-->
                    <div class="form-outline my-4">
                        <label for="user_password" class="form-label">Password (Minimum 8 characters, at least one uppercase, one lowercase, one number)</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" 
                        autocomplete="off" required="required" name="user_password" oninput="checkPasswordStrength()">
                        <div id="password-strength"></div>
                    </div>
                    <!--confirm password field-->
                    <div class="form-outline my-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Reenter your password" 
                        autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <!--Address field-->
                    <div class="form-outline my-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="Text" id="user_address" class="form-control" placeholder="Enter your address" 
                        autocomplete="off" required="required" name="user_address">
                    </div>
                    <!--Contact field-->
                    <div class="form-outline my-4">
                        <label for="user_contact" class="form-label">Contact (Enter a valid mobile number)</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your Mobile Number" 
                        autocomplete="off" required="required" name="user_contact" pattern="[0-9]{10}">
                    </div>
                    <div class="m-4 pt-2">
                        <input type="submit" value="Register" class="btn btn-dark" name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account?<a href="user_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Password strength indicator function
        function checkPasswordStrength() {
            var password = document.getElementById('user_password').value;
            var passwordStrength = document.getElementById('password-strength');

            // Define the regular expressions
            var regex = [
                /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$/, // Very Weak (<= 7 characters, no uppercase, no lowercase, no number)
                /^([a-z]*|[A-Z]*|[0-9]*)$/, // Weak (only one type of characters)
                /^([a-zA-Z]*|[a-z0-9]*|[A-Z0-9]*)$/, // Good (only two types of characters)
                /^([a-zA-Z0-9]*)$/ // Strong (all types of characters)
            ];

            // Password instructions
            var instructions = [
                'Password must be at least 8 characters long.',
                'Password should contain at least one lowercase letter.',
                'Password should contain at least one uppercase letter.',
                'Password should contain at least one number.'
            ];

            // Initialize password strength text
            var strengthText = '';

            // Evaluate password strength
            if (password.length === 0) {
                strengthText = '';
            } else if (regex[0].test(password)) {
                strengthText = '<p class="weak">Very Weak</p>';
            } else if (regex[1].test(password)) {
                strengthText = '<p class="weak">Weak</p>';
            } else if (regex[2].test(password)) {
                strengthText = '<p class="good">Good</p>';
            } else {
                strengthText = '<p class="strong">Strong</p>';
            }

            // Display password strength
            passwordStrength.innerHTML = strengthText;

            // Display password instructions
            var instructionText = '<p class="instruction">Password Instructions:</p>';
            for (var i = 0; i < regex.length; i++) {
                if (!regex[i].test(password)) {
                    instructionText += '<p class="instruction">' + instructions[i] + '</p>';
                }
            }

            // Display instructions
            passwordStrength.innerHTML += instructionText;
        }
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>

<!--php code-->
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();

    // Select query
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username' OR user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('User already exists, please login')</script>"; 
    } else {
        if ($user_password !== $conf_user_password) {
            echo "<script>alert('Passwords do not match')</script>";
        } else {
            // Password strength check
            if (strlen($user_password) < 8) {
                echo "<script>alert('Password must be at least 8 characters long')</script>";
            } else {
                // Insert query
                move_uploaded_file($user_image_tmp, "./user_images/$user_image");
                $hash_password = password_hash($user_password, PASSWORD_ARGON2I);
                $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) 
                VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
                $sql_execute = mysqli_query($con, $insert_query);

                // Selecting cart items
                $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
                $result_cart = mysqli_query($con, $select_cart_items);
                $rows_count_cart = mysqli_num_rows($result_cart);

                if ($rows_count_cart > 0) {
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('You have items in your cart')</script>"; 
                    echo "<script>window.open('checkout.php','_self')</script>"; 
                } else {
                    echo "<script>window.open('../index.php','_self')</script>"; 
                }
            }
        }
    }
}
?>
