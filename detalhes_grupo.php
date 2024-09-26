<?php
	session_start();
	require "conexaoBanco.php";
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
	clearstatcache();
	// Verifica se os dados foram recebidos via POST
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Verifica se o campo 'dados' está presente no POST
		if (isset($_POST['idGrupo'])) {
		// Sanitiza os dados recebidos
		$idGrupo = $_POST['idGrupo'];
		}
	}	
	$contador=1;
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
		<title>Detalhes do Grupo</title>
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
			$sql= "SELECT
			a.id AS 'id',
			b.nome_osc AS 'nomeOSC',
			a.nome_grupo AS 'nomeGrupo',
			a.numero_grupo AS 'numeroGrupo',
			c.faixa_etaria AS 'faixaEtaria',
			a.ids_dia_semana AS 'diasSemana',
			a.carga_horaria AS 'cargaHoraria',
			a.endereco_execucao AS 'logradouro',
			a.numero_endereco AS 'numeroEndereco',
			a.nome_tecnico_osc AS 'nomeTecnico',
			d.nome_cras as 'crasReferencia'
		FROM
			dados_grupos a
		LEFT JOIN dados_osc b ON
			b.id = a.id_osc
		LEFT JOIN dados_faixa_etaria c ON
			c.id = a.id_faixa_etaria
		LEFT JOIN dados_cras d ON
		d.id=b.id_cras_referencia
		WHERE
			a.id = ?;";

			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("i", $idGrupo);
			if($stmt->execute()){
				$resultado = $stmt->get_result();
				while($row = $resultado->fetch_assoc()) { 
		?>
			<div class="row">
				<div class="col-6">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">OSC:</span>
						<input type="text" class="form-control nome_osc" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['nomeOSC'] ?>" disabled>
					</div>
				</div>
				<div class="col-2">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">GRUPO:</span>
						<input type="text" class="form-control numeroGrupo" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['numeroGrupo'] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">DIAS DA SEMANA:</span>
						<input type="text" class="form-control diasSemana" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['diasSemana'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">FAIXA ETÁRIA:</span>
						<input type="text" class="form-control faixaEtaria" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['faixaEtaria'] ?>" disabled>
					</div>
				</div>
				<div class="col-3">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">NOME DO GRUPO:</span>
						<input type="text" class="form-control nomeGrupo" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['nomeGrupo'] ?>" disabled>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">CARGA HORÁRiA SEMANAL:</span>
						<input type="text" class="form-control chSemanal" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['cargaHoraria'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">CRAS DE REF.:</span>
						<input type="text" class="form-control cras_osc" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['crasReferencia'] ?>" disabled>
					</div>
				</div>
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">TÉCNICO DE REF. DO CRAS:</span>
						<input type="text" class="form-control tecnicoCras" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['nomeTecnico'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">LOCAL DE EXECUÇÃO DO SERVIÇO:</span>
						<input type="text" class="form-control localExecucao" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['logradouro'].', '.$row['numeroEndereco'] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group mb-3 mesReferencia">
						<label class="input-group-text blue-cell" for="inputGroupSelect01">MÊS/ANO DE REF.</label>
						<select class="form-select" id="inputGroupSelect01">
						<option selected>Selecione...</option>
						<?php
							// Array com os nomes dos meses em português
							$meses = array(
								"Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", 
								"Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
							);

							// Ano atual
							$anoAtual = date("Y");

							// Ano posterior (próximo ano)
							$anoPosterior = $anoAtual + 1;

							// Itera pelos anos (atual e o posterior)
							for ($ano = $anoAtual; $ano <= $anoPosterior; $ano++) {
								// Itera pelos meses
								foreach ($meses as $indice => $nomeMes) {
									// Gera o valor no formato MÊS/ANO
									$valor = sprintf("%02d", $indice + 1) . "/" . $ano;
									echo "<option value='$valor'>$nomeMes/$ano</option>";
								}
							}
						?>
						</select>
					</div>
				</div>
				<?php
						}
					}
					$resultado->free_result();
					$stmt->close();
				?>
			</div>
			<div class="row mb-4">
				<div class="col-9">
					<a href="detalhes_OSC.php" class="btn btn-primary btnVoltar">Voltar</a>
				</div>
				<div class="col-3" style="text-align: right;">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="novoAtendido">Cadastrar Novo Atendido</button>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-12">
					<div class="auto-overflow">
						<table class="table table-bordered table-hover" id="tabelaAtendidos">
							<thead>
								<tr>
									<th scope="col" style="background-color:rgb(79, 134, 236);font-size: 12px;">EDITAR</th>
									<th scope="col" style="display:none">idAtendido</th>
									<th scope="col" style="display:none">idAtendidoNoGrupo</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">SEQ.</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">NOME DA PESSOA ATENDIDA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">NIS ATENDIDO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">CPF ATENDIDO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">TELEFONE</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">NOME DO ADULTO PARTICIPANTE DA ATIVIDADE</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">GRAU DE PARENTESCO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">DATA DE NASCIMENTO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">IDADE EM<br><?php echo date("d/m/Y") ?></th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">COR/RAÇA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">DATA INCLUSÃO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">SITUAÇÂO PRIORITÁRIA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">STATUS</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">DATA DESLIGAMENTO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">MOTIVO DESLIGAMENTO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">ENCAMINHAMENTO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">GRUPO A SER TRANSFERIDO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">REFERENCIADO NO CRAS</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">PAIF / PAEFI</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">PESSOA COM DEFICIÊNCIA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 10px;">TIPO DEFICIÊNCIA - CONFORME ESTATUTO PCD</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">NOME RESPONSÁVEL PELA FAMÍLIA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">NOME DA GENITORA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">CEP</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">ENDEREÇO RESIDENCIAL</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">Nº</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">COMPLEMENTO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">MICRO REGIÃO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">MACRO REGIÃO</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									function calcularIdade($dataNascimento){
										$dataNascimento = DateTime::createFromFormat('d/m/Y', $dataNascimento)->format('Y-m-d');
										$dataNascimento = new DateTime($dataNascimento);
										$hoje = new DateTime();
										$diferenca = $hoje->diff($dataNascimento);
										return $diferenca->y . ' ANOS E ' . $diferenca->m . ' MESES';
									}
									$sql= "SELECT
										a.id AS 'idAtendidoNoGrupo',
										b.id AS 'idAtendido',
										a.id_grupo AS 'idGrupo',
										b.nome AS 'nomeAtendido',
										b.nis AS 'nis',
										b.cpf AS 'cpf',
										a.telefone AS 'telefone',
										a.adulto_participante_atividade AS 'adultoParticipante',
										c.tipo_parentesco AS 'tipoParentesco',
										b.data_nascimento AS 'dataNascimento',
										d.cor_raca AS 'corRaca',
										a.data_inclusao AS 'dataInclusao',
										a.situacao_prioritaria AS 'situacaoPrioritaria',
										e.status AS 'status',
										a.data_desligamento AS 'dataDesligamento',
										f.motivo_desligamento AS 'motivoDesligamento',
										g.encaminhamento AS 'encaminhamento',
										n.numero_grupo AS 'numeroGrupoTransferido',
										h.referenciado AS 'referenciadoCras',
										i.paif_paefi AS 'paifPaefi',
										j.possui_deficiencia AS 'possuiDeficiencia',
										k.tipo_deficiencia AS 'tipoDeficiencia',
										a.nome_responsavel_familia AS 'nomeResponsavelFamilia',
										a.nome_genitora AS 'nomeGenitora',
										l.cep AS 'cep',
										l.logradouro 'logradouro',
										l.vila AS 'vila',
										l.bairro AS 'bairro',
										m.nome_cras AS 'cras',
										a.numero_endereco AS 'numeroEndereco',
										a.complemento_endereco AS 'complementoEndereco'
									FROM
										conteudo_grupo a
										
									INNER JOIN dados_atendido b ON
										b.id = a.id_atendido
									LEFT JOIN dados_parentesco c ON
										c.id = a.id_parentesco
									LEFT JOIN dados_cor_raca d ON
										d.id = a.id_cor_raca
									LEFT JOIN dados_status e ON
										e.id = a.id_status
									LEFT JOIN dados_motivo_desligamento f ON
										f.id = a.id_motivo_desligamento
									LEFT JOIN dados_encaminhamento g ON
										g.id = a.id_encaminhamento
									LEFT JOIN dados_referenciado_cras h ON
										h.id = id_referenciado_cras
									LEFT JOIN dados_paif_paefi i ON
										i.id = a.id_paif_paefi
									LEFT JOIN dados_possui_deficiencia j ON
										j.id = a.id_possui_deficiencia
									LEFT JOIN dados_tipo_deificiencia k ON
										k.id = a.id_tipo_deficiencia
									LEFT JOIN dados_cep l ON
										l.id = a.id_cep
									LEFT JOIN dados_cras m ON
										m.id = l.id_cras
									LEFT JOIN dados_grupos n ON 
										n.id = a.numero_grupo_transferido
									
									WHERE a.id_grupo =? ORDER BY b.nome;";
									$stmt = $mysqli->prepare($sql);
									$stmt->bind_param("i", $idGrupo);
									if($stmt->execute()){
										$resultado = $stmt->get_result();
										while($row = $resultado->fetch_assoc()) { 
											if ($row['status']=="INCLUIR"){
												echo '<tr style="background-color: rgb(54, 175, 85);">';
											}
											elseif ($row['status']=="EXCLUIR"){
												echo '<tr style="background-color: rgb(175, 54, 54);">';
											}
											elseif ($row['status']=="ALTERADO"){
												echo '<tr style="background-color: rgb(218, 197, 13);">';
											}
											elseif ($row['status']=="TRANSFERIDO"){
												echo '<tr style="background-color: rgb(138, 138, 138);">';
											}
											else {
												echo '<tr>';
											}
									
										if($row['status']!="EXCLUIR" && $row['status']!="TRANSFERIDO"){
											echo '<td><button type="button" class="btn edit btn-light btn-sm botao_editar" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-edit"></i></button></td>';
										}
										else{
											echo '<td></td>';
										}
									?>
									<td style="display:none" class="idAtendido"><?php echo $row['idAtendido'] ?></td>
									<td style="display:none" class="idAtendidoNoGrupo"><?php echo $row['idAtendidoNoGrupo'] ?></td>
									<td class="seqAtendido"><?php echo $contador; $contador+=1; ?></td>
									<td class="tbl_nomeAtendido"><?php echo $row['nomeAtendido'] ?></td>
									<td class="tbl_nis"><?php echo $row['nis'] ?></td>
									<td class="tbl_cpf"><?php echo $row['cpf'] ?></td>
									<td class="tbl_telefone"><?php echo $row['telefone'] ?></td>
									<td class="tbl_adultoParticipante"><?php echo $row['adultoParticipante'] ?></td>
									<td class="tbl_tipoParentesco"><?php echo $row['tipoParentesco'] ?></td>
									<td class="tbl_dataNascimento"><?php echo $row['dataNascimento'] ?></td>
									<td class="tbl_idade"><?php echo calcularIdade($row['dataNascimento'])?></td>
									<td class="tbl_corRaca"><?php echo $row['corRaca'] ?></td>
									<td class="tbl_dataInclusao"><?php echo $row['dataInclusao'] ?></td>
									<td class="tbl_situacaoPrioritaria"><?php echo $row['situacaoPrioritaria'] ?></td>
									<td class="tbl_status"><?php echo $row['status'] ?></td>
									<td class="tbl_dataDesligamento"><?php echo $row['dataDesligamento'] ?></td>
									<td class="tbl_motivoDesligamento"><?php echo $row['motivoDesligamento'] ?></td>
									<td class="tbl_encaminhamento"><?php echo $row['encaminhamento'] ?></td>
									<td class="tbl_numeroGrupoTransferido"><?php echo $row['numeroGrupoTransferido'] ?></td>
									<td class="tbl_referenciadoCras"><?php echo $row['referenciadoCras'] ?></td>
									<td class="tbl_paifPaefi"><?php echo $row['paifPaefi'] ?></td>
									<td class="tbl_possuiDeficiencia"><?php echo $row['possuiDeficiencia'] ?></td>
									<td class="tbl_tipoDeficiencia"><?php echo $row['tipoDeficiencia'] ?></td>
									<td class="tbl_nomeResponsavelFamilia"><?php echo $row['nomeResponsavelFamilia'] ?></td>
									<td class="tbl_nomeGenitora"><?php echo $row['nomeGenitora'] ?></td>
									<td class="tbl_cep"><?php echo $row['cep'] ?></td>
									<td class="tbl_logradouro"><?php echo $row['logradouro'] ?></td>
									<td class="tbl_numeroEndereco"><?php echo $row['numeroEndereco'] ?></td>
									<td class="tbl_complementoEndereco"><?php echo $row['complementoEndereco'] ?></td>
									<td class="tbl_vila"><?php echo $row['vila'] ?></td>
									<td class="tbl_bairro"><?php echo $row['bairro'] ?></td>
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
			<?php 
				$sql= "SELECT
				COUNT(resultado.idAtendido) AS totalAtendidos,
				SUM(
					CASE WHEN resultado.status = 'EXCLUIR' THEN 1 ELSE 0
				END
				) AS totalExcluidos,
				SUM(
					CASE WHEN resultado.status = 'TRANSFERIDO' THEN 1 ELSE 0
				END
				) AS totalTransferidos,
				SUM(
					CASE WHEN resultado.nis IS NOT NULL THEN 1 ELSE 0
				END
				) AS totalNis,
				SUM(
					CASE WHEN resultado.referenciadoCras = 'Sim' THEN 1 ELSE 0
				END
				) AS totalReferenciadoCras,
				SUM(
					CASE WHEN resultado.paifPaefi = 'PAIF' THEN 1 ELSE 0
				END
				) AS totalPaif,
				SUM(
					CASE WHEN resultado.paifPaefi = 'PAEFI' THEN 1 ELSE 0
				END
				) AS totalPaefi,
				SUM(
					CASE WHEN resultado.paifPaefi = 'NÃO' THEN 1 ELSE 0
				END
				) AS totalNaoPaifPaefi,
				SUM(
					CASE WHEN resultado.situacaoPrioritaria = '1;' THEN 1 ELSE 0
				END
				) AS totalForaSituacaoPrioritaria,
				SUM(
					CASE WHEN resultado.situacaoPrioritaria != '1;' THEN 1 ELSE 0
				END
				) AS totalSituacaoPrioritaria,
				SUM(
					CASE WHEN resultado.possuiDeficiencia = 'Sim' THEN 1 ELSE 0
				END
				) AS totalPossuiDeficiencia,
				SUM(
					CASE WHEN resultado.tipoDeficiencia = 'AUTISMO' THEN 1 ELSE 0
				END
				) AS totalAutismo,
				SUM(
					CASE WHEN resultado.tipoDeficiencia = 'FÍSICA' THEN 1 ELSE 0
				END
				) AS totalFisicia,
				SUM(
					CASE WHEN resultado.tipoDeficiencia = 'INTELECTUAL' THEN 1 ELSE 0
				END
				) AS totalIntelectual,
				SUM(
					CASE WHEN resultado.tipoDeficiencia = 'MENTAL' THEN 1 ELSE 0
				END
				) AS totalMental,
				SUM(
					CASE WHEN resultado.tipoDeficiencia = 'SENSORIAL' THEN 1 ELSE 0
				END
				) AS totalSensorial
				FROM
					(
					SELECT
						a.id AS 'idAtendido',
						a.id_grupo AS 'idGrupo',
						b.nome AS 'nomeAtendido',
						b.nis AS 'nis',
						b.cpf AS 'cpf',
						a.telefone AS 'telefone',
						a.adulto_participante_atividade AS 'adultoParticipante',
						c.tipo_parentesco AS 'tipoParentesco',
						b.data_nascimento AS 'dataNascimento',
						d.cor_raca AS 'corRaca',
						a.data_inclusao AS 'dataInclusao',
						a.situacao_prioritaria AS 'situacaoPrioritaria',
						e.status AS 'status',
						a.data_desligamento AS 'dataDesligamento',
						f.motivo_desligamento AS 'motivoDesligamento',
						g.encaminhamento AS 'encaminhamento',
						n.numero_grupo AS 'numeroGrupoTransferido',
						h.referenciado AS 'referenciadoCras',
						i.paif_paefi AS 'paifPaefi',
						j.possui_deficiencia AS 'possuiDeficiencia',
						k.tipo_deficiencia AS 'tipoDeficiencia',
						a.nome_responsavel_familia AS 'nomeResponsavelFamilia',
						a.nome_genitora AS 'nomeGenitora',
						l.cep AS 'cep',
						l.logradouro 'logradouro',
						l.vila AS 'vila',
						l.bairro AS 'bairro',
						m.nome_cras AS 'cras',
						a.numero_endereco AS 'numeroEndereco',
						a.complemento_endereco AS 'complementoEndereco'
					FROM
						conteudo_grupo a
					INNER JOIN dados_atendido b ON
						b.id = a.id_atendido
					LEFT JOIN dados_parentesco c ON
						c.id = a.id_parentesco
					LEFT JOIN dados_cor_raca d ON
						d.id = a.id_cor_raca
					LEFT JOIN dados_status e ON
						e.id = a.id_status
					LEFT JOIN dados_motivo_desligamento f ON
						f.id = a.id_motivo_desligamento
					LEFT JOIN dados_encaminhamento g ON
						g.id = a.id_encaminhamento
					LEFT JOIN dados_referenciado_cras h ON
						h.id = id_referenciado_cras
					LEFT JOIN dados_paif_paefi i ON
						i.id = a.id_paif_paefi
					LEFT JOIN dados_possui_deficiencia j ON
						j.id = a.id_possui_deficiencia
					LEFT JOIN dados_tipo_deificiencia k ON
						k.id = a.id_tipo_deficiencia
					LEFT JOIN dados_cep l ON
						l.id = a.id_cep
					LEFT JOIN dados_cras m ON
						m.id = l.id_cras
					LEFT JOIN dados_grupos n ON 
									n.id = a.numero_grupo_transferido
					WHERE
						a.id_grupo = ?
					ORDER BY
						b.nome
				) AS resultado;";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("i", $idGrupo);
				if($stmt->execute()){
					$resultado = $stmt->get_result();
					while($row = $resultado->fetch_assoc()) { 
			?>
			<div class="row">
				<div class="col-12" style="text-align: right;">
					<button type="button" class="btn btn-primary" id="imprimirGrupo">Imprimir</button>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">TOTAL DE ATENDIDOS:</span>
						<input type="text" class="form-control totalAtendidos" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalAtendidos']-$row['totalExcluidos']-$row['totalTransferidos'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">NIS:</span>
						<input type="text" class="form-control comNIS" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalNis'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219)">REFERENCIADOS NO CRAS:</span>
						<input type="text" class="form-control referenciadosCRAS" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalReferenciadoCras'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">PAIF / PAEFI / NENHUM DOS DOIS:</span>
						<input type="text" class="form-control paifPaefi" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalPaif']." / ".$row['totalPaefi']." / ".$row['totalNaoPaifPaefi'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">QUANTIDADE FORA DE SITUAÇÃO PRIORITÁRIA:</span>
						<input type="text" class="form-control foraSituacaoPrioritaria" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalForaSituacaoPrioritaria'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">QUANTIDADE EM SITUAÇÃO PRIORITÁRIA:</span>
						<input type="text" class="form-control situacaoPrioritaria" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalSituacaoPrioritaria'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-85" id="basic-addon3" style="background-color:rgb(142,169,219);">PESSOAS COM DEFICIÊNCIA:</span>
						<input type="text" class="form-control deficiencia" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalPossuiDeficiencia'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">AUTISMO:</span>
						<input type="text" class="form-control autismo" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalAutismo'] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">FÍSICA:</span>
						<input type="text" class="form-control fisica" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalFisicia'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">INTELECTUAL:</span>
						<input type="text" class="form-control intelectual" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalIntelectual'] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">MENTAL:</span>
						<input type="text" class="form-control mental" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalMental'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">SENSORIAL:</span>
						<input type="text" class="form-control sensorial" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalSensorial'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row campoAssinatura">
				<div class="col-6">
                    <hr class="border border-2 opacity-50">
                    <span class="text-center">TÉCNICO RESPONSÁVEL</span>
				</div>
                <div class="col-6">
                    <hr class="border border-2 opacity-50">
                    <span class="text-center">PRESIDENTE / RESPONSÁVEL LEGAL</span>
				</div>
			</div>
			<?php
					}
				}
				$resultado->free_result();
				$stmt->close();
			?>
		</div>
		<form id="form-impressao" action="impressao.php" method="post" style="display: none;">
			<input type="hidden" name="cabecalho">
			<input type="hidden" name="dados">
			<input type="hidden" name="rodape">
		</form>

		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Editar Atendido</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<span style="display:none" id="idAtendido"></span>
						<span style="display:none" id="idAtendidoNoGrupo"></span>
						<span style="display:none" id="SeqAtendido"></span>
						<span style="display:none" id="idGrupo"><?php echo $idGrupo;?></span>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row mb-3">
								<div class="col-md-8">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Nome da pessoa atendido:</span>
										<input type="text" class="form-control modal_nomeAtendido" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">NIS:</span>
										<input type="text" class="form-control modal_nis" id="basic-url" aria-describedby="basic-addon3" value="" maxlength="11">
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">CPF:</span>
										<input type="text" class="form-control modal_cpf" id="basic-url" aria-describedby="basic-addon3" value="" maxlength="14">
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Telefone:</span>
										<input type="text" class="form-control modal_telefone" id="basic-url" aria-describedby="basic-addon3" value="" maxlength="15">
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-8 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Nome do adulto participante:</span>
										<input type="text" class="form-control modal_adultoParticipante" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect01">Grau de parentesco</label>
										<select class="form-select modal_grauParentesco" id="inputGroupSelect01">
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, tipo_parentesco from dados_parentesco;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["tipo_parentesco"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Data de nascimento:</span>
										<input type="text" class="form-control modal_dataNascimento" id="basic-url" aria-describedby="basic-addon3" value="" maxlength="10">
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect02">Cor/Raça</label>
										<select class="form-select modal_corRaca" id="inputGroupSelect02">
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, cor_raca from dados_cor_raca;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["cor_raca"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Data da inclusão:</span>
										<input type="text" class="form-control modal_dataInclusao" id="basic-url" aria-describedby="basic-addon3" value="" maxlength="10">
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-12 ">
									<fieldset class="mb-3" id="campoSituacoesPrioritarias">
										<legend>Situação Prioritária:</legend>
										<div class="row">
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="ckbSituacaoPrioritaria1" onchange="desabilitarOutrosCheckBoxes(this)">
													<label class="form-check-label" for="ckbSituacaoPrioritaria1">
														1 - Não está em situação prioritária
													</label>
												</div>
											</div>
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria2">
													<label class="form-check-label" for="ckbSituacaoPrioritaria2">
														2 - Em situação de isolamento
													</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria3">
													<label class="form-check-label" for="ckbSituacaoPrioritaria3">
														3 - Trabalho infantil
													</label>
												</div>
											</div>
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria4">
													<label class="form-check-label" for="ckbSituacaoPrioritaria4">
														4 - Vivência de violência e/ou negligência
													</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria5">
													<label class="form-check-label" for="ckbSituacaoPrioritaria5" style="font-size:15px;">
														5 - Fora de escola ou com defasagem escolar superior a 2(dois) anos
													</label>
												</div>
											</div>
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria6">
													<label class="form-check-label" for="ckbSituacaoPrioritaria6">
														6 - Em situação de acolhimento
													</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria7">
													<label class="form-check-label" for="ckbSituacaoPrioritaria7">
														7 - Em cumprimento de medida socioeducativa em meio aberto
													</label>
												</div>
											</div>
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria8">
													<label class="form-check-label" for="ckbSituacaoPrioritaria8">
														8 - Egressos de medidas socioeducativas
													</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria9">
													<label class="form-check-label" for="ckbSituacaoPrioritaria9">
														9 - Situação de abuso e/ou exploração sexual
													</label>
												</div>
											</div>
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria10">
													<label class="form-check-label" for="ckbSituacaoPrioritaria10">
														10 - Com medidas de proteção do ECA
													</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 mb-1">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria11">
													<label class="form-check-label" for="ckbSituacaoPrioritaria11">
														11 - Crianças e adolescentes em situação de rua
													</label>
												</div>
											</div>
											<div class="col-md-6 mb-1">
												<div class="form-check  form-switch">
													<input class="form-check-input" type="checkbox" value="" id="ckbSituacaoPrioritaria12">
													<label class="form-check-label" for="ckbSituacaoPrioritaria12">
														12 - Vulnerabilidade que diz respeito às pessoas com deficiência
													</label>
												</div>
											</div>
											<span style="display:none" id="situacoesPrioritarias"></span>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-3 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect03">Status</label>
										<select class="form-select modal_status" id="inputGroupSelect03">
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, status from dados_status;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["status"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
								<div class="col-md-1">
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect06">Referenciado no CRAS</label>
										<select class="form-select modal_referenciadoCras" id="inputGroupSelect06">
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, referenciado from dados_referenciado_cras;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["referenciado"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
								<div class="col-md-1">
								</div>
								<div class="col-md-3 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect07">PAIF / PAEFI</label>
										<select class="form-select modal_paifPaefi" id="inputGroupSelect07">
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, paif_paefi from dados_paif_paefi;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["paif_paefi"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Data do desligamento:</span>
										<input type="text" class="form-control modal_dataDesligamento" id="basic-url" aria-describedby="basic-addon3" value="" maxlength="10" disabled>
									</div>
								</div>
								<div class="col-md-2 ">
								</div>
								<div class="col-md-5 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect04">Motivo desligamento</label>
										<select class="form-select modal_motivoDesligamento" id="inputGroupSelect04" disabled>
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, motivo_desligamento from dados_motivo_desligamento;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["motivo_desligamento"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-5 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect06">Grupo a ser transferido</label>
										<select class="form-select modal_numeroGrupoTransferido" id="inputGroupSelect06" disabled>
											<option value="0" selected>Selecione...</option>
											<?php
												$sql= "SELECT id, numero_grupo, com_sem_termo from dados_grupos where id_osc=?;";
												$stmt = $mysqli->prepare($sql);
												$stmt->bind_param("i", $_SESSION['id']);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["com_sem_termo"]." ".$row["numero_grupo"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
								<div class="col-md-1 ">
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect05">Encaminhamento</label>
										<select class="form-select modal_encaminhamento" id="inputGroupSelect05">
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, encaminhamento from dados_encaminhamento;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["encaminhamento"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect08">Pessoa com deficiência</label>
										<select class="form-select modal_possuiDeficiencia" id="inputGroupSelect08">
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, possui_deficiencia from dados_possui_deficiencia;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["possui_deficiencia"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
								<div class="col-md-2">
								</div>
								<div class="col-md-5 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect09">Tipo deficiência (conforme Estatuto PCD)</label>
										<select class="form-select modal_tipoDeficiencia" id="inputGroupSelect09" disabled>
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, tipo_deficiencia from dados_tipo_deificiencia;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["tipo_deficiencia"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>							
							</div>
							<div class="row mb-3">
								<div class="col-md-6 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Nome do Responsável pela família</span>
										<input type="text" class="form-control modal_responsavelFamilia" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
								<div class="col-md-6 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Nome da Genitora</span>
										<input type="text" class="form-control modal_nomeGenitora" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-2 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">CEP</span>
										<input type="text" class="form-control modal_cep" id="basic-url" aria-describedby="basic-addon3" value="" maxlength="9">
									</div>
								</div>
								<div class="col-md-2 ">
									<button type="button" class="btn btn-primary" id="buscarCEP">Buscar CEP</button>
									<span style="display:none" id="idCEP"></span>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Endereço</span>
										<input type="text" class="form-control modal_logradouro" id="basic-url" aria-describedby="basic-addon3" value="" disabled>
									</div>
								</div>
								<div class="col-md-3 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Nº</span>
										<input type="text" class="form-control modal_numeroEndereco" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-12 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Complemento</span>
										<input type="text" class="form-control modal_complementoEndereco" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Microrregião</span>
										<input type="text" class="form-control modal_vila" id="basic-url" aria-describedby="basic-addon3" value="" disabled>
									</div>
								</div>
								<div class="col-md-2 ">
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Macrorregião</span>
										<input type="text" class="form-control modal_bairro" id="basic-url" aria-describedby="basic-addon3" value="" disabled>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-primary" id="salvarAlteracao">Salvar</button>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<!-- Bootstrap Bundle com Popper -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
		<script src='js/scripts.js'></script>
	</body>
</html>