<?php

class LogarModel{

    public $db = null; //conexao com banco
    public $id = 0;
    public $email = null;
    public $senha = null;


    public function __construct($conexaoBanco) {
        $this->db = $conexaoBanco;
    }

    public function logar() {        
        $retorno = [
            'status' => 0,
            'dados' => null
        ];
        try {
            
            $stmt = $this->db->prepare('
            SELECT id, email, tipoAcesso FROM tbl_acessos
            WHERE email = :email
            AND senha = :senha
            LIMIT 1
            ');
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':senha', $this->senha);
            $stmt->execute();
            $dado = $stmt->fetch();

            if ($dado['id'] && $dado['id'] > 0) {                
                $retorno['dados'] = $dado;
                session_start();
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dado['id'];
                $_SESSION['usuario'] = $dado['email'];
                if($dado['tipoAcesso'] == 1){
                    $retorno['status'] = 1;
                }
                if($dado['tipoAcesso'] == 2){
                    $retorno['status'] = 2;
                }                
            }
        }
        catch(PDOException $ex) {
            echo 'Erro ao logar: '.$ex->getMessage();
        }
        return $retorno;
    }
    
    
}
