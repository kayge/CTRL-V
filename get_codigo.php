<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('bd.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new bd();
	$link = $objDb->conecta_mysql();


	$sql = "SELECT  DATE_FORMAT(t.data_inclusao,'%d %b %Y %T') AS data_inclusao,t.cd, u.usuario FROM codigos AS t JOIN usuario AS u ON(t.id_usuario = u.id) WHERE id_usuario = $id_usuario  ORDER BY data_inclusao DESC";


	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){

		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			   echo '<a class="list-group-item" >';
			        echo '<h4 class="list-group-item-heading">'.$registro['usuario'].'-'.$registro['data_inclusao'].'<h4>';
			        echo '<p class="list-group-item-text">'.$registro['cd'].'<p/>';	
			   echo "</a>";

			}

	} else {
		echo 'Erro na consulta de codigos no banco de dados!';
	}

?>
<!doctype html>
<html lang="pt-br">
  <head>    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="estilos.css"> 
      
         
    <title>Ctrl+V</title>
  </head>
  <body>
       <button type="submit" class="btn btn-outline-danger"><li><a href="sair.php">Sair</a></li></button>
       <button type="submit" class="btn btn-primary"><li><a href="home.php">Voltar a pagina</a></li></button>
  
  </body>

</html>