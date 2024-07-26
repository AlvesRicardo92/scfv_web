<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
    clearstatcache();

	require "conexaoBanco.php";
    

    if(!isset($_POST["tipo"])||
       !isset($_POST["nomeOSC"])||
       !isset($_POST["apelidoOSC"])||
       !isset($_POST["inscricaoCMAS"])||
       !isset($_POST["cnpj"])||
       !isset($_POST["idCEP"])||
       !isset($_POST["numeroEndereco"])||
       !isset($_POST["telefoneOSC"])||
       !isset($_POST["site"])||
       !isset($_POST["email"])||
       !isset($_POST["CRAS"])||
       !isset($_POST["nomePresidente"])||
       !isset($_POST["telefonePresidente"])||
       !isset($_POST["emailPresidente"])){
        echo 0;
        exit();

        //arrumar o editar osc
        
    }
    else{
        $tipo = $mysqli -> real_escape_string($_POST["tipo"]);
        $idOSC = $mysqli -> real_escape_string($_POST["idOSC"]);
        $nomeOSC = $mysqli -> real_escape_string($_POST["nomeOSC"]);
        $apelidoOSC = $mysqli -> real_escape_string($_POST["apelidoOSC"]);
        $inscricaoCMAS = $mysqli -> real_escape_string($_POST["inscricaoCMAS"]);
        $cnpj=$mysqli -> real_escape_string($_POST["cnpj"]);
        $idCEP=$mysqli -> real_escape_string($_POST["idCEP"]);
        $numeroEndereco=$mysqli -> real_escape_string($_POST["numeroEndereco"]);
        $telefoneOSC=$mysqli -> real_escape_string($_POST["telefoneOSC"]);
        $site=$mysqli -> real_escape_string($_POST["site"]);
        $email=$mysqli -> real_escape_string($_POST["email"]);
        $CRAS=$mysqli -> real_escape_string($_POST["CRAS"]);
        $tecnicoReferenciaCras=$mysqli -> real_escape_string($_POST["tecnicoReferenciaCras"]);
        $nomePresidente=$mysqli -> real_escape_string($_POST["nomePresidente"]);
        $telefonePresidente=$mysqli -> real_escape_string($_POST["telefonePresidente"]);
        $emailPresidente=$mysqli -> real_escape_string($_POST["emailPresidente"]);
        
        $variaveis=array();
        $tiposDeDados='';
        $querySQL='';
        $interrogacoes='';

        if($tipo == null || trim($tipo) == ''){
            echo 5;
            exit();
        }
        
        if($nomeOSC === null || trim($nomeOSC) === ''){
            echo 6;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$nomeOSC;
                $tiposDeDados.='s';
                $querySQL.='nome_osc,';
                $interrogacoes.='?,';
            }
            else{
                $variaveis[]=$nomeOSC;
                $tiposDeDados.='s';
                $querySQL.='nome_osc=?,';
            }
        }
        if($apelidoOSC === null || trim($apelidoOSC) === ''){
            echo 7;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$apelidoOSC;
                $tiposDeDados.='s';
                $querySQL.='apelido_osc,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$apelidoOSC;
                $tiposDeDados.='s';
                $querySQL.='apelido_osc=?,';
            }
        }
        if($inscricaoCMAS === null || trim($inscricaoCMAS) === ''){
            echo 8;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$inscricaoCMAS;
                $tiposDeDados.='s';
                $querySQL.='inscricao_cmas,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$inscricaoCMAS;
                $tiposDeDados.='s';
                $querySQL.='inscricao_cmas=?,';
            }
        }
        if($cnpj === null || trim($cnpj) === '' ){
            echo 9;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$cnpj;
                $tiposDeDados.='s';
                $querySQL.='cnpj,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$cnpj;
                $tiposDeDados.='s';
                $querySQL.='cnpj=?,';
            }
        }
        if($idCEP === null || trim($idCEP) === '' || trim($idCEP) === 0){
            echo 10;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$idCEP;
                $tiposDeDados.='i';
                $querySQL.='id_cep,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$idCEP;
                $tiposDeDados.='i';
                $querySQL.='id_cep=?,';
            }
        }
        if($numeroEndereco === null || trim($numeroEndereco) === ''){
            echo 11;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$numeroEndereco;
                $tiposDeDados.='s';
                $querySQL.='numero_endereco,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$numeroEndereco;
                $tiposDeDados.='s';
                $querySQL.='numero_endereco=?,';
            }
        }
        if($telefoneOSC === null || trim($telefoneOSC) === '' ){
            echo 17;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$telefoneOSC;
                $tiposDeDados.='s';
                $querySQL.='telefone,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$telefoneOSC;
                $tiposDeDados.='s';
                $querySQL.='telefone=?,';
            }
        }
        if($site === null || trim($site) === '' ){
            echo 18;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$site;
                $tiposDeDados.='s';
                $querySQL.='site,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$site;
                $tiposDeDados.='s';
                $querySQL.='site=?,';
            }
        }
        if($email === null || trim($email)==='' ){
            echo 19;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$email;
                $tiposDeDados.='s';
                $querySQL.='email,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$email;
                $tiposDeDados.='s';
                $querySQL.='email=?,';
            }
        }
        if($CRAS === null || trim($CRAS) === '' || trim($CRAS) === 0){
            echo 20;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$CRAS;
                $tiposDeDados.='i';
                $querySQL.='id_cras_referencia,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$CRAS;
                $tiposDeDados.='i';
                $querySQL.='id_cras_referencia=?,';
            }
        }
        if($tecnicoReferenciaCras != null && trim($tecnicoReferenciaCras) != '' && trim($tecnicoReferenciaCras) != 0){
            if($tipo=="cadastrar"){
                $variaveis[]=$tecnicoReferenciaCras;
                $tiposDeDados.='i';
                $querySQL.='id_tecnico_ref_cras,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$tecnicoReferenciaCras;
                $tiposDeDados.='i';
                $querySQL.='id_tecnico_ref_cras=?,';
            }
        }
        if($nomePresidente === null || trim($nomePresidente) === ''){
            echo 22;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$nomePresidente;
                $tiposDeDados.='s';
                $querySQL.='nome_presidente_osc,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$nomePresidente;
                $tiposDeDados.='s';
                $querySQL.='nome_presidente_osc=?,';
            }
        }
        if($telefonePresidente === null || trim($telefonePresidente) === ''){
            echo 23;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$telefonePresidente;
                $tiposDeDados.='s';
                $querySQL.='telefone_presidente,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$telefonePresidente;
                $tiposDeDados.='s';
                $querySQL.='telefone_presidente=?,';
            }
        }
        if($emailPresidente === null || trim($emailPresidente) === ''){
            echo 24;
            exit();
        }
        else{
            if($tipo=="cadastrar"){
                $variaveis[]=$emailPresidente;
                $tiposDeDados.='s';
                $querySQL.='email_presidente,';
                $interrogacoes.='?,';
            }else{
                $variaveis[]=$emailPresidente;
                $tiposDeDados.='s';
                $querySQL.='email_presidente=?,';
            }
        }
        
        if(substr($querySQL,-1)==","){
            $querySQL=rtrim($querySQL, ',');
        }
        if(substr($interrogacoes,-1)==","){
            $interrogacoes=rtrim($interrogacoes, ',');
        }
        $mysqli->begin_transaction();
        if($tipo=="cadastrar"){
            $stmt = $mysqli->prepare("INSERT INTO dados_osc(" . $querySQL . ") VALUES (" . $interrogacoes . ")");
            $stmt->bind_param($tiposDeDados, ...$variaveis);
        }else{
            $variaveis[]=$idOSC;
            $tiposDeDados.='i';
            $stmt = $mysqli->prepare("UPDATE dados_osc SET " . $querySQL . " WHERE id=?");
            $stmt->bind_param($tiposDeDados, ...$variaveis);
        }

        if ($stmt->execute()) {
            $mysqli->commit();
            echo 1;
        }
        else{
            $mysqli->rollback();
            echo 25;
        }
        $stmt->close();
        $mysqli->close();
    }
?>