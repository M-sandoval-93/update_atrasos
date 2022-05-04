<?php 
	include 'contenido.php';
	
 ?>
<body>
	<div class="container">
		<div class="row">
				<?php query_obt_info($_GET['cod_departamento']); ?>
		</div>
	</div>
</body>