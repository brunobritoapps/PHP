<?php 

date_default_timezone_set('America/Sao_Paulo');
//$db = mysqli_connect('127.0.0.1','root','','gcvitrine');
include("config.php");
$datainc= date("Y-m-d");
$horainc= date('H:i:s');

$query = "SELECT RES_EMBARCA, RES_DESTINA,RES_VEIC,RES_BTEMPO, RES_DTINC,RES_HRINC,RES_NUMRESE,RES_OBSEST FROM RESERVAS WHERE RES_OBSEST = '' AND RES_EMBARCA = 'MANUTENCAO' ";
$query = mysqli_query($db,$query);

	while($dados = mysqli_fetch_array($query)){
		
			// se for mesmo dia verifica hora senão libera veiculo para vitrine

			$hora		 = $dados["RES_HRINC"];
			$temp		 = $dados["RES_BTEMPO"];
			$res_numrese = $dados["RES_NUMRESE"];
			
			$res_dtinc = $dados["RES_DTINC"];
			$res_hrinc = $dados["RES_HRINC"];
			
			//echo $res_dtinc.'->'.$res_hrinc;
			
			$datatime1   = new DateTime($res_dtinc." ".$res_hrinc);
			$datatime2   = new DateTime($datainc." ".$horainc);
			
			$data1  = $datatime1->format('Y-m-d H:i:s');
			$data2  = $datatime2->format('Y-m-d H:i:s');
			
			//echo($datetime1." ".$datatime2);
			
			$diff = $datatime1->diff($datatime2);
			$horas = $diff->h + ($diff->days * 24);
			
			//ECHO($res_dtinc." ".$res_hrinc);
			// Soma horario de indisponibilidade
			//$result = date('H:i:s', strtotime('+'.$temp.' hour', strtotime($hora)));
			//echo $result;
			//echo '</br>';
			
			
			//echo $horainc;
			//echo '<br>'.$horas.' - '.$temp;
			
			If ($horas >= $temp){
				$insert  = mysqli_query($db,"UPDATE RESERVAS SET RES_OBSEST = 'RETORNOU PARA VITRINE - (JOB AUTOMATICO DE LEITURA) ' WHERE RES_NUMRESE = '$res_numrese' ");        
				$insertS = mysqli_query($db,"UPDATE ROTAS SET RES_STATUS = 'A' WHERE FRE_FRETE = '$res_numrese' ");    
				unset($result);	
			}
	} 
	//Fecha conexao 
   mysqli_close($db);
?>