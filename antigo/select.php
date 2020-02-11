<?php 

include("includes/conexao.php");//conexão com o banco

if(isset($_POST["registrar"])) {
    //Busca no banco a quantidade de usuarios que tenham a mesma matricula OU o mesmo email
    $querySelect = "SELECT * FROM usuario WHERE matricula = ?  OR email = ?";

     //prepara a query
    $statement = $connection->prepare($querySelect);

    $statement->bindValue(1, $_POST['matricula']);
    $statement->bindValue(2, $_POST['email']);
    $statement->execute();
    $total = $statement->rowCount();
    
    //Verificase o valor retornado é 0 (Nenhum usuário igual cadastrado)
 if($total == 0){
        $senha           = $_POST['senha'];
        $confirma_senha  = $_POST['confirma_senha'];
        if (empty($senha)) {
            $mensagem = "<span class='aviso'><b>Aviso</b>: Senha não foi alterada!</span>";
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
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
      <link rel="stylesheet"  href="vendor/bootstrap/css/bootstrap.min.css">
      <!-- Page level plugin CSS-->
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!--Css da caixa de texto-->
      <link rel="stylesheet" href="css/select.css">
   </head>
   <body class="bg-dark" id="foto"style="background-image: url(img/logo.nsi.png);background-repeat:no-repeat;background-size: 18%;background-position: 36px 33px;;">
      <div class="row p-0 no-margin col-12 col-sm-12  col-md-12 col-lg-10 col-xl-12" id="select_user">
         <div class="packages-content row p-0 no-margin col-12 col-sm-12  col-md-12 col-lg-10 col-xl-2" id="user">
               <div class="single-package-item">
                  <img src="vendor/fontawesome-free/svgs/solid/user.svg" id="user_foto">
                  <div class="single-package-item-txt">
                     <br>
                     <h3 id="nome_aluno">Aluno</h3>
                     <div class="about-btn">
                     </div>
                  </div>
               </div>
            </div>
         <div class="packages-content row p-0 no-margin col-12 col-sm-12  col-md-12 col-lg-10 col-xl-2" id="user">
               <div class="single-package-item">
                  <img src="vendor/fontawesome-free/svgs/solid/user-tie.svg" id="user_foto">
                  <div class="single-package-item-txt">
                     <br>
                     <h3 id="user_nome">Coordenadores</h3>
                     <div class="about-btn">
                     </div>
                  </div>
               </div>
            </div>
         <div class="packages-content row p-0 no-margin col-12 col-sm-12  col-md-12 col-lg-10 col-xl-2" id="user">
               <div class="single-package-item">
                  <img src="vendor/fontawesome-free/svgs/solid/user-cog.svg" id="foto_tecn">
                  <div class="single-package-item-txt">
                     <br>
                     <h3 id="nome_tecn">Técnico administrativo</h3>
                     <div class="about-btn">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!--- Start Carousel -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="d-block w-100 img-fluid img-slider" src="img/aa.jpg" alt="Seleção brasileira">
               <div class="carousel-caption" >
                  <h2 style="color:white;font-size: 40px"><b>@@</b></h2>
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100 img-fluid img-slider" src="img/aa.jpg" alt="Comidas típicas">
               <div class="carousel-caption">
                  <h2 style="color:black;font-size: 40px;"><b>@@</b></h2>
                  <p>...</p>
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100 img-fluid img-slider" src="img/aa.jpg" alt="Comidas típicas">
               <div class="carousel-caption">
                  <h2 style="color:white;font-size: 40px"><b>@@</b></h2>
                  <p>...</p>
               </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100 img-fluid img-slider" src="img/aa.jpg" alt="Third slide">
               <div class="carousel-caption">
                  <h2 style="color:white;font-size: 40px;"><b>@@</b></h2>
                  <p>...</p>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
      </div>
      <!--- End of Carousel -->
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