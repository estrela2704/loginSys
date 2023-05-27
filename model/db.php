<?php 

Class Conexaobd{

    private $host;
    private $usuario;
    private $senha;
    private $banco;
    private $conexao;

    public function __construct($host, $usuario, $senha, $banco){
        $this->host = $host;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->banco = $banco;
    } 

    public function conectar(){
        try{
            $dsn = "mysql:host={$this->host};dbname={$this->banco}";
            $erros = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $this->conexao = new PDO($dsn, $this->usuario, $this->senha, $erros);
        }catch(PDOException $e){
            echo "Erro ao acessar o banco de dados! " . $e->getMessage();
            return false;
        }
    }


    public function getConexao(){
        return $this->conexao;
    }

    public function closeConexao(){
        $this->conexao = null;
    }
}

