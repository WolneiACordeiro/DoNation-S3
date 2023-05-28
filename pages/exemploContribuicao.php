<?php
session_start();
require_once '../conexao.php';
require_once '../vendor/autoload.php';

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'SIM') {
    header('Location: ../index.php?login=erro2');
    exit;
} else {
    $id = $_SESSION['id'];
    $objectId = new \MongoDB\BSON\ObjectID($id);
    $registroUsuario = $colecaoUsuario->findOne(['_id' => $objectId]);
    $registroContribuicao = $colecaoContribuicao->findOne(['idContribuidor' => $id]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo</title>
</head>

<body>
    <a href="solicitar.php?idDoacao=6472bd62ce4c0000a8003684">Solicitar</a>

    <a href="checarSolicitacao.php?idSolicitacao=6472cf60ce4c0000a800368d">Checar</a>
</body>

</html>