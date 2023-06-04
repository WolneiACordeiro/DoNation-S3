<?php
session_start();
require_once '../models/conexao.php';
require_once '../vendor/autoload.php';

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'SIM') {
    header('Location: ../index.php?login=erro2');
    exit;
} else {
    $id = $_SESSION['id'];
    $objectId = new \MongoDB\BSON\ObjectID($id);
    $registroUsuario = $colecaoUsuario->findOne(['_id' => $objectId]);
    
    $doacaoId = $_POST['idDoacao'];
    $donationId = new \MongoDB\BSON\ObjectID($doacaoId);
    $registroDoacao = $colecaoContribuicao->findOne(['_id' => $donationId]);

    $doadorId = $registroDoacao['idContribuidor'];
    $donatorId = new \MongoDB\BSON\ObjectID($doadorId);
    $registroDoador = $colecaoUsuario->findOne(['_id' => $donatorId]);
}

  $insertOneResult = $colecaoSolicitacao->insertOne([
    'idSolicitante' => $registroUsuario['_id'],
    'idDoador' => $registroDoador['_id'],
    'idDoacao' => $doacaoId,
    'mensagemSolicitacao' => $_POST['resposta-1'],
    'dataHorario' => $_POST['dataHora'],
    'status' => 'pendente'
]);

// Verificar o resultado
if ($insertOneResult->getInsertedCount() > 0) {
    header("location: ../views/pages/donation.php");
} else {
    // Falha na inserção
}
?>

