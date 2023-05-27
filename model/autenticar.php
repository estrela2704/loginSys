<?php
require_once('db.php');

class Autenticar{

    private $dbConexao;

    public function __construct(){
        $this->dbConexao = new Conexaobd('localhost', 'root', '023922', 'system');
        $this->dbConexao->conectar();
    }

    public function verificaRegistro($usuario, $senha){ 
        $query = "SELECT usuario, senha FROM user WHERE usuario = :usuario AND senha = :senha";

        $stmt = $this->dbConexao->getConexao()->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }


}