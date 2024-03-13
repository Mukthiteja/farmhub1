<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User Payments</title>
    <!-- Add necessary CSS and JavaScript libraries -->
</head>
<body>

    <?php
    $get_payments = "SELECT * FROM `user_payments`";
    $result = mysqli_query($con, $get_payments);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        ?>

        <h3 class="text-center text-success">All User Payments</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Payment ID</th>
                    <th>Order ID</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $number = 1;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $payment_id = $row_data['payment_id'];
                    $order_id = $row_data['order_id'];
                    $invoice_number = $row_data['invoice_number'];
                    $amount = $row_data['amount'];
                    $payment_mode = $row_data['payment_mode'];
                    $date = $row_data['date'];

                    echo "
                    <tr>
                        <td>$number</td>
                        <td>$payment_id</td>
                        <td>$order_id</td>
                        <td>$invoice_number</td>
                        <td>$amount</td>
                        <td>$payment_mode</td>
                        <td>$date</td>
                        <td><a href='#' data-toggle='modal' data-target='#exampleModalPayment$payment_id'><i class='fas fa-trash' style='color: red;'></i></a></td>
                    </tr>";

                    // Modal for each payment
                    echo "<div class='modal fade' id='exampleModalPayment$payment_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                              <div class='modal-body'>
                                <h4>Are you sure you want to delete this payment?</h4>
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                                <a href='index.php?delete_payment=$payment_id' class='btn btn-primary'>Yes</a>
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
        echo "<h2 class='bg-danger text-center mt-5'>No user payments yet</h2>";
    }
    ?>

    <!-- Add any additional HTML or scripts if necessary -->

</body>
</html>
