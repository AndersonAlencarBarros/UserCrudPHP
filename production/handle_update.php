<?php
require "database.php";

session_start(); 
$id = $_SESSION["id"]; 

$name = $_POST['full_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
   
UpdateUser($id, $name, $email, $phone);
 
session_destroy();

header("location:list_page.php");
