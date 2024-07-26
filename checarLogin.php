<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
    clearstatcache();

	require "conexaoBanco.php";



    
    if(!isset($_POST["usuario"])|| !isset($_POST["senha"])){
        echo "erro login";
        exit();
    }
    else{
        $usuarioPOST = $mysqli -> real_escape_string($_POST["usuario"]);
        $senhaPOST = $mysqli -> real_escape_string($_POST["senha"]);

        $stmt = $mysqli->prepare("SELECT id, nome,usuario,senha,id_departamento,id_osc,codigo_permissoes FROM dados_login WHERE usuario like ?");
        $stmt->bind_param('s', $usuarioPOST);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $linhas = $resultado ->num_rows;
            if($linhas>0){ 
                while($row = $resultado->fetch_assoc()) {
                    $usuarioBanco = $row['usuario'];
					$senhaBanco = $row['senha'];
					$id_osc = $row['id_osc'];
                    $id_departamento=$row['id_departamento'];
                    $codigo_permissoes=$row['codigo_permissoes'];
                }
                $resultado -> free_result();
                if ($senhaPOST == $senhaBanco){
					session_start();
                    if(is_null($id_osc)){
                        $_SESSION['id']= $id_departamento;
                        echo $id_departamento;  
                    }
                    else{
                        $_SESSION['id']= $id_osc;
                        echo $id_osc;
                    }
					$_SESSION['codPerm']= $codigo_permissoes;
					exit();
				}
            }
            else{
                $resultado -> free_result();
                echo "Não encontrado";
            }
        }
        else{
            echo $mysqli->error."\n";
            echo "erro na busca do usuário ou senha\n";
        }
        $stmt->close();
        $mysqli->close();
    }
?>