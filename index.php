<!DOCTYPE html>
<html lang="es">
	<head>
		<title>FLISOL</title>
		<meta charset="utf-8"/>
		<meta name="Author" content="http://www.linkedin.com/in/yasermeshir"/>
		<meta rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/misestilos.css"/>
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	</head>
	
	<body>
		<div class="wrap">
			<header>
				<a href="index.php"><img src="img/FLISoLBogotaLOGO.png"/> </a>
				<h1>Consultar Certificado</h1>
			</header>
			
			<section id="formulario">
				<center>
				<form  class="form-horizontal" method="post" ACTION="php/creaPDF.php" target="_blank">
						<input type="text" class="form-control" placeholder="Identificación N°" name="matricula">
						<br>
						<button name="buscar" type="submit" class="btn btn-default">Generar PDF</button>
						<button type="reset" class="btn btn-default">Borrar</button>
				</center>
				</form>
			</section>
		</div>
	</body>
</html>
