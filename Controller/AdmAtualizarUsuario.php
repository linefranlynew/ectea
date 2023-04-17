<?php

require_once('../Configuracoes/Conexao.php');
require_once('../Model/AdmModel.php');
//entrada
$json = file_get_contents('php://input');
$reqbody = json_decode($json);
$rsocial = $reqbody->razaoSocial;
$cpf = $reqbody->cnpj;
$unidade = $reqbody->unidade;
$telefone = $reqbody->telefone;
$accesso = $reqbody->tipoAcesso;
$id = $reqbody->idUsuario;
//processamento
$conexao = new Conexao();
$db = $conexao->abrirConexao();
$modelAdm = new AdmModel($db);
$modelAdm->id = $id;
$modelAdm->rsocial = $rsocial;
$modelAdm->cnpj = $cpf;
$modelAdm->unidade = $unidade;
$modelAdm->tel = $telefone;
$modelAdm->tAcesso = $accesso;
$retorno = $modelAdm->atualizar();
//saida
echo json_encode($retorno);