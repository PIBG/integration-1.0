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
$codigo=$_POST['codigo'];
$codigo=$_GET['discipulo'];

$deleteDia=mysql_query(" DELETE FROM `tb_dia_dos_estudos` 
	WHERE diaestudos_dld_codigo IN 
		( SELECT dld_codigo FROM tb_discipulados WHERE dld_nvo_codigo = '$codigo')");

$deleteapl=mysql_query(" DELETE FROM `tb_est_aplicados`
	WHERE apl_dld_codigo IN
		( SELECT dld_codigo FROM tb_discipulados WHERE dld_nvo_codigo = '$codigo');");

$deletedld=mysql_query("DELETE FROM `tb_discipulados`
	WHERE dld_nvo_codigo='$codigo'");

$deletetel=mysql_query("DELETE FROM `tb_tel_novos`
	WHERE tel_nvo_codigo='$codigo';");

$deletemail=mysql_query(" DELETE FROM `tb_email_novos`
	WHERE email_nvo_codigo='$codigo'");

$deletedsp=mysql_query(" DELETE FROM `tb_disp_novos`
	WHERE dsp_nvo_codigo='$codigo'");

$sql=("DELETE FROM `tb_novos`
	WHERE nvo_codigo='$codigo'");


$query=mysql_query($sql);


if (mysql_query($sql,$id)){ 
  echo("<SCRIPT> alert('Removido com Sucesso!')
{
    
  
}
 </SCRIPT>");
   

}else{
echo ("<SCRIPT> alert('NÃO Removeu')
{    
    window.location = '/ministerio/discipulos/';
}
 </SCRIPT>");

} 
?>





</body>
</html>