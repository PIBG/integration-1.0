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
$nome = $_POST['nome'];
$usuario= $_POST['usuario'];
$senha= $_POST['senha'];
$perfil=$_POST['perfil'];
$query=mysql_query($sql);


if (isset($perfil)) {
$sql ="INSERT INTO tb_login(nome, usuario, senha) VALUES ('$nome','$usuario','$senha')";

}

if ($perfil=='1') {
$sql ="INSERT INTO tb_login(nome, usuario, senha) VALUES ('$nome','$usuario','$senha')";
$sqladmin = "INSERT INTO tb_loginadm(nome, usuario, senha) VALUES ('$nome','$usuario','$senha')";

  }
?>
<?php

if (mysql_query($sql,$id)){ 
  echo("<SCRIPT> if (window.confirm('Cadastro com Sucesso'))
{
    
    window.location = '/sistema/users';
}
else
{
    window.location = '/sistema/home';
} </SCRIPT>");
   //recebo o último id

} 

$queryq1=mysql_query($sqladmin);

?>



</body>
</html>