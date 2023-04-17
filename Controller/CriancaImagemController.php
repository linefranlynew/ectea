<?php
require_once('../../Configuracoes/Conexao.php');
require_once('../Model/TarefasImagemModel.php');

class CriancaImagemController {
    private $model;


    public function __construct($db) {
        $this->model = new ImagemModel($db);
    }

    public function exibirImagensAleatorias() {
        $imagens1 = $this->model->getImagensAleatorias(1);
        $imagens2 = $this->model->getImagensAleatorias(1); 
        require_once '../View/Atividades/Letras/imagens.php';
        extract(compact('imagens1', 'imagens2'));
        
    }
}

