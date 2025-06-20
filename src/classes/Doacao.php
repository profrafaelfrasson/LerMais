<?php

Class Doacao{

    private int $id;
    private string $nome;
    private int $id_usuario;
    private string $autor;
    private int $quantidade;
    private string $descricao;


    public function __construct($nome,$id_usuario,$autor,$quantidade,$descricao){
        $this->nome = $nome;
        $this->id_usuario = $id_usuario;
        $this->autor = $autor;
        $this->quantidade = $quantidade;
        $this->descricao = $descricao;
    }


    public function getId() {
        return $this->id;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }


    public function getNome() {
        return $this->nome;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    

}

?>