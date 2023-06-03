<?php
session_start();
include("../conexao.php");

$senha = $_POST["senha"];
$email = $_POST["email"];

$query = mysqli_query($con,"SELECT * FROM contaUsuario WHERE emailUsuario = '$email' AND senhaUsuario = '$senha'");
$dados = mysqli_fetch_array($query);
$queryMatch = mysqli_num_rows($query);

$usuario_autenticado = false;

  if($queryMatch == 1){
    $usuario_autenticado = true;
  }

if ($usuario_autenticado == true) {
  $_SESSION['autenticado'] = 'SIM';
  $_SESSION['id'] = $dados[0];
  header('Location: ../pages/donation.php');
} else {
  $_SESSION['autenticado'] = 'NAO';
  header('Location: ../index.php?login=erro');
}

?>