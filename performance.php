<?php
session_start();

if (isset($_SESSION['status'])) {

}else{
    $_SESSION['status'] = 3;
}

if ($_SESSION['status'] != 0 ) {
    $_SESSION['mensagemLogin'] = "É necessário efetuar o login para acessar o sistema.";
    header("LOCATION: page-login.php");
}

if (isset($_POST["submit"])) {
    $fre_frete = $_POST["fre_frete"];
    $mot_nome = $_POST["mot_nome"];
    $mot_telef = $_POST["mot_telef"];
    $mot_carroc = $_POST["mot_carroc"];
    $mot_placa1 = $_POST["mot_placa1"];
    $string = $_POST["string"];
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
    <title>GOLDEN VITRINE | PERFORMANCE</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="cidades-estados-1.4-utf8.js"></script>



    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style>
        table {
            border-collapse: collapse;
        }
        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }
    </style>

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
                    <div class="form-inline">
                    </div>


                    <div class="dropdown for-message">
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                </div>

                <div class="language-select dropdown" id="language-select">
                    <a style="color:#000000" href="destruirSessao.php">Sair</a>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-10">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> RELATÓRIO PERFORMANCE || VITRINE x RESERVAS</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="card">
            <div class="card-body card-block">
                <form action="gerar_planilha.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Data Disponibilidade de:</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="datade" id="datade" required="" maxlength="10" placeholder="dd/mm/aaaa" onkeypress="mascaraData(this)" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Data Disponibilidade até:</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="dataate" id="dataate" required="" maxlength="10" placeholder="dd/mm/aaaa" onkeypress="mascaraData(this)" />
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="col-md-6">
                        <button type="submit" id="incluir" name="incluir" class="btn btn-warning">Gerar (Excel)</button>
                    </div>

                </form>
            </div>
            <br>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>


    <script>

        $(function(){
            $('#cod_estados').change(function(){
                if( $(this).val() ) {
                    $('#cod_cidades').hide();
                    $('.carregando').show();
                    $.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
                        var options = '<option value=""></option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
                        }
                        $('#cod_cidades').html(options).show();
                        $('.carregando').hide();
                    });
                } else {
                    $('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
                }
            });
        });

    </script>

    <script>
        function alteraLabel(texto) {
            document.getElementById("labelTotal").innerHTML ='R$ '+ texto;
            document.getElementById("Totaltab").innerHTML ='R$ '+ texto;
        }
    </script>

    <SCRIPT>
        function mascaraData(val) {
            var pass = val.value;
            var expr = /[0123456789]/;

            for (i = 0; i < pass.length; i++) {
                // charAt -> retorna o caractere posicionado no índice especificado
                var lchar = val.value.charAt(i);
                var nchar = val.value.charAt(i + 1);

                if (i == 0) {
                    // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
                    // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
                    // instStr.search(expReg);
                    if ((lchar.search(expr) != 0) || (lchar > 3)) {
                        val.value = "";
                    }

                } else if (i == 1) {

                    if (lchar.search(expr) != 0) {
                        // substring(indice1,indice2)
                        // indice1, indice2 -> será usado para delimitar a string
                        var tst1 = val.value.substring(0, (i));
                        val.value = tst1;
                        continue;
                    }

                    if ((nchar != '/') && (nchar != '')) {
                        var tst1 = val.value.substring(0, (i) + 1);

                        if (nchar.search(expr) != 0)
                            var tst2 = val.value.substring(i + 2, pass.length);
                        else
                            var tst2 = val.value.substring(i + 1, pass.length);

                        val.value = tst1 + '/' + tst2;
                    }

                } else if (i == 4) {

                    if (lchar.search(expr) != 0) {
                        var tst1 = val.value.substring(0, (i));
                        val.value = tst1;
                        continue;
                    }

                    if ((nchar != '/') && (nchar != '')) {
                        var tst1 = val.value.substring(0, (i) + 1);

                        if (nchar.search(expr) != 0)
                            var tst2 = val.value.substring(i + 2, pass.length);
                        else
                            var tst2 = val.value.substring(i + 1, pass.length);

                        val.value = tst1 + '/' + tst2;
                    }
                }

                if (i >= 6) {
                    if (lchar.search(expr) != 0) {
                        var tst1 = val.value.substring(0, (i));
                        val.value = tst1;
                    }
                }
            }

            if (pass.length > 10)
                val.value = val.value.substring(0, 10);
            return true;
        }
    </SCRIPT>
</body>
</html>
