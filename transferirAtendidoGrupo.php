<?php 
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset','utf-8');
    clearstatcache();

	require "conexaoBanco.php";
    if(!isset($_POST["idAtendido"])||!isset($_POST["idGrupoNovo"])){
        echo 0;
        exit();
        
    }
    else{
        $idAtendido = $mysqli -> real_escape_string($_POST["idAtendido"]);
        $idGrupoNovo = $mysqli -> real_escape_string($_POST["idGrupoNovo"]);
        $status=3;

        $stmt = $mysqli->prepare("INSERT INTO conteudo_grupo (
            id_grupo, id_atendido, telefone, adulto_participante_atividade, id_parentesco, id_cor_raca, data_inclusao, situacao_prioritaria, 
            id_status, data_desligamento, id_motivo_desligamento, id_encaminhamento, numero_grupo_transferido, 
            id_referenciado_cras, id_paif_paefi, id_possui_deficiencia, id_tipo_deficiencia, nome_responsavel_familia, 
            nome_genitora, id_cep, numero_endereco, complemento_endereco
        )
        SELECT 
            ? AS id_grupo,
            id_atendido, 
            telefone, 
            adulto_participante_atividade, 
            id_parentesco, 
            id_cor_raca, 
            data_inclusao, 
            situacao_prioritaria, 
            ? AS id_status,
            NULL AS data_desligamento,
            NULL AS id_motivo_desligamento,
            id_encaminhamento, 
            NULL AS numero_grupo_transferido,
            id_referenciado_cras, 
            id_paif_paefi, 
            id_possui_deficiencia, 
            id_tipo_deficiencia, 
            nome_responsavel_familia, 
            nome_genitora, 
            id_cep, 
            numero_endereco, 
            complemento_endereco
        FROM 
            conteudo_grupo
        WHERE 
            id_atendido = ?");
        $stmt->bind_param('sii',$idGrupoNovo,$status,$idAtendido);
        if ($stmt->execute()) {
            echo 1;
        }
        else{
            echo 133;
            exit();
        }
        $stmt->close();
        $mysqli->close();
    }
?>