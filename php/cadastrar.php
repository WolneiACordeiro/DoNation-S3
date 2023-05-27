<?php
session_start();
include("../conexao.php");

$email = $_SESSION["email"]; 
$senha = $_SESSION["senha"]; 
$nome = $_SESSION["nome"]; 
$whatsapp = $_SESSION["whatsapp"]; 
$biografia = $_SESSION["biografia"]; 
$profissao =  $_SESSION["profissao"];
$rg = $_POST["rg"]; 
$cpf = $_POST["cpf"]; 
$data = $_POST["data"]; 
$cidade = $_POST["cidade"]; 
$uf = $_POST["uf"]; 
$endereco = $_POST["endereco"]; 
$numero = $_POST["numero"]; 
$complemento = $_POST["complemento"];

$default_avatar = '../img/avatars/user_default.jpg';
$destination = "../img/avatars/";

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $randstring = generateRandomString();

    $new_avatar = trim($randstring .'.jpg');

    touch($destination . $new_avatar);  

$register = mysqli_num_rows(mysqli_query($con, "SELECT * FROM contaUsuario WHERE emailUsuario ='$email'"));

        if($register == 0)
        {
            copy($default_avatar, $destination.$new_avatar);
            
            $insert = mysqli_query($con, "INSERT INTO contaUsuario (emailUsuario, senhaUsuario, nomeUsuario, profissaoUsuario, wppUsuario, biografiaUsuario, rgUsuario, cpfUsuario, dtNascimentoUsuario, cidadeUsuario, ufUsuario, enderecoUsuario, numeroEnderecoUsuario, complementoUsuario, fotoUsuario, saldoAtual, saldoGeral) VALUES ('$email', '$senha', '$nome', '$profissao', '$whatsapp', '$biografia', '$rg', '$cpf', '$data', '$cidade', '$uf', '$endereco', $numero, '$complemento', '$new_avatar', 0, 0)");   
            if($insert) {
                session_destroy();
				header("location: ../pages/criarconta.php");
			}
            else {
                session_destroy();
				echo "error";
			}   
        }
        else if($register != 0) {
            session_destroy();
            copy($default_avatar, $destination.$new_avatar);
			header("location:../index.php");
		}

?>

