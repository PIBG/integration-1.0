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
$nomedsr = $_POST['discipulador'];
$nomenvo= $_POST['discipulo'];
$status=$_POST['status'];
$query=mysql_query($sql);
$sql ="INSERT INTO tb_discipulados(dld_nvo_codigo,dld_dsr_codigo,dld_data,dld_sta_status) VALUES ('$nomenvo','$nomedsr',CURDATE(), '$status')"; 
//$sql ="INSERT INTO tb_novo_convertido(nvo_nome,nvo_dta_nascimento,nvo_sex_codigo,nvo_dta_conversao,nvo_civ_codigo,nvo_logradouro,nvo_bai_codigo,nvo_sem_codigo,nvo_enc_codigo) VALUES ('$nome','$dtanascimento','$tiposexo','$dtaconversao','$est_civil','$logradouro','$bairro','$diasemana','$enco')"; 

if (mysql_query($sql,$id)){ 
  echo("<SCRIPT> if (window.confirm('Cadastro com Sucesso, Deseja cadastrar um novo?'))
{
    
    window.location = '/ministerio/discipulados';
}
else
{
    window.location = '/ministerio/home';
} </SCRIPT>");
   //recebo o último id
 if($ultimo_id = mysql_insert_id($id)){

 }   
 
}else{
echo "($nomenvo)"; 

echo ("<SCRIPT> if (window.confirm('NÃO cadastrou, Deseja tentar novamente?'))
{
    window.location = '/ministerio/discipulados';
}
else
{
   
    window.location = '/ministerio/home';
} </SCRIPT>");

} 



?>
<?php
$estudo=$_POST['estudo'];
echo "$estudo";

if (isset($estudo)) {
  $sql3 =mysql_query("INSERT INTO `tb_est_aplicados` (`apl_est_codigo`, `apl_dld_codigo`) VALUES ('$estudo', '$ultimo_id')") ; 
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
$segunda =mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$ultimo_id','$tursegunda','1')");
}

if($turterca==1 or $$turterca==2 or $turterca==3 or $turterca==4){
$terca = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$ultimo_id','$turterca','2')");
}
if($turquarta==1 or $turquarta==2 or $turquarta==3 or $turquarta==4) {
$quarta = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$ultimo_id','$turquarta','3')");
}
if($turquinta==1 or $turquinta==2 or $turquinta==3 or $turquinta==4){
$quinta = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$ultimo_id','$turquinta','4')");
}
if($tursexta==1 or $tursexta==2 or $tursexta==3 or $tursexta==4) {
$sexta = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$ultimo_id','$tursexta','5')");
}
if($tursabado==1 or $tursabado==2 or $tursabado==3 or $tursabado==4) {
$sexta = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$ultimo_id','$tursexta','5')");
}
if($turdomingo==1 or $turdomingo==2 or $turdomingo==3 or $turdomingo==4) {
$domingo = mysql_query("INSERT INTO tb_dia_dos_estudos (diaestudos_dld_codigo, diaestudos_tur_codigo, diaestudos_dia_codigo) VALUES ('$ultimo_id','$turdomingo','7')");
}      

?>

</body>
</html>