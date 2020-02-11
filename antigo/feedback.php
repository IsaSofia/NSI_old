<?php 

if(!empty($_FILES['uploaded_file'])){
include("includes/conexao.php");//conexão com o banco
    
$query = "INSERT INTO feedback (nome, sobrenome, feedback_descricao, imagem) 
      VALUES (:nome, :sobrenome, :feedback_descricao, :imagem)";

    $statement = $connection->prepare($query);
    
$path = "img_denuncia/";
$path = $path . basename( $_FILES['uploaded_file']['name']);
if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))

 
$valores = array();
$valores[':nome'] = $_POST['PrimeiroNome'];
$valores[':sobrenome'] = $_POST['sobrenome'];
$valores[':feedback_descricao'] = $_POST['feedback_descricao'];
$valores[':imagem'] = $_FILES['uploaded_file']['name'];

    


     if($result = $statement->execute($valores)){

        echo 1; // dados enviados com sucesso

    }
    else {

        echo 0; // erro ao tentar enviar dados 

    }


    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
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
      <link rel="stylesheet" type="text/css" href="css/feedback.css">
   </head>
   <body class="bg-dark" id="foto"style="background-image: url(img/logo.nsi.png);background-repeat:no-repeat;background-size: 18%;background-position: 36px 33px;">
      <div class="container row " style="margin: 8% auto ;">
         <div class="card card-register mx-auto mt-5">
            <div class="card-header">Feedback</div>
            <div class="card-body">
               <form method="POST" action="feedback.php"  enctype="multipart/form-data" name="formulario">
                  <div class="form-group">
                     <div class="form-row">
                        <div class="col-md-6">
                           <label for="primeiroNome">Primeiro nome</label>
                           <input type="text" class="form-control" id="primeiroNome" name="PrimeiroNome" placeholder="Digite seu primeiro nome" required="required">
                        </div>
                        <div class="col-md-6">
                           <label for="Sobrenome">Sobrenome</label>
                           <input type="text" class="form-control" id="Sobrenome" name="sobrenome" placeholder="Digite seu Sobrenome" required="required" autofocus="autofocus">
                        </div>
                     </div>
                  </div>
                  <textarea   id="noresize" class="form-control col-12 col-sm-12 mb-12 col-md-12 col-lg-10 col-xl-12"  name="feedback_descricao" placeholder="Responda a denúncia aqui! " required="required" rows="12"></textarea>
                  <div id="botoes"class="row p-0 no-margin col-12 col-sm-12  col-md-12 col-lg-10 col-xl-12">
                     <div class="botao p-0 no-margin col-6 col-sm-6 mb-3 col-md-6 col-lg-2 col-xl-10">
                        <label class="file-upload btn btn-primary">
                        Escolha o arquivo... <input  type="file" name="uploaded_file"/ accept="image/*">
                        </label>  
                        <small class="form-text text-muted">Agradecemos seu feedback e sua ajuda para construirmos um site melhor.</small>
                     </div>
                     <div class="botao p-0 no-margin col-6 col-sm-6 mb-3 col-md-6 col-lg-10 col-xl-2 text-right ">
                        <input id="b_enviar" type="submit" class="btn btn-success" value="Enviar" name="enviar"/>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!--Tabela e índice JavaScript do núcleo do Bootstrap -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- JavaScript do plugin principal-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Plug-in de nível de página JavaScript-->
      <script src="vendor/chart.js/Chart.min.js"></script>
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Scripts personalizados para todas as páginas-->
      <script src="js/sb-admin.min.js"></script>

   </body>
</html>