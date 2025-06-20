<?php
    require_once __DIR__ . "/../config/config.php";
    require __DIR__ . "/daoLivro.php";
    require_once __DIR__ . "/../classes/Categoria.php";

    class daoCategoria{
        private $conexao;

        public function __construct(mysqli $conn){
            $this->conexao = $conn;
        }

        public function insert(Categoria $c){
        $nome = $c->getNome();

        $stmt = $this->conexao->prepare("INSERT into Categoria(nome_categoria) values (?)");
        $stmt->bind_param('s', $nome);
        $stmt->execute(); 
        $stmt->close();
    }

        public function listaCategoria():array{
            $listaCategorias = [];
            $sqlQuery = "SELECT * FROM categoria ORDER BY id_categoria";
            $stmt = $this->conexao->prepare($sqlQuery);
            if (!$stmt) {
                die("Erro na preparação da consulta: " . $this->conexao->error);
            }
            $stmt->execute();
            $resultado = $stmt->get_result();
            while ($listaCategoria=mysqli_fetch_array($resultado)){
                $listaCategorias[] = $listaCategoria;
            }
            $stmt->close();
            return $listaCategorias;
        }

    }
    /*
    este = new daoCategoria($conexao);
    $categorias = $teste->listaCategoria();

    $dlivro = new daoLivro($conexao);
    $livros = $dlivro->buscarLivro(1);

    
    foreach ($livros as $livro){
        foreach ($categorias as $categoria){
            if ($categoria['id_categoria'] == $livro['id_categoria']){
                break;
            }else{
                    $categoria = "Categoria não cadastrada";
                }
        }
    }
    */
    