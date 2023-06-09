<?php
session_start();
require_once '../models/conexao.php';
require_once '../vendor/autoload.php';

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== 'SIM') {
    header('Location: ../../index.php?login=erro2');
    exit;
} else {
    $id = $_SESSION['id'];
    $objectId = new \MongoDB\BSON\ObjectID($id);
    $registroUsuario = $colecaoUsuario->findOne(['_id' => $objectId]);

    $solicitacaoId = $_POST['idSolicitacao'];
    $solId = new \MongoDB\BSON\ObjectID($solicitacaoId);
    $registroSolicitacao = $colecaoSolicitacao->findOne(['_id' => $solId]);

    $doacaoId = $registroSolicitacao['idDoacao'];
    $donationId = new \MongoDB\BSON\ObjectID($doacaoId);
    $registroDoacao = $colecaoContribuicao->findOne(['_id' => $donationId]);

    $doadorId = $registroDoacao['idContribuidor'];
    $donatorId = new \MongoDB\BSON\ObjectID($doadorId);
    $registroDoador = $colecaoUsuario->findOne(['_id' => $donatorId]);

    $solicitadorId = $registroSolicitacao['idSolicitante'];
    $soliId = new \MongoDB\BSON\ObjectID($solicitadorId);
    $registroSolicitador = $colecaoUsuario->findOne(['_id' => $soliId]);

    $checkStatus = $registroSolicitacao['status'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action2'])) {

        $updateResult = $colecaoSolicitacao->updateOne(
            [
                '_id' => $registroSolicitacao['_id'],
                'idSolicitante' => $registroSolicitacao['idSolicitante'],
                'idDoador' => $registroSolicitacao['idDoador'],
                'idDoacao' => $registroSolicitacao['idDoacao']
            ],
            [
                '$set' => [
                    'status' => 'cancelado',
                    'mensagemCancelamento' => $_POST['resposta-2'],
                    'quemCancelou' => $registroUsuario['nomeUsuario']
                ]
            ]
        );
        ?>
            <script>
                location.reload();
            </script>
        <?php
    }

    if (isset($_POST['action1'])) {

        $updateResult = $colecaoSolicitacao->updateOne(
            [
                '_id' => $registroSolicitacao['_id'],
                'idSolicitante' => $registroSolicitacao['idSolicitante'],
                'idDoador' => $registroSolicitacao['idDoador'],
                'idDoacao' => $registroSolicitacao['idDoacao']
            ],
            [
                '$set' => [
                    'status' => 'concluido',
                    'mensagemConclusao' => $_POST['resposta-2'],
                ]
            ]
        );
        ?>
            <script>
                location.reload();
            </script>
        <?php
    }
}

    ?>