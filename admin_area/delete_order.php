<?php
if (isset($_GET['delete_payment'])) {
    $delete_payment = $_GET['delete_payment'];

    // Delete from user_payments table
    $delete_payment_query = "DELETE FROM `user_payments` WHERE payment_id = $delete_payment";
    $result_payment = mysqli_query($con, $delete_payment_query);
    
    // Delete from user_orders table
    $delete_order_query = "DELETE FROM `user_orders` WHERE order_id = $delete_payment";
    $result_order = mysqli_query($con, $delete_order_query);
    
    // Delete from orders_pending table
    $delete_order_pending_query = "DELETE FROM `orders_pending` WHERE order_id = $delete_payment";
    $result_order_pending = mysqli_query($con, $delete_order_pending_query);    

    // Check if deletion from user_payments, user_orders, and orders_pending was successful
    if ($result_payment && $result_order && $result_order_pending) {
        echo "<script>alert('Payment and related records deleted successfully')</script>";
    } else {
        // Add error handling to see what went wrong
        die('Error: ' . mysqli_error($con));
    }

    // Redirect to the appropriate page
    echo "<script>window.open('index.php?user_payments','_self')</script>";
}
?>
