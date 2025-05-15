<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
    clearstatcache();

	require "conexaoBanco.php";
    
    //echo 'teste '.$_POST["tipo"].'\n'.$_POST["idOSC"].'\n'.$_POST["comSemTermo"].'\n'.$_POST["tecnicoOSC"].'\n'.$_POST["faixaEtaria"].'\n'.$_POST["diasSemana"].'\n'.$_POST["cargaHoraria"].'\n'.$_POST["enderecoExecucao"];
    //exit();
    if(!isset($_POST["tipo"])||
       !isset($_POST["idOSC"])||
       !isset($_POST["comSemTermo"])||
       !isset($_POST["tecnicoOSC"])||
       !isset($_POST["faixaEtaria"])||
       !isset($_POST["diasSemana"])||
       !isset($_POST["cargaHoraria"])||
       !isset($_POST["enderecoExecucao"])||
       !isset($_POST["horarioDiaUm"])||
       !isset($_POST["horarioDiaDois"])){
        echo 0;
        exit();
        
    }
    else{
        $tipo = $mysqli -> real_escape_string($_POST["tipo"]);
        $idOSC = $mysqli -> real_escape_string($_POST["idOSC"]);
        $comSemTermo = $mysqli -> real_escape_string($_POST["comSemTermo"]);
        $tecnicoOSC = $mysqli -> real_escape_string($_POST["tecnicoOSC"]);
        $faixaEtaria = $mysqli -> real_escape_string($_POST["faixaEtaria"]);
        $diasSemana = $mysqli -> real_escape_string($_POST["diasSemana"]);
        $cargaHoraria=$mysqli -> real_escape_string($_POST["cargaHoraria"]);
        $enderecoExecucao=$mysqli -> real_escape_string($_POST["enderecoExecucao"]);
        $horarioDiaUm=$mysqli -> real_escape_string($_POST["horarioDiaUm"]);
        $horarioDiaDois=$mysqli -> real_escape_string($_POST["horarioDiaDois"]);

        
        
        $variaveis=array();
        $tiposDeDados='';
        $querySQL='';
        $interrogacoes='';

        if($tipo == null || trim($tipo) == ''){
            echo 5;
            exit();
        }
        
        if($comSemTermo === null || trim($comSemTermo) === ''){
            echo 6;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$comSemTermo;
                $tiposDeDados.='s';
                $querySQL.='com_sem_termo,';
                $interrogacoes.='?,';
            }
            else{
                $variaveis[]=$comSemTermo;
                $tiposDeDados.='s';
                $querySQL.='com_sem_termo=?,';
            }
        }
        if($tecnicoOSC === null || trim($tecnicoOSC) === ''){
            echo 7;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$tecnicoOSC;
                $tiposDeDados.='s';
                $querySQL.='nome_tecnico_osc,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$tecnicoOSC;
                $tiposDeDados.='s';
                $querySQL.='nome_tecnico_osc=?,';
            }
        }
        if($faixaEtaria === null || trim($faixaEtaria) === '' || trim($faixaEtaria)===0){
            echo 8;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$faixaEtaria;
                $tiposDeDados.='i';
                $querySQL.='id_faixa_etaria,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$faixaEtaria;
                $tiposDeDados.='i';
                $querySQL.='id_faixa_etaria=?,';
            }
        }
        if($diasSemana === null || trim($diasSemana) === '' ){
            echo 9;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$diasSemana;
                $tiposDeDados.='s';
                $querySQL.='ids_dia_semana,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$diasSemana;
                $tiposDeDados.='s';
                $querySQL.='ids_dia_semana=?,';
            }
        }
        if($cargaHoraria === null || trim($cargaHoraria) === '' ){
            echo 10;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$cargaHoraria;
                $tiposDeDados.='s';
                $querySQL.='carga_horaria,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$cargaHoraria;
                $tiposDeDados.='s';
                $querySQL.='carga_horaria=?,';
            }
        }
        if($enderecoExecucao === null || trim($enderecoExecucao) === ''){
            echo 11;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$enderecoExecucao;
                $tiposDeDados.='s';
                $querySQL.='endereco_execucao,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$enderecoExecucao;
                $tiposDeDados.='s';
                $querySQL.='endereco_execucao=?,';
            }
        }
        if($horarioDiaUm === null || trim($horarioDiaUm) === ''){
            echo 11;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$horarioDiaUm;
                $tiposDeDados.='s';
                $querySQL.='horario_dia_um,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$enderecoExecucao;
                $tiposDeDados.='s';
                $querySQL.='horario_dia_um=?,';
            }
        }
        if($horarioDiaDois === null || trim($horarioDiaDois) === ''){
            echo 11;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$horarioDiaUm;
                $tiposDeDados.='s';
                $querySQL.='horario_dia_dois,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$enderecoExecucao;
                $tiposDeDados.='s';
                $querySQL.='horario_dia_dois=?,';
            }
        }
        $maximo = 0;
        $idNovoGrupo=0;
        if($tipo==="cadastrar"){
            $variaveis[]=$idOSC;
            $tiposDeDados.='i';
            $querySQL.='id_osc,';
            $interrogacoes.='?,';

            $resultadoBusca=0;
            //Busca o valor mais alto do número grupo no banco
            $stmt = $mysqli->prepare("SELECT MAX(numero_grupo) as maximo FROM dados_grupos where id_osc=? and com_sem_termo=?");
            $stmt->bind_param('is',$idOSC,$comSemTermo);
            if ($stmt->execute()) {
                $resultado = $stmt->get_result();
                $row = $resultado->fetch_assoc();
                $maximo=$row['maximo'];
                if(is_null($maximo)){
                    $idNovoGrupo=1;
                }
                else{
                    $idNovoGrupo=$maximo+1;
                }
                $resultado -> free_result();
                $stmt->close();
                $resultadoBusca= 1;
            }
            else{
                echo 133;
                exit();
            }
        }
        else{
            $variaveis[]=$idOSC;
            $tiposDeDados.='i';
            $querySQL.='id_osc=?,';
        }
        
        $mysqli->begin_transaction();
        if($tipo=="cadastrar"){
            if($resultadoBusca===1){
                $variaveis[]=$idNovoGrupo;
                $tiposDeDados.='i';
                $querySQL.='numero_grupo,';
                $interrogacoes.='?,';
                if(substr($querySQL,-1)==","){
                    $querySQL=rtrim($querySQL, ',');
                }
                if(substr($interrogacoes,-1)==","){
                    $interrogacoes=rtrim($interrogacoes, ',');
                }
                $stmt = $mysqli->prepare("INSERT INTO dados_grupos(" . $querySQL . ") VALUES (" . $interrogacoes . ")");
                $stmt->bind_param($tiposDeDados, ...$variaveis);
            }
            else{
                echo 13;
                exit();
            }
            
        }else{
            $idGrupo=$mysqli -> real_escape_string($_POST["idGrupo"]);
            if($tipo!="cadastrar" && $idGrupo<1){
                echo 12;
                exit();
            }
            $variaveis[]=$idGrupo;
            $tiposDeDados.='i';

            if(substr($querySQL,-1)==","){
                $querySQL=rtrim($querySQL, ',');
            }
            $stmt = $mysqli->prepare("UPDATE dados_grupos SET " . $querySQL . " WHERE id=?");
            $stmt->bind_param($tiposDeDados, ...$variaveis);
        }

        if ($stmt->execute()) {
            $mysqli->commit();
            echo 1;
        }
        else{
            $mysqli->rollback();
            echo 25;
            echo $stmt->error;
        }
        $stmt->close();
        $mysqli->close();
    }
?>