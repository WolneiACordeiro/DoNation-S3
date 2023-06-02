<?php
session_start();
require_once '../models/conexao.php'; // conexão com o banco MongoDB

$email = $_POST["email"]; 
$senha = $_POST["senha"]; 
$nome = $_POST["nome"]; 
$default_avatar = $_POST['avatar'];
$destination = "../views/imgs/avatars/";

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$randstring = generateRandomString();

$new_avatar = trim($randstring .'.jpg');

touch($destination . $new_avatar);  

$register = $colecaoUsuario->countDocuments(['emailUsuario' => $email]);

if ($register === 0) {
    copy($default_avatar, $destination.$new_avatar);

    $document = [
        'emailUsuario' => $email,
        'senhaUsuario' => $senha,
        'nomeUsuario' => $nome,
        'fotoUsuario' => $new_avatar,
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
    session_destroy();
    copy($default_avatar, $destination.$new_avatar);
    header("location:../index.php");
}
?>
