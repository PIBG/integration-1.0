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

$pgm=$_POST['pgm'];

$codigo=$_POST['codigo'];

$query=mysql_query($sql);

$sql ="UPDATE `tb_lideres` SET `lid_nome`='$nome',`lid_bai_codigo`='$bairro',`lid_pgm_codigo`='$pgm' WHERE lid_codigo='$codigo'"; 



if (mysql_query($sql,$id)){ 
  echo("<SCRIPT> if (window.confirm('Lider $nome atualizado com sucesso'))
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
$sql3 =mysql_query("INSERT INTO tb_tel_lideres(tel_lideres,tel_lid_codigo) VALUES ('$numero','$codigo)") ; 
?>
</body>
</html>