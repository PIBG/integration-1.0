<?php

	$html = '<html>';

error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$dbname='u163454640_pibg'; // Indique o nome do banco de dados que será aberto
$usuario='u163454640_breno'; // Indique o nome do usuário que tem acesso
$password='gh$!C5$bAal'; // Indique a senha do usuário
$id = mysql_connect('mysql.hostinger.com.br',$usuario,$password);
$con=mysql_select_db($dbname,$id);
$arr = $_POST['iddsr'];
reset($arr);
while (list($key, $value) = each($arr)) {
header('Content-Type: text/html; charset=utf-8');
	$html .= '
	<head>

<meta http-equiv="Content-type" content="text/html; charset=utf-8" />   
    <style>
table {
     width: 98%;
     border-collapse: collapse;
     margin-left:2%; 
     margin-botton: 3%;
}

td {
    text-align: left;
    font-size:12px;
    margin: auto;    
}

table, th, td {
    border: 0.5px solid;
}

label {    
    font-size:12px;
}

h3 {
    
        margin-top: 3%;
         width: 18%;
}
h4 {
        margin: auto;
         width: 20%;
}
    </style>  
    </head>
<body>
';  

   $consulta1 = mysql_query("SELECT * FROM tb_novos
   left join tb_sexo on sex_codigo=nvo_sex_codigo
   left join tb_bairros on bai_codigo=nvo_bai_codigo
   left join tb_estado_civil on civ_codigo=nvo_civ_codigo
   left join tb_tel_novos on nvo_codigo=tel_nvo_codigo
   left join tb_email_novos on email_nvo_codigo=nvo_codigo
   left join tb_decisao on dec_codigo=nvo_dec_codigo
   left join tb_discipulados on dld_nvo_codigo=nvo_codigo
   left join tb_est_aplicados on apl_dld_codigo=dld_codigo
   left join tb_estudos ON apl_est_codigo=est_codigo

   where nvo_codigo='".$value."'");  
   
   
   
   //========================================================
   //--------------acompam=namento-------------------------
   //=======================================================

   $consultadld = mysql_query("SELECT * FROM  tb_discipulados
   join tb_discipuladores on dsr_codigo=dld_dsr_codigo
   left join tb_est_aplicados on apl_dld_codigo=dld_codigo
   join tb_estudos ON est_codigo=apl_est_codigo
   join tb_novos on nvo_codigo=dld_nvo_codigo
   join tb_status on dld_sta_status=sta_codigo
   where nvo_codigo='".$value."'");

   $consultacodigo = mysql_query("SELECT * FROM  tb_discipulados
   join tb_discipuladores on dsr_codigo=dld_dsr_codigo
   left join tb_est_aplicados on apl_dld_codigo=dld_codigo
   join tb_estudos ON est_codigo=apl_est_codigo
   join tb_novos on nvo_codigo=dld_nvo_codigo
   join tb_status on dld_sta_status=sta_codigo
   where nvo_codigo='".$value."'");
  
   
  $acompanhante = mysql_query("select dsr_nome, dld_acompanhante_dsr from tb_discipulados
  left join tb_discipuladores on dsr_codigo=dld_acompanhante_dsr  where dld_codigo='$codisgoac' ");  
    
    $acp_dsr = mysql_fetch_array( $acompanhante );
    $row = mysql_fetch_array( $consulta1 );
    $rowdld = mysql_fetch_array( $consultadld );
    $datanas=date("d/m/Y", strtotime($row['nvo_dta_nascimento']));
    $datadec=date("d/m/Y", strtotime($rowdld['dld_data']));
 
    
    $html .='
    
    
        <h3>Dados Pessoais</h3>
    <table >
        <tr>
            <td colspan="2"><b> Nome: </b>'.$row['nvo_nome'].' </td>
            <td><b> Sexo: </b><label> '.$row['sex_sexo'].'</label></td>
        </tr>
        <tr>
            <td><b> Data de Nasciemto:</b> '.$datanas.'</td>
            <td><b> Estado civil: </b><label> '.$row['civ_estado'].'</label></td>
            <td><b> Contato: </b> '.$row['tel_novos'].'</td>                
        </tr>
        <tr>
            <td colspan="2"><b> Endere&ccedil;o: </b> '.$row['nvo_logradouro'].'</td>
            <td><b> Bairro: </b><label> '.$row['bai_bairro'].'<label></td>                         
        </tr>
        <tr>
            <td colspan="3">
            <h4>Acompanhamento</h4>
            </td>
        </tr>
           
                <tr>
                    <td colspan="2"><b> Discipulador: </b>'.$rowdld['dsr_nome'].' </td>
                    <td><b> Status : </b><label> '.$rowdld['sta_status'].'</label></td>
                </tr>
                <tr>
                    <td colspan="2"><b> Ax. Discipulador: </b>'.$acp_dsr['dsr_nome'].' </td>
                    <td><b> Data Cadastro: </b><label> '.$datadec.'</label></td>
                                  
                </tr>
                <tr>
                    <td colspan="3"><b> Estus Aplicados: </b> ';
                  
                    $consultaestap = mysql_query("SELECT * FROM tb_est_aplicados
                                           join tb_estudos on est_codigo=apl_est_codigo
                                             WHERE apl_dld_codigo='".$rowdld['apl_dld_codigo']."'
                                               order by est_codigo");
                             while ($estap = mysql_fetch_array( $consultaestap ) )
                             {
                               $cod = $estap ['apl_est_codigo'];
                               $est = $estap ['est_estudo'];
                                 $html .='<label>'.$est.'; </label>';
                                 
                             }
                    
        $html .='</td>
                </tr>
            </table>
           
           
           <br>
            <br>
';
   }
$html .='

	</body>
	</html>
	';
	?>
<?php
require_once("dompdf/dompdf_config.inc.php");
$row = utf8_decode($row);
$html = utf8_decode($html);;
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('discipulos.pdf',array('Attachment'=>0));
?>
       