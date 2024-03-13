<!-- connect file-->
<?php
include('../includes/connect.php');
include('../function/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username']?></title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- custom css link-->
    <link rel="stylesheet" href="../style.css">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script>
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
    /*remove horizontal scrolling*/ 
    body{
            overflow-x:hidden;
        }
    .profile_img{
    width:90%;
    height: 100%;
    margin:auto;
    display:block;
    border-radius: 10%;
    object-fit:contain;
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
                    <img class="logo p-2" src="../images/logo.png" alt="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item ">
                                <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="../display_all.php">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-light" href="#a">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="../cart.php"><i
                                        class="fas fa-shopping-cart"></i><sup>
                                            <?php cart_item();
                                            ?></sup></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Total Price: <?php total_cart_price();?>/-</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" action="../search_product.php" method="get">
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
            <a class='nav-link' href='users_area/user_login.php'>Welcome guest</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='users_area/user_login.php'>Login</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link text-light' href='users_area/user_registration.php'>Register</a>
          </li>";
} else {
    // User is logged in
    
    echo "<li class='nav-item'>
            <a class='nav-link' href='profile.php'>Hello " . $_SESSION['username'] . "</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='logout.php'>Logout</a>
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
        <div class="row">
            <div class="col-md-2 p-0">
                <ul class="navbar-nav sidenav bg-light text-center">
                    <li class="nav-items">
                        <a href="/" class="nav-link bg-info text-light">
                            <h4>Your Profile</h4>
                        </a>
                    </li>
                    <?php
                        $username=$_SESSION['username'];
                        $user_image="SELECT * FROM `user_table` WHERE username='$username'";
                        $user_image=mysqli_query($con,$user_image);
                        $row_image=mysqli_fetch_array($user_image);
                        $user_image=$row_image['user_image'];
                        echo "<li class='nav-item'>
                                <img src='user_images/$user_image' class='profile_img my-4'>
                                </li>"
                    ?>    

                    <li class="nav-items">
                        <a href="profile.php" class="nav-link">
                            <p>Pending Orders</p>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="profile.php?edit_account" class="nav-link">
                            <p>Edit Account</p>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="profile.php?my_orders" class="nav-link">
                            <p>My Orders</p>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="profile.php?delete_account" class="nav-link text-danger">
                            <p>Delete Account</p>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="logout.php" class="nav-link">
                            <p>logout</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php get_user_order_details(); 
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                ?>
                
            </div>
        </div>

    </main>
    <footer>
        <!-- last child-->
        <!-- include footer-->
        <div id="a">
        <?php
        include("../includes/footer.php")
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