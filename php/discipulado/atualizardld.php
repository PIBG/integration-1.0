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

<?php
$codigo=$_POST['nvocodigo'];
$nomedsr = $_POST['discipulador'];
$status=$_POST['status'];
$acp=$_POST['acompanhante'];
$codigodld=$_POST['codigodld'];
$query=mysql_query($sql);
$sql ="UPDATE `tb_discipulados` SET `dld_dsr_codigo`='$nomedsr',`dld_sta_status`='$status', `dld_acompanhante_dsr`='$acp' WHERE dld_nvo_codigo='$codigo' ";

if (mysql_query($sql,$id)){ 
  echo("<SCRIPT> alert('$sql, Cadastro com Sucesso, Deseja cadastrar um novo?')
{
    
   
}
else
{
   
} </SCRIPT>");
   //recebo o último id
 if($ultimo_id = mysql_insert_id($id)){

 }   
 
}else{


echo ("<SCRIPT> if(alert(' NÃO cadastrou, Deseja tentar novamente?'))
{
  
}
else
{
   
} </SCRIPT>");

} 



?>
   <?php
$selecte=mysql_query(" DELETE FROM `tb_dia_dos_estudos` WHERE diaestudos_dld_codigo='$codigodld'");
   $tursegunda =$_POST['tursegunda'];

$turterca=$_POST['turterca'];

$turquarta=$_POST['turquarta'];

$turquinta=$_POST['turquinta'];

$tursexta=$_POST['tursexta'];

$tursabado=$_POST['tursabado'];

$turdomingo=$_POST['turdomingo'];


if ($tursegunda==1 or $tursegunda==2 or $tursegunda==3 or $tursegunda==4)  {
$segunda =mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$codigodld','$tursegunda','1')");
}

if($turterca==1 or $$turterca==2 or $turterca==3 or $turterca==4){
$terca = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$codigodld','$turterca','2')");
}
if($turquarta==1 or $turquarta==2 or $turquarta==3 or $turquarta==4) {
$quarta = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$codigodld','$turquarta','3')");
}
if($turquinta==1 or $turquinta==2 or $turquinta==3 or $turquinta==4){
$quinta = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$codigodld','$turquinta','4')");
}
if($tursexta==1 or $tursexta==2 or $tursexta==3 or $tursexta==4) {
$sexta = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$codigodld','$tursexta','5')");
}
if($tursabado==1 or $tursabado==2 or $tursabado==3 or $tursabado==4) {
$sabado = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$codigodld','$tursabado','6')");
}
if($turdomingo==1 or $turdomingo==2 or $turdomingo==3 or $turdomingo==4) {
$domingo = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$codigodld','$turdomingo','7')");
}      

?>

</body>
</html>