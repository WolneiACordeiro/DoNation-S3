<?php
session_start();
require_once '../models/conexao.php';

$senha = $_POST["senha"];
$email = $_POST["email"];

$usuario_autenticado = false;

$usuario = $colecaoUsuario->findOne([
  'emailUsuario' => $email,
  'senhaUsuario' => $senha,
]);

if ($usuario !== null) {
  $usuario_autenticado = true;
  $_SESSION['autenticado'] = 'SIM';
  $_SESSION['id'] = (string) $usuario['_id'];
  header('Location: ../views/pages/donation.php');
} else {
  $_SESSION['autenticado'] = 'NAO';
  header('Location: ../index.php?login=erro');
}
?>
