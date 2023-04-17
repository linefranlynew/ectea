<?php

class AdmModel {


    public $db = null; //conexao com banco
    public $id = 0;
    public $rsocial = null;
    public $cnpj = null;
    public $unidade = null;
    public $email = null;
    public $senha = null;
    public $tel = null;
    public $tAcesso = null;

    public function __construct($conexaoBanco) {
        $this->db = $conexaoBanco;
    }

    public function atualizar(){
        $retorno = ['status' => 0, 'dados' => null];
        try{
            $stmt = $this->db->prepare('
                UPDATE tbl_instituicao SET
                razaoSocial = :rsocial,
                CNPJ = :cpf,
                unidade = :unidade,
                telefone = :telefone,
                tipoAcesso = :tacesso
                WHERE id = :id
            ');
            $stmt->bindValue(':id', $this->id);
            $stmt->bindValue(':rsocial', $this->rsocial);
            $stmt->bindValue(':cpf', $this->cnpj);
            $stmt->bindValue(':unidade', $this->unidade);            
            $stmt->bindValue(':telefone', $this->tel);
            $stmt->bindValue(':tacesso', $this->tAcesso);
            $stmt->execute();
            $retorno['status'] = 1;
        }
        catch(PDOException $e) {
            echo 'Erro ao atualizar usuario: '.$e->getMessage();
        }
        return $retorno;
    }

    public function listarPeloID() {
        $retorno = ['status' => 0, 'dados' => null];
        try {
            $stmt = $this->db->prepare('
                SELECT * FROM tbl_instituicao 
                WHERE id = :id');
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
            $dados = $stmt->fetchAll();
            $retorno['status'] = 1;
            $retorno['dados'] = $dados;
        }
        catch(PDOException $e) {
            echo 'Erro ao listar usuario pelo ID: '.$e->getMessage();
        }
        return $retorno;
    }

    public function deletar() {
        $retorno = ['status' => 0, 'dados' => null];
        try {
            $stmt = $this->db->prepare("
                DELETE FROM tbl_instituicao
                WHERE id = :id
            ");
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
            $retorno['status'] = 1;
        }
        catch(PDOException $e) {
            echo 'Erro ao deletar usuario: '.$e->getMessage();
        }
        return $retorno;
    }

    
    public function lerTodos() {
       $retorno = ['status' => 0, 'dados' => null];
        try {
            $query = $this->db->query('SELECT * FROM tbl_acessos
            INNER JOIN tbl_instituicao
            ON tbl_acessos.id = tbl_instituicao.id');
            $dados = $query->fetchAll();
            $retorno['status'] = 1;
            $retorno['dados'] = $dados;
       }
       catch(PDOException $e) {
           echo 'Erro ao listar todos os usuarios: '.$e->getMessage();
       }
       return $retorno;
    }

    public function cadastrar() {
        $retorno = [
            'status' => 0, 
            'dados' => null
        ];
        try {

            $stmt = $this->db->prepare("
                INSERT INTO tbl_acessos (email, senha, tipoAcesso)
                VALUES (:email, :senha, :tipoAcesso);
                INSERT INTO tbl_instituicao
                (razaoSocial, CNPJ, unidade, telefone, tipoAcesso, acesso)
                VALUES
                (:rsocial, :cnpj, :unidade, :fone, :tipoAcessoIns, (SELECT MAX(id) FROM tbl_acessos));
            ");
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':senha', $this->senha);
            $stmt->bindValue(':tipoAcesso', $this->tAcesso);
            $stmt->bindValue(':rsocial', $this->rsocial);
            $stmt->bindValue(':cnpj', $this->cnpj);
            $stmt->bindValue(':unidade', $this->unidade);            
            $stmt->bindValue(':fone', $this->tel);
            $stmt->bindValue(':tipoAcessoIns', $this->tAcesso);  
            $stmt->execute();
            $retorno['status'] = 1;
        }
        catch(PDOException $e) {
            echo 'Erro ao cadastrar usuario: '.$e->getMessage();
        }
        return $retorno;
    }




    
}
