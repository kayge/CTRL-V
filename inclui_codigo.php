<?php

  session_start();

  if(!isset($_SESSION['usuario'])){
    header('Location: paginainicial.php?erro=1');
  }

  require_once('bd.php');

  $codigo = $_POST['codigo'];
  $id_usuario = $_SESSION['id_usuario'];

  if($codigo == '' || $id_usuario == ''){
    die();
  }

  $objDb = new bd();
  $link = $objDb->conecta_mysql();
  
  $sql = " INSERT INTO codigos(id_usuario, cd)values($id_usuario, '$codigo') ";

 if(mysqli_query($link,$sql)){
      header('Location: home.php');
   }else{
      header('Location: home.php?erro=1');
   }

?>	