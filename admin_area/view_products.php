<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="../style.css">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .product_img {
            max-width: 100px;
            height: auto;
            object-fit: cover;
        }

        table {
            margin: 20px auto;
            width: 90%;
        }

        th, td {
            text-align: center;
            vertical-align: middle !important;
        }

        th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center my-4">All Products</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Total Sold</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
    <?php 
        $get_products = "SELECT * FROM `products`";
        $result = mysqli_query($con, $get_products);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['Product_id'];
            $product_title = $row['Product_Title'];
            $product_image1 = $row['Product_image1'];
            $product_price = $row['Product_price'];
            $status = $row['status'];
            $number++;

            // Count the number of orders for the current product
            $get_count = "SELECT * FROM `orders_pending` WHERE Product_id=$product_id";
            $result_count = mysqli_query($con, $get_count);
            $row_count = mysqli_num_rows($result_count);

            echo "<tr>
                <td>$number</td>
                <td>$product_title</td>
                <td><img src='./product_images/$product_image1' class='product_img' alt=''></td>
                <td>$product_price</td>
                <td>$row_count</td>
                <td>$status</td>
                <td><a href='index.php?edit_products=$product_id'><i class='fas fa-edit'></i></a></td>
                <td><a href='index.php?delete_product=$product_id'><i class='fas fa-trash' style='color: red;'></i></a></td>
                </tr>";                
        }
    ?>    
</tbody>

        </table>
    </div>
</body>
</html>
