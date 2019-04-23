<?php
include("config.php");
date_default_timezone_set('America/Sao_Paulo');
//$db = mysqli_connect('127.0.0.1','root','','gcvitrine');

if(isset($_POST['incluir']))
{
			$horainc= date('H:i:s');
			$datainc= date("Y-m-d");
			$res_solicita = $_POST['res_solicita'];
			$fre_frete = $_POST['fre_frete'];			
            $res_embarca='MANUTENCAO';
			$res_destina=$_POST['res_destina'];
			$res_tpcarga='MANUTENCAO';
			$res_veic=$_POST['res_veic'];            
            $res_btempo=$_POST['res_btempo'];
			$res_placa1=$_POST['res_placa1'];
			$res_obs=$_POST['res_obs'];
			$res_numrese = $fre_frete;

           $insert  = mysqli_query($db,"insert into reservas(res_solicita,res_embarca,res_destina,res_tpcarga,res_auf,res_buf,res_cuf,res_duf,res_acidade,res_bcidade,res_ccidade,res_dcidade,res_veic,res_frete,res_pedre,res_adeslo,res_apedag,res_btempo,res_bdeslo,res_bpedag,res_ctempo,res_cdescar,res_ddeslo,res_dpedag,res_retdeslo,res_retpedag,res_totfin,res_trantime,res_seguro,res_numrese,res_obs,res_hrinc,res_dtinc,res_placa1) VALUES('$res_solicita','$res_embarca','$res_destina','$res_tpcarga','$res_auf','$res_buf','$res_cuf','$res_duf','$res_acidade','$res_bcidade','$res_ccidade','$res_dcidade','$res_veic','$res_frete','$res_pedre','$res_adeslo','$res_apedag','$res_btempo','$res_bdeslo','$res_bpedag','$res_ctempo','$res_cdescar','$res_ddeslo','$res_dpedag','$res_retdeslo','$res_retpedag','$res_totfin','$res_trantime','$res_seguro', '$res_numrese','$res_obs','$horainc','$datainc','$res_placa1')");                   

        if($insert){
		$insertS = mysqli_query($db,"UPDATE ROTAS SET RES_STATUS = 'P' WHERE FRE_FRETE = '$res_numrese'");        
          echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Manutenção cadastrada com sucesso!');window.location.href='rotas.php'</scriptSql RELATORIO PERFORMANCE>";
           }else{
           echo mysqli_error($db);
		   echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Ocorreu um erro ao cadastrar a Manutenção.');window.location.href='rotas.php'</scriptSql RELATORIO PERFORMANCE>";
          }
        }
	
	mysqli_close($db);

?>