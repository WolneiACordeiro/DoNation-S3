<?php
session_start();
include("../conexao.php");

$idExcluir =  $_SESSION['i']; 

$result = mysqli_query($con," SELECT imagemContribuicao FROM contribuicaoUsuario where idContribuicao = $idExcluir");

$row = mysqli_fetch_array($result);

$imagem_deleta = $row[0];

$file_pointer = "../img/contribuicoes/" . $imagem_deleta;

if (!unlink($file_pointer)) { 
    echo ("$file_pointer cannot be deleted due to an error"); 
} 
else { 
    echo ("$file_pointer has been deleted"); 
} 

mysqli_query($con, "DELETE FROM contribuicaoUsuario WHERE idContribuicao = $idExcluir");

header("location:../pages/dandelion.php");

?>