<!DOCTYPE html>
<?php
   error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
   include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
   protegePagina();  // Inclui o arquivo com o sistema de segurança
   
   // Chama a função que protege a página
   
   
   $id=$_GET['discipulador'];
   $consulta1 = mysql_query("SELECT * FROM tb_discipuladores
   left join tb_sexo on sex_codigo=dsr_sex_codigo
   left join tb_bairros on bai_codigo=dsr_bai_codigo
   left join tb_estado_civil on civ_codigo=dsr_civ_codigo
   left join tb_tel_discipuladores on dsr_codigo=tel_dsr_codigo
   left join tb_email_discipuladores on email_dsr_codigo=dsr_codigo
   left join tb_discipulados on dld_dsr_codigo=dsr_codigo
   left join tb_pgm on pgm_codigo=dsr_pgm_codigo
   join tb_lideres on lid_pgm_codigo=pgm_codigo
   join tb_status_discipuladores on dsr_std_codigo=std_codigo
   where dsr_codigo='$id'");
   
   
   $consultaseg = mysql_query("SELECT * FROM tb_disp_discipulador
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='1' and dsp_dsr_codigo='$id'");
   
   $consultater = mysql_query("SELECT * FROM tb_disp_discipulador
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='2' and dsp_dsr_codigo='$id' ");
   
   $consultaqua = mysql_query("SELECT * FROM tb_disp_discipulador
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='3' and dsp_dsr_codigo='$id' ");
   
   $consultaqui = mysql_query("SELECT * FROM tb_disp_discipulador
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='4' and dsp_dsr_codigo='$id' ");
   
   $consultas = mysql_query("SELECT * FROM tb_disp_discipulador
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='5' and dsp_dsr_codigo='$id' ");
   
   $consultasab = mysql_query("SELECT * FROM tb_disp_discipulador
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='6' and dsp_dsr_codigo='$id' ");
   
   $consultadom = mysql_query("SELECT * FROM tb_disp_discipulador
   left join tb_turmo on dsp_tur_codigo=tur_codigo
   left join tb_dia_semana on dsp_dia_codigo=dia_codigo
   WHERE dsp_dia_codigo='7' and dsp_dsr_codigo='$id' ");
   
   
   
   //========================================================
   //--------------acompanhamentos-------------------------
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
           {
             $codisgoac = $codigo_ac ['dld_codigo'];
           }
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
   <title>PIBG - Discipuladores</title>
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
               <li><a href="/ministerio/lideres" class="smoothScroll">L&Iacute;DERES</a></li>
               <li><a href="/ministerio/discipulos" class="smoothScroll">DISC&Iacute;PULOS</a></li>
               <li><a href="/ministerio/discipuladores" class="smoothScroll">DISCIPULADORES</a></li>
               <li><a href="/ministerio/discipulados" class="smoothScroll">DISCIPULADOS</a></li>
               <li><a href="/ministerio/contatos" class="smoothScroll">AGENDA</a></li>
            </ul>
         </div>
      </div>
   </section>
   <!--==============================    ABAS    =========================-->
   <section id="about">
   <div class="container">
      <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <div class="section-title"><a href="/ministerio/discipuladores">
          <strong>Discipuladores</strong></a>
        </div>
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">DADOS</a></li>
            <li><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">ACOMPANHAR</a></li>
        <!--<li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">SOCIAL</a></li>-->
          </ul>

          <div class="tab-content">
          <div role="tabpanel" class="tab-pane active " id="design" >
          <form method="post" name="form">
                     <?php
                        $row = mysql_fetch_array( $consulta1 )
                        ?>
                     <?php
                        $datanas=date("d/m/Y", strtotime($row['dsr_dta_cadastro']));
                        
                        ?>
                     <div style="display:none;">
                        <input <?php echo "value='".$row['dsr_codigo']."' "; ?> type="text"  name="codigo" />
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <label>Nome Completo</label>
                        <input <?php echo "value='".$row['dsr_nome']."' "; ?> type="text" class="form-control" placeholder="Nome Completo" name="name" required=""/>
                     </div>
                     <?php
                        echo "<div style='display:none'><select  name='codigo' >
                        <option value='".$row['dsr_codigo']."' selected></option></select></div>"
                        ?>
                     <!--<div class="col-md-2 col-sm-2">
                        <label>Data de Nascimento<em style="color:red;">*</em></label>
                        
                        <input  <?php echo "value='".$row['dsr_dta_nascimento']."' "; ?> type="date" class="form-control" name="date" />
                        </div>-->
                     <div class="col-md-3 col-sm-3">
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
                     </select>
           
            <div class="col-md-3 col-sm-3">
            <label>Estado Civil </label>
            <select class="form-control" name="civil" >
            <?php echo
               "<option selected value='".$row['civ_codigo']."'>".$row['civ_estado']."
               </option>";?>
            <?php
               $consultacivil = mysql_query("SELECT * FROM tb_estado_civil where civ_codigo not  in ( select dsr_civ_codigo from tb_discipuladores where dsr_codigo='".$row['dsr_codigo']."')");
               while($resultcivil = mysql_fetch_array( $consultacivil ) )
               {
               $codcivil = $resultcivil ['civ_codigo'];
               $civil = $resultcivil ['civ_estado'];
               echo "<option value='$codcivil'>$civil</option>";
               }
               ?>
            </select> <br>
            </div>
            <div class="col-md-4 col-sm-4">
            <label>Telefone para Contato</label>
            <input <?php echo "value='".$row['tel_discipulador']."' "; ?> class="form-control" placeholder="Número" type="number" name="telefone" maxlength="11" />
            </div>
            <div class="col-md-4 col-sm-4">
            <label >Email </label>
            <input  <?php echo "value='".$row['email_discipulador']."' "; ?>  tipe="email" class="form-control" placeholder="Email@seudominio" rows="7" name="email"  />
            </div>
            <div class="col-md-4 col-sm-4">
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
            </select><br>
            </div>
            <div class="col-md-5 col-sm-5">
            <label >PGM</label>
            <select class="form-control" name="pgm" >
            <?php echo
               "<option selected value='".$row['pgm_codigo']."'>".$row['pgm_nome']." - ".$row['lid_nome']."
               </option>";?>
            <?php
               $consultapgm = mysql_query("SELECT * FROM tb_pgm 
                                             join tb_lideres on lid_pgm_codigo=pgm_codigo where pgm_codigo not  in ( select dsr_pgm_codigo from tb_discipuladores where dsr_codigo='".$row['dsr_codigo']."')");
               while($resultpgm = mysql_fetch_array( $consultapgm ) )
               {
               $codpgm = $resultpgm ['pgm_codigo'];
               $pgm = $resultpgm ['pgm_nome'];
               $lider= $resultpgm['lid_nome'];
               echo "<option value='$codpgm'>$pgm - $lider</option>";
               }
               ?>
            </select>
            </div>
            <div class="col-md-2 col-sm-2">
            <label>Status</em></label>       
            <select name="status" class="form-control"> 
            <?php echo 
               "<option selected value='".$row['dsr_std_codigo']."'>".$row['std_status']."</option>";?>
            <?php 
               $consultstd = mysql_query("SELECT * FROM tb_status_discipuladores where std_codigo not  in ( select dsr_std_codigo from tb_discipuladores where dsr_codigo='".$row['dsr_codigo']."')"); 
               while($resultstd = mysql_fetch_array( $consultstd ) ) 
               {   
               $codstd = $resultstd ['std_codigo']; 
               $std = $resultstd ['std_status'];                              
               echo "<option value='$codstd'>$std</option>"; 
               }
               ?>
            </select>
            </div>
            <div class="col-md-2 col-sm-2">
            <label>Data do Cadastro</label>
            <?php echo " <input type='button' style='cursor:default;' class='form-control' value='$datanas'>";?><br>
            </div> 
            <div class="col-md-12 col-sm-12">
            <label >Dias Dispon&iacute;veis</label>
            <table>
            <thead>
            <tr>
            <th class="col-md-6 col-sm-6">Dia</th>
            <th class="col-md-6 col-sm-6">Turno</th>
            </tr>
            </thead>
            <!--=================   SEGUNDA =====================-->
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
            <option >N&atilde;o Dispon&iacute;vel</option>
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
            <label>TER&Ccedil;A-FEIRA</label>
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
            <option> N&atilde;o Dispon&iacute;vel</option>
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
            <option >N&atilde;o Dispon&iacute;vel</option>
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
            <label>QUINTA-FEIRA</label>
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
            <option >N&atilde;o Dispon&iacute;vel</option>
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
            <option >N&atilde;o Dispon&iacute;vel</option>
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
            <option >N&atilde;o Dispon&iacute;vel</option>
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
            <option >N&atilde;o Dispon&iacute;vel</option>
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
            <section id='contact'>
            <div class='col-md-3 col-sm-3'>
            <input type='submit' class='form-control' value='Atualizar Cadastro' onClick="ExecutaAcao();">
            </div>
            </section>
            </form>
          </div>

            <!--=============================  DADOS DISCIPULADOR =============================-->
            <div role="tabpanel"  class="tab-pane " id="mobile" >
            
                  
         </div>
      </div>
   </div>
   </section>
   <script>
      function ExecutaAcao(Atualizar){
      document.form.action =   '/php/discipulador/atualizardsr.php';
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