<?php

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    // $dbpass = "";               // WAMP
    $dbpass = "12345";       // Linux
    $db = "appdb";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

function InserNewBanner($name)
{
    $conn = OpenCon();

    $sql = "INSERT INTO banner(name) 
            VALUES('$name')";
    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}

function GetAllBanners()
{
    $conn = OpenCon();

    $sql = "SELECT * FROM banner";
    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}

function DeleteBannerByID($id)
{
    $conn = OpenCon();

    $sql = "DELETE FROM banner WHERE banner.id = $id";
    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}

function GetBannerByID($id)
{
    $conn = OpenCon();

    $sql = "SELECT * FROM banner WHERE banner.id = $id";
    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}
 
