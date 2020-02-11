<?php 
include 'modelUser.php';

//se clicou no botão
if (isset($_POST['cadastrar'])){
    
    $modelo = new ModelUser();

    //criar objeto da classe 
    $user = new User();
    //preenche o objeto com os dados do formulário
    $user->setFirstName($_POST['first_name']);
    $user->setLastName($_POST['last_name']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setImage('imagem');

    //chama a função adicionar do modelo para adicionar o usuario
    $modelo->adicionar($user);
}
  
//listar usuario em uma tabela
$modelo= new ModelUser(); 
$listadeusuarios = $modelo->listar();

var_dump($usuarios);


?>













