<!DOCTYPE html>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
 protegePagina(); // Inclui o arquivo com o sistema de segurança


?>

<head>

  <meta charset="utf-8">
  <title>PIBG - Disc&iacute;pulo</title>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <!--link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"-->
<link rel="icon" href="/favicon.ico" type="image/x-icon">
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
<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <div class="section-title">
          <strong>Disc&iacute;pulos</strong>
          
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
      $sta_status = getPost('status');
      $nvo_bairro = getPost('bairro');

      if( $nvo_nome ){ $where[] = " `nvo_nome` LIKE '%{$nvo_nome}%'"; }
       if( $nvo_dec_codigo ){ $where[] = " `nvo_dec_codigo` = {$nvo_dec_codigo}  "; }
      if( $sta_status ){ $where[] = " `nvo_codigo`  {$sta_status} (select dld_nvo_codigo from tb_discipulados) "; }
      if( $nvo_bairro ){ $where[] = " `nvo_bai_codigo` = '{$nvo_bairro}'"; }

      $sql = "SELECT * FROM tb_novos left join tb_discipulados on dld_nvo_codigo=nvo_codigo left join tb_status on dld_sta_status=sta_codigo";
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
                           <option value='1'>DECIDIDOS (NOVOS)</option>
                           <option value='3'>N&Atilde;O DECIDIDOS</option>
                           <option value='2'>RECONCILIADOS</option>
                        </select>
                     </div>
   
  
<div class="col-md-2 col-sm-2">
                     <label>STATUS</em></label>       
                     <select name="status" class="form-control">
                         <option selected value=''>Selecione</option>
                         <option value='in'>ACOMPANHADOS</option>
                         <option value='not in'>N&Atilde;O ACOMPANHADOS</option>
                          
                     </select>
                  </div>
<div class="col-md-1 col-sm-1">
 <label>.</label>    
                    <button class="form-control" name="ok" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
