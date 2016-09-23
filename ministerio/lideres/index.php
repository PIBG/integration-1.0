<!DOCTYPE html>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
 protegePagina();  // Inclui o arquivo com o sistema de segurança
 
 // Chama a função que protege a página
$consulta = mysql_query("SELECT * FROM tb_lideres 
join tb_pgm on pgm_codigo=lid_pgm_codigo
join tb_bairros on lid_bai_codigo=bai_codigo

order by lid_nome");
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PIBG - L&iacute;deres</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
<!--

Template 2075 Digital Team

http://www.tooplate.com/view/2075-digital-team

-->     <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
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
        <a href="ministerio/home/" ><img src="/images/logo.png"> </a>
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
					<strong>Líderes de PGM</strong>
					
				</div>	
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">LISTAR</a></li>
					<li><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">CADASTRAR</a></li>
					<!--li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">SOCIAL</a></li-->
				</ul>
				<!-- tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="design">
						<table >
						<thead>
						<tr>
							<th width="5">ID</th>
                                                        <th width="1">-</th>
							<th >LÍDERES</th>
                                                        <th width="1">-</th>
                                                        <th >BAIRRO</th>
                                                        <th width="1">-</th>							
                                                        <th width="5">DEL</th>
						</tr>
						</thead>
						<tbody>						
             			<?php
            		 	while($row = mysql_fetch_array( $consulta ) ) {
            		 		 $cont = $contador;
									$contador = $cont + 1;
            		       echo "<tr>
            		       		<td>$contador</td> 
            		       		<td>-</td>     
                                         <td> <a href='/ministerio/ver/lider/lider.php?lider=".$row['lid_codigo']."'>".$row['lid_nome']."</a></td>           		               
		       		         <td>-</td>     
                                         <td>".$row['bai_bairro']."</td>  
                                         <td>-</td> 
                                         <td>
            		           <a href='javascript:func()'
                                onclick='confirmacao(".$row['lid_codigo'].")'><i class='fa fa-trash'></i></a></td>
            		            </td>              
            		            </tr>";
            		           }if ($contador>0){
                       echo "<tr><td style='background:#D0D0D0;opacity: 0.6;color:#000;' colspan='7'>Resultado encontrado ($contador)</td></tr>";
                     }else{
                       echo "<tr><td style='background:#D0D0D0; opacity: 0.6;color:#000;' colspan='7'> Nenhum Resultado encontrado</td></tr>";
                      }
            		    ?> 
            		    </tbody>
                      </table>
					</div>
					<div role="tabpanel" class="tab-pane" id="mobile">
						
						<form method="post" action="/php/lider/cadastrolider.php" >
						<div class="col-md-6 col-sm-6">
               				<label for="name">Nome Completo<em style="color:red;">*</em></label>                
                			<input class="form-control" id="name" type="text" name="name" required="" placeholder="Nome Completo" />
                		</div>
                			<div class="col-md-3 col-sm-3">
							<label>Bairro que ele mora<em style="color:red;">*</em></label>				
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
					<div class="col-md-3 col-sm-3">
							<label>PGM que ele Lidera<em style="color:red;">*</em></label>				
							<select name="pgm" class="form-control"> 
                    		<option selected>Selecione</option>
                    	    <?php 
                        	    $consultapgm = mysql_query("SELECT * FROM tb_pgm where pgm_codigo not in 
																(select lid_pgm_codigo from tb_lideres)
																	order by pgm_nome;"); 
                            	while($resultpgm = mysql_fetch_array( $consultapgm ) ) 
                            	{   
                            	$codpgm = $resultpgm ['pgm_codigo']; 
                                $pgm = $resultpgm ['pgm_nome'];
                            	echo "<option value='$codpgm'>$pgm</option>"; 
                    			}
                    		?>
						</select><br>
					</div>
                	<div class="col-md-3 col-sm-3">
						<label>Telefone para Contato</label>
						<input type="number" class="form-control" placeholder="Número" name="telefone"  /><br>

					</div>
					<section id="contact">
					<div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
						<input type="submit" class="form-control" value="Cadastrar Líder">
					</div>
					</section>
				</form>
			</div>
		</div>
	</div>
</section>
<script language="Javascript">
function confirmacao(id) {
     var resposta = confirm("Deseja remover esse Lider?");
 
     if (resposta == true) {
          window.location.href = "/php/lider/deletarlider.php?lider="+id;
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