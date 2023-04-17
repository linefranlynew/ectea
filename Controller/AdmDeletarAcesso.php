<?php

require_once('../Configuracoes/Conexao.php');
require_once('../Model/AdmModel.php');
//entrada
$json = file_get_contents('php://input');
$reqbody = json_decode($json);
$id = $reqbody->idAcesso;

//processamento
$conexao = new Conexao();
$db = $conexao->abrirConexao();
$modeladm = new AdmModel($db);
$modeladm->id = $id;
$retorno = $modeladm->deletar();

//saida
echo json_encode($retorno);