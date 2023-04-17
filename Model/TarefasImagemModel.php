<?php
class TarefasImagemModel {
    private $db;

    public function __construct($conexaoBanco) {
        $this->db = $conexaoBanco;
    }

    public function getImagensAleatorias($quantidade) {
        $sql = "SELECT * FROM tbl_imagemTarefa ORDER BY RAND() LIMIT $quantidade and 
        SELECT frase FROM tbl_imagemTarefa WHERE imagem IN ???";
        $result = $this->db->query($sql);
        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $imagens[] = $row;
            }
            return $imagens;
        } else {
            return false;
        }
    }
}