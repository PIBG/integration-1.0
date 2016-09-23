<!DOCTYPE html>
<?php
   error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
   include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
    protegePagina();  // Inclui o arquivo com o sistema de segurança
  
   ?>
    <html lang="pt-br">

    <head>

        <title>PIBG - Discipuladores</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--
         Template 2075 Digital Team
         
         http://www.tooplate.com/view/2075-digital-team
         
         -->
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
                    <p class="navbar-header">
                        <a href="/ministerio/home"><img src="/images/logo.png"> </a>
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
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-center">
                        <div class="section-title">
                            <strong>Discipuladores</strong>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">LISTAR</a></li>
                            <li><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">CADASTRAR</a></li>
                            <!--li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">SOCIAL</a></li-->
                        </ul>
                        <!-- ===================   ====================== -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="design">
                                <?php
   if( $_SERVER['REQUEST_METHOD']=='POST' )
   {
      $where = Array();
      $dsr_nome = getPost('nome');
      $dsr_pgm_codigo = getPost('pgm');
      $std_status = getPost('status');
      $dsr_bairro = getPost('bairro');

      if( $dsr_nome ){ $where[] = " `dsr_nome` LIKE '%{$dsr_nome}%'"; }
      if( $dsr_pgm_codigo ){ $where[] = " `dsr_pgm_codigo` = '{$dsr_pgm_codigo}'"; }
      if( $std_status ){ $where[] = " `std_status` = '{$std_status}'"; }
      if( $dsr_bairro ){ $where[] = " `dsr_bai_codigo` = '{$dsr_bairro}'"; }

      $sql = "SELECT * FROM tb_discipuladores join tb_status_discipuladores on std_codigo=dsr_std_codigo ";
      if( sizeof( $where ) )
         $sql .= ' WHERE '.implode( ' AND ',$where );
$sql .= 'order by dsr_nome ';
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
                                        label {
                                            display: block;
                                        }

                                    </style>
                                    <form action="" method="post">
                                        <div class="col-md-3 col-sm-3">
                                            <label>Nome</label>
                                            <input class="form-control" placeholder="Pesquisar por nome" name="nome">
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <label>PGM</em></label>
                                            <select name="pgm" class="form-control">
                         <option selected value=''>Selecione</option>
                        <?php 
                           $consultpgm = mysql_query("SELECT * FROM tb_pgm 
                             join tb_lideres on pgm_codigo=lid_pgm_codigo order by pgm_nome"); 
                           while($resultpgm = mysql_fetch_array( $consultpgm ) ) 
                           {   
                           $codpgm = $resultpgm ['pgm_codigo']; 
                              $pgm = $resultpgm ['pgm_nome'];
                               $lid = $resultpgm ['lid_nome'];
                           echo "<option value='$codpgm'>$pgm - $lid</option>"; 
                           }
                           ?>
                     </select>
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
                                        <div class="col-md-2 col-sm-2">
                                            <label>STATUS</em></label>
                                            <select name="status" class="form-control">
                        <option selected value=''>Selecione</option>
                        <?php 
                           $consultstd = mysql_query("SELECT * FROM tb_status_discipuladores"); 
                           while($resultstd = mysql_fetch_array( $consultstd ) ) 
                           {   
                           $codstd = $resultstd ['std_codigo']; 
                           $std = $resultstd ['std_status'];                              
                           echo "<option value='$std'>$std</option>"; 
                           }
                           ?>
                     </select>
                                        </div>

                                        <div class="col-md-1 col-sm-1">
                                            <label>.</label>
                                            <button class="form-control" name="ok" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
</button></br>

                                        </div>

                                    </form>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th width="1">ID</th>
                                                <th width="1">-</th>
                                                <th> Name Completo</a>
                                                </th>
                                                <th width="1">-</th>
                                                <th width="1">Del</th>
                                                <th width="1">-</th>


                                                <th width="1">Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>


                                                <?php
                   if ($sql===NULL){
                     
                  $consulta = mysql_query("SELECT * FROM tb_discipuladores join tb_status_discipuladores
                      on std_codigo=dsr_std_codigo where dsr_std_codigo in ('1','2') order by dsr_nome");
                 }
                 else{
                   $consulta = mysql_query("$sql");
                   }  
                        while($row = mysql_fetch_array( $consulta ) ) {
                            $cont = $contador;
                        $contador = $cont + 1;
                           echo "<tr>
                                      <td>$contador</td>
                                      <td>-</td>
                                      <td><a href='/ministerio/ver/discipulador/discipulador.php?discipulador=".$row['dsr_codigo']."'>".$row['dsr_nome']." </a> </td>
                                      <td>-</td> 
                                      <td>                                        
                                      <a href='javascript:func()'
                                          onclick='confirmacao(".$row['dsr_codigo'].")'><i class='fa fa-trash'></i></a>
                                      </td>
                                     <td>-</td>
                                     ";
                                if($row['std_codigo']==1){
                                  echo "<td><div class='status-container'><span class='status-green'>  ".$row['std_status']."
                                    </span></div></td>";
                                }
                                if($row['std_codigo']==2){
                                  echo "<td><div class='status-container'><span class='status-yellow'>  ".$row['std_status']."
                                    </span></div></td>";
                                }
                                if($row['std_codigo']==3){
                                  echo"<td><div class='status-container'><span class='status-red'>  ".$row['std_status']."
                                    </span></div></td>";
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
                            <!-- ===================   ====================== -->
                            <div role="tabpanel" class="tab-pane" id="mobile">
                                <section>
                                    <form action="/php/discipulador/cadastrodsr.php" method="post" class="wow fadeInUp" data-wow-delay="0.6s">
                                        <div class="col-md-5 col-sm-5">
                                            <label>Nome Completo</label>
                                            <input type="text" class="form-control" placeholder="Nome Completo" name="name" required="" />
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <label>Bairro<em style="color:red;">*</em></label>
                                            <select name="bairro" class="form-control">
                        <option selected>Selecione</option>
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
                                        <div class="col-md-2 col-sm-2">
                                            <label>Sexo <em style="color:red;">*</em></label>
                                            <select class="form-control" name="sexo">
                        <option selected>Selecione</option>
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
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <label>Estado Civil <em style="color:red;">*</em></label>
                                            <select class="form-control" name="civil" required="">
                        <option selected>Selecione</option>
                        <?php 
                           $consultacivil = mysql_query("SELECT * FROM tb_estado_civil"); 
                           while($resultcivil = mysql_fetch_array( $consultacivil ) ) 
                           {   
                           $codcivil = $resultcivil ['civ_codigo']; 
                           $civil = $resultcivil ['civ_estado'];
                           echo "<option value='$codcivil'>$civil</option>"; 
                           }
                           ?>
                     </select>
                                            <br>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <label>PGM</em></label>
                                            <select name="pgm" class="form-control">
                        <option selected>Selecione</option>
                        <?php 
                           $consultpgm = mysql_query("SELECT * FROM tb_pgm 
                             join tb_lideres on pgm_codigo=lid_pgm_codigo order by pgm_nome"); 
                           while($resultpgm = mysql_fetch_array( $consultpgm ) ) 
                           {   
                           $codpgm = $resultpgm ['pgm_codigo']; 
                              $pgm = $resultpgm ['pgm_nome'];
                               $lid = $resultpgm ['lid_nome'];
                           echo "<option value='$codpgm'>$pgm - $lid</option>"; 
                           }
                           ?>
                     </select>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <label>Telefone para Contato</label>
                                            <input class="form-control" placeholder="N&uacute;mero" type="number" name="telefone" maxlength="11" />
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <label>Email </label>
                                            <input tipe="email" class="form-control" placeholder="Email@seudominio" rows="7" name="email" /><br>
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <label>STATUS</em></label>
                                            <select name="status" class="form-control">
                        <option selected>Selecione</option>
                        <?php 
                           $consultstd = mysql_query("SELECT * FROM tb_status_discipuladores"); 
                           while($resultstd = mysql_fetch_array( $consultstd ) ) 
                           {   
                           $codstd = $resultstd ['std_codigo']; 
                           $std = $resultstd ['std_status'];                              
                           echo "<option value='$codstd'>$std</option>"; 
                           }
                           ?>
                     </select>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <label>Dias Dispon&iacute;veis</label>
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
                                                        <select class="form-control" name="tursegunda">
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
                                                    <td>
                                                        <div style="display:none">
                                                            <select name="terca">
                                    <option value="2" selected></option>
                                 </select>
                                                        </div>
                                                        <label>TER&Ccedil;A-FEIRA</label>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="turterca">
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
                                                    <td>
                                                        <div>
                                                            <div style="display:none">
                                                                <select name="quarta">
                                       <option value="3" selected></option>
                                    </select>
                                                            </div>
                                                            <label>QUARTA-FEIRA</label>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="turquarta"> 
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
                                                    <td>
                                                        <div style="display:none"><select name="quinta"> 
                        <option value="4" selected></option></select></div>
                                                        <label>QUINTA-FEIRA</label>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="turquinta"> 
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
                                                    <td>
                                                        <div style="display:none"><select name="sexta"> 
                        <option value="5" selected></option></select></div>
                                                        <label>SEXTA-FEIRA</label>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="tursexta"> 
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
                                                    <td>

                                                        <label>S&Aacute;BADO</label>

                                                    </td>

                                                    <td>
                                                        <select class="form-control" name="tursabado"> 
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
                                                    <td>
                                                        <div style="display:none"><select name="domingo"> 
                        <option value="7" selected></option>
                        </select></div><label>
                        DOMINGO</label></td>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="turdomingo"> 
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
                                            </table>
                                            <br>
                                            </div>
                                            <section id="contact">
                                                <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
                                                    <input type="submit" class="form-control" value="Enviar Contatos">
                                                </div>
                                            </section>
                                    </form>
                                    </div>
                            </div>
                        </div>
                        </section>
                        <script language="Javascript">
                            function confirmacao(id) {
                                var resposta = confirm("Deseja remover esse Discipulador?");

                                if (resposta == true) {
                                    window.location.href = "/php/discipulador/deletedsr.php?discipulador=" + id;
                                }
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
