<?php

require "database.php";

$users = GetAllUsers();
 
$usersArray = array();
while ($row = $users->fetch_assoc()) {

    $usersArray[] = array(
        'Nome Completo' => $row["full_name"],
        'Telefone' => $row["phone"],
        'Email' => $row["email"],
    ); 
}   

echo json_encode($usersArray);