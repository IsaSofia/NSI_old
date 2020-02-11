<?php 
include("includes/conexao.php");//conexão com o banco

if(isset($_POST["registrar"])) {
    //Busca no banco a quantidade de usuarios que tenham a mesma matricula OU o mesmo email
    $querySelect = "SELECT * FROM usuario WHERE matricula = ?  OR email = ?";

     //prepara a query
    $consulta_registro = $connection->prepare($querySelect);

    $consulta_registro->bindValue(1, $_POST['matricula']);
    $consulta_registro->bindValue(2, $_POST['email']);
    $consulta_registro->execute();
    $total = $consulta_registro->rowCount();
   
    
    //Verificase o valor retornado é 0 (Nenhum usuário igual cadastrado)
 if($total == 0){
        $senha           = $_POST['senha'];
        $confirma_senha  = $_POST['confirma_senha'];
        if (empty($senha)) {
            echo "entrou aqui";
        } else if ($senha == $confirma_senha) {
            $query = "INSERT INTO usuario (nome, sobrenome, matricula, email, senha) 
                  VALUES (:nome, :sobrenome, :matricula, :email, :senha)";

            $statement = $connection->prepare($query);


            $valores = array();
            $valores[':nome'] = (isset($_POST['primeiroNome']) ? $_POST['primeiroNome'] : '');
            $valores[':sobrenome'] = (isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '');
            $valores[':matricula'] = (isset($_POST['matricula']) ? $_POST['matricula'] : '');
            $valores[':email'] = (isset($_POST['email']) ? $_POST['email'] : '');
            $valores[':senha'] = (isset($_POST['senha']) ? $_POST['senha'] : '');

            $result = $statement->execute($valores);
         
            if(!empty($result)){
                $mensagem = "<span class='aviso'><b>Sucesso</b>: deu certo!</span>";
                
            }
        } else {
             $mensagem = "<span class='aviso'><b>Aviso</b>: Senha e repetir senha são diferentes!</span>";
              
        }

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
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src="vendor/jquery/jquery.min.js"></script>
    
</head>

<body class="bg-dark" id="foto"style="background-image: url(img/logo.nsi.png);background-repeat:no-repeat;background-size: 18%;background-position: 36px 33px;;">
   <div class="container row " style="margin: 10% auto ;">
      <div class="card card-register mx-auto mt-5">
         <div class="card-header">Registrar</div>
            <div class="card-body">
               <form method="POST" action="registro.php" id="formulario"onsubmit="return validarSenha()"name="formulario">
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
            <div class="col-md-6" id="matricula">
               <label for="primeiroNome">Matrícula</label>
               <input type="text" class="form-control"  name="matricula" placeholder="Digite sua matrícula" required="required" autofocus="autofocus">
            </div>
            <div class="form-group">
               <label for="email">E-mail</label>
               <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required="required" autofocus="autofocus">
            </div>
            <div class="form-group">
               <div class="form-row">
                  <div class="col-md-6">
                     <label for="senha">Senha</label>
                     <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required="required" autofocus="autofocus">
                  </div>
                  <div class="col-md-6">
                     <label for="confirma_senha">confirmar senha</label>
                     <input type="password"  class="form-control" id="confirmaSenha" name="confirma_senha" placeholder="Confirme sua senha" required="required" autofocus="autofocus">
                  </div>
               </div>
            </div>
            <div>
               <input type="submit" class="btn btn-primary btn-block" name="registrar" id ="registra_se" value="Registra-se"/>
            </div>
            <div class="text-center">
               <a href="#" class="d-block small mt-3">Esqueceu sua senha?</a>
               <a href="login.php" class="d-block small mt-3">Login?</a>
            </div>
         </form>
      </div>
   </div>
</div>
    
<!-- Modal HTML Erro -->
<div id="myModalError" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Erro</h4>
         </div>
         <div class="modal-body">
            <p class="text-warning"><small>erro ao enviar formulário </small></p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Cancelar</button>
         </div>
      </div>
   </div>
</div>
<!-- Modal HTML Sucesso -->
<div id="myModalSucess" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Sucesso </h4>
         </div>
         <div class="modal-body">
            <p>Tarefas realizadas com sucesso. </p>
            <p class="text-warning"><small>Formulário enviado com sucesso</small></p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-success waves-effect waves-light" data-dismiss="modal">Fechar</button>
         </div>
      </div>
   </div>
</div>
    
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>