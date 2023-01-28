<?php
require "banner_database.php";

$id = $_POST['banner_id'];
DeleteBannerByID($id);
  
header("location:banner.php"); 