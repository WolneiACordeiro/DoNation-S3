<?php
session_start();
require_once '../models/conexao.php'; // conexão com o banco MongoDB

$email = $_POST["email"]; 
$senha = $_POST["senha"]; 
$nome = $_POST["nome"]; 

$target_dir = "../views/imgs/avatars/";
$target_type = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_type,PATHINFO_EXTENSION));
$novonome = md5(mt_rand(1,10000).basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir.$novonome . "." . $imageFileType;
$caminho = $novonome . "." . $imageFileType;

$register = $colecaoUsuario->countDocuments(['emailUsuario' => $email]);

if ($register === 0) {
    
    //INICIO DO UPLOAD DA IMAGEM

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 9999999999) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

    $document = [
        'emailUsuario' => $email,
        'senhaUsuario' => $senha,
        'nomeUsuario' => $nome,
        'fotoUsuario' => $caminho
    ];

    $resultado = $colecaoUsuario->insertOne($document);

    if ($resultado->getInsertedCount() > 0) {
        session_destroy();
        header("location: ../views/pages/donation.php");
    } else {
        session_destroy();
        echo "error";
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//FIM DO UPLOAD DA IMAGEM

} else {
    session_destroy();
    header("location:../views/index.php");
}
?>
