<?php
    session_start();
    include_once('config.php');

    $datade = ($_POST["datade"]);
    $dataate = ($_POST["dataate"]);
    //echo $a=date('Y-d-m', strtotime($datade));

    $d_de = substr($datade,0,2);
    $m_de = substr($datade,3,2);
    $y_de = substr($datade,6,4);
    $d_ate = substr($dataate,0,2);
    $m_ate = substr($dataate,3,2);
    $y_ate = substr($dataate,6,4);
    $sep='-';
    $data_formate_de= $y_de.$sep.$m_de.$sep.$d_de;
    $data_formate_ate= $y_ate.$sep.$m_ate.$sep.$d_ate;
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Export</title>
	<head>
	<body>
		<?php
        // RETORNO POST
        //$datade = trim(date('Y-m-d', strtotime($_POST["datade"])));
        //$dataate = trim(date('Y-m-d', strtotime($_POST["dataate"])));

		// ARQUIVO
        $extensao = ".xls";
        $nome = 'planilha-performance-';
        $complemento = date("Y-m-d H:i:s");
		$arquivo = $nome.$complemento.$extensao;

		// TITULO-TABELA
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="17"><b>Relatorio de Performance</b></tr>';
		$html .= '</tr>';

        //CABECALHO-TABELA
        $html .= '<tr>';
        $html .= '<td><b>Nr. Viagem</b></td>';
        $html .= '<td><b>Data inicio</b></td>';
        $html .= '<td><b>Data disposição veículo</b></td>';
        $html .= '<td><b>Data reserva</b></td>';
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

		//Selecionar todos os itens da tabela
        $query = "SELECT
                 a.fre_frete
                 ,DATE_FORMAT(a.via_dtini, '%d-%m-%Y') AS via_dtini
                 ,DATE_FORMAT(a.via_dtdispo,'%d-%m-%Y') AS via_dtdispo
                 ,DATE_FORMAT(b.res_dtinc, '%d-%m-%Y') AS res_dtinc
                ,a.via_cdfimvia
                ,a.via_uffim
                ,a.mot_veicu
                ,a.mot_placa1
                ,a.mot_carroc
                ,a.res_status
                ,b.res_nrcte
                ,b.res_totfin
                ,UPPER(b.res_embarca) AS res_embarca
                ,b.res_destina
                ,b.res_tpcarga
                ,b.res_peso
                ,b.res_bcidade
                ,b.res_ccidade
                ,CASE res_status
                    WHEN 'P' THEN 'MANUTENCAO'
                    WHEN 'R' THEN
                       CASE res_embarca
                         WHEN 'RETORNO VAZIO' THEN 'RETORNO VAZIO'
                       ELSE
                         'FRETE-RETORNO'
                       END
                    ELSE 'EM-ABERTO'
                  END AS desc_status
                FROM rotas AS a
                LEFT JOIN reservas AS b ON a.fre_frete = b.res_numrese
                WHERE a.via_dtini BETWEEN '".$data_formate_de."' AND '".$data_formate_ate."'
                ORDER BY a.via_dtini";

        //WHERE a.via_dtini BETWEEN '".$datade."' AND '".$dataate."'
        //$params = array("'".$datade."'","'".$dataate."'");
        //$params = array($datade,$dataate);
		$result = mysqli_query($db ,$query);

		while($dados = mysqli_fetch_assoc($result)){
		    //LINHA
            $html .= '<tr>';
            $html .= '<td>'.$dados["fre_frete"].'</td>';
            $html .= '<td>'.$dados["via_dtini"].'</td>';
            $html .= '<td>'.$dados["via_dtdispo"].'</td>';
            $html .= '<td>'.$dados["res_dtinc"].'</td>';
            $html .= '<td>'.$dados["via_cdfimvia"].'</td>';
            $html .= '<td>'.$dados["via_uffim"].'</td>';
            $html .= '<td>'.$dados["mot_veicu"].'</td>';
            $html .= '<td>'.$dados["mot_placa1"].'</td>';
            $html .= '<td>'.$dados["mot_carroc"].'</td>';
            //
            $html .= '<td>'.$dados["desc_status"].'</td>';
            //
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
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		//echo $html;
		echo $html;
		exit; ?>

	</body>
</html>