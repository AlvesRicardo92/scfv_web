<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');

	require "conexaoBanco.php";
    

    if(!isset($_POST["telefone"])||
       !isset($_POST["dataNascimento"])||
       !isset($_POST["corRaca"])||
       !isset($_POST["dataInclusao"])||
       !isset($_POST["situacoesPrioritarias"])||
       !isset($_POST["status"])||
       !isset($_POST["referenciadoCras"])||
       !isset($_POST["paifPaefi"])||
       !isset($_POST["encaminhamento"])||
       !isset($_POST["possuiDeficiencia"])||
       !isset($_POST["tipoDeficiencia"])||
       !isset($_POST["responsavelFamilia"])||
       !isset($_POST["nomeGenitora"])||
       !isset($_POST["numeroEndereco"])||
       !isset($_POST["complementoEndereco"])||
       !isset($_POST["faixaEtaria"])){
        echo 0;
        exit();
    }
    else{
        $telefone = $mysqli -> real_escape_string($_POST["telefone"]);
        $adultoParticipante = $mysqli -> real_escape_string($_POST["adultoParticipante"]);//
        $grauParentesco = $mysqli -> real_escape_string($_POST["grauParentesco"]);
        $dataNascimento=$mysqli -> real_escape_string($_POST["dataNascimento"]);
        $corRaca=$mysqli -> real_escape_string($_POST["corRaca"]);
        $dataInclusao=$mysqli -> real_escape_string($_POST["dataInclusao"]);
        $situacoesPrioritarias=$mysqli -> real_escape_string($_POST["situacoesPrioritarias"]);
        $status=$mysqli -> real_escape_string($_POST["status"]);
        $referenciadoCras=$mysqli -> real_escape_string($_POST["referenciadoCras"]);
        $paifPaefi=$mysqli -> real_escape_string($_POST["paifPaefi"]);
        $dataDesligamento=$mysqli -> real_escape_string($_POST["dataDesligamento"]);
        $motivoDesligamento=$mysqli -> real_escape_string($_POST["motivoDesligamento"]);
        $encaminhamento=$mysqli -> real_escape_string($_POST["encaminhamento"]);
        $numeroGrupoTransferido=$mysqli -> real_escape_string($_POST["numeroGrupoTransferido"]);
        $possuiDeficiencia=$mysqli -> real_escape_string($_POST["possuiDeficiencia"]);
        $tipoDeficiencia=$mysqli -> real_escape_string($_POST["tipoDeficiencia"]);
        $responsavelFamilia=$mysqli -> real_escape_string($_POST["responsavelFamilia"]);
        $nomeGenitora=$mysqli -> real_escape_string($_POST["nomeGenitora"]);
        $idCEP=$mysqli -> real_escape_string($_POST["idCEP"]);//
        $numeroEndereco=$mysqli -> real_escape_string($_POST["numeroEndereco"]);
        $complementoEndereco=$mysqli -> real_escape_string($_POST["complementoEndereco"]);
        $faixaEtaria=$mysqli -> real_escape_string($_POST["faixaEtaria"]);
        $id = $mysqli-> real_escape_string($_POST['idAtendido']);
        $idGrupo = $mysqli-> real_escape_string($_POST['idGrupo']);
        $variaveis=array();
        $tiposDeDados='';
        $querySQL='';
        $interrogacoes='';

        if($telefone == null || trim($telefone) == ''){
            echo 5;
            exit();
        }
        else{
            $variaveis[]=$telefone;
            $tiposDeDados.='s';
            $querySQL.='telefone,';
            $interrogacoes.='?,';
        }
        if($faixaEtaria === null || trim($faixaEtaria) === ''){
            echo 2;
            exit();
        }
        else if($faixaEtaria == 0){
            if($adultoParticipante === null || trim($adultoParticipante) === ''){
                echo 3;
                exit();
            }
            else{
                $variaveis[]=$adultoParticipante;
                $tiposDeDados.='s';
                $querySQL.='adulto_participante_atividade,';
                $interrogacoes.='?,';
            }

            if($grauParentesco === null || trim($grauParentesco) === '' || trim($grauParentesco) === 0){
                echo 4;
                exit();
            }
            else{
                $variaveis[]=$grauParentesco;
                $tiposDeDados.='i';
                $querySQL.='id_parentesco,';
                $interrogacoes.='?,';
            }
        }
        if($corRaca === null || trim($corRaca) === '' || trim($corRaca) === 0){
            echo 6;
            exit();
        }
        else{
            $variaveis[]=$corRaca;
            $tiposDeDados.='i';
            $querySQL.='id_cor_raca,';
            $interrogacoes.='?,';
        }
        if($dataInclusao === null || trim($dataInclusao) === ''){
            echo 7;
            exit();
        }
        else{
            $variaveis[]=$dataInclusao;
            $tiposDeDados.='s';
            $querySQL.='data_inclusao,';
            $interrogacoes.='?,';
        }
        if($situacoesPrioritarias === null || trim($situacoesPrioritarias) === ''){
            echo 8;
            exit();
        }
        else{
            $variaveis[]=$situacoesPrioritarias;
            $tiposDeDados.='s';
            $querySQL.='situacao_prioritaria,';
            $interrogacoes.='?,';
        }
        if($status === null || trim($status) === '' || trim($status) === 0){
            echo 9;
            exit();
        }
        else{
            $variaveis[]=$status;
            $tiposDeDados.='i';
            $querySQL.='id_status,';
            $interrogacoes.='?,';
        }
        if($referenciadoCras === null || trim($referenciadoCras) === '' || trim($referenciadoCras) === 0){
            echo 10;
            exit();
        }
        else{
            $variaveis[]=$referenciadoCras;
            $tiposDeDados.='i';
            $querySQL.='id_referenciado_cras,';
            $interrogacoes.='?,';
        }
        if($paifPaefi === null || trim($paifPaefi) === '' || trim($paifPaefi) === 0){
            echo 11;
            exit();
        }
        else{
            $variaveis[]=$paifPaefi;
            $tiposDeDados.='i';
            $querySQL.='id_paif_paefi,';
            $interrogacoes.='?,';
        }
        if($status==2){
            if ($dataDesligamento === null || trim($dataDesligamento) === ''){
                echo 12;
                exit();
            }
            else{
                $variaveis[]=$dataDesligamento;
                $tiposDeDados.='s';
                $querySQL.='data_desligamento,';
                $interrogacoes.='?,';
            }
            if ($motivoDesligamento === null || trim($motivoDesligamento) === '' || trim($motivoDesligamento) === 0){
                echo 13;
                exit();
            }
            else{
                $variaveis[]=$motivoDesligamento;
                $tiposDeDados.='i';
                $querySQL.='id_motivo_desligamento,';
                $interrogacoes.='?,';
            }
        }
        if($status==5){
            if ($dataDesligamento === null || trim($dataDesligamento) === ''){
                echo 14;
                exit();
            }
            else{
                $variaveis[]=$dataDesligamento;
                $tiposDeDados.='s';
                $querySQL.='data_desligamento,';
                $interrogacoes.='?,';
            }
            if ($motivoDesligamento === null || trim($motivoDesligamento) === '' || trim($motivoDesligamento) === 0){
                echo 15;
                exit();
            }
            else{
                $variaveis[]=$motivoDesligamento;
                $tiposDeDados.='i';
                $querySQL.='id_motivo_desligamento,';
                $interrogacoes.='?,';
            }
            if ($numeroGrupoTransferido === null || trim($numeroGrupoTransferido) === ''){
                echo 16;
                exit();
            }
            else{
                $variaveis[]=$numeroGrupoTransferido;
                $tiposDeDados.='i';
                $querySQL.='numero_grupo_transferido,';
                $interrogacoes.='?,';
            }
        }
        if($encaminhamento === null || trim($encaminhamento) === '' || trim($encaminhamento) === 0){
            echo 17;
            exit();
        }
        else{
            $variaveis[]=$encaminhamento;
            $tiposDeDados.='i';
            $querySQL.='id_encaminhamento,';
            $interrogacoes.='?,';
        }
        if($possuiDeficiencia === null || trim($possuiDeficiencia) === '' || trim($possuiDeficiencia) === 0){
            echo 18;
            exit();
        }
        else{
            $variaveis[]=$possuiDeficiencia;
            $tiposDeDados.='i';
            $querySQL.='id_possui_deficiencia,';
            $interrogacoes.='?,';
        }
        if($tipoDeficiencia != null && trim($tipoDeficiencia) != '' && trim($tipoDeficiencia) != 0){
            $variaveis[]=$tipoDeficiencia;
            $tiposDeDados.='i';
            $querySQL.='id_tipo_deficiencia,';
            $interrogacoes.='?,';
        }
        else{
            $variaveis[]=null;
            $tiposDeDados.='i';
            $querySQL.='id_tipo_deficiencia,';
            $interrogacoes.='?,';
        }
        if($responsavelFamilia === null || trim($responsavelFamilia) === ''){
            echo 20;
            exit();
        }
        else{
            $variaveis[]=$responsavelFamilia;
            $tiposDeDados.='s';
            $querySQL.='nome_responsavel_familia,';
            $interrogacoes.='?,';
        }
        if($nomeGenitora === null || trim($nomeGenitora) === ''){
            echo 21;
            exit();
        }
        else{
            $variaveis[]=$nomeGenitora;
            $tiposDeDados.='s';
            $querySQL.='nome_genitora,';
            $interrogacoes.='?,';
        }
        if($idCEP != null && trim($idCEP) != '' && $idCEP != 0){
            $variaveis[]=$idCEP;
            $tiposDeDados.='i';
            $querySQL.='id_cep,';
            $interrogacoes.='?,';
        }
        if($numeroEndereco === null || trim($numeroEndereco) === ''){
            echo 23;
            exit();
        }
        else{
            $variaveis[]=$numeroEndereco;
            $tiposDeDados.='s';
            $querySQL.='numero_endereco,';
            $interrogacoes.='?,';
        }
        if($complementoEndereco != null && trim($complementoEndereco) != ''){
            $variaveis[]=$complementoEndereco;
            $tiposDeDados.='s';
            $querySQL.='complemento_endereco,';
            $interrogacoes.='?,';
        }
        if($id === null || trim($id) === '' || trim($id) === 0){
            echo 24;
            exit();
        }
        else{
            $variaveis[]=(int)$id;
            $tiposDeDados.='i';
            $querySQL.='id_atendido,';
            $interrogacoes.='?,';
        }
        if($idGrupo === null || trim($idGrupo) === '' || trim($idGrupo) === 0){
            echo 25;
            exit();
        }
        else{
            $variaveis[]=$idGrupo;
            $tiposDeDados.='i';
            $querySQL.='id_grupo,';
            $interrogacoes.='?,';
        }
        if(substr($querySQL,-1)==","){
            $querySQL=rtrim($querySQL, ',');
        }
        if(substr($interrogacoes,-1)==","){
            $interrogacoes=rtrim($interrogacoes, ',');
        }

        $mysqli->begin_transaction();
        $stmt = $mysqli->prepare("INSERT INTO conteudo_grupo(" . $querySQL . ") VALUES (" . $interrogacoes . ")");
        $stmt->bind_param($tiposDeDados, ...$variaveis);

        
        //echo 'UPDATE conteudo_grupo SET '. $querySQL .' WHERE id=?'.'\n\n\n\n\n'.$tiposDeDados.'\n\n\n\n\n'.var_dump($variaveis).'*/';
        //exit();

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