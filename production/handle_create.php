<?php
session_start();

require "database.php";

$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = true;
}

if (empty($_POST['email'])) {
    $errors['email'] = 'Preencha um e-mail.';
} else {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "E-mail inválido.";
    }
}

if (empty($_POST['phone'])) {
    $errors['phone'] = true;
}

if (!empty($errors)) {
    $data['errors'] = $errors;

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
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


$_SESSION["data"] = $data;

header("location:index.php");
