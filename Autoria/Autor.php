<?php
include_once 'conectar.php';

class Autor
{
    private $codautor;
    private $nomeautor;
    private $sobrenome;
    private $email;
    private $nascimento;
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

    public function getNomeautor()
    {
        return $this->nomeautor;
    }
    public function setNomeautor($nomeautor)
    {
        $this->nomeautor = $nomeautor;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNascimento()
    {
        return $this->nascimento;
    }
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;
    }

    //Cadastrar Autores
    public function criar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("INSERT into autor values (null, ?, ?, ?, ?)");
            @$sql->bindParam(1, $this->getNomeautor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getNascimento(), PDO::PARAM_STR);
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

    //visualizar alterar
    public function alterar()
    {
        if (!$this->vericacaoAutor()) {
            echo "Erro: não existe um autor com esse codigo";
        }
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * from autor where codautor = ?");
            @$sql->bindParam(1, $this->getCodautor(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar: " . $exc->getMessage();
        }
    }

    //alterar
    //alterar2
    public function alterar2()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("UPDATE autor set nomeautor = ?, sobrenome = ?, email = ?, nascimento = ? where codautor = ?");
            @$sql->bindParam(1, $this->getNomeautor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getNascimento(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getCodautor(), PDO::PARAM_STR);
            if ($sql->execute()) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar o registro: " . $exc->getMessage();
        }
    }


    //consultar autores
    public function consultar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * from autor where nomeautor like ?");
            @$sql->bindParam(1, $this->getNomeautor(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }

    //excluir autores
    public function excluir()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("DELETE from autor where codautor = ?");
            @$sql->bindParam(1, $this->getCodautor(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Excluido com sucesso!";
            } else {
                return "Erro na exclusão!";
            }
        } catch (PDOException $exc) {
            echo "Erro ao excluir. " . $exc->getMessage();
        }
    }

    // Listar todos os autores
    public function listar()
    {
        try {
            $this->conn = Conectar::getInstance();
            $sql = $this->conn->query("SELECT * FROM autor ORDER BY nomeautor");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null; // Fechar conexão
            return $result;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
}
