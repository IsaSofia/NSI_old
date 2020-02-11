<?php 
    class Usuario{
        private $id;
        private $nome;
        private $matricula;
        private $senha;
        private $aluno;
        private $moderador;
        private $tec_adm;
        
        public function getId(){
            return $this->id;
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getMatricula(){
            return $this->matricula;
        }
        
        
        public function getSenha(){
            return $this->senha;
        }
        
        
        public function getAluno(){
            return $this->aluno;
        }
        
        
        public function getModerador(){
            return $this->moderador;
        }
        
        public function getTec_adm(){
            return $this->tec_adm;
        }
        
        
        
        public function setId($a){
             $this->id = $a;
        }
        
        public function setNome($a){
             $this->nome = $a;
        }
      
        public function setMatricula($a){
             $this->matricula = $a;
        }
        
        public function setSenha($a){
             $this->senha = $a;
        }
         public function setAluno($a){
             $this->aluno = $a;
        }
          public function setModerador($a){
             $this->moderador = $a;
        }
          public function setTec_adm($a){
             $this->tec_adm = $a;
        }
        
       
    }

?>