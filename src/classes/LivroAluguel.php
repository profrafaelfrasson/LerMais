<?php 
    class LivroAluguel{
        private string $data_devolucao;
        private int $dias_aluguel = 7;
        public function __construct(
            public readonly string $id_usuario,
            public readonly string $data_coleta,
            private int $livros,
            private int $qtd_aluguel 
        ){
            $this->data_devolucao = $this->dataDevolver($this->data_coleta, $this->dias_aluguel);
        }
        public function dataDevolver($data_coleta, $dias_alugel):string{
            $data = new DateTime($data_coleta);
            $data->modify("+$dias_alugel days");
            return $data->format('d-m-Y');
        }
        public function getDataDevolucao():string{
            return $this->data_devolucao;
        }   
        public function getLivros():int{
            return $this->livros;
        }   
        public function getIdUsuario():string{
            return $this->id_usuario;
        }
        public function getDataColeta():string{
            return $this->data_coleta;
        }
        public function getDiasAluguel():int{
            return $this->dias_aluguel;
        }
        public function getQtdAluguel():int{
            return $this->qtd_aluguel;
        }

    }