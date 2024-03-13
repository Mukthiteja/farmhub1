<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <!-- Add necessary CSS and JavaScript libraries -->
</head>
<body>

    <?php
    $get_orders = "SELECT * FROM `user_orders`";
    $result = mysqli_query($con, $get_orders);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        ?>

        <h3 class="text-center text-success">All Orders</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>User ID</th>
                    <th>Amount Due</th>
                    <th>Invoice Number</th>
                    <th>Total Products</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $number = 1;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $order_id = $row_data['order_id'];
                    $user_id = $row_data['user_id'];
                    $amount_due = $row_data['amount_due'];
                    $invoice_number = $row_data['invoice_number'];
                    $total_products = $row_data['total_products'];
                    $order_date = $row_data['order_date'];
                    $order_status = $row_data['order_status'];

                    echo "
                    <tr>
                        <td>$number</td>
                        <td>$user_id</td>
                        <td>$amount_due</td>
                        <td>$invoice_number</td>
                        <td>$total_products</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                        <td><a href='#' data-toggle='modal' data-target='#exampleModalCategory$order_id'><i class='fas fa-trash' style='color: red;'></i></a></td>
                    </tr>";

                    // Modal for each order
                    echo "<div class='modal fade' id='exampleModalCategory$order_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                              <div class='modal-body'>
                                <h4>Are you sure you want to delete this order?</h4>
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                                <a href='index.php?delete_order=$order_id' class='btn btn-primary'>Yes</a>
                              </div>
                            </div>
                          </div>
                        </div>";

                    $number++;
                }
                ?>

            </tbody>
        </table>

        <?php
    } else {
        echo "<h2 class='bg-danger text-center mt-5'>No orders yet</h2>";
    }
    ?>

    <!-- Add any additional HTML or scripts if necessary -->

</body>
</html>
