

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GOLDEN VITRINE | LOGIN</title>
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
                        <img class="align-content" height="150" width="400" src="images/logo3.png" alt="">
                    </a>
					<br>
                    <?php              
                    session_start();
                     if(isset($_SESSION['mensagemLogin'])) {
                        $msg = $_SESSION['mensagemLogin'];

                        echo"<div class='alert alert-danger' role='alert'>
                        <i class='fa fa-times pr-3'></i>
                        <strong>$msg</strong>
                      </div>";
                        
                        unset($_SESSION['mensagemLogin']);
                                                    
                        
                    }                  
                    ?>
                </div>
                <div class="login-form">
                    <form method="POST" action="login.php"> 
                        <div class="form-group">
                            <label>Usuário</label>
                            <input type="text" class="form-control" placeholder="Usuário" name="login" id="login">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning btn-lg btn-block" id="entrar" name="entrar">Entrar</button>
						<br>
                    </form>
					<br>
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
