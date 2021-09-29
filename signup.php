<?php
    include('components/navbar.inc.php');
    include('components/connection.inc.php');

    if(isset($_POST['signup']))
    {
        $user_name = get($connection, $_POST['user_name']);
        $user_email = get($connection, $_POST['user_email']);
        $user_date_of_birth = get($connection, $_POST['user_date_of_birth']);
        $user_mobile_number = get($connection, $_POST['user_mobile_number']);
        $user_name = get($connection, $_POST['user_name']);
        $user_password = get($connection, $_POST['password']);
        $hash_user_password =password_hash($user_password, PASSWORD_BCRYPT);
        $user_confirm_password = get($connection, $_POST['confirm_password']);
        $hash_user_confirm_password = password_hash($user_confirm_password, PASSWORD_BCRYPT);

        $user_image = $_FILES['user_image'];
        $file_name = $user_image['name'];
        $file_path = $user_image['tmp_name'];
        $file_error = $user_image['error'];

        $exist_email_query = "SELECT * FROM `user_list` WHERE `user_email`= '$user_email'";
        $exist_email_result = mysqli_query($connection, $exist_email_query);
        $exist_email_rows = mysqli_num_rows($exist_email_result);

        // echo $exist_email_rows;
        if($exist_email_rows > 0)
        {
            echo "<script>
                alert('Email Already Exist!! Try With Another Email Address');
                window.location.href = 'signup.php';
            </script>";
        }
        else
        {
            if($user_password === $user_confirm_password && $file_error == 0)
            {
                $file_destination = 'upload_img/'.$file_name;
                // echo $file_destination;
                move_uploaded_file($file_path, $file_destination);

                $user_insert_query = "INSERT INTO `user_list`(`user_name`, `user_email`, `user_date_of_birth`, `user_mobile_number`, `user_password`, `user_confirm_password`, `user_image`) VALUES ('$user_name','$user_email','$user_date_of_birth','$user_mobile_number','$hash_user_password','$hash_user_confirm_password','$file_destination')";
                $insert_query_result = mysqli_query($connection, $user_insert_query);
                echo "<script>
                    alert('Signup Succesfully!! Now You Can LogIn');
                    window.location.href = 'login.php';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('please check Entered password!!');
                    window.location.href = 'signup.php';
                </script>";
            }
        }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <div class="box">
            <form class="form-1" method="post" enctype="multipart/form-data">
                <h1>SignUp</h1>
                <label for="username">Full Name</label>
                    <input type="text" name="user_name" required="" />

                <label for="email">Email</label>
                    <input type="email" name="user_email" required="" />

                <label for="date">Date Of Birth</label>
                    <input type="date" name="user_date_of_birth" required="" />

                <label for="mobilenumber">Mobile Number</label>
                    <input type="number" name="user_mobile_number" required="" />

                <label for="password">Password</label>
                    <input type="password" name="password" required="" />

                <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" required="" />

                <label for="userimage">Enter Your Profile Picture</label>
                    <input type="file" name="user_image"/>

                <button name="signup">SignUp</button>
                <p>Or Already Having Account <a href="login.php">Click Here</></p>
            </form>
            </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>