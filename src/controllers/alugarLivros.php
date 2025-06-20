<?php
    session_start(); 
    $sacola = $_SESSION['sacola'] ?? [];
    $qtdSacola = count($sacola);       
    require_once __DIR__ . "../../classes/LivroAluguel.php";
    require __DIR__ . "/../dao/daLivroAluguel.php";
    require __DIR__ . "/../dao/daoLivro.php";

        $fk_id_usuario = $_POST['id_usuario'];
        foreach ($_SESSION['livros'] as $livro){
            $fk_id_livro[] = $livro;
        }
        foreach ($_SESSION['quantidade'] as $livroqtd){
            $qtd_livro[] = $livroqtd;
        }
        var_dump($fk_id_livro);echo "<br>";
        var_dump($fk_id_usuario);echo "<br>";
        var_dump($qtd_livro);echo "<br>";
        $data_coleta = date('d-m-Y');
        var_dump($data_coleta);
        $daoAluguel = new daoAluguel($conexao);
        $daoLivro = new DaoLivro($conexao);

        if (!$fk_id_usuario || !$fk_id_livro || !$data_coleta) {
            header("Location: ../../index.php?navegation=1&&verificacao=sim&&tipo=todos&&error=missing_data");
            exit();
        }else{
            for ($i=0; $i < $qtdSacola ; $i++) { 
                    $aluguel = new LivroAluguel(
                            $fk_id_usuario,
                            $data_coleta,
                            $fk_id_livro[$i],
                            $qtd_livro[$i]
                        );
                            $daoAluguel->insert($aluguel);  
                            $daoLivro->saidaEstoque($qtd_livro[$i],$fk_id_livro[$i]);      
            }
            unset($_SESSION['sacola']);
            header("Location: ../../index.php?navegation=1&&verificacao=sim&&tipo=todos");
            exit();
        }
