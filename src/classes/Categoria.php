<?php

Class Categoria{

    private int $id;

    public function __construct
    (
        private string $nome
    ){
    }

    public function setId($i){
        $this->id = $i;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($i){
        $this->nome = $i;
    }

    public function getNome(){
        return $this->nome;
    }

}

?>