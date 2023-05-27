<?php
session_start();
require_once('../model/db.php');
require_once('../model/registrar.php');
require_once('../model/error.php');

$registro = new Registrar;
$erro = new Erro;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    if(isset($usuario) && isset($senha)){
        if(!$registro->verificaRegistro($usuario)){
            try{
                $registro->registrar($usuario, $senha);
                echo "Registrado!";
                header("Location: ../view/home.html");
                exit();
            }catch (PDOException $e) {
                echo "Erro ao inserir registro ". $e->getMessage();
            };
        } else{
            $erro->setMensagem('Usuario já cadastrado');
            $_SESSION['erro'] = $erro->getMensagem();
            header("Location: ../view/register.php");
            exit();
        }  
    }else {
        echo "Preencha os campos!";
    }
}