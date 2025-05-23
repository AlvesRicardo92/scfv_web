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
            $cabecalho = filter_var(trim($_POST["cabecalho"]), FILTER_SANITIZE_STRING);
        }
        if(!isset($_POST["dados"])){
            echo "erro dados";
            exit();
        }
        else{
            $dados = filter_var(trim($_POST["dados"]), FILTER_SANITIZE_STRING);
        }
        if(!isset($_POST["rodape"])){
            echo "erro rodapé";
            exit();
        }
        else{
            $rodape = filter_var(trim($_POST["rodape"]), FILTER_SANITIZE_STRING);
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
				<div class="col-12 mt-1 mb-1">
					<img src="imagens/logoSecretaria.png" class="rounded float-start" alt="logo da Secretaria de Desenvolvimento Social e Cidadania">
					<img src="imagens/logoSUAS.png" class="rounded float-end" alt="logo da Secretaria de Desenvolvimento Social e Cidadania">
				</div>
			</div>
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
						<input type="text" class="form-control faixaEtaria" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[3] ?>" disabled>
					</div>
				</div>
				<div class="col-3">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">NOME DO GRUPO:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[4] ?>" disabled>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">CARGA HORÁRiA SEMANAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[5] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">CRAS DE REF.:</span>
						<input type="text" class="form-control cras_osc" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[6] ?>" disabled>
					</div>
				</div>
				<div class="col-9">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">TÉCNICO DE REF. DO CRAS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[7] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">LOCAL DE EXECUÇÃO DO SERVIÇO:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[8] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">MÊS/ANO DE REF.:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[9] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">HORÁRIO DE ATENDIMENTO DIA 1:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[10] ?>" disabled>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<span class="input-group-text blue-cell" id="basic-addon3">HORÁRIO DE ATENDIMENTO DIA 2:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorCabecalho[11] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-9">
				</div>
				<div class="col-3" style="text-align: right;" id="divBtnVoltar">
					<a href="detalhes_OSC.php" class="btn btn-primary">Voltar</a>
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
							<?php
								echo "<tr>";
								$tamanhoVetor=count($vetorDados);
								$contador=0;
								$i=0;
								$array = array("seqAtendido", "tbl_nomeAtendido", "tbl_nis", "tbl_cpf","tbl_situacaoPrioritaria","tbl_nomeGenitora");
								for ($i = 0; $i < $tamanhoVetor-2; $i++) {
									if($vetorDados[$i]!="FIM"){
										echo "<td class='".$array[$contador]."'>".$vetorDados[$i]."</td>";
										$contador+=1;
									}
									else{
										$contador=0;
										if($i==$tamanhoVetor-2){
											echo "</tr>";	
										}
										else{
											echo "</tr><tr><td class='".$array[$contador]."'>".$vetorDados[$i+1]."</td>";
										}
										$i+=1;
									}
								}
							?>
							</tbody>
						</table>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">TOTAL DE ATENDIDOS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[0] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">NIS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[1] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219)">REFERENCIADOS NO CRAS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[2] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">PAIF / PAEFI / NENHUM DOS DOIS:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[3] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">QUANTIDADE FORA DE SITUAÇÃO PRIORITÁRIA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[4] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-55" id="basic-addon3" style="background-color:rgb(142,169,219);">QUANTIDADE EM SITUAÇÃO PRIORITÁRIA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[5] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8">
					<div class="input-group">
						<span class="input-group-text largura-85" id="basic-addon3" style="background-color:rgb(142,169,219);">PESSOAS COM DEFICIÊNCIA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[6] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">AUTISMO:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[7] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">FÍSICA:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[8] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">INTELECTUAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[9] ?>" disabled>
					</div>
				</div>
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">MENTAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[10] ?>" disabled>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<div class="input-group">
						<span class="input-group-text largura-40" id="basic-addon3" style="background-color:rgb(142,169,219);">SENSORIAL:</span>
						<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $vetorRodape[11] ?>" disabled>
					</div>
				</div>
			</div>
            <div class="row mt-5">
				<div class="col-6 mt-5">
                    <hr class="border border-2 border-secondary opacity-100"><p class="text-center mt-n1">TÉCNICO RESPONSÁVEL</p>
				</div>
                <div class="col-6 mt-5">
                    <hr class="border border-2 border-secondary opacity-100"><p class="text-center mt-n1">PRESIDENTE / RESPONSÁVEL LEGAL</p>
				</div>
			</div>
		</div>
		<!-- Bootstrap Bundle com Popper -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
		<script src='js/scripts.js'></script>
	</body>
</html>