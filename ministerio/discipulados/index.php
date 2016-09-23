<!DOCTYPE html>
<?php
   error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
   include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
    protegePagina(); // Inclui o arquivo com o sistema de segurança
    
    // Chama a função que protege a página
   ?>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title>PIBG - Discipulados</title>
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
      <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
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
      <!-- preloader section -->
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
      <!-- navigation section -->
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
                  <li><a href="/ministerio/discipulos" class="smoothScroll">DISCIPULOS</a></li>
                  <li><a href="/ministerio/discipuladores" class="smoothScroll">DISCIPULADORES</a></li>
                  <li><a href="/ministerio/discipulados" class="smoothScroll">DISCIPULADOS</a></li>
                  <li><a href="/ministerio/contatos" class="smoothScroll">AGENDA</a></li>
               </ul>
            </div>
         </div>
      </section>
      <section id="about">
      <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 text-center">
            <div class="section-title">
               <strong>Discipulados</strong>
            </div>
            <ul class="nav nav-tabs" role="tablist">
               <li class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">LISTAR</a></li>
               <li><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">CADASTRAR</a></li>
               <!--li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">SOCIAL</a></li-->
            </ul>
            <!-- tab panes -->
            <div class="tab-content">
               <div role="tabpanel" class="tab-pane active" id="design">
                  <?php
                     if( $_SERVER['REQUEST_METHOD']=='POST' )
                     {
                        $where = Array();
                        $nvo_nome = getPost('nome');
                        $nvo_dec_codigo = getPost('dec');
                        $sta_status = getPost('status1');
                        $nvo_bairro = getPost('bairro');
                     
                        if( $nvo_nome ){ $where[] = " `nvo_nome` LIKE '%{$nvo_nome}%'"; }
                        if( $nvo_dec_codigo ){ $where[] = " `nvo_dec_codigo` = {$nvo_dec_codigo}  "; }
                        if( $sta_status ){ $where[] = " `sta_status` = '{$sta_status}'"; }
                        if( $nvo_bairro ){ $where[] = " `nvo_bai_codigo` = '{$nvo_bairro}'"; }
                     
                        $sql = "SELECT * FROM tb_discipulados
                     join tb_novos on dld_nvo_codigo=nvo_codigo 
                     join tb_discipuladores on dld_dsr_codigo=dsr_codigo
                     join tb_status on dld_sta_status=sta_codigo";
                        if( sizeof( $where ) )
                           $sql .= ' WHERE '.implode( ' AND ',$where );
                           $sql .= ' order by nvo_nome ';
                           // echo $sql;
                     }
                     //a cargo do leitor melhorar o filtro anti injection
                     function filter( $str ){
                        return addslashes( $str );
                     }
                     function getPost( $key ){
                        return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;
                     }
                     ?>
                  <style type="text/css">
                     label { display: block; }
                  </style>
                  <form action="" method="post">
                     <div class="col-md-3 col-sm-3">
                        <label>Nome</label>    
                        <input class="form-control" placeholder="pesquisar por nome" name="nome">
                        </button></br>
                     </div>
                     <div class="col-md-3 col-sm-3">
                        <label>Bairro</label>       
                        <select name="bairro" class="form-control">
                           <option selected value=''>Selecione</option>
                           <?php 
                              $consulta = mysql_query("SELECT * FROM tb_bairros order by bai_bairro"); 
                              while($result = mysql_fetch_array( $consulta ) ) 
                              {   
                              $cod = $result ['bai_codigo']; 
                                 $bai = $result ['bai_bairro'];
                              echo "<option value='$cod'>$bai</option>"; 
                              }
                              ?>
                        </select>
                     </div>
                     <div class="col-md-3 col-sm-3">
                        <label>Decis&atilde;o</em></label>        
                        <select name="dec" class="form-control">
                           <option selected value=''>Selecione</option>
                           <option value='4'>BATISMO</option>
                           <option value='1'>DECIDIU (NOVOS)</option>
                           <option value='3'>N&Atilde;O DECIDIU</option>
                           <option value='2'>RECONCILIOU</option>
                        </select>
                     </div>
                     <div class="col-md-2 col-sm-2">
                        <label>STATUS</em></label>       
                        <select name="status1" class="form-control">
                           <option selected value="">Selecione</option>
                           <?php 
                              $consultstd1 = mysql_query("SELECT * FROM tb_status"); 
                              while($resultstd1 = mysql_fetch_array( $consultstd1 ) ) 
                              {   
                              $codstd1 = $resultstd1 ['sta_codigo']; 
                              $std1 = $resultstd1 ['sta_status'];                              
                              echo "<option value='$std1'>$std1</option>"; 
                              }
                              ?>
                        </select>
                     </div>
                     <div class="col-md-1 col-sm-1">
                        <label>.</label>    
                        <button class="form-control" name="ok" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                        </button></br>
                     </div>
                     <table>
                        <thead>
                           <tr>
                              <th width="12">ID</th>
                              <th>Discipulo</th>
                              <th>Discipulodados</th>
                              <th width="60">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                                <?php
                                 if ($sql===NULL){
                                 $consulta = mysql_query("SELECT * FROM tb_discipulados
                                 join tb_novos on dld_nvo_codigo=nvo_codigo 
                                 join tb_discipuladores on dld_dsr_codigo=dsr_codigo
                                 join tb_status on dld_sta_status=sta_codigo");
                                   
                                 }                                  
                                 else{
                                 $consulta = mysql_query("$sql");
                                 }
                           
                                 while($row = mysql_fetch_array($consulta) ) {
                                              
                                                 
                                                $cont = $contador;
                                                $contador = $cont + 1;
                                                
                                               
                                                echo "<tr>     
                                                        <td>$contador</td>
                                                        <td><a href='/ministerio/ver/discipulo/discipulo.php?discipulo=".$row['nvo_codigo']."'>".$row['nvo_nome']."</a></td>                       
                                                        <td><a href='/ministerio/ver/discipulador/discipulador.php?discipulador=".$row['dsr_codigo']."'>".$row['dsr_nome']."</a></td>
                                                        
                                                       ";
                                                        if($row['sta_codigo']==1){
                                  echo "<td><div class='status-container'><span class='status-green'><a href='/ministerio/ver/discipulo/discipulo.php?discipulo=".$row['nvo_codigo']."'>".$row['sta_status']."</a></span></div></td></td>
                                          ";
                                }
                                                        
                                                       if($row['sta_codigo']==2){
                                                      echo "<td><div class='status-container'><span class='status-yellow'><a href='/ministerio/ver/discipulo/discipulo.php?discipulo=".$row['nvo_codigo']."'>".$row['sta_status']."</a></span></div></td></td>
                                           
             ";
                                }
                                if($row['sta_codigo']==3){
                                  echo"<td><div class='status-container'><span class='status-blue'><a href='/ministerio/ver/discipulo/discipulo.php?discipulo=".$row['nvo_codigo']."'>".$row['sta_status']."</a></span></div></td></td>
                                          ";
                           
                                }
                                }  if ($contador>0){
                       echo "<tr><td style='background:#D0D0D0;opacity: 0.6;color:#000;' colspan='7'>Resultado encontrado ($contador)</td></tr>";
                     }else{
                       echo "<tr><td style='background:#D0D0D0; opacity: 0.6;color:#000;' colspan='7'> Nenhum Resultado encontrado</td></tr>";
                      }
                    ?>
                              
                           </tr>
                        </tbody>
                     </table>
               </div>
               <div role="tabpanel" class="tab-pane" id="mobile">
               <section >   
               <form action="/php/discipulado/cadastrodld.php" method="post" class="wow fadeInUp" data-wow-delay="0.6s">
               <div class="col-md-4 col-sm-4">
               <label>Discipulador<em style="color:red;">*</em></label>       
               <select name="discipulador" class="form-control"> 
               <option selected>Selecione</option>
               <?php 
                  $consulta12 = mysql_query("SELECT * FROM tb_discipuladores where dsr_std_codigo=1  order by dsr_nome"); 
                  while($result12 = mysql_fetch_array( $consulta12 ) ) 
                  {   
                  $cod = $result12 ['dsr_codigo']; 
                     $dsr = $result12 ['dsr_nome'];
                  echo "<option value='$cod'>$dsr</option>"; 
                  }
                  ?>
               </select>
               </div>
               <div class="col-md-4 col-sm-4">
               <label >Discipulo<em style="color:red;">*</em></label>
               <select class="form-control" name="discipulo" > 
               <option selected>Selecione</option>
               <?php 
                  $consultanvo = mysql_query("select  * from tb_novos where nvo_codigo NOT IN
                  ( select distinct dld_nvo_codigo from tb_discipulados)"); 
                  while($resultnvo = mysql_fetch_array( $consultanvo ) ) 
                  {   
                  $codnvo = $resultnvo ['nvo_codigo']; 
                      $nvo = $resultnvo ['nvo_nome'];
                   echo "<option value='$codnvo'>$nvo</option>"; 
                  }
                  ?>
               </select>        
               </div>
               <div class="col-md-2 col-sm-2">
               <label>Estudo a ser aplicado <em style="color:red;">*</em></label>
               <select class="form-control" name="estudo" required=""> 
               <option selected>Selecione</option>
               <?php 
                  $consultest= mysql_query("SELECT * FROM tb_estudos"); 
                  while($resultest = mysql_fetch_array( $consultest) ) 
                  {   
                  $codest = $resultest ['est_codigo']; 
                  $est = $resultest ['est_estudo'];
                  echo "<option value='$codest'>$est</option>"; 
                  }
                  ?>
               </select> <br>   
               </div>
               <div class="col-md-2 col-sm-2">
               <label>Estudo a ser aplicado <em style="color:red;">*</em></label>
               <select class="form-control" name="status" required=""> 
               <option selected>Selecione</option>
               <?php 
                  $consultacivil1 = mysql_query("select `sta_codigo`, `sta_status` from `tb_status` "); 
                  while($resultcivil1 = mysql_fetch_array( $consultacivil1 ) ) 
                  {   
                  $codcivil1 = $resultcivil1 ['sta_codigo']; 
                  $civil1 = $resultcivil1 ['sta_status'];
                  echo "<option value='$codcivil1'>$civil1</option>"; 
                  }
                  ?>
               </select> <br>  
               </div>
               <div class="col-md-12 col-sm-12">
               <label >Dias dos studos</label>
               <table>
               <thead>
               <tr>
               <th class="col-md-6 col-sm-6">Dia</th>
               <th class="col-md-6 col-sm-6">Turno</th>                  
               </tr>
               </thead>
               <tr>
               <td class="col-md-6 col-sm-6">
               <label>SEGUNDA-FEIRA</label></td>
               <td>
               <select class="form-control" name="tursegunda" > 
               <option selected>Selecione</option>
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
               <label>TERÇA-FEIRA</label>
               </td>                   
               <td>
               <select class="form-control" name="turterca" > 
               <option selected>Selecione</option>
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
               <label>QUARTA-FEIRA</label>
               </td>
               <td>
               <select class="form-control" name="turquarta" > 
               <option selected>Selecione</option>
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
               <label>QUINTA-FEIRA</label>
               </td>
               <td>
               <select class="form-control" name="turquinta" > 
               <option selected>Selecione</option>
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
               <label>SEXTA-FEIRA</label>
               </td>
               <td>
               <select class="form-control" name="tursexta" > 
               <option selected>Selecione</option>
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
               </div>
               </td>
               <td>
               <select class="form-control" name="tursabado" > 
               <option selected>Selecione</option>
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
               <label>
               DOMINGO</label>
               </td>
               <td>
               <select class="form-control" name="turdomingo" > 
               <option selected>Selecione</option>
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
               <section id="contact">
               <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
                <input type='submit' class='form-control' value='Atualizar Cadastro' onClick="ExecutaAcao();">
               </div>
               </section>
               </form>             
            </div>
         </div>
      </div>
      </section>
      <script>
      function ExecutaAcao(Atualizar){
      document.form.action =   '/php/discipulado/cadastrodld.php';
      document.form.submit();
      }
   </script>
      <script src="/js/jquery.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/smoothscroll.js"></script>
      <script src="/js/isotope.js"></script>
      <script src="/js/imagesloaded.min.js"></script>
      <script src="/js/nivo-lightbox.min.js"></script>
      <script src="/js/jquery.backstretch.min.js"></script>
      <script src="/js/wow.min.js"></script>
      <script src="/js/custom.js"></script>
   </body>
</html>         