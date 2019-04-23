<?php
$sql = "SELECT DTR_DATINI AS VIA_DTINI,
DTR_DATFIM AS VIA_DTFIM,
DT6_PRZENT AS VIA_DTDISPO,
A1_EST AS VIA_UFFIM,
A1_MUN AS VIA_CDFIMVIA,
'REGIAO' AS VIA_FIMVIA,
DTR_CODVEI AS MOT_VEICU,
DA3_DESC AS MOT_CARROC,
DTR_CODRB1 AS MOT_PLACA1,
DTR_CODRB2 AS MOT_PLACA2 ,
DA4_NOME AS MOT_NOME,
DA4_TEL AS MOT_TELEF,
'TIPO FROTA' AS MOT_TPFROTA,
DT6_DOC AS PAG_NUMCTE,
'TIPO PAG' AS PAG_TPPAG,
'DT ACERTO' AS PAG_DTACERTO
FROM PROTHEUSV12.DTQ010 
INNER JOIN PROTHEUSV12.DT6010 ON protheusv12.dtq010.dtq_filial = protheusv12.dt6010.dt6_filial AND protheusv12.dtq010.dtq_viagem = protheusv12.dt6010.dt6_numvga
INNER JOIN PROTHEUSV12.SA1010 ON PROTHEUSV12.sa1010.a1_cod = protheusv12.dt6010.dt6_clides AND protheusv12.sa1010.a1_loja = protheusv12.dt6010.dt6_lojdes
INNER JOIN PROTHEUSV12.DTR010 ON PROTHEUSV12.DTR010.DTR_FILORI = protheusv12.DTQ010.DTQ_FILORI AND protheusv12.DTR010.DTR_VIAGEM = protheusv12.dtq010.dtq_viagem
INNER JOIN PROTHEUSV12.da3010 ON protheusv12.DTR010.DTR_CODVEI = protheusv12.da3010.da3_cod
INNER JOIN PROTHEUSV12.da4010 ON protheusv12.Da3010.Da3_motori = protheusv12.da4010.da4_cod
WHERE DTQ_DATGER >= '20180701'";

$usuario = 'vitrine';
$senha = 'prothloop';
$host = '192.168.0.112';
$porta = '1521';

try
{
  echo '<h3>Teste de conexão com servidor Oracle</h3>';
########### OCI
  echo '<h5>Tentando conectar ao servidor usando a extensão oci</h5>';
  if(!$con = oci_connect($usuario,$senha,"$host:$porta"))
  {
    $e = oci_error();
    throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
  }
  echo '<h4>Sucesso!</h4>';
  echo '<h5>Tentando executar instrução "' .$sql . ' usando a a extensão OCI"</h5>';
  if(!$stmt = oci_parse($con,$sql))
  {
    $e = oci_error($stmt);
    throw new Exception("Erro ao preparar consulta - " . $e['message']);
  }
  if(!oci_execute($stmt))
  {
    $e = oci_error($con);
    throw new Exception("Erro ao executar consulta - " . $e['message']);
  }
  echo '<h4>Sucesso!</h4>';
  if(oci_fetch_all($stmt,$results,0,-1,OCI_ASSOC+OCI_RETURN_NULLS)>0)
  {
    echo '<h5>Exibindo dados retornados pela extensão OCI"</h5>';
    echo "<table border='1'>\n";
    foreach($results as $row ) 
    {
      echo "<tr>\n";
      foreach ($row as $item) 
      {
        echo "    <td>".($item!==null?htmlentities($item, ENT_QUOTES):" ")."</td>\r\n";
      }
      echo "</tr>\n";
      oci_close($con);
    }
    echo "</table>\n";
  }
  else
  {
    echo '<h5>A consulta não retornou dados.</h5>';
  }

########### PDO

  echo '<h5>Tentando conectar ao servidor usando PDO</h5>';
  try
  {
    $pdo = new PDO("oci:dbname=//$host:$porta",$usuario,$senha);
  }
  catch(PDOException $e) 
  {
    throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e->getMessage());
  }
  echo '<h4>Sucesso!</h4>';
  echo '<h5>Tentando executar instrução "' .$sql . ' usando PDO"</h5>';
  if(!$stmt = $pdo->prepare($sql))
  {
    $e= $pdo->errorInfo();
    throw new Exception("Erro ao preparar consulta - " . $e[2]);
  }
  if(!$stmt->execute())
  {
    $e= $stmt->errorInfo();
    throw new Exception("Erro ao preparar consulta - " . $e[2]);
  }
  echo '<h4>Sucesso!</h4>';
  if($results = $stmt->fetchAll(PDO::FETCH_ASSOC))
  {
    echo '<h5>Exibindo dados retornados pela extensão PDO"</h5>';
    echo "<table border='1'>\n";
    foreach($results as $row ) 
    {
      echo "<tr>\n";
      foreach ($row as $item) 
      {
        echo "    <td>".($item!==null?htmlentities($item, ENT_QUOTES):" ")."</td>\r\n";
      }
      echo "</tr>\n";
    }
    echo "</table>\n";
  }
  else
  {
    echo '<h5>A consulta não retornou dados.</h5>';
  }

}
catch(Exception $e)
{
  die("ERRO! Detalhes => " . $e->getMessage());
}
?>