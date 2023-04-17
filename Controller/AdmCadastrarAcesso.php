<?php

require_once('../Configuracoes/Conexao.php');
require_once('../Model/AdmModel.php');
// entrada
$json = file_get_contents('php://input');
$reqbody = json_decode($json);
$razaoSocial = $reqbody->razaoSocial;
$cnpj = $reqbody->cnpj;
$unidade = $reqbody->unidade;
$email = $reqbody->email;
$senha = $reqbody->senha;
$telefone = $reqbody->telefone;
$tipoAcesso = $reqbody->tipoAcesso;
//Processamento
//Criando objeto do tipo Conexao
$conexao = new Conexao();
//Criando variável que irá receber a função abrirConexao 
//contida no objeto
$db = $conexao->abrirConexao();
//Criando objeto do tipo UsuarioModel e passando como parametro 
//a variável db
$modelAdm = new AdmModel($db);
//Enviando para a classe model os valores informandos pelo 
//usuário na view (agora armazenado na variável PHP)
$modelAdm->rsocial = $razaoSocial;
$modelAdm->cnpj = $cnpj;
$modelAdm->unidade = $unidade;
$modelAdm->email = $email;
$modelAdm->senha = $senha;
$modelAdm->tel = $telefone;
$modelAdm->tAcesso = $tipoAcesso;
//Criando uma variável que faz a chamada da função cadastrar
//que está na model e recebe seu valor
$retorno = $modelAdm->cadastrar();
// saida envia o resultado contido em retorno para a view
echo json_encode($retorno);
?>