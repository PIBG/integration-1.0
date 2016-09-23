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
        $query=mysql_query($sql); 
         $rec_codigo= $_GET['solicitante'];
          echo "$rec_codigo";
       $consulta1 = mysql_query("SELECT * FROM tb_receber where rec_codigo='$rec_codigo' ");
                    while($row = mysql_fetch_array( $consulta1 ) ) {
                     $status1=$row['rec_str_codigo'];
                     }
                    if ($status1==1){
                     $sql ="UPDATE `tb_receber` SET `rec_str_codigo`='2' WHERE rec_codigo='$rec_codigo'"; 
                    }
                    if ($status1==2){
                    $sql ="UPDATE `tb_receber` SET `rec_str_codigo`='1' WHERE rec_codigo='$rec_codigo'";
                    }
         
         
        
         
     
         if (mysql_query($sql,$id)){ 
           echo("<SCRIPT> if (atert('Atualizado com Sucesso!'))
         {
             
             
         }
         else
         {
         
         } </SCRIPT>");
            //recebo o último id


          if($ultimo_id = mysql_insert_id($id)){
         }   
          
         }else{
         echo ("<SCRIPT> if (atert('NÃO Atualizou, Deseja tentar novamente?'))
         {
             
           
         }
         else
         {
        
         } </SCRIPT>");
            //echo ("<SCRIPT LANGUAGE='JavaScript'>
           //  window.alert('Infelizmente NÃO posso cadastrar novos no momento!')
           //  window.location.href='home.php';
            // </SCRIPT>");
         } 
         
         
         
         ?>

   </body>
</html>