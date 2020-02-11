<?php 
    class Denuncia{
        private $id;
        private $descricao;
        private $id_usuario;
        private $imagem;
        private $onde;
        private $id_bloco;
        private $id_denuncia_oque;
        
        
        public function getId(){
            return $this->id;
        }
        
        
        public function getDescricao(){
            return $this->descricao;
        }
        
        
        public function getId_usuario(){
            return $this->id_usuario;
        }
        
        
        public function getImagem(){
            return $this->imagem;
        }
        
        
        public function getOnde(){
            return $this->onde;
        }
        
        public function getId_bloco(){
            return $this->id_bloco;
        }
        public function getId_denuncia_oque(){
            return $this->id_denuncia_oque;
        }
        
        #Fim dos GET---------------------------
        
        public function setId(){
            return $this->id;
        }
        
        
        public function setDescricao(){
            return $this->descricao;
        }
        
        
        public function setIdUsuario(){
            return $this->id_usuario;
        }
        
        
        public function setImagem(){
            return $this->imagem;
        }
        
        
        public function setOnde(){
            return $this->onde;
        }
        
        public function setIdBloco(){
            return $this->id_bloco;
        }
        public function setId_denunciaBoque(){
            return $this->id_denuncia_oque;
        }
    }

?>