<?php 
    include 'controllerUser.php';
?>				
<!DOCTYPE html>
<html> 
	<head>
            <meta charset="UTF-8">
    
        <link href="css/bootstrap.min.css" rel="stylesheet" >
        
        
        <link href="css/meuestilo.css" rel="stylesheet">
    </head>
	<body>
	   <div class="container-fluid">
        <form method="POST" action ="index.php">
          
            
        <!-- CAMPO first name -->    
        <div class="form-group">
            <label for="first_name">Primeiro nome:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="firstNameHelp" placeholder="Digite seu primeiro nome">
            <small id="firstNameHelp" class="form-text text-muted">Preencha apenas com primeiro nome.</small>
          </div>
            
        <!-- CAMPO last name -->    
        <div class="form-group">
            <label for="last_name">Último nome:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="lastNameHelp" placeholder="Digite seu último nome">
            <small id="lastNameHelp" class="form-text text-muted">Preencha apenas com último nome.</small>
          </div>
            
        <!-- CAMPO EMAIL -->    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite email">
            <small id="emailHelp" class="form-text text-muted">Não compartilhe e-mail com ninguém.</small>
          </div>
            
            
            
            <!-- SENHA -->
          <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3" name="password" id="password" placeholder="Senha">
          </div>
            
            
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
            
          <button type="submit" class="btn btn-danger" name="cadastrar" >Cadastrar</button>
        </form>
        
        
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      
    <?php /** //jeito $%@$@% de fazer
            for($i = 0; $i < 20; $i++)  {  ?>
        <tr>
          <th scope="row"><?php echo $usuarios[$i]["id"];   ?></th>
          <td><?php echo $usuarios[$i]
   ["first_name"]." ".$usuarios[$i]
   ["last_name"];   ?></td>
          <td> <?php echo $usuarios[$i]
       ["email"];?>  </td>
          <td>@mdo</td>
        </tr>
      <?php }**/ ?>
      
      
    <?php  foreach (  $usuarios as $u )  {  ?>
        <tr>
          <th scope="row"><?php echo $u["id"];   ?></th>
          <td><?php echo $u["first_name"]." ".$u["last_name"];   ?></td>
          <td> <?php echo $u["email"];?>  </td>
          <td>@mdo</td>
        </tr>
      <?php } ?>
      
      
  </tbody>
</table>
           
        </div>
	</body>    
</html>





