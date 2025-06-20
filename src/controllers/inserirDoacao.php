<?php
session_start();
require_once __DIR__ . "../../classes/Doacao.php";
require_once __DIR__ . "../../dao/daoDoacao.php";

$nome = $_POST['nome_livro'];
$autor = $_POST['autor_livro'];
$quantidade = $_POST['qtd_doacao'];
$descricao = $_POST['descricao'];

if($nome || $quantidade){
    $doacao = new Doacao($nome,$_SESSION['id'], $autor, $quantidade, $descricao);
    $doacaoDao = new daoDoacao($conexao);
    $doacaoDao->insert($doacao);
    $_SESSION['message'] = "Doação efetuada com SUCESSO, encaminhe o livro para o instituto correspondente";
    header("Location: ../../index.php?navegation=1&&tipo=doacao");
    exit;
}
$_SESSION['message'] = "ERRO, Preencha corretamente os dados!";

header("Location: ../../index.php?navegation=1&&tipo=doacao");
exit;


?>