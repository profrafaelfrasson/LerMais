<?php

session_start();

require __DIR__ . "../../classes/Usuario.php";
require_once __DIR__ . "../../dao/daoUsuario.php";

$usuarioDao = new daoUsuario($conexao);



$nome = $_POST['nome_usuario'];
$sobrenome = $_POST['sobrenome_usuario'];
$email = $_POST['email_usuario'];
$contato = $_POST['contato_usuario'];
$senha = $_POST['senha_usuario'];
$senhaRepeticao = $_POST['repetir_senha'];

if(!$usuarioDao->findByEmail($email)){
    if($senha===$senhaRepeticao){
        $u = new Usuario();
        $u->setNome($nome." ".$sobrenome);
        $u->setEmail($email);
        $u->setContato($contato);
        $u->setSenha($senha);
        $usuarioDao->insert($u);
        $_SESSION['message'] = "Usuario cadastrado com SUCESSO!";
        header("Location:../../index.php");
        $_SESSION['nome'] = "";
        $_SESSION['email'] = "";
        $_SESSION['contato'] = "";
        $_SESSION['senha'] = "";
        $_SESSION['senhaRepeticao'] = "";
        exit;
    }else{
        $_SESSION['message'] = "As senhas NÃO conferem!";
        $_SESSION['nome'] = $nome;
        $_SESSION['sobrenome'] = $sobrenome;
        $_SESSION['email'] = $email;
        $_SESSION['contato'] = $contato;
        $_SESSION['senha'] = "";
        $_SESSION['senhaRepeticao'] = "";
        header("Location:../../index.php?navegation=5");
        exit;
        
    }
}else{
    $_SESSION['message'] = "E-mail já cadastrado!";
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = "";
    $_SESSION['contato'] = $contato;
    $_SESSION['senha'] = $senha;
    $_SESSION['senhaRepeticao'] = $senhaRepeticao;
    header("Location:../../index.php?navegation=5");
    exit;
}





