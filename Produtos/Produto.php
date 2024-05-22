<?php 

include_once 'conectar.php';

// atributos
class Produto {
    private $id;
    private $nome;
    private $estoque;
    private $conn;

    // getters e setters
    public function getId() { 
        return $this->id;
    }
    public function setId($iid) { 
        $this->id = $iid;
    }
    public function getNome() { 
        return $this->nome;
    }
    public function setNome($name) { 
        $this->nome = $name;
    }
    public function getEstoque() {
        return $this->estoque;
    }
    public function setEstoque($estoqui) { 
        $this->estoque = $estoqui; 
    }
    
    // listar
    public function listar() {
        try {
            $this->conn = Conectar::getInstance();
            $sql = $this->conn->query("SELECT * FROM produtos ORDER BY nome");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null; // fechar conexão
            return $result;
        } 
        catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
}
?>
