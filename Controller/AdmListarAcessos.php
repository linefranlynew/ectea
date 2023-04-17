<?php 

require_once('../Configuracoes/Conexao.php');
require_once('../Model/AdmModel.php');

//processamento
//Criando objeto do tipo Conexao
$conexao = new Conexao();
//Criando variável que irá receber a função abrirConexao 
//contida no objeto
$db = $conexao->abrirConexao();
//Criando objeto do tipo UsuarioModel e passando como parametro 
//a variável db
$modelAdm = new AdmModel($db);
$dados = $modelAdm->lerTodos();
//saida
echo json_encode($dados);