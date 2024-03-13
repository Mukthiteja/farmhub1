<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];

    $get_categories="SELECT * FROM `categories` WHERE category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];

}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];

    $update_query="UPDATE `categories` SET category_title='$cat_title' WHERE category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('category has been updated successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>"; 
    }

}

?>
<div class="container">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" id="category_title" name="category_title"
                class="form-control" required="required">
        </div>
        <div class="text-center">
                <input type="submit" value="Update Product" class="btn btn-dark outline py-2 px-3" name="edit_cat">
            </div>
    </form>
</div>