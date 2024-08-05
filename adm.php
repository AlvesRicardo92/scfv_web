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
			<div class="row mb-4">
				<div class="col-3">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="novaOSC">Cadastrar Nova OSC</button>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-12">
					<div class="auto-overflow">
						<table class="table table-bordered table-light table-hover">
							<thead>
								<tr>
									<th scope="col" style="background-color:rgb(79, 134, 236);font-size: 12px;">VISUALIZAR<br>EDITAR</th>
									<th scope="col" style="display:none">id</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">OSC</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">CRAS</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
                                    $sql= "SELECT a.id as id, a.apelido_osc as osc, b.nome_cras as cras FROM dados_osc a 

									inner join dados_cras b ON
									b.id = a.id_cras_referencia
									
									ORDER BY a.apelido_osc";
                                    $stmt = $mysqli->prepare($sql);
                                    if($stmt->execute()){
                                        $resultado = $stmt->get_result();
                                        while($row = $resultado->fetch_assoc()) { 
                                ?>
								<tr>
									<td><button type="button" class="btn edit btn-outline-primary btn-sm visualizarOSC" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-eye" aria-hidden="true"></i></button> <button type="button" class="btn edit btn-light btn-outline-primary btn-sm editarOSC" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-edit"></i></button></td>
									<td style="display:none" class="idOSC"><?php echo $row['id'] ?></td>
									<td><?php echo $row['osc'] ?></td>
									<td><?php echo $row['cras'] ?></td>
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
					<button type="button" class="btn btn-primary" id="downloadTodosExcel">Fazer download</button>
				</div>
			</div>
			<form id="form-todos-excel" action="downloadExcelTodasOSCs.php" method="post" style="display: none;">
			</form>	
		</div>
		<!-- Modal Dados OSC-->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Editar OSC</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()"></button>
						<span style="display:none" id="modal_spanIdOSC"></span>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row mb-3">
								<div class="col-md-12">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Nome completo da OSC:</span>
										<input type="text" class="form-control modal_nomeOSC" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Apelido OSC:</span>
										<input type="text" class="form-control modal_apelidoOSC" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Inscrição CMAS:</span>
										<input type="text" class="form-control modal_inscricaoCMAS" id="basic-url" aria-describedby="basic-addon3" value="" maxlength="14">
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">CNPJ:</span>
										<input type="text" class="form-control modal_cnpj" id="basic-url" aria-describedby="basic-addon3" value="" maxlength="15">
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
								<div class="col-md-2">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Nº</span>
										<input type="text" class="form-control modal_numeroEndereco" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Macrorregião</span>
										<input type="text" class="form-control modal_bairro" id="basic-url" aria-describedby="basic-addon3" value="" disabled>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Telefone:</span>
										<input type="text" class="form-control modal_telefoneOSC" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Site:</span>
										<input type="text" class="form-control modal_site" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">E-mail:</span>
										<input type="text" class="form-control modal_email" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-3 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect03">CRAS</label>
										<select class="form-select modal_CRAS" id="inputGroupSelect03">
											<option value="0">Selecione...</option>
											<?php
												$sql= "select id, nome_cras from dados_cras;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["nome_cras"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
								<div class="col-md-9 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect06">Técnico de Referencia no CRAS</label>
										<select class="form-select modal_tecnicoReferenciaCras" id="inputGroupSelect06">
											<option value="0">Selecione...</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-7 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Nome do Presidente da OSC:</span>
										<input type="text" class="form-control modal_nomePresidente" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
								<div class="col-md-5 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Telefone do Presidente da OSC:</span>
										<input type="text" class="form-control modal_telefonePresidente" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">E-mail do Presidente da OSC:</span>
										<input type="text" class="form-control modal_emailPresidente" id="basic-url" aria-describedby="basic-addon3" value="">
									</div>
								</div>
								<div class="col-md-6" style="text-align: right;">
									<div class="input-group">
										<button type="button" class="btn btn-success" data-bs-target="#staticBackdrop2" data-bs-toggle="modal" data-bs-dismiss="modal" id="grupos">Grupos</button>&nbsp&nbsp
										<button type="button" class="btn btn-primary" data-bs-target="#staticBackdrop2" data-bs-toggle="modal" data-bs-dismiss="modal" id="novoGrupo">Novo Grupo</button>
									</div>
								</div>
							</div>
						</div>					
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="javascript:window.location.reload()">Cancelar</button>
							<button type="button" class="btn btn-primary" id="salvarOSC">Salvar OSC</button>
						</div>
						
					</div>
				</div>	
			</div>
		</div>
		<!-- Modal Dados Grupo-->
		<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop2Label" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdrop2Label">Grupos</h5>
						<button class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-toggle="modal" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row mb-3">
								<div class="col-md-5 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="modal_grupos" id="labelModal_grupos">GRUPOS</label>
										<select class="form-select modal_Grupos" id="modal_grupos">
											<option value="0" selected>Selecione...</option>
											<?php
												$sql= "select id, nome_cras from dados_cras;";
												$stmt = $mysqli->prepare($sql);
												//$stmt->bind_param("i", $idGrupo);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["nome_cras"].'</option>';
													}
												}
												$resultado->free_result();
												$stmt->close();
											?>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<button type="button" class="btn btn-primary" id="editarGrupo" style="display:none;">Editar Grupo</button>
								</div>
							</div>
							<div class="row mb-3">	
								<div class="col-md-12 ">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="inlineRadioOptions" id="rb_comTermo" value="COM TERMO" disabled>
										<label class="form-check-label" for="rb_comTermo" id="label_rb_comTermo">Com termo</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="inlineRadioOptions" id="rb_semTermo" value="SEM TERMO" disabled>
										<label class="form-check-label" for="rb_semTermo" id="label_rb_semTermo">Sem termo</label>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-8 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Técnico(a) de referência da OSC no Grupo</span>
										<input type="text" class="form-control modal_nomeTecnicoOSC" id="basic-url" aria-describedby="basic-addon3" value="" disabled>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Nome Grupo:</span>
										<input type="text" class="form-control modal_nomeGrupo" id="basic-url" aria-describedby="basic-addon3" value="" disabled>
									</div>
								</div>
								<div class="col-md-5 ">
									<div class="input-group">
										<label class="input-group-text blue-cell" for="inputGroupSelect03">Faixa Etária</label>
										<select class="form-select modal_faixaEtaria" id="faixaEtaria" disabled>
											<option value="0">Selecione...</option>
											<?php
												$sql= "SELECT id,faixa_etaria FROM dados_faixa_etaria;";
												$stmt = $mysqli->prepare($sql);
												if($stmt->execute()){
													$resultado = $stmt->get_result();
													while($row = $resultado->fetch_assoc()) { 
														echo '<option value="'.$row["id"].'">'.$row["faixa_etaria"].'</option>';
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
								<div class="col-md-12 mb-2 ">
									<fieldset class="mb-3" id="campoDiasDeAtendimento">
										<legend>Dias de atendimento na semana:</legend>
										<div class="form-check form-switch form-check-inline">
											<input class="form-check-input" type="checkbox" id="ckbDiaSemana2" value="2" disabled>
											<label class="form-check-label" for="ckbDiaSemana2" id="label_ckbDiaSemana2">Seg</label>
										</div>
										<div class="form-check form-switch form-check-inline">
											<input class="form-check-input" type="checkbox" id="ckbDiaSemana3" value="3" disabled>
											<label class="form-check-label" for="ckbDiaSemana3" id="label_ckbDiaSemana3">Ter</label>
										</div>
										<div class="form-check form-switch form-check-inline">
											<input class="form-check-input" type="checkbox" id="ckbDiaSemana4" value="4" disabled>
											<label class="form-check-label" for="ckbDiaSemana4" id="label_ckbDiaSemana4">Qua</label>
										</div>
										<div class="form-check form-switch form-check-inline">
											<input class="form-check-input" type="checkbox" id="ckbDiaSemana5" value="5" disabled>
											<label class="form-check-label" for="ckbDiaSemana5" id="label_ckbDiaSemana5">Qui</label>
										</div>
										<div class="form-check form-switch form-check-inline">
											<input class="form-check-input" type="checkbox" id="ckbDiaSemana6" value="6" disabled>
											<label class="form-check-label" for="ckbDiaSemana6" id="label_ckbDiaSemana6">Sex</label>
										</div>
									</fieldset>
								</div>
								<div class="col-md-4 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Carga Horária semanal:</span>
										<input type="text" class="form-control modal_cargaHoraria" id="basic-url" aria-describedby="basic-addon3" value="" disabled>
									</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-11 ">
									<div class="input-group">
										<span class="input-group-text" id="basic-addon3" style="background-color:rgb(142,169,219);">Endereço de execução do serviço:</span>
										<input type="text" class="form-control modal_enderecoExecucao" id="basic-url" aria-describedby="basic-addon3" value="" disabled>
									</div>
								</div>
							</div>
						</div>					
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-target="#staticBackdrop" data-bs-toggle="modal" data-bs-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-primary" id="salvarGrupo">Salvar Grupo</button>
						</div>
					</div>
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
