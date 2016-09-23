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
         $codigo = $_POST['discipuladop'];
         $estudo= $_POST['estudo'];
         
         $query=mysql_query($sql);
         $sql ="INSERT INTO `tb_est_aplicados` (`apl_est_codigo`, `apl_dld_codigo`) VALUES ('$estudo', '$codigo')"; 
         //$sql ="INSERT INTO tb_novo_convertido(nvo_nome,nvo_dta_nascimento,nvo_sex_codigo,nvo_dta_conversao,nvo_civ_codigo,nvo_logradouro,nvo_bai_codigo,nvo_sem_codigo,nvo_enc_codigo) VALUES ('$nome','$dtanascimento','$tiposexo','$dtaconversao','$est_civil','$logradouro','$bairro','$diasemana','$enco')"; 
         
         if (mysql_query($sql,$id)){ 
           echo("<SCRIPT> if (alert('Estudo Add com Sucesso!))
         {
             
             
         }
         else
         {
             
         } </SCRIPT>");
            //recebo o último id
          if($ultimo_id = mysql_insert_id($id)){
         
          }   
          
         }else{
         echo "$estudo, $codigo"; 
         
         echo ("<SCRIPT> if (alert('NÃO Adicionou'))
         {
            
         }
         else
         {
            
             
         } </SCRIPT>");
         
         } 
         
         
         ?>
   </body>
</html>