<?php

session_start();
$logado = $_SESSION['nome'];

session_unset();

$_SESSION['status'] = 1;
header("Location: page-login.php");

