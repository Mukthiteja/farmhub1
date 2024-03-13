<?php
include('../includes/connect.php');

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['product_description'];
    $product_Keywords = $_POST['product_keyword'];
    $product_category = $_POST['product_categories'];
    $product_brands = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing images using $_FILES
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if ($product_title == '' && $description == '' && $product_Keywords == '' && $product_category == '' && $product_brands == '' && $product_price == '' &&
        $product_image1 == '' && $product_image2 == '' && $product_image3 == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // Use prepared statements to avoid SQL injection
        $insert_products = "INSERT INTO products (Product_Title, Product_Description, Product_Keyword, category_id, brand_id, Product_image1, Product_image2, Product_image3, Product_price,date,status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

        $stmt = mysqli_prepare($con, $insert_products);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssiisssis", $product_title, $description, $product_Keywords, $product_category, $product_brands, $product_image1, $product_image2, $product_image3, $product_price, $product_status);

        // Execute the statement
        $result_query = mysqli_stmt_execute($stmt);

        if ($result_query) {
            echo "<script>alert('Successfully inserted the Product')</script>";
        } else {
            echo "<script>alert('Error inserting the Product')</script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="../style.css">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h2 class="text-center">Insert Products</h2>

        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data" class="w-50 m-auto">
            <!-- Product title -->
            <div class="mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- Product description -->
            <div class="mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                    placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- Product keyword -->
            <div class="mb-4">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control"
                    placeholder="Enter product keyword" autocomplete="off" required="required">
            </div>

            <!-- Product category -->
            <div class="mb-4">
                <label for="product_categories" class="form-label">Product Category</label>
                <select name="product_categories" id="product_categories" class="form-select">
                    <option value="">Select a product category</option>
                    <!-- dynamic category-->
                    <?php
                        $select_query = "SELECT * FROM categories";
                        $result_query = mysqli_query($con, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Product brand -->
            <div class="mb-4">
                <label for="product_brand" class="form-label">Product Brand</label>
                <select name="product_brand" id="product_brand" class="form-select">
                    <option value="">Select a product brand</option>
                    <!-- dynamic Brand-->
                    <?php
                        $select_query = "SELECT * FROM brands";
                        $result_query = mysqli_query($con, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id= $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="mb-4">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- Image 2 -->
            <div class="mb-4">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <!-- Image 3 -->
            <div class="mb-4">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- Product Price -->
            <div class="mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- Submit button -->
            <div class="mb-4">
                <input type="submit" name="insert_product" class="btn btn-dark mb-3 px-3" value="Insert Product">
            </div>
        </form>

    </div>

    <!-- Bootstrap JS and Popper.js scripts (required for Bootstrap components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-dZl8T8S2np6gQ8r+ea0zmN5ygssCBvKG9x6A/PeaDtkVb2TgmoAq4E1eDUC9vGL" crossorigin="anonymous">
    </script>
</body>

</html>