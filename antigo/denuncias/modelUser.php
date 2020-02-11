<?php
include 'user.php';

class ModelUser{

    public function adicionar(User $user){
        include 'bd.php';
            
        $query = "INSERT INTO users (first_name, last_name,email, password, image) 
              VALUES (:first_name, :last_name, :email, :password, :image)";

        $statement = $connection->prepare($query);

        $valores = array();
        $valores[':first_name'] = $user->getFirstName();
        $valores[':last_name'] = $user->getLastName();
        $valores[':email'] = $user->getEmail();
        $valores[':password'] = $user->getPassword();
        $valores[':image'] = $user->getImage();

        $result = $statement->execute($valores);

        if(  empty($result) ){
          print "<br>Nao inseriu";
          print_r(  $statement->errorInfo()  );
        }else{
          print "<br>Deu certo inserir";
        }

    }
    
    
    public function editar(){
        
    }
    
    
    public function listar(){
        include 'bd.php';//criei a conexao
        
        //criei a query
        $query = "SELECT id, first_name, last_name, email, image FROM users order by id DESC LIMIT 20";
        
        //prepara a query
        $statement = $connection->prepare($query);
        
        //executar o comando sql
        $result = $statement->execute();
        
        //juntar todos os resultados do select em um vetor de arrays
        $result = $statement->fetchAll();
        
       /** $u = $result[0];
        echo $u['id']; //vai mostrar 1086
        echo $u['first_name']; //vai mostrar shara
        
        $u = $result[1];
        echo $u['id']; //vai mostrar 1086
        echo $u['first_name']; //vai mostrar shara
        **/
        if(  empty($result) ){
          print "<br>Nao listou";
          print_r(  $statement->errorInfo()  );
        }else{
          print "<br>Deu certo listar";
        }
        
        return $result;
        
    }
    
    
    public function remover(){
        
    }
    
    


}

?>