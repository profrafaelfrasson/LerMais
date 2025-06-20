<?php

Class Usuario{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $contato;

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

    public function setEmail($i){
        $this->email = $i;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setSenha($i){
        $this->senha = $i;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setContato($i){
        $this->contato = $i;
    }

    public function getContato(){
        return $this->contato;
    }
}

?>