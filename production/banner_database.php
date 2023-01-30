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

function InserNewBanner($name)
{
    $conn = OpenCon();

    $sql = "INSERT INTO banner(banner_name) 
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

    $sql = " DELETE FROM banner WHERE banner.id = '$id' ";
    $result = $conn->query($sql);

    CloseCon($conn);

    return $result;
}

function GetBannerByID($id)
{
    $conn = OpenCon();

    $sql = "SELECT * FROM banner WHERE id = {$id}";
 
    $result = $conn->query($sql);
      
    CloseCon($conn);

    return $result;
}