<!-- connect file-->
<?php
//session_start();
include('../includes/connect.php');
include('../function/common_function.php');
//@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
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
        img{
        width:100%;
        height:100%;
        }
    </style>    
</head>
<body>
    <!-- PHP code to access user id -->
    <?php
    $user_ip = getIPAddress(); // Assuming getIPAddress() is defined elsewhere
    $get_user = "SELECT * FROM user_table WHERE user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id']; // Fixed variable name here
    ?>

    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="payment-option">
                    <a href="https://www.paypal.com" target="_blank">
                        <h2 class="text-center">Pay Now</h2>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="payment-option">
                    <a href="order.php?user_id=<?php echo $user_id; ?>">
                        <h2 class="text-center">Pay later</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
