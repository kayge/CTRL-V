<?php
   
   session_start(); 

   require_once('bd.php');

  $usuario = $_POST['usuario'];
  $senha = md5($_POST['senha']);

  $sql = " Select id,usuario,email from usuario where usuario = '$usuario' and senha = '$senha' ";

  $objbd = new bd();
  $link = $objbd->conecta_mysql();

 $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['usuario'])){

          $_SESSION['id_usuario'] = $dados_usuario['id'];
        	$_SESSION['usuario'] = $dados_usuario['usuario'];
        	$_SESSION['email'] = $dados_usuario['email'];

            header('Location: home.php');

        }else{

            header('Location: paginainicial.php?erro=1');

        }

    }else{
        
        echo "Erro na execução da consulta, favor entrar em contato com o admin do site";

    }

?>