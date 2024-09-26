<?php
	session_start();
	require "conexaoBanco.php";
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
	clearstatcache();
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
			<?php 
				$sql= "SELECT  (
					SELECT count(nome_grupo) FROM dados_grupos where com_sem_termo = 'COM TERMO' and id_osc=?
				) AS qtdeGruposComTermo,
				(
					 SELECT count(nome_grupo) FROM dados_grupos where com_sem_termo = 'SEM TERMO' and id_osc=?
				) AS qtdeGruposSemTermo,
				(
					SELECT count(id) FROM conteudo_grupo where id_grupo in (SELECT id FROM dados_grupos where com_sem_termo = 'COM TERMO' and id_osc=?)
				) as qtdeAtendidosComTermo,
				(
					SELECT count(id) FROM conteudo_grupo where id_grupo in (SELECT id FROM dados_grupos where com_sem_termo = 'SEM TERMO' and id_osc=?)
				) as qtdeAtendidosSemTermo,
				(
					SELECT count(id) FROM conteudo_grupo where id_grupo in (SELECT id FROM dados_grupos where com_sem_termo = 'COM TERMO' and id_osc=?) and situacao_prioritaria <> '1;'
				) as qtdeSituacaoPrioritaria,
				(
					SELECT count(id) FROM conteudo_grupo where id_grupo in (SELECT id FROM dados_grupos where com_sem_termo = 'COM TERMO' and id_osc=?) and id_referenciado_cras <> 1
				) as qtdeReferenciadoCRAS,
				(
					SELECT count(a.id) FROM conteudo_grupo a 
				
					inner join dados_atendido b ON
					b.id = a.id_atendido
				
					where a.id_grupo in (SELECT id FROM dados_grupos where com_sem_termo = 'COM TERMO' and id_osc=?) and b.nis is not Null
				
				) as qtdeComNIS,
				(
					SELECT count(id) FROM conteudo_grupo where id_grupo in (SELECT id FROM dados_grupos where com_sem_termo = 'COM TERMO' and id_osc=?) and id_possui_deficiencia <> 1
				) as qtdeComDeficiencia";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("iiiiiiii", $_SESSION['id'],$_SESSION['id'],$_SESSION['id'],$_SESSION['id'],$_SESSION['id'],$_SESSION['id'],$_SESSION['id'],$_SESSION['id']);
				if($stmt->execute()){
					$resultado = $stmt->get_result();
					while($row = $resultado->fetch_assoc()) { 
						//$row['status']
			?>
			<div class="row mb-3">
				<div class="col-md-3 ">
					<figure class="figure">
					<svg
						class="bd-placeholder-img figure-img img-fluid rounded"
						width="240"
						height="60"
						xmlns="http://www.w3.org/2000/svg"
						role="img"
						aria-label="Placeholder: Grupos com termo"
						preserveAspectRatio="xMidYMid slice"
						focusable="false"
					>
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#8ea9db" class="text-center"></rect>
						<text x="10%" y="50%" fill="#FFFFFF" dy=".3em">Grupos com termo</text>
					</svg>
					<figcaption class="figure-caption text-center border border-secondary border-top-0">
						<h1>
							<?php echo $row['qtdeGruposComTermo'] ?>
						</h1>
					</figcaption>
					</figure>
				</div>
				<div class="col-md-3 ">
					<figure class="figure">
					<svg
						class="bd-placeholder-img figure-img img-fluid rounded"
						width="240"
						height="60"
						xmlns="http://www.w3.org/2000/svg"
						role="img"
						aria-label="Placeholder: Número de atendidos com termo"
						preserveAspectRatio="xMidYMid slice"
						focusable="false"
					>
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#8ea9db" class="text-center"></rect>
						<text x="10%" y="50%" fill="#FFFFFF" dy=".3em">Nº de atendidos com termo</text>
					</svg>
					<figcaption class="figure-caption text-center border border-secondary border-top-0">
						<h1>
							<?php echo $row['qtdeAtendidosComTermo'] ?>
						</h1>
					</figcaption>
					</figure>
				</div>
				<div class="col-md-3 ">
					<figure class="figure">
					<svg
						class="bd-placeholder-img figure-img img-fluid rounded"
						width="240"
						height="60"
						xmlns="http://www.w3.org/2000/svg"
						role="img"
						aria-label="Placeholder: Grupos sem termo"
						preserveAspectRatio="xMidYMid slice"
						focusable="false"
					>
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#b8c6e0" class="text-center"></rect>
						<text x="10%" y="50%" fill="#FFFFFF" dy=".3em">Grupos sem termo</text>
					</svg>
					<figcaption class="figure-caption text-center border border-secondary border-top-0">
						<h1>
							<?php echo $row['qtdeGruposSemTermo'] ?>
						</h1>
					</figcaption>
					</figure>
				</div>
				<div class="col-md-3 ">
					<figure class="figure">
					<svg
						class="bd-placeholder-img figure-img img-fluid rounded"
						width="240"
						height="60"
						xmlns="http://www.w3.org/2000/svg"
						role="img"
						aria-label="Placeholder: Número de atendidos sem termo"
						preserveAspectRatio="xMidYMid slice"
						focusable="false"
					>
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#b8c6e0" class="text-center"></rect>
						<text x="10%" y="50%" fill="#FFFFFF" dy=".3em">Nº de atendidos sem termo</text>
					</svg>
					<figcaption class="figure-caption text-center border border-secondary border-top-0">
						<h1>
							<?php echo $row['qtdeAtendidosSemTermo'] ?>
						</h1>
					</figcaption>
					</figure>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-3 ">
					<figure class="figure">
					<svg
						class="bd-placeholder-img figure-img img-fluid rounded"
						width="240"
						height="60"
						xmlns="http://www.w3.org/2000/svg"
						role="img"
						aria-label="Placeholder: Em situação prioritária"
						preserveAspectRatio="xMidYMid slice"
						focusable="false"
					>
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#8ea9db" class="text-center"></rect>
						<text x="10%" y="50%" fill="#FFFFFF" dy=".3em">Situação prioritária</text>
					</svg>
					<figcaption class="figure-caption text-center border border-secondary border-top-0">
						<h1>
							<?php echo $row['qtdeSituacaoPrioritaria'] ?>
						</h1>
					</figcaption>
					</figure>
				</div>
				<div class="col-md-3 ">
					<figure class="figure">
					<svg
						class="bd-placeholder-img figure-img img-fluid rounded"
						width="240"
						height="60"
						xmlns="http://www.w3.org/2000/svg"
						role="img"
						aria-label="Placeholder: Referenciados no CRAS"
						preserveAspectRatio="xMidYMid slice"
						focusable="false"
					>
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#8ea9db" class="text-center"></rect>
						<text x="10%" y="50%" fill="#FFFFFF" dy=".3em">Referenciados no CRAS</text>
					</svg>
					<figcaption class="figure-caption text-center border border-secondary border-top-0">
						<h1>
							<?php echo $row['qtdeReferenciadoCRAS'] ?>
						</h1>
					</figcaption>
					</figure>
				</div>
				<div class="col-md-3 ">
					<figure class="figure">
					<svg
						class="bd-placeholder-img figure-img img-fluid rounded"
						width="240"
						height="60"
						xmlns="http://www.w3.org/2000/svg"
						role="img"
						aria-label="Placeholder: Com NIS"
						preserveAspectRatio="xMidYMid slice"
						focusable="false"
					>
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#8ea9db" class="text-center"></rect>
						<text x="10%" y="50%" fill="#FFFFFF" dy=".3em">Com NIS</text>
					</svg>
					<figcaption class="figure-caption text-center border border-secondary border-top-0">
						<h1>
							<?php echo $row['qtdeComNIS'] ?>
						</h1>
					</figcaption>
					</figure>
				</div>
				<div class="col-md-3 ">
					<figure class="figure">
					<svg
						class="bd-placeholder-img figure-img img-fluid rounded"
						width="240"
						height="60"
						xmlns="http://www.w3.org/2000/svg"
						role="img"
						aria-label="Placeholder: Com Deficiência"
						preserveAspectRatio="xMidYMid slice"
						focusable="false"
					>
						<title>Placeholder</title>
						<rect width="100%" height="100%" fill="#8ea9db" class="text-center"></rect>
						<text x="10%" y="50%" fill="#FFFFFF" dy=".3em">Com Deficiência</text>
					</svg>
					<figcaption class="figure-caption text-center border border-secondary border-top-0">
						<h1>
							<?php echo $row['qtdeComDeficiencia'] ?>
						</h1>
					</figcaption>
					</figure>
				</div>
			</div>
			<?php
					}
				}
				$resultado->free_result();
				$stmt->close();
			?>
		</div>
		<!-- Bootstrap Bundle com Popper -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
		<script src='js/scripts.js'></script>
	</body>
</html>