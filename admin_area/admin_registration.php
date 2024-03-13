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
    <title>FarmHub admin Registration</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- custom css link-->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- password strength indicator -->
    <style>
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
        <h2 class="text-center">Admin Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!--user name field-->
                    <div class="form-outline">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your User Name" 
                        autocomplete="off" required="required" name="username">
                    </div>
                    <!--email field-->
                    <div class="form-outline my-4">
                        <label for="email" class="form-label">User Email</label>
                        <input type="email" id="Email" class="form-control" placeholder="Enter your User Email" 
                        autocomplete="off" required="required" name="email">
                    </div>
                    <!--password field-->
                    <div class="form-outline my-4">
                        <label for="password" class="form-label">Password (Minimum 8 characters, at least one uppercase, one lowercase, one number)</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" 
                        autocomplete="off" required="required" name="password" oninput="checkPasswordStrength()">
                        <div id="password-strength"></div>
                    </div>
                    <!--confirm password field-->
                    <div class="form-outline my-4">
                        <label for="conf_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_password" class="form-control" placeholder="Reenter your password" 
                        autocomplete="off" required="required" name="conf_password">
                    </div>
                    <div class="m-4 pt-2">
                        <input type="submit" value="Register" class="btn btn-dark" name="admin_register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account?<a href="admin_login.php">Login</a></p>
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

</body>
</html>

<!--php code-->
<?php
if(isset($_POST['admin_register'])){
    $admin_name = $_POST['username']; // Fix: Change 'admin_name' to 'username'
    $admin_email = $_POST['email'];   // Fix: Change 'admin_email' to 'email'
    $admin_password = $_POST['password']; // Fix: Change 'admin_password' to 'password'
    $conf_password = $_POST['conf_password'];

    $ip = getIPAddress();

    // Select query
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('User already exists, please login')</script>"; 
    } else {
        if ($admin_password !== $conf_password) {
            echo "<script>alert('Passwords do not match')</script>";
        } else {
            // Password strength check
            if (strlen($admin_password) < 8) { // Fix: Change '$password' to '$admin_password'
                echo "<script>alert('Password must be at least 8 characters long')</script>";
            } else {
                // Insert query
                $hash_password = password_hash($admin_password, PASSWORD_ARGON2I);
                // Fix: Change '$password' to '$admin_password'
                $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password, ip) 
                VALUES ('$admin_name','$admin_email','$hash_password','$ip')";
                $sql_execute = mysqli_query($con, $insert_query);

                if ($sql_execute) {
                    echo "<script>alert('Registration successful')</script>";
                } else {
                    echo "<script>alert('Registration failed')</script>";
                }
            }
        }
    }
}
?>
