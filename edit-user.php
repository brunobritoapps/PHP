<?php 

    $id = $_POST['id'];
//    $login = $_POST['nome'];
//    $email = $_POST['email'];
    $status = $_POST['selectStatus'];
	$perfil = $_POST['selectPerfil'];
	$depto = $_POST['selectDepto'];
	/*
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'gcvitrine';
    $db = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);*/
	
	include("config.php");
    
    if(! $db ) {
       die('Não foi possível se conectar com o banco: ' . mysqli_error());
    }
    $query_update = "";
    if (mysqli_query($db, "UPDATE USUARIOS SET DEPTO = '$depto', PERFIL = '$perfil' WHERE ID = '$id';")) {
       echo header("location:usuarios.php");
    } else {
       echo "Erro ao atualizar o usuário: " . mysqli_error($db);
    }
    mysqli_close($db);