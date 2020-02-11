<?php
include 'usuarios/usuario.php';

class ModelUsuario{

    public function adicionar(){
        include 'usuarios/bd.php';
            
        $query = "INSERT INTO usuarios (matricula, senha) 
              VALUES (:matricula, :senha)";

        $statement = $connection->prepare($query);

        $valores = array();
        $valores[':matricula'] = $usuario->getMatricula();
        $valores[':senha'] = $usuario->getSenha();
        

        $result = $statement->execute($valores);


    }
    
    public function editar(){
          
    }
    
    public function remover(){
        
    }
    
    
   public function autenticar($matricula, $senha){
        include 'usuarios/bd.php';
        
        
        $query = "SELECT nome, id FROM usuario WHERE matricula=:matricula and senha=:senha";
        
        
        $statement = $connection->prepare($query);
        
        $valores = array();
        $valores[':matricula'] = $matricula;
        $valores[':senha'] = $senha;
           

        $result = $statement->execute($valores);
        
      
        $result = $statement->fetchAll();
        
        
        
        return $result;
        
    }
    
    
  

}

?>