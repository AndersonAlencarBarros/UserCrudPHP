<?php
require "database.php";

$id = $_POST['user_id'];
DeleteUserByID($id);
  
header("location:list_users.php"); 