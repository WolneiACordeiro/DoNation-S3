<?php
// Arquivo de conexão com o banco
require_once '../../vendor/autoload.php'; // Dependência do MongoDB
// Importa as classes necessárias do MongoDB
use MongoDB\Client;
use MongoDB\Database;

// Configurações de conexão com o MongoDB
$mongoDBUri = "mongodb://localhost:27017"; // URI de conexão do MongoDB
$mongoDBNome = "DonationPlatform"; // Nome do seu banco de dados MongoDB
$colecaoUsuario = "usuario"; // Nome da coleção onde os dados do usuario são armazenados
$colecaoContribuicao = "contribuicao"; // Nome da coleção onde os dados da contribuição são armazenados
$colecaoSolcitacao = "solicitacao";

// Cria uma instância do cliente do MongoDB
$cliente = new Client($mongoDBUri);

// Seleciona o banco de dados
$bancoDeDados = $cliente->selectDatabase($mongoDBNome);

// Seleciona a coleção
$colecaoUsuario = $bancoDeDados->selectCollection($colecaoUsuario);
$colecaoContribuicao = $bancoDeDados->selectCollection($colecaoContribuicao);
$colecaoSolicitacao = $bancoDeDados->selectCollection($colecaoSolcitacao);

global $colecaoUsuario, $colecaoContribuicao, $colecaoSolicitacao;
?>
