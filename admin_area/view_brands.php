<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_brand = "SELECT * FROM  `brands`";
        $result = mysqli_query($con, $select_brand);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            echo "<tr>
            <td>$brand_id</td>
            <td>$brand_title</td>
            <td><a href='index.php?edit_brand=$brand_id'><i class='fas fa-edit'></i></a></td>
            <td><a href='#' data-toggle='modal' data-target='#exampleModal$brand_id'><i class='fas fa-trash' style='color: red;'></i></a></td>
            </tr>";

            // Modal for each brand
            echo "<div class='modal fade' id='exampleModal$brand_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-body'>
                        <h4>Are you sure want to delete this?</h4>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                        <a href='index.php?delete_brand=$brand_id' class='btn btn-primary'>Yes</a>
                      </div>
                    </div>
                  </div>
                </div>";

            $number++;
        }
        ?>
    </tbody>
</table>
