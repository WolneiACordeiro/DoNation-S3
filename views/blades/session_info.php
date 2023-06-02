<?php
require_once 'conexao_blades.php';

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'SIM') {
    header('Location: ../index.php?login=erro2');
    exit;
} else {
    $id = $_SESSION['id'];
    $objectId = new \MongoDB\BSON\ObjectID($id);
    $registroUsuario = $colecaoUsuario->findOne(['_id' => $objectId]);
    $contribuicao = $colecaoContribuicao->find();
}
?>
