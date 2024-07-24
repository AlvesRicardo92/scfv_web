<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');

	require "conexaoBanco.php";



    
    if(!isset($_POST["idOSC"]) || !isset($_POST["idGrupo"])){
        echo "erro idOSC ou idGrupo";
        exit();
    }
    else{
        $idOSC = $mysqli -> real_escape_string($_POST["idOSC"]);
        $idGrupo = $mysqli -> real_escape_string($_POST["idGrupo"]);

        $stmt = $mysqli->prepare("SELECT a.nome_grupo as nomeGrupo,a.com_sem_termo as comSemTermo, a.id_faixa_etaria as idFaixaEtaria, 
                                         a.ids_dia_semana as idsDiaSemana,a.carga_horaria as cargaHoraria, a.endereco_execucao as enderecoExecucao, 
                                         a.nome_tecnico_osc as nomeTecnicoOsc
                                         
                                         FROM dados_grupos a 
        
                                         WHERE a.id_osc=? and a.id=?");

        $stmt->bind_param('ii', $idOSC,$idGrupo);
        
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $linhas = $resultado ->num_rows;
            if($linhas>0){ 
                $dadosGrupos = '';
                while($row = $resultado->fetch_assoc()) {
                    $nomeGrupo=$row['nomeGrupo'];
                    $comSemTermo=$row['comSemTermo'];
                    $idFaixaEtaria = $row['idFaixaEtaria'];
					$idsDiaSemana = $row['idsDiaSemana'];
					$cargaHoraria = $row['cargaHoraria'];
                    $enderecoExecucao = $row['enderecoExecucao'];
                    $nomeTecnicoOsc = $row['nomeTecnicoOsc'];
                }
                $resultado -> free_result();
                echo json_encode(array('status' => 'sucesso','nomeGrupo' => $nomeGrupo, 'comSemTermo'=> $comSemTermo, 'idFaixaEtaria' => $idFaixaEtaria, 
                                       'idsDiaSemana' => $idsDiaSemana, 'cargaHoraria' => $cargaHoraria,'enderecoExecucao' => $enderecoExecucao,'nomeTecnicoOsc' => $nomeTecnicoOsc));
            }
            else{
                $resultado -> free_result();
                echo ('naoEncontrado');
            }
        }
        else{
            echo('erroQuery');
        }
        $stmt->close();
        $mysqli->close();
    }
?>