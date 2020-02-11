<?php  
include 'usuarios/controllerUsuario.php';


?>				

<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Núcleo de Informação e Sugestão Estudantil</title>
    <link rel="shortcut icon" href="img/NSI.png" type="image/x-icon" />

    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" type="text/css" href="css/sb-admin.min.css">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
    <!--CSS da caixa de login-->
    <link rel="stylesheet" type="text/css" href="css/login.css">
   

  </head>
    <script>
    $.post('controller.php', function (acesso){

         if(acesso === 'permitido')
         {

            window.location.href = 'aluno.php';

         }

         if(acesso === 'negado')
         {

            alert('acesso negado');  

         }

        });
        </script>
<body class="bg-dark" style="background-image: url(img/logo.nsi.png);background-repeat:no-repeat;background-size: 18%;background-position: 36px 33px;">
    <div class="container row" id="caixa_login" > 
	<!-- resposivo para dispositivos extra pequeno para extra grande-->
        <div class="card card-login mx-auto mt-5 col-11 col-sm-10 col-md-8 col-lg-5 col-xl-4">
        <div class="card-header ">Login</div>
        <div class="card-body">
          <form  method="POST" action ="login.php" name="for">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="matricula" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Matrícula</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword"   name="senha" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Senha</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Lembrar senha
                </label>
              </div>
            </div>
                  <button type="submit" class="btn btn-primary btn-block" href="aluno.php" name="login">Login</button> 
                    <a href="registro.php" id="cadastro" class="d-block small mt-3">Cadastrar</a>
          </form>

          </div>
        </div>
      </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
