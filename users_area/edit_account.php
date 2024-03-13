<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="SELECT *FROM `user_table` WHERE username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_temp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp,"./user_images/$user_image");

        //update query
        $update_data="UPDATE `user_table` SET username='$username', user_email='$user_email', user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$update_id";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script>alert('Profile Updated')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .a {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /*.form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }*/

        .file-input-container {
            display: flex;
            align-items: center;
        }

        .form-control-file {
            flex: 1;
        }

        .edit_img {
            width: 100px; /* Adjust the width as needed */
            height: auto;
            object-fit: contain;
            margin-left: 20px; /* Adjust the margin as needed */
        }
    </style>
</head>
<body>
    <h3>Edit Account</h3>
    <form class="a"action="" method="post" enctype="multipart/form-data">
        <div class="outline mb-4">
            <input type="text" class="form-control" value="<?php echo $username ?>" name="user_username" placeholder="Username">
        </div>
        <div class="outline mb-4">
            <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email" placeholder="Email">
        </div>
        <div class="file-input-container mb-4">
            <input type="file" class="form-control-file" name="user_image">
            <img src="user_images/<?php echo $user_image?>" alt="" class="edit_img">
        </div>
        <div class="outline mb-4">
            <input type="text" class="form-control" value="<?php echo $user_address ?>" name="user_address" placeholder="Address">
        </div>
        <div class="outline mb-4">
            <input type="text" class="form-control" value="<?php echo $user_mobile ?>" name="user_mobile" placeholder="Mobile">
        </div>
        <input type="submit" value="Update" class="btn btn-dark outline py-2 px-3" name="user_update">
    </form>
</body>
</html>
