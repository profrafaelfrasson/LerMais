<?php

session_start();

require __DIR__ . "../../classes/Usuario.php";
require_once __DIR__ . "../../dao/daoUsuario.php";

$usuarioDao = new daoUsuario($conexao);

$email = $_POST['email_usuario'];
$senha = $_POST['senha_usuario'];


if($email && $senha){
    if($usuarioDao->findByEmail($email)){
        $u = $usuarioDao->findByEmail($email);
        if($u->getSenha()===$senha){
            $_SESSION['id'] = $u->getId();
            $_SESSION['usuario'] = $u->getNome();
            $_SESSION['email'] = $email;
            header("Location:../../index.php?navegation=1&&tipo=todos");
            exit;
        }else{
            $_SESSION['message'] = 'E-mail ou senha inválidos!';
            header('Location:../../index.php');
            exit;
        }
    }else{
            $_SESSION['message'] = 'Email não encontrado!';
            header('Location:../../index.php');
            exit;
    }
}else{
    $_SESSION['message'] = 'Informe os dados!';
    header('Location:../../index.php');
    exit;
}


?>