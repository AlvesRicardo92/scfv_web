<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');

	require "conexaoBanco.php";



    
    if(!isset($_POST["idOSC"])){
        echo "erro idOSC";
        exit();
    }
    else{
        $idOSC = $mysqli -> real_escape_string($_POST["idOSC"]);

        $stmt = $mysqli->prepare("SELECT id,id_osc,nome_grupo,com_sem_termo,numero_grupo FROM dados_grupos WHERE id_osc=? ORDER BY com_sem_termo,numero_grupo");
        $stmt->bind_param('i', $idOSC);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $linhas = $resultado ->num_rows;
            if($linhas>0){ 
                // Criar um array para armazenar os dados dos técnicos
                $grupos = [];
                while($row = $resultado->fetch_assoc()) {
                    $grupos[] = $row;
                }
                $resultado -> free_result();
                echo json_encode($grupos);
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