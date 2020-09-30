<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
       header('Location: paginainicial.php?erro=1');
    }
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
    
?>

<!doctype html>
<html lang="pt-br">
  <head>    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="estilos.css"> 
      
    <title>Ctrl+V</title>
  </head>
  <body background="blue">
   <div = class="container"> 
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
            <h4 class="card-text"><?= $_SESSION['usuario'] ?></h4>
            <br/>            
            <button type="submit" class="btn btn-light "><li><a href="sair.php">Sair</a></li></button>
        </div>        
      </div>
    </div>    
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <form method="post" action="inclui_codigo.php" id="codigocadastrar">
               <div clsas="form-group">
               <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Digite seu codigo aqui" required="requiored">
               <button type="submit" class="btn btn-info form-control" id="btncodigo">Postar</button>
               <?php                 
                      if($erro == 1){
                        echo "Erro ao postar o codigo";
                      }                 
               ?>                          
               </div>
          </form>             
              <button type="submit" class="btn btn-link"><li><a href="get_codigo.php">Mostrar meus Codigos</a></li></button>
        </div>
      </div>
    </div>
  </div> 
   
  </body>

</html>