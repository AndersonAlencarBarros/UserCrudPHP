<?php
require "banner_database.php";

// Deleta do banco de dados
$id = $_POST['banner_id'];
DeleteBannerByID($id);

// Deleta o arquivo do diretório
$data = GetBannerByID($id); 
  
$banner = $data->fetch_assoc();         // erro ao buscar o arquivo pelo ID
$banner_name = $banner["banner_name"];

$file = '../img/' . $banner_name;
  
unlink($file);

var_dump($file);
die();

header("location:banner.php"); 