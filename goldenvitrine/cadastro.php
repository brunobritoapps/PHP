<?php 
 
$login = $_POST['login'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$perfil = 'COMUM';
//$db = mysqli_connect('127.0.0.1','root','','bdvitrine');
include("config.php");
$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$select = mysqli_query($db,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['login'];
 
  if($login == "" || $login == null){
    echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='page-login.php';</scriptSql RELATORIO PERFORMANCE>";
 
    }else{
      if($logarray == $login){
 
        echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='page-register.php';</scriptSql RELATORIO PERFORMANCE>";
        die();
 
      }else{
        $query = "INSERT INTO usuarios (login,senha,email,perfil) VALUES ('$login','$senha','$email','$perfil')";
        $insert = mysqli_query($db,$query);
         
        if($insert){
          echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='page-login.php'</scriptSql RELATORIO PERFORMANCE>";
        }else{
          echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='page-register.php'</scriptSql RELATORIO PERFORMANCE>";
        }
      }
   }
   //Fecha conexao
   mysqli_close($db);
?>