<?php
require __DIR__ . "/../config/config.php";

class daoDoacao{
    private $conexao;

    public function __construct(mysqli $conexao) {
            $this->conexao = $conexao;
        }
    
    public function insert(Doacao $d){
        $nome = $d->getNome();
        $id_usuario= $d->getIdUsuario();
        $autor = $d->getAutor();
        $descricao = $d->getDescricao();
        $quantidade = $d->getQuantidade();

        $stmt = $this->conexao->prepare("INSERT into doacao(nome_livro, fk_id_usuario, autor_livro, qtd_doacao, descricao, flg_status) values (?, ?, ?, ?, ?, 'P')");
        $stmt->bind_param('sisis', $nome,$id_usuario, $autor, $quantidade, $descricao);
        $stmt->execute(); 
        $stmt->close();
        }

        public function listarDoacoes() {
            $sql = "SELECT 
                        d.id_doacao,
                        u.nome_usuario AS usuario,
                        d.nome_livro,
                        d.autor_livro,
                        d.qtd_doacao,
                        d.descricao
                        FROM Doacao d
                        JOIN Usuario u ON d.fk_id_usuario = u.id_usuario
                        WHERE flg_status = 'P';";
            $resultado = mysqli_query($this->conexao, $sql);
            $doacoes = [];
            while ($doacao = mysqli_fetch_assoc($resultado)) {
                $doacoes[] = $doacao;
            }
            return $doacoes;
        }   


        public function listarDoacoesPorUsuario($nome) {
        $sql = "SELECT 
                d.id_doacao,
                u.nome_usuario AS usuario,
                d.nome_livro,
                d.autor_livro,
                d.qtd_doacao,
                d.descricao
            FROM Doacao d
            JOIN Usuario u ON d.fk_id_usuario = u.id_usuario
            WHERE d.flg_status = 'P' AND u.nome_usuario LIKE ?";
    
        $stmt = $this->conexao->prepare($sql);
        $param = '%' . $nome . '%';
        $stmt->bind_param('s', $param);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $doacoes = [];
        while ($doacao = $resultado->fetch_assoc()) {
        $doacoes[] = $doacao;
    }
    
    $stmt->close();
    return $doacoes;
}

        public function baixarDoacao($i){
            $stmt = $this->conexao->prepare("UPDATE doacao SET flg_status = 'N' where id_doacao = ?");
            $stmt->bind_param('i', $i);
            $stmt->execute(); 
            $stmt->close();
        }


}


?>