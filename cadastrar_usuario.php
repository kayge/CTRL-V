<?php
    session_start(); 

    require_once('bd.php');
        

   $usuario = $_POST['usuario'];
   $email = $_POST['email'];
   $senha = md5($_POST['senha']);

   $pessoa = new bd();
   $link  = $pessoa->conecta_mysql(); 
   

   $sql = "insert into usuario(usuario,email,senha) values('$usuario','$email','$senha')";

   if(mysqli_query($link,$sql)){
   	  header('Location: paginainicial.php?validar=1');
   }else{
   	  header('Location: paginainicial.php?erro2=1');
   }
 
?>	