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
