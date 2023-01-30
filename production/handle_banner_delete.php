<?php
require "banner_database.php";


$id = $_POST['banner_id'];

// Deleta o arquivo do diretório
$data = GetBannerByID($id); 
$banner = $data->fetch_assoc();         
$banner_name = $banner["banner_name"];
$file = '../img/' . $banner_name;
unlink($file); 


// Deleta do banco de dados
DeleteBannerByID($id);

header("location:banner.php"); 