<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="../style.css">
    <style>
    .product_img {
        max-width: 100px;
        height: auto;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <?php
        if(isset($_GET['edit_products'])){
            $edit_id=$_GET['edit_products'];
            $get_data="SELECT * FROM `products` WHERE Product_id=$edit_id";
            $result=mysqli_query($con,$get_data);
            $row=mysqli_fetch_assoc($result);
            $product_title = $row['Product_Title'];
            $product_description = $row['Product_Description'];
            $product_keyword = $row['Product_Keyword'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];            
            $product_image1 = $row['Product_image1'];
            $product_image2 = $row['Product_image2'];
            $product_image3 = $row['Product_image3'];
            $product_price = $row['Product_price'];

            //fetching category name
            $select_category="SELECT * FROM `categories` WHERE category_id=$category_id";
            $result_category=mysqli_query($con,$select_category);
            $row_category=mysqli_fetch_assoc($result_category);
            $category_title=$row_category['category_title'];


            //fetching brand name
            $select_brand="SELECT * FROM `brands` WHERE brand_id=$brand_id";
            $result_brand=mysqli_query($con,$select_brand);
            $row_brand=mysqli_fetch_assoc($result_brand);
            $brand_title=$row_brand['brand_title'];


        }

    ?>
    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_Title" class="form-label">Product Title</label>
                <input type="text" id="Product_Title" value="<?php echo $product_title; ?>" name="Product_Title"
                    class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_description" class="form-label">Product Description</label>
                <input type="text" id="Product_description" value="<?php echo $product_description; ?>"
                    name="Product_description" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_keyword" class="form-label">Product Keywords</label>
                <input type="text" id="Product_keyword" value="<?php echo $product_keyword; ?>" name="Product_keyword"
                    class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_category" class="form-label">Categories</label>
                <select name="Product_category" id="form-select" class="form-select">

                    <option value="<?php echo $category_title; ?>" disabled selected>
                        <b><?php echo $category_title; ?><b></option>
                    <?php
                                //fetching category name
            $select_category_all="SELECT * FROM `categories`";
            $result_category_all=mysqli_query($con,$select_category_all);
            while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                $category_title=$row_category_all['category_title'];
                $category_id=$row_category_all['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
            };

            ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_brands" class="form-label">Brands</label>
                <select name="Product_brands" id="form-select" class="form-select">
                    <option value="<?php echo $brand_title; ?>" disabled selected><b><?php echo $brand_title; ?><b>
                    </option>
                    <?php
                                //fetching brand name
            $select_brand_all="SELECT * FROM `brands`";
            $result_brand_all=mysqli_query($con,$select_brand_all);
            while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                $brand_title=$row_brand_all['brand_title'];
                $brand_id=$row_brand_all['brand_id'];
                echo "<option value='$brand_id'>$brand_title</option>";
            };

            ?>
                </select>
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_image1" class="form-label">Product image1</label>
                <div class="d-flex">
                    <input type="file" id="Product_image1" name="Product_image1" class="form-control"
                        required="required">
                    <?php
    if (!empty($product_image1)) {
        echo '<img src="./product_images/' . $product_image1 . '" alt="" class="product_img">';
    }
    ?>
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_image2" class="form-label">Product image2</label>
                <div class="d-flex">
                    <input type="file" id="Product_image2" value="<?php echo $product_image2; ?>" name="Product_image2"
                        class="form-control" required="required">
                        <?php
    if (!empty($product_image2)) {
        echo '<img src="./product_images/' . $product_image2 . '" alt="" class="product_img">';
    }
    ?>
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_image3" class="form-label">Product image3</label>
                <div class="d-flex">
                    <input type="file" id="Product_image3" value="<?php echo $product_image3; ?>" name="Product_image3"
                        class="form-control" required="required">
                        <?php
    if (!empty($product_image3)) {
        echo '<img src="./product_images/' . $product_image3 . '" alt="" class="product_img">';
    }
    ?>
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="Product_price" class="form-label">Product Price</label>
                <input type="text" id="Product_price" value="<?php echo $product_price; ?>" name="Product_price"
                    class="form-control" required="required">
            </div>
            <div class="text-center">
                <input type="submit" value="Update Product" class="btn btn-dark outline py-2 px-3" name="edit_product">
            </div>
        </form>
    </div>
    <!-- editing product-->
    <?php
        if(isset($_POST['edit_product'])){
            $product_title=$_POST['Product_Title'];
            $product_description = $_POST['Product_description'];
            $product_keyword = $_POST['Product_keyword'];
            $product_category = $_POST['Product_category'];
            $product_brand = $_POST['Product_brands'];            
            $product_price = $_POST['Product_price'];            
            $product_image1 = $_FILES['Product_image1']['name'];
            $product_image2 = $_FILES['Product_image2']['name'];
            $product_image3 = $_FILES['Product_image3']['name'];
            $temp_image1 = $_FILES['Product_image1']['tmp_name'];
            $temp_image2 = $_FILES['Product_image2']['tmp_name'];
            $temp_image3 = $_FILES['Product_image3']['tmp_name'];

            // checking if fields empty or not
            if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_price=='' ){
                echo "<script>alert('Please fill all the fields and continue the process ')</script>";
            }else{
                move_uploaded_file($temp_image1, "./product_images/$product_image1");
                move_uploaded_file($temp_image2, "./product_images/$product_image2");
                move_uploaded_file($temp_image3, "./product_images/$product_image3");
                

                //query to update products
                $update_product="UPDATE `products` SET Product_Title='$product_title', Product_Description='$product_description', Product_Keyword='$product_keyword', category_id='$product_category', brand_id='$product_brand',
                Product_image1='$product_image1', Product_image2='$product_image2', Product_image3='$product_image3', Product_price='$product_price', date=NOW() WHERE Product_id=$edit_id";
                $result_update=mysqli_query($con,$update_product);
                if($result_update){
                    echo "<script>alert('Product updated successfully')</script>";
                    echo "<script>window.open('index.php','_self')</script>"; 
                }
            }
        }
    ?>
</body>


</html>