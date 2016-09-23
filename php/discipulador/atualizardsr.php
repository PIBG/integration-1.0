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
         $nome = $_POST['name'];
         $dsr_codigo= $_POST['codigo'];
         $bairro= $_POST['bairro'];
         $status= $_POST['status'];
         $est_civil= $_POST['civil'];
         $spgm=$_POST['pgm'];
         
         
         $query=mysql_query($sql);
         $sql ="UPDATE tb_discipuladores SET dsr_nome='$nome',dsr_civ_codigo='$est_civil',dsr_bai_codigo='$bairro',dsr_pgm_codigo='$spgm',dsr_std_codigo='$status' WHERE dsr_codigo='$dsr_codigo'"; 
         
     
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
      <?php
         $email=$_POST['email'];
         $numero=$_POST['telefone'];
          $deleteEmail=mysql_query(" DELETE FROM `tb_email_discipuladores` WHERE `tb_email_discipuladores`.`email_discipulador` = '$numero' AND `tb_email_discipuladores`.`email_dsr_codigo` ='$dsr_codigo'");
         if (isset($email)) {
          
           $sql5 =mysql_query("INSERT INTO tb_email_discipuladores(email_discipulador,email_dsr_codigo) VALUES ('$email','$dsr_codigo')") ; 
         }
          $deletetel=mysql_query("DELETE FROM `tb_tel_discipuladores` WHERE `tb_tel_discipuladores`.`tel_dsr_codigo` ='$dsr_codigo'");
         if (isset($numero)) {
         
          $sql3 =mysql_query("INSERT INTO tb_tel_discipuladores(tel_discipulador,tel_dsr_codigo) VALUES ('$numero','$dsr_codigo')") ;
         }
         
          
         ?>
    
      

         
         
        <?php
$deletdsp=mysql_query(" DELETE FROM `tb_disp_discipulador` WHERE dsp_dsr_codigo='$dsr_codigo'");
   $tursegunda =$_POST['tursegunda'];

$turterca=$_POST['turterca'];

$turquarta=$_POST['turquarta'];

$turquinta=$_POST['turquinta'];

$tursexta=$_POST['tursexta'];

$tursabado=$_POST['tursabado'];

$turdomingo=$_POST['turdomingo'];


if ($tursegunda==1 or $tursegunda==2 or $tursegunda==3 or $tursegunda==4)  {
  $segunda = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('1','$tursegunda','$dsr_codigo')");
}

if($turterca==1 or $turterca==2 or $turterca==3 or $turterca==4){
$terca = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('2','$turterca','$dsr_codigo')");
}
if($turquarta==1 or $turquarta==2 or $turquarta==3 or $turquarta==4) {
$quarta = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('3','$turquarta','$dsr_codigo')");
}
if($turquinta==1 or $turquinta==2 or $turquinta==3 or $turquinta==4){
$quinta = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('4','$turquinta','$dsr_codigo')");
}
if($tursexta==1 or $tursexta==2 or $tursexta==3 or $tursexta==4) {
$sexta = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('5','$tursexta','$dsr_codigo')");
}
if($tursabado==1 or $tursabado==2 or $tursabado==3 or $tursabado==4) {
$sabado = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('6','$tursabado','$dsr_codigo')");
}
if($turdomingo==1 or $turdomingo==2 or $turdomingo==3 or $turdomingo==4) {
$domingo = mysql_query("INSERT INTO tb_disp_discipulador (dsp_dia_codigo, dsp_tur_codigo, dsp_dsr_codigo) VALUES ('7','$turdomingo','$dsr_codigo')");
}      

?>
   </body>
</html>