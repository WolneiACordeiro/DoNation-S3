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

    $solicitacaoId = $_GET['idSolicitacao'];
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitacao</title>
</head>

<body>

    <?php

    if ($checkStatus === 'pendente' && $registroSolicitacao['idSolicitante'] == $id) { ?>

        <h2>
            <?php echo $registroUsuario['nomeUsuario']; ?> está solicitando
            <?php echo $registroDoacao['atividadeContribuicao']; ?>
        </h2>
        <h1>Status:
            <?php echo $registroSolicitacao['status']; ?>
        </h1>

        <?php

    } else if ($checkStatus === 'pendente' && $registroSolicitacao['idDoador'] == $id) { ?>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['action1'])) {

                    $resposta2 = $_POST['resposta-2'];

                    $updateResult = $colecaoSolicitacao->updateOne(
                        [
                            'idSolicitante' => $registroSolicitacao['idSolicitante'],
                            'idDoador' => $registroSolicitacao['idDoador'],
                            'idDoacao' => $registroSolicitacao['idDoacao']
                        ],
                        [
                            '$set' => [
                                'status' => 'aprovado',
                                'mensagemRetorno' => $_POST['resposta-2']
                            ]
                        ]
                    );

                }

                if (isset($_POST['action2'])) {

                    $resposta2 = $_POST['resposta-2'];

                    $updateResult = $colecaoSolicitacao->updateOne(
                        [
                            'idSolicitante' => $registroSolicitacao['idSolicitante'],
                            'idDoador' => $registroSolicitacao['idDoador'],
                            'idDoacao' => $registroSolicitacao['idDoacao'],
                        ],
                        [
                            '$set' => [
                                'status' => 'recusado',
                                'mensagemRetorno' => $_POST['resposta-2']
                            ]
                        ]
                    );

                }
            }
            ?>

            <form method="POST" action="">

                <h2>
                <?php echo $registroSolicitador['nomeUsuario']; ?> está solicitando
                <?php echo $registroDoacao['atividadeContribuicao']; ?>
                </h2>
                <h1>Status:
                <?php echo $registroSolicitacao['status']; ?>
                </h1>
                <textarea id="r-2" name="resposta-2" rows="4"
                    cols="50">Olá <?php echo $registroSolicitador['nomeUsuario']; ?></textarea>

                <input type="submit" name="action1" value="Recusar">
                <input type="submit" name="action2" value="Aprovar">
            </form>

    <?php } else if ($checkStatus === 'recusado' && $registroSolicitacao['idDoador'] == $id) { ?>
        <h3>Você recusou essa solicitação!</h3>
    <?php
    } else if ($checkStatus === 'recusado' && $registroSolicitacao['idSolicitante'] == $id) { ?>
        <h3>Você teve essa solicitação recusada!</h3>
    <?php
    } else if ($checkStatus === 'aprovado' && $registroSolicitacao['idDoador'] == $id) { ?>
        <h3>Você aprovou essa solicitação!</h3>
    <?php
    } else if ($checkStatus === 'aprovado' && $registroSolicitacao['idSolicitante'] == $id) { ?>
        <h3>Você teve essa solicitação aprovada!</h3>
    <?php
    }
    ;
    ?>
</body>

</html>