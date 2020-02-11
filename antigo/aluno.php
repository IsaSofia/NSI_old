<?php 
include("includes/conexao.php");//conexão com o banco

if(!empty($_POST['enviar'])){

    $query = "INSERT INTO denuncia (descricao, imagem, id_usuario, qual_descricao,id_bloco, id_denuncia_oque) 
          VALUES (:descricao, :imagem, :id_usuario, :qual_descricao, :id_bloco, :id_denuncia_oque)";

    $statement = $connection->prepare($query);
     
    $nome_imagem = 'padrao.jpg';
    if(!empty($_FILES['uploaded_file']['name'])){
      $path = "img_denuncia/";
      $path = $path . basename( $_FILES['uploaded_file']['name']);
      if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path));

      $nome_imagem = $_FILES['uploaded_file']['name'];

    }
    
    
    $valores = array();
    $valores[':descricao'] = $_POST['descricao_denuncia'];
    $valores[':imagem'] = $nome_imagem;
    $valores[':id_usuario'] = 112;
    $valores[':qual_descricao'] = $_POST['qual_descricao'];
    $valores[':id_bloco'] = $_POST['bloco_denuncia'];
    $valores[':id_denuncia_oque'] = $_POST['id_denuncia_oque'];
    
    //var_dump($_POST);
        
    if(!isset($_POST['descricao_denuncia']) or empty($_POST['descricao_denuncia']) 
    or !isset($_POST['qual_descricao']) or empty($_POST['qual_descricao']) 
    or !isset($_POST['bloco_denuncia']) or empty($_POST['bloco_denuncia']) 
    or !isset($_POST['id_denuncia_oque']) or empty($_POST['id_denuncia_oque'])) {



        echo 0;

    } elseif($result = $statement->execute($valores)){

        echo 1; // dados enviados com sucesso

    }
    else {

        echo 0; // erro ao tentar enviar dados 

    }

}else{
    
// Lista dados da tabela bloco
    
    //criei a query = $consulta_bloco
    $consulta_bloco = "Select id as bloco_id, descricao as bloco_descricao FROM bloco";
    //prepara a query
    $con_bloco = $connection->prepare($consulta_bloco);
    //executar o comando sql
    $bloco = $con_bloco->execute();
    //juntar todos os resultados do select em um vetor de arrays
    $bloco = $con_bloco->fetchAll();
    
    
// Lista dados da tabela denuncia_oque
    
    //criei a query = $consulta_bloco
    $consulta_denuncia_oque = "Select id as den_id, descricao as den_descricao FROM denuncia_oque";
    //prepara a query
    $con_den_oque = $connection->prepare($consulta_denuncia_oque);
    //executar o comando sql
    $den_oque = $con_den_oque->execute();
    //juntar todos os resultados do select em um vetor de arrays
    $den_oque = $con_den_oque->fetchAll();
    

}
?>
<!DOCTYPE html>
<html lang="pt-br">
    

  <head>

    <meta charset="utf-8 ini_set('default_charset', 'UTF-8')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Núcleo de Informação e Sugestão Estudantil</title>
    <link rel="shortcut icon" href="img/logo.nise.png" type="image/x-icon"  />
    
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet"  href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!--Css da caixa de texto-->
    <link rel="stylesheet" href="css/aluno.css">

  </head>
   
    <script src="vendor/jquery/jquery.min.js"></script>
        <script>

        </script>
  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top" >
      <a class="navbar-brand mr-1" href="aluno.php">NSI</a>
      <ul class="navbar-nav ml-auto ml-md-12">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
        </li>
      </ul>
    </nav>
    <!--Começo dos blocos-->
    <div id="wrapper">
      <div id="content-wrapper">
        <div class="container-fluid" >
          <div id="row"class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden ">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">Ultima denúncia!</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">Mais comentados: Bloco 3 </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">Resolvendo!</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">Resolvido!</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
      <!--Fim dos blocos-->
        <!--Caixa de texto-->
         <form id="caixa" class="center-block row col-xl-6" enctype="multipart/form-data" name="formulario"  method="POST" action="aluno.php">
   <br>
   <div class="row p-0 no-margin col-12 col-sm-12  col-md-12 col-lg-10 col-xl-12" >
      <div class="form-group">
         <label for="sel1">Bloco:</label>
         <?php?>
         <select class="form-control " name="bloco_denuncia" id="bloco" required="required" placeholder="ex: Bloco 3" >
            <option value="" disabled selected>Ex: Computação</option>
            <?php  foreach ( $bloco as $bloco   )  {  ?>                    
            <option value="<?php echo $bloco['bloco_id']; ?>"> <?php echo $bloco['bloco_descricao']; ?> </option>
            <?php }?>
         </select>
      </div>
      <div class="form-group">
         <label for="sel1">O que:</label>
         <select select="required" class="form-control" name="id_denuncia_oque" id="sel1" required="required" >
            <option value="" disabled selected>Ex: Laboratório</option>
            <?php  foreach ( $den_oque as $den   )  {  ?>                    
            <option value="<?php echo $den['den_id']; ?>"> <?php echo $den['den_descricao']; ?> </option>
            <?php }?>
         </select>
      </div>
      <div class="form-group">
         <label for="usr">Qual:</label>
         <input type="text" class="form-control" id="usr" name="qual_descricao" placeholder="Ex: Lab" required="required" >
      </div>
   </div>
   <textarea id="noresize" class="form-control col-12 col-sm-12 mb-12 col-md-12 col-lg-10 col-xl-12 " name="descricao_denuncia" placeholder="Faça sua denúncia aqui... " rows="13" required="required" autofocus="autofocus"></textarea>
   <br>
   <div id="botoes" class="row p-0 no-margin col-12 col-sm-12  col-md-12 col-lg-10 col-xl-12">
      <div class="botao p-0 no-margin col-6 col-sm-6 mb-3 col-md-6 col-lg-2 col-xl-10">
         <label class="file-upload btn btn-primary">
         Escolha o arquivo... <input  type="file" name="uploaded_file" accept="image/png, image/jpeg">
         </label>  
         <small class="form-text text-muted">As suas mensagens não serão totalmente anônimas.</small>
      </div>
      <div class="botao p-0 no-margin col-6 col-sm-6 mb-3 col-md-6 col-lg-10 col-xl-2 text-right ">
         <input type="hidden" name="enviar" value="enviar"/>
         <input id="b_enviar" type="submit" class="btn btn-success" value="Enviar"/>
      </div>
   </div>
</form>
<br>
<!--Fim da caixa-->
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
<footer class="sticky-footer sticky-footer col-0 col-sm-12 col-md-12 col-lg-12 col-xl-12">
   <div class="container my-auto">
      <div class="copyright text-center my-auto ">
         <span>Copyright 2018 © NSI</span>
      </div>
   </div>
</footer>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Encerrar Sessão</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">Deseja sair?</div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="login.php">Sair</a>
         </div>
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
<!-- Scripts de demonstração para esta página-->
<script src="js/demo/datatables-demo.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<!--Script do modal-->
<script src="js/aluno.js"></script>
    

  </body>
    
</html>


