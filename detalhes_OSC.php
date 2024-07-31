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
		<script src="js/jquery-3.7.1.min.js"></script>
		<title>Detalhes da OSC</title>
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
				$sql= "SELECT a.nome_osc as 'nome',a.inscricao_cmas as 'cmas',a.cnpj as 'cnpj',b.logradouro as 'logradouro',a.numero_endereco as 'numero',a.site as 'site',a.telefone as 'telefone',a.email as 'email',c.nome_cras as 'cras',d.nome as 'tecnico' FROM dados_osc a 

				inner join dados_cep b ON
				b.id = a.id_cep
				
				inner join dados_cras c ON
				c.id = a.id_cras_referencia
				
				inner join dados_tecnico_cras d on 
				d.id=a.id_tecnico_ref_cras
				
				where a.id = ?";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("i", $_SESSION['id']);
				if($stmt->execute()){
					$resultado = $stmt->get_result();
					while($row = $resultado->fetch_assoc()) { 
			?>
			<div class="row">
				<div class="col-12 mb-4">
					<span class="input-group-text blue-cell" id="basic-addon3"><strong>SERVIÇO DE CONVIVÊNCIA E FORTALECIMENTO DE VÍNCULOS-SCFV</strong></span>
				</div>
			</div>
			<div class="row">
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell largura-50" id="basic-addon3">NOME DA ENTIDADE SOCIOASSISTENCIAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['nome']?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell largura-50" id="basic-addon3">Nº DE INSCRIÇÃO NO CMAS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['cmas'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell largura-50" id="basic-addon3">CNPJ:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['cnpj'] ?>"" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell largura-50" id="basic-addon3">ENDEREÇO DA ENTIDADE SOCIOASSISTENCIAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['logradouro'].', '.$row['numero'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell largura-50" id="basic-addon3">TELEFONE PARA CONTATO:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['telefone'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell largura-50" id="basic-addon3">PÁGINA ELETRÔNICA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['site'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell largura-50" id="basic-addon3">E-MAIL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['email'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell largura-50" id="basic-addon3">CRAS DE REFERÊNCIA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['cras'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell largura-50" id="basic-addon3">TÉCNICO DE REFERENCIA DO CRAS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['tecnico'] ?>" disabled>
					</div>
				</div>
			</div>
			<?php 
					}
				}
				$resultado->free_result();
				$stmt->close();
			?>
			<div class="row mb-2">
				<div class="col-12">
					<div class="auto-overflow">
						<table class="table table-bordered table-light table-hover">
							<thead>
								<tr>
									<th scope="col" style="background-color:rgb(79, 134, 236);font-size: 12px;">VISUALIZAR</th>
									<th scope="col" style="display:none">id</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">GRUPO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">TÉCNICO(A) DE REFERÊNCIA DA OSC NO GRUPO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">NOME DO GRUPO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">FAIXA ETÁRIA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">DIA(S) DA SEMANA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">CARGA HORÁRIA SEMANAL</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">ENDEREÇO DE EXECUÇÃO DO SERVIÇO</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									//$sql= "SELECT a.id as 'id', a.nome_grupo as 'nome',a.numero_grupo as 'numeroGrupo',b.faixa_etaria as 'faixaEtaria',a.ids_dia_semana as 'diasSemana',a.carga_horaria as 'cargaHoraria',c.logradouro as 'logradouro',a.numero_endereco as 'numero',d.nome as 'tecnicoOSC' FROM dados_grupos a 
									$sql= "SELECT a.id as 'id', a.nome_grupo as 'nome',a.com_sem_termo as 'comSemTermo',a.numero_grupo as 'numeroGrupo',b.faixa_etaria as 'faixaEtaria',a.ids_dia_semana as 'diasSemana',a.carga_horaria as 'cargaHoraria',a.endereco_execucao as enderecoExecucao,a.nome_tecnico_osc as 'tecnicoOSC' FROM dados_grupos a 

									inner join dados_faixa_etaria b ON
									b.id = a.id_faixa_etaria
									
									WHERE a.id_osc =? order by com_sem_termo, numero_grupo;";
									$stmt = $mysqli->prepare($sql);
									$stmt->bind_param("i", $_SESSION['id']);
									if($stmt->execute()){
										$resultado = $stmt->get_result();
										while($row = $resultado->fetch_assoc()) { 
								?>
								<tr>
									<td><button type="button" class="btn edit btn-outline-primary btn-sm visualizarGrupo"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
									<td style="display:none" class="idGrupo"><?php echo $row['id'] ?></td>
									<td><?php echo $row['comSemTermo'].' '.$row['numeroGrupo'] ?></td>
									<td><?php echo $row['tecnicoOSC'] ?></td>
									<td><?php echo $row['nome'] ?></td>
									<td><?php echo $row['faixaEtaria'] ?></td>
									<td><?php echo $row['diasSemana'] ?></td>
									<td><?php echo $row['cargaHoraria'] ?></td>
									<td><?php echo $row['enderecoExecucao']?></td>
								</tr>
								<?php
									}
								}
								$resultado->free_result();
								$stmt->close();
								?>
							</tbody>
						</table>
					</div>	
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-12" style="text-align:right;">
					<button type="button" class="btn btn-primary" id="downloadCSV">Fazer download</button>
				</div>
			</div>
		</div>
		<form id="form-dados" action="detalhes_grupo.php" method="post" style="display: none;">
			<input type="hidden" name="idGrupo">
			<input type="hidden" name="idosc">
		</form>
		<!-- Bootstrap Bundle com Popper -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
		<script src='js/scripts.js'></script>
	</body>
</html>
