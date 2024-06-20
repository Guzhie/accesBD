<?php
include_once 'conectar.php';

class Autoria {
    private $codautor;
    private $codlivro;
    private $datalancamento;
    private $editora;
    private $conn;

    // Getters e setters
    public function getCodautor() { return $this->codautor; }
    public function setCodautor($codautor) { $this->codautor = $codautor; }

    public function getCodlivro() { return $this->codlivro; }
    public function setCodlivro($codlivro) { $this->codlivro = $codlivro; }

    public function getDatalancamento() { return $this->datalancamento; }
    public function setDatalancamento($datalancamento) { $this->datalancamento = $datalancamento; }

    public function getEditora() { return $this->editora; }
    public function setEditora($editora) { $this->editora = $editora; }

    // Listar todas as autorias
    public function listar() {
        try {
            $this->conn = Conectar::getInstance();
            $sql = $this->conn->query("SELECT * FROM autoria ORDER BY datalancamento");
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
