<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
    clearstatcache();

	require "conexaoBanco.php";



    
    if(!isset($_POST["cep"])){
        echo "erro cep";
        exit();
    }
    else{
        $cep = $mysqli -> real_escape_string($_POST["cep"]);

        $stmt = $mysqli->prepare("SELECT id, cep, logradouro, vila, bairro FROM `dados_cep` WHERE cep=?");
        $stmt->bind_param('s', $cep);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $linhas = $resultado ->num_rows;
            if($linhas>0){ 
                while($row = $resultado->fetch_assoc()) {
                    $idCEP=$row['id'];
                    $CEP=$row['cep'];
                    $logradouro = $row['logradouro'];
					$vila = $row['vila'];
					$bairro = $row['bairro'];
                }
                $resultado -> free_result();
                echo json_encode(array('status' => 'sucesso','id' => $idCEP, 'logradouro' => $logradouro, 'vila' => $vila, 'bairro' => $bairro));
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