<?php
include_once 'conectar.php';

class Autor {
    private $codautor;
    private $nomeautor;
    private $sobrenome;
    private $email;
    private $nascimento;
    private $conn;

    // Getters e setters
    public function getCodautor() { return $this->codautor; }
    public function setCodautor($codautor) { $this->codautor = $codautor; }

    public function getNomeautor() { return $this->nomeautor; }
    public function setNomeautor($nomeautor) { $this->nomeautor = $nomeautor; }

    public function getSobrenome() { return $this->sobrenome; }
    public function setSobrenome($sobrenome) { $this->sobrenome = $sobrenome; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getNascimento() { return $this->nascimento; }
    public function setNascimento($nascimento) { $this->nascimento = $nascimento; }

    // Listar todos os autores
    public function listar() {
        try {
            $this->conn = Conectar::getInstance();
            $sql = $this->conn->query("SELECT * FROM autor ORDER BY nomeautor");
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
