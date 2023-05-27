<?php

session_start();
include("../conexao.php");

    $atividade = $_POST['atividade'];
    $descricao = $_POST["descricao"]; 
    $categoria = $_POST["categoria"];
    $dia = $_POST["dia"]; 
    $das = $_POST["das"]; 
    $ate = $_POST["ate"];
    $contribuidorId = $_SESSION['id']; 
    $arquivo = $_FILES['file'];

    mysqli_query($con, "INSERT INTO contribuicaoUsuario (atividadeContribuicao, descricaoContribuicao, categoriaContribuicao, diaContribuicao, dasContribuicao, ateContribuicao, idContribuidor) VALUES ('$atividade', '$descricao', '$categoria', '$dia', '$das', '$ate', $contribuidorId)");


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
						$insere = mysqli_query($con, "UPDATE contribuicaoUsuario SET imagemContribuicao ='$novonome' ORDER BY idContribuicao DESC limit 1");
						if ($insere){
							move_uploaded_file($_FILES['file']['tmp_name'],$caminho);
                            header("location: ../pages/dandelion.php");
						 }else{
							  echo "<script>alert('Não foi possível inserir a imagem!!');</script>";
						}
					}            

?>

