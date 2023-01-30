<?php

require "environment.php";

function OpenCon()
{
    $dbhost = $_ENV["DATABASE_HOST"];
    $dbuser = $_ENV["DATABASE_USER"];
    $dbpass = $_ENV["DATABASE_PASSWORD"];
    $db = $_ENV["DATABASE_NAME"];

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

    $sql = "INSERT INTO users(full_name, email, phone) 
            VALUES('$name', '$email', '$phone')";
    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}

function GetAllUsers()
{
    $conn = OpenCon();

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}

function DeleteUserByID($id)
{
    $conn = OpenCon();

    $sql = "DELETE FROM users WHERE users.id = $id";
    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}

function GetUserByID($id)
{
    $conn = OpenCon();

    $sql = "SELECT * FROM users WHERE users.id = $id";
    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}

function UpdateUser($id, $name, $email, $phone)
{

    $conn = OpenCon();

    $sql = "UPDATE users 
            SET 
                full_name = '$name',
                email = '$email', 
                phone = '$phone'
            WHERE id = '$id' ";

    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}
