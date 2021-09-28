<?php
include('components/connection.inc.php');

$id = $_GET['id'];
$delete_query = "DELETE FROM `user_list` WHERE `user_id`=$id";
$delete_result = mysqli_query($connection, $delete_query);

header('location:admin.php');