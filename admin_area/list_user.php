<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <!-- Add necessary CSS and JavaScript libraries -->
</head>
<body>

    <?php
    $get_users = "SELECT * FROM `user_table`";
    $result = mysqli_query($con, $get_users);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        ?>

        <h3 class="text-center text-success">All Users</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>User Image</th>
                    <th>IP</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $number = 1;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $user_id = $row_data['user_id'];
                    $username = $row_data['username'];
                    $user_email = $row_data['user_email'];
                    $user_image = $row_data['user_image'];
                    $user_ip = $row_data['user_ip'];
                    $user_address = $row_data['user_address'];
                    $user_mobile = $row_data['user_mobile'];

                    echo "
                    <tr>
                        <td>$number</td>
                        <td>$user_id</td>
                        <td>$username</td>
                        <td>$user_email</td>
                        <td>$user_image</td>
                        <td>$user_ip</td>
                        <td>$user_address</td>
                        <td>$user_mobile</td>
                        <td><a href='#' data-toggle='modal' data-target='#exampleModalUser$user_id'><i class='fas fa-trash' style='color: red;'></i></a></td>
                    </tr>";

                    // Modal for each user
                    echo "<div class='modal fade' id='exampleModalUser$user_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                              <div class='modal-body'>
                                <h4>Are you sure you want to delete this user?</h4>
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                                <a href='index.php?delete_user=$user_id' class='btn btn-primary'>Yes</a>
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
        echo "<h2 class='bg-danger text-center mt-5'>No users yet</h2>";
    }
    ?>

    <!-- Add any additional HTML or scripts if necessary -->

</body>
</html>
