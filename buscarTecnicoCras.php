<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
    clearstatcache();

	require "conexaoBanco.php";



    
    if(!isset($_POST["idCRAS"])){
        echo "erro idCRAS";
        exit();
    }
    else{
        $idCRAS = $mysqli -> real_escape_string($_POST["idCRAS"]);

        $stmt = $mysqli->prepare("SELECT id,nome FROM dados_tecnico_cras WHERE id_cras=? ORDER BY nome");
        $stmt->bind_param('i', $idCRAS);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $linhas = $resultado ->num_rows;
            if($linhas>0){ 
                // Criar um array para armazenar os dados dos técnicos
                $tecnicos = [];
                while($row = $resultado->fetch_assoc()) {
                    $tecnicos[] = $row;
                }
                $resultado -> free_result();
                echo json_encode($tecnicos);
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