<?php
include('../includes/connect.php');

if (isset($_POST['Insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // Select data from the database to check if the brand already exists
    $select_query = "SELECT * FROM brands WHERE brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('This brand is already present in the database');</script>";
    } else {
        // Insert the brand only if it doesn't exist
        $brand_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
        $result = mysqli_query($con, $brand_query);

        if ($result) {
            echo "<script>alert('Brand has been inserted successfully');</script>";
        } else {
            echo "<script>alert('Error inserting brand: " . mysqli_error($con) . "');</script>";
        }
    }
}
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Insert Brands"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="text-light bg-dark p-2 my-3 border-0" name="Insert_brand" value="Insert brand">
    </div>
</form>
