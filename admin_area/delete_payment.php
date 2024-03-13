<?php
if (isset($_GET['delete_payment'])) {
    $delete_payment = $_GET['delete_payment'];

    $delete_query = "DELETE FROM `user_payments` WHERE payment_id = $delete_payment";
    $result_payment = mysqli_query($con, $delete_query);

    if ($result_payment) {
        echo "<script>alert('Payment deleted successfully')</script>";
        echo "<script>window.open('index.php?user_payments','_self')</script>";
    } else {
        // Add error handling to see what went wrong
        die('Error: ' . mysqli_error($con));
    }
}
?>
