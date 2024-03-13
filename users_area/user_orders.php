<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <?php
    $username=$_SESSION['username'];
    $get_user="SELECT * FROM `user_table` WHERE username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    //echo $user_id;
    
    ?>
    <h3 class="text-succuss">My Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="text-light text-center bg-dark ">
            <tr>
                <th>Sl No</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody >
            <?php
                $get_order_details="SELECT * FROM `user_orders` WHERE user_id='$user_id'";
                $result_orders=mysqli_query($con,$get_order_details);
                $number=1;
                while($row_orders=mysqli_fetch_assoc($result_orders)){
                    $order_id=$row_orders['order_id'];
                    $amount_due=$row_orders['amount_due'];
                    $total_products=$row_orders['total_products'];
                    $invoice_number=$row_orders['invoice_number'];
                    $order_status=$row_orders['order_status'];
                    if($order_status=='pending'){
                        $order_status='Incomplete';
                    }else{
                        $order_status='Complete';
                    }
                    $order_date=$row_orders['order_date'];
                    echo "<tr>
                            <td>$number</td>
                            <td>$amount_due</td>
                            <td>$total_products</td>
                            <td>$invoice_number</td>
                            <td>$order_date</td>
                            <td>$order_status</td>";
                            ?>
                            <?php
                            if($order_status=='Complete'){
                                echo "<td>Paid</td>";
                            }else{
                                echo "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>
                                </tr>";
                            }
                            
                    $number++;

                }
            ?>    

        </tbody>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>