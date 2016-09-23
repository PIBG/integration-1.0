<!DOCTYPE html>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
 protegePagina();  // Inclui o arquivo com o sistema de segurança
 
 // Chama a função que protege a página

$id=$_GET['lider'];
$consulta = mysql_query("SELECT * FROM tb_lideres 
join tb_bairros on bai_codigo=lid_bai_codigo 
join tb_pgm on lid_pgm_codigo=pgm_codigo
where lid_codigo='$id'");
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
				<li><a href="/ministerio/contatos" class="smoothScroll">CONTATO</a></li>
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
					<li ><a href="#design" aria-controls="design" role="tab" data-toggle="tab">LÍDER</a></li>
					<li class="active"><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab"></a></li>
					<!--li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">SOCIAL</a></li-->
				</ul>
				<!-- tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="design">
								
             			<form method="post" name="form">
                                
						<?php
						$row = mysql_fetch_array( $consulta ) 
						?>
<input style='display:none;'<?php echo "value='".$row['lid_codigo']."' "; ?>type='text' name='codigo' />
						<div class='col-md-4 col-sm-4'>
               				<label for='name'>Nome Completo</label>                
                			<input <?php echo "value='".$row['lid_nome']."' "; ?> class='form-control' type='text' name='name' required=' placeholder='Nome Completo' />
                		</div>
                			<div class='col-md-3 col-sm-3'>
							<label>Bairro</label>				
							<select name='bairro' class='form-control'> 
                    		<?php echo "<option selected value='".$row['bai_codigo']."'>".$row['bai_bairro']."</option>
                    	     ";?>
                    	    <?php 
                        	    $consulta2 = mysql_query('SELECT * FROM tb_bairros order by bai_bairro'); 
                            	while($result2 = mysql_fetch_array( $consulta2 ) ) 
                            	{   
                            	$cod = $result2 ['bai_codigo']; 
                                $bai = $result2 ['bai_bairro'];
                            	echo "<option value='$cod'>$bai</option>"; 
                    			}
                    		?>
						</select>
					</div>
                	
					<div class='col-md-2 col-sm-2'>
						<label>Telefone para Contato</label>
						<input <?php echo "value='".$row['tel_lider']."' "; ?>  type='number' class='form-control' placeholder='Número' name='telefone'  /><br>

					</div>
                
						<div class='col-md-3 col-sm-3'>
							<label>Lidera o PGM</label>				
							<select name='pgm' class='form-control'> 
                    		<?php echo "<option selected value='".$row['pgm_codigo']."'>".$row['pgm_nome']."</option>
                    	     ";?>
                    	    <?php 
                        	    $consulta3 = mysql_query("SELECT * FROM tb_pgm where pgm_codigo not in
                                                                (select lid_pgm_codigo from tb_lideres) order by pgm_nome"); 
                            	while($result3 = mysql_fetch_array( $consulta3 ) ) 
                            	{   
                            	$cod3 = $result3 ['pgm_codigo']; 
                                $pgm3 = $result3 ['pgm_nome'];
                            	echo "<option value='$cod3'>$pgm3</option>"; 
                    			}
                    		?>
						</select>
                               </div>
            		    </tbody>
                      </table>
					
					
					<!--div class='col-md-3 col-sm-3'>
						<label>Estado Civil</label>
						<input type='text' class='form-control' placeholder='Nome Completo' name='name' required='/>
					</div>
					<div class='col-md-12 col-sm-12'>
						<input tipe='email' class='form-control' placeholder='Email' rows='7' name='message' required=' />
					</div-->
					<section id='contact'>
					<div class='col-md-3 col-sm-3'>
						<input type='submit' class='form-control' value='Atualizar Cadastro' onClick="ExecutaAcao();">
					</div>

					<div class='col-md-3 col-sm-3'>
						<input type='submit' class='form-control' value='Deletar Cadastro' onClick="Executa();">
					</div>
					</section>
					
				</form>
			</div>
                 <div role="tabpanel" class="tab-pane" id="mobile">
			</div>
		</div>
	</div>
</section>

<!-- footer section -->
<footer>
	
		
			<div class="col-md-12 col-sm-12">
				<p>Copyright ©  | </p>
				<hr>
				
			</div>
	
</footer>

<script>
function ExecutaAcao(Atualizar){
   document.form.action =   '/php/lider/atualizarlider.php'; 
   document.form.submit();
}
</script>
<script>
function Executa(deletar){
   document.form.action = '/php/lider/deletarlider.php'; 
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