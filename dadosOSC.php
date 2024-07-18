<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');

	require "conexaoBanco.php";



    
    if(!isset($_POST["idOSC"])){
        echo "erro OSC";
        exit();
    }
    else{
        $idOSC = $mysqli -> real_escape_string($_POST["idOSC"]);

        $stmt = $mysqli->prepare("SELECT * FROM `dados_osc` WHERE id=?");
        $stmt->bind_param('i', $idOSC);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $linhas = $resultado ->num_rows;
            if($linhas>0){ 
                while($row = $resultado->fetch_assoc()) {
                    $nomeOSC=$row['nome_osc'];
                    $apelidoOSC=$row['apelido_osc'];
                    $inscricaoCMAS = $row['inscricao_cmas'];
					$cnpj = $row['cnpj'];
					$idCEP = $row['id_cep'];
                    $numeroEndereco = $row['numero_endereco'];
                    $telefone = $row['telefone'];
                    $site = $row['site'];
                    $email = $row['email'];
                    $idCRAS = $row['id_cras_referencia'];
                    $idTecnicoCRAS = $row['id_tecnico_ref_cras'];
                    $nomePresidente = $row['nome_presidente_osc'];
                    $telefonePresidente = $row['telefone_presidente'];
                    $emailPresidente = $row['email_presidente'];
                }
                $resultado -> free_result();
                echo json_encode(array('status' => 'sucesso','nomeOSC' => $nomeOSC, 'apelidoOSC' => $apelidoOSC, 'inscricaoCMAS' => $inscricaoCMAS, 'cnpj' => $cnpj, 
                                        'idCEP' => $idCEP, 'numeroEndereco' => $numeroEndereco, 'telefone' => $telefone, 'site' => $site, 'email' => $email, 'idCRAS' => $idCRAS, 
                                        'idTecnicoCRAS' => $idTecnicoCRAS,'nomePresidente' => $nomePresidente,'telefonePresidente' => $telefonePresidente,'emailPresidente' => $emailPresidente));
            }
            else{
                $resultado -> free_result();
                echo json_encode(array('status' => 'naoEncontrado'));
            }
        }
        else{
            echo json_encode(array('status' => 'erroQuery'));
        }
        $stmt->close();
        $mysqli->close();
    }
?>