<?php
include('../includes/connect.php');
include('../function/common_function.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];

    $update_orders = "";

    if($payment_mode === 'Cash on Delivery') {
        $update_orders = "UPDATE `user_orders` SET order_status='pending' WHERE order_id=$order_id";
    } else {
        $update_orders = "UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
    }

    $insert_query= "INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_mode) VALUES ($order_id,$invoice_number,$amount,'$payment_mode')";
    
    $result_update_orders = mysqli_query($con, $update_orders);
    $result_insert_payment = mysqli_query($con, $insert_query);

    if($result_insert_payment && $result_update_orders){
        echo "<h3 class='text-center'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    } else {
        echo "<h3 class='text-center'>Failed to complete the payment</h3>";
    }
}
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
</head>

<body>
    <h2 class="text-center">Confirm Payment</h2>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number"
                    value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" id="" class="form-select w-50 m-auto" required="require">
                    <option value="">Select Payment Mode</option>
                    <option value="UPI">UPI</option>
                    <option value="Net Banking">Net Banking</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                </select>

            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="btn btn-dark py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>

        </form>
    </div>

</body>

</html>