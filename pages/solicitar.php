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

    $doacaoId = $_GET['idDoacao'];
    $donationId = new \MongoDB\BSON\ObjectID($doacaoId);
    $registroDoacao = $colecaoContribuicao->findOne(['_id' => $donationId]);

    $doadorId = $registroDoacao['idContribuidor'];
    $donatorId = new \MongoDB\BSON\ObjectID($doadorId);
    $registroDoador = $colecaoUsuario->findOne(['_id' => $donatorId]);
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
    <h2>
        <?php echo $registroUsuario['nomeUsuario']; ?> está solicitando
        <?php echo $registroDoacao['atividadeContribuicao']; ?>
    </h2>
    <form action="../php/enviarSolicitacao.php" method="post">
        <input type="hidden" name="idDoacao" value="<?php echo $doacaoId ?>">
        <textarea id="r-1" name="resposta-1" rows="4" cols="50">Olá <?php echo $registroDoador['nomeUsuario']; ?> estou enviando esta mensagem para solicitar a doação de <?php echo $registroDoacao['atividadeContribuicao']; ?></textarea>
        <input type="datetime-local" name="dataHora" id="data-hora">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>