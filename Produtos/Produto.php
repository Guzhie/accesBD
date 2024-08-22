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
    
    //criar
    public function criar() {
        try {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("insert into produtos values (null, ?, ?)");
            @$sql -> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this->getEstoque(), PDO::PARAM_STR);
            if ($sql->execute() ==1) {
                return "Registro salvo com sucesso!";
            }
            $this->conn = null;

        } catch (PDOException $exc ) {
            echo "Erro ao salvar registro: " . $exc->getMessage();
        }

    }

    //consultar
    public function consultar(){
        try {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("select * from produtos where nome like ?");
            @$sql -> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            $sql -> execute();
            return $sql -> fetchAll();
            $this->conn = null;

        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
        
    //excluir
    public function excluir(){
        try {
            $this-> conn = new Conectar();
            $sql = $this -> conn -> prepare("delete from produtos where id = ?");
            @$sql -> bindParam(1, $this->getId(), PDO::PARAM_STR);
            if ($sql->execute() ==1) {
                return "Excluido com sucesso!";
            }
            else{
                return "Erro na exclusão!";
            }
        } catch (PDOException $exc) {
            echo "Erro ao excluir. ". $exc->getMessage();
        }
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
