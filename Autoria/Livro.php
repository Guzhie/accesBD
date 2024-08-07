<?php
include_once 'conectar.php';

class Livro {
    private $codlivro;
    private $titulo;
    private $categoria;
    private $isbn;
    private $idioma;
    private $qtdepag;
    private $conn;

    // Getters e setters
    public function getCodlivro() { return $this->codlivro; }
    public function setCodlivro($codlivro) { $this->codlivro = $codlivro; }

    public function getTitulo() { return $this->titulo; }
    public function setTitulo($titulo) { $this->titulo = $titulo; }

    public function getCategoria() { return $this->categoria; }
    public function setCategoria($categoria) { $this->categoria = $categoria; }

    public function getIsbn() { return $this->isbn; }
    public function setIsbn($isbn) { $this->isbn = $isbn; }

    public function getIdioma() { return $this->idioma; }
    public function setIdioma($idioma) { $this->idioma = $idioma; }

    public function getQtdepag() { return $this->qtdepag; }
    public function setQtdepag($qtdepag) { $this->qtdepag = $qtdepag; }

    //Cadastrar livros
    public function criar() {
        try {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("insert into livro values (null, ?, ?, ?, ?, ?)");
            @$sql -> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
            @$sql -> bindParam(3, $this->getIsbn(), PDO::PARAM_STR);
            @$sql -> bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql -> bindParam(5, $this->getQtdepag(), PDO::PARAM_STR);
            if ($sql->execute() ==1) {
                return "Registro salvo com sucesso!";
            }
            $this->conn = null;

        } catch (PDOException $exc ) {
            echo "Erro ao salvar registro: " . $exc->getMessage();
        }

    }

    // Listar todos os livros
    public function listar() {
        try {
            $this->conn = Conectar::getInstance();
            $sql = $this->conn->query("SELECT * FROM livro ORDER BY titulo");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null; // Fechar conexão
            return $result;
        } 
        catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
}
?>