</button></br>
</form>
                  </div>
            <form action="/php/print/discipulos.php"  method="post" target="_blank" >
            <table>
               <thead>
                  <tr>
                     <th width="1">  <input type="checkbox" name="iddsr[]"  onclick="marcarTodos(this.checked);"/>
     <span id="acao"></span> <br></th>
                     <th width="1"></th>
                     <th> Name Completo</th>
                      <th width="1"></th>
                      <th width="10">Print</th>
                        
                     <th width="1"></th>
                     <th width="10">Del</th>
                     <th width="1"></th>
                     
                    
                     <th width="3">Acp</th>
                     
                  </tr>
               </thead>
           
              <tbody>
              <tr>
                    <?php
                    if ($sql===NULL){
                    $consulta = mysql_query("SELECT * FROM tb_novos 
                                  left join 
                                    tb_discipulados on dld_nvo_codigo=nvo_codigo
                                        order by nvo_nome");
                    }
                   else{
                   $consulta = mysql_query("$sql");
                   }
                   
                    while($row = mysql_fetch_array( $consulta ) ) {
                        $cont = $contador;
                        $contador = $cont + 1;
                      echo "
                              <tr>
                              <td><input type='checkbox' name='iddsr[]' value='".$row['nvo_codigo']."' ></td> 
                              <td>-</td>
                            <td style=' text-align: left; '>
                             <a href='/ministerio/ver/discipulo/discipulo.php?discipulo=".$row['nvo_codigo']."'> ".$row['nvo_nome']."</a> </td>
                              <td>-</td>
                               <td >
                              <a href='/php/print/discipulo.php?discipulo=".$row['nvo_codigo']."' target='_blank'><i class='fa fa-print'></i></a></td>
                               <td>-</td>
                              <td >
                              <a href='javascript:func()'
                                onclick='confirmacao(".$row['nvo_codigo'].")'><i class='fa fa-trash'></i></a></td>
                               <td>-</td>
                                ";
                                if($row['dld_dsr_codigo']==0){
                                  echo "<td><div class='status-container'><span class='status-red'>N&Atilde;O</span></div></td></td>";
                                }else {
                                  echo "<td><div class='status-container'><span class='status-green'>SIM</span></div></td></td>";
                                }
                             echo "
                                         
                            </tr>";
                       }
                       
                     
                       if ($contador>0){
                                  
                               echo "   <tr>
                                  
                                  <td style='background:#D0D0D0;opacity: 0.6;color:#000;' ><div id='action_buttons' class='action-buttons'>
                                       
                                        <button type='submit'  class='btn-alt' ><i class='fa fa-print'></i></button>
                                       </div></td>
                                   <td style='background:#D0D0D0;opacity: 0.6;color:#000;' colspan='8'>Resultado encontrado ($contador)</td>                                
                                </tr>";
                               

                     }else{
                       echo "<tr>  
                               <td style='background:#D0D0D0; opacity: 0.6;color:#000;' colspan='9'> Nenhum Resultado encontrado</td>
                                
                                  </tr>";
                      }
                    ?>

                </tr>
              </tbody>
            </table>
           
          
  </form>
          </div>
          <div role="tabpanel" class="tab-pane" id="mobile">
          <section >    
          <form action="/php/discipulo/cadastronovos.php" method="post" class="wow fadeInUp" data-wow-delay="0.6s">
          <div class="col-md-6 col-sm-6">
            <label>Nome Completo<em style="color:red;">*</em></label>
            <input type="text" class="form-control" placeholder="Nome Completo" name="name" required=""/>
          </div>
          <div class="col-md-2 col-sm-2">
            <label>Data de Nascimento<em style="color:red;">*</em></label>
                    <input type="date" class="form-control" name="date" />
          </div>
          <div class="col-md-2 col-sm-2">
            <label >Sexo <em style="color:red;">*</em></label>
                      <select class="form-control" name="sexo" > 
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
                    <select class="form-control" name="civil" > 
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
          </select> <br>  
          </div>
          <div class="col-md-3 col-sm-3">
            <label>Telefone para Contato</label>
            <input  class="form-control" placeholder="N&uacute;mero" type="number" name="telefone" maxlength="11" />
          </div>
          <div class="col-md-4 col-sm-4">
            <label >Email </label>
            <input tipe="email" class="form-control" placeholder="Email@seudominio" rows="7" name="email"  />   
          </div>
          <div class="col-md-3 col-sm-3">
            <label>Decis&atilde;o</label>
                <select  class="form-control" name="encontro">
                     <option selected>Selecione</option>
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
            <label>Data da Decis&atilde;o</label>
                    <input class="form-control" type="date" name="dataencontro"/><br>
          </div>
          <div class="col-md-6 col-sm-6">
            <label>Endere&ccedil;o</label>
                    <input class="form-control" type="text" name="endereco"/>
          </div>
          <div class="col-md-3 col-sm-3">
            <label >Bairro <em style="color:red;">*</em></label>
                     <select class="form-control" name="bairro" > 
                         <option selected>Selecione</option>
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
             <label >Dias Dispon&iacute;veis<em style="color:red;">*</em></label>
                
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
                    <td>
                      <div style="display:none"><select  name="terca" > 
                         <option value="2" selected></option></select></div>
                         <label>TER&Ccedil;A-FEIRA</label>
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
                 <td >
                    <div>
                    <div style="display:none"><select  name="quarta" > 
                         <option value="3" selected></option></select></div>
                         <label>QUINTA-FEIRA</label>

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
                    
                      <td>
                        <div style="display:none"><select  name="quinta" > 
                         <option value="4" selected></option></select></div>
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
                      <td>
                      <div style="display:none"><select  name="sexta" > 
                         <option value="5" selected></option></select></div>
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
                    <td>
                        <div style="display:none"><select  name="sabado" > 
                         <option value="6" selected></option></select></div><label>SABADO</label>
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
                    <td>
                       <div style="display:none"><select  name="domingo" > 
                         <option value="7" selected></option>
                            
            </select></div><label>
                       DOMINGO</label></td>
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
            <input type="submit" class="form-control" value="Cadastrar Discipulo">
          </div>
          </section>
          
        </form>             
              
      </div>
    </div>
  </div>
</section>
<script language="Javascript">
function confirmacao(id) {
     var resposta = confirm("Deseja remover esse Discipulo?");
 
     if (resposta == true) {
          window.location.href = "/php/discipulo/deletardiscipulo.php?discipulo="+id;
     }
}
</script>
<script type="text/javascript">
    function marcarTodos(marcar){
        var itens = document.getElementsByName('iddsr[]');

        if(marcar){
            document.getElementById('acao').innerHTML = '';
        }else{
            document.getElementById('acao').innerHTML = '';
        }

        var i = 0;
        for(i=0; i<itens.length;i++){
            itens[i].checked = marcar;
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