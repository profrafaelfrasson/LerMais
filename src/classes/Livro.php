<?php
class Livro{
        public array $testeArray = ["vazio","Ação","Romance","Ficção-Científica","Aventura","Fantasia"];
        private string $categoriaString;
        function __construct(
            public readonly string $nome,
            public readonly string $autor,
            public readonly INT $categoriaNum,
            private INT $quantidade,
            private string $capa,
            private string $descricao
        ){
           $this->categoriaString = $this->verificarCategoria($categoriaNum);
        }
        public function verificarCategoria($num):string{
           $countArray = count($this->testeArray);
            for($i = 1 ;$i<=$countArray-1;$i++){
                if($i == $num){
                    $categoria = $this->testeArray[$i];
                    break;
                }else{
                    $categoria = "Categoria não cadastrada";
                }
            }
            return $categoria;
        }
        public function getCategoria():int{
            return $this->categoriaNum;
        }  
        public function getQuantidade():int{
            return $this->quantidade;
        }   
        public function getNome():string{
            return $this->nome;
        }
        public function getAutor():string{
            return $this->autor;
        }

        public function setDescricao($d){
            $this->descricao = $d;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setCapa($c){
            $this->capa = $c;
        }

        public function getCapa(){
            return $this->capa;
        }

    }
?>