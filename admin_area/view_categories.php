<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_cat = "SELECT * FROM `categories`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            echo "<tr>
            <td>$category_id</td>
            <td>$category_title</td>
            <td><a href='index.php?edit_category=$category_id'><i class='fas fa-edit'></i></a></td>
            <td><a href='#' data-toggle='modal' data-target='#exampleModalCategory$category_id'><i class='fas fa-trash' style='color: red;'></i></a></td>
            </tr>";

            // Modal for each category
            echo "<div class='modal fade' id='exampleModalCategory$category_id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-body'>
                        <h4>Are you sure you want to delete this category?</h4>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button>
                        <a href='index.php?delete_category=$category_id' class='btn btn-primary'>Yes</a>
                      </div>
                    </div>
                  </div>
                </div>";

            $number++;
        }
        ?>
    </tbody>
</table>
