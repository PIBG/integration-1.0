<!DOCTYPE html>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include("seguranca.php"); // Inclui o arquivo com o sistema de seguranÃƒÂ§a
 protegePagina();  // Inclui o arquivo com o sistema de seguranÃƒÂ§a
 
 // Chama a funÃƒÂ§ÃƒÂ£o que protege a pÃƒÂ¡gina

$consulta = mysql_query("SELECT * FROM tb_receber order by rec_data asc");
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
         
         
         
         ?>

<head>

  <title>PIBG - Solicita&ccedil;&otilde;es</title>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
          <strong>Estudos Solicitados</strong>
          
        </div>  
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">TODOS</a></li>
          <li><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">N&Atilde;O CONTACTADOS</a></li>
          <!--li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">SOCIAL</a></li-->
        </ul>
        <!-- tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="design">
            <table>
               <thead>
                  <tr>
                  
                 
                     <th> Name</th>
               
                     <th width="1">N&uacute;mero</th>
                    
                     <th width="1">DATA</th>
                 
                     <th width="1">Cont</th>
                     
                  </tr>
               </thead>
           
              <tbody>
              <tr>
                    <?php
                    while($row = mysql_fetch_array( $consulta ) ) {
                        $datacadastro=date("d/m/Y", strtotime($row['rec_data']));
                        $codigo=$row['rec_codigo'];
                        $cont = $contador;
                  $contador = $cont + 1;
                      echo "<tr>
                           
                          
                            <td style=' text-align: left; '>
                             <a href='/ministerio/ver/solicitados/solicitados.php?solicitante=".$row['rec_codigo']."'> ".$row['rec_nome']."</a> </td>
                          
                              
                              <td >
                              ".$row['rec_numero']."
                             </td>
                             
                              <td>$datacadastro</td>
                            
                                <td>";
                                if($row['rec_str_codigo']==2){
                                echo "<a href='/php/solicitados/atualizar.php?solicitante=".$row['rec_codigo']."'> <i class='fa fa-square-o'></i></a> ";
                                } if ($row['rec_str_codigo']==1){
                                echo "<a href='/php/solicitados/atualizar.php?solicitante=".$row['rec_codigo']."'> <i class='fa fa-check-square-o'></i></a> ";
                             
                                }
                             echo "
                                </td>            
                            </tr>";
                        }
                    ?>
               
                </tr>
              </tbody>
            </table>
          </div>
          <div role="tabpanel" class="tab-pane" id="mobile">
           <table>
               <thead>
                <tr>
                  
                 
                     <th> Name</th>
               
                     <th width="1">N&uacute;mero</th>
                    
                     <th width="1">DATA</th>
                 
                     <th width="1">Cont</th>
                     
                  </tr>
               </thead>
           
              <tbody>
              <tr>
                    <?php
                    $consulta1 = mysql_query("SELECT * FROM tb_receber where rec_str_codigo=2 order by rec_data asc");
                    while($row = mysql_fetch_array( $consulta1 ) ) {
                    $datacadastro=date("d/m/Y", strtotime($row['rec_data']));
                        $codigo1=$row['rec_codigo'];
                        $cont1 = $contador1;
                  $contador1 = $cont1 + 1;
                      echo "<tr>
                             
                            <td style=' text-align: left; '>
                             <a href='/ministerio/ver/solicitados/solicitados.php?solicitante=".$row['rec_codigo']."'> ".$row['rec_nome']."</a> </td>
                         
                              <td >
                              ".$row['rec_numero']."
                             </td>
                           
                              <td>$datacadastro</td>
                     
                                <td>";
                                if($row['rec_str_codigo']==2){
                                echo "<a href='/ministerio/solicitados/index.php?solicitante=".$row['rec_codigo']."'> <i class='fa fa-square-o'></i></a> ";
                                } if ($row['rec_str_codigo']==1){
                                echo "<a href='/ministerio/solicitados/index.php?solicitante=".$row['rec_codigo']."'> <i class='fa fa-check-square-o'></i></a> ";
                             
                                }
                             echo "
                                </td>            
                            </tr>";
                        }
                    ?>
               
                </tr>
              </tbody>
            </table>
              
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