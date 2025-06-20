<?php
    require_once __DIR__ . "/../config/config.php";

    class daoAluguel{
        private $conexao;
        private $daoLivro;

        public function __construct(mysqli $conn){
            $this->conexao = $conn;
        }

        

        public function insert(LivroAluguel $la){
            $id_usuario = $la->getIdUsuario();
            $id_livro = $la->getLivros();
            $dataColeta = $la->getDataColeta();
            $dias_alugados = $la->getDiasAluguel();
            $qtd_livro = $la->getQtdAluguel();
            $stmt = $this->conexao->prepare("INSERT into aluguel(fk_id_usuario, fk_id_livro, qtd_aluguel, data_coleta, dias_aluguel, flg_ativo)
            values (?, ?, ?, ?, ?, 'P')");
            $stmt->bind_param('iiisi', $id_usuario, $id_livro, $qtd_livro, $dataColeta, $dias_alugados);
            $stmt->execute(); 
            $stmt->close();
        }

        public function verificaStatus($i) {
        $stmt = $this->conexao->prepare("SELECT flg_ativo FROM aluguel WHERE id_aluguel = ?");
        $stmt->bind_param("i", $i);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($linha = $resultado->fetch_assoc()) {
            return trim($linha['flg_ativo']); 
        }

    return null;
    }

        public function listAlugueis() {
        $sql = "SELECT 
        usuario.nome_usuario AS nome_usuario, 
        aluguel.data_coleta, 
        aluguel.id_aluguel,
        livro.id_livro,
        livro.nome_livro,
        aluguel.qtd_aluguel
        FROM aluguel
        JOIN usuario ON aluguel.fk_id_usuario = usuario.id_usuario
        JOIN livro ON aluguel.fk_id_livro = livro.id_livro
        WHERE flg_ativo != 'N';;";
    
        $resultado = mysqli_query($this->conexao, $sql);

         $alugueis = [];

        if ($resultado) {
            while ($aluguel = mysqli_fetch_assoc($resultado)) {
            $alugueis[] = $aluguel;
        }
    }

    return $alugueis;
}

    public function listAlugueisByUsername($u) {
    $alugueis = [];

    $stmt = $this->conexao->prepare("
        SELECT usuario.nome_usuario, aluguel.data_coleta, aluguel.id_aluguel, livro.nome_livro, aluguel.qtd_aluguel, aluguel.data_coleta
        FROM aluguel
        JOIN usuario ON aluguel.fk_id_usuario = usuario.id_usuario
        JOIN livro ON aluguel.fk_id_livro = livro.id_livro
        WHERE flg_ativo != 'N' AND usuario.nome_usuario LIKE ?
    ");

    if ($stmt) {
        $param = "%" . $u . "%";
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $resultado = $stmt->get_result();

        while ($aluguel = $resultado->fetch_assoc()) {
            $alugueis[] = $aluguel;
        }

        $stmt->close();
    }

        return $alugueis;
    }
    public function listAlugueisPeloID($id) {
    $alugueis = [];

    $stmt = $this->conexao->prepare("
        SELECT aluguel.id_aluguel, livro.nome_livro, aluguel.qtd_aluguel, aluguel.flg_ativo, livro.capa_livro
        FROM `aluguel` 
        INNER JOIN usuario ON usuario.id_usuario = aluguel.fk_id_usuario 
        INNER JOIN livro ON livro.id_livro = aluguel.fk_id_livro 
        WHERE aluguel.flg_ativo <> 'N' AND aluguel.fk_id_usuario = ? 
        ORDER BY aluguel.id_aluguel;
    ");

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        while ($aluguel = $resultado->fetch_assoc()) {
            $alugueis[] = $aluguel;
        }

        $stmt->close();
    }

        return $alugueis;
    }

    public function baixarAluguel($i){
            $stmt = $this->conexao->prepare("UPDATE aluguel set flg_ativo = 'N' WHERE id_aluguel = ?");
            $stmt->bind_param('i', $i);
            $stmt->execute(); 
            $stmt->close();
    }

    public function efetivarAluguel($i){
            $stmt = $this->conexao->prepare("UPDATE aluguel set flg_ativo = 'S' WHERE id_aluguel = ?");
            $stmt->bind_param('i', $i);
            $stmt->execute(); 
            $stmt->close();
    }
}

