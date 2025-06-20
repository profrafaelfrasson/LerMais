<?php
    require __DIR__ . "/../config/config.php";

    class DaoLivro {
        private $conexao;

        public function __construct(mysqli $conexao) {
            $this->conexao = $conexao;
        }

        public function insert(Livro $l){
        $nome = $l->getNome();
        $autor = $l->getAutor();
        $categoria = $l->getCategoria();
        $quantidade = $l->getQuantidade();
        $descricao = $l->getDescricao();
        $capa = $l->getCapa();

        $stmt = $this->conexao->prepare("INSERT into livro(nome_livro, autor_livro, estoque_livro, fk_id_categoria, descricao, capa_livro) values (?, ?, ?, ?,?, ?)");
        $stmt->bind_param('ssiiss', $nome, $autor, $quantidade, $categoria,$descricao,$capa);
        $stmt->execute(); 
        $stmt->close();
        }

        public function listarLivros() {
            $sql = "SELECT livro.id_livro, livro.autor_livro, livro.nome_livro, livro.estoque_livro, categoria.nome_categoria, livro.capa_livro FROM livro
            JOIN 
            categoria ON livro.fk_id_categoria = categoria.id_categoria WHERE livro.estoque_livro > 0
            ORDER BY 
            livro.nome_livro; ";
            $resultado = mysqli_query($this->conexao, $sql);
            $livros = [];
            while ($livro = mysqli_fetch_assoc($resultado)) {
                $livros[] = $livro;
            }
            return $livros;
        }       
        public function buscarLivro($id) {
            $livro=[];
            $sql = "SELECT * FROM categoria WHERE id_categoria = ?";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $livro[] = mysqli_fetch_assoc($resultado);
            $stmt->close();
            return $livro;
        }

        public function buscarLivroPorNome($n) {
        $livros = [];
        $sql = "SELECT * FROM livro WHERE nome_livro LIKE ?";
        $stmt = $this->conexao->prepare($sql);
        

        $nome = "%" . $n . "%";
        $stmt->bind_param("s", $nome);
        $stmt->execute();
        $resultado = $stmt->get_result();
        while ($l = $resultado->fetch_assoc()) {
            $livros[] = $l;
        }
        
        $stmt->close();
        return $livros;
}

        public function saidaEstoque($qtd,$id){
            $stmt = $this->conexao->prepare("UPDATE livro SET estoque_livro = estoque_livro - ? WHERE id_livro = ?");
            $stmt->bind_param('ii', $qtd, $id);
            $stmt->execute(); 
            $stmt->close();
        }

        public function entradaEstoque($qtd,$id){
            $stmt = $this->conexao->prepare("UPDATE livro SET estoque_livro = estoque_livro + ? WHERE id_livro = ?");
            $stmt->bind_param('ii', $qtd, $id);
            $stmt->execute(); 
            $stmt->close();
        }


    }