<?php
session_start();
include("../models/conexao.php");

$idExcluir = $_SESSION['i']; 

$documento = $colecaoContribuicao->findOne(['_id' => new \MongoDB\BSON\ObjectID($idExcluir)]);
$imagem_deleta = $documento['imagemContribuicao'];

$file_pointer = "../img/contribuicoes/" . $imagem_deleta;
unlink($file_pointer);

if (!unlink($file_pointer)) { 
    echo ("$file_pointer cannot be deleted due to an error"); 
} 
else { 
    echo ("$file_pointer has been deleted"); 
} 

$resultado = $colecaoContribuicao->deleteOne(['_id' => new \MongoDB\BSON\ObjectID($idExcluir)]);

header("location:../pages/dandelion.php");
?>