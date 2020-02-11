<?php 
    class User{
        private $first_name;
        private $last_name;
        private $email;
        private $password;
        private $image;
        private $id;
        
        public function getFirstName(){
            return $this->first_name;
        }
        
        
        public function getLastName(){
            return $this->last_name;
        }
        
        
        public function getEmail(){
            return $this->email;
        }
        
        
        public function getPassword(){
            return $this->password;
        }
        
        
        public function getImage(){
            return $this->image;
        }
        
        public function getId(){
            return $this->id;
        }
        
        
        
        public function setFirstName($a){
             $this->first_name = $a;
        }
        
        public function setLastName($a){
             $this->last_name = $a;
        }
        
        public function setEmail($a){
             $this->email = $a;
        }
        public function setPassword($a){
             $this->password = $a;
        }
        
        public function setImage($a){
             $this->image = $a;
        }
    }

?>