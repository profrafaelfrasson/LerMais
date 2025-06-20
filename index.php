<?php 
    error_reporting(E_ERROR);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="src/public/image/logo.png">
        <style>
            .sair_button{
                margin-left: 60px;
                position: absolute;
                padding: 15px 25px;
                background: white;
                color: blue;
                font-size: 20px;
                text-decoration: none;
                border-radius: 15px;
            }
        </style>
        <?php
            session_start();
             if($_SESSION['usuario']===null){
                 echo "<link rel='stylesheet' type='text/css' href='src/components/style-loginUsuario.css'>";
             }elseif ($_SESSION['usuario']===null && $_GET['navegation'] == 5){
                echo "<link rel='stylesheet' href='src/components/style-cadastroUsuario.css'>";
            }elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 1) {
                 echo "<link rel='stylesheet' href='src/components/style-painelAdm.css'>";
            }elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 2){
                 echo "<link rel='stylesheet' href='src/components/style-cadastroCategoria.css'>";
            }elseif($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 3){
                echo "<link rel='stylesheet' href='src/components/style-cadastroLivro.css'>";
            }elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 4 || $_GET['navegation'] == 6 || $_GET['navegation'] == 8){
                 echo "<link rel='stylesheet' href='src/components/style-listarAlugueis.css'>";
            }elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 7){
                 echo "<link rel='stylesheet' href='src/components/style-painelDoacao.css'>";
            }
            else{
                 echo "<link rel='stylesheet' href='src/components/style-catalogoLivros.css'>";
                 
            }
            
        
        ?>
        <title>LerMais</title>
        
    </head>
    <body>
        <?php

        if($_SESSION['usuario']===null && $_GET['navegation'] === null){
            include 'src/view/login/form_loginUsuario.php';
            
            exit;
        }elseif ($_SESSION['usuario']===null && $_GET['navegation'] == 5) {
            include 'src/view/login/form_inserirUsuario.php';
        }

        if($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 1){
            include 'src/view/painel_adm/painel_adm.php';
        }
        elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 2) {
            include 'src/view/categoria/form_categoria.php';
        }
        elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 3) {
            include 'src/view/livro/form_livro.php';
        }elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 4) {
            include 'src/view/aluguel/listarAlugueis.php';
        }elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 6) {
             include 'src/view/doacao/listarDoacoes.php';
        }elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 7) {
             include 'src/view/doacao/painel_doacao.php';
        }elseif ($_SESSION['email']==="admin@sistema" && $_GET['navegation'] == 8) {
             include 'src/view/doacao/listaLivroDoacao.php';
        }
        else{
            include 'src/catalogoLivros.php';
        }
        ?>
        
    </body>
</html>




