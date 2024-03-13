<?php
if(isset($_GET['delete_category'])){
    $delete_category = $_GET['delete_category'];

    $delete_query = "DELETE FROM `categories` WHERE category_id = $delete_category";
    $result_category = mysqli_query($con, $delete_query);

    if($result_category){
        echo "<script>alert('category deleted successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>"; 
    } else {
        // Add error handling to see what went wrong
        die('Error: ' . mysqli_error($con));
    }
}
?>
