<?php
/*
* Criando e exportando planilhas do Excel
* /
*/

$datade 	= date('Y-m-d',strtotime($_POST["datade"]));
$dataate 	= date('Y-m-d',strtotime($_POST["dataate"]));

include("config.php");

//echo $query;
//Query relatorio
$query = "SELECT fre_frete,via_cdfimvia,via_uffim,mot_veicu,mot_placa1,mot_carroc,res_status,res_nrcte,res_totfin,Upper(res_embarca) as res_embarca,res_destina,res_tpcarga,res_peso,res_bcidade,res_ccidade FROM rotas as a LEFT JOIN reservas as b ON a.fre_frete = b.res_numrese WHERE a.via_dtini between '$datade' and '$dataate' ";
$query = mysqli_query($db,$query);

$arquivo = 'performance.xls';

// Tabela HTML
$html = '';
$html .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="3" align="center">Performance Vitrine</tr>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><b>Nr. Viagem</b></td>';
$html .= '<td><b>Cidade Destino</b></td>';
$html .= '<td><b>UF</b></td>';
$html .= '<td><b>Placa Motor</b></td>';
$html .= '<td><b>Semi-Reboque</b></td>';
$html .= '<td><b>Tipo de Carroceria</b></td>';
$html .= '<td><b>Reservado</b></td>';
$html .= '<td><b>CT-E Frete Retorno</b></td>';
$html .= '<td><b>Valor do Frete</b></td>';
$html .= '<td><b>Embarcador</b></td>';
$html .= '<td><b>Destinatário</b></td>';
$html .= '<td><b>Tipo Carga</b></td>';
$html .= '<td><b>Peso</b></td>';
$html .= '<td><b>Origem</b></td>';
$html .= '<td><b>Destino</b></td>';
$html .= '</tr>';

	while($dados = mysqli_fetch_array($query)){

	//$lAberto = EMPTY($dados["res_embarca"]);

		if	( $dados["res_status"] == "P" )
	{
		$descStatus = "MANUTENÇÃO";
	}
		else if($dados["res_status"] == "R")
		{
			$descStatus =  "RETORNO";
		}
	else
	{
	$descStatus = "AGUARDANDO RESERVA";
	}

	if	( $dados["res_embarca"]== "RETORNO VAZIO")
		{
		$descEmbarca	= $dados["res_embarca"];
		}
		else if( $dados["res_embarca"]== "MANUTENCAO")
		{
		$descEmbarca	= $dados["res_embarca"];
		}else{
		$descEmbarca	= "FRETE RETORNO";
		}

		$html .= '<tr>';
		$html .= '<td>'.$dados["fre_frete"].'</td>';
		$html .= '<td>'.$dados["via_cdfimvia"].'</td>';
		$html .= '<td>'.$dados["via_uffim"].'</td>';
		$html .= '<td>'.$dados["mot_veicu"].'</td>';
		$html .= '<td>'.$dados["mot_placa1"].'</td>';
		$html .= '<td>'.$dados["mot_carroc"].'</td>';
		$html .= '<td>'.$descStatus.'</td>';
		$html .= '<td>'.$dados["res_nrcte"].'</td>';
		$html .= '<td>'.$dados["res_totfin"].'</td>';
		$html .= '<td>'.$dados["res_embarca"].'</td>';
		$html .= '<td>'.$dados["res_destina"].'</td>';
		$html .= '<td>'.$dados["res_tpcarga"].'</td>';
		$html .= '<td>'.$dados["res_peso"].'</td>';
		$html .= '<td>'.$dados["res_bcidade"].'</td>';
		$html .= '<td>'.$dados["res_ccidade"].'</td>';
		$html .= '</tr>';
	}
$html .= '</table>';
// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit;
