<?php
    require_once __DIR__ . "/../config/config.php";
    class daoAluguel{
        private $conexao;
        public function __construct(mysqli $conn){
            $this->conexao = $conn;
        }
        public function insert(LivroAluguel $la){
            $nome = $la->getIdUsuario();
            $livros = $la->getLivros();
            $dataColeta = $la->getDataColeta();
            $dataDevolucao = $la->getDataDevolucao();

            $stmt = $this->conexao->prepare("INSERT into aluguel(fk_id_usuario, fk_id_livro, data_coleta, dias_alugel)
            values (?, ?, ?, ?)");
            $stmt->bind_param('iiss', $nome, $livros, $dataColeta, $dataDevolucao);
            $stmt->execute(); 
            $stmt->close();
        }
    }

    