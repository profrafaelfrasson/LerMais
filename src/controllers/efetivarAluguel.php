<?php
require_once __DIR__ . "../../dao/daLivroAluguel.php";
require_once __DIR__ . "../../dao/daoLivro.php";

$daoLivro = new daoLivro($conexao);
$daoAluguel = new daoAluguel($conexao);

$id = $_GET['id_aluguel'];
$idLivro = $_GET['id_livro'];
$qtd = $_GET['qtd_aluguel'];

$daoAluguel->efetivarAluguel($id);


header("Location: ../../index.php?navegation=4");



?>
