<?php
    header('Content-Type: text/html; charset=utf-8');
    ini_set('default_charset','utf-8');
    clearstatcache();

    require "conexaoBanco.php";
    /** Include PHPExcel */
    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    $mensagem='';

    if(!isset($_POST["nomeOSC"])||!isset($_POST["nomeCRAS"])){
        echo "erro nomeOSC ou CRAS";
        exit();
    }
    else{
        $nomeOSC = $mysqli -> real_escape_string($_POST["nomeOSC"]);
        $nomeCRAS = $mysqli -> real_escape_string($_POST["nomeCRAS"]);
        $idOSC=0;
        $idCRAS=0;

        $stmt = $mysqli->prepare("SELECT id FROM dados_cras where nome_cras=?");
        $stmt->bind_param('s', $nomeCRAS);

        if ($stmt->execute()) {
            $mensagem.='começou;';
            $resultado = $stmt->get_result();
            $linhas = $resultado ->num_rows;
            if($linhas>0){ 
                $mensagem.='achou o id do cras;';
                while($row = $resultado->fetch_assoc()) {
                    $idCRAS=$row['id'];
                }
                $resultado -> free_result();
                $stmt->close();

                $stmt = $mysqli->prepare("SELECT id FROM dados_osc where nome_osc=? and id_cras_referencia=?");
                $stmt->bind_param('si', $nomeOSC,$idCRAS);

                if ($stmt->execute()) {
                    $resultado = $stmt->get_result();
                    $linhas = $resultado ->num_rows;
                    if($linhas>0){ 
                        $mensagem.='achou o id da osc;';
                        while($row = $resultado->fetch_assoc()) {
                            $idOSC=$row['id'];
                        }
                        $resultado -> free_result();
                        $stmt->close();
                        
                        $stmt = $mysqli->prepare("SELECT 

                        IFNULL(a.apelido_osc,'') as 'apelidoOSC', 
                        IFNULL(b.nome_cras,'') as 'nomeCRAS',
                        IFNULL(c.com_sem_termo,'') as 'comSemTermo', 
                        IFNULL(c.numero_grupo,'') as 'numeroGrupo',
                        IFNULL(e.nome,'') as 'Nome', 
                        IFNULL(e.nis,'') as 'NIS', 
                        IFNULL(e.cpf,'') as 'CPF', 
                        IFNULL(e.data_nascimento,'') as 'dataNascimento',
                        IFNULL(d.telefone,'') as 'telefone',
                        IFNULL(d.adulto_participante_atividade,'') as 'adultoParticipante', 
                        IFNULL(f.tipo_parentesco,'') as 'tipoParentesco', 
                        IFNULL(g.cor_raca,'') as 'corRaca',
                        IFNULL(d.data_inclusao,'') as 'dataInclusao', 
                        IFNULL(d.situacao_prioritaria,'') as 'situacaoPrioritaria',
                        IFNULL(h.status,'') as 'status', 
                        IFNULL(d.data_desligamento,'') as 'dataDesligamento', 
                        IFNULL(i.motivo_desligamento,'') as 'motivoDesligamento',
                        IFNULL(j.encaminhamento,'') as 'encaminhamento', 
                        IFNULL(d.numero_grupo_transferido,'') as 'grupoTransferido', 
                        IFNULL(k.referenciado,'') as 'referenciadoCRAS', 
                        IFNULL(l.paif_paefi,'') as 'paifPaefi',
                        IFNULL(m.possui_deficiencia,'') as 'possuiDeficiencia',
                        IFNULL(n.tipo_deficiencia,'') as 'tipoDeficiencia', 
                        IFNULL(d.nome_responsavel_familia,'') as 'responsavelFamilia',
                        IFNULL(d.nome_genitora,'') as 'nomeGenitora',
                        IFNULL(o.cep,'') as 'CEP', 
                        IFNULL(o.logradouro,'') as 'logradouro', 
                        IFNULL(d.numero_endereco,'') as 'numeroEndereco',
                        IFNULL(o.vila,'') as 'microrregiao', 
                        IFNULL(o.bairro,'') as 'macrorregiao'
                        
                        FROM dados_osc a
                        
                        LEFT JOIN dados_cras b ON
                        b.id=a.id_cras_referencia
                        
                        LEFT JOIN dados_grupos c ON
                        c.id_osc=a.id
                        
                        LEFT JOIN conteudo_grupo d ON
                        d.id_grupo=c.id
                        
                        LEFT JOIN dados_atendido e ON
                        e.id=d.id_atendido
                        
                        LEFT JOIN dados_parentesco f ON
                        f.id=d.id_parentesco
                        
                        LEFT JOIN dados_cor_raca g ON
                        g.id=d.id_cor_raca
                        
                        LEFT JOIN dados_status h ON
                        h.id=d.id_status
                        
                        LEFT JOIN dados_motivo_desligamento i ON
                        i.id=d.id_motivo_desligamento
                        
                        LEFT JOIN dados_encaminhamento j ON
                        j.id=d.id_encaminhamento
                        
                        LEFT JOIN dados_referenciado_cras k ON
                        k.id=d.id_referenciado_cras
                        
                        LEFT JOIN dados_paif_paefi l ON
                        l.id=d.id_paif_paefi
                        
                        LEFT JOIN dados_possui_deficiencia m ON
                        m.id=d.id_possui_deficiencia
                        
                        LEFT JOIN dados_tipo_deificiencia n ON
                        n.id=d.id_tipo_deficiencia
                        
                        LEFT JOIN dados_cep o ON
                        o.id=d.id_cep
                        
                        WHERE a.id=? and a.id_cras_referencia=?

                        ORDER BY a.apelido_osc, b.nome_cras, c.com_sem_termo, c.numero_grupo");
                        $stmt->bind_param('ii', $idOSC,$idCRAS);
                        

                        if ($stmt->execute()) {
                            $resultado = $stmt->get_result();
                            $linhas = $resultado ->num_rows;
                            if($linhas>0){ 
                                $mensagem.='encontrou os grupos da osc;';
                                $linhaResultado=1;
                                $colunaResultado=1;
                                $indicePlanilha=0;
                                $linhaPlanilha=2;
                                $nomeOSC='';
                                $nomeCRAS='';
                                $nomeGrupo='';
                                while($row = $resultado->fetch_assoc()) {
                                    $objPHPExcel2='';
                                    if($linhaResultado==1){
                                        $mensagem.='começou o preenchimento do excel;';
                                        // Create new PHPExcel object
                                        $objPHPExcel = new PHPExcel();
                                        $objPHPExcel2=$objPHPExcel;
                                        // Add some data
                                        $objPHPExcel2->setActiveSheetIndex($indicePlanilha)
                                                    ->setCellValue('A1', 'NOME DA PESSOA ATENDIDA')
                                                    ->setCellValue('B1', 'NIS ATENDIDO')
                                                    ->setCellValue('C1', 'CPF ATENDIDO')
                                                    ->setCellValue('D1', 'TELEFONE')
                                                    ->setCellValue('E1', 'NOME DO ADULTO PARTICIPANTE DA ATIVIDADE')
                                                    ->setCellValue('F1', 'GRAU DE PARENTESCO')
                                                    ->setCellValue('G1', 'DATA NASCIMENTO')
                                                    ->setCellValue('H1', 'COR/RAÇA')
                                                    ->setCellValue('I1', 'DATA INCLUSÃO')
                                                    ->setCellValue('J1', 'SITUAÇÃO PRIORITÁRIA')
                                                    ->setCellValue('K1', 'STATUS')
                                                    ->setCellValue('L1', 'DATA DESLIGAMENTO')
                                                    ->setCellValue('M1', 'MOTIVO')
                                                    ->setCellValue('N1', 'ENCAMINHAMENTO')
                                                    ->setCellValue('O1', 'GRUPO A SER TRANSFERIDO')
                                                    ->setCellValue('P1', 'REFERENCIADO NO CRAS')
                                                    ->setCellValue('Q1', 'PAIF / PAEFI')
                                                    ->setCellValue('R1', 'PESSOA COM DEFICIÊNCIA')
                                                    ->setCellValue('S1', 'TIPO DEFICIÊNCIA - CONFORME ESTATUTO PCD')
                                                    ->setCellValue('T1', 'NOME DO RESPONSÁVEL PELA FAMÍLIA')
                                                    ->setCellValue('U1', 'NOME DA GENITORA')
                                                    ->setCellValue('V1', 'CEP')
                                                    ->setCellValue('W1', 'ENDEREÇO RESIDENCIAL')
                                                    ->setCellValue('X1', 'Nº')
                                                    ->setCellValue('Y1', 'MICRO REGIÃO')
                                                    ->setCellValue('Z1', 'MACRO REGIÃO')
                                        
                                                    ->setCellValue('A'.$linhaPlanilha, $row['Nome'])
                                                    ->setCellValue('B'.$linhaPlanilha, $row['NIS'])
                                                    ->setCellValue('C'.$linhaPlanilha, $row['CPF'])
                                                    ->setCellValue('D'.$linhaPlanilha, $row['telefone'])
                                                    ->setCellValue('E'.$linhaPlanilha, $row['adultoParticipante'])
                                                    ->setCellValue('F'.$linhaPlanilha, $row['tipoParentesco'])
                                                    ->setCellValue('G'.$linhaPlanilha, $row['dataNascimento'])
                                                    ->setCellValue('H'.$linhaPlanilha, $row['corRaca'])
                                                    ->setCellValue('I'.$linhaPlanilha, $row['dataInclusao'])
                                                    ->setCellValue('J'.$linhaPlanilha, $row['situacaoPrioritaria'])
                                                    ->setCellValue('K'.$linhaPlanilha, $row['status'])
                                                    ->setCellValue('L'.$linhaPlanilha, $row['dataDesligamento'])
                                                    ->setCellValue('M'.$linhaPlanilha, $row['motivoDesligamento'])
                                                    ->setCellValue('N'.$linhaPlanilha, $row['encaminhamento'])
                                                    ->setCellValue('O'.$linhaPlanilha, $row['grupoTransferido'])
                                                    ->setCellValue('P'.$linhaPlanilha, $row['referenciadoCRAS'])
                                                    ->setCellValue('Q'.$linhaPlanilha, $row['paifPaefi'])
                                                    ->setCellValue('R'.$linhaPlanilha, $row['possuiDeficiencia'])
                                                    ->setCellValue('S'.$linhaPlanilha, $row['tipoDeficiencia'])
                                                    ->setCellValue('T'.$linhaPlanilha, $row['responsavelFamilia'])
                                                    ->setCellValue('U'.$linhaPlanilha, $row['nomeGenitora'])
                                                    ->setCellValue('V'.$linhaPlanilha, $row['CEP'])
                                                    ->setCellValue('W'.$linhaPlanilha, $row['logradouro'])
                                                    ->setCellValue('X'.$linhaPlanilha, $row['numeroEndereco'])
                                                    ->setCellValue('Y'.$linhaPlanilha, $row['microrregiao'])
                                                    ->setCellValue('Z'.$linhaPlanilha, $row['macrorregiao']);
                                        $objPHPExcel2->getActiveSheet()->setTitle($nomeGrupo);
                                        $linhaPlanilha+=1;
                                        $nomeOSC=$row['apelidoOSC'];
                                        $nomeCRAS=$row['nomeCRAS'];
                                        $nomeGrupo=$row['comSemTermo'].' '.$row['numeroGrupo'];
                                    }
                                    else{
                                        $mensagem.='continuou o preenchimento do excel;';
                                        //É a mesma OSC
                                        if($row['apelidoOSC'] == $nomeOSC){
                                            if($row['nomeCRAS'] == $nomeCRAS){
                                                if($row['comSemTermo'].' '.$row['numeroGrupo'] == $nomeGrupo){
                                                    $objPHPExcel2->setCellValue('A'.$linhaPlanilha, $row['Nome'])
                                                    ->setCellValue('B'.$linhaPlanilha, $row['NIS'])
                                                    ->setCellValue('C'.$linhaPlanilha, $row['CPF'])
                                                    ->setCellValue('D'.$linhaPlanilha, $row['telefone'])
                                                    ->setCellValue('E'.$linhaPlanilha, $row['adultoParticipante'])
                                                    ->setCellValue('F'.$linhaPlanilha, $row['tipoParentesco'])
                                                    ->setCellValue('G'.$linhaPlanilha, $row['dataNascimento'])
                                                    ->setCellValue('H'.$linhaPlanilha, $row['corRaca'])
                                                    ->setCellValue('I'.$linhaPlanilha, $row['dataInclusao'])
                                                    ->setCellValue('J'.$linhaPlanilha, $row['situacaoPrioritaria'])
                                                    ->setCellValue('K'.$linhaPlanilha, $row['status'])
                                                    ->setCellValue('L'.$linhaPlanilha, $row['dataDesligamento'])
                                                    ->setCellValue('M'.$linhaPlanilha, $row['motivoDesligamento'])
                                                    ->setCellValue('N'.$linhaPlanilha, $row['encaminhamento'])
                                                    ->setCellValue('O'.$linhaPlanilha, $row['grupoTransferido'])
                                                    ->setCellValue('P'.$linhaPlanilha, $row['referenciadoCRAS'])
                                                    ->setCellValue('Q'.$linhaPlanilha, $row['paifPaefi'])
                                                    ->setCellValue('R'.$linhaPlanilha, $row['possuiDeficiencia'])
                                                    ->setCellValue('S'.$linhaPlanilha, $row['tipoDeficiencia'])
                                                    ->setCellValue('T'.$linhaPlanilha, $row['responsavelFamilia'])
                                                    ->setCellValue('U'.$linhaPlanilha, $row['nomeGenitora'])
                                                    ->setCellValue('V'.$linhaPlanilha, $row['CEP'])
                                                    ->setCellValue('W'.$linhaPlanilha, $row['logradouro'])
                                                    ->setCellValue('X'.$linhaPlanilha, $row['numeroEndereco'])
                                                    ->setCellValue('Y'.$linhaPlanilha, $row['microrregiao'])
                                                    ->setCellValue('Z'.$linhaPlanilha, $row['macrorregiao']);
                                                    $objPHPExcel2->getActiveSheet()->setTitle($nomeGrupo);
                                                    $linhaPlanilha+=1;
                                                    $nomeGrupo == $row['comSemTermo'].' '.$row['numeroGrupo'];
                                                }
                                                else{
                                                    $mensagem.='criou uma nova aba;';
                                                    //É a mesma OSC, do mesmo CRAS mas com um grupo diferente
                                                    $objPHPExcel2->createSheet();
                                                    $indicePlanilha+=1;
                                                    $objPHPExcel2->setActiveSheetIndex($indicePlanilha)
                                                    ->setCellValue('A1', 'NOME DA PESSOA ATENDIDA')
                                                    ->setCellValue('B1', 'NIS ATENDIDO')
                                                    ->setCellValue('C1', 'CPF ATENDIDO')
                                                    ->setCellValue('D1', 'TELEFONE')
                                                    ->setCellValue('E1', 'NOME DO ADULTO PARTICIPANTE DA ATIVIDADE')
                                                    ->setCellValue('F1', 'GRAU DE PARENTESCO')
                                                    ->setCellValue('G1', 'DATA NASCIMENTO')
                                                    ->setCellValue('H1', 'COR/RAÇA')
                                                    ->setCellValue('I1', 'DATA INCLUSÃO')
                                                    ->setCellValue('J1', 'SITUAÇÃO PRIORITÁRIA')
                                                    ->setCellValue('K1', 'STATUS')
                                                    ->setCellValue('L1', 'DATA DESLIGAMENTO')
                                                    ->setCellValue('M1', 'MOTIVO')
                                                    ->setCellValue('N1', 'ENCAMINHAMENTO')
                                                    ->setCellValue('O1', 'GRUPO A SER TRANSFERIDO')
                                                    ->setCellValue('P1', 'REFERENCIADO NO CRAS')
                                                    ->setCellValue('Q1', 'PAIF / PAEFI')
                                                    ->setCellValue('R1', 'PESSOA COM DEFICIÊNCIA')
                                                    ->setCellValue('S1', 'TIPO DEFICIÊNCIA - CONFORME ESTATUTO PCD')
                                                    ->setCellValue('T1', 'NOME DO RESPONSÁVEL PELA FAMÍLIA')
                                                    ->setCellValue('U1', 'NOME DA GENITORA')
                                                    ->setCellValue('V1', 'CEP')
                                                    ->setCellValue('W1', 'ENDEREÇO RESIDENCIAL')
                                                    ->setCellValue('X1', 'Nº')
                                                    ->setCellValue('Y1', 'MICRO REGIÃO')
                                                    ->setCellValue('Z1', 'MACRO REGIÃO')

                                                    ->setCellValue('A'.$linhaPlanilha, $row['Nome'])
                                                    ->setCellValue('B'.$linhaPlanilha, $row['NIS'])
                                                    ->setCellValue('C'.$linhaPlanilha, $row['CPF'])
                                                    ->setCellValue('D'.$linhaPlanilha, $row['telefone'])
                                                    ->setCellValue('E'.$linhaPlanilha, $row['adultoParticipante'])
                                                    ->setCellValue('F'.$linhaPlanilha, $row['tipoParentesco'])
                                                    ->setCellValue('G'.$linhaPlanilha, $row['dataNascimento'])
                                                    ->setCellValue('H'.$linhaPlanilha, $row['corRaca'])
                                                    ->setCellValue('I'.$linhaPlanilha, $row['dataInclusao'])
                                                    ->setCellValue('J'.$linhaPlanilha, $row['situacaoPrioritaria'])
                                                    ->setCellValue('K'.$linhaPlanilha, $row['status'])
                                                    ->setCellValue('L'.$linhaPlanilha, $row['dataDesligamento'])
                                                    ->setCellValue('M'.$linhaPlanilha, $row['motivoDesligamento'])
                                                    ->setCellValue('N'.$linhaPlanilha, $row['encaminhamento'])
                                                    ->setCellValue('O'.$linhaPlanilha, $row['grupoTransferido'])
                                                    ->setCellValue('P'.$linhaPlanilha, $row['referenciadoCRAS'])
                                                    ->setCellValue('Q'.$linhaPlanilha, $row['paifPaefi'])
                                                    ->setCellValue('R'.$linhaPlanilha, $row['possuiDeficiencia'])
                                                    ->setCellValue('S'.$linhaPlanilha, $row['tipoDeficiencia'])
                                                    ->setCellValue('T'.$linhaPlanilha, $row['responsavelFamilia'])
                                                    ->setCellValue('U'.$linhaPlanilha, $row['nomeGenitora'])
                                                    ->setCellValue('V'.$linhaPlanilha, $row['CEP'])
                                                    ->setCellValue('W'.$linhaPlanilha, $row['logradouro'])
                                                    ->setCellValue('X'.$linhaPlanilha, $row['numeroEndereco'])
                                                    ->setCellValue('Y'.$linhaPlanilha, $row['microrregiao'])
                                                    ->setCellValue('Z'.$linhaPlanilha, $row['macrorregiao']);
                                                    $linhaPlanilha+=1;
                                                    $nomeGrupo == $row['comSemTermo'].' '.$row['numeroGrupo'];
                                                    $objPHPExcel2->getActiveSheet()->setTitle($nomeGrupo);                                                                 
                                                }
                                            }
                                            else{
                                                $mensagem.='salvou o arquivo por ser cras diferente;';
                                                //É a mesma OSC, mas de um cras diferente
                                                $objPHPExcel2->setActiveSheetIndex(0);
                                                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                                                header('Content-Disposition: attachment;filename="'.$nomeOSC.' - '.$nomeCRAS.'.xlsx');
                                                header('Cache-Control: max-age=0');
                                                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel2, 'Excel2007');
                                                $objWriter->save('php://output');
                                                $indicePlanilha=0;
                                                $linhaPlanilha=2;
                                                $mensagem.='começou um outro arquivo;';
                                                // Create new PHPExcel object
                                                $objPHPExcel2 = new PHPExcel();

                                                // Add some data
                                                $objPHPExcel2->setActiveSheetIndex($indicePlanilha)
                                                ->setCellValue('A1', 'NOME DA PESSOA ATENDIDA')
                                                ->setCellValue('B1', 'NIS ATENDIDO')
                                                ->setCellValue('C1', 'CPF ATENDIDO')
                                                ->setCellValue('D1', 'TELEFONE')
                                                ->setCellValue('E1', 'NOME DO ADULTO PARTICIPANTE DA ATIVIDADE')
                                                ->setCellValue('F1', 'GRAU DE PARENTESCO')
                                                ->setCellValue('G1', 'DATA NASCIMENTO')
                                                ->setCellValue('H1', 'COR/RAÇA')
                                                ->setCellValue('I1', 'DATA INCLUSÃO')
                                                ->setCellValue('J1', 'SITUAÇÃO PRIORITÁRIA')
                                                ->setCellValue('K1', 'STATUS')
                                                ->setCellValue('L1', 'DATA DESLIGAMENTO')
                                                ->setCellValue('M1', 'MOTIVO')
                                                ->setCellValue('N1', 'ENCAMINHAMENTO')
                                                ->setCellValue('O1', 'GRUPO A SER TRANSFERIDO')
                                                ->setCellValue('P1', 'REFERENCIADO NO CRAS')
                                                ->setCellValue('Q1', 'PAIF / PAEFI')
                                                ->setCellValue('R1', 'PESSOA COM DEFICIÊNCIA')
                                                ->setCellValue('S1', 'TIPO DEFICIÊNCIA - CONFORME ESTATUTO PCD')
                                                ->setCellValue('T1', 'NOME DO RESPONSÁVEL PELA FAMÍLIA')
                                                ->setCellValue('U1', 'NOME DA GENITORA')
                                                ->setCellValue('V1', 'CEP')
                                                ->setCellValue('W1', 'ENDEREÇO RESIDENCIAL')
                                                ->setCellValue('X1', 'Nº')
                                                ->setCellValue('Y1', 'MICRO REGIÃO')
                                                ->setCellValue('Z1', 'MACRO REGIÃO')

                                                ->setCellValue('A'.$linhaPlanilha, $row['Nome'])
                                                ->setCellValue('B'.$linhaPlanilha, $row['NIS'])
                                                ->setCellValue('C'.$linhaPlanilha, $row['CPF'])
                                                ->setCellValue('D'.$linhaPlanilha, $row['telefone'])
                                                ->setCellValue('E'.$linhaPlanilha, $row['adultoParticipante'])
                                                ->setCellValue('F'.$linhaPlanilha, $row['tipoParentesco'])
                                                ->setCellValue('G'.$linhaPlanilha, $row['dataNascimento'])
                                                ->setCellValue('H'.$linhaPlanilha, $row['corRaca'])
                                                ->setCellValue('I'.$linhaPlanilha, $row['dataInclusao'])
                                                ->setCellValue('J'.$linhaPlanilha, $row['situacaoPrioritaria'])
                                                ->setCellValue('K'.$linhaPlanilha, $row['status'])
                                                ->setCellValue('L'.$linhaPlanilha, $row['dataDesligamento'])
                                                ->setCellValue('M'.$linhaPlanilha, $row['motivoDesligamento'])
                                                ->setCellValue('N'.$linhaPlanilha, $row['encaminhamento'])
                                                ->setCellValue('O'.$linhaPlanilha, $row['grupoTransferido'])
                                                ->setCellValue('P'.$linhaPlanilha, $row['referenciadoCRAS'])
                                                ->setCellValue('Q'.$linhaPlanilha, $row['paifPaefi'])
                                                ->setCellValue('R'.$linhaPlanilha, $row['possuiDeficiencia'])
                                                ->setCellValue('S'.$linhaPlanilha, $row['tipoDeficiencia'])
                                                ->setCellValue('T'.$linhaPlanilha, $row['responsavelFamilia'])
                                                ->setCellValue('U'.$linhaPlanilha, $row['nomeGenitora'])
                                                ->setCellValue('V'.$linhaPlanilha, $row['CEP'])
                                                ->setCellValue('W'.$linhaPlanilha, $row['logradouro'])
                                                ->setCellValue('X'.$linhaPlanilha, $row['numeroEndereco'])
                                                ->setCellValue('Y'.$linhaPlanilha, $row['microrregiao'])
                                                ->setCellValue('Z'.$linhaPlanilha, $row['macrorregiao']);
                                                $linhaPlanilha+=1;
                                                $nomeGrupo == $row['comSemTermo'].' '.$row['numeroGrupo'];
                                                $objPHPExcel2->getActiveSheet()->setTitle($nomeGrupo);
                                            }
                                        }
                                        else{
                                            $mensagem.='salvou o arquivo por ser OSC diferente;';
                                            //É outra OSC
                                            $objPHPExcel2->setActiveSheetIndex(0);
                                            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                                            header('Content-Disposition: attachment;filename="'.$nomeOSC.' - '.$nomeCRAS.'.xlsx');
                                            header('Cache-Control: max-age=0');
                                            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel2, 'Excel2007');
                                            $objWriter->save('php://output');
                                            $indicePlanilha=0;
                                            $linhaPlanilha=2;
                                            // Create new PHPExcel object
                                            $objPHPExcel2 = new PHPExcel();

                                            // Add some data
                                            $objPHPExcel2->setActiveSheetIndex($indicePlanilha)
                                            ->setCellValue('A1', 'NOME DA PESSOA ATENDIDA')
                                            ->setCellValue('B1', 'NIS ATENDIDO')
                                            ->setCellValue('C1', 'CPF ATENDIDO')
                                            ->setCellValue('D1', 'TELEFONE')
                                            ->setCellValue('E1', 'NOME DO ADULTO PARTICIPANTE DA ATIVIDADE')
                                            ->setCellValue('F1', 'GRAU DE PARENTESCO')
                                            ->setCellValue('G1', 'DATA NASCIMENTO')
                                            ->setCellValue('H1', 'COR/RAÇA')
                                            ->setCellValue('I1', 'DATA INCLUSÃO')
                                            ->setCellValue('J1', 'SITUAÇÃO PRIORITÁRIA')
                                            ->setCellValue('K1', 'STATUS')
                                            ->setCellValue('L1', 'DATA DESLIGAMENTO')
                                            ->setCellValue('M1', 'MOTIVO')
                                            ->setCellValue('N1', 'ENCAMINHAMENTO')
                                            ->setCellValue('O1', 'GRUPO A SER TRANSFERIDO')
                                            ->setCellValue('P1', 'REFERENCIADO NO CRAS')
                                            ->setCellValue('Q1', 'PAIF / PAEFI')
                                            ->setCellValue('R1', 'PESSOA COM DEFICIÊNCIA')
                                            ->setCellValue('S1', 'TIPO DEFICIÊNCIA - CONFORME ESTATUTO PCD')
                                            ->setCellValue('T1', 'NOME DO RESPONSÁVEL PELA FAMÍLIA')
                                            ->setCellValue('U1', 'NOME DA GENITORA')
                                            ->setCellValue('V1', 'CEP')
                                            ->setCellValue('W1', 'ENDEREÇO RESIDENCIAL')
                                            ->setCellValue('X1', 'Nº')
                                            ->setCellValue('Y1', 'MICRO REGIÃO')
                                            ->setCellValue('Z1', 'MACRO REGIÃO')

                                                
                                            ->setCellValue('A'.$linhaPlanilha, $row['Nome'])
                                            ->setCellValue('B'.$linhaPlanilha, $row['NIS'])
                                            ->setCellValue('C'.$linhaPlanilha, $row['CPF'])
                                            ->setCellValue('D'.$linhaPlanilha, $row['telefone'])
                                            ->setCellValue('E'.$linhaPlanilha, $row['adultoParticipante'])
                                            ->setCellValue('F'.$linhaPlanilha, $row['tipoParentesco'])
                                            ->setCellValue('G'.$linhaPlanilha, $row['dataNascimento'])
                                            ->setCellValue('H'.$linhaPlanilha, $row['corRaca'])
                                            ->setCellValue('I'.$linhaPlanilha, $row['dataInclusao'])
                                            ->setCellValue('J'.$linhaPlanilha, $row['situacaoPrioritaria'])
                                            ->setCellValue('K'.$linhaPlanilha, $row['status'])
                                            ->setCellValue('L'.$linhaPlanilha, $row['dataDesligamento'])
                                            ->setCellValue('M'.$linhaPlanilha, $row['motivoDesligamento'])
                                            ->setCellValue('N'.$linhaPlanilha, $row['encaminhamento'])
                                            ->setCellValue('O'.$linhaPlanilha, $row['grupoTransferido'])
                                            ->setCellValue('P'.$linhaPlanilha, $row['referenciadoCRAS'])
                                            ->setCellValue('Q'.$linhaPlanilha, $row['paifPaefi'])
                                            ->setCellValue('R'.$linhaPlanilha, $row['possuiDeficiencia'])
                                            ->setCellValue('S'.$linhaPlanilha, $row['tipoDeficiencia'])
                                            ->setCellValue('T'.$linhaPlanilha, $row['responsavelFamilia'])
                                            ->setCellValue('U'.$linhaPlanilha, $row['nomeGenitora'])
                                            ->setCellValue('V'.$linhaPlanilha, $row['CEP'])
                                            ->setCellValue('W'.$linhaPlanilha, $row['logradouro'])
                                            ->setCellValue('X'.$linhaPlanilha, $row['numeroEndereco'])
                                            ->setCellValue('Y'.$linhaPlanilha, $row['microrregiao'])
                                            ->setCellValue('Z'.$linhaPlanilha, $row['macrorregiao']);
                                            $linhaPlanilha+=1;
                                            $nomeOSC=$row['apelidoOSC'];
                                            $nomeCRAS=$row['nomeCRAS'];
                                            $nomeGrupo=$row['comSemTermo'].' '.$row['numeroGrupo'];
                                            $objPHPExcel2->getActiveSheet()->setTitle($nomeGrupo);
                                        }
                                    }
                                }
                                $mensagem.='salvou o arquivo final;';
                                $resultado -> free_result();
                                $objPHPExcel2->setActiveSheetIndex(0);
                                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                                header('Content-Disposition: attachment;filename="'.$nomeOSC.' - '.$nomeCRAS.'.xlsx');
                                header('Cache-Control: max-age=0');
                                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel2, 'Excel2007');
                                $objWriter->save('php://output');
                            }
                            else{
                                $resultado -> free_result();
                                echo "Dados não encontrados";
                            }
                        }
                        else{
                            echo "Erro na busca dos grupos da OSC";
                        }
                    }
                    else{
                        $resultado -> free_result();
                        echo "OSC não encontrado";
                    }
                }
                else{
                    echo "Erro na busca da OSC";
                }
            }
            else{
                $resultado -> free_result();
                echo "CRAS não encontrado";
            }
        }
        else{
            echo "Erro na busca do CRAS";
        }
        $stmt->close();
        $mysqli->close();
        //echo $mensagem;
    }

//sleep(15);
//header("Location: detalhes_OSC.php");
?>