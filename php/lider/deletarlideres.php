<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
$bairro= $_POST['bairro'];
$query=mysql_query($sql);
$sql ="INSERT INTO tb_lideres(lid_nome,lid_bai_codigo) VALUES ('$nome','$bairro')"; 



//$sql ="INSERT INTO tb_novo_convertido(nvo_nome,nvo_dta_nascimento,nvo_sex_codigo,nvo_dta_conversao,nvo_civ_codigo,nvo_logradouro,nvo_bai_codigo,nvo_sem_codigo,nvo_enc_codigo) VALUES ('$nome','$dtanascimento','$tiposexo','$dtaconversao','$est_civil','$logradouro','$bairro','$diasemana','$enco')"; 

if (mysql_query($sql,$id)){ 
  echo("<SCRIPT> if (window.confirm('Cadastro com Sucesso, Deseja cadastrar um novo?'))
{
    
    window.location = '/ministerio/lideres';
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
    
    window.location = '/ministerio/lideres';
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
$numero=$_POST['telefone'];
$sql3 =mysql_query("INSERT INTO tb_tel_lideres(tel_lideres,tel_lid_codigo) VALUES ('$numero','$ultimo_id')") ; 
?>
</body>
</html>