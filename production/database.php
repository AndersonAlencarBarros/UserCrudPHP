<?php

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "appdb";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

function InserNewUser($name, $email, $phone)
{
    $conn = OpenCon();

    $sql = "INSERT INTO users(name, email, phone) 
            VALUES('$name', '$email', '$phone')";

    $result = $conn->query($sql);

    // if ($result) {
    //     echo 'Usuário Inserido com Sucesso.';
    // } else {
    //     echo 'Usuário não cadastrado com sucesso.';
    // }

    CloseCon($conn);
}


function GetAllUsers()
{
    $conn = OpenCon();

    $sql = "SELECT * FROM users";

    $result = $conn->query($sql);

    // if ($result) {
    //     echo $result;
    // } else {
    //     echo 'Não foi possível ler os dados dos usuários.';
    // }

    CloseCon($conn);

    return $result;
}

function DeleteUserByID($id)
{
    $conn = OpenCon();

    $sql = "DELETE FROM users WHERE users.id = $id";

    $result = $conn->query($sql);

    // if ($result) {
    //     echo $result;
    // } else {
    //     echo 'Não foi possível ler os dados dos usuários.';
    // }

    CloseCon($conn);

    return $result;
} 