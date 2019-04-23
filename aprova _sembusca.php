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

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GOLDEN VITRINE | APROVAÇÃO</title>
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
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Aprovação de Reserva</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="w3-container">
			
			
            <p>Verifique abaixo as Reservas Incluidas:</p>
						
			<?php
			//$db = mysqli_connect('127.0.0.1','root','','gcvitrine');
			include("config.php");
			if($_SESSION['perfil'] == "COMUM" OR $_SESSION['depto'] == "MANUTENCAO"){
				$query = "SELECT * FROM RESERVAS WHERE RES_SOLICITA = '".$_SESSION['login']."'";
			}else{
				$query = "SELECT * FROM RESERVAS";
			}
			
			$query = mysqli_query($db,$query);     
			$nCont = 0;			
			while($dados = mysqli_fetch_array($query)){
			$nCont = $nCont+1;
					if($dados['res_embarca'] <> 'MANUTENCAO' AND $dados['res_embarca'] <> 'RETORNO VAZIO') { 
			?>	
            <button onclick="myFunction('Demo<?php echo $nCont ?>')" class="w3-button w3-block w3-red w3-left-align aprova">FRETE RETORNO | SOLICITANTE: <?php echo $dados["res_solicita"]; ?> | VEICULO: <?php echo $dados["res_veic"]; ?></button>
            <div id="Demo<?php echo $nCont ?>" class="w3-hide w3-animate-zoom aprova">
            <div class="animated fadeIn">
                      <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                         <div class="row form-group">
                           <div class="col col-md-3"><label class=" form-control-label">Solicitante</label></div>
                           <div class="col-12 col-md-9">
                             <p class="form-control-static"><?php echo $dados["res_solicita"]; ?></p>
                           </div>
                         </div>
                         <div class="row form-group">
                           <div class="col col-md-3"><label for="text-input" class=" form-control-label">Embarcador (Nome)</label></div>
                           <div class="col-12 col-md-6"><input type="text" disabled=""  value="<?php echo $dados["res_embarca"]; ?>" id="text-input" name="text-input" class="form-control"></div>
                         </div>
                         <div class="row form-group">
                           <div class="col col-md-3"><label for="email-input" class=" form-control-label">Destinatário  (Nome)</label></div>
                           <div class="col-12 col-md-6"><input type="text" disabled="" value="<?php echo $dados["res_destina"]; ?>"  id="text-input" name="text-input"  class="form-control"></div>
                         </div>
                         <div class="row form-group">
                         <div class="col col-md-3"><label for="email-input" class=" form-control-label">Carga (Tipo)</label></div>
                           <div class="col-12 col-md-6"><input type="text" disabled="" value="<?php echo $dados["res_tpcarga"]; ?>" id="text-input" name="text-input" class="form-control"></div>
                         </div>
                        <hr>
                        <label>LOCAIS OPERACIONAIS</label>
             <!--           <div class="row form-group">
								<div class="col col-md-3"><br><label for="select" class=" form-control-label">A = Local de Destino  </label></div>
									<div class="col-12 col-md-6"><br>
									<select id="res_auf" name="res_auf">
									<option value="<?php echo $dados["res_auf"]; ?>"><?php echo $dados["res_auf"]; ?></option>
									</select>
									<select id="res_acidade" name="res_acidade" >
									<option value="<?php echo $dados["res_acidade"]; ?>"><?php echo $dados["res_acidade"]; ?></option>
									</select>
								</div>
                            </div>
			-->				
                        <div class="row form-group">
							<div class="col col-md-3"><br><label for="select" class=" form-control-label">B = Local de coleta da Carga Retorno </label></div>
								<div class="col-12 col-md-6"><br>
								<select id="res_auf" name="res_auf">
								<option value="<?php echo $dados["res_buf"]; ?>"><?php echo $dados["res_buf"]; ?></option>
								</select>
								<select id="res_acidade" name="res_acidade" >
								<option value="<?php echo $dados["res_bcidade"]; ?>"><?php echo $dados["res_bcidade"]; ?></option>
								</select>
								<label for="res_bdata">Data da Coleta: </label>
								<input type="text" name="res_bdata" id="res_bdata" maxlength="10" disabled="" placeholder="<?php echo $dados["res_bdata"]; ?>" onkeypress="mascaraData(this)" />
							</div>
						</div>
							
                        <div class="row form-group">
							<div class="col col-md-3"><br><label for="select" class=" form-control-label">C = Local de entrega da Carga Retorno</label></div>
								<div class="col-12 col-md-6"><br>
								<select id="res_auf" name="res_auf">
								<option value="<?php echo $dados["res_cuf"]; ?>"><?php echo $dados["res_cuf"]; ?></option>
								</select>
								<select id="res_acidade" name="res_acidade" >
								<option value="<?php echo $dados["res_ccidade"]; ?>"><?php echo $dados["res_ccidade"]; ?></option>
								</select>
								<label for="res_cdata">Data Agendada: </label>
								<input type="text" name="res_cdata" id="res_cdata" maxlength="10" disabled="" placeholder="<?php echo $dados["res_cdata"]; ?>" onkeypress="mascaraData(this)" />
							</div>
						</div>
							
							
                        <div class="row form-group">
							<div class="col col-md-3"><br><label for="select" class=" form-control-label">D = Local de reposicionamento da frota </label></div>
								<div class="col-12 col-md-6"><br>
								<select id="res_auf" name="res_auf">
								<option value="<?php echo $dados["res_duf"]; ?>"><?php echo $dados["res_duf"]; ?></option>
								</select>
								<select id="res_acidade" name="res_acidade" >
								<option value="<?php echo $dados["res_dcidade"]; ?>"><?php echo $dados["res_dcidade"]; ?></option>
								</select>
								<label for="res_ddata">Data de Retorno: </label>
								<input type="text" name="res_ddata" id="res_ddata" maxlength="10" disabled="" placeholder="<?php echo $dados["res_ddata"]; ?>" onkeypress="mascaraData(this)" />
							</div>
						</div>
							
                         <hr>
                         <br>
						 <div class="row form-group">
							<div class="col col-md-3"><label for="text-input" class=" form-control-label">Nº do Conhecimento</label></div>
							<div class="col-12 col-md-3"><input type="text" disabled="" value="<?php echo $dados["res_nrcte"]; ?>" id="nrcte" name="nrcte" class="form-control"></div>
						</div>
						<div class="row form-group">
						   <div class="col col-md-3"><label for="text-input" class=" form-control-label">Filial do Conhecimento</label></div>
						   <div class="col-12 col-md-3"><input type="text" disabled="" value="<?php echo $dados["res_filcte"]; ?>" id="filcte" name="filcte" class="form-control"></div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3"><label for="text-input" class=" form-control-label">Placa - Veiculo </label></div>
							<div class="col-12 col-md-2"><input type="text" placeholder="<?php echo  $dados["res_placa1"]; ?>" disabled="" id="res_frete" name="res_frete" class="form-control"></div>
						</div>
                         <div class="row form-group">
                           <div class="col col-md-3"><label for="select" class=" form-control-label">Veiculo</label></div>
                           <div class="col-12 col-md-3">
                             <select name="res_veic<?php echo $nCont?>" disabled=""  id="res_veic<?php echo $nCont?>" class="form-control">
							   <option value="<?php echo $dados["res_veic"]; ?>" selected><?php echo $dados["res_veic"]; ?></option>
                             </select>
                           </div>
                         </div>
                         <div class="row form-group">
                           <div class="col col-md-3"><label for="text-input" class=" form-control-label">Frete a Receber</label></div>
                           <div class="col-12 col-md-2"><input type="text" disabled="" value="<?php echo $dados["res_frete"]; ?>"  placeholder="R$ 99.999,99" id="valtot" name="valtot" class="form-control"></div>
                         </div>
                         <div class="row form-group">
                           <div class="col col-md-3"><label for="select" class=" form-control-label">Pedagio Reembolsado</label></div>
                           <div class="col-12 col-md-3">
                             <select name="select"  disabled="" id="select"  class="form-control">
                               <option value="S"><?php echo $dados["res_pedre"]; ?></option>
                             </select>
                           </div>
                        </div>
						<div class="row form-group">
								<div class="col col-md-3"><label for="select" class=" form-control-label">Tem Seguro ?</label></div>
								<div class="col-12 col-md-3">
									<select name="res_seguro" id="res_seguro" disabled="" class="form-control">
									<option value="S"><?php echo $dados["res_seguro"]; ?></option>
									</select>
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3"><label for="select" class=" form-control-label">Averba ?</label></div>
								<div class="col-12 col-md-3">
									<select name="res_averba" id="res_averba" disabled="" class="form-control">
									<option value="S"><?php echo $dados["res_averba"]; ?></option>									
									</select>
								</div>
								</div>
                        <br>
						<label>OPERAÇÃO DE CARGA DE RETORNO</label>
                            <br>
                            <table content id="tblEditavel" class="table">
                            <thead class="thead-dark" style="font-size:12px">
                                <tr>
                                <th scope="col">Atividade</th>
                                <th scope="col">Local</th>
                                <th scope="col">Dist. (Km)</th>
                                <th scope="col">Vel. (Km/h)</th>
                                <th scope="col">Tempo (h)</th>
                                <th scope="col">Tempo (dias)</th>
                                <th scope="col">Custo (R$)</th>
                                </tr>
                            </thead>
                                <tbody>
                                <tr style="font-size:12px">
                                <th>Deslocamento (KM)</th>
                                    <td>A > B</td>
                                    <td bgcolor="#F2F5A9" id="res_adeslo<?php echo $nCont?>"><?php echo $dados["res_adeslo"]; ?></td>
                                    <td contenteditable="false" class="editavel">60</td>
                                    <td id="desloc_tempo_horas<?php echo $nCont?>">0</td>
                                    <td id="desloc_tempo_dias<?php echo $nCont?>" class="tempo_dias">0</td>
                                    <td id="desloc_custo<?php echo $nCont?>">0,00</td>
                                </tr>
                                <tr style="font-size:12px">
                                <th >Pedágio (R$)</th>
                                    <td>A > B</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#F2F5A9" id="ped_custo_pedagio<?php echo $nCont?>"><?php echo $dados["res_apedag"]; ?></td>
                                </tr>
                                <tr style="font-size:12px">
                                <th >Descarregamento (h)</th>
                                    <td>B</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#F2F5A9" id="carreg_tempo_horas<?php echo $nCont?>"><?php echo $dados["res_btempo"]; ?></td>
                                    <td id="carreg_tempo_dias<?php echo $nCont?>" class="tempo_dias">0</td>
                                    <td id="carreg_custo<?php echo $nCont?>">0,00</td>
                                </tr>
                                <tr style="font-size:12px">
                                <th >Deslocamento (KM)</th>
                                    <td>B > C</td>
                                    <td bgcolor="#F2F5A9" id="res_bdeslo<?php echo $nCont?>"><?php echo $dados["res_bdeslo"]; ?></td>
                                    <td>60</td>
                                    <td id="deslocb_tempo_horas<?php echo $nCont?>">0</td>
                                    <td id="deslocb_tempo_dias<?php echo $nCont?>" class="tempo_dias">0</td>
                                    <td id="deslocb_custo<?php echo $nCont?>">0,00</td>
                                </tr>
                                <tr style="font-size:12px">
                                <th >Pedágio (R$)</th>
                                    <td>B > C</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#F2F5A9" id="pedb_custo_pedagio<?php echo $nCont?>"><?php echo $dados["res_bpedag"]; ?></td>
                                </tr>
                                <tr style="font-size:12px">
                                <th >Descarregamento (h)</th>
                                    <td>C</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#F2F5A9" id="carregb_tempo_horas<?php echo $nCont?>"><?php echo $dados["res_ctempo"]; ?></td>
                                    <td id="carregb_tempo_dias<?php echo $nCont?>" class="tempo_dias">0</td>
                                    <td id="carregb_custo<?php echo $nCont?>" >0,00</td>
                                </tr>
                                <tr style="font-size:12px">
                                <th >Descarga</th>
                                    <td>C</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#F2F5A9" id="res_cdescar<?php echo $nCont?>"><?php echo $dados["res_cdescar"]; ?></td>
                                </tr>
                                <tr style="font-size:12px">
                                <th >Deslocamento (KM)</th>
                                    <td>C > D</td>
                                    <td bgcolor="#F2F5A9" id="res_cdeslo<?php echo $nCont?>"><?php echo $dados["res_ddeslo"]; ?></td>
                                    <td>60</td>
                                    <td id="deslocc_tempo_horas<?php echo $nCont?>">0</td>
                                    <td id="deslocc_tempo_dias<?php echo $nCont?>">0</td>
                                    <td id="deslocc_custo<?php echo $nCont?>">0,00</td>
                                </tr>
                                <tr style="font-size:12px">
                                <th >Pedagio (R$)</th>
                                    <td>C > D</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#F2F5A9" id="pedc_custo_pedagio<?php echo $nCont?>"><?php echo $dados["res_dpedag"]; ?></td>
                                </tr>
                                <thead class="thead-dark" style="font-size:12px">
                                <tr>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                                <th id="totalKM<?php echo $nCont?>"scope="col">0.0 KM</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th id="totalDias<?php echo $nCont?>" scope="col">0 Dias</th>
                                <th id="totalCusto<?php echo $nCont?>" scope="col">R$ 0,00</th>
                                </tr>
                            </thead>
                            </tbody>
                            </table>
                            
                            <br>
                            <label>RETORNO VAZIO</label>
                            <br>
                            <table  id="tblEditavel" class="table">
                            <thead class="thead-dark" style="font-size:12px">
                                <tr>
                                <th scope="col">Atividade</th>
                                <th scope="col">Local</th>
                                <th scope="col">Dist. (Km)</th>
                                <th scope="col">Vel. (Km/h)</th>
                                <th scope="col">Tempo (h)</th>
                                <th scope="col">Tempo (dias)</th>
                                <th scope="col">Custo (R$)</th>
                                </tr>
                            </thead>
                                <tbody>
                                <tr style="font-size:12px">
                                <th >Deslocamento (KM)</th>
                                    <td>A > D</td>
                                    <td bgcolor="#F2F5A9" id="res_retdeslo<?php echo $nCont?>"><?php echo $dados["res_retdeslo"]; ?></td>
                                    <td>60</td>
                                    <td id="desloc_vazio_tempo_horas<?php echo $nCont?>">0</td>
                                    <td id="desloc_vazio_tempo_dias<?php echo $nCont?>">0</td>
                                    <td id="desloc_vazio_custo<?php echo $nCont?>">0,00</td>
                                </tr>
                                <tr style="font-size:12px">
                                <th >Pedagio</th>
                                    <td>A > D</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#E6E6E6">--</td>
                                    <td bgcolor="#F2F5A9" id="res_retpedag<?php echo $nCont?>"><?php echo $dados["res_retpedag"]; ?></td>
                                </tr>
                                <thead class="thead-dark" style="font-size:12px">
                                <tr>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                                <th id="totalKMVazio<?php echo $nCont?>" scope="col">0.0</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th id="totalDiasVazio<?php echo $nCont?>" scope="col">0</th>
                                <th scope="col" id="totalCustoVazio<?php echo $nCont?>" >R$ 0,00</th>
                                </tr>
                            </thead>
                            </tbody>
                            </table>
                    </div>
                    <div align="center">
                    <div class="col-md-2" align="center">
                    <div class="card" align="center">
                            <div class="card-header">
                                <strong class="card-title">Resultado Financeiro</strong>
                            </div>
                            <div class="card-body">
                                <h1 id="labelTotal" class="card-text">R$ <?php echo $dados["res_totfin"]; ?></h1>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-2" align="center">
                        <div class="card" align="center">
                            <div class="card-header">
                                <strong class="card-title">Aumento Transit Time</strong>
                            </div>
                            <div class="card-body">
                                <h1 class="card-text"> <?php echo $dados["res_trantime"]; ?> Dia(s)</h1>
                            </div>
                        </div>
                        </div>
                    </div>
                    <br>
					<br>
                  <div class="col-md-12">
				  <form action="aprova.php" method="POST" enctype="multipart/form-data" class="form-horizontal"><br>
                    <div class="row form-group">					
					<div class="row form-group">
						<div class="col col-md-3"><label for="text-input" class=" form-control-label">Nº do Conhecimento</label></div>
						<div class="col-12 col-md-6"><input type="text" id="nrcte" name="nrcte" class="form-control"></div>
					</div>
					<div class="row form-group">
					   <div class="col col-md-3"><label for="text-input" class=" form-control-label">Filial do Conhecimento</label></div>
					   <div class="col-12 col-md-6"><input type="text" id="filcte" name="filcte" class="form-control"></div>
					</div><br>	
					<div class="col col-md-2">
						<label for="textarea-input" class="form-control-label" >Observações Estorno:</label>
					</div>
                    <div class="col-12 col-md-9">
						<textarea name="aprovaobs" id="aprovaobs" rows="8" placeholder="" class="form-control"></textarea>
						<input type="text" name="fre_frete" value="<?php echo $dados["res_numrese"]; ?>" hidden>
						<input type="text" name="res_solicita" value="<?php echo $dados["res_solicita"]; ?>" hidden><br>
						<button type="submit" class="btn btn-danger" id="reprova" name="reprova">Estornar Reserva </button>
						<button type="submit" class="btn btn-warning" id="inclui" name="inclui">Incluir CTE </button>
					</div>
						<br><br>
					</form>
                    </div>
                    </div> 				
                    <br>
                </div>


				</div>
							
				<?php
				$nCont = $nCont+1;
				 } else { 					 
				?>
				<button onclick="myFunction('Demo<?php echo $nCont ?>')" class="w3-button w3-block w3-<?php if ( $dados["res_embarca"] == "RETORNO VAZIO" ){echo "blue";}else if( $dados["res_embarca"] == "MANUTENCAO"){ echo "yellow";} ?> w3-left-align"><?php if ( $dados["res_embarca"] == "RETORNO VAZIO" ){echo "RETORNO VAZIO | ";}else if( $dados["res_embarca"] == "MANUTENCAO"){ echo "MANUTENÇÃO   | ";} ?> SOLICITANTE: <?php echo $dados["res_solicita"]; ?> | VEICULO: <?php echo $dados["res_veic"]; ?></button>
				<div id="Demo<?php echo $nCont ?>" class="w3-hide w3-animate-zoom">
				<div class="animated fadeIn">
				
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Solicitante</label></div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static" id="res_solicita" value="<?php echo $dados["res_solicita"] ?>"><?php echo $dados["res_solicita"] ?></p>
                            </div>
                            </div>
							<div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Codigo da Viagem</label></div>
                            <div class="col-12 col-md-3"><input type="text" disabled=""  id="res_btempo" name="res_btempo" class="form-control" value="<?php echo $dados["res_numrese"]; ?>"></div>
                            </div>
							<div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Veículo</label></div>
                            <div class="col-12 col-md-5"><input type="text" disabled="" id="res_veic" name="res_veic" class="form-control" value="<?php echo $dados["res_veic"]; ?>" ></div>
                            </div>
							<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Placa - Veiculo </label></div>
								<div class="col-12 col-md-2"><input type="text" placeholder="<?php echo  $dados["res_placa1"]; ?>" disabled="" id="res_frete" name="res_frete" class="form-control"></div>
							</div>
							<?PHP
							
							if($dados['res_embarca'] == 'MANUTENCAO')  { 
							
							?>
							<div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Depto de Manutenção</label></div>
                            <div class="col-12 col-md-5">
                                <select name="res_destina" id="res_destina" disabled=""  class="form-control">
									<option value="<?php echo $dados["res_destina"]; ?>"><?php echo $dados["res_destina"]; ?></option>
                                </select>
                            </div>
                            </div>
							<div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Tempo Previsto de Manutenção(h)</label></div>
                            <div class="col-12 col-md-1"><input type="text" id="res_btempo" disabled=""  name="res_btempo" class="form-control" value="<?php echo $dados["res_btempo"]; ?>"> </div>
                            </div>
							<?PHP
							
							}
							?>
							<div class="row form-group">
							<div class="col col-md-3"><label for="textarea-input"  class="form-control-label" >Observações de Reserva:</label></div>
                            <div class="col-12 col-md-9"><textarea rows="8" placeholder=""  disabled=""  class="form-control" id="res_obs" name="res_obs" > <?php echo $dados["res_obs"]; ?></textarea>
							</div>
							</div>
							<br><br>
						<div class="row form-group">
							<form action="aprova.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
								<div class="col col-md-3"><label for="textarea-input" class="form-control-label" >Observações de Estorno:</label></div><br>
								<div class="col-12 col-md-9"><textarea name="aprovaobs" id="aprovaobs" rows="8" placeholder="" class="form-control"> <?php echo $dados["res_obsest"]; ?></textarea></div><br><br>
								<input type="text" name="fre_frete" id="fre_frete" value="<?php echo $dados["res_numrese"]; ?>" hidden>
								<input type="text" name="solicita" id="solicita" value="<?php echo $dados["res_solicita"]; ?>" hidden>
								
								<button type="submit" class="btn btn-danger" id="reprova" name="reprova">Estornar Reserva</button>
							</form>
                        </div>
						  
                          <br>
						  
						  <br>

							
						</div>
						</div>
						</div>
						<?php
						$nCont = $nCont+1;
						}
						}
						
						//Fecha conexao 
						mysqli_close($db);
						?>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
	<?php
	$solicita    = $_POST["res_solicita"];
	
	//echo("<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Esse e o solicitante: $solicita || esse e o logado $_SESSION['login'] !');window.location.href='aprova.php'</scriptSql RELATORIO PERFORMANCE>");
	include("config.php");
	//$db = mysqli_connect('127.0.0.1','root','','gcvitrine');
	if(isset($_POST['reprova']))
		{
				
			If($solicita == $_SESSION['login'] or $_SESSION['depto'] == "ADM" ){
				
				$res_numrese = $_POST["fre_frete"];
				$obs		 = $_POST["aprovaobs"];
				
			   $insert  = mysqli_query($db,"UPDATE RESERVAS SET RES_OBS = '$obs' WHERE RES_NUMRESE = '$res_numrese'");        
			   $insertS = mysqli_query($db,"UPDATE ROTAS SET RES_STATUS = 'A' WHERE FRE_FRETE = '$res_numrese'");  
              
			  //echo "PASSOU".$res_numrese;
			  //continue;
			   
			   $insertS = mysqli_query($db,"DELETE FROM RESERVAS WHERE RES_NUMRESE = '$res_numrese'");

			 }else{
				 echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Não é possivel estornar reserva de outro solicitante!');window.location.href='aprova.php'</scriptSql RELATORIO PERFORMANCE>";
			 }
			 
			if($insert){
			  echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Estorno realizado com sucesso!');window.location.href='aprova.php'</scriptSql RELATORIO PERFORMANCE>";
			   }else{
			   echo mysqli_error($db);
			   echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Ocorreu um erro ao Estornar reserva.');window.location.href='aprova.php'</scriptSql RELATORIO PERFORMANCE>";
			}
	
	}elseif(isset($_POST['inclui'])){
				
				$res_numrese = $_POST["fre_frete"];
				$nrcte		 = $_POST["nrcte"];
				$filcte		 = $_POST["filcte"];
				
				if(Empty($nrcte)){
					echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Para incluir CTE o campo Numero do Conhecimento e Filial do conhecimento deve estar preenchido!');window.location.href='aprova.php'</scriptSql RELATORIO PERFORMANCE>";
				
				}else{
					
					$insert  = mysqli_query($db," UPDATE `reservas` SET `res_nrcte` = '$nrcte', `res_filcte` = '$filcte' WHERE `res_numrese` = '$res_numrese' "); 
					
					if($insert){
					  echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('CTE incluido com sucesso!');window.location.href='aprova.php'</scriptSql RELATORIO PERFORMANCE>";
					   }else{
					   echo mysqli_error($db);
					   echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Ocorreu um erro ao Incluir CTE.');window.location.href='aprova.php'</scriptSql RELATORIO PERFORMANCE>";
					}
				}
			}
		
		//Fecha conexão
		mysqli_close($db);

	?>

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

	
	$('.aprova').each(function (index, value) { 
		let velocidade = 60;
		let tipoVeiculo = $("#res_veic"+index+" option:selected").val();
		// Cálculos A
		let deslocamentoA = parseFloat($("#res_adeslo"+index).text()).toFixed(2);
		let descarregamentoHorasA = parseFloat($("#carreg_tempo_horas"+index).text()).toFixed(2);
		let tempoHorasA = calcularTempoHoras(velocidade , deslocamentoA);
		let tempoDiasA = calcularTempoDias(tempoHorasA);
		let custosA = calcularCustos(tipoVeiculo, tempoDiasA, deslocamentoA);
		calcularDescarregamento(descarregamentoHorasA, deslocamentoA, velocidade, tipoVeiculo, index);
		
		$("#desloc_tempo_horas"+index).text(tempoHorasA);
		$("#desloc_tempo_dias"+index).text(tempoDiasA);
		$("#desloc_custo"+index).text(custosA);
		//Fim Calculos A

		console.log(tipoVeiculo);
		
		//Calculos B 
		let deslocamentoB = parseFloat($("#res_bdeslo"+index).text()).toFixed(2);
		let descarregamentoHorasB = parseFloat($("#carregb_tempo_horas"+index).text()).toFixed(2);
		let tempoHorasB = calcularTempoHoras(velocidade , deslocamentoB);
		let tempoDiasB = calcularTempoDias(tempoHorasB);
		let custosB = calcularCustos(tipoVeiculo, tempoDiasB, deslocamentoB);
		calcularDescarregamentoB(descarregamentoHorasB, deslocamentoB, velocidade, tipoVeiculo, index);
		
		$("#deslocb_tempo_horas"+index).text(tempoHorasB);
		$("#deslocb_tempo_dias"+index).text(tempoDiasB);
		$("#deslocb_custo"+index).text(custosB);
		//Fim Calculos B
		
		//Calculos C 
		let deslocamentoC = parseFloat($("#res_cdeslo"+index).text()).toFixed(2);
		let descarregamentoHorasC = parseFloat($("#carregc_tempo_horas"+index).text()).toFixed(2);
		let tempoHorasC = calcularTempoHoras(velocidade , deslocamentoC);
		let tempoDiasC = calcularTempoDias(tempoHorasC);
		let custosC = calcularCustos(tipoVeiculo, tempoDiasC, deslocamentoC);
		calcularDescarregamentoC(descarregamentoHorasC, deslocamentoC, velocidade, tipoVeiculo, index);
		
		$("#deslocc_tempo_horas"+index).text(tempoHorasC);
		$("#deslocc_tempo_dias"+index).text(tempoDiasC);
		$("#deslocc_custo"+index).text(custosC);
		//Fim Calculos C
		
		
		// Calcular Total de KM
		let totalKM = calcularTotalKM(deslocamentoA, deslocamentoB, deslocamentoC);
		$("#totalKM"+index).text(totalKM + " KM");
		// Fim Calcular Total KM
		
		//Calcular Total de Dias
		let diasDescarregamentoA = parseFloat($("#carreg_tempo_dias"+index).text()).toFixed(2);
		let diasDescarregamentoB = parseFloat($("#carregb_tempo_dias"+index).text()).toFixed(2);
		let totalDias = calcularTotalDias(tempoDiasA, tempoDiasB, tempoDiasC, diasDescarregamentoA, diasDescarregamentoB);
		$("#totalDias"+index).text(totalDias + " Dias");
		// Fim Calcular Total de Dias
		
		//Calcular Total de Custos
		let pedagioA = parseFloat($("#ped_custo_pedagio"+index).text()).toFixed(2);
		let custoDescarregamentoA = parseFloat($("#carreg_custo"+index).text()).toFixed(2);
		let pedagioB = parseFloat($("#pedb_custo_pedagio"+index).text()).toFixed(2);
		let custoDescarregamentoB = parseFloat($("#carregb_custo"+index).text()).toFixed(2);
		let custoDescarga = parseFloat($("#res_cdescar"+index).text()).toFixed(2);
		let pedagioC = parseFloat($("#pedc_custo_pedagio"+index).text()).toFixed(2);
		let totalCustos = calcularTotalCustos(custosA, custosB, custosC, pedagioA, custoDescarregamentoA, pedagioB, custoDescarregamentoB, custoDescarga, pedagioC);
		$("#totalCusto"+index).text("R$ "+ totalCustos.toFixed(2));
		// Fim Calcular Custos
		
		//Calcular Retorno Vazio
		let deslocVazio = parseFloat($("#res_retdeslo"+index).text()).toFixed(2);
		let tempoHorasVazio = calcularTempoHoras(velocidade , deslocVazio);
		let tempoDiasVazio = calcularTempoDias(tempoHorasVazio);
		let custosVazio = calcularCustos(tipoVeiculo, tempoDiasVazio, deslocVazio);
		
		$("#desloc_vazio_tempo_horas"+index).text(tempoHorasVazio);
		$("#desloc_vazio_tempo_dias"+index).text(tempoDiasVazio);
		$("#desloc_vazio_custo"+index).text(custosVazio);
		$("#totalKMVazio"+index).text(deslocVazio + " KM");
		$("#totalDiasVazio"+index).text(tempoDiasVazio + " Dias");
		$("#totalCustoVazio"+index).text(tempoDiasVazio);
		// Fim Calcular Retorno Vazio
		
		// Calcular Custo Total Vazio
		let custoVazio = parseFloat($("#desloc_vazio_custo"+index).text()).toFixed(2);
		let pedagioVazio = parseFloat($("#res_retpedag"+index).text()).toFixed(2);
		let totalCustoVazio = calcularTotalCustoVazio(custoVazio, pedagioVazio);
		$("#totalCustoVazio"+index).text("R$ "+totalCustoVazio);
		
		// Fim Calcular Custo Total Vazio
	});
	
	function calcularTempoHoras(velocidade, deslocamento){
		let tempoHoras = parseFloat((deslocamento / velocidade).toFixed(2));
		return tempoHoras;
	}
	
	function calcularTempoDias(tempoHoras){
		let tempoDias = parseFloat(tempoHoras / 10).toFixed(2);
		return tempoDias;
	} 
	
	function calcularCustos(tipoVeiculo, tempoDias, deslocamento){
		let valorFixo;
		let valorVariavel;
		let custo;
		switch (tipoVeiculo){
			case "Leve, 4 ton, 2E" :
				valorFixo = 260.83;
				valorVariavel = 1.15;
				custo = parseFloat((tempoDias * valorFixo) + (deslocamento * valorVariavel)).toFixed(2);
			break;
			
			case "Toco, 7 ton, 2E" :
				valorFixo = 268.07;
				valorVariavel = 1.30;
				custo = parseFloat((tempoDias * valorFixo) + (deslocamento * valorVariavel)).toFixed(2);
			break;
			
			case "Truck, 13 ton, 3E" :
				valorFixo = 300.55;
				valorVariavel = 1.44;
				custo = parseFloat((tempoDias * valorFixo) + (deslocamento * valorVariavel)).toFixed(2);
			break;
			
			case "Cavalo+Carreta, 25 ton, 5E" :
				valorFixo = 397.52;
				valorVariavel = 1.85;
				custo = parseFloat((tempoDias * valorFixo) + (deslocamento * valorVariavel)).toFixed(2);
			break;
			
			case "Cavalo+Carreta, 30 ton, 6E" :
				valorFixo = 424.62;
				valorVariavel = 1.87;
				custo = parseFloat((tempoDias * valorFixo) + (deslocamento * valorVariavel)).toFixed(2);
			break;
			
			case "Rodo-Trem, _ ton, _E" :
				valorFixo = 550.00;
				valorVariavel = 2.00;
				custo = parseFloat((tempoDias * valorFixo) + (deslocamento * valorVariavel)).toFixed(2);
			break;
			
		}
		
		return custo;
	}

	function calcularDescarregamento(tempoHorasDescarregamento, deslocamento, velocidade, tipoVeiculo, index){
		let tempoDias = calcularTempoDias(tempoHorasDescarregamento);
		let custo = calcularCustos(tipoVeiculo, tempoDias, deslocamento);
		$("#carreg_tempo_dias"+index).text(tempoDias);
		$("#carreg_custo"+index).text(custo);
	}
	
	function calcularDescarregamentoB(tempoHorasDescarregamento, deslocamento, velocidade, tipoVeiculo, index){
		let tempoDias = calcularTempoDias(tempoHorasDescarregamento);
		let custo = calcularCustos(tipoVeiculo, tempoDias, deslocamento);
		$("#carregb_tempo_dias"+index).text(tempoDias);
		$("#carregb_custo"+index).text(custo);
	}
	
	function calcularDescarregamentoC(tempoHorasDescarregamento, deslocamento, velocidade, tipoVeiculo, index){
		let tempoDias = calcularTempoDias(tempoHorasDescarregamento);
		let custo = calcularCustos(tipoVeiculo, tempoDias, deslocamento);
		$("#carregc_tempo_dias"+index).text(tempoDias);
		$("#carregc_custo"+index).text(custo);
	}
	
	function calcularTotalKM(deslocamentoA, deslocamentoB, deslocamentoC){
		let total;
		return total = parseFloat(deslocamentoA) + parseFloat(deslocamentoB) + parseFloat(deslocamentoC);
	}
	
	function calcularTotalDias(tempoDiasA, tempoDiasB, tempoDiasC, diasDescarregamentoA, diasDescarregamentoB, index){
		let totalDias;
		totalDias = parseFloat(tempoDiasA) + parseFloat(tempoDiasB) + parseFloat(tempoDiasC) + parseFloat(diasDescarregamentoA) + parseFloat(diasDescarregamentoB);
		let totalDiasNumber = parseFloat(totalDias).toFixed(2);
		return totalDiasNumber;
	}
	
	function calcularTotalCustos(custosA, custosB, custosC, pedagioA, custoDescarregamentoA, pedagioB, custoDescarregamentoB, custoDescarga, pedagioC){
		let totalCusto = parseFloat(custosA) + parseFloat(custosB) + parseFloat(custosC) + parseFloat(pedagioA) + parseFloat(custoDescarregamentoA) + parseFloat(pedagioB) + parseFloat(custoDescarregamentoB) + parseFloat(custoDescarga) + parseFloat(pedagioC);
		totalCusto = parseFloat(totalCusto);
		return totalCusto;
	}

	function calcularTotalCustoVazio(deslocVazio, pedagioVazio){
		let totalCustoVazio = parseFloat(deslocVazio) + parseFloat(pedagioVazio);
		totalCustoVazio = parseFloat(totalCustoVazio);
		return totalCustoVazio;
	}
	
    </script>
</body>
</html>
