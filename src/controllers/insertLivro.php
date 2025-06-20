<?php
session_start();

require_once __DIR__ . "../../classes/Livro.php";
require_once __DIR__ . "../../dao/daoLivro.php";

$nome = $_POST['nome_livro'];
$autor = $_POST['autor_livro'];
$estoque = $_POST['estoque_livro'];
$categoria = $_POST['fk_id_categoria'];
$descricao = $_POST['descricao_livro'];

$nomeImagemOriginal = $_FILES['capa_livro']['name'];
$tmpImagem = $_FILES['capa_livro']['tmp_name'];

function normalizarTitulo($titulo) {
    $titulo = iconv('UTF-8', 'ASCII//TRANSLIT', $titulo);
    $titulo = preg_replace('/[^a-zA-Z0-9]/', '_', $titulo);
    return strtolower($titulo);
}

$nomeImagemSemExtensao = normalizarTitulo($nome);

$extensaoImagem = pathinfo($nomeImagemOriginal, PATHINFO_EXTENSION);

$nomeImagemFinal = $nomeImagemSemExtensao . "." . $extensaoImagem;
$caminhoImagem = "src/view/livro/capas/" . $nomeImagemFinal;
$caminhoUpload = "../view/livro/capas/" . $nomeImagemFinal;

if (!$nome || !$autor || !$estoque || !$descricao || !$nomeImagemOriginal) {
    header("Location:../../index.php?navegation=3");
    exit;
}

move_uploaded_file($tmpImagem, $caminhoUpload);

$livro = new Livro($nome, $autor, $categoria, $estoque, $caminhoImagem, $descricao);

$livroDao = new daoLivro($conexao);
$livroDao->insert($livro);

header("Location:../../index.php?navegation=3");
exit;