<?php 
require_once('db.php');
require_once('error.php');

class Registrar{
    private $dbConexao;

    public function __construct(){
        $this->dbConexao = new Conexaobd('localhost', 'root', '023922', 'system');
        $this->dbConexao->conectar();
    }

    public function verificaRegistro($usuario){
        $query = "SELECT count(usuario) FROM user WHERE usuario = :usuario";

        $stmt = $this->dbConexao->getConexao()->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if($result[0][0] == 1){
            return true;
        } else {
            return false;
        }

    }

    public function registrar($usuario, $senha){
        $query = "INSERT INTO user (usuario, senha) VALUES (:usuario, :senha)";

        try{
            $stmt = $this->dbConexao->getConexao()->prepare($query);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
        }catch(PDOException $e) {
            echo "Erro ao inserir registro ". $e->getMessage();
        };
    }
    
}
