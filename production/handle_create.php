<?php

require "database.php";

$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = true;
}

if (empty($_POST['email'])) {
    $errors['email'] = true;
}

if (empty($_POST['phone'])) {
    $errors['phone'] = true;
}

if (!empty($errors)) {
    $data['errors'] = $errors;
} else {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sucess = InserNewUser($name, $email, $phone);
    $data['sucess'] = $sucess;

    if ($sucess)
        $data['message'] = 'Usuário Cadastrado com Sucesso!';
    else 
        $data['message'] = 'Ops...Algo de errado aconteceu...';
}

session_start();
$_SESSION["data"] = $data;

header("location:index.php"); 