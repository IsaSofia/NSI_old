<?php 

include("includes/conexao.php");//conexão com o banco

$query = "INSERT INTO usuario (nome, sobrenome, matricula, email, senha) 
      VALUES (:nome, :sobrenome, :matricula, :email, :senha)";

$statement = $connection->prepare($query);


$valores = array();
$valores[':nome'] = (isset($_POST['primeiroNome']) ? $_POST['primeiroNome'] : '');
$valores[':sobrenome'] = (isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '');
$valores[':matricula'] = (isset($_POST['matricula']) ? $_POST['matricula'] : '');
$valores[':email'] = (isset($_POST['email']) ? $_POST['email'] : '');
$valores[':senha'] = (isset($_POST['senha']) ? $_POST['senha'] : '');


if($_POST) {
    //Busca no banco a quantidade de usuarios que tenham a mesma matricula OU o mesmo email
    $querySelect = "SELECT count(*)total FROM usuarios WHERE matricula = {$valores[':matricula']} or email = {$valores[':email']}";

    //Executa a query
    $check = $connection->prepare($querySelect);

    //Obtem o resultado
    $result = $check->fetch(PDO::FETCH_ASSOC);

    //Verificase o valor retornado é 0 (Nenhum usuário igual cadastrado)
    if($result['total'] == 0){

        $senha           = $_POST['senha'];
        $confirma_senha  = $_POST['confirma_senha'];
        if ($senha == "") {
            $mensagem = "<span class='aviso'><b>Aviso</b>: Senha não foi alterada!</span>";
        } else if ($senha == $confirma_senha && $statement->execute($valores)) {


        } else {

        }

    }else{
        $mensagem = "<span class='aviso'><b>Erro</b>: Email ou matricula ja cadastrado!</span>";
    }

}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8 ini_set('default_charset', 'UTF-8')">
    <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
    <title>Núcleo de Informação e Sugestão Estudantil</title>
    <link rel="shortcut icon" href="img/logo.nise.png" type="image/x-icon"/> 
    
    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
    <!-- Fontes personalizadas para este modelo css-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Estilos personalizados para este modelo-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
    <!-- Estilos personalizados para este modelo-->
    <link rel="stylesheet" type="text/css" href="css/registro.css">
    <link rel="stylesheet"type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/components/segment.min.css">
    
</head>
    
    
    <script> 
        function validarSenha(){
        senha = document.formulario.senha.value
        confirma_senha = document.formulario.confirma_senha.value
        if (senha == confirma_senha){
            alert("Usuário cadastrado com sucesso!!")
            return true;
            
            
        }
        else{ 
            alert("As Senha não correspondem!!")
            return false;
        }
    }
   </script>
    
<body class="bg-dark" id="foto"style="background-image: url(img/logo.nsi.png);background-repeat:no-repeat;background-size: 18%;background-position: 36px 33px;">
   <div class="container row " style="margin: 10% auto ;">
   <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registrar</div>
      <div class="card-body">
         <form method="POST" action="registro.php" onsubmit="return validarSenha()"name="formulario">
            <div class="form-group">
               <div class="form-row">
                  <div class="col-md-6">
                     <label for="primeiroNome">Primeiro nome</label>
                     <input type="text" class="form-control" id="primeiroNome" name="primeiroNome" placeholder="Digite seu primeiro nome" required="required">
                  </div>
                  <div class="col-md-6">
                     <label for="Sobrenome">Sobrenome</label>
                     <input type="text" class="form-control" id="Sobrenome" name="sobrenome" placeholder="Digite seu Sobrenome" required="required" autofocus="autofocus">
                  </div>
               </div>
            </div>
            <div>
               <input type="submit" class="btn btn-primary btn-block" value="Registra-se"/>
            </div>
         </form>
      </div>
   </div>
</div>
<script src="bibliotecas/jquery/jquery.min.js"></script>
<script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="bibliotecas/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>