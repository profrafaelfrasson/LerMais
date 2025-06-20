<?php
session_start();
require_once __DIR__ . "../../dao/daoDoacao.php";
require_once __DIR__ . "../../dao/daoLivro.php";

$daoLivro = new daoLivro($conexao);
$daoDoacao= new daoDoacao($conexao);

$id_doacao = $_GET['id_doacao'];
$idLivro = $_GET['id_livro'];
$qtd = $_GET['qtd_doacao'];

if($id_doacao || $idLivro || $qtd){
    $daoDoacao->baixarDoacao($id_doacao);
    $daoLivro->entradaEstoque($qtd,$idLivro);
    $_SESSION['message'] = "Livro recebido com SUCESSO!";
    header("Location: ../../index.php?navegation=6");
    exit;
}

$_SESSION['message'] = "Ocorreu um erro!";
header("Location: ../../index.php?navegation=6");




?>
