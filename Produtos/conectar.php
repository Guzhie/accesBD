<?php 
class Conectar extends PDO
{
    private static $instancia;
    private $query;
    private $host = "127.0.0.1";
    private $usuario = "root";
    private $senha = "";
    private $db = "produtos";

    public function __construct()
    {
        parent::__construct("mysql:host=$this->host;dbname=$this->db", $this->usuario, $this->senha);
    }
    
    public static function getInstance(){
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new Conectar();
                echo 'Conectado com sucesso!!!';
            } catch (Exception $e) {
                echo 'Erro ao conectar: ' . $e->getMessage();
                exit();
            }
        }
        return self::$instancia;
    }

    public function sql($query){
        $this->query = $query;
        $stmt = $this->prepare($this->query);
        $stmt->execute();
    }
}
?>
