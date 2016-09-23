<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Lato:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

 <body onload='window.history.back();'>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$dbname='u163454640_pibg'; // Indique o nome do banco de dados que será aberto

$usuario='u163454640_breno'; // Indique o nome do usuário que tem acesso
$password='gh$!C5$bAal'; // Indique a senha do usuário
//1º passo - Conecta ao servidor MySQL
$id = mysql_connect('mysql.hostinger.com.br',$usuario,$password);
$con=mysql_select_db($dbname,$id);
?>

?>

<?php
$nome = $_POST['name'];
$logradouro = $_POST['endereco'];
$dtanascimento = $_POST['date'];
$dtaconversao =   $_POST['dataencontro'];
$tiposexo= $_POST['sexo'];
$bairro= $_POST['bairro'];
$est_civil= $_POST['civil'];
$decisao= $_POST['encontro'];
$codigo=$_POST['codigo'];
$disponivel=$_POST['hora'];
$query=mysql_query($sql);
$sql ="UPDATE tb_novos SET nvo_nome='$nome',nvo_civ_codigo='$est_civil' ,nvo_bai_codigo='$bairro',nvo_dec_codigo='$decisao',nvo_logradouro='$logradouro' where nvo_codigo='$codigo'"; 


$delete=mysql_query(" DELETE FROM `tb_disp_novos` WHERE dsp_nvo_codigo='$codigo'");
if (mysql_query($sql,$id)){ 
  echo("<SCRIPT> if (alert ('Atualizado com Sucesso!')
{
    
    
}
else
{
    window.location = '/ministerio/home';
} </SCRIPT>");
   
 if($ultimo_id = mysql_insert_id($id)){
  
 }   
 
}else{
echo ("<SCRIPT> if (window.confirm('NÃO Atualizou, Deseja tentar novamente?'))
{    
    window.location = '/ministerio/discipulos/';
}
else
{
    window.location = '/ministerio/home';
} </SCRIPT>");

} 
?>
<?php
$email=$_POST['email'];
$numero=$_POST['telefone'];
$deleteEmail=mysql_query(" DELETE FROM tb_email_novos WHERE email_nvo_codigo='$codigo'");
$insertEmail =mysql_query("INSERT INTO tb_email_novos (email_novos, email_nvo_codigo) VALUES ('$email', '$codigo')") ;
$deleteTel=mysql_query(" DELETE FROM tb_tel_novos WHERE tel_nvo_codigo='$codigo'");
$indertTl =mysql_query("INSERT INTO tb_tel_novos(tel_novos,tel_nvo_codigo) VALUES ('$numero','$codigo')") ; 
?>

        <?php
$deletdsp=mysql_query(" DELETE FROM `tb_disp_novos` WHERE dsp_dsr_codigo='$codigo'");
   $tursegunda =$_POST['tursegunda'];

$turterca=$_POST['turterca'];

$turquarta=$_POST['turquarta'];

$turquinta=$_POST['turquinta'];

$tursexta=$_POST['tursexta'];

$tursabado=$_POST['tursabado'];

$turdomingo=$_POST['turdomingo'];


if ($tursegunda==1 or $tursegunda==2 or $tursegunda==3 or $tursegunda==4)  {
  $segunda = mysql_query("INSERT INTO tb_disp_novos (dsp_dia_codigo, dsp_tur_codigo, dsp_nvo_codigo) VALUES ('1','$tursegunda','$codigo')");
}

if($turterca==1 or $$turterca==2 or $turterca==3 or $turterca==4){
$terca = mysql_query("INSERT INTO tb_disp_novos (dsp_dia_codigo, dsp_tur_codigo, dsp_nvo_codigo) VALUES ('2','$turterca','$codigo')");
}
if($turquarta==1 or $turquarta==2 or $turquarta==3 or $turquarta==4) {
$quarta = mysql_query("INSERT INTO tb_disp_novos (dsp_dia_codigo, dsp_tur_codigo, dsp_nvo_codigo) VALUES ('3','$turquarta','$codigo')");
}
if($turquinta==1 or $turquinta==2 or $turquinta==3 or $turquinta==4){
$quinta = mysql_query("INSERT INTO tb_disp_novos (dsp_dia_codigo, dsp_tur_codigo, dsp_nvo_codigo) VALUES ('4','$turquinta','$codigo')");
}
if($tursexta==1 or $tursexta==2 or $tursexta==3 or $tursexta==4) {
$sexta = mysql_query("INSERT INTO tb_disp_novos (dsp_dia_codigo, dsp_tur_codigo, dsp_nvo_codigo) VALUES('5','$tursexta','$codigo')");
}
if($tursabado==1 or $tursabado==2 or $tursabado==3 or $tursabado==4) {
$sabado = mysql_query("INSERT INTO tb_disp_novos (dsp_dia_codigo, dsp_tur_codigo, dsp_nvo_codigo) VALUES ('6','$tursabado','$codigo')");
}
if($turdomingo==1 or $turdomingo==2 or $turdomingo==3 or $turdomingo==4) {
$domingo = mysql_query("INSERT INTO tb_disp_novos (dsp_dia_codigo, dsp_tur_codigo, dsp_nvo_codigo) VALUES ('7','$turdomingo','$codigo')");
}      

?>

</body>
</html>