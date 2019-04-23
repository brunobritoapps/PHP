<?php

//Iniciando Sessao
session_start();

//RECEBENDO VALORES VIA POST DA PAGINA (page-login.php)
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);

//CONEXAO COM BANCO DE DADOS
include("config.php");
//$db = mysqli_connect('127.0.0.1', 'root', '', 'gcvitrine');

if (isset($entrar)) { 
$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";

$resultado = mysqli_query($db, $sql);

$dados = mysqli_fetch_assoc($resultado);


if ($dados['login'] == $login and $dados['senha'] == $senha and $dados['status'] == 0) {
  
    $_SESSION['ID'] = $dados['ID'];
	$_SESSION['login'] = $dados['login'];
    $_SESSION['status'] = $dados['status'];
	$_SESSION['perfil'] = $dados['perfil'];
	$_SESSION['depto'] = $dados['depto'];
    setcookie("login", $login);
		header("Location:index.php");

} else {
    $_SESSION['mensagemLogin'] = "Login e/ou senha incorretos";
    header("Location: page-login.php");
}

mysqli_close($db);
}
