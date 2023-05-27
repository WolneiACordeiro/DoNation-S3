<?php
session_start();
require_once '../conexao.php'; // conexão com o banco MongoDB
require_once '../vendor/autoload.php';

    $atividade = $_POST['atividade'];
    $descricao = $_POST["descricao"]; 
    $categoria = $_POST["categoria"];
    $dia = $_POST["dia"]; 
    $das = $_POST["das"]; 
    $ate = $_POST["ate"];
    $contribuidorId = $_SESSION['id']; 
    $arquivo = $_FILES['file'];

    $idAlterar =  $_SESSION['i'];
    
    mysqli_query($con, "UPDATE contribuicaoUsuario SET atividadeContribuicao = '$atividade', descricaoContribuicao = '$descricao', categoriaContribuicao = '$categoria', diaContribuicao = '$dia', dasContribuicao = '$das', ateContribuicao = '$ate' WHERE idContribuicao = $idAlterar");

    if($_FILES['file']!= null && $_FILES['file'] != '' && $_FILES['file'] != 0) {
      $result = mysqli_query($con," SELECT imagemContribuicao FROM contribuicaoUsuario where idContribuicao = $idAlterar ");

			$row = mysqli_fetch_array($result);

			$imagem_deleta = $row[0];

			$file_pointer = "../img/contribuicoes/" . $imagem_deleta;

			// if (!unlink($file_pointer)) { 
			// 	echo ("$file_pointer cannot be deleted due to an error"); 
			// } 
			// else { 
			// 	echo ("$file_pointer has been deleted"); 
			// } 

      $filetype=$arquivo['type'];
					if($filetype=='image/pjpeg' || $filetype=='image/PJPEG' || $filetype=='image/jpeg' || $filetype=='image/JPEG' || $filetype=='image/jpg' || $filetype=='image/png' || $filetype=='image/PNG' || $filetype=='image/gif' || $filetype=='image/GIF' || $filetype=='image/bmp' || $filetype=='image/BMP'){
						  if ($arquivo['size']>10000000000000000000){
							exit('Arquivo muito grande. Tamanho máximo permitido 500kb. O arquivo enviado contém '.round($arquivo['size']/1024).'kb');  
						  }
						 $novonome = md5(mt_rand(1,10000).$arquivo['name']).'.jpg';
						  $dir = "../img/contribuicoes/";
						  if (!file_exists($dir)){
							mkdir($dir, 0755);  
						  }
						  $caminho = $dir.$novonome;
						$insere = mysqli_query($con, "UPDATE contribuicaoUsuario SET imagemContribuicao ='$novonome' WHERE idContribuicao = $idAlterar");
						if ($insere){
							move_uploaded_file($_FILES['file']['tmp_name'],$caminho);
              header("location: ../pages/alterar.php?idc=" . $idAlterar);
						 }else{
							  echo "<script>alert('Não foi possível inserir a imagem!!');</script>";
						}
					}  

    }
    
    header("location: ../pages/alterar.php?idc=" . $idAlterar);		          

?>

