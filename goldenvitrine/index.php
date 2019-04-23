
<?php
session_start();
//Verifico se o usuário está logado no sistema

if ($_SESSION['status'] != 0) {
	$_SESSION['mensagemLogin'] = "É necessário efetuar o login para acessar o sistema.";
	header("LOCATION: page-login.php");
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
    <title>GOLDEN VITRINE | DASHBOARD</title>
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
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>



        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

           <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <?php if($_SESSION['perfil'] == "ADM") { ?>
                    
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Principal </a>
                    </li>

                    <h3 class="menu-title">Funções</h3><!-- /.menu-title -->
                    <li>
                        <a href="rotas.php"> <i class="menu-icon fa fa-map-o"></i>Rotas</a>
                    </li>
					
					<li class="menu-item-has-children active dropdown show">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" color="white"> <i class="menu-icon fa fa-table"></i>Tabelas Referenciais</a>
                        <ul class="sub-menu children dropdown-menu hidden">
                            <li><i class="fa fa-table"></i><a href="mesafrete.php">Mesa de Fretes</a></li>
                            <li><i class="fa fa-table"></i><a href="tabelaantt.php">Tabela ANTT</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="aprova.php"> <i class="menu-icon fa fa-id-badge"></i>Reservas</a>
                    </li>

                    <h3 class="menu-title">Relatórios</h3><!-- /.menu-title -->
                    <li>
                        <a href="dadgeral.php"> <i class="menu-icon fa fa-th"></i>Dados Gerais</a>
                    </li>
					<li>
                        <a href="performance.php"> <i class="menu-icon fa fa-tasks"></i>Performance Vitrine</a>
                    </li>
                    
                    <!-- só para a adm -->
                   <?PHP
					iF($_SESSION['depto'] == "ADM"){
					
					?>
                    <h3 class="menu-title">Gestão</h3><!-- /.menu-title -->
                    <li>
                        <a href="usuarios.php"> <i class="menu-icon fa fa-users"></i>Usuários</a>
                    </li>
					<li>
                        <a href="page-register.php"> <i class="menu-icon fa fa-male"></i>Novo Usuario</a>
                    </li>
					<?php } ?>

                    <?php } else { ?>
                    <h3 class="menu-title">Funções</h3><!-- /.menu-title -->
                    <li>
                        <a href="rotas.php"> <i class="menu-icon fa fa-map-o"></i>Rotas</a>
                    </li>
					<li>
                        <a href="aprova.php"> <i class="menu-icon fa fa-id-badge"></i>Reservas</a>
                    </li>
					<li class="menu-item-has-children active dropdown show">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" color="white"> <i class="menu-icon fa fa-table"></i>Tabelas Referenciais</a>
                        <ul class="sub-menu children dropdown-menu hidden">
                            <li><i class="fa fa-table"></i><a href="mesafrete.php">Mesa de Fretes</a></li>
                            <li><i class="fa fa-table"></i><a href="tabelaantt.php">Tabela ANTT</a></li>
                        </ul>
                    </li>

                                        <h3 class="menu-title">Relatórios</h3><!-- /.menu-title -->
                    <li>
                        <a href="dadgeral.php"> <i class="menu-icon fa fa-th"></i>Dados Gerais</a>
                    </li>
					<li>
                        <a href="performance.php"> <i class="menu-icon fa fa-tasks"></i>Performance Vitrine</a>
                    </li>
                    <?php } ?>
                        
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>


                        <div class="dropdown for-message">
                          
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a style="color:#000000" href="destruirSessao.php"><i></i>Sair</p>
                        </a>
                    <!--
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="destruirSessao.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
					-->
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
      <!--
        <div class="content mt-3">

           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->
        <!--
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->
            <!--
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                    </div>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                </div>
            </div>
            <!--/.col-->
        <!--
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
