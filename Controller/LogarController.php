<?php
//Importações
require_once('../Configuracoes/Conexao.php');
require_once('../Model/LogarModel.php');

// entrada
$json = file_get_contents('php://input');
//Criando variável PHP que através da função json_decode
//Consegue buscar os dados contidos no JSON do HTML
$reqbody = json_decode($json);

/*Criando variáveis que irão receber os dados que estão
sendo enviadas da tela view para a controller.
Essas informações consiguimos acessar devido ao reqbody
criado na linha de código acima. Através dela conseguimos
acessar qualquer variável enviada dentro do body do config*/
$login = $reqbody->login;
$senha = $reqbody->senha;

/* Criando objeto do tipo conexão
Isso significa que com a variável (objeto)
criada conseguimos acessar as informações
da classe conexão*/
$conexao = new Conexao();

/*Através do objeto conexao criado acima, acessamos a 
função abrirConexão que está na classe conexão, essa
função será executada e o valor que ela enviar será 
armazenado na variával banco que está sendo criada*/
$banco = $conexao->abrirConexao();

$modelLogar = new LogarModel($banco);
$modelLogar->email = $login;
$modelLogar->senha = $senha;
$retorno = $modelLogar->logar();
// saida
echo json_encode($retorno);