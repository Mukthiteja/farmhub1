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
    <Style>
        body{
            overflow-x:hidden;
        }
    </Style>    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!--user name field-->
                    <div class="form-outline">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your User Name" 
                        autocomplete="off" required="required" name="username">
                    </div>
                    <!--password field-->
                    <div class="form-outline my-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" 
                        autocomplete="off" required="required" name="admin_password">
                        <!--<a href="admin_login.php" class="small fw-bold mt-1 pt-1 text-danger">reset password</a>-->
                    </div>
                    <div class="m-2 pt-1">
                        <input type="submit" value="Login" class="btn btn-dark" name="admin_login">
                    </div>
                    <div class="m-2 pt-1">
                        <b>Don't have a account?<a href="admin_registration.php" class="text-danger">Register</a></b>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php
if(isset($_POST['admin_login'])){
    $admin_name = $_POST['username']; // Fix here
    $admin_password = $_POST['admin_password'];

    // Use prepared statement to avoid SQL injection
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name=?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $admin_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $admin_ip = getIPAddress();

    if($row_count > 0){
        // Verify the password using password_verify
        if(password_verify($admin_password, $row_data['admin_password'])){
            $_SESSION['admin_name'] = $admin_name;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            // Add any additional redirects as needed
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>
