<?php 
session_start();
require_once('../model/db.php');
require_once('../model/autenticar.php');
require_once('../model/error.php');

$login = new Autenticar;
$erro = new Erro;

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    if(isset($usuario) && isset($senha)){
        if($login->verificaRegistro($usuario, $senha)){
            header("Location: ../view/home.html");
            exit();
        } else {
            $erro->setMensagem('Usuario ou senha incorretos!');
            $_SESSION['erro'] = $erro->getMensagem();
            header("Location: ../view/index.php");
            exit();
        }
    }
}