<?php
session_start();


require_once __DIR__ . "../../classes/Categoria.php";
require_once __DIR__ . "../../dao/daoCategoria.php";

$nome = $_POST['nome_categoria'];


$categoriaDao = new daoCategoria($conexao);

if(!$nome){
    header("Location: ../../index.php?navegation=2");   
}else{
    $categoria = new Categoria($nome);
    $categoriaDao->insert($categoria);
    header("Location: ../../index.php?navegation=2"); 
}