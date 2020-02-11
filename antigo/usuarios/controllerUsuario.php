<?php 
include 'usuarios/modelUsuario.php';

//se clicou no botão
if (isset($_POST['login'])){
    
    $modelo = new ModelUsuario();

    
    $resultado = $modelo->autenticar( ($_POST['matricula']), ($_POST['senha']) );
    if(! empty($resultado) ){
      // redirecionar para aluno.php
      header("location: http://localhost/nsi/antigo/aluno.php"); 
    }
    
  
}
  
?>













