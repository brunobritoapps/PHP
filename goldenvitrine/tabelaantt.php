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
    <title>GOLDEN VITRINE | MESA DE FRETES</title>
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
                        <a href="destruirSessao.php"><p>Sair</p></a>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tabelas Referenciais</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tabela ANTT (Em Reais - R$)</strong>
                        </div>
                        <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
					
                      <tr>
                        <th BGCOLOR="SILVER">Região de ORIGEM </th>
                        <th BGCOLOR="SILVER">Região de DESTINO </th>
                        <th BGCOLOR="SILVER">KM entre Filiais </th>
						<th BGCOLOR="SILVER">Km Deslocamentos (Coleta+Reposição) </th>
						<th BGCOLOR="SILVER">Truck 13 ton, 3E </th>
						<th BGCOLOR="SILVER">Cavalo+Carreta 25 ton, 5E </th>
						<th BGCOLOR="SILVER">Cavalo+Carreta 30 ton, 6E </th>
						<th BGCOLOR="SILVER">Bi-Trem 48 ton, 9E </th>
						<th BGCOLOR="SILVER">Truck 13 ton, 3E</th>
						<th BGCOLOR="SILVER">Cavalo+Carreta 25 ton, 5E </th>
						<th BGCOLOR="SILVER">Cavalo+Carreta 30 ton, 6E </th>
						<th BGCOLOR="SILVER">Bi-Trem 48 ton, 9E </th>
                      </tr>
                    </thead>
                    <tbody>		
					<tr>
						<td COLSPAN="4"></td>
						<td COLSPAN="4"  BGCOLOR="SILVER" ALIGN="CENTER">CARGA PERIGOSA</td>
						<td COLSPAN="4"  BGCOLOR="SILVER" ALIGN="CENTER">CARGA GERAL</td>
                    </tr>					
                    <tr>
						<td>AUX</td>
						<td>SUM</td>
						<td ALIGN="RIGHT">1.937</td>
						<td ALIGN="RIGHT">200</td>
						<td ALIGN="RIGHT">3.654,27</td>
						<td ALIGN="RIGHT">6.090,45 </td>
						<td ALIGN="RIGHT">7.308,54</td>
						<td ALIGN="RIGHT">10.962,81</td>
						<td ALIGN="RIGHT">5.705,79</td>
						<td ALIGN="RIGHT">9.509,65</td>
						<td ALIGN="RIGHT">11.411,58</td>
						<td ALIGN="RIGHT">17.117,37</td>
                    </tr>
					<tr>
						<td>BSS</td>
						<td>SUM</td>
						<td ALIGN="RIGHT">2.188</td>
						<td ALIGN="RIGHT">200</td>
						<td ALIGN="RIGHT">4.083,48</td>
						<td ALIGN="RIGHT">6.805,80 </td>
						<td ALIGN="RIGHT">8.166,96</td>
						<td ALIGN="RIGHT">12.250,44</td>
						<td ALIGN="RIGHT">6.375,96</td>
						<td ALIGN="RIGHT">10.626,60</td>
						<td ALIGN="RIGHT">12.751,92</td>
						<td ALIGN="RIGHT">19.127,88</td>
                    </tr>
					<tr>
						<td>CGB</td>
						<td>SUM</td>
						<td ALIGN="RIGHT">1.470</td>
						<td ALIGN="RIGHT">200</td>
						<td ALIGN="RIGHT">2.905,80</td>
						<td ALIGN="RIGHT">4.843,00</td>
						<td ALIGN="RIGHT">5.811,60</td>
						<td ALIGN="RIGHT">8.717,40</td>
						<td ALIGN="RIGHT">4.509,00</td>
						<td ALIGN="RIGHT">7.515,00</td>
						<td ALIGN="RIGHT">9.018,00</td>
						<td ALIGN="RIGHT">13.527,00</td>
                    </tr>
					<tr>
						<td>CGR</td>
						<td>SUM</td>
						<td ALIGN="RIGHT">906</td>
						<td ALIGN="RIGHT">200</td>
						<td ALIGN="RIGHT">1.990,80</td>
						<td ALIGN="RIGHT">3.318,00</td>
						<td ALIGN="RIGHT">3.981,60</td>
						<td ALIGN="RIGHT">5.972,40</td>
						<td ALIGN="RIGHT">3.052,56</td>
						<td ALIGN="RIGHT">5.087,60</td>
						<td ALIGN="RIGHT">6.105,12</td>
						<td ALIGN="RIGHT">9.157,68</td>
                    </tr>
					<tr>
						<td>DOU</td>
						<td>SUM</td>
						<td ALIGN="RIGHT">984</td>
						<td ALIGN="RIGHT">200</td>
						<td ALIGN="RIGHT">2.131,20 </td>
						<td ALIGN="RIGHT">3.552,00 </td>
						<td ALIGN="RIGHT">4.262,40</td>
						<td ALIGN="RIGHT">6.393,60</td>
						<td ALIGN="RIGHT">3.267,84 </td>
						<td ALIGN="RIGHT">5.446,40 </td>
						<td ALIGN="RIGHT">6.535,68</td>
						<td ALIGN="RIGHT">9.803,52</td>
                    </tr>
					<tr>
						<td>FSA</td>
						<td>SUM</td>
						<td ALIGN="RIGHT">1.928</td>
						<td ALIGN="RIGHT">200</td>
						<td ALIGN="RIGHT">3.638,88 </td>
						<td ALIGN="RIGHT">6.064,80 </td>
						<td ALIGN="RIGHT">7.277,76</td>
						<td ALIGN="RIGHT">10.916,64</td>
						<td ALIGN="RIGHT">5.681,76 </td>
						<td ALIGN="RIGHT">9.469,60 </td>
						<td ALIGN="RIGHT">11.363,52</td>
						<td ALIGN="RIGHT">17.045,28</td>
                    </tr>
					<tr>
						<td>GYN</td>
						<td>SUM</td>
						<td ALIGN="RIGHT">778</td>
						<td ALIGN="RIGHT">200</td>
						<td ALIGN="RIGHT">1.789,74 </td>
						<td ALIGN="RIGHT">2.982,90</td>
						<td ALIGN="RIGHT">3.579,48</td>
						<td ALIGN="RIGHT">5.369,22</td>
						<td ALIGN="RIGHT">2.728,62 </td>
						<td ALIGN="RIGHT">4.547,70 </td>
						<td ALIGN="RIGHT">5.457,24</td>
						<td ALIGN="RIGHT">8.185,86</td>
                    </tr>
					<tr>
						<td>LEM</td>
						<td>SUM</td>
						<td ALIGN="RIGHT">1.408</td>
						<td ALIGN="RIGHT">200</td>
						<td ALIGN="RIGHT">2.797,92 </td>
						<td ALIGN="RIGHT">4.663,20 </td>
						<td ALIGN="RIGHT">5.595,84 </td>
						<td ALIGN="RIGHT">8.393,76 </td>
						<td ALIGN="RIGHT">4.341,60</td>
						<td ALIGN="RIGHT">7.236,00 </td>
						<td ALIGN="RIGHT">8.683,20</td>
						<td ALIGN="RIGHT">13.024,80</td>
                    </tr>
					</div>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="edit-user.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Alteração de Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <input type="text" name="id" id="id" class="form-control" hidden>
                            <label for="nome" class=" form-control-label">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class=" form-control-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                        </div>
						<div class="form-group">
                            <label for="perfil" class=" form-control-label">Perfil</label>
                            <select name="selectPerfil" id="perfil" class="form-control">
                                <option value="ADM">Administrador</option>
                                <option value="COMUM">COMUM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status" class=" form-control-label">Status</label>
                            <select name="selectStatus" id="status" class="form-control">
                                <option value="0">Ativo</option>
                                <option value="1">Desativado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/widgets.js"></script>
        <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
        <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
        <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
        <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "editdata.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>

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

<script> 
   $(".info-user").click(function(){
       var id = $(this).data("id");
       var email = $(this).data("email");
       var login =  $(this).data("login");
       $("#id").val(id);
       $("#nome").val(login);
       $("#email").val(email);
   });
</script>
</body>
</html>
