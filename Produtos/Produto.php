<?php 

include_once 'conectar.php';

//atributos
class Produto{
    private $id;
    private $nome;
    private $estoque
    private $conn;

    //getter e setter
    public function getId() { 
        return $this->id;
    }
    public function setId(Şiid){ 
        $this->id = $iid;
    }
    public function getNome () { 
        return $this->nome;
    }
    public function setNome ($name) { 
        $this->nome = $name;
    }
    public function getEstoque() {
        return $this->estoque;
    }
    public function setEstoque ($estoqui) { 
        $this->estoque = $estoqui; 
    }
    
    //listar
    function listar(){
        try {
            $this -> conn = new Conectar();
            $sql = $this ->conn ->query("select * from produto ordem by name");
            $sql -> execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (\Throwable $th) {
            echo "Erro ao executar consulta.  " . $exc ->getMessage();
        }
    }

}



?>