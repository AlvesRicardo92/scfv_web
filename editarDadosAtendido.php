<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
    clearstatcache();

	require "conexaoBanco.php";


    $sqlQuery='UPDATE dados_atendido SET';
    
    if(!isset($_POST["nome"])||!isset($_POST["cpf"])||!isset($_POST["idAtendido"])||!isset($_POST["nascimento"])){
        echo 0;
        exit();
    }
    else{
        $nome = $mysqli -> real_escape_string($_POST["nome"]);
        $nome= preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $nome);
        $nome= trim($nome);
        $nis = $mysqli -> real_escape_string($_POST["nis"]);
        $cpf = $mysqli -> real_escape_string($_POST["cpf"]);
        $id=$mysqli -> real_escape_string($_POST["idAtendido"]);
        $nascimento=$mysqli -> real_escape_string($_POST["nascimento"]);

        $variaveis=array();
        $tiposDeDados='';
        $querySQL='';

        if($nome === null || trim($nome) === ''){
            echo 0;
            exit();
        }
        else{
            $variaveis[]=$nome;
            $tiposDeDados.="s";
            $querySQL.="nome=?,";
        }
        
        if($cpf === null || trim($cpf) === ''){
            echo 0;
            exit();
        }
        else{
            $variaveis[]=$cpf;
            $tiposDeDados.="s";
            $querySQL.="cpf=?,";
        }

        if(trim($nis) != '' && $nis!= null){
            $variaveis[]=$nis;
            $tiposDeDados.="s";
            $querySQL.="nis=?,";
        }
        if($nascimento === null || trim($nascimento) === ''){
            echo 0;
            exit();
        }
        else{
            $variaveis[]=$nascimento;
            $tiposDeDados.="s";
            $querySQL.="data_nascimento=?,";
        }
        if(substr($querySQL,-1)==","){
            $querySQL=rtrim($querySQL, ',');
        }

        $variaveis[]=$id;
        $tiposDeDados.='i';

        /*echo "UPDATE conteudo_grupo SET ". $querySQL ."WHERE id=?";
        echo "<br>";
        echo var_dump($tiposDeDados);
        echo "<br>";
        echo var_dump($variaveis);
        exit();*/

        $mysqli->begin_transaction();
        $stmt = $mysqli->prepare("UPDATE dados_atendido SET ". $querySQL ." WHERE id=?");
        $stmt->bind_param($tiposDeDados, ...$variaveis);

        if ($stmt->execute()) {
            $mysqli->commit();
            echo 1;
        }
        else{
            $mysqli->rollback();
            echo 0;
        }
        $stmt->close();
        $mysqli->close();
    }
?>
