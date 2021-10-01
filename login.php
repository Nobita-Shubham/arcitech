<?php
    include('components/navbar.inc.php');
    include('components/connection.inc.php');

    if(isset($_POST['login']))
    {
        $user_email = get($connection, $_POST['user_email']);
        $user_password = get($connection, $_POST['user_password']);

        $exist_email_query = "SELECT * FROM `user_list` WHERE `user_email`= '$user_email'";
        $exist_email_result = mysqli_query($connection, $exist_email_query);
        $exist_email_rows = mysqli_num_rows($exist_email_result);

        if($exist_email_rows)
        {
            $email_password = fetch($exist_email_result);
            $database_password = $email_password['user_password'];
            $_SESSION['name'] = $email_password['user_name'];
            $_SESSION['image'] = $email_password['user_image'];
            $_SESSION['email'] = $email_password['user_email'];
            $_SESSION['dob'] = $email_password['user_date_of_birth'];
            $_SESSION['mobile'] = $email_password['user_mobile_number'];
            $_SESSION['id'] = $email_password['user_id'];
            // echo $database_password;
            $decode_database_password = password_verify($user_password, $database_password);

            if($decode_database_password)
            {
                echo "<script>
                    alert('Login Successfully!!');
                    window.location.href = 'index.php';
                </script>";
            }
            else
            {
                echo "<script>
                    alert('please check Entered password!!');
                    window.location.href = 'login.php';
                </script>";
            }
        }
        else
        {
            echo "<script>
                    alert('please check Entered email address!!');
                    window.location.href = 'login.php';
                </script>";
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
            <form class="form-1" method="post">
                <h1>Login</h1>
                <label for="email">Email</label>
                <input type="email" name="user_email" id="email" required="" />
                <label for="password">Password</label>
                <input type="password" name="user_password" id="password" required="" />
                <span>Forgot Password</span>
                <button name="login">Login</button>
                <p>Or SignUp Using</p>
                <div class="icons">
                <a href="https://www.facebook.com/" target="blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/" target="blank"><i class="fab fa-twitter"></i></a>
                <a href="https://mail.google.com/" target="blank"><i class="fab fa-google"></i></a>
                </div>
            </form>
            </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>