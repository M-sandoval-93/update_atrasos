<?php 
	include 'php/contenido.php';
	
 ?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h1 align="center" style="">Departamento...</h1><br>
				<?php echo query_obt_info($_GET['cod_departamento']); ?>
				<?php echo query_obt_info($_GET['cod_departamento']); ?>
			</div>
		</div>
	</div>
</body>