<?php
if (isset($_GET['edit_brand'])) {
    $edit_brand = $_GET['edit_brand'];

    $get_brands = "SELECT * FROM `brands` WHERE brand_id = $edit_brand";
    $results = mysqli_query($con, $get_brands);
    $row = mysqli_fetch_assoc($results);
    $brand_title = $row['brand_title'];
}

if (isset($_POST['edit_bran'])) {
    $bran_title = $_POST['brand_title'];

    $update_query = "UPDATE `brands` SET brand_title='$bran_title' WHERE brand_id=$edit_brand";
    $result_bran = mysqli_query($con, $update_query);
    if ($result_bran) {
        echo "<script>alert('Brand has been updated successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}
?>

<div class="container">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" id="brand_title" name="brand_title" value="<?php echo $brand_title; ?>"
                class="form-control" required="required">
        </div>
        <div class="text-center">
            <input type="submit" value="Update Brand" class="btn btn-dark outline py-2 px-3" name="edit_bran">
        </div>
    </form>
</div>
