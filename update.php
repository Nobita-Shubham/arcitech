<?php

    include('components/connection.inc.php');
    include('components/navbar.inc.php');

    $id = $_GET['id'];
    $exist_id_query = "SELECT * FROM `user_list` WHERE `user_id` = $id";
    $exist_id_result = mysqli_query($connection, $exist_id_query);
    $id_data = fetch($exist_id_result);

    if(isset($_POST['update'])){
        $user_name = get($connection, $_POST['user_name']);
        $_SESSION['name'] = $user_name;
        $user_email = get($connection, $_POST['user_email']);
        $_SESSION['email'] = $user_email;
        $user_date_of_birth = get($connection, $_POST['user_date_of_birth']);
        $_SESSION['dob'] = $user_date_of_birth;
        $user_mobile_number = get($connection, $_POST['user_mobile_number']);
        $_SESSION['mobile'] = $user_mobile_number;
        $user_image = $_FILES['user_image'];
        $_SESSION['image'] = $user_image;
        
        
        $file_name = $user_image['name'];
        $file_path = $user_image['tmp_name'];
        $file_error = $user_image['error'];

        $file_destination = 'upload_img/'.$file_name;
        move_uploaded_file($file_path, $file_destination);

        $update_query = "UPDATE `user_list` SET `user_name`='$user_name',`user_email`='$user_email',`user_date_of_birth`='$user_date_of_birth',`user_mobile_number`='$user_mobile_number',`user_image`='$file_destination' WHERE `user_id`= $id";
        $update_result = mysqli_query($connection, $update_query);
        header('location:index.php');
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="box">
            <form class="form-1" method="post" enctype="multipart/form-data">
                <h1>Update Your Data</h1>
                <label for="username">Full Name</label>
                    <input type="text" name="user_name" required="" value="<?php echo $id_data['user_name']; ?>"/>

                <label for="email">Email</label>
                    <input type="email" name="user_email" required="" value="<?php echo $id_data['user_email']; ?>"/>

                <label for="date">Date Of Birth</label>
                    <input type="date" name="user_date_of_birth" required="" value="<?php echo $id_data['user_date_of_birth']; ?>"/>

                <label for="mobilenumber">Mobile Number</label>
                    <input type="number" name="user_mobile_number" required="" value="<?php echo $id_data['user_mobile_number']; ?>"/>

                <label for="userimage">Enter Your Profile Picture</label>
                    <input type="file" name="user_image" />

                <button name="update">Update</button>
            </form>
            </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>