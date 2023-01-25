<?php
require "database.php";

session_start(); 
$id = $_SESSION["id"]; 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

UpdateUser($id, $name, $phone, $email);
 
session_destroy();

header("location:list_users.php");
