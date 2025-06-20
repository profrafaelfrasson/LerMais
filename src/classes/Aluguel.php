<?php

class Aluguel {
    private int $id_aluguel;
    private int $fk_id_usuario;
    private int $fk_id_livro;
    private DateTime $data_coleta;
    private int $dias_aluguel;


    public function __construct(int $id_aluguel, int $fk_id_usuario, int $fk_id_livro, int $qtd_aluguel, string $data_coleta, int $dias_aluguel) {
        $this->id_aluguel = $id_aluguel;
        $this->fk_id_usuario = $fk_id_usuario;
        $this->fk_id_livro = $fk_id_livro;
        $this->qtd_aluguel = $qtd_aluguel;
        $this->data_coleta = new DateTime($data_coleta);
        $this->dias_aluguel = $dias_aluguel;
    }

    public function getIdAluguel(): int {
        return $this->id_aluguel;
    }

    public function getFkIdUsuario(): int {
        return $this->fk_id_usuario;
    }

    public function getFkIdLivroAluguel(): int {
        return $this->fk_id_livro_aluguel;
    }

    public function getDataColeta(): DateTime {
        return $this->data_coleta;
    }

    public function getDiasAluguel(): int {
        return $this->dias_aluguel;
    }

    public function setFkIdUsuario(int $fk_id_usuario): void {
        $this->fk_id_usuario = $fk_id_usuario;
    }

    public function setFkIdLivroAluguel(int $fk_id_livro_aluguel): void {
        $this->fk_id_livro_aluguel = $fk_id_livro_aluguel;
    }

    public function setDataColeta(string $data_coleta): void {
        $this->data_coleta = new DateTime($data_coleta);
    }

    public function setDiasAluguel(int $dias_aluguel): void {
        $this->dias_aluguel = $dias_aluguel;
    }

    public function getDataDevolucao(): DateTime {
        $dataDevolucao = clone $this->data_coleta;
        $dataDevolucao->modify("+{$this->dias_aluguel} days");
        return $dataDevolucao;
    }

    public function setQtdAluguel(int $q): void {
        $this->qtd_aluguel = $q;
    }

    public function setFkLivro(int $l): void {
        $this->fk_id_livro = $l;
    }

    public function getqtdAluguel(): int {
        return $this->qtd_aluguel;
    }

    public function getFkLivro(): int {
        return $this->fk_id_livro;
    }




}

?>