<?php
include("config.php");
//$db = mysqli_connect('127.0.0.1','root','','gcvitrine');
if(isset($_POST['aprova']))
	{		
			$res_numrese = $_POST["fre_frete"];
			$obs		 = $_POST["aprovaobs"];

           $insert  = mysqli_query($db,"UPDATE RESERVAS SET RES_OBS = '$obs' WHERE RES_NUMRESE = '$res_numrese'");        
           $insertS = mysqli_query($db,"UPDATE ROTAS SET RES_STATUS = 'R' WHERE FRE_FRETE = '$res_numrese'");        

		   if($insert){
          echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Reserva Aprovada com sucesso!');window.location.href='rotas.php'</scriptSql RELATORIO PERFORMANCE>";
           }else{
           echo mysqli_error($db);
		   echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Ocorreu um erro ao Aprovar a reserva.');window.location.href='rotas.php'</scriptSql RELATORIO PERFORMANCE>";
          }
    }	else if(isset($_POST['reprova']))
	{
			
			$res_numrese = $_POST["fre_frete"];
			$obs		 = $_POST["aprovaobs"];

           $insert  = mysqli_query($db,"UPDATE RESERVAS SET RES_OBS = '$obs' WHERE RES_NUMRESE = '$res_numrese'");        
           $insertS = mysqli_query($db,"UPDATE ROTAS SET RES_STATUS = 'A' WHERE FRE_FRETE = '$res_numrese'");        
                      
        if($insert){
          echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Reserva Reprovada com sucesso!');window.location.href='rotas.php'</scriptSql RELATORIO PERFORMANCE>";
           }else{
           echo mysqli_error($db);
		   echo"<scriptSql RELATORIO PERFORMANCE language='javascript' type='text/javascript'>alert('Ocorreu um erro ao reprovar a reserva.');window.location.href='rotas.php'</scriptSql RELATORIO PERFORMANCE>";
	
		}
	}
  //Fecha conexao 
  mysqli_close($db);
?>