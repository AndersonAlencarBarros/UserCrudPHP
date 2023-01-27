<?php
 
$uploaddir = '/'; 
$uploadfile = $uploaddir . basename($_FILES['banner']['name']);
  
var_dump($_FILES['banner']['tmp_name']);

var_dump($uploadfile);

if( chmod($uploadfile, 0755) ) {
    echo "Sem permissão.";
    if (move_uploaded_file($_FILES['banner']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }
}

echo $_FILES['banner']['error'];
   
// print_r($_FILES);
