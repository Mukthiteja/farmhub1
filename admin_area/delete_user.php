<?php
if (isset($_GET['delete_user'])) {
    $delete_user = $_GET['delete_user'];

    $delete_query = "DELETE FROM `user_table` WHERE user_id = $delete_user";
    $result_user = mysqli_query($con, $delete_query);

    if ($result_user) {
        echo "<script>alert('user deleted successfully')</script>";
        echo "<script>window.open('index.php?list_users','_self')</script>";
    } else {
        // Add error handling to see what went wrong
        die('Error: ' . mysqli_error($con));
    }
}
?>
