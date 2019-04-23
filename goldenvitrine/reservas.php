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

$fre_frete = $_POST["fre_frete"];
$string = $_POST["string"];
$mot_placa1 = $_POST["mot_placa1"];

$hora1      = strtotime('00:01');
$hora2      = strtotime('12:00');
$horaAtual = strtotime(date('H:i'));

If($_SESSION['depto'] == "COMUM"){
    
	switch ($horaAtual)
	{
		case ($horaAtual > $hora1 && $horaAtual < $hora2) : $retorno = "<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Não é possivel realizar reservas antes das 12:00hs !');window.location.href='rotas.php'</scriptSql RELATORIO PERFORMANCE>"; break;
	}
print $retorno;

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
    <title>GOLDEN VITRINE | RESERVAS</title>
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
                    <!--<a style="color:#000000" href="destruirSessao.php">Sair</a>-->
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
                        <h1>Cadastro de Reservas                   || <?php echo "         ".$string; ?></h1>
                    </div>
                </div>
            </div>
        </div>
            <div class="content mt-3">
            <div class="card">
                        <div class="card-body card-block">
                            <form action="create-reserva.php" method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="row form-group">
								<div class="col col-md-3"><label class=" form-control-label">Solicitante</label></div>
								<div class="col-12 col-md-9">
									<p class="form-control-static" id="res_solicita" value="<?php echo $_SESSION['login'] ?>"><?php echo $_SESSION['login'] ?></p>
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Embarcador (Nome)</label></div>
								<div class="col-12 col-md-6"><input type="text" id="res_embarca" name="res_embarca" class="form-control"></div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3"><label for="email-input" class=" form-control-label">Destinatário  (Nome)</label></div>
								<div class="col-12 col-md-6"><input type="text" id="res_destina" name="res_destina"  class="form-control"></div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3"><label for="email-input" class=" form-control-label">Carga (Tipo)</label></div>
								<div class="col-12 col-md-3"><input type="text" id="res_tpcarga" name="res_tpcarga" class="form-control"></div>
								<div class="col col-md-1"><label for="email-input" class=" form-control-label">Peso: </label></div><br>
								<div class="col-12 col-md-3"><input type="text" id="res_peso" name="res_peso" class="form-control"></div>
								</div>
								<hr>
								<label>LOCAIS OPERACIONAIS</label>
							<!--    <div class="row form-group">
									<div class="col col-md-3"><br><label for="select" class=" form-control-label">A = Local de Destino  </label></div>
										<div class="col-12 col-md-6"><br>
										<select id="res_auf" name="res_auf" ></select>
										<select id="res_acidade" name="res_acidade" ></select>
											<script language="JavaScript" type="text/javascript" charset="utf-8">
											  new dgCidadesEstados({
												cidade: document.getElementById('res_acidade'),
												estado: document.getElementById('res_auf')
											  })
											</script>
									</div>
								</div>
							-->	
								<div class="row form-group">
									<div class="col col-md-3"><br><label for="select" class=" form-control-label"> B = Local de coleta da Carga Retorno </label></div>
										<div class="col-12 col-md-6"><br>
										<select id="res_buf" name="res_buf"></select>
										<select id="res_bcidade" name="res_bcidade"></select>
											<script language="JavaScript" type="text/javascript" charset="utf-8">
											  new dgCidadesEstados({
												cidade: document.getElementById('res_bcidade'),
												estado: document.getElementById('res_buf')
											  })
											</script>
											<label for="res_bdata">Data da Coleta: </label>
											<input type="text" name="res_bdata" id="res_bdata" maxlength="10" placeholder="dd/mm/aaaa" onkeypress="mascaraData(this)" />
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col col-md-3"><br><label for="select" class=" form-control-label">C = Local de entrega da Carga Retorno</label></div>
										<div class="col-12 col-md-6"><br>
										<select id="res_cuf" name="res_cuf"></select>
										<select id="res_ccidade" name="res_ccidade"></select>
											<script language="JavaScript" type="text/javascript" charset="utf-8">
											  new dgCidadesEstados({
												cidade: document.getElementById('res_ccidade'),
												estado: document.getElementById('res_cuf')
											  })
											</script>
											<label for="res_cdata">Data Agendada: </label>
											<input type="text" name="res_cdata" id="res_cdata" maxlength="10" placeholder="dd/mm/aaaa" onkeypress="mascaraData(this)" />
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col col-md-3"><br><label for="select" class=" form-control-label">D = Local de reposicionamento da frota</label></div>
										<div class="col-12 col-md-6"><br>
										<select id="res_duf" name="res_duf"></select>
										<select id="res_dcidade" name="res_dcidade"></select>
											<script language="JavaScript" type="text/javascript" charset="utf-8">
											  new dgCidadesEstados({
												cidade: document.getElementById('res_dcidade'),
												estado: document.getElementById('res_duf')
											  })
											</script>
											<label for="res_ddata">Data de Retorno: </label>
											<input type="text" name="res_ddata" id="res_ddata" maxlength="10" placeholder="dd/mm/aaaa" onkeypress="mascaraData(this)" />
									</div>
								</div>
								<hr>
								<br>
								<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Placa - Veiculo </label></div>
								<div class="col-12 col-md-2"><input type="text" placeholder="<?php echo $mot_placa1; ?>" disabled="" id="res_placa1" name="res_placa1" class="form-control"></div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3"><label for="select" class=" form-control-label">Veiculo</label></div>
								<div class="col-12 col-md-3">
									<select name="res_veic" id="res_veic" class="form-control">
									<option value="Leve, 4 ton, 2E" data-fixo="260.83" data-variavel="1.15">Leve, 4 ton, 2E</option>
									<option value="Toco, 7 ton, 2E" data-fixo="268.07" data-variavel="1.30">Toco, 7 ton, 2E</option>
									<option value="Truck, 13 ton, 3E" data-fixo="300.55" data-variavel="1.44">Truck, 13 ton, 3E</option>
									<option value="Cavalo+Carreta, 25 ton, 5E" data-fixo="397.52" data-variavel="1.85">Cavalo+Carreta, 25 ton, 5E</option>
									<option value="Cavalo+Carreta, 30 ton, 6E" data-fixo="424.62" data-variavel="1.87">Cavalo+Carreta, 30 ton, 6E</option>
									<option value="Rodo-Trem, _ ton, _E" data-fixo="550.00" data-variavel="2.00">Rodo-Trem, 90 ton, _E</option>
									</select>
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label">Frete a Receber</label></div>
								<div class="col-12 col-md-2"><input type="text" placeholder="R$ 99.999,99" id="res_frete" name="res_frete" class="form-control"></div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3"><label for="select" class=" form-control-label">Pedagio Reembolsado</label></div>
								<div class="col-12 col-md-3">
									<select name="res_pedre" id="res_pedre" class="form-control">
									<option value="SIM">Sim</option>
									<option value="NAO">Não</option>
									</select>
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3"><label for="select" class=" form-control-label">Tem Seguro ?</label></div>
								<div class="col-12 col-md-3">
									<select name="res_seguro" id="res_seguro" class="form-control">
									<option value="SIM">Sim</option>
									<option value="NAO">Não</option>
									</select>
								</div>
								</div>
								<div class="row form-group">
								<div class="col col-md-3"><label for="select" class=" form-control-label">Averba ?</label></div>
								<div class="col-12 col-md-3">
									<select name="res_averba" id="res_averba" class="form-control">
									<option value="SIM">Sim</option>
									<option value="NAO">Não</option>
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
										<td bgcolor="#F2F5A9" contenteditable="true" id="res_adeslo">0</td>
										<td class="editavel">60</td>
										<td id="desloc_tempo_horas">0</td>
										<td id="desloc_tempo_dias" class="tempo_dias">0</td>
										<td id="desloc_custo">0,00</td>
									</tr>
									<tr style="font-size:12px">
									<th >Pedágio (R$)</th>
										<td>A > B</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#F2F5A9" contenteditable="true" id="ped_custo_pedagio">0,00</td>
									</tr>
									<tr style="font-size:12px">
									<th >Carregamento (h)</th>
										<td>B</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#F2F5A9" contenteditable="true" id="carreg_tempo_horas">0</td>
										<td id="carreg_tempo_dias" class="tempo_dias">0</td>
										<td id="carreg_custo">0,00</td>
									</tr>
									<tr style="font-size:12px">
									<th >Deslocamento (KM)</th>
										<td>B > C</td>
										<td bgcolor="#F2F5A9" contenteditable="true" id="res_bdeslo">0</td>
										<td>60</td>
										<td id="deslocb_tempo_horas">0</td>
										<td id="deslocb_tempo_dias" class="tempo_dias">0</td>
										<td id="deslocb_custo">0,00</td>
									</tr>
									<tr style="font-size:12px">
									<th >Pedágio (R$)</th>
										<td>B > C</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#F2F5A9" contenteditable="true" id="pedb_custo_pedagio">0,00</td>
									</tr>
									<tr style="font-size:12px">
									<th >Descarregamento (h)</th>
										<td>C</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#F2F5A9" contenteditable="true"  id="carregb_tempo_horas">0</td>
										<td id="carregb_tempo_dias" class="tempo_dias">0</td>
										<td id="carregb_custo" >0,00</td>
									</tr>
									<tr style="font-size:12px">
									<th >Descarga</th>
										<td>C</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#F2F5A9" contenteditable="true" id="res_cdescar">0,00</td>
									</tr>
									<tr style="font-size:12px">
									<th >Deslocamento (KM)</th>
										<td>C > D</td>
										<td bgcolor="#F2F5A9" contenteditable="true" id="res_cdeslo">0</td>
										<td>60</td>
										<td id="deslocc_tempo_horas">0</td>
										<td id="deslocc_tempo_dias">0</td>
										<td id="deslocc_custo">0,00</td>
									</tr>
									<tr style="font-size:12px">
									<th >Pedagio (R$)</th>
										<td>C > D</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#F2F5A9" contenteditable="true" id="pedc_custo_pedagio">0,00</td>
									</tr>
									<thead class="thead-dark" style="font-size:12px">
									<tr>
									<th scope="col">Total</th>
									<th scope="col"></th>
									<th id="totalKM"scope="col">0.0 KM</th>
									<th scope="col"></th>
									<th scope="col"></th>
									<th id="totalDias" scope="col">0 Dias</th>
									<th id="totalCusto" scope="col">R$ 0,00</th>
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
										<td bgcolor="#F2F5A9" contenteditable="true" id="res_retdeslo">0</td>
										<td>60</td>
										<td id="desloc_vazio_tempo_horas">0</td>
										<td id="desloc_vazio_tempo_dias">0</td>
										<td id="desloc_vazio_custo">0,00</td>
									</tr>
									<tr style="font-size:12px">
									<th >Pedagio</th>
										<td>A > D</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#E6E6E6">--</td>
										<td bgcolor="#F2F5A9" contenteditable="true" id="res_retpedag">0,00</td>
									</tr>
									<thead class="thead-dark" style="font-size:12px">
									<tr>
									<th scope="col">Total</th>
									<th scope="col"></th>
									<th id="totalKMVazio" scope="col">0.0</th>
									<th scope="col"></th>
									<th scope="col"></th>
									<th id="totalDiasVazio" scope="col">0</th>
									<th scope="col" id="totalCustoVazio" >R$ 0,00</th>
									</tr>
								</thead>
								</tbody>
								</table>
							</div>
							<div align="center">
							<div class="col-md-3" align="center">
							<div class="card" align="center">
									<div class="card-header">
										<strong class="card-title">Resultado Financeiro</strong>
									</div>
									<div class="card-body">
										<h1 id="labelTotal" class="card-text">R$ <span class="resultadoFinal">0,00</span></h1>
										<input type="text" name="res_totfin" class="resultadoFinal" value="" hidden>
									</div>
								</div>
								</div>
								<div class="col-md-3" align="center">
								<div class="card" align="center">
									<div class="card-header">
										<strong class="card-title">Aumento Transit Time</strong>
									</div>
									<div class="card-body">
										<h1 class="card-text"> <span id="res_trantime">0</span> Dia(s)</h1>
										<input type="text" name="res_trantime" id="" class="res_trantime_value" value="" hidden>
									</div>
								</div>
								</div>
									<input type="text" name="res_adeslo" id="res_adeslo" value="10" hidden>
									<input type="text" name="res_apedag" id="ped_custo_pedagio" hidden>
									<input type="text" name="res_btempo" id="carreg_tempo_horas" hidden>
									<input type="text" name="res_bdeslo" id="res_bdeslo" value="" hidden>
									<input type="text" name="res_bpedag" id="pedb_custo_pedagio" value="" hidden>
									<input type="text" name="res_ctempo" id="carregb_tempo_horas" value="" hidden>
									<input type="text" name="res_cdescar" id="res_cdescar" value="" hidden>
									<input type="text" name="res_ddeslo" id="res_cdeslo" value="" hidden>
									<input type="text" name="res_dpedag" id="pedc_custo_pedagio" value="" hidden>
									<input type="text" name="res_retdeslo" id="res_retdeslo" value="" hidden>
									<input type="text" name="res_retpedag" id="res_retpedag" value="" hidden>
									<input type="text" name="fre_frete" id="fre_frete" value="<?php echo $fre_frete ?>" hidden>
									<input type="text" name="res_placa1" id="res_placa1" value="<?php echo $mot_placa1; ?>" hidden>
									<input type="text" name="res_solicita" id="res_solicita" value="<?php echo $_SESSION['login'] ?>" hidden>
									

							</div>
							<div class="col-md-6">
							<button type="submit" id="incluir" name="incluir" class="btn btn-warning">Incluir Reserva</button>
							<button type="button" class="btn btn-danger">Limpar</button>
							</div>
                    </form>
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
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script src="cidades-estados.js"></script>
    
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

    $(function(){
        setInterval(function(){
            calculaResFinanceiro();
            calculaTransitTime();
            popularValuesInputEditavel();
        },1000)
    })

        var tdPedagioA = document.getElementById('ped_custo_pedagio');
        tdPedagioA.addEventListener('input', function(){
            calculaTotal();
        });

        var tdPedagioB = document.getElementById('pedb_custo_pedagio');
        tdPedagioB.addEventListener('input', function(){
            calculaTotal();
        });

        var tdPedagioC = document.getElementById('pedc_custo_pedagio');
        tdPedagioC.addEventListener('input', function(){
            calculaTotal();
        });

        var tdPedagioVazio = document.getElementById('res_retpedag');
        tdPedagioVazio.addEventListener('input', function(){
            calculaTotalVazio();
        });

        var tdDescarga = document.getElementById('res_cdescar');
        tdDescarga.addEventListener('input', function(){
            calculaTotal();
        });


        $("#res_veic").change(function(){
            var selected = $(this).find('option:selected');
            valorFixo = selected.data('fixo');
            valorVariavel = selected.data('variavel');
            calculaCustosA();
            calculaCustosB();
            calculaCustosC();
            calculaCustosRetornoVazio();
            calculaCarregamentoA();
            calculaCarregamentoB();
            calculaTotal();
        });

        let valorFixo = 260.83;
        let valorVariavel = 1.15;
        var tdDeslocamento = document.getElementById('res_adeslo');

        tdDeslocamento.addEventListener('input', function(){
            calculaCustosA();
            calculaCarregamentoA();
            calculaTotal();
        });

        var tdCarregamento = document.getElementById('carreg_tempo_horas');

        tdCarregamento.addEventListener('input', function(){
            calculaCarregamentoA();
            calculaTotal();
        });

        var tdDeslocamentoB = document.getElementById('res_bdeslo');

        tdDeslocamentoB.addEventListener('input', function(){
            calculaCustosB();
            calculaTotal();
        });

        var tdCarregamentoB = document.getElementById('carregb_tempo_horas');
        tdCarregamentoB.addEventListener('input', function(){
            calculaCarregamentoB();
            calculaTotal();
        });

        var tdDeslocamentoC = document.getElementById('res_cdeslo');
        tdDeslocamentoC.addEventListener('input', function(){
            calculaCustosC();
            calculaTotal();
        });

        var tdDeslocamentoVazio = document.getElementById('res_retdeslo');
        tdDeslocamentoVazio.addEventListener('input', function(){
            calculaCustosRetornoVazio();
            calculaTotalVazio();
        });

        function calculaCustosRetornoVazio(){
            let velocidade = 60;
            let deslocamentoVazio = parseFloat($("#res_retdeslo").text()); 
            let tempoHoras = parseFloat((deslocamentoVazio / velocidade).toFixed(2));
            let tempoDias = parseFloat((tempoHoras / 10).toFixed(2));
            let custo = parseFloat((tempoDias * valorFixo) + (deslocamentoVazio * valorVariavel)).toFixed(2);
            $("#desloc_vazio_tempo_horas").text(tempoHoras);
            $("#desloc_vazio_tempo_dias").text(tempoDias);
            $("#desloc_vazio_custo").text(custo);
        }

        function calculaTotalVazio(){
            let deslocamentoA = parseFloat($("#res_retdeslo").text());
            let somaKMVazio = deslocamentoA;
            let totalDiasVazio = parseFloat($("#desloc_vazio_tempo_dias").text());
            let totalCustoVazio = parseFloat($("#desloc_vazio_custo").text()) + parseFloat($("#res_retpedag").text());
            $("#totalKMVazio").text(somaKMVazio.toFixed(2) + " KM");
            $("#totalDiasVazio").text(totalDiasVazio.toFixed(2));
            $("#totalCustoVazio").text(totalCustoVazio.toFixed(2));
            calculaResFinanceiro();
        }


        function calculaCustosA(){
            let velocidade = 60;
            let deslocamentoA = parseFloat($("#res_adeslo").text()); 
            let tempoHoras = parseFloat((deslocamentoA / velocidade).toFixed(2));
            let tempoDias = parseFloat((tempoHoras / 10).toFixed(2));
            let custo = parseFloat((tempoDias * valorFixo) + (deslocamentoA * valorVariavel)).toFixed(2);
            $("#desloc_tempo_horas").text(tempoHoras);
            $("#desloc_tempo_dias").text(tempoDias);
            $("#desloc_custo").text(custo);
        }

        function calculaCustosB(){
            let velocidade = 60;
            let deslocamentoB = parseFloat($("#res_bdeslo").text()); 
            let tempoHoras = parseFloat((deslocamentoB / velocidade).toFixed(2));
            let tempoDias = parseFloat((tempoHoras / 10).toFixed(2));
            let custo = parseFloat((tempoDias * valorFixo) + (deslocamentoB * valorVariavel)).toFixed(2);
            $("#deslocb_tempo_horas").text(tempoHoras);
            $("#deslocb_tempo_dias").text(tempoDias);
            $("#deslocb_custo").text(custo);
        }

        function calculaCustosC(){
            let velocidade = 60;
            let deslocamentoA = parseFloat($("#res_cdeslo").text()); 
            let tempoHoras = parseFloat((deslocamentoA / velocidade).toFixed(2));
            let tempoDias = parseFloat((tempoHoras / 10).toFixed(2));
            let custo = parseFloat((tempoDias * valorFixo) + (deslocamentoA * valorVariavel)).toFixed(2);
            $("#deslocc_tempo_horas").text(tempoHoras);
            $("#deslocc_tempo_dias").text(tempoDias);
            $("#deslocc_custo").text(custo);
        }

        function calculaCarregamentoA(){
            let deslocamentoA = parseFloat($("#res_adeslo").text()); 
            let tempoHoras = parseFloat($("#carreg_tempo_horas").text()).toFixed(2);
            let tempoDias = parseFloat(tempoHoras / 10).toFixed(2);
            let custo = parseFloat((tempoDias * valorFixo) + (deslocamentoA * valorVariavel)).toFixed(2);
            $("#carreg_tempo_dias").text(tempoDias);
            $("#carreg_custo").text(custo);
        }

        function calculaCarregamentoB(){
            let deslocamentoA = parseFloat($("#res_bdeslo").text()); 
            let tempoHoras = parseFloat($("#carregb_tempo_horas").text()).toFixed(2);
            let tempoDias = parseFloat(tempoHoras / 10).toFixed(2);
            let custo = parseFloat((tempoDias * valorFixo) + (deslocamentoA * valorVariavel)).toFixed(2);
            $("#carregb_tempo_dias").text(tempoDias);
            $("#carregb_custo").text(custo);
        }   

        function calculaTotal(){
            let deslocamentoA = parseFloat($("#res_adeslo").text());
            let deslocamentoB = parseFloat($("#res_bdeslo").text());
            let deslocamentoC = parseFloat($("#res_cdeslo").text());
            let somaKM = deslocamentoA + deslocamentoB + deslocamentoC;
            let totalDias = parseFloat($("#desloc_tempo_dias").text()) + parseFloat($("#carreg_tempo_dias").text()) + parseFloat($("#deslocb_tempo_dias").text()) + parseFloat($("#carregb_tempo_dias").text()) + parseFloat($("#deslocc_tempo_dias").text());
            let totalCusto = parseFloat($("#desloc_custo").text()) + parseFloat($("#deslocb_custo").text()) + parseFloat($("#carreg_custo").text()) + parseFloat($("#carregb_custo").text()) + parseFloat($("#ped_custo_pedagio").text()) + parseFloat($("#pedb_custo_pedagio").text()) + parseFloat($("#res_cdescar").text()) + parseFloat( $("#deslocc_custo").text()) + parseFloat($("#pedc_custo_pedagio").text());
            $("#totalKM").text(somaKM.toFixed(2) + " KM");
            $("#totalDias").text(totalDias.toFixed(2));
            $("#totalCusto").text(totalCusto.toFixed(2));
            calculaResFinanceiro();
            calculaTransitTime();
        }

        function calculaResFinanceiro(){
            let freteAReceber = parseFloat($("#res_frete").val());
            let custoTotal = parseFloat($("#totalCusto").text());
            let custoTotalVazio = parseFloat($("#totalCustoVazio").text());

            let resultadoFinanceiro = (freteAReceber - custoTotal) + custoTotalVazio;            
            $(".resultadoFinal").text(resultadoFinanceiro.toFixed(2));
        }

        function calculaTransitTime(){
            let diasOperacaoCarga = parseFloat($("#totalDias").text());
            let diasRetornoVazio = parseFloat($("#totalDiasVazio").text());

            let transitTime = diasOperacaoCarga - diasRetornoVazio;           
            $("#res_trantime").text(transitTime.toFixed(2));
            $(".res_trantime_value").val(transitTime); 
        }

        function popularValuesInputEditavel(){
            var res_adeslo = parseFloat($("#res_adeslo").text());
            $('input[name="res_adeslo"]').val(res_adeslo);

            var ped_custo_pedagio = parseFloat($("#ped_custo_pedagio").text());
            $('input[name="res_apedag"]').val(ped_custo_pedagio)

            var carreg_tempo_horas = parseFloat($("#carreg_tempo_horas").text());
            $('input[name="res_btempo"]').val(carreg_tempo_horas);

            var carregb_tempo_horas = parseFloat($("#carregb_tempo_horas").text());
            $('input[name="res_ctempo"]').val(carregb_tempo_horas)

            var res_bdeslo = parseFloat($("#res_bdeslo").text());
            $('input[name="res_bdeslo"]').val(res_bdeslo)

            var pedb_custo_pedagio = parseFloat($("#pedb_custo_pedagio").text());
            $('input[name="res_bpedag"]').val(pedb_custo_pedagio)

            var res_cdescar = parseFloat($("#res_cdescar").text());
            $('input[name="res_cdescar"]').val(res_cdescar)

            var res_cdeslo = parseFloat($("#res_cdeslo").text());
            $('input[name="res_ddeslo"]').val(res_cdeslo)

            var pedc_custo_pedagio = parseFloat($("#pedc_custo_pedagio").text());
            $('input[name="res_dpedag"]').val(pedc_custo_pedagio)

            var res_retdeslo = parseFloat($("#res_retdeslo").text());
            $('input[name="res_retdeslo"]').val(res_retdeslo)

            var res_retpedag = parseFloat($("#res_retpedag").text());
            $('input[name="res_retpedag"]').val(res_retpedag)

            var res_totfin = parseFloat($(".resultadoFinal").text());
            $('input[name="res_totfin"]').val(res_totfin.toFixed(2));
            
        }   

    </script>

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
