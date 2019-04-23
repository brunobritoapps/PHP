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
            $res_embarca=$_POST['res_embarca'];
            $res_destina=$_POST['res_destina'];
            $res_tpcarga=$_POST['res_tpcarga'];
            $res_auf=$_POST['res_auf'];
            $res_buf=$_POST['res_buf'];
            $res_cuf=$_POST['res_cuf'];
            $res_duf=$_POST['res_duf'];
            $res_acidade=$_POST['res_acidade'];
            $res_bcidade=$_POST['res_bcidade'];
            $res_ccidade=$_POST['res_ccidade'];
            $res_dcidade=$_POST['res_dcidade'];
            $res_veic=$_POST['res_veic'];
            $res_frete=$_POST['res_frete'];
            $res_pedre=$_POST['res_pedre'];
            $res_adeslo=$_POST['res_adeslo'];
            $res_apedag=$_POST['res_apedag'];
            $res_btempo=$_POST['res_btempo'];
            $res_bdeslo=$_POST['res_bdeslo'];
            $res_bpedag=$_POST['res_bpedag'];
            $res_ctempo=$_POST['res_ctempo'];
            $res_cdescar=$_POST['res_cdescar'];
            $res_ddeslo=$_POST['res_ddeslo'];
            $res_dpedag=$_POST['res_dpedag'];
            $res_retdeslo=$_POST['res_retdeslo'];
            $res_retpedag=$_POST['res_retpedag'];
            $res_totfin=$_POST['res_totfin'];
            $res_trantime=$_POST['res_trantime'];
            $res_seguro=$_POST['res_seguro'];
			$res_bdata=$_POST['res_bdata'];
			$res_cdata=$_POST['res_cdata'];
			$res_ddata=$_POST['res_ddata'];
			$res_averba=$_POST['res_averba'];
			$res_peso=$_POST['res_peso'];
			$res_placa1=$_POST['res_placa1'];
			$res_numrese = $fre_frete;
			

           $insert  = mysqli_query($db,"insert into reservas(res_solicita,res_embarca,res_destina,res_tpcarga,res_auf,res_buf,res_cuf,res_duf,res_acidade,res_bcidade,res_ccidade,res_dcidade,res_veic,res_frete,res_pedre,res_adeslo,res_apedag,res_btempo,res_bdeslo,res_bpedag,res_ctempo,res_cdescar,res_ddeslo,res_dpedag,res_retdeslo,res_retpedag,res_totfin,res_trantime,res_seguro,res_numrese,res_hrinc,res_dtinc,res_bdata,res_cdata,res_ddata,res_averba,res_peso,res_placa1) VALUES('$res_solicita','$res_embarca','$res_destina','$res_tpcarga','$res_auf','$res_buf','$res_cuf','$res_duf','$res_acidade','$res_bcidade','$res_ccidade','$res_dcidade','$res_veic','$res_frete','$res_pedre','$res_adeslo','$res_apedag','$res_btempo','$res_bdeslo','$res_bpedag','$res_ctempo','$res_cdescar','$res_ddeslo','$res_dpedag','$res_retdeslo','$res_retpedag','$res_totfin','$res_trantime','$res_seguro', '$res_numrese','$horainc','$datainc','$res_bdata','$res_cdata','$res_ddata','$res_averba','$res_peso','$res_placa1')");        
           $insertS = mysqli_query($db,"UPDATE ROTAS SET RES_STATUS = 'R' WHERE FRE_FRETE = '$res_numrese'");        

        if($insert){
          echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Reserva cadastrada com sucesso!');window.location.href='rotas.php'</scriptSql RELATORIO PERFORMANCE>";
           }else{
           echo mysqli_error($db);
		   echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Ocorreu um erro ao cadastrar a reserva.');window.location.href='rotas.php'</scriptSql RELATORIO PERFORMANCE>";
          }
        }

?>