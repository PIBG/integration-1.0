<!DOCTYPE html>
<?php
   error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
   include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
   protegePagina();  // Inclui o arquivo com o sistema de segurança
   
   // Chama a função que protege a página
   
   
	?>
<?php
	
   $id=$_GET['discipulo'];
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

   where nvo_codigo='$id'");
   
   
   $consultaseg = mysql_query("SELECT * FROM tb_disp_novos
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='1' and dsp_nvo_codigo='$id'");
   
   $consultater = mysql_query("SELECT * FROM tb_disp_novos
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='2' and dsp_nvo_codigo='$id' ");
   
   $consultaqua = mysql_query("SELECT * FROM tb_disp_novos
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='3' and dsp_nvo_codigo='$id' ");
   
   $consultaqui = mysql_query("SELECT * FROM tb_disp_novos
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='4' and dsp_nvo_codigo='$id' ");
   
   $consultas = mysql_query("SELECT * FROM tb_disp_novos
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='5' and dsp_nvo_codigo='$id' ");
   
   $consultasab = mysql_query("SELECT * FROM tb_disp_novos
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='6' and dsp_nvo_codigo='$id' ");
   
   $consultadom = mysql_query("SELECT * FROM tb_disp_novos
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='7' and dsp_nvo_codigo='$id' ");
   
   
   
   //========================================================
   //--------------acompam=namento-------------------------
   //=======================================================
   ?>
<?php
   $consultadld = mysql_query("SELECT * FROM  tb_discipulados
   join tb_discipuladores on dsr_codigo=dld_dsr_codigo
   left join tb_est_aplicados on apl_dld_codigo=dld_codigo
   join tb_estudos ON est_codigo=apl_est_codigo
   join tb_novos on nvo_codigo=dld_nvo_codigo
   join tb_status on dld_sta_status=sta_codigo
   where nvo_codigo='$id'");
   ?>
<?php
   $consultacodigo = mysql_query("SELECT * FROM  tb_discipulados
   join tb_discipuladores on dsr_codigo=dld_dsr_codigo
   left join tb_est_aplicados on apl_dld_codigo=dld_codigo
   join tb_estudos ON est_codigo=apl_est_codigo
   join tb_novos on nvo_codigo=dld_nvo_codigo
   join tb_status on dld_sta_status=sta_codigo
   where nvo_codigo='$id'");
   
   while($codigo_ac = mysql_fetch_array( $consultacodigo ) )
           
             $codisgoac = $codigo_ac ['dld_codigo'];
          
   ?>
<?php
   $consultasegac = mysql_query("SELECT * FROM tb_dia_dos_estudos 
   left join tb_turmo on diaestudos_tur_codigo=tur_codigo
   left join tb_dia_semana on diaestudos_dia_codigo=dia_codigo
   WHERE diaestudos_dia_codigo='1' and diaestudos_dld_codigo='$codisgoac'");
   
   $consultaterac = mysql_query("SELECT * FROM tb_dia_dos_estudos 
   left join tb_turmo on diaestudos_tur_codigo=tur_codigo
   left join tb_dia_semana on diaestudos_dia_codigo=dia_codigo
   WHERE diaestudos_dia_codigo='2' and diaestudos_dld_codigo='$codisgoac' ");
   
   $consultaquaac = mysql_query("SELECT * FROM tb_dia_dos_estudos 
   left join tb_turmo on diaestudos_tur_codigo=tur_codigo
   left join tb_dia_semana on diaestudos_dia_codigo=dia_codigo
   WHERE diaestudos_dia_codigo='3' and diaestudos_dld_codigo='$codisgoac' ");
   
   $consultaquiac = mysql_query("SELECT * FROM tb_dia_dos_estudos 
   left join tb_turmo on diaestudos_tur_codigo=tur_codigo
   left join tb_dia_semana on diaestudos_dia_codigo=dia_codigo
   WHERE diaestudos_dia_codigo='4' and diaestudos_dld_codigo='$codisgoac' ");
   
   $consultasac = mysql_query("SELECT * FROM tb_dia_dos_estudos 
   left join tb_turmo on diaestudos_tur_codigo=tur_codigo
   left join tb_dia_semana on diaestudos_dia_codigo=dia_codigo
   WHERE diaestudos_dia_codigo='5' and diaestudos_dld_codigo='$codisgoac' ");
   
   $consultasabac = mysql_query("SELECT * FROM tb_dia_dos_estudos 
   left join tb_turmo on diaestudos_tur_codigo=tur_codigo
   left join tb_dia_semana on diaestudos_dia_codigo=dia_codigo
   WHERE diaestudos_dia_codigo='6' and diaestudos_dld_codigo='$codisgoac'");
   
   $consultadomac = mysql_query("SELECT * FROM tb_dia_dos_estudos 
   left join tb_turmo on diaestudos_tur_codigo=tur_codigo
   left join tb_dia_semana on diaestudos_dia_codigo=dia_codigo
   WHERE diaestudos_dia_codigo='7' and diaestudos_dld_codigo='$codisgoac'");
   
  $acompanhante = mysql_query("select dsr_nome, dld_acompanhante_dsr from tb_discipulados
  left join tb_discipuladores on dsr_codigo=dld_acompanhante_dsr  where dld_codigo='$codisgoac' ");  
   
   
   ?>
<?php
 $acp_dsr = mysql_fetch_array( $acompanhante )
 ?>
<?php
   echo "
     <div style='display:none'>
       <select  name='codigo' >
         <option value='$id' selected></option>
       </select>
     </div>
     <div style='display:none'>
       <select  name='nomenvo' >
         <option value='$id' selected></option>
       </select>
     </div>"
   
   ?>
<head>
   <title>PIBG - Integração</title>
   <meta http-equiv="X-UA-Compatible" content="IE=Edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
   <link rel="stylesheet" href="/css/bootstrap.min.css">
   <link rel="stylesheet" href="/css/font-awesome.min.css">
   <link rel="stylesheet" href="/css/animate.min.css">
   <link rel="stylesheet" href="/css/et-line-font.css">
   <link rel="stylesheet" href="/css/nivo-lightbox.css">
   <link rel="stylesheet" href="/css/nivo_themes/default/default.css">
   <link rel="stylesheet" href="/css/style.css">
   <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
   <!--Sessão do barra de Menú-->
   <div class="preloader">
      <div class="sk-spinner sk-spinner-circle">
         <div class="sk-circle1 sk-circle"></div>
         <div class="sk-circle2 sk-circle"></div>
         <div class="sk-circle3 sk-circle"></div>
         <div class="sk-circle4 sk-circle"></div>
         <div class="sk-circle5 sk-circle"></div>
         <div class="sk-circle6 sk-circle"></div>
         <div class="sk-circle7 sk-circle"></div>
         <div class="sk-circle8 sk-circle"></div>
         <div class="sk-circle9 sk-circle"></div>
         <div class="sk-circle10 sk-circle"></div>
         <div class="sk-circle11 sk-circle"></div>
         <div class="sk-circle12 sk-circle"></div>
      </div>
   </div>
   <section class="navbar navbar-fixed-top custom-navbar" role="navigation">
      <div class="container">
         <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
            </button>
            <p class="navbar-header"">
               <a href="/ministerio/home" ><img src="/images/logo.png"> </a>
            </p>
         </div>
         <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               <li><a href="/ministerio/home" class="smoothScroll">HOME</a></li>
               <li><a href="/ministerio/pgm" class="smoothScroll">PGM</a></li>
               <li><a href="/ministerio/lideres" class="smoothScroll">LÍDERES</a></li>
               <li><a href="/ministerio/discipulos" class="smoothScroll">DISCÍPULOS</a></li>
               <li><a href="/ministerio/discipuladores" class="smoothScroll">DISCIPULADORES</a></li>
               <li><a href="/ministerio/discipulados" class="smoothScroll">DISCIPULADOS</a></li>
               <li><a href="/ministerio/contatos" class="smoothScroll">CONTATO</a></li>
            </ul>
         </div>
      </div>
   </section>
   <!--==============================    ABAS    =========================-->
   <section id="about">
   <div class="container">
   <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
         <div class="section-title"><a href="/ministerio/discipulos">
            <strong>Discípulos</strong></a>
         </div>
         <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">DADOS</a></li>
            <li><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">ACOMPANHAR</a></li>
            <!--<li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">SOCIAL</a></li>-->
         </ul>
         <div class="tab-content">
            <div role="tabpanel" class="tab-pane " id="mobile" >
               <section >
               <!--==========================  FORMULARIO ACOMPANHAMENTO ========================================-->
               <?php
                  $row1 = mysql_fetch_array( $consultadld )
                  ?>
               <?php
                  if ($row1['dsr_codigo']==0 ){
                  echo "
                        <div class='col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-8'>
                          <label style='opacity: 0.5 ;background:red;color:#000;' class='form-control' > SEM ACOMPANHAMENTO</label>
                        </div>
                        <form method='post' class='wow fadeInUp' data-wow-delay='1.8s' name='formac'>
                          <div style='display:none;'>
                            <input type='text' value='$id' name='discipulo'>
                          </div>";
                  }else{
                  echo "
                        <form method='post' class='wow fadeInUp' data-wow-delay='0.5s' name='formac'>";
                        }
                  ?>
               <!--==============================    Discipulador    =========================-->
               <div class="col-md-4 col-sm-4">
                  <label>Discipulador</label>
                  <select name="discipulador" class="form-control" equired="">
                  <?php
                     echo
                       "<option selected value='".$row1['dsr_codigo']."'>".$row1['dsr_nome']."</option>";?>
                  <?php
                     $dsr = mysql_query("SELECT * FROM tb_discipuladores where dsr_std_codigo=1  order by dsr_nome");
                           while($result = mysql_fetch_array( $dsr ) )
                           {
                             $cod = $result ['dsr_codigo'];
                             $dsr1 = $result ['dsr_nome'];
                           echo "<option value='$cod'>$dsr1</option>";
                           }
                     ?>
                  </select>
               </div>
               <!--===============================   DISCIPULO  ===============================-->
               <div class="col-md-4 col-sm-4">
                  <label >Discipulo</label>
                  <?php
                     $consulta = mysql_query("SELECT * FROM tb_novos where nvo_codigo='$id'");
                     while ($row2= mysql_fetch_array( $consulta ) ) {
                     $dscnome = $row2['nvo_nome'];
                     }
                     echo "
                     <input type='text' style='display:none;' class='form-control' name='nvocodigo' value='$id'>
                     <input type='text' style='display:none;' class='form-control' name='codigodld' value='$codisgoac'>
                     <input type='button' style='cursor:default;' class='form-control' value='$dscnome' '>";?>
               </div>
               <!--==============================   DATA DOS ESTUDOS    =========================-->
               <?php
                  $datacadastro=date("d/m/Y", strtotime($row1['dld_data']));
                    if ($row1['dsr_codigo']==0 ){
                      echo "<div class='col-md-2 col-sm-2'>
                              <label>Estudo</label>
                              <select class='form-control' name='estudo' required=''>
                                <option selected>Selecione</option>";
                      $consultest= mysql_query("SELECT * FROM tb_estudos");
                      while($resultest = mysql_fetch_array( $consultest) )
                      {
                      $codest = $resultest ['est_codigo'];
                      $est = $resultest ['est_estudo'];
                        echo "<option value='$codest'>$est</option>";
                      }
                        echo "</select>";
                      }else{
                        echo"
                          <div class='col-md-2 col-sm-2'>
                            <label>Data do Cadastro</label>
                            <input class='form-control' type='button' value='$datacadastro'/>";
                      }
                  ?>
            </div>
            <!--==============================    STATUS    =========================-->
   
              <div class="col-md-2 col-sm-2">
               <label>Status</label>
               <select class="form-control" name="status" >
                  <?php
                     if ($row1['dsr_codigo']==0 ){
                       echo "<option selected >Selecione</option>";;
                     $consultacivil1 = mysql_query("SELECT * FROM tb_status 
                                                     WHERE sta_codigo NOT IN 
                                                       (SELECT dld_sta_status FROM tb_discipulados
                                                         where dld_codigo='".$row1['dld_codigo']."') ");
                     while($resultasta = mysql_fetch_array( $consultacivil1 ) )
                     {
                     $codstatus1 = $resultasta ['sta_codigo'];
                     $status1 = $resultasta ['sta_status'];
                       echo "<option value='$codstatus1'>$status1</option>";
                     }
                       echo "</select>";
                     }else{
                       echo
                         "<option selected value='".$row1['sta_codigo']."'>".$row1['sta_status']."</option>";
                     $consultacivil1 = mysql_query("SELECT * FROM tb_status
                                                     WHERE sta_codigo NOT IN
                                                       (SELECT dld_sta_status FROM tb_discipulados
                                                         where dld_codigo='".$row1['dld_codigo']."') ");
                     while($resultasta = mysql_fetch_array( $consultacivil1 ) )
                     {
                     $codcivil1 = $resultasta ['sta_codigo'];
                     $civil1 = $resultasta ['sta_status'];
                       echo "<option value='$codcivil1'>$civil1</option>";
                     }
                       echo "</select>";
                     }
                     ?>
<br>
               </div>
          <!--==============================   ACOMPANHANTE Do Discipulador    =========================-->
            <div class="col-md-4 col-sm-4">
               <label>Acompanhante</label>
               <select class="form-control" name="acompanhante" >
                  <?php
                     if ($row1['dld_acompanhante_dsr']==0 ){
                       echo "<option selected >Selecione</option>";
                     $consutacompes = mysql_query("SELECT * FROM tb_discipuladores   order by dsr_nome");
                     while($resultacompes = mysql_fetch_array( $consutacompes ) )
                     {
                     $codigoacopes = $resultacompes ['dsr_codigo'];
                     $nomeacompes = $resultacompes ['dsr_nome'];
                       echo "<option value=' $codigoacopes'>$nomeacompes</option>";
                     }
                       echo "</select>";
                     }else{
                       echo
                          "<option selected value='".$acp_dsr['dld_acompanhante_dsr']."'>".$acp_dsr['dsr_nome']."</option>
                          <option >Sem Acompanhante</option>";
                       
                
                     $consutacomp = mysql_query("SELECT * FROM tb_discipuladores order by dsr_nome");
                     while($resultacomp = mysql_fetch_array( $consutacomp ) )
                     {
                     $codigoacop = $resultacomp ['dsr_codigo'];
                     $nomeacomp = $resultacomp ['dsr_nome'];
                       echo "<option value=' $codigoacop'>$nomeacomp</option>";
                     }
                       echo "</select>";
                     }
                     ?>
            </div>
            <!--==============================    ESTUDOS    =========================-->
            <div class="col-md-2 col-sm-2">
            <label >Estudos Aplicados</label>
            <table>
            <?php
               $consulta12 = mysql_query("SELECT * FROM tb_est_aplicados
                                           join tb_estudos on est_codigo=apl_est_codigo
                                             WHERE apl_dld_codigo='".$row1['apl_dld_codigo']."'
                                               order by est_estudo");
                             while($result12 = mysql_fetch_array( $consulta12 ) )
                             {
                               $cod = $result12 ['apl_est_codigo'];
                               $dsr = $result12 ['est_estudo'];
                               echo "<tr>
                                       <td><label>$dsr</label></td>
                                     </tr>";
                             }
               ?>
            </table>
            </div>
            <!--==============================    DIAS DOS ESTUDO    =========================-->
            <div class="col-md-6 col-sm-6">
            <label >Dias dos studos</label>
            <table>
            <thead>
            <tr>
            <th>Dia</th>
            <th>Turno</th>
            </tr>
            </thead>
            <!--==============================    SEGUNDA   =========================-->
            <?php
               $row2 = mysql_fetch_array( $consultasegac )
               ?>
            <tr>
            <td class="col-md-6 col-sm-6">
            <label>SEGUNDA-FEIRA</label>
            </td>
            <td>
            <select class='form-control' name='tursegunda'>
            <?php
               if ($row2['diaestudos_dia_codigo']=='1') {
               echo
                 "<option selected value='".$row2['diaestudos_tur_codigo']."'>".$row2['tur_turmo']."
                   </option>";
               }else{
               echo
                 "<option selected >Selecione</option>";
               }
               ?>
            <option >Não Disponível</option>
            <?php
               $consulturnoac = mysql_query("SELECT * FROM tb_turmo");
                             while($resulturno = mysql_fetch_array( $consulturnoac ) )
                             {
                             $codturno = $resulturno ['tur_codigo'];
                             $turno = $resulturno ['tur_turmo'];
               echo "<option value='$codturno'>$turno</option>";
               }
               ?>
            </select>
            </td>
            </tr>
            <!--===============================   TERÇA  ===============================-->
            <?php
               $tercaac = mysql_fetch_array( $consultaterac )
               ?>
            <tr>
            <td class="col-md-6 col-sm-6">
            <label>TERÇA-FEIRA</label>
            </td>
            <td>
            <select class="form-control" name="turterca" >
            <?php
               if ($tercaac['diaestudos_dia_codigo']=='2') {
               echo
               "<option selected value='".$tercaac['diaestudos_tur_codigo']."'>".$tercaac['tur_turmo']."
               </option>";
               }else{
               echo
               "<option selected >Selecione</option>";
               }
               ?>
            <option >Não Disponível</option>
            <?php
               $consulturno = mysql_query("SELECT * FROM tb_turmo");
               while($resulturno = mysql_fetch_array( $consulturno ) )
               {
               $codturno = $resulturno ['tur_codigo'];
               $turno = $resulturno ['tur_turmo'];
               echo "<option value='$codturno'>$turno</option>";
               }
               ?>
            </select>
            </td>
            </tr>
            <!--===============================   QUARTA ===============================-->
            <?php
               $quartaac= mysql_fetch_array( $consultaquaac )
               ?>
            <tr>
            <td class="col-md-6 col-sm-6">
            <label>QUARTA-FEIRA</label>
            </td>
            <td>
            <select class="form-control" name="turquarta" >
            <?php
               if ($quartaac['diaestudos_dia_codigo']=='3') {
               echo
               "<option selected value='".$quartaac['diaestudos_tur_codigo']."'>".$quartaac['tur_turmo']."</option>";
               }else{
               echo
               "<option selected >Selecione</option>";
               }
               ?>
            <option >Não Disponível</option>
            <?php
               $consulturno = mysql_query("SELECT * FROM tb_turmo");
                     while($resulturno = mysql_fetch_array( $consulturno ) )
                     {
                       $codturno = $resulturno ['tur_codigo'];
                       $turno = $resulturno ['tur_turmo'];
                     echo "<option value='$codturno'>$turno</option>";
                     }
               ?>
            </select>
            </td>
            </tr>
            <!--===============================   QUINTA  ===============================-->
            <?php
               $quintaac= mysql_fetch_array( $consultaquiac )
               ?>
            <tr>
            <td class="col-md-6 col-sm-6">
            <label>QUINTA-FEIRA</label>
            </td>
            <td>
            <select class="form-control" name="turquinta" >
            <?php
               if ($quintaac['diaestudos_dia_codigo']=='4') {
               echo
               "<option selected value='".$quintaac['diaestudos_tur_codigo']."'>".$quintaac['tur_turmo']."</option>";
               }else{
               echo
               "<option selected >Selecione</option>";
               }
               ?>
            <option >Não Disponível</option>
            <?php
               $consulturno = mysql_query("SELECT * FROM tb_turmo ");
                     while($resulturno = mysql_fetch_array( $consulturno ) )
                     {
                       $codturno = $resulturno ['tur_codigo'];
                       $turno = $resulturno ['tur_turmo'];
                     echo "<option value='$codturno'>$turno</option>";
                     }
               ?>
            </select>
            </td>
            </tr>
            <!--=========================     SEXTA    ====================================-->
            <?php
               $sextaac= mysql_fetch_array( $consultasac )
               ?>
            <tr>
            <td class="col-md-6 col-sm-6">
            <label>SEXTA-FEIRA</label>
            </td>
            <td>
            <select class="form-control" name="tursexta" >
            <?php
               if ($sextaac['diaestudos_dia_codigo']=='5') {
               echo
               "<option selected value='".$sextaac['diaestudos_tur_codigo']."'>".$sextaac['tur_turmo']."</option>";
               }else{
               echo
               "<option selected >Selecione</option>";
               }
               ?>
            <option >Não Disponível</option>
            <?php
               $consulturno = mysql_query("SELECT * FROM tb_turmo");
                     while($resulturno = mysql_fetch_array( $consulturno ) )
                     {
                       $codturno = $resulturno ['tur_codigo'];
                       $turno = $resulturno ['tur_turmo'];
                     echo "<option value='$codturno'>$turno</option>";
                     }
               ?>
            </select>
            </td>
            </tr>
            <!--====================    SABADO ================================-->
            <tr>
            <td class="col-md-6 col-sm-6">
            <label>SABADO</label>
            </td>
            <td>
            <?php
               $sabadoac = mysql_fetch_array( $consultasabac)
               ?>
            <select class="form-control" name="tursabado" >
            <?php
               if ($sabadoac['diaestudos_dia_codigo']=='6') {
               echo
               " <option selected value='".$sabadoac['diaestudos_tur_codigo']."'>".$sabadoac['tur_turmo']."
                 </option>";
               }else{
               echo
               "<option selected >Selecione</option>";
               }
               ?>
            <option >Não Disponível</option>
            <?php
               $consulturno = mysql_query("SELECT * FROM tb_turmo");
               while($resulturno = mysql_fetch_array( $consulturno ) )
               {
               $codturno = $resulturno ['tur_codigo'];
               $turno = $resulturno ['tur_turmo'];
               echo "<option value='$codturno'>$turno</option>";
               }
               ?>
            </select>
            </td>
            <!--======================   DOMINGO   ==============================-->
            <?php
               $row = mysql_fetch_array( $consultadomac )
               ?>
            </tr>
            <tr>
            <td class="col-md-6 col-sm-6">
            <label>DOMINGO</label>
            </td>
            </td>
            <td>
            <select class="form-control" name="turdomingo" >
            <?php
               if ($row['diaestudos_dia_codigo']=='7') {
               echo
               "<option selected value='".$row['diaestudos_tur_codigo']."'>".$row['tur_turmo']."
               </option>";
               }else{
               echo
               "<option selected >Selecione</option>";
               }
               ?>
            <option >Não Disponível</option>
            <?php
               $consulturno = mysql_query("SELECT * FROM tb_turmo");
               while($resulturno = mysql_fetch_array( $consulturno ) )
               {
               $codturno = $resulturno ['tur_codigo'];
               $turno = $resulturno ['tur_turmo'];
               echo "<option value='$codturno'>$turno</option>";
               }
               ?>
            </select>
            </td>
            </tr>
            </table>  <br>
            </div>
            <?php
               if ($row1['dsr_codigo']==0 ){
               echo "<section id='contact'>
               
               <div id='window'></div>
               <div class='col-md-4 col-sm-4'>
               <input type='submit' class='form-control' value='Atualizar Discipulado' onClick='Executacadastrodld();''>
               </div>
               </section>
               ";
               }else{
               echo "<section id='contact'>
               
               <div class='col-md-4 col-sm-4'>
               <input type='submit' class='form-control' value='Atualizar Discipulado' onClick='Executadld();'>
               </div>
               </section>
               ";
               }
               ?>
            </form>
            <div class="w3-container">
               <section id="contact">
                  <div class="col-md-4 col-sm-4">
                     <input type="submit" onclick="document.getElementById('id01').style.display='block'"  class="form-control" value="Novo Estudo">
                  </div>
               </section>
               <div id="id01" class="w3-modal">
                  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
                     <div class="w3-center"><br>
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
                     </div>
                     <form class="w3-container" method="post" action="/php/discipulado/addest.php">
                        <div class="w3-section">
                           <label><b>Informe o Estudo</b></label>
                           <select class="form-control" name="estudo" required="">
                              <option ></option>
                              <?php
                                 $consultest= mysql_query("SELECT * FROM tb_estudos");
                                 while($resultest = mysql_fetch_array( $consultest) )
                                 {
                                 $codest = $resultest ['est_codigo'];
                                 $est = $resultest ['est_estudo'];
                                 echo "<option value='$codest'>$est</option>";
                                 }
                                 
                                 ?>
                           </select>
                        </div>
                        <?php
                           $dldest= mysql_query("SELECT dld_codigo FROM tb_discipulados where dld_nvo_codigo='$id'");
                           while($dld_codigo = mysql_fetch_array( $dldest ))
                           {
                           
                           
                           echo "
                           <div style='display:none;'>
                           <input type='text' class='form-control'  name='discipuladop' value='".$dld_codigo['dld_codigo']."' />
                           </div>
                           ";
                           }
                           
                           ?>
                        <button class="w3-btn-block w3-blue w3-section w3-padding" type="submit">Adicionar</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!--=====================================================================================================================
            =============================DADOS DISCIPULOS ========================================================================
            ===================================================================================================================-->
         <div role="tabpanel"  class="tab-pane active" id="design" >
            <section >
               <form method="post" name="form">
                  <?php
                     $row = mysql_fetch_array( $consulta1 )
                     ?>
                  <?php
                     $datanas=date("d/m/Y", strtotime($row['nvo_dta_nascimento']));
                     $datadec=date("d/m/Y", strtotime($row['nvo_dta_decisao']));
                     ?>
                  <div class="col-md-6 col-sm-6">
                     <label>Nome Completo</label>
                     <input <?php echo "value='".$row['nvo_nome']."' "; ?> type="text" class="form-control" placeholder="Nome Completo" name="name" required=""/>
                  </div>
                  <?php
                     echo "<div style='display:none'><select  name='codigo' >
                     <option value='".$row['nvo_codigo']."' selected></option></select></div>"
                     ?>
                  <div class="col-md-2 col-sm-2">
                     <label>Data de Nascimento</label>
                     <?php echo " <input type='button' style='cursor:default;' class='form-control' value='$datanas'>";?>
                  </div>
                  <!--<div class="col-md-2 col-sm-2">
                     <label>Data de Nascimento<em style="color:red;">*</em></label>
                     
                     <input  <?php echo "value='".$row['nvo_dta_nascimento']."' "; ?> type="date" class="form-control" name="date" />
                     </div>-->
                  <div class="col-md-2 col-sm-2">
                     <label >Sexo </em></label>
                     <?php echo  " <input type='button' style='cursor:default;' class='form-control' value='".$row['sex_sexo']."'>";?>
                  </div>
                  <!--<div class="col-md-2 col-sm-2">
                     <label >Sexo <em style="color:red;">*</em></label>
                     <select class="form-control" name="sexo" >
                     <?php echo
                        "<option selected value='".$row['sex_codigo']."'>".$row['sex_sexo']."
                        </option>";?>
                     
                     <?php
                        $consultasex = mysql_query("SELECT * FROM tb_sexo");
                        while($resultsex = mysql_fetch_array( $consultasex ) )
                        {
                        $codsex = $resultsex ['sex_codigo'];
                        $sex = $resultsex ['sex_sexo'];
                        echo "<option value='$codsex'>$sex</option>";
                        }
                        ?>
                     </select>
                     </div>-->
                  <div style="display:none;">
                     <label>Estado Civil </label>
                     <select class="form-control" name="codigo" >
                     <?php echo
                        "<option selected value='".$row['nvo_codigo']."'>
                        </option>";?>
                     </select>
                  </div>
                  <div class="col-md-2 col-sm-2">
                     <label>Estado Civil </label>
                     <select class="form-control" name="civil" >
                     <?php echo
                        "<option selected value='".$row['civ_codigo']."'>".$row['civ_estado']."
                        </option>";?>
                     <?php
                        $consultacivil = mysql_query("SELECT * FROM tb_estado_civil where civ_codigo not  in ( select nvo_civ_codigo from tb_novos where nvo_codigo='".$row['nvo_codigo']."')");
                        while($resultcivil = mysql_fetch_array( $consultacivil ) )
                        {
                        $codcivil = $resultcivil ['civ_codigo'];
                        $civil = $resultcivil ['civ_estado'];
                        echo "<option value='$codcivil'>$civil</option>";
                        }
                        ?>
                     </select> <br>
                  </div>
                  <div class="col-md-3 col-sm-3">
                     <label>Telefone para Contato</label>
                     <input <?php echo "value='".$row['tel_novos']."' "; ?> class="form-control" placeholder="Número" type="number" name="telefone" maxlength="11" />
                  </div>
                  <div class="col-md-4 col-sm-4">
                     <label >Email </label>
                     <input  <?php echo "value='".$row['email_novos']."' "; ?>  tipe="email" class="form-control" placeholder="Email@seudominio" rows="7" name="email"  />
                  </div>
                  <div class="col-md-3 col-sm-3">
                     <label>Decisão</label>
                     <select  class="form-control" name="encontro">
                     <?php echo
                        "<option selected value='".$row['dec_codigo']."'>".$row['dec_tipo']."
                        </option>";?>
                     <?php
                        $consultadecisao = mysql_query("SELECT * FROM tb_decisao");
                        while($resultdecisao = mysql_fetch_array( $consultadecisao ) )
                        {
                        $codd = $resultdecisao ['dec_codigo'];
                        $decisao = $resultdecisao ['dec_tipo'];
                        echo "<option value='$codd'>$decisao</option>";
                        }
                        ?>
                     </select>
                  </div>
                  <div class="col-md-2 col-sm-2">
                     <label>Data da Decisão</em></label>
                     <?php echo " <input type='button' style='cursor:default;' class='form-control' value='$datadec'>";?><br>
                  </div>
                  <!--
                     <div class="col-md-2 col-sm-2">
                     <label>Data da Decisão</label>
                     <input <?php echo "value='".$row['nvo_dta_decisao']."' "; ?>  class="form-control" type="date" name="dataencontro"/><br>
                     </div>-->
                  <div class="col-md-6 col-sm-6">
                     <label>Endereço</label>
                     <input <?php echo "value='".$row['nvo_logradouro']."' "; ?>  class="form-control" type="text" name="endereco"/>
                  </div>
                  <div class="col-md-3 col-sm-3">
                     <label >Bairro </label>
                     <select class="form-control" name="bairro" >
                     <?php echo
                        "<option selected value='".$row['bai_codigo']."'>".$row['bai_bairro']."
                        </option>";?>
                     <?php
                        $consultabairro = mysql_query("SELECT * FROM tb_bairros order by bai_bairro");
                        while($resultbairro = mysql_fetch_array( $consultabairro ) )
                        {
                        $codbai = $resultbairro ['bai_codigo'];
                        $bai = $resultbairro ['bai_bairro'];
                        echo "<option value='$codbai'>$bai</option>";
                        }
                        ?>
                     </select> <br>
                  </div>
                  <div class="col-md-12 col-sm-12">
                     <label >Dias Disponíveis</label>
                     <table>
                        <thead>
                           <tr>
                              <th class="col-md-6 col-sm-6">Dia</th>
                              <th class="col-md-6 col-sm-6">Turno</th>
                           </tr>
                        </thead>
                        <tr>
                           <td class="col-md-6 col-sm-6">
                              <label>SEGUNDA-FEIRA</label>
                           </td>
                           <td>
                              <select class='form-control' name='tursegunda'>
                                 <?php
                                    $row = mysql_fetch_array( $consultaseg )
                                    ?>
                                 <?php
                                    if ($row['dsp_dia_codigo']=='1') {
                                    echo
                                    "<option selected value='".$row['dsp_tur_codigo']."'>".$row['tur_turmo']."
                                    </option>";
                                    }else{
                                    echo
                                    "<option selected >Selecione</option>";
                                    }
                                    ?>
                                 <option >Não Disponível</option>
                                 <?php
                                    $consulturno = mysql_query("SELECT * FROM tb_turmo");
                                    while($resulturno = mysql_fetch_array( $consulturno ) )
                                    {
                                    $codturno = $resulturno ['tur_codigo'];
                                    $turno = $resulturno ['tur_turmo'];
                                    echo "<option value='$codturno'>$turno</option>";
                                    }
                                    ?>
                              </select>
                           </td>
                        </tr>
                        <?php
                           $row = mysql_fetch_array( $consultater )
                           ?>
                        <tr>
                           <td class="col-md-6 col-sm-6">
                              <label>TERÇA-FEIRA</label>
                           </td>
                           <td>
                              <select class="form-control" name="turterca" >
                                 <?php
                                    if ($row['dsp_dia_codigo']=='2') {
                                    echo
                                    "<option selected value='".$row['dsp_tur_codigo']."'>".$row['tur_turmo']."
                                    </option>";
                                    
                                    }else{
                                    echo
                                    "<option selected >Selecione</option>";
                                    }
                                    ?>
                                 <option >Não Disponível</option>
                                 <?php
                                    $consulturno = mysql_query("SELECT * FROM tb_turmo");
                                    while($resulturno = mysql_fetch_array( $consulturno ) )
                                    {
                                    $codturno = $resulturno ['tur_codigo'];
                                    $turno = $resulturno ['tur_turmo'];
                                    echo "<option value='$codturno'>$turno</option>";
                                    }
                                    ?>
                              </select>
                           </td>
                        </tr>
                        <?php
                           $row = mysql_fetch_array( $consultaqua )
                           ?>
                        <tr>
                           <td class="col-md-6 col-sm-6">
                              <label>QUARTA-FEIRA</label>
                           </td>
                           <td>
                              <select class="form-control" name="turquarta" >
                                 <?php
                                    if ($row['dsp_dia_codigo']=='3') {
                                    echo
                                    "<option selected value='".$row['dsp_tur_codigo']."'>".$row['tur_turmo']."
                                    </option>";
                                    }else{
                                    echo
                                    "<option selected >Selecione</option>";
                                    }
                                    ?>
                                 <option >Não Disponível</option>
                                 <?php
                                    $consulturno = mysql_query("SELECT * FROM tb_turmo");
                                    while($resulturno = mysql_fetch_array( $consulturno ) )
                                    {
                                    $codturno = $resulturno ['tur_codigo'];
                                    $turno = $resulturno ['tur_turmo'];
                                    echo "<option value='$codturno'>$turno</option>";
                                    }
                                    ?>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td class="col-md-6 col-sm-6">
                              <?php
                                 $row = mysql_fetch_array( $consultaqui )
                                 ?>
                              <label>QUARTA-FEIRA</label>
                           </td>
                           <td>
                              <select class="form-control" name="turquinta" >
                                 <?php
                                    if ($row['dsp_dia_codigo']=='4') {
                                    echo
                                    "<option selected value='".$row['dsp_tur_codigo']."'>".$row['tur_turmo']."
                                    </option>";
                                    }else{
                                    echo
                                    "<option selected >Selecione</option>";
                                    }
                                    ?>
                                 <option >Não Disponível</option>
                                 <?php
                                    $consulturno = mysql_query("SELECT * FROM tb_turmo");
                                    while($resulturno = mysql_fetch_array( $consulturno ) )
                                    {
                                    $codturno = $resulturno ['tur_codigo'];
                                    $turno = $resulturno ['tur_turmo'];
                                    echo "<option value='$codturno'>$turno</option>";
                                    }
                                    ?>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td class="col-md-6 col-sm-6">
                              <label>SEXTA</label>
                           </td>
                           <td>
                              <?php
                                 $row = mysql_fetch_array( $consultas)
                                 ?>
                              <select class="form-control" name="tursexta" >
                                 <?php
                                    if ($row['dsp_dia_codigo']=='5') {
                                    echo
                                    "<option selected value='".$row['dsp_tur_codigo']."'>".$row['tur_turmo']."
                                    </option>";
                                    }else{
                                    echo
                                    "<option selected >Selecione</option>";
                                    }
                                    ?>
                                 <option >Não Disponível</option>
                                 <?php
                                    $consulturno = mysql_query("SELECT * FROM tb_turmo");
                                    while($resulturno = mysql_fetch_array( $consulturno ) )
                                    {
                                    $codturno = $resulturno ['tur_codigo'];
                                    $turno = $resulturno ['tur_turmo'];
                                    echo "<option value='$codturno'>$turno</option>";
                                    }
                                    ?>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td class="col-md-6 col-sm-6">
                              <label>SABADO</label>
                           </td>
                           <td>
                              <?php
                                 $row = mysql_fetch_array( $consultasab )
                                 ?>
                              <select class="form-control" name="tursabado" >
                                 <?php
                                    if ($row['dsp_dia_codigo']=='6') {
                                    echo
                                    "<option selected value='".$row['dsp_tur_codigo']."'>".$row['tur_turmo']."
                                    </option>";
                                    }else{
                                    echo
                                    "<option selected >Selecione</option>";
                                    }
                                    ?>
                                 <option >Não Disponível</option>
                                 <?php
                                    $consulturno = mysql_query("SELECT * FROM tb_turmo");
                                    while($resulturno = mysql_fetch_array( $consulturno ) )
                                    {
                                    $codturno = $resulturno ['tur_codigo'];
                                    $turno = $resulturno ['tur_turmo'];
                                    echo "<option value='$codturno'>$turno</option>";
                                    }
                                    ?>
                              </select>
                           </td>
                           <?php
                              $row = mysql_fetch_array( $consultadom )
                              ?>
                        </tr>
                        <tr>
                           <td class="col-md-6 col-sm-6">
                              <label>DOMINGO</label>
                           </td>
                           </td>
                           <td>
                              <select class="form-control" name="turdomingo" >
                                 <?php
                                    if ($row['dsp_dia_codigo']=='7') {
                                    echo
                                    "<option selected value='".$row['dsp_tur_codigo']."'>".$row['tur_turmo']."
                                    </option>";
                                    }else{
                                    echo
                                    "<option selected >Selecione</option>";
                                    }
                                    ?>
                                 <option >Não Disponível</option>
                                 <?php
                                    $consulturno = mysql_query("SELECT * FROM tb_turmo");
                                    while($resulturno = mysql_fetch_array( $consulturno ) )
                                    {
                                    $codturno = $resulturno ['tur_codigo'];
                                    $turno = $resulturno ['tur_turmo'];
                                    echo "<option value='$codturno'>$turno</option>";
                                    }
                                    ?>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <br>
                  </div>
                  <section id='contact'>
                     <div class='col-md-3 col-sm-3'>
                        <input type='submit' class='form-control' value='Atualizar Cadastro' onClick="ExecutaAcao();">
                     </div>
                  </section>
               </form>
         </div>
      </div>
   </div>
   </section>
   <script>
      function Executadld(Atualizar){
      document.formac.action =   '/php/discipulado/atualizardld.php';
      document.formac.submit();
      }
   </script>
   <script>
      function Executacadastrodld(Atualizar){
      document.formac.action =   '/php/discipulado/cadastrodld.php';
      document.formac.submit();
      }
   </script>
   <script>
      function ExecutaAcao(Atualizar){
      document.form.action =   '/php/discipulo/atualizardiscipulo.php';
      document.form.submit();
      }
   </script>
   <script>
      function Executa(deletar){
      document.form.action = '/php/discipulo/deletardiscipulo.php';
      document.form.submit();
      }
   </script>
   <script src="js/script.js"></script>
   <script src="/js/jquery.js"></script>
   <script src="/js/bootstrap.min.js"></script>
   <script src="/js/smoothscroll.js"></script>
   <script src="/js/isotope.js"></script>
   <script src="/js/imagesloaded.min.js"></script>
   <script src="/js/nivo-lightbox.min.js"></script>
   <script src="/js/jquery.backstretch.min.js"></script>
   <script src="/js/wow.min.js"></script>
   <script src="/js/custom.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
</body>
</html>	