<?php
    header('Content-Type: text/html; charset=utf-8');
    ini_set('default_charset','utf-8');
    clearstatcache();

    require "conexaoBanco.php";
    /** Include PHPExcel */
    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    $mensagem='';
    
    function cleanOutputBuffer() {
        if (ob_get_length()) {
            ob_end_clean();
        }
    }
    
                    
    // Executa a consulta SQL para buscar todas as OSCs
    $query = "
    SELECT 
        IFNULL(a.apelido_osc,'') as apelidoOSC, 
        IFNULL(b.nome_cras,'') as nomeCRAS,
        IFNULL(c.com_sem_termo,'') as comSemTermo, 
        IFNULL(c.numero_grupo,'') as numeroGrupo,
        IFNULL(e.nome,'') as Nome, 
        IFNULL(e.nis,'') as NIS, 
        IFNULL(e.cpf,'') as CPF, 
        IFNULL(e.data_nascimento,'') as dataNascimento,
        IFNULL(d.telefone,'') as telefone,
        IFNULL(d.adulto_participante_atividade,'') as adultoParticipante, 
        IFNULL(f.tipo_parentesco,'') as tipoParentesco, 
        IFNULL(g.cor_raca,'') as corRaca,
        IFNULL(d.data_inclusao,'') as dataInclusao, 
        IFNULL(d.situacao_prioritaria,'') as situacaoPrioritaria,
        IFNULL(h.status,'') as status, 
        IFNULL(d.data_desligamento,'') as dataDesligamento, 
        IFNULL(i.motivo_desligamento,'') as motivoDesligamento,
        IFNULL(j.encaminhamento,'') as encaminhamento, 
        IFNULL(d.numero_grupo_transferido,'') as grupoTransferido, 
        IFNULL(k.referenciado,'') as referenciadoCRAS, 
        IFNULL(l.paif_paefi,'') as paifPaefi,
        IFNULL(m.possui_deficiencia,'') as possuiDeficiencia,
        IFNULL(n.tipo_deficiencia,'') as tipoDeficiencia, 
        IFNULL(d.nome_responsavel_familia,'') as responsavelFamilia,
        IFNULL(d.nome_genitora,'') as nomeGenitora,
        IFNULL(o.cep,'') as CEP, 
        IFNULL(o.logradouro,'') as logradouro, 
        IFNULL(d.numero_endereco,'') as numeroEndereco,
        IFNULL(o.vila,'') as microrregiao, 
        IFNULL(o.bairro,'') as macrorregiao
    FROM dados_osc a
    LEFT JOIN dados_cras b ON b.id = a.id_cras_referencia
    LEFT JOIN dados_grupos c ON c.id_osc = a.id
    LEFT JOIN conteudo_grupo d ON d.id_grupo = c.id
    LEFT JOIN dados_atendido e ON e.id = d.id_atendido
    LEFT JOIN dados_parentesco f ON f.id = d.id_parentesco
    LEFT JOIN dados_cor_raca g ON g.id = d.id_cor_raca
    LEFT JOIN dados_status h ON h.id = d.id_status
    LEFT JOIN dados_motivo_desligamento i ON i.id = d.id_motivo_desligamento
    LEFT JOIN dados_encaminhamento j ON j.id = d.id_encaminhamento
    LEFT JOIN dados_referenciado_cras k ON k.id = d.id_referenciado_cras
    LEFT JOIN dados_paif_paefi l ON l.id = d.id_paif_paefi
    LEFT JOIN dados_possui_deficiencia m ON m.id = d.id_possui_deficiencia
    LEFT JOIN dados_tipo_deificiencia n ON n.id = d.id_tipo_deficiencia
    LEFT JOIN dados_cep o ON o.id = d.id_cep
    ORDER BY a.apelido_osc, b.nome_cras, c.com_sem_termo, c.numero_grupo
    ";

    $resultado = $mysqli->query($query);

    // Diretório temporário para armazenar os arquivos Excel
    $tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'excel_files';
    if (!file_exists($tempDir)) {
    mkdir($tempDir, 0777, true);
    }

    // Agrupar resultados por OSC e CRAS
    $dados = [];
    while ($row = $resultado->fetch_assoc()) {
    $osc = $row['apelidoOSC'];
    $cras = $row['nomeCRAS'];
    $grupo = $row['comSemTermo'] . ' ' . $row['numeroGrupo'];

    if (!isset($dados[$osc])) {
        $dados[$osc] = [];
    }
    if (!isset($dados[$osc][$cras])) {
        $dados[$osc][$cras] = [];
    }
    if (!isset($dados[$osc][$cras][$grupo])) {
        $dados[$osc][$cras][$grupo] = [];
    }
    $dados[$osc][$cras][$grupo][] = $row;
    }

    // Criar e salvar workbooks para cada OSC e CRAS
    $filePaths = [];
    foreach ($dados as $osc => $crasData) {
    foreach ($crasData as $cras => $grupos) {
        // Criar novo workbook
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Nome do Criador")
                                    ->setTitle("$osc - $cras");

        // Adicionar worksheets para cada grupo
        foreach ($grupos as $grupo => $grupoData) {
            $worksheet = $objPHPExcel->createSheet();
            $worksheet->setTitle($grupo);

            // Definir cabeçalhos da tabela
            $worksheet->setCellValue('A1', 'Nome')
                    ->setCellValue('B1', 'NIS')
                    ->setCellValue('C1', 'CPF')
                    ->setCellValue('D1', 'Data Nascimento')
                    ->setCellValue('E1', 'Telefone')
                    ->setCellValue('F1', 'Adulto Participante')
                    ->setCellValue('G1', 'Tipo Parentesco')
                    ->setCellValue('H1', 'Cor/Raça')
                    ->setCellValue('I1', 'Data Inclusão')
                    ->setCellValue('J1', 'Situação Prioritária')
                    ->setCellValue('K1', 'Status')
                    ->setCellValue('L1', 'Data Desligamento')
                    ->setCellValue('M1', 'Motivo Desligamento')
                    ->setCellValue('N1', 'Encaminhamento')
                    ->setCellValue('O1', 'Grupo Transferido')
                    ->setCellValue('P1', 'Referenciado CRAS')
                    ->setCellValue('Q1', 'PAIF/PAEFI')
                    ->setCellValue('R1', 'Possui Deficiência')
                    ->setCellValue('S1', 'Tipo Deficiência')
                    ->setCellValue('T1', 'Responsável Família')
                    ->setCellValue('U1', 'Nome Genitora')
                    ->setCellValue('V1', 'CEP')
                    ->setCellValue('W1', 'Logradouro')
                    ->setCellValue('X1', 'Número Endereço')
                    ->setCellValue('Y1', 'Microrregião')
                    ->setCellValue('Z1', 'Macrorregião');

            // Adicionar dados às células
            $linha = 2; // Começar na segunda linha (a primeira é para cabeçalhos)
            foreach ($grupoData as $dado) {
                $worksheet->setCellValue('A' . $linha, $dado['Nome'])
                        ->setCellValue('B' . $linha, $dado['NIS'])
                        ->setCellValue('C' . $linha, $dado['CPF'])
                        ->setCellValue('D' . $linha, $dado['dataNascimento'])
                        ->setCellValue('E' . $linha, $dado['telefone'])
                        ->setCellValue('F' . $linha, $dado['adultoParticipante'])
                        ->setCellValue('G' . $linha, $dado['tipoParentesco'])
                        ->setCellValue('H' . $linha, $dado['corRaca'])
                        ->setCellValue('I' . $linha, $dado['dataInclusao'])
                        ->setCellValue('J' . $linha, $dado['situacaoPrioritaria'])
                        ->setCellValue('K' . $linha, $dado['status'])
                        ->setCellValue('L' . $linha, $dado['dataDesligamento'])
                        ->setCellValue('M' . $linha, $dado['motivoDesligamento'])
                        ->setCellValue('N' . $linha, $dado['encaminhamento'])
                        ->setCellValue('O' . $linha, $dado['grupoTransferido'])
                        ->setCellValue('P' . $linha, $dado['referenciadoCRAS'])
                        ->setCellValue('Q' . $linha, $dado['paifPaefi'])
                        ->setCellValue('R' . $linha, $dado['possuiDeficiencia'])
                        ->setCellValue('S' . $linha, $dado['tipoDeficiencia'])
                        ->setCellValue('T' . $linha, $dado['responsavelFamilia'])
                        ->setCellValue('U' . $linha, $dado['nomeGenitora'])
                        ->setCellValue('V' . $linha, $dado['CEP'])
                        ->setCellValue('W' . $linha, $dado['logradouro'])
                        ->setCellValue('X' . $linha, $dado['numeroEndereco'])
                        ->setCellValue('Y' . $linha, $dado['microrregiao'])
                        ->setCellValue('Z' . $linha, $dado['macrorregiao']);
                $linha++;
            }
        }

        // Remover a primeira planilha vazia (caso exista)
        $objPHPExcel->removeSheetByIndex(0);

        // Salvar o arquivo Excel
        $filePath = $tempDir . DIRECTORY_SEPARATOR . "$osc - $cras.xlsx";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($filePath);

        // Adicionar o caminho do arquivo ao array de caminhos
        $filePaths[] = $filePath;

        // Limpar a memória
        $objPHPExcel->disconnectWorksheets();
        unset($objPHPExcel);
    }
    }

    // Criar um arquivo ZIP e adicionar os arquivos Excel
    $zipFileName = $tempDir . DIRECTORY_SEPARATOR . 'oscs_cras.zip';
    $zip = new ZipArchive();
    if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
    foreach ($filePaths as $file) {
        $zip->addFile($file, basename($file));
    }
    $zip->close();
    }

    // Fornecer o arquivo ZIP para download
    cleanOutputBuffer();
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="oscs_cras.zip"');
    header('Content-Length: ' . filesize($zipFileName));
    readfile($zipFileName);

    // Limpar arquivos temporários
    foreach ($filePaths as $file) {
    unlink($file);
    }
    unlink($zipFileName);

// Fechar conexão com o banco de dados
$stmt->close();
$mysqli->close();
?>