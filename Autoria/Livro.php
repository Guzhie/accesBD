<?php
include_once 'conectar.php';

class Livro
{
    private $codlivro;
    private $titulo;
    private $categoria;
    private $isbn;
    private $idioma;
    private $qtdepag;
    private $conn;

    // Getters e setters
    public function getCodlivro()
    {
        return $this->codlivro;
    }
    public function setCodlivro($codlivro)
    {
        $this->codlivro = $codlivro;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getIdioma()
    {
        return $this->idioma;
    }
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    }

    public function getQtdepag()
    {
        return $this->qtdepag;
    }
    public function setQtdepag($qtdepag)
    {
        $this->qtdepag = $qtdepag;
    }

    //Cadastrar livros
    public function criar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into livro values (null, ?, ?, ?, ?, ?)");
            @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getIsbn(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getQtdepag(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Registro salvo com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao salvar registro: " . $exc->getMessage();
        }
    }

    //consultar Livros
    public function consultar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from livro where titulo like ?");
            @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }

    public function excluir()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from livro where codlivro = ?");
            @$sql->bindParam(1, $this->getCodlivro(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Excluido com sucesso!";
            } else {
                return "Erro na exclusão!";
            }
        } catch (PDOException $exc) {
            echo "Erro ao excluir. " . $exc->getMessage();
        }
    }

    //alterar
    //alterar (consultar um livro específico para editar)
    public function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * from livro where codlivro = ?");
            @$sql->bindParam(1, $this->getCodlivro(), PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC); // Retorna o resultado da consulta
            $this->conn = null; // Fecha a conexão
        } catch (PDOException $exc) {
            echo "Erro ao buscar o registro: " . $exc->getMessage();
        }
    }



    //alterar2
    //alterar2 (salvar as alterações feitas no livro)
    public function alterar2()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("UPDATE livro set titulo = ?, categoria = ?, isbn = ?, idioma = ?, qtdepag = ? where codlivro = ?");
            @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getIsbn(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getQtdepag(), PDO::PARAM_INT);
            @$sql->bindParam(6, $this->getCodlivro(), PDO::PARAM_INT);

            if ($sql->execute()) {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null; // Fecha a conexão
        } catch (PDOException $exc) {
            echo "Erro ao alterar o registro: " . $exc->getMessage();
        }
    }


    // Listar todos os livros
    public function listar()
    {
        try {
            $this->conn = Conectar::getInstance();
            $sql = $this->conn->query("SELECT * FROM livro ORDER BY titulo");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null; // Fechar conexão
            return $result;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
        }
    }
}
