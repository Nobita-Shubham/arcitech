<?php
    
include('components/connection.inc.php');
include('components/navbar.inc.php');

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
  </head>
  <body>
      
   <div class="container">
       <table class="table">
           <thead>
               <tr>
                   <th>Serial Number</th>
                   <th>Full Name</th>
                   <th>User Email</th>
                   <th>Date Of Birth</th>
                   <th>Mobile Number</th>
                   <th>Profile Picture</th>
                   <th>Delete User</th>
               </tr>
           </thead>
           <tbody>
               <?php

               $select_query = "SELECT * FROM `user_list`";
               $select_result = mysqli_query($connection, $select_query);
               $i=1;
                while($fetch_data = mysqli_fetch_array($select_result))
               {
                   echo "<tr>
                            <td>$i</td>
                            <td>$fetch_data[user_name]</td>
                            <td>$fetch_data[user_email]</td>
                            <td>$fetch_data[user_date_of_birth]</td>
                            <td>$fetch_data[user_mobile_number]</td>
                            <td><img src ='$fetch_data[user_image]' height = '200' width='180' /></td>
                            <td>
                            <a href='delete.php?id=$fetch_data[user_id]' class='btn btn-success'>delete</a>
                            </td>
                         </tr>";
                         $i++;
                }
               ?>
           </tbody>
       </table>
   </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>