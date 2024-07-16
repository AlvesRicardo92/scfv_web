<?php
	session_start();
	require "conexaoBanco.php";
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Normalize CSS -->
		<link href="css/normalize.css" rel="stylesheet">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- CSS personalizado -->
		<link href="css/style.css" rel="stylesheet">
		<!-- Font-Awesome -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
		<!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<title>Início</title>
	</head>
	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
			<div class="container-fluid">
				<?php
					require "menu_superior.php"
				?>
			</div>
		</nav>
		
		<div class="container">

		</div>
		<!-- Bootstrap Bundle com Popper -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
		<script src='js/scripts.js'></script>
	</body>
</html>