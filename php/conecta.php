
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$dbname="db_pibg"; // Indique o nome do banco de dados que será aberto

$usuario="root"; // Indique o nome do usuário que tem acesso
$password="P@ssword"; // Indique a senha do usuário
//1º passo - Conecta ao servidor MySQL
$id = mysql_connect("localhost",$usuario,$password);

$con=mysql_select_db($dbname,$id);
?>


</body>
</html>