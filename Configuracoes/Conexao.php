<?php

class Conexao {
  public $host = "localhost:3308";
  public $porta = 3308;
  public $nomeBanco = "ecteacom_ectea";
  public $usuarioBanco = "ecteacom";
  public $senhaUsuario = "Ecteacom1204#";

  public $pdo = null;

  public function abrirConexao() {
    try{
      $this->pdo = new PDO(
        'mysql:host='.$this->host.';dbname='.$this->nomeBanco,
        $this->usuarioBanco, 
        $this->senhaUsuario
      );

      $this->pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
      $this->pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
      );
    }
    catch(PDOException $ex) {
      echo 'Erro ao conectar com o banco de dados: '.$ex->getMessage();
    }
    return $this->pdo;
  }
}