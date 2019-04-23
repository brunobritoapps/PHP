<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

if (isset($_SESSION['status'])) {
	
}else{
	$_SESSION['status'] = 3;
}

if ($_SESSION['status'] != 0 ) {
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
    <title>GOLDEN VITRINE | ROTAS</title>
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
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
                    <!--<a style="color:#000000" href="page-login.php">Sair</a>-->
					<a style="color:#000000" href="destruirSessao.php">Sair</a>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Rotas</h1>
                    </div>
                </div>
            </div>
        </div>

		
	
                            

        <div class="content mt-3">
		
		<div class="col-lg-12">
			<table class="table table-bordered" style="font-size:80%;">
			  <thead>
				<tr>
				  <th colspan="8" align="center">Legenda</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th bgcolor="green"></th>
				  <td>Aguardando Reserva</td>
				  <th bgcolor="yellow"></th>
				  <td>Reservado para Manutenção</td>
				  <th bgcolor="blue"></th>
				  <td>Ultima Chamada (Pendente de Reserva) </td>
				</tr>
			  </tbody>
			</table>
			</div>
			<br>

            <div class="w3-container">
			
			<form action="#" method="POST">
			Busca: <input type="text" name="pesq">
            <button type="submit" name="btpesq" class="btn btn-warning">Pesquisar</button>
			</form>

			<br>	
			
            <p>Verifique abaixo as rotas:</p>
			<?php carrega() ?>			

			
			<div>
			<?php
			function carrega(){	

			$data = date("Y-m-d");			

			
		if(isset($_POST['btpesq']))
			{			
				$exist = false;
				//$db = mysqli_connect('127.0.0.1','root','','gcvitrine');
				include_once("config.php");
				$query = "SELECT * FROM ROTAS WHERE res_status <> 'R' ";
				$query = mysqli_query($db,$query);                    
				$nCont = 0;
				while($dados = mysqli_fetch_array($query)){
					$nCont = $nCont+1;

				$string = $dados["fre_frete"].$dados["via_cdfimvia"].$dados["via_uffim"].$dados["via_dtdispo"].$dados["mot_carroc"];			
				$exist 	= preg_match ("/".$_POST["pesq"]."/", $string);
				//$chamad = if(strtotime($dados["via_dtdispo"]) == $data);
				
				//echo $dados["res_status"].Date($dados["via_dtdispo"]);
								
			?>
            <button  style=<?php if( !$exist ){ echo "display:none;";} ?>  color="green" style="font-size:80%;" onclick="myFunction('Demo<?php echo $nCont ?>')" class="w3-button w3-block w3-<?php if( (Date($dados["via_dtdispo"]) <= $data) && $dados["res_status"] == "A" ){echo "blue";}else if( $dados["res_status"] == "A"){ echo "green";}else if($dados["res_status"] == "P"){ echo "yellow";} ?> w3-left-align">VIAGEM: <?php echo $dados["fre_frete"]; ?> | DESTINO:<?php echo $dados["via_cdfimvia"]; ?>- <?php echo $dados["via_uffim"]; ?> | DISPONÍVEL: <?php echo $dados["via_dtdispo"]; ?> | VEICULO: <?php echo $dados["mot_carroc"]; ?> </button>
            <div id="Demo<?php echo $nCont ?>" class="w3-hide w3-animate-zoom" >
             <div class="animated fadeIn">
                 <h6>DADOS VIAGEM DE IDA</h6>
                            <table class="table">
                              <thead class="thead-dark" style="font-size:12px">
                                <tr>
                                  <th scope="col">Inicio Viagem</th>
                                  <th scope="col">Fim Viagem</th>
                                  <th scope="col">Data Disponibilidade</th>
                                  <th scope="col">UF Disponibilidade</th>
                                  <th scope="col">Cidade Final</th>
                                  <th scope="col">Região Final</th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr style="font-size:12px">
                              <td><?php echo $dados["via_dtini"]; ?></td>
                              <td><?php echo $dados["via_dtfim"]; ?></td>
                              <td><?php echo $dados["via_dtdispo"]; ?></td>
                              <td><?php echo $dados["via_uffim"]; ?></td>
                              <td><?php echo $dados["via_cdfimvia"]; ?></td>
                              <td><?php echo $dados["via_fimvia"]; ?></td>
                          </tr>
                      </tbody>
                  </table>
                </div>   
                <div class="animated fadeIn">
                <h6>DADOS DO VEICULO E MOTORISTA</h6>
                            <table class="table">
                              <thead class="thead-dark" style="font-size:12px">
                                <tr>
                                  <th scope="col">Placa Motor</th>
                                  <th scope="col">Tipo Carroceria</th>
                                  <th scope="col">Placa 1</th>
                                  <th scope="col">Placa 2</th>
                                  <th scope="col">Tel. Motorista</th>
                                  <th scope="col">Nome Motorista</th>
                                  <th scope="col">Tipo de Frota</th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr style="font-size:12px">
                              <td><?php echo $dados["mot_veicu"]; ?></td>
                              <td><?php echo $dados["mot_carroc"]; ?></td>
                              <td><?php echo $dados["mot_placa1"]; ?></td>
                              <td><?php echo $dados["mot_placa2"]; ?></td>
                              <td><?php echo $dados["mot_telef"]; ?></td>
                              <td><?php echo $dados["mot_nome"]; ?></td>
                              <td><?php echo $dados["mot_tpfrot"]; ?></td>
                          </tr>
                      </tbody>
                  </table>
                </div>
                <div class="animated fadeIn">
                <h6>DADOS DE FRETE E RETORNO</h6>
                            <table class="table">
                              <thead class="thead-dark" style="font-size:12px">
                                <tr>
                                  <th scope="col">Frete Ret.</th>
                                  <th scope="col">Area Respons.</th>
                                  <th scope="col">Responsavel</th>
                                  <th scope="col">Motivo</th>
                                  <th scope="col">Obs.</th>
                                  <th scope="col">Cliente</th>
                                  <th scope="col">Tem Seguro?</th>
                                  <th scope="col">Averba</th>
                                  <th scope="col">Desloc(KM)</th>
                                  <th scope="col">Tp Carga</th>
                                  <th scope="col">Peso(KG)</th>
                                  <th scope="col">Frete</th>
                                  <th scope="col">Cidade Ori.</th>
                                  <th scope="col">UF Ori.</th>
                                  <th scope="col">Cidade Dest.</th>
                                  <th scope="col">UF Dest.</th>
                                  <th scope="col">KM</th>
                                  <th scope="col">Dt Carga</th>
                                  <th scope="col">Dt Descarga</th>
                                  <th scope="col">Disp. Veiculo</th>
                                  <th scope="col">Dt. Real Desc.</th>
                                  <th scope="col">R$/Dia</th>
                                  <th scope="col">R$/Ton</th>
                                  <th scope="col">$/Km</th>

                              </tr>
                          </thead>
                          <tbody>
                            <tr style="font-size:12px">
                              <td><?php echo $dados["fre_frete"]; ?></td>
                              <td><?php echo $dados["fre_areares"]; ?></td>
							  <td><?php echo $dados["res_solicita"]; ?></td>
                              <td><?php echo $dados["fre_motivo"]; ?></td>
                              <td><?php echo $dados["fre_obs"]; ?></td>
                              <td><?php echo $dados["res_embarca"]; ?></td>
                              <td><?php echo $dados["res_seguro"]; ?></td>
                              <td><?php echo $dados["fre_averba"]; ?></td>
                              <td><?php echo $dados["res_retdeslo"]; ?></td>
                              <td><?php echo $dados["res_tpcarga"]; ?></td>
                              <td><?php echo $dados["fre_peso"]; ?></td>
                              <td><?php echo $dados["res_frete"]; ?></td>
                              <td><?php echo $dados["res_acidade"]; ?></td>
                              <td><?php echo $dados["res_auf"]; ?></td>
                              <td><?php echo $dados["res_bcidade"]; ?></td>
                              <td><?php echo $dados["res_buf"]; ?></td>
							  <td><?php echo $dados["res_retdeslo"]; ?></td>
                              <td><?php echo $dados["via_dtini"]; ?></td>
                              <td><?php echo $dados["via_dtfim"]; ?></td>
                              <td><?php echo $dados["via_dtdispo"]; ?></td>
                              <td><?php echo $dados["via_dtdispo"]; ?></td>
                              <td> - </td>
                              <td> - </td>
                              <td> - </td>
                          </tr>
                      </tbody>
                  </table>
                </div>  
                <div class="animated fadeIn">
                <h6>DADOS FINANCEIROS</h6>
                            <table class="table">
                              <thead class="thead-dark" style="font-size:12px">
                                <tr>
                                  <th scope="col">N° CTE</th>
                                  <th scope="col">Tipo de Pagamento</th>
                                  <th scope="col">Data de Acerto</th>
                              </tr>
                          </thead>
                          <tbody>
                            <tr style="font-size:12px">
                              <td><?php echo $dados["pag_numcte"]; ?></td>
                              <td><?php echo $dados["pag_tppag"]; ?></td>
                              <td><?php echo $dados["pag_dtacerto"]; ?></td>
                          </tr>
                      </tbody>
                  </table>
                </div>
				<?php if($dados["res_status"] == "A") { ?>
				<div class="col-md-6">
				<form action="reservas.php" method="POST">
					<input type="text" name="fre_frete" value="<?php echo $dados["fre_frete"] ?>" hidden>
					<input type="text" name="mot_nome" value="<?php echo $dados["mot_nome"]; ?>" hidden>
					<input type="text" name="mot_telef" value="<?php echo $dados["mot_telef"]; ?>" hidden>
					<input type="text" name="mot_carroc" value="<?php echo $dados["mot_carroc"]; ?>" hidden>
					<input type="text" name="mot_placa1" value="<?php echo $dados["mot_veicu"]; ?>" hidden>
					<input type="text" name="string" value="VIAGEM: <?php echo $dados["fre_frete"]; ?> | DESTINO:<?php echo $dados["via_cdfimvia"]; ?>- <?php echo $dados["via_uffim"]; ?> | DISPONÍVEL: <?php echo $dados["via_dtdispo"]; ?> | VEICULO: <?php echo $dados["mot_carroc"]; ?>					" hidden>
					<?php if ($_SESSION['depto'] == "TRAFEGO" AND $_SESSION['perfil'] == "ADM") { ?>					
                    <button type="submit" class="btn btn-warning">Reservar  </button>
					<?php } elseif($_SESSION['depto'] == "MANUTENCAO"  AND $_SESSION['perfil'] == "ADM") { ?>
					<button type="submit" class="btn btn-danger" formaction="manut.php">Manutenção</button>
					<?php } elseif($_SESSION['perfil'] == "ADM" AND $_SESSION['depto'] <> "MANUTENCAO") { ?>
					<button type="submit" class="btn btn-warning">Reservar  </button>
					<button type="submit" class="btn btn-danger" formaction="manut.php">Manutenção</button>
					<button type="submit" class="btn btn-danger" formaction="retvazio.php">Retorno Vazio</button>
					<?php } elseif($_SESSION['perfil'] == "COMUM")  { ?>
					<button type="submit" class="btn btn-warning">Reservar  </button>
					<?php } ?>		
				</form>
				<BR>
                </div>					
				<?php } ?>		
				
                </div>
				
				
			<?php
			}
			
			//Fecha conexao 
			mysqli_close($db);
			
			}
			}
			
			?> 
				</div>

                </div>
   <BR>
				</div>
  
            <br>
			
                
                 
</div> <!-- .content -->
    </div><!-- /#right-panel -->





    <!-- Right Panel -->

    <script>
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    }
    </script>


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

  <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="card-body card-block">
                        <div class="form-group"><label for="nome" class=" form-control-label">Nome</label><input type="text" id="nome" placeholder="Enter your company name" class="form-control"></div>
                        <div class="form-group"><label for="email" class=" form-control-label">Email</label><input type="email" id="email" placeholder="DE1234567890" class="form-control"></div>
                        <div class="form-group"><label for="country" class=" form-control-label">Country</label><input type="text" id="country" placeholder="Country name" class="form-control"></div>
                      </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

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
		var str;
		$(document).ready(function(){
		$("#kw").keyup(function(event){
			str = $("#kw").val();
			var er = new RegExp(str,"im");
			$("#divs div").stop().hide(1000);
			$("#divs div").each(function(){
				val = $(this).html();
				if (er.test(val)){
					$(this).stop().show(1000);
				}
			});
			//alert(ids);
		});
		});
		</script>

	
</body>
</html>
