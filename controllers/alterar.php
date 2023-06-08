<?php
session_start();
require_once '../models/conexao.php'; // conexão com o banco MongoDB

    $atividade = $_POST['atividade'];
    $descricao = $_POST["descricao"]; 
    $categoria = $_POST["categoria"];
    $dia = $_POST["dia"]; 
    $das = $_POST["das"]; 
    $ate = $_POST["ate"];
    $contribuidorId = $_SESSION['id']; 
    $arquivo = $_FILES['file'];

    $idAlterar =  $_SESSION['i'];
    
	$resultado = $colecaoContribuicao->updateOne(
		['_id' => new \MongoDB\BSON\ObjectID($idAlterar)], // aqui assumimos que o ID em `$idAlterar` é a representação como string hex do ObjectID do documento no MongoDB
		['$set' => [
			'atividadeContribuicao' => $atividade,
			'descricaoContribuicao' => $descricao,
			'categoriaContribuicao' => $categoria,
			'diaContribuicao' => $dia,
			'dasContribuicao' => $das,
			'ateContribuicao' => $ate
		]]
	);

	$filetype=$arquivo['type'];
    if ($filetype=='image/pjpeg' || $filetype=='image/PJPEG' || $filetype=='image/jpeg' || $filetype=='image/JPEG' || $filetype=='image/jpg' || $filetype=='image/png' || $filetype=='image/PNG' || $filetype=='image/gif' || $filetype=='image/GIF' || $filetype=='image/bmp' || $filetype=='image/BMP'){
        if ($arquivo['size']>10000000000000000000){
            exit('Arquivo muito grande. Tamanho máximo permitido 500kb. O arquivo enviado contém '.round($arquivo['size']/1024).'kb');  
        }
        $novonome = md5(mt_rand(1,10000).$arquivo['name']).'.jpg';
        $dir = "../views/imgs/contribuicoes/";
        if (!file_exists($dir)){
            mkdir($dir, 0755);  
        }
        $caminho = $dir.$novonome;
        $insere = $colecaoContribuicao->updateOne(
            ['_id' => new \MongoDB\BSON\ObjectID($idAlterar)], // aqui novamente assumimos que o ID em `$idAlterar` é a representação como string hex do ObjectID do documento no MongoDB
            ['$set' => ['fotoContribuicao' => $novonome]]
        );
        if ($insere->getModifiedCount() == 1){ // verificar se a alteração foi bem sucedida
            move_uploaded_file($_FILES['file']['tmp_name'],$caminho);
            header("location: ../views/pages/donation.php");
         } else{
              echo "<script>alert('Não foi possível inserir a imagem!!');</script>";
        }
    }  
    
header("location: ../pages/alterar.php?idc=" . $idAlterar);		          
?>

