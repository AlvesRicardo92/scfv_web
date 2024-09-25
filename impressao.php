<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
	clearstatcache();
	// Verifica se os dados foram recebidos via POST
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(!isset($_POST["cabecalho"])){
            echo "erro cabeçalho";
            exit();
        }
        else{
            $cabecalho = $mysqli -> real_escape_string($_POST["cabecalho"]);
        }
        if(!isset($_POST["dados"])){
            echo "erro dados";
            exit();
        }
        else{
            $dados = $mysqli -> real_escape_string($_POST["dados"]);
        }
        if(!isset($_POST["rodape"])){
            echo "erro rodapé";
            exit();
        }
        else{
            $rodape = $mysqli -> real_escape_string($_POST["rodape"]);
        }
	}	
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
		<title>Impressão</title>
	</head>
	<body>
        <?php
            $vetorCabecalho = explode("|",$cabecalho);
            $vetorDados = explode("|",$dados);
            $vetorRodape = explode("|",$rodape);
        ?>
		<div class="container">
			<div class="row">
				<div class="col-6">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">OSC:</span>
						<input type="text" class="form-control nome_osc" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[0] ?>" disabled>
					</div>
				</div>
				<div class="col-2">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">GRUPO:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[1] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">DIAS DA SEMANA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[2] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">FAIXA ETÁRIA:</span>
						<input type="text" class="form-control faixaEtaria" id="basic-url" aria-describedby="basic-addon3" value="<?php $vetorCabecalho[3] ?>" disabled>
					</div>
				</div>
				<div class="col-3">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">NOME DO GRUPO:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php $vetorCabecalho[4] ?>" disabled>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">CARGA HORÁRiA SEMANAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['cargaHoraria'] ?>" disabled>
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
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['nomeTecnico'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">LOCAL DE EXECUÇÃO DO SERVIÇO:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['logradouro'].', '.$row['numeroEndereco'] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group mb-3 mesReferencia">
						<label class="input-group-text blue-cell" for="inputGroupSelect01">MÊS/ANO DE REF.</label>
						<select class="form-select" id="inputGroupSelect01">
						<option selected>Selecione...</option>
						<option value="1">Janeiro/2024</option>
						<option value="2">Fevereiro/2024</option>
						<option value="3">Março/2024</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-9" style="text-align: right;">
					<a href="detalhes_Grupo.php" class="btn btn-primary">Voltar</a>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-12">
					<div class="auto-overflow">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">SEQ.</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">NOME DA PESSOA ATENDIDA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">NIS ATENDIDO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">CPF ATENDIDO</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">SITUAÇÂO PRIORITÁRIA</th>
									<th scope="col" style="background-color:rgb(142,169,219);font-size: 12px;">NOME DA GENITORA</th>
								</tr>
							</thead>
							<tbody>
                                <td class="seqAtendido"><?php echo $contador; $contador+=1; ?></td>
                                <td class="tbl_nomeAtendido"><?php echo $row['nomeAtendido'] ?></td>
                                <td class="tbl_nis"><?php echo $row['nis'] ?></td>
                                <td class="tbl_cpf"><?php echo $row['cpf'] ?></td>
                                <td class="tbl_situacaoPrioritaria"><?php echo $row['situacaoPrioritaria'] ?></td>
                                <td class="tbl_nomeGenitora"><?php echo $row['nomeGenitora'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">TOTAL DE ATENDIDOS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalAtendidos']-$row['totalExcluidos']-$row['totalTransferidos'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">NIS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalNis'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219)">REFERENCIADOS NO CRAS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalReferenciadoCras'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">PAIF / PAEFI / NENHUM DOS DOIS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalPaif']." / ".$row['totalPaefi']." / ".$row['totalNaoPaifPaefi'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">QUANTIDADE FORA DE SITUAÇÃO PRIORITÁRIA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalForaSituacaoPrioritaria'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">QUANTIDADE EM SITUAÇÃO PRIORITÁRIA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalSituacaoPrioritaria'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-85" id="basic-addon3" style="background-color:rgb(142,169,219);">PESSOAS COM DEFICIÊNCIA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalPossuiDeficiencia'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">AUTISMO:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalAutismo'] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">FÍSICA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalFisicia'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">INTELECTUAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalIntelectual'] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">MENTAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalMental'] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">SENSORIAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $row['totalSensorial'] ?>" disabled>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-6">
                    <hr class="border border-2 opacity-50">
                    <span class="text-center">TÉCNICO RESPONSÁVEL</span>
				</div>
                <div class="col-6">
                    <hr class="border border-2 opacity-50">
                    <span class="text-center">PRESIDENTE / RESPONSÁVEL LEGAL</span>
				</div>
			</div>
		</div>
		<!-- Bootstrap Bundle com Popper -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
		<script src='js/scripts.js'></script>
	</body>
</html>