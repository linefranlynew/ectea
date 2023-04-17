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
$ModelAdm = new AdmModel($db);
$ModelAdm->id = $id;
$retorno = $ModelAdm->listarPeloID();
//saida
echo json_encode($retorno);
