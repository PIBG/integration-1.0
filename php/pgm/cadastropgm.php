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
$nome = $_POST['pgm'];
$bairro= $_POST['bairro'];

$query=mysql_query($sql);
$sql ="INSERT INTO tb_pgm (pgm_nome,pgm_bai_codigo) VALUES ('$nome','$bairro')";

if (mysql_query($sql,$id)){ 
  echo("<SCRIPT> if (window.confirm('Cadastro com Sucesso, Deseja cadastrar um novo?'))
{
    
    window.location = '/ministerio/pgm/';
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
    
    window.location = '/ministerio/pgm/';
}
else
{
    window.location = '/ministerio/home';
} </SCRIPT>");
  
} 



?>

