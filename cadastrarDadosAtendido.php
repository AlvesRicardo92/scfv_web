<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
    clearstatcache();

	require "conexaoBanco.php";
    

    $nome = '';
    $nis = '';
    $cpf = '';
    $nascimento='';
    $variaveis='';
    $tiposDeDados='';
    $querySQL='';
    $interrogacoes='';

    if(!isset($_POST["nome"])||!isset($_POST["cpf"])||!isset($_POST["nascimento"])){
        echo 0;
        exit();
    }
    else{
        $nome = $mysqli -> real_escape_string($_POST["nome"]);
        $nome= preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $nome);
        $nome= trim($nome);
        $nis = $mysqli -> real_escape_string($_POST["nis"]);
        $cpf = $mysqli -> real_escape_string($_POST["cpf"]);
        $nascimento=$mysqli -> real_escape_string($_POST["nascimento"]);

        $variaveis=array();

        if($nome === null || trim($nome) === ''){
            echo 0;
            exit();
        }
        else{
            $variaveis[]=$nome;
            $tiposDeDados.="s";
            $querySQL.="nome,";
            $interrogacoes.='?,';
        }
        
        if($cpf === null || trim($cpf) === ''){
            echo 0;
            exit();
        }
        else{
            $variaveis[]=$cpf;
            $tiposDeDados.="s";
            $querySQL.="cpf,";
            $interrogacoes.='?,';
        }

        if(trim($nis) != '' && $nis!= null){
            $variaveis[]=$nis;
            $tiposDeDados.="s";
            $querySQL.="nis,";
            $interrogacoes.='?,';
        }
        if($nascimento === null || trim($nascimento) === ''){
            echo 0;
            exit();
        }
        else{
            $variaveis[]=$nascimento;
            $tiposDeDados.="s";
            $querySQL.="data_nascimento,";
            $interrogacoes.='?,';
        }
        if(substr($querySQL,-1)==","){
            $querySQL=rtrim($querySQL, ',');
        }
        if(substr($interrogacoes,-1)==","){
            $interrogacoes=rtrim($interrogacoes, ',');
        }

        $mysqli->begin_transaction();
        $stmt = $mysqli->prepare("INSERT INTO dados_atendido(" . $querySQL . ") VALUES (" . $interrogacoes . ")");
        $stmt->bind_param($tiposDeDados, ...$variaveis);

        if ($stmt->execute()) {
            $mysqli->commit();
            $stmt = $mysqli->prepare("SELECT LAST_INSERT_ID() as novo_id");
            if($stmt->execute()){
                $resultado = $stmt->get_result();
                while($row = $resultado->fetch_assoc()) { 
                    if ($row['novo_id']>0){
                        echo $row['novo_id'];
                    }
                    else{
                        echo 0;
                    }
                }
            }
            else{
                echo 0;
            }
        }
        else{
            $mysqli->rollback();
            echo 0;
        }
        $stmt->close();
        $mysqli->close();
    }
?>
