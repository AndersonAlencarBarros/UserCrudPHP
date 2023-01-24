<?php

require "database.php";

$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Preencha seu nome.';
}

if (empty($_POST['email'])) {
    $errors['email'] = 'Preencha seu e-mail';
}

if (empty($_POST['phone'])) {
    $errors['phone'] = 'Preencha seu telefone';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    InserNewUser($name, $email, $phone);
}

session_start();
$_SESSION["data"] = $data;
header("location:index.php"); 