<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Lato:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$dbname='u163454640_pibg'; // Indique o nome do banco de dados que será aberto

$usuario='u163454640_breno'; // Indique o nome do usuário que tem acesso
$password='gh$!C5$bAal'; // Indique a senha do usuário
//1º passo - Conecta ao servidor MySQL
$id = mysql_connect('mysql.hostinger.com.br',$usuario,$password);

$con=mysql_select_db($dbname,$id);
?>

<?php
$nome = $_POST['name'];
$tiposexo= $_POST['sexo'];
$bairro= $_POST['bairro'];
$status= $_POST['status'];
$est_civil= $_POST['civil'];
$spgm=$_POST['pgm'];

$query=mysql_query($sql);
$sql ="INSERT INTO tb_discipuladores(dsr_nome,dsr_sex_codigo,dsr_civ_codigo,dsr_bai_codigo,dsr_pgm_codigo,dsr_std_codigo, dsr_dta_cadastro) VALUES ('$nome','$tiposexo','$est_civil','$bairro','$spgm','$status', current_timestamp)"; 
//$sql ="INSERT INTO tb_novo_convertido(nvo_nome,nvo_dta_nascimento,nvo_sex_codigo,nvo_dta_conversao,nvo_civ_codigo,nvo_logradouro,nvo_bai_codigo,nvo_sem_codigo,nvo_enc_codigo) VALUES ('$nome','$dtanascimento','$tiposexo','$dtaconversao','$est_civil','$logradouro','$bairro','$diasemana','$enco')"; 

if (mysql_query($sql,$id)){ 
  echo("<SCRIPT> if (window.confirm('Cadastro com Sucesso, Deseja cadastrar um novo?'))
{
    
    window.location = '/ministerio/discipuladores';
}
else
{
    window.location = '/ministerio/home';
} </SCRIPT>");
   //recebo o último id
 if($ultimo_id = mysql_insert_id($id)){
 	
 }   
 
}else{
echo ("<SCRIPT> if (window.confirm('NÃO cadastrou, Deseja tentar novamente?'))
{
    
    window.location = '/ministerio/discipuladores';
}
else
{
    window.location = '/ministerio/home';
} </SCRIPT>");
   //echo ("<SCRIPT LANGUAGE='JavaScript'>
  //  window.alert('Infelizmente NÃO posso cadastrar novos no momento!')
  //  window.location.href='home.php';
   // </SCRIPT>");
} 



?>
<?php
$email=$_POST['email'];
$numero=$_POST['telefone'];
if (isset($email)) {
  $sql5 =mysql_query("INSERT INTO tb_email_discipuladores(email_discipulador,email_dsr_codigo) VALUES ('$email','$ultimo_id')") ; 
}

if (isset($numero)) {
 $sql3 =mysql_query("INSERT INTO tb_tel_discipuladores(tel_discipulador,tel_dsr_codigo) VALUES ('$numero','$ultimo_id')") ;
}

 
?>
        <?php

$tursegunda =$_POST['tursegunda'];

$turterca=$_POST['turterca'];

$turquarta=$_POST['turquarta'];

$turquinta=$_POST['turquinta'];

$tursexta=$_POST['tursexta'];

$tursabado=$_POST['tursabado'];

$turdomingo=$_POST['turdomingo'];


if ($tursegunda==1 or $tursegunda==2 or $tursegunda==3 or $tursegunda==4)  {
  $segunda = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('1','$tursegunda','$ultimo_id')");
}

if($turterca==1 or $turterca==2 or $turterca==3 or $turterca==4){
$terca = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('2','$turterca','$ultimo_id')");
}
if($turquarta==1 or $turquarta==2 or $turquarta==3 or $turquarta==4) {
$quarta = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('3','$turquarta','$ultimo_id')");
}
if($turquinta==1 or $turquinta==2 or $turquinta==3 or $turquinta==4){
$quinta = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('4','$turquinta','$ultimo_id')");
}
if($tursexta==1 or $tursexta==2 or $tursexta==3 or $tursexta==4) {
$sexta = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('5','$tursexta','$ultimo_id')");
}
if($tursabado==1 or $tursabado==2 or $tursabado==3 or $tursabado==4) {
$sabado = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('6','$tursabado','$ultimo_id')");
}
if($turdomingo==1 or $turdomingo==2 or $turdomingo==3 or $turdomingo==4) {
$domingo = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('7','$turdomingo','$ultimo_id')");
}      

?>
</body>
</html>