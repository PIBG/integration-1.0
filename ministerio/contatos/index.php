<!DOCTYPE html>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
 protegePagina();  // Inclui o arquivo com o sistema de segurança
 
 // Chama a função que protege a página

$consulta = mysql_query("SELECT * FROM tb_discipuladores 
left join tb_tel_discipuladores on dsr_codigo=tel_dsr_codigo


order by dsr_nome");
?>
<?php
$consultalider = mysql_query("SELECT * FROM tb_lideres 
left join tb_tel_lideres on lid_codigo=tel_lid_codigo
order by lid_nome");
?>
<?php
$consultanvo = mysql_query("SELECT * FROM tb_novos 
left join tb_tel_novos on nvo_codigo=tel_nvo_codigo
order by nvo_nome");

$consultalider = mysql_query("SELECT * FROM tb_lideres 
join tb_pgm on pgm_codigo=lid_pgm_codigo
left join tb_tel_lideres on tel_lid_codigo=lid_codigo

order by lid_nome");
?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>PIBG - Agenda</title>
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
        <a href="/" ><img src="/images/logo.png"> </a>
      </p>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/ministerio/home" class="smoothScroll">HOME</a></li>
				<li><a href="/ministerio/pgm" class="smoothScroll">PGM</a></li>
				<li><a href="/ministerio/lideres" class="smoothScroll">LÍDERES</a></li>
				<li><a href="/ministerio/discipulos" class="smoothScroll">DISC�PULOS</a></li>
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
					<strong>AGENDA</strong>
					
				</div>	
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">DSR</a></li>
					<li><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">DSC</a></li>
					<li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">LDR</a></li>
				</ul>
				<!-- tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="design">
						<table>
							<thead>
							<tr>
								<th width="1">ID</th>
                                                                <th width="1">-</th> 
								<th>Name</th>
                                                                <th width="1">-</th>
								<th>Telefone</th>                                                                
							</tr>
							</thead>
							<tbody>
							<tr>
						       	<?php
						        while($row = mysql_fetch_array( $consulta ) ) {
						        	 $cont = $contador;
									$contador = $cont + 1;
						                 echo "<tr>
						          		<td>$contador</td>
                                                                        <td>-</td>
						                	<td> <a href='/ministerio/ver/discipulador/discipulador.php?discipulador=".$row['dsr_codigo']."'>".$row['dsr_nome']." </a></td>		                    
						                	<td>-</td>
                                                                        <td>".$row['tel_discipulador']."</td>						                 	             
						                      </tr>";
						            }if ($contador>0){
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
					<table>
							<thead>
							<tr>
								<th width="1">ID</th>
                                                                <th width="1">-</th> 
								<th>Name</th>
                                                                <th width="1">-</th>
								<th>Telefone</th>                                                                
							</tr>
							</thead>
							<tbody>
							<tr>
						       	<?php
						        while($row = mysql_fetch_array( $consultanvo ) ) {
						           $contnvo = $contadornvo;
							   $contadornvo = $contnvo + 1;
						          echo "<tr>
						          			<td>$contadornvo</td>
 <td>-</td>
						                	<td>".$row['nvo_nome']."</td>
		                                                          <td>-</td>
						                	<td>".$row['tel_novos']."</td>
						                 	             
						                </tr>";
						            }if ($contador>0){
                       echo "<tr><td style='background:#D0D0D0;opacity: 0.6;color:#000;' colspan='7'>Resultado encontrado ($contadornvo)</td></tr>";
                     }else{
                       echo "<tr><td style='background:#D0D0D0; opacity: 0.6;color:#000;' colspan='7'> Nenhum Resultado encontrado</td></tr>";
                      }
						       	?>
						    </tr>
							</tbody>
						</table>
			</div>
<div role="tabpanel" class="tab-pane" id="social">
					<table>
							<thead>
							<tr>
								<th width="1">ID</th>
                                                                <th width="1">-</th> 
								<th>Name</th>
                                                                <th width="1">-</th>
								<th>Telefone</th>                                                                
							</tr>
							</thead>
							<tbody>
							<tr>
						  <?php
						        while($row = mysql_fetch_array( $consultalider ) ) {
						           $cont1 = $contador1;
							   $contador1 = $cont1 + 1;
						          echo "<tr>
						          			<td>$contador1</td>
 <td>-</td>
						                	<td>".$row['lid_nome']."</td>
		                                                          <td>-</td>
						                	<td>".$row['tel_lideres']."</td>
						                 	             
						                </tr>";
						            }if ($contador>0){
                       echo "<tr><td style='background:#D0D0D0;opacity: 0.6;color:#000;' colspan='7'>Resultado encontrado ($contador)</td></tr>";
                     }else{
                       echo "<tr><td style='background:#D0D0D0; opacity: 0.6;color:#000;' colspan='7'> Nenhum Resultado encontrado</td></tr>";
                      }
						       	?>
						    </tr>
							</tbody>
						</table>
			</div>
		</div>
	</div>
</section>


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