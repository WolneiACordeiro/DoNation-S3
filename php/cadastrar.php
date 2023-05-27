<?php
session_start();
require_once '../conexao.php'; // conexão com o banco MongoDB
require_once '../vendor/autoload.php';

$email = $_SESSION["email"]; 
$senha = $_SESSION["senha"]; 
$nome = $_SESSION["nome"]; 
$whatsapp = $_SESSION["whatsapp"]; 
$biografia = $_SESSION["biografia"]; 
$profissao =  $_SESSION["profissao"];
$rg = $_POST["rg"]; 
$cpf = $_POST["cpf"]; 
$data = $_POST["data"]; 
$cidade = $_POST["cidade"]; 
$uf = $_POST["uf"]; 
$endereco = $_POST["endereco"]; 
$numero = $_POST["numero"]; 
$complemento = $_POST["complemento"];

$default_avatar = '../img/avatars/user_default.jpg';
$destination = "../img/avatars/";

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
        'profissaoUsuario' => $profissao,
        'wppUsuario' => $whatsapp,
        'biografiaUsuario' => $biografia,
        'rgUsuario' => $rg,
        'cpfUsuario' => $cpf,
        'dtNascimentoUsuario' => $data,
        'cidadeUsuario' => $cidade,
        'ufUsuario' => $uf,
        'enderecoUsuario' => $endereco,
        'numeroEnderecoUsuario' => $numero,
        'complementoUsuario' => $complemento,
        'fotoUsuario' => $new_avatar,
    ];

    $resultado = $colecaoUsuario->insertOne($document);

    if ($resultado->getInsertedCount() > 0) {
        session_destroy();
        header("location: ../pages/criarconta.php");
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
