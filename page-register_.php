<?php
include_once("config.php");
//$db = mysqli_connect('127.0.0.1','root','','bdvitrine');
$db = mysqli_connect('localhost','root','','gcvitrine');
if(isset($_POST['cadastrar']))
{
	$login=$_POST['login'];
	$email=$_POST['email'];
	$senha=md5($_POST['senha']);
	$status=0;
    $activationcode=md5($email.time());    
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
        
            $insert = mysqli_query($db,"insert into usuarios(login,senha,email,status) values('$login','$senha','$email','$status')");
            $headers = 'From: lucas.ribeiro@loopconsultoria.com.br' . "\r\n" .
            'Reply-To: lucas.ribeiro@loopconsultoria.com.br' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();                
            $erro=mail('lucas.ribeiro@loopconsultoria.com.br', 'Novo Usuario - VITRINE', 'MODELO DE EMAIL PARA CADASTRO DE NOVO USUARIO - PENDENTE DE LIBERAÇÃO',$headers);
            $to=$email;
            echo "<scriptSql RELATORIO PERFORMANCE>window.location = 'page-login.php';</scriptSql RELATORIO PERFORMANCE>";
            
            if($insert){
            echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='index.php'</scriptSql RELATORIO PERFORMANCE>";
            }else{
            echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='page-register.php'</scriptSql RELATORIO PERFORMANCE>";
            }
        }
        }
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VITRINE | NOVO USUARIO</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo3.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>Usuário</label>
                            <input type="text" class="form-control" placeholder="Usuario" name="login" id="login">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha" >
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" id="cadastrar" name="cadastrar">Registrar</button>
                        <div class="register-link m-t-15 text-center">
                            <br>
                            <p>Ja é cadastrado? <a href="page-login.php"> Logar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
