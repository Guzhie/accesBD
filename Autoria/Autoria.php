<?php
include_once 'conectar.php';

class Autoria
{
    private $codautor;
    private $codlivro;
    private $datalancamento;
    private $editora;
    private $conn;

    // Getters e setters
    public function getCodautor()
    {
        return $this->codautor;
    }
    public function setCodautor($codautor)
    {
        $this->codautor = $codautor;
    }

    public function getCodlivro()
    {
        return $this->codlivro;
    }
    public function setCodlivro($codlivro)
    {
        $this->codlivro = $codlivro;
    }

    public function getDatalancamento()
    {
        return $this->datalancamento;
    }
    public function setDatalancamento($datalancamento)
    {
        $this->datalancamento = $datalancamento;
    }

    public function getEditora()
    {
        return $this->editora;
    }
    public function setEditora($editora)
    {
        $this->editora = $editora;
    }

    //Cadastrar Autoria
    public function criar()
    {
        try {
            if (!$this->vericacaoAutor()) {
                return "Erro: Autor não cadastrado";
            }
            if (!$this->vericacaoLivro()) {
                return "Erro: Livro não cadastrado";
            }

            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into autoria values (?, ?, ?, ?)");
            @$sql->bindParam(1, $this->getCodautor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodlivro(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getDatalancamento(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getEditora(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Registro salvo com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar registro: " . $exc->getMessage();
        }
    }

    public function vericacaoAutor()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from autor where codautor = ?");
            $sql->bindValue(1, $this->getCodautor(), PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchColumn();
            return $result > 0;
        } catch (PDOException $exc) {
            echo "Erro no código do seu Autor:" . $exc->getMessage();
        }
    }

    public function vericacaoLivro()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from livro where codlivro = ?");
            $sql->bindValue(1, $this->getCodlivro(), PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetchColumn();
            return $result > 0;
        } catch (PDOException $exc) {
            echo "Erro na busca do código do seu Livro:" . $exc->getMessage();
        }
    }

    public function excluir()
    {
        if (!$this->vericacaoAutorLivro()) {
            return "Erro: Relação entre autor e livro";
        }
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from autoria where codautor = ? and codlivro = ?");
            @$sql->bindParam(1, $this->getCodautor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodlivro(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Excluido com sucesso!";
            } else {
                return "Erro na exclusão!";
            }
        } catch (PDOException $exc) {
            echo "Erro ao excluir. " . $exc->getMessage();
        }
    }

    public function vericacaoAutorLivro()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select count(*) from autoria where codautor = ? and codlivro = ? ");
            @$sql->bindParam(1, $this->getCodautor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodlivro(), PDO::PARAM_STR);
            $sql -> execute();
            $result = $sql->fetchColumn(); 
            return $result >0;
        } catch (PDOException $exc) {
            echo "Erro na relação entre Autor e Livro: " . $exc->getMessage();
        }
    }

    public function consultar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from autoria where editora like ?");
            @$sql->bindParam(1, $this->getEditora(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }

    // Listar todas as autorias
    public function listar()
    {
        try {
            $this->conn = Conectar::getInstance();
            $sql = $this->conn->query("SELECT * FROM autoria ORDER BY datalancamento");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null; // Fechar conexão
            return $result;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
}
