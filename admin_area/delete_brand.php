<?php
if(isset($_GET['delete_brand'])){
    $delete_brand = $_GET['delete_brand'];

    $delete_query = "DELETE FROM `brands` WHERE brand_id = $delete_brand";
    $result_brand = mysqli_query($con, $delete_query);

    if($result_brand){
        echo "<script>alert('brand deleted successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>"; 
    } else {
        // Add error handling to see what went wrong
        die('Error: ' . mysqli_error($con));
    }
}
?>
