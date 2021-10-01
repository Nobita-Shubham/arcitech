<?php
    include('components/navbar.inc.php');
    include('components/connection.inc.php');

    if(!$_SESSION['name']){
        header('location:login.php');
    }
    $user_email = $_SESSION['email'];
    $exist_email_query = "SELECT * FROM `user_list` WHERE `user_email`= '$user_email'";
    $exist_email_result = mysqli_query($connection, $exist_email_query);
    // $exist_email_rows = mysqli_num_rows($exist_email_result);
    $email_password = fetch($exist_email_result);
        
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
  </head>
  <body>
    <div class="box">
      <div class="container">
        <center>
        <div>
          <img src="<?php echo $email_password['user_image']; ?>" alt="image.png" height="300" width="250"></img>
        </div>
        <div class="text-center">
          <h1>
            <?php echo $_SESSION['name']; ?>
          </h1>
        </div>
        <div>
          <b>Your Email:</b>
          <?php  echo $_SESSION['email'];?>
        </div>
        <div>
          <b>Date Of Birth:</b>
          <?php  echo $_SESSION['dob'];?>
        </div>
        <div>
          <b>Your Mobile Number:</b>
          <?php  echo $_SESSION['mobile'];?>
        </div>
        <a href="logout.php" class="btn btn-danger">LogOut</a>
        <a href="update.php?id=<?php echo $_SESSION['id']; ?>" class="btn btn-success">Update</a>
        <!-- <?php echo $_SESSION['id']; ?> -->
      </center>
    </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>