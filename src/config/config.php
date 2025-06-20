<?php 
    $conexao = mysqli_connect("localhost", "root", "", "lermais");
    if ($conexao == false) {
        die("Erro na conexão: " . mysqli_connect_error());
    }
    /* "localhost", "root", "", "dbname" */
?>