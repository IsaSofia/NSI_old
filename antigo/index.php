<?php
include("includes/conexao.php");//conexão com o banco
    //criei a query = $consulta
   $consulta = "SELECT denuncia.id, data, imagem ,denuncia.descricao, b.descricao as bloco_descricao, doq.descricao as oque_descricao, id_bloco, id_denuncia_oque, qual_descricao, u.matricula, nome, sobrenome FROM denuncia INNER JOIN usuario u ON u.id = denuncia.id_usuario INNER JOIN bloco b ON b.id = denuncia.id_bloco INNER JOIN denuncia_oque doq ON doq.id = denuncia.id_denuncia_oque";
   //prepara a query
   $con = $connection->prepare($consulta);
   //executar o comando sql
   $denuncia = $con->execute();
   //juntar todos os resultados do select em um vetor de arrays
   $denuncia = $con->fetchAll();
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
    <link rel="shortcut icon" href="img/logo.nise.png" type="image/x-icon" />


    <!-- Bootstrap core CSS-->
    <link type="text/css" rel="stylesheet"  href="css/sb-admin.min.css">
    <!-- Fontes personalizadas para este modelo css-->
    <link type="text/css" rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css" >
    <!-- Fontes personalizadas para este modelo css-->
    <link type="text/css" rel="stylesheet" href="css/sb-admin.css" >
    <link type="text/css" rel="stylesheet"  href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Page level plugin CSS-->
    <link type="text/css" rel="stylesheet" href="vendor/datatables/dataTables.bootstrap4.css" >
    <link type="text/css" rel="stylesheet" href="css/index.css">


  </head>
  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top" >
      <a class="navbar-brand mr-1" href="index.html">NSI</a>
      <ul class="navbar-nav ml-auto ml-md-12" >
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
            <span class="badge badge-danger">7</span>
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
            <a class="dropdown-item" href="registrarcoord.php">Registrar coordenadores</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
        </li>
      </ul>
    </nav>
    <!--Blocos de prioridades-->
    <div id="wrapper">
      <div id="content-wrapper">
        <div class="container-fluid" >
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">26 Total de mensagem!</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">11 Prioridades!</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">123 Prioridades!</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">13 Prioridades!</div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      <!--Fim dos Blocos de prioridades-->
          <!-- Grafico-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Gráfico de reclamações</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Atualizado ontem às 11:59 PM</div>
          </div>
        <!--Fim do grafico-->
          <!-- Dados da Denúncia-->
           <div class="card mb-3">
         <div id="wrapper">
      <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                        <th id="id_bd">Nº</th>
                        <th id="matricula">Matrícula</th>
                        <th id="nome">nome</th>
                        <th id="date">Data - horas</th>
                        <th id="comentario">Comentário</th>
                        <th id="imagem">Imagem</th>
                    </tr>
                  </thead>
                  
                    
                    
                    <?php  foreach ( $denuncia as $den   )  {  ?>
                    <tr>
                      <td> <?php echo $den["id"];?></td>
                      <td> <?php echo $den["matricula"];?></td>
                      <td> <?php echo $den["nome"]." ".$den["sobrenome"];?></td>
                           <?php $data = $den["data"];?>
                      <td> <?php echo date('d/m/Y H:i:s', strtotime($data));?></td>
                      <td> <?php echo "<b>".$den["bloco_descricao"]." - ".$den["oque_descricao"].": ".$den["qual_descricao"]." -</b> ".$den["descricao"];?></td>
                      <td  > <a href="#" class="abrirModal"> <img class='img_denuncia' src="img_denuncia/<?php echo $den["imagem"];?>"/> </a> </td>
                   
                    </tr>
                    <?php } ?>
                    

                  </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Atualizado ontem às 11:59 PM</div>
          </div>
      </div>
    </div>
          </div>
      <!--Fim do DADOS-->
        <footer class="sticky-footer sticky-footer col-0 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="container my-auto">
            <div class="copyright text-center my-auto ">
              <span>Copyright 2018 © NSI</span>
            </div>
          </div>
        </footer>
    <!-- Scroll to Top Button-->
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
      
      
<!-- Modal IMAGEMN DENUCIA -->
      <div class="modal-dialog">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Exemplo</h4>
      </div>
      <div class="modal-body text-center .row">
        <img src="" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
      </div>
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

      <script>
        $(".abrirModal").click(function() {
              var url = $(this).find("img").attr("src");
              $("#myModal img").attr("src", url);
              $("#myModal").modal("show");
        });
      </script>
	
  </body>

</html>
