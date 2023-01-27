<?php
session_start();
  
// Verifica os erros no upload do arquivo.
switch ($_FILES['banner']['error']) {
    case UPLOAD_ERR_OK:
        break;
    case UPLOAD_ERR_NO_FILE:
        $message = 'Nenhum arquivo selecionado.';
        break;
        // throw new RuntimeException($message); 
    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
        $message = 'Tamanho do arquivo excedido.';
        break;
        // default:
        //     $message = 'Ops...Algum problema ocorreu..';
}

// Verifica a extenção do arquivo.
if (!empty($_FILES['banner']['tmp_name'])) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['banner']['tmp_name']),
        array( 
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ),
        true
    )) {
        $message = 'Formato do arquivo inválido.';
    }
} 

// Renomeia o arquivo
$date = date("d-m-Y");
$time = date("h-i-s");

// banner_ + _data + _hora   
$banner_name = "banner__" . $date . "__" . $time;

// Diretório do arquivo 
$target_dir = '../img/';
$file = $target_dir . $banner_name . '.' . $ext;

// Realiza o upload 
if (empty($message)) {
    if (move_uploaded_file($_FILES['banner']['tmp_name'], $file)) {
        $success = "Upload do arquivo bem sucedido.";
    } else {
        $message = "Ops...Algum problema aconteceu\n";;
    }
}

$_SESSION['message'] = $message;
$_SESSION['success'] = $success;

header("location:banner.php"); 