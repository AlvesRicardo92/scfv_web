/*!
* Start Bootstrap - Bare v5.0.7 (https://startbootstrap.com/template/bare)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-bare/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
/*var path = window.location.pathname;
var page = path.split("/").pop();
if (page=="si.php"){
window.addEventListener("load", function() {
    if (document.getElementById("setor").innerText=="CLD"){
        document.getElementById("novo").setAttribute("disabled","");
    }
});
}
else if (page=="impressaoSI.php"){
    window.print();
}
function voltarPaginaInicial(){
    window.location.href = "index3.php";
}
function inserirLinhaTabela(descricao) {
    if (document.getElementById('tipoAtividade').selectedIndex<=0){
        alert("Selecione o tipo de atividade correto");
    }
    else{
        var tbodyRef = document.getElementById('tabelaAtividade').getElementsByTagName('tbody')[0];
        var newRow = tbodyRef.insertRow();
        var newCell = newRow.insertCell();

        var newText = document.createTextNode(descricao);
        newCell.className="align-middle";
        newCell.appendChild(newText);
        
        newCell = newRow.insertCell();
        var btn = document.createElement('button');
        btn.type = "button";
        btn.className = "btn excluir";
        btn.innerHTML ="<i class=\"fas fa-trash\" style=\"font-size:16px;\"> Excluir</i>";
        newCell.appendChild(btn);

        document.getElementById('tipoAtividade').value="0";
    }    
}
function removerLinha() {
    var td = event.target.parentNode; 
    var tr = td.parentNode;
    tr.parentNode.removeChild(tr);
}
function inserirLinhaTabelaMaterial(item,quantidade) {
    var valorRadio;
    if (document.getElementById('tipoMaterial').selectedIndex<=0){
        alert("Selecione o material correto");
    }
    else if(document.getElementById('quantidadeMaterial').value===""){
        alert("Digite a quantidade de material utilizada");
    }
    else if(document.getElementById('quantidadeMaterial').value===" "){
        alert("Digite a quantidade de material utilizada");
    }
    else if (parseInt(document.getElementById('quantidadeMaterial').value) < 1){
        alert("Digite a quantidade de material correta");
    }
    else if (isNaN(parseInt(document.getElementById('quantidadeMaterial').value))){
        alert("Digite a quantidade de material correta");
    }
    else if(!document.getElementById('retirada').checked && !document.getElementById('pmsbc').checked && !document.getElementById('consorcio').checked){
        alert("Informe se o material utilizado é da prefeitura, do consórcio ou foi apenas uma retirada");
    }
    else{
        if(document.getElementById('pmsbc').checked){
            valorRadio="PMSBC";
        }
        else if(document.getElementById('consorcio').checked){
            valorRadio="Consórcio";
        }
        else if(document.getElementById('retirada').checked){
            valorRadio="Retirada";
        }

        var tbodyRef = document.getElementById('tabelaMaterial').getElementsByTagName('tbody')[0];
        var newRow = tbodyRef.insertRow();
        var newCell = newRow.insertCell();
        var newText = document.createTextNode(item);

        newCell.className="align-middle";
        newCell.appendChild(newText);
        
        newCell = newRow.insertCell();
        newText = document.createTextNode(parseInt(quantidade));
        newCell.className="align-middle";
        newCell.appendChild(newText);
        
        newCell = newRow.insertCell();
        newText = document.createTextNode(valorRadio);
        newCell.className="align-middle";
        newCell.appendChild(newText);

        newCell = newRow.insertCell();
        var btn = document.createElement('button');
        btn.type = "button";
        btn.className = "btn excluir";
        btn.innerHTML ="<i class=\"fas fa-trash\" style=\"font-size:16px;\"> Excluir</i>";
        newCell.appendChild(btn);

        document.getElementById('tipoMaterial').value="0";
        document.getElementById('quantidadeMaterial').value="";
        document.getElementById('pmsbc').checked=false;
        document.getElementById('consorcio').checked=false;
        document.getElementById('retirada').checked=false;
    }    
}
function gerarNovoSi(){
    
    var obj= document.getElementById("urgente");
    obj.removeAttribute("disabled");
    obj.checked=false;

    obj= document.getElementById("priorizar");
    obj.removeAttribute("disabled");
    obj.checked=false;

    obj = document.getElementById("normal");
    obj.removeAttribute("disabled");
    obj.checked=false;


    obj= document.getElementById("siNumero");
    obj.value="";

    colocarHojeNaData();

    obj = document.getElementById("resp01");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("resp02");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("buscaEndereco");
    obj.removeAttribute("disabled");
    
    obj = document.getElementById("logradouro");
    obj.value="";

    obj = document.getElementById("bairro");
    obj.value="";

    obj = document.getElementById("numEndereco");
    obj.value="";

    obj = document.getElementById("destino");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("solicitante");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("assunto");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("obs");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("anotacoes");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("salvar");
    obj.removeAttribute("disabled");
}

/* falta ajustar projeto ---------------------------------------
function gerarNovoProj(){
    
    var obj= document.getElementById("urgente");
    obj.removeAttribute("disabled");
    obj.checked=false;

    obj= document.getElementById("priorizar");
    obj.removeAttribute("disabled");
    obj.checked=false;

    obj = document.getElementById("normal");
    obj.removeAttribute("disabled");
    obj.checked=false;


    obj= document.getElementById("siNumero");
    obj.value="";

    colocarHojeNaData();

    obj = document.getElementById("resp01");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("resp02");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("buscaEndereco");
    obj.removeAttribute("disabled");
    
    obj = document.getElementById("logradouro");
    obj.value="";

    obj = document.getElementById("bairro");
    obj.value="";

    obj = document.getElementById("numEndereco");
    obj.value="";

    obj = document.getElementById("destino");
    obj.removeAttribute("disabled");
    obj.value=0;

    obj = document.getElementById("solicitante");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("assunto");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("obs");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("anotacoes");
    obj.removeAttribute("disabled");
    obj.value="";

    obj = document.getElementById("salvar");
    obj.removeAttribute("disabled");
	
}*/
/*function colocarHojeNaData(){
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;    

       $('#siData').val(today);
}
function enviarForm(){
    var tabela = "";
    var form = document.getElementById("formulario");
    //form.submit();
    var diaria = document.getElementById("diariaNumero").value;
    var data = dovalue;
    var logradouro = document.getElementById("logradouro").value;
    var origem = $("#origem option:selected").text();
    var talao = document.getElementById("numTalao").value;
    var responsavel = document.getElementById("responsavel").value;
    var bairro = document.getElementById("bairro").value;
    var numEndereco = document.getElementById("numEndereco").value;
    var logradouroCruzamento = document.getElementById("logradouroCruzamento").value;
    var ocorrencia = document.getElementById("ocorrencia").value;
    var tipoServico = $("#tipoServico option:selected").text();
    var atividades = "";

    tabela=document.getElementById("tabelaAtividade");
    for (var i = 0, row; row = tabela.rows[i]; i++) {
        for (var j = 0, col; col = row.cells[j]; j++) {
            if (j==0){
                atividades+=row.cells[j].innerText+";";
            }
        }  
    }

    var materialUtilizado = "";
    var quantidadeUtilizada = "";
    var retiradaOuOrigemMaterial = "";
    tabela=document.getElementById("tabelaMaterial");
    for (var i = 0, row; row = tabela.rows[i]; i++) {
        for (var j = 0, col; col = row.cells[j]; j++) {
            if(j==0){
                materialUtilizado+=row.cells[j].innerText+";";
            }
            if(j==1){
                quantidadeUtilizada+=row.cells[j].innerText+";";
            }
            if(j==2){
                retiradaOuOrigemMaterial+=row.cells[j].innerText+";";
            }
        }  
    }
	
    var horaRecebeu = document.getElementById("horaRecebeu").value;
    var horaChegou = document.getElementById("horaChegou").value;;
    var horaInicio = document.getElementById("horaInicio").value;;
    var horaFim = document.getElementById("horaFim").value;;
    var veiculo = $("#veiculo option:selected").text();
    var kmInicial = document.getElementById("kmInicial").value;
    var kmFinal = document.getElementById("kmFinal").value;
    var obs = document.getElementById("obs").value;
    var dt = new Date();
    var hora = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    console.log("Número da diária: " + diaria+"\n" +
                "Data: " + data+"\n" +
                "Hora: " + hora+"\n" +
                "Origem: " + origem+"\n" +
                "Número do talão: " + talao+"\n" +
                "Responsável: " + responsavel+"\n" +
                "Logradouro: " + logradouro+"\n" +
                "Bairro: " + bairro+"\n" +
                "Número do endereço: " + numEndereco+"\n" +
                "Logradouro do Cruzamento: " + logradouroCruzamento+"\n" +
                "Descrição: " + ocorrencia+"\n" + 
                "Tipo de serviço: " + tipoServico+"\n" + 
                "Atividades: " + atividades+"\n" + 
                "Materiais utilizados: " + materialUtilizado+"\n" + 
                "Quantidades utilizadas: " + quantidadeUtilizada+"\n" + 
                "Retirada ou Origem do Material: " + retiradaOuOrigemMaterial+"\n" + 
                "Hora que recebeu o serviço: " + horaRecebeu+"\n" + 
                "Hora que chegou no local: " + horaChegou+"\n" + 
                "Hora que iniciou o serviço: " + horaInicio+"\n" + 
                "Hora que terminou o serviço: " + horaFim+"\n" + 
                "Veículo: " + veiculo+"\n" + 
                "KM Inicial: " + kmInicial+"\n" + 
                "KM Final: " + kmFinal+"\n" + 
                "OBS: " + obs+"\n"
                )
	
    $.ajax({
        url: 'enviaForm.php',
        async:false,
        type: 'POST',
        data: { numeroDiaria: diaria,
                data: data,
                hora: hora,
                origemOcorrencia: origem,
                numeroTalao: talao,
                responsavelCadastro: responsavel,
                logradouroOcorrencia: logradouro,
                bairroOcorrencia: bairro,
                numeroEndereco: numEndereco,
                logradouroCruzamento: logradouroCruzamento,
                descricaoOcorrencia: ocorrencia,
                tipoServico: tipoServico,
                atividadesExecutadas: atividades,
                materiaisUtilizados: materialUtilizado,
                quantidadeMateriaisUtilizados: quantidadeUtilizada,
                retiradaOuOrigemMaterial: retiradaOuOrigemMaterial,
                horaRecebeuServico: horaRecebeu,
                horaChegouLocal: horaChegou,
                horaIniciouServico: horaInicio,
                horaTerminouServico: horaFim,
                veiculoUtilizado: veiculo,
                kmInicialVeiculo: kmInicial,
                kmFinalVeiculo: kmFinal,
                obs: obs},
        dataType:'text',
        done: function () {
            alert("feito");
        },
        success: function (resultado) {
            if (resultado==1){
                alert("Informações salvas com sucesso!");
            }
            else{
                console.log("resultado= " + resultado);
                alert("Erro ao salvar as informações\nVerifique se há algum erro de preenchimento ou entre em contato com o Administrador do Sistema");
            }
        },
        fail: function(){
            alert("falha");
        },
        error: function(){
            alert("error");
        }
    }); 
}
function buscarEndereco(enderecoDigitado){
    if (document.getElementById('endereco').value==="" || document.getElementById('endereco').value===" "){
        alert("Digite primeiro o logradouro ou parte dele");
    }
    else{
        $.ajax({
            url: 'buscarEndereco.php',
            async:false,
            type: 'POST',
            data: {endereco: enderecoDigitado},
            dataType:'text',
            done: function () {
                alert("feito");
            },
            success: function (resultado) {
                if (resultado!="Não encontrado"){
                    var tabelaEndereco = document.getElementById('tabelaResultadoEndereco').getElementsByTagName('tbody')[0];
                    tabelaEndereco.innerHTML=resultado;
                }
                else{
                    var tabelaEndereco = document.getElementById('tabelaResultadoEndereco').getElementsByTagName('tbody')[0];
                    tabelaEndereco.innerHTML="";
                    alert("Endereço não encontrado.\nTente digitar apenas parte do nome");
                }
            },
            fail: function(){
                alert("falha");
            },
            error: function(){
                alert("error");
            }
        });
    }
}
function buscarSI(dados){
    var tipoPesquisa;
    if(document.getElementById("numeroPesquisa").checked){
        tipoPesquisa="numero";
    }
    if(document.getElementById("enderecoPesquisa").checked){
        tipoPesquisa="endereco";
    }
    if(document.getElementById("funcionarioPesquisa").checked){
        tipoPesquisa="funcionario";
    }
    if (document.getElementById('numeroPesquisa').value===false && document.getElementById('enderecoPesquisa').value===false && document.getElementById('funcionarioPesquisa').value===false){
        alert("Selecione o tipo de busca: Número, Endereço ou Funcionário");
    }
    if (document.getElementById('textoBusca').value==="" || document.getElementById('textoBusca').value===" "){
        alert("Digite os dados para pesquisa");
    }
    else{
        $.ajax({
            url: 'buscarSI.php',
            async:false,
            type: 'POST',
            data: {tipoPesquisa: tipoPesquisa,
                    valorPesquisado:document.getElementById('textoBusca').value },
            dataType:'text',
            done: function () {
                alert("feito");
            },
            success: function (resultado) {
                if (resultado!="Não encontrado"){
                    var tabelaEndereco = document.getElementById('tabelaResultadoSI').getElementsByTagName('tbody')[0];
                    tabelaEndereco.innerHTML=resultado;
                }
                else{
                    alert("Endereço não encontrado.\nTente digitar apenas parte do nome");
                }
            },
            fail: function(){
                alert("falha");
            },
            error: function(){
                alert("error");
            }
        });
    }
}
function passaChamada(valor){
    document.getElementById('chamada').innerText= valor;
}
function enviarSI(){
    var resp1 = $("#resp01 option:selected").text();
    var destino = $("#destino option:selected").text()
    var assunto = document.getElementById('assunto').value;
    var logradouro = document.getElementById('logradouro').value;
    var prioridade;
    if(document.getElementById('urgente').checked == true){
        prioridade="URGENCIAR";
    }
    else if(document.getElementById('priorizar').checked == true){
        prioridade="PRIORIZAR";
    }
    else if(document.getElementById('normal').checked == true){
        prioridade="NORMAL";
    }
    else{
        prioridade="";
    }

    if (resp1 == 0 || 
        destino == 0 || 
        assunto == "" || 
        assunto== " " || 
        logradouro== "" || 
        prioridade== ""){
            document.getElementById('resp01').style.border = "3px solid #FF0000";
            document.getElementById('destino').style.border = "3px solid #FF0000";
            document.getElementById('assunto').style.border = "3px solid #FF0000";
            document.getElementById('logradouro').style.border = "3px solid #FF0000";
            document.getElementById('urgente').style.border = "3px solid #FF0000";
            document.getElementById('priorizar').style.border = "3px solid #FF0000";
            document.getElementById('normal').style.border = "3px solid #FF0000";
            alert("OS campos em destaque são obrigatórios. Verifique se há algum sem preenchimento");
    }
    else{
            $.ajax({
            url: 'retornaMaximoSI.php',
            async:false,
            type: 'POST',
            data: {},
            dataType:'text',
            done: function () {
                alert("feito");
            },
            success: function (resultado) {
                if (resultado>0){
                    //alert("Informações salvas com sucesso!");
                    //salvar
                    var numeroSI = resultado;
                    $.ajax({
                        url: 'enviaSI.php',
                        async:false,
                        data: { numeroSI: numeroSI,
                                siData: document.getElementById('siData').value,
                                responsavel1: resp1,
                                responsavel2: $("#resp02 option:selected").text(),
                                destino: destino,
                                solicitante: document.getElementById('solicitante').value,
                                assunto: assunto,
                                logradouro: logradouro,
                                bairro: document.getElementById('bairro').value,
                                numeroEndereco: document.getElementById('numEndereco').value,
                                obs: document.getElementById('obs').value,
                                anotacoes: document.getElementById('anotacoes').value,
                                prioridade: prioridade,
                                iniciais: document.getElementById('iniciais').innerText},
                        dataType:'text',
                        done: function () {
                            alert("feito");
                        },
                        success: function (resultado) {
                             if(isNaN(resultado)){
                                console.log("resultado= " + resultado);
                             }
                             else{
                                document.getElementById('siNumero').value= numeroSI;
                                var resposta = confirm("Salvo com sucesso!\n S.I. nº: "+numeroSI+"\nDeseja imprimir?");
                                if (resposta) {
                                    document.cookie = "numeroSI=" + numeroSI + "; expires=600000; path=/";
                                    var dataArray = document.getElementById('siData').value.split("-");
                                    document.cookie = "anoSI=" + dataArray[0] + "; expires=600000; path=/";
                                    imprimirSI();
                                }
                             }
                        },
                        fail: function(){
                            alert("falha");
                        },
                        error: function(){
                            alert("error");
                        }
                    });
                }
                else{
                    console.log("resultado= " + resultado);
                    alert("Erro ao salvar as informações\nVerifique se há algum erro de preenchimento ou entre em contato com o Administrador do Sistema");
                }
            },
            fail: function(){
                alert("falha");
            },
            error: function(){
                alert("error");
            }
        });
    }	
}*/

// #region FUNÇÃO LOGAR
function logar() {
    var usuario = document.getElementById('typeUserX-2').value;
    var senha = document.getElementById('typePasswordX-2').value;
    $.ajax({
        url: 'checarLogin.php',
        async: false,
        type: 'POST',
        data: { usuario: usuario, senha: senha },
        dataType: 'text',
        done: function () {
            alert("feito");
        },
        success: function (resultado) {
            if (resultado > 0) {
                window.location.href = "inicio.php";
            }
            else {
                console.log("resultado= " + resultado);
                alert("Erro ao logar. Verifique o console");
            }
        },
        fail: function () {
            alert("falha");
        },
        error: function () {
            alert("error");
        }
    });
}
// #endregion

// #region FUNÇÃO DESABILITAR OUTROS CHECKBOXES
function desabilitarOutrosCheckBoxes(obj) {
    if ($(obj).is(":checked")) {
        $("#ckbSituacaoPrioritaria2").attr("disabled", "");
        $('#ckbSituacaoPrioritaria2').prop('checked', false);
        $("#ckbSituacaoPrioritaria3").attr("disabled", "");
        $('#ckbSituacaoPrioritaria3').prop('checked', false);
        $("#ckbSituacaoPrioritaria4").attr("disabled", "");
        $('#ckbSituacaoPrioritaria4').prop('checked', false);
        $("#ckbSituacaoPrioritaria5").attr("disabled", "");
        $('#ckbSituacaoPrioritaria5').prop('checked', false);
        $("#ckbSituacaoPrioritaria6").attr("disabled", "");
        $('#ckbSituacaoPrioritaria6').prop('checked', false);
        $("#ckbSituacaoPrioritaria7").attr("disabled", "");
        $('#ckbSituacaoPrioritaria7').prop('checked', false);
        $("#ckbSituacaoPrioritaria8").attr("disabled", "");
        $('#ckbSituacaoPrioritaria8').prop('checked', false);
        $("#ckbSituacaoPrioritaria9").attr("disabled", "");
        $('#ckbSituacaoPrioritaria9').prop('checked', false);
        $("#ckbSituacaoPrioritaria10").attr("disabled", "");
        $('#ckbSituacaoPrioritaria10').prop('checked', false);
        $("#ckbSituacaoPrioritaria11").attr("disabled", "");
        $('#ckbSituacaoPrioritaria11').prop('checked', false);
        $("#ckbSituacaoPrioritaria12").attr("disabled", "");
        $('#ckbSituacaoPrioritaria12').prop('checked', false);
    } else {
        $("#ckbSituacaoPrioritaria2").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria3").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria4").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria5").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria6").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria7").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria8").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria9").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria10").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria11").removeAttr("disabled");
        $("#ckbSituacaoPrioritaria12").removeAttr("disabled");
    }

}
// #endregion

// #region DOCUMENTO READY JQUERY
$(document).ready(function () {
    // #region VISUALIZAR GRUPO
    $(".visualizarGrupo").click(function () {
        // Obtém o conteúdo da terceira coluna na mesma linha do botão clicado
        var conteudo = $(this).closest("tr").find(".idGrupo").text();
        // Define os dados no campo hidden do formulário
        $("#form-dados input[name='idGrupo']").val(conteudo);
        // Submete o formulário
        $("#form-dados").submit();
    });
    // #endregion

    // #region BOTÃO GRUPOS 
    $("#grupos").click(function () {
        $('.modal_Grupos').removeAttr("style");
        $('#labelModal_grupos').removeAttr("style");
        $('#staticBackdrop2Label').text("Visualizar Grupos");
        limparDadosGrupo();
    });
    // #endregion

    /*// #region BOTÃO NOVO GRUPOS
    $("#novoGrupo").click(function () {
        $('#modal_grupos').attr("style", "display:none;");
        $('#labelModal_grupos').attr("style", "display:none;");
    });
    // #endregion*/

    // #region BOTÃO SALVAR OSC
    $("#salvarOSC").click(function () {
        var erros=0;
        if ($('.modal_nomeOSC').val() == '') {
            $('.modal_nomeOSC').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_nomeOSC').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_apelidoOSC').val() == '') {
            $('.modal_apelidoOSC').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_apelidoOSC').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_inscricaoCMAS').val() == '') {
            $('.modal_inscricaoCMAS').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_inscricaoCMAS').css({ border: '1px solid #dee2e6' });
        }            
        if ($('.modal_cnpj').val() == '') {
            $('.modal_cnpj').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_cnpj').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_logradouro').val() == '') {
            $('.modal_cep').css({ border: '2px solid red' });
            $('#buscarCEP').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_cep').css({ border: '1px solid #dee2e6' });
            $('#buscarCEP').css({ border: '1px solid #0d6efd' });
        }
        if ($('.modal_telefoneOSC').val() == '') {
            $('.modal_telefoneOSC').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_telefoneOSC').css({ border: '1px solid #dee2e6' });
        }      
        if ($('.modal_site').val() == '') {
            $('.modal_site').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_site').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_email').val() == '') {
            $('.modal_email').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_email').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_CRAS').val() == '') {
            $('.modal_CRAS').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_CRAS').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_nomePresidente').val() == '') {
            $('.modal_nomePresidente').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_nomePresidente').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_telefonePresidente').val() == '') {
            $('.modal_telefonePresidente').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_telefonePresidente').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_emailPresidente').val() == '') {
            $('.modal_emailPresidente').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_emailPresidente').css({ border: '1px solid #dee2e6' });
        }
        if($('#staticBackdropLabel').text()=="Cadastro OSC"){
            if(erros==0){  
                var idOSC=$('#modal_spanIdOSC').text();
                var nomeOSC=$('.modal_nomeOSC').val();
                var apelidoOSC=$('.modal_apelidoOSC').val();
                var inscricaoCMAS=$('.modal_inscricaoCMAS').val();
                var cnpj=$('.modal_cnpj').val();
                var idCEP=$('#idCEP').text();
                var numeroEndereco=$('.modal_numeroEndereco').val();;
                var telefoneOSC=$('.modal_telefoneOSC').val();
                var site=$('.modal_site').val();
                var email=$('.modal_email').val();
                var CRAS=$('.modal_CRAS').val();
                var tecnicoReferenciaCras=$('.modal_tecnicoReferenciaCras').val();
                var nomePresidente=$('.modal_nomePresidente').val();
                var telefonePresidente=$('.modal_telefonePresidente').val();
                var emailPresidente=$('.modal_emailPresidente').val();

                $.ajax({
                    url: 'cadastrarEditarOSC.php',
                    async: false,
                    type: 'POST',
                    data: { tipo:"cadastrar", idOSC:idOSC,nomeOSC:nomeOSC,apelidoOSC:apelidoOSC,inscricaoCMAS:inscricaoCMAS,
                            cnpj:cnpj,idCEP:idCEP,numeroEndereco:numeroEndereco,telefoneOSC:telefoneOSC,site:site,email:email,CRAS:CRAS,tecnicoReferenciaCras:tecnicoReferenciaCras,
                            nomePresidente:nomePresidente,telefonePresidente:telefonePresidente,emailPresidente:emailPresidente},
                    dataType: 'text',
                    done: function () {
                        alert("feito");
                    },
                    success: function (resultado) {
                        if (resultado == 1) {
                            alert("OSC cadastrada com sucesso!");
                            $('.modal_nomeOSC').attr("disabled", "");
                            $('.modal_apelidoOSC').attr("disabled", "");
                            $('.modal_inscricaoCMAS').attr("disabled", "");
                            $('.modal_cnpj').attr("disabled", "");
                            $('.modal_cep').attr("disabled", "");
                            $('#buscarCEP').attr("disabled", "");
                            $('.modal_numeroEndereco').attr("disabled", "");
                            $('.modal_telefoneOSC').attr("disabled", "");
                            $('.modal_site').attr("disabled", "");
                            $('.modal_email').attr("disabled", "");
                            $('.modal_CRAS').attr("disabled", "");
                            $('.modal_tecnicoReferenciaCras').attr("disabled", "");
                            $('.modal_nomePresidente').attr("disabled", "");
                            $('.modal_telefonePresidente').attr("disabled", "");
                            $('.modal_emailPresidente').attr("disabled", "");
                            $('#salvarOSC').attr("disabled", "");
                            $('#cadastrarGrupo').attr("disabled", "");
                            $('#novoGrupo').removeAttr("disabled");
                            $('#grupos').removeAttr("disabled");
                        }
                        else {
                            console.log("resultado= " + resultado);
                            alert("Erro ao logar. Verifique o console");
                        }
                    },
                    fail: function () {
                        alert("falha");
                    },
                    error: function () {
                        alert("error");
                    }
                });
            }
        }
        else if($('#staticBackdropLabel').text()=="Editar OSC"){
            if(erros==0){ 
                var idOSC=$('#modal_spanIdOSC').text();
                var nomeOSC=$('.modal_nomeOSC').val();
                var apelidoOSC=$('.modal_apelidoOSC').val();
                var inscricaoCMAS=$('.modal_inscricaoCMAS').val();
                var cnpj=$('.modal_cnpj').val();
                var idCEP=$('#idCEP').text();
                var numeroEndereco=$('.modal_numeroEndereco').val();;
                var telefoneOSC=$('.modal_telefoneOSC').val();
                var site=$('.modal_site').val();
                var email=$('.modal_email').val();
                var CRAS=$('.modal_CRAS').val();
                var tecnicoReferenciaCras=$('.modal_tecnicoReferenciaCras').val();
                var nomePresidente=$('.modal_nomePresidente').val();
                var telefonePresidente=$('.modal_telefonePresidente').val();
                var emailPresidente=$('.modal_emailPresidente').val();
                $.ajax({
                    url: 'cadastrarEditarOSC.php',
                    async: false,
                    type: 'POST',
                    data: { tipo:"editar", idOSC:idOSC,nomeOSC:nomeOSC,apelidoOSC:apelidoOSC,inscricaoCMAS:inscricaoCMAS,
                            cnpj:cnpj,idCEP:idCEP,numeroEndereco:numeroEndereco,telefoneOSC:telefoneOSC,site:site,email:email,CRAS:CRAS,tecnicoReferenciaCras:tecnicoReferenciaCras,
                            nomePresidente:nomePresidente,telefonePresidente:telefonePresidente,emailPresidente:emailPresidente},
                    dataType: 'text',
                    done: function () {
                        alert("feito");
                    },
                    success: function (resultado) {
                        if (resultado ==1) {
                            alert("OSC alterada com sucesso!");
                            $('.modal_nomeOSC').attr("disabled", "");
                            $('.modal_apelidoOSC').attr("disabled", "");
                            $('.modal_inscricaoCMAS').attr("disabled", "");
                            $('.modal_cnpj').attr("disabled", "");
                            $('.modal_cep').attr("disabled", "");
                            $('#buscarCEP').attr("disabled", "");
                            $('.modal_numeroEndereco').attr("disabled", "");
                            $('.modal_telefoneOSC').attr("disabled", "");
                            $('.modal_site').attr("disabled", "");
                            $('.modal_email').attr("disabled", "");
                            $('.modal_CRAS').attr("disabled", "");
                            $('.modal_tecnicoReferenciaCras').attr("disabled", "");
                            $('.modal_nomePresidente').attr("disabled", "");
                            $('.modal_telefonePresidente').attr("disabled", "");
                            $('.modal_emailPresidente').attr("disabled", "");
                            $('#salvarOSC').attr("disabled", "");
                            $('#cadastrarGrupo').attr("disabled", "");
                            $('#novoGrupo').attr("disabled", "");
                            $('#grupos').attr("disabled", "");
                        }
                        else {
                            console.log("resultado= " + resultado);
                            alert("Erro ao logar. Verifique o console");
                        }
                    },
                    fail: function () {
                        alert("falha");
                    },
                    error: function () {
                        alert("error");
                    }
                });
            }
        }
    });
    // #endregion

    // #region BOTÃO SALVAR GRUPO
    $("#salvarGrupo").click(function () {
        var erros=0;
        if($('#rb_semTermo').prop("checked")==false && $('#rb_comTermo').prop("checked")==false){
            $('#label_rb_semTermo').css({ border: '2px solid red' });
            $('#label_rb_comTermo').css({ border: '2px solid red' });
            erros += 1;
        }
        else{
            $('#label_rb_semTermo').css({ border: 'none' });
            $('#label_rb_comTermo').css({ border: 'none' });
        }
        if ($('.modal_nomeTecnicoOSC').val() == '') {
            $('.modal_nomeTecnicoOSC').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_nomeTecnicoOSC').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_faixaEtaria').val() == 0) {
            $('.modal_faixaEtaria').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_faixaEtaria').css({ border: '1px solid #dee2e6' });
        }
        if ($('#ckbDiaSemana2').prop("checked")==false && $('#ckbDiaSemana3').prop("checked")==false &&
            $('#ckbDiaSemana4').prop("checked")==false && $('#ckbDiaSemana5').prop("checked")==false &&
            $('#ckbDiaSemana6').prop("checked")==false) {

            $('#label_ckbDiaSemana2').css({ border: '2px solid red' });
            $('#label_ckbDiaSemana3').css({ border: '2px solid red' });
            $('#label_ckbDiaSemana4').css({ border: '2px solid red' });
            $('#label_ckbDiaSemana5').css({ border: '2px solid red' });
            $('#label_ckbDiaSemana6').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('#label_ckbDiaSemana2').css({ border: 'none' });
            $('#label_ckbDiaSemana3').css({ border: 'none' });
            $('#label_ckbDiaSemana4').css({ border: 'none' });
            $('#label_ckbDiaSemana5').css({ border: 'none' });
            $('#label_ckbDiaSemana6').css({ border: 'none' });
        }            
        if ($('.modal_cargaHoraria').val() == '') {
            $('.modal_cargaHoraria').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_cargaHoraria').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_enderecoExecucao').val() == '') {
            $('.modal_enderecoExecucao').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_enderecoExecucao').css({ border: '1px solid #dee2e6' });
        }
        
        if($('#staticBackdrop2Label').text()=="Novo Grupo"){
            if(erros==0){  
                var comSemTermo='';
                if($('#rb_semTermo').prop("checked")==false){
                    comSemTermo='COM TERMO';
                }
                else{
                    comSemTermo='SEM TERMO';
                }
                var tecnicoOSC=$('.modal_nomeTecnicoOSC').val();
                var nomeGrupo=$('.modal_nomeGrupo').val();
                var faixaEtaria=$('.modal_faixaEtaria').val();
                var diasSemana = ""; // Variável para armazenar os IDs
                // Percorre todas as checkboxes
                $("input[type='checkbox']").each(function () {
                    // Verifica se a checkbox está marcada
                    if ($(this).is(":checked")) {
                        // Adiciona o ID da checkbox à variável
                        diasSemana += $(this).attr("id") + ";";
                    }
                });
                diasSemana = diasSemana.replace(/ckbDiaSemana/g, "");                              
                
                var cargaHoraria=$('.modal_cargaHoraria').val();
                var enderecoExecucao=$('.modal_enderecoExecucao').val();
                var idOSC =$('#modal_spanIdOSC').text();
                var idGrupo =$('.modal_Grupos').val();
                $.ajax({
                    url: 'cadastrarEditarGrupo.php',
                    async: false,
                    type: 'POST',
                    data: { tipo:"cadastrar", idOSC:idOSC,idGrupo:idGrupo,comSemTermo:comSemTermo,tecnicoOSC:tecnicoOSC,nomeGrupo:nomeGrupo,faixaEtaria:faixaEtaria,diasSemana:diasSemana,
                            cargaHoraria:cargaHoraria,enderecoExecucao:enderecoExecucao},
                    dataType: 'text',
                    done: function () {
                        alert("feito");
                    },
                    success: function (resultado) {
                        if (resultado == 1) {
                            alert("OSC cadastrada com sucesso!");
                            $('.modal_nomeOSC').attr("disabled", "");
                            $('.modal_apelidoOSC').attr("disabled", "");
                            $('.modal_inscricaoCMAS').attr("disabled", "");
                            $('.modal_cnpj').attr("disabled", "");
                            $('.modal_cep').attr("disabled", "");
                            $('#buscarCEP').attr("disabled", "");
                            $('.modal_numeroEndereco').attr("disabled", "");
                            $('.modal_telefoneOSC').attr("disabled", "");
                            $('.modal_site').attr("disabled", "");
                            $('.modal_email').attr("disabled", "");
                            $('.modal_CRAS').attr("disabled", "");
                            $('.modal_tecnicoReferenciaCras').attr("disabled", "");
                            $('.modal_nomePresidente').attr("disabled", "");
                            $('.modal_telefonePresidente').attr("disabled", "");
                            $('.modal_emailPresidente').attr("disabled", "");
                            $('#salvarOSC').attr("disabled", "");
                            $('#cadastrarGrupo').attr("disabled", "");
                            $('#novoGrupo').removeAttr("disabled");
                            $('#grupos').removeAttr("disabled");
                        }
                        else {
                            console.log("resultado= " + resultado);
                            alert("Erro ao logar. Verifique o console");
                        }
                    },
                    fail: function () {
                        alert("falha");
                    },
                    error: function () {
                        alert("error");
                    }
                });
            }
        }
        else if($('#staticBackdrop2Label').text()=="Editar Grupo"){
            if(erros==0){ 
                var comSemTermo='';
                if($('#rb_semTermo').prop("checked")==false){
                    comSemTermo='COM TERMO';
                }
                else{
                    comSemTermo='SEM TERMO';
                }
                var tecnicoOSC=$('.modal_nomeTecnicoOSC').val();
                var nomeGrupo=$('.modal_nomeGrupo').val();
                var faixaEtaria=$('.modal_faixaEtaria').val();
                var diasSemana = ""; // Variável para armazenar os IDs
                // Percorre todas as checkboxes
                $("input[type='checkbox']").each(function () {
                    // Verifica se a checkbox está marcada
                    if ($(this).is(":checked")) {
                        // Adiciona o ID da checkbox à variável
                        diasSemana += $(this).attr("id") + ";";
                    }
                });
                diasSemana = diasSemana.replace(/ckbDiaSemana/g, "");                              
                
                var cargaHoraria=$('.modal_cargaHoraria').val();
                var enderecoExecucao=$('.modal_enderecoExecucao').val();
                var idOSC =$('#modal_spanIdOSC').text();
                var idGrupo =$('.modal_Grupos').val();
                console.log(comSemTermo+'\n'+tecnicoOSC+'\n'+nomeGrupo+'\n'+faixaEtaria+'\n'+diasSemana+'\n'+cargaHoraria+'\n'+enderecoExecucao+'\n'+idOSC+'\n'+idGrupo);
                $.ajax({
                    url: 'cadastrarEditarGrupo.php',
                    async: false,
                    type: 'POST',
                    data: { tipo:"editar", idOSC:idOSC,idGrupo:idGrupo,comSemTermo:comSemTermo,tecnicoOSC:tecnicoOSC,nomeGrupo:nomeGrupo,faixaEtaria:faixaEtaria,diasSemana:diasSemana,
                            cargaHoraria:cargaHoraria,enderecoExecucao:enderecoExecucao},
                    dataType: 'text',
                    done: function () {
                        alert("feito");
                    },
                    success: function (resultado) {
                        if (resultado ==1) {
                            alert("OSC alterada com sucesso!");
                            $('.modal_nomeOSC').attr("disabled", "");
                            $('.modal_apelidoOSC').attr("disabled", "");
                            $('.modal_inscricaoCMAS').attr("disabled", "");
                            $('.modal_cnpj').attr("disabled", "");
                            $('.modal_cep').attr("disabled", "");
                            $('#buscarCEP').attr("disabled", "");
                            $('.modal_numeroEndereco').attr("disabled", "");
                            $('.modal_telefoneOSC').attr("disabled", "");
                            $('.modal_site').attr("disabled", "");
                            $('.modal_email').attr("disabled", "");
                            $('.modal_CRAS').attr("disabled", "");
                            $('.modal_tecnicoReferenciaCras').attr("disabled", "");
                            $('.modal_nomePresidente').attr("disabled", "");
                            $('.modal_telefonePresidente').attr("disabled", "");
                            $('.modal_emailPresidente').attr("disabled", "");
                            $('#salvarOSC').attr("disabled", "");
                            $('#cadastrarGrupo').attr("disabled", "");
                            $('#novoGrupo').attr("disabled", "");
                            $('#grupos').attr("disabled", "");
                        }
                        else {
                            console.log("resultado= " + resultado);
                            alert("Erro ao logar. Verifique o console");
                        }
                    },
                    fail: function () {
                        alert("falha");
                    },
                    error: function () {
                        alert("error");
                    }
                });
            }
        }
    });
    // #endregion

    // #region VISUALIZAR OSC
    $(".visualizarOSC").click(function () {
        var idOSC = $(this).closest("tr").find(".idOSC").text();
        $("#staticBackdropLabel").text('Visualizar OSC');
        $('.modal_nomeOSC').attr("disabled", "");
        $('.modal_apelidoOSC').attr("disabled", "");
        $('.modal_inscricaoCMAS').attr("disabled", "");
        $('.modal_cnpj').attr("disabled", "");
        $('.modal_cep').attr("disabled", "");
        $('#buscarCEP').attr("disabled", "");
        $('.modal_numeroEndereco').attr("disabled", "");
        $('.modal_telefoneOSC').attr("disabled", "");
        $('.modal_site').attr("disabled", "");
        $('.modal_email').attr("disabled", "");
        $('.modal_CRAS').attr("disabled", "");
        $('.modal_tecnicoReferenciaCras').attr("disabled", "");
        $('.modal_nomePresidente').attr("disabled", "");
        $('.modal_telefonePresidente').attr("disabled", "");
        $('.modal_emailPresidente').attr("disabled", "");
        $('#salvarOSC').attr("disabled", "");
        $('#cadastrarGrupo').attr("disabled", "");
        $('#novoGrupo').attr("disabled", "");
        $('#grupos').removeAttr("disabled");

        $.ajax({
            url: 'dadosOSC.php',
            async: false,
            type: 'POST',
            data: { idOSC: idOSC },
            dataType: 'json',
            done: function () {
                alert("feito");
                console.log('feito');
            },
            success: function (data) {
                if (data.status == 'sucesso') {
                    $('#modal_spanIdOSC').text(idOSC);
                    $('.modal_nomeOSC').val(data.nomeOSC);
                    $('.modal_apelidoOSC').val(data.apelidoOSC);
                    $('.modal_inscricaoCMAS').val(data.inscricaoCMAS);
                    $('.modal_cnpj').val(data.cnpj);
                    $('#idCEP').text(data.idCEP);
                    buscarCEPpeloID();
                    $('.modal_numeroEndereco').val(data.numeroEndereco);
                    $('.modal_telefoneOSC').val(data.telefone);
                    $('.modal_site').val(data.site);
                    $('.modal_email').val(data.email);
                    $('.modal_CRAS').val(data.idCRAS);
                    $(".modal_CRAS").trigger("change");
                    $('.modal_tecnicoReferenciaCras').val(data.idTecnicoCRAS);
                    $('.modal_nomePresidente').val(data.nomePresidente);
                    $('.modal_telefonePresidente').val(data.telefonePresidente);
                    $('.modal_emailPresidente').val(data.emailPresidente);
                }
                else {
                    $('#modal_spanIdOSC').text('');
                    $('.modal_nomeOSC').val('');
                    $('.modal_apelidoOSC').val('');
                    $('.modal_inscricaoCMAS').val('');
                    $('.modal_cnpj').val('');
                    $('#idCEP').text('');
                    $('.modal_numeroEndereco').val('');
                    $('.modal_telefoneOSC').val('');
                    $('.modal_site').val('');
                    $('.modal_email').val('');
                    $('.modal_CRAS').val('');
                    $('.modal_tecnicoReferenciaCras').val('');
                    $('.modal_nomePresidente').val('');
                    $('.modal_telefonePresidente').val('');
                    $('.modal_emailPresidente').val('');
                    alert('Erro ao localizar os dados da OSC.');
                }
            },
            fail: function () {
                alert("falha");
                console.log('falha');
            },
            error: function () {
                alert("error");
                console.log('erro');
            }
        });
        adicionarGruposOSC(idOSC);
        
    });
    // #endregion

    // #region ADICIONA OS GRUPOS QUE A OSC POSSUI NO COMBOBOX GRUPOS DO MODAL DA PÁGINA ADMINISTRATIVA
    function adicionarGruposOSC(idOSC) {
        $('.modal_Grupos').find('option').remove().end().append('<option value="0">Selecione...</option>')
        $.ajax({
            url: 'buscarGruposOSC.php', // URL da sua página PHP para processar a requisição
            method: 'POST', // Método da requisição (GET ou POST)
            data: { idOSC: idOSC }, // Dados a serem enviados para a página PHP
            dataType: 'json', // Tipo de dados esperado na resposta (JSON neste caso)
            success: function (resultado) {
                var grupos = $('.modal_Grupos');
                for (var i = 0; i < resultado.length; i++) {
                    var grupo = resultado[i];
                    var option = document.createElement('option');
                    option.value = grupo.id;
                    if(grupo.nome_grupo!=''){
                        if(grupo.nome_grupo!=null){
                            option.text = grupo.com_sem_termo+' '+grupo.numero_grupo+' ('+grupo.nome_grupo+')';
                        }
                        else{
                            option.text = grupo.com_sem_termo+' '+grupo.numero_grupo;
                        }                        
                    }
                    else{
                        option.text = grupo.com_sem_termo+' '+grupo.numero_grupo;
                    }
                    grupos.append(option);
                }
            },
            fail: function () {
                alert("falha");
                console.log('falha');
            },
            error: function () {
                alert("error");
                console.log('erro');
            }
        });
    }
    // #endregion

    // #region EDITAR OSC
    $(".editarOSC").click(function () {
        var idOSC = $(this).closest("tr").find(".idOSC").text();
        $("#staticBackdropLabel").text('Editar OSC');
        $('.modal_nomeOSC').removeAttr("disabled");
        $('.modal_apelidoOSC').removeAttr("disabled");
        $('.modal_inscricaoCMAS').removeAttr("disabled");
        $('.modal_cnpj').removeAttr("disabled");
        $('.modal_cep').removeAttr("disabled");
        $('#buscarCEP').removeAttr("disabled");
        $('.modal_numeroEndereco').removeAttr("disabled");
        $('.modal_telefoneOSC').removeAttr("disabled");
        $('.modal_site').removeAttr("disabled");
        $('.modal_email').removeAttr("disabled");
        $('.modal_CRAS').removeAttr("disabled");
        $('.modal_tecnicoReferenciaCras').removeAttr("disabled");
        $('.modal_nomePresidente').removeAttr("disabled");
        $('.modal_telefonePresidente').removeAttr("disabled");
        $('.modal_emailPresidente').removeAttr("disabled");
        $('#salvarOSC').removeAttr("disabled");
        $('#cadastrarGrupo').removeAttr("disabled");
        $('#novoGrupo').removeAttr("disabled");
        $('#grupos').removeAttr("disabled");

        $.ajax({
            url: 'dadosOSC.php',
            async: false,
            type: 'POST',
            data: { idOSC: idOSC },
            dataType: 'json',
            done: function () {
                alert("feito");
                console.log('feito');
            },
            success: function (data) {
                if (data.status == 'sucesso') {
                    $('#modal_spanIdOSC').text(idOSC);
                    $('.modal_nomeOSC').val(data.nomeOSC);
                    $('.modal_apelidoOSC').val(data.apelidoOSC);
                    $('.modal_inscricaoCMAS').val(data.inscricaoCMAS);
                    $('.modal_cnpj').val(data.cnpj);
                    $('#idCEP').text(data.idCEP);
                    buscarCEPpeloID();
                    $('.modal_numeroEndereco').val(data.numeroEndereco);
                    $('.modal_telefoneOSC').val(data.telefone);
                    $('.modal_site').val(data.site);
                    $('.modal_email').val(data.email);
                    $('.modal_CRAS').val(data.idCRAS);
                    $(".modal_CRAS").trigger("change");
                    $('.modal_tecnicoReferenciaCras').val(data.idTecnicoCRAS);
                    $('.modal_nomePresidente').val(data.nomePresidente);
                    $('.modal_telefonePresidente').val(data.telefonePresidente);
                    $('.modal_emailPresidente').val(data.emailPresidente);
                }
                else {
                    $('#modal_spanIdOSC').text('');
                    $('.modal_nomeOSC').val('');
                    $('.modal_apelidoOSC').val('');
                    $('.modal_inscricaoCMAS').val('');
                    $('.modal_cnpj').val('');
                    $('#idCEP').text('');
                    $('.modal_numeroEndereco').val('');
                    $('.modal_telefoneOSC').val('');
                    $('.modal_site').val('');
                    $('.modal_email').val('');
                    $('.modal_CRAS').val('');
                    $('.modal_tecnicoReferenciaCras').val('');
                    $('.modal_nomePresidente').val('');
                    $('.modal_telefonePresidente').val('');
                    $('.modal_emailPresidente').val('');
                    alert('Erro ao localizar os dados da OSC.');
                }
            },
            fail: function () {
                alert("falha");
                console.log('falha');
            },
            error: function () {
                alert("error");
                console.log('erro');
            }
        });

        adicionarGruposOSC(idOSC);
    });
    // #endregion

    // #region EDITAR ATENDIDO
    $('.botao_editar').click(function () {
        $(".modal-title").text('Editar Atendido');
        var tr = $(this).closest('tr');
        var idAtendido = tr.find('td.idAtendido').text();
        var idAtendidoNoGrupo = tr.find('td.idAtendidoNoGrupo').text();
        var seqAtendido = tr.find('td.seqAtendido').text();
        var nomeAtendido = tr.find('td.tbl_nomeAtendido').text();
        var nis = tr.find('td.tbl_nis').text();
        var cpf = tr.find('td.tbl_cpf').text();
        var telefone = tr.find('td.tbl_telefone').text();
        var adultoParticipante = tr.find('td.tbl_adultoParticipante').text();
        var tipoParentesco = tr.find('td.tbl_tipoParentesco').text();
        var dataNascimento = tr.find('td.tbl_dataNascimento').text();
        var corRaca = tr.find('td.tbl_corRaca').text();
        var dataInclusao = tr.find('td.tbl_dataInclusao').text();
        var situacaoPrioritaria = tr.find('td.tbl_situacaoPrioritaria').text();
        var status = tr.find('td.tbl_status').text();
        var dataDesligamento = tr.find('td.tbl_dataDesligamento').text();
        var motivoDesligamento = tr.find('td.tbl_motivoDesligamento').text();
        var encaminhamento = tr.find('td.tbl_encaminhamento').text();
        var numeroGrupoTransferido = tr.find('td.tbl_numeroGrupoTransferido').text();
        var referenciadoCras = tr.find('td.tbl_referenciadoCras').text();
        var paifPaefi = tr.find('td.tbl_paifPaefi').text();
        var possuiDeficiencia = tr.find('td.tbl_possuiDeficiencia').text();
        var tipoDeficiencia = tr.find('td.tbl_tipoDeficiencia').text();
        var nomeResponsavelFamilia = tr.find('td.tbl_nomeResponsavelFamilia').text();
        var nomeGenitora = tr.find('td.tbl_nomeGenitora').text();
        var cep = tr.find('td.tbl_cep').text();
        var logradouro = tr.find('td.tbl_logradouro').text();
        var numeroEndereco = tr.find('td.tbl_numeroEndereco').text();
        var vila = tr.find('td.tbl_vila').text();
        var bairro = tr.find('td.tbl_bairro').text();
        var faixaEtaria = $('.faixaEtaria').val();
        var complementoEndereco = tr.find('td.tbl_complementoEndereco').text();
        if (parseInt(faixaEtaria.substring(0, 2)) == 0) {
            $('.modal_adultoParticipante').removeAttr("disabled");
            $('.modal_grauParentesco').removeAttr("disabled");
        }
        else {
            $('.modal_adultoParticipante').attr("disabled", "");
            $('.modal_grauParentesco').attr("disabled", "");
        }

        $("#idAtendido").text(idAtendido);
        $("#idAtendidoNoGrupo").text(idAtendidoNoGrupo);
        $("#SeqAtendido").text(seqAtendido);
        $('.modal_nomeAtendido').val(nomeAtendido);
        $('.modal_nis').val(nis);
        $('.modal_cpf').val(cpf);
        $('.modal_telefone').val(telefone);
        $('.modal_adultoParticipante').val(adultoParticipante);
        if (tipoParentesco != '' && tipoParentesco != null) {
            $(".modal_tipoParentesco option:contains('" + tipoParentesco + "')").prop("selected", true);
        }
        else {
            $(".modal_tipoParentesco").val(0);
        }
        $('.modal_dataNascimento').val(dataNascimento);
        if (corRaca != '' && corRaca != null) {
            $(".modal_corRaca option:contains('" + corRaca + "')").prop("selected", true);
        }
        else {
            $(".modal_corRaca").val(0);
        }
        $('.modal_dataInclusao').val(dataInclusao);

        var arraySituacaoPrioritaria = situacaoPrioritaria.split(";");
        $("input[type='checkbox']").prop("checked", false);
        arraySituacaoPrioritaria.forEach(function (id) {
            $("#ckbSituacaoPrioritaria" + id).prop("checked", true);
        });
        $("#ckbSituacaoPrioritaria1").trigger("change");
        arraySituacaoPrioritaria = [];

        $('.modal_situacaoPrioritaria').val(situacaoPrioritaria);
        $('.modal_status').removeAttr("disabled");
        if (status != '') {
            $(".modal_status option:contains('" + status + "')").prop("selected", true);
        }
        $('.modal_dataDesligamento').val(dataDesligamento);
        if (motivoDesligamento != '' && motivoDesligamento != null) {
            $(".modal_motivoDesligamento option:contains('" + motivoDesligamento + "')").prop("selected", true);
        }
        else {
            $(".modal_motivoDesligamento").val(0);
        }
        if (encaminhamento != '' && encaminhamento != null) {
            $(".modal_encaminhamento option:contains('" + encaminhamento + "')").prop("selected", true);
        } else {
            $(".modal_encaminhamento").val(0);
        }
        if (numeroGrupoTransferido != '' && numeroGrupoTransferido != null) {
            $(".modal_numeroGrupoTransferido option:contains('" + numeroGrupoTransferido + "')").prop("selected", true);
        } else {
            $(".modal_numeroGrupoTransferido").val(0);
        }
        if (referenciadoCras != '' && referenciadoCras != null) {
            $(".modal_referenciadoCras option:contains('" + referenciadoCras + "')").prop("selected", true);
        }
        else {
            $(".modal_referenciadoCras").val(0);
        }
        if (paifPaefi != '' && paifPaefi != null) {
            $(".modal_paifPaefi option:contains('" + paifPaefi + "')").prop("selected", true);
        }
        else {
            $(".modal_paifPaefi").val(0);
        }
        if (possuiDeficiencia != '' && possuiDeficiencia != null) {
            $(".modal_possuiDeficiencia option:contains('" + possuiDeficiencia + "')").prop("selected", true);
        }
        else {
            $(".modal_possuiDeficiencia").val(0);
        }
        if ($(".modal_possuiDeficiencia").val() > 1) {
            $('.modal_tipoDeficiencia').removeAttr("disabled");
        }
        else {
            $('.modal_tipoDeficiencia').attr("disabled", "");
        }
        if (tipoDeficiencia != '' && tipoDeficiencia != null) {
            $(".modal_tipoDeficiencia option:contains('" + tipoDeficiencia + "')").prop("selected", true);
        }
        else {
            $(".modal_tipoDeficiencia").val(0);
        }
        $('.modal_responsavelFamilia').val(nomeResponsavelFamilia);
        $('.modal_nomeGenitora').val(nomeGenitora);
        $('.modal_cep').val(cep);
        $('.modal_logradouro').val(logradouro);
        $('.modal_numeroEndereco').val(numeroEndereco);
        $('.modal_vila').val(vila);
        $('.modal_bairro').val(bairro);
        $('.modal_complementoEndereco').val(complementoEndereco);
    });
    // #endregion
    
     // Obtém o caminho completo do arquivo
     var pageName = window.location.pathname;

     // Verifica se a página atual é "impressao.php"
     if (pageName.endsWith("impressao.php")) {
         // Se for "impressao.php", abre a janela de impressão
         window.print();
     }
});
// #endregion

// #region CLICAR NO BOTÃO NOVO ATENDIDO
$('#novoAtendido').click(function () {
    $(".modal-title").text('Novo Atendido');
    var faixaEtaria = $('.faixaEtaria').val();
    if (parseInt(faixaEtaria.substring(0, 2)) == 0) {
        $('.modal_adultoParticipante').removeAttr("disabled");
        $('.modal_grauParentesco').removeAttr("disabled");
    }
    else {
        $('.modal_adultoParticipante').attr("disabled", "");
        $('.modal_grauParentesco').attr("disabled", "");
    }

    $("#idAtendido").text('');
    $("#idAtendidoNoGrupo").text('');
    $("#SeqAtendido").text('');
    $('.modal_nomeAtendido').val('');
    $('.modal_nis').val('');
    $('.modal_cpf').val('');
    $('.modal_telefone').val('');
    $('.modal_adultoParticipante').val('');
    $(".modal_tipoParentesco").val(0);
    $('.modal_dataNascimento').val('');
    $(".modal_corRaca").val(0);
    $('.modal_dataInclusao').val('');
    $("input[type='checkbox']").prop("checked", false);
    $("#ckbSituacaoPrioritaria1").trigger("change");
    $('.modal_situacaoPrioritaria').val('');
    $('.modal_status').val(3);
    $('.modal_status').attr("disabled", "");
    $('.modal_dataDesligamento').val('');
    $('.modal_motivoDesligamento').val(0);
    $('.modal_encaminhamento').val(0);
    $('.modal_numeroGrupoTransferido').val(0);
    $('.modal_referenciadoCras').val(0);
    $('.modal_paifPaefi').val(0);
    $('.modal_possuiDeficiencia').val(0);
    $('.modal_tipoDeficiencia').val(0);
    $('.modal_responsavelFamilia').val('');
    $('.modal_nomeGenitora').val('');
    $('.modal_cep').val('');
    $('.modal_logradouro').val('');
    $('.modal_numeroEndereco').val('');
    $('.modal_vila').val('');
    $('.modal_bairro').val('');
    $('.modal_complementoEndereco').val('');
});
// #endregion

// #region CLICAR NO BOTÃO NOVA OSC
$('#novaOSC').click(function () {
    $("#staticBackdropLabel").text('Cadastro OSC');
    $(".modal_nomeOSC").val('');
    $(".modal_apelidoOSC").val('');
    $(".modal_inscricaoCMAS").val('');
    $('.modal_cnpj').val('');
    $('.modal_cep').val('');
    $('.modal_logradouro').val('');
    $('.modal_numeroEndereco').val('');
    $('.modal_bairro').val('');
    $('.modal_telefoneOSC').val('');
    $(".modal_site").val('');
    $('.modal_email').val('');
    $(".modal_CRAS").val(0);
    $('.modal_tecnicoReferenciaCras').val(0);
    $('.modal_nomePresidente').val('');
    $('.modal_telefonePresidente').val('');
    $('.modal_emailPresidente').val('');
    $('#novoGrupo').attr("disabled", "");
    $('#grupos').attr("disabled", "");
    $(".modal_nomeOSC").removeAttr("disabled");
    $(".modal_apelidoOSC").removeAttr("disabled");
    $(".modal_inscricaoCMAS").removeAttr("disabled");
    $('.modal_cnpj').removeAttr("disabled");
    $('.modal_cep').removeAttr("disabled");
    $('.modal_numeroEndereco').removeAttr("disabled");
    $('.modal_telefoneOSC').removeAttr("disabled");
    $(".modal_site").removeAttr("disabled");
    $('.modal_email').removeAttr("disabled");
    $(".modal_CRAS").removeAttr("disabled");
    $('.modal_tecnicoReferenciaCras').removeAttr("disabled");
    $('.modal_nomePresidente').removeAttr("disabled");
    $('.modal_telefonePresidente').removeAttr("disabled");
    $('.modal_emailPresidente').removeAttr("disabled");
    $('#salvarOSC').removeAttr("disabled");
    $('#modal_spanIdOSC').text('');
    
    
});
// #endregion
$('.modal_numeroGrupoTransferido').change(function () {
    if($(this).val()>0){
        if (confirm("Tem certeza que deseja transferir o atendido "+ $('.modal_nomeAtendido').val()+" para o grupo "+$(".modal_numeroGrupoTransferido option:selected").text()+"\n\nAperte OK para confirmar ou Cancelar para desistir") == true) {
            //alert("You pressed OK!\n"+$(this).val());
            $("#salvarAlteracao").trigger('click');
            var idAtendido =$("#idAtendido").text();
            var idGrupoNovo=$(".modal_numeroGrupoTransferido option:selected").val();
            $.ajax({
                url: 'transferirAtendidoGrupo.php',
                async: false,
                type: 'POST',
                data: { idAtendido: idAtendido, idGrupoNovo: idGrupoNovo},
                dataType: 'text',
                done: function () {
                    alert("feito");
                    console.log('feito');
                },
                success: function (resultado) {
                    if(resultado==1){
                        alert("Atendido transferido de grupo com sucesso!");
                    }
                    else{
                        alert("Erro ao transferir de grupo!");   
                        console.log(resultado);
                    }
                },
                fail: function (resultado) {
                    alert("falha");
                    console.log(resultado);
                },
                error: function (resultado) {
                    alert("error");
                    console.log(resultado);
                }
            });

        } else {
            $(".modal_numeroGrupoTransferido").val(0);
        }
    }

});
$('.oscUsuario').change(function () {
    if($(this).val()>0){
        $('.departamentoUsuario').val(0);
    }
});
$('.departamentoUsuario').change(function () {
    if($(this).val()>0){
        $('.oscUsuario').val(0);
    }
});
// #region BUSCAR DADOS DO GRUPO PARA PÁGINA ADMINISTRATIVA
$('.modal_Grupos').change(function () {
    if ($(this).val() == 0) {
        $('#editarGrupo').attr("style", "display:none;");
        $('#rb_comTermo').prop("checked", false);
        $('#rb_semTermo').prop("checked", false);
        $('.modal_nomeTecnicoOSC').val('');
        $('.modal_nomeGrupo').val('');
        $('.modal_faixaEtaria').val(0);
        $('#inlineCheckbox1').val(0);
        $('#inlineCheckbox2').val(0);
        $('#inlineCheckbox3').val(0);
        $('#inlineCheckbox4').val(0);
        $('#inlineCheckbox5').val(0);
        $('.modal_cargaHoraria').val('');
        $('.modal_enderecoExecucao').val('');
        $("input[type='checkbox']").prop("checked", false);
        $("input[type='checkbox']").attr("disabled", "");
        $('#rb_comTermo').attr("disabled", "");
        $('#rb_semTermo').attr("disabled", "");
        $('.modal_nomeTecnicoOSC').attr("disabled", "");
        $('.modal_nomeGrupo').attr("disabled", "");
        $('.modal_faixaEtaria').attr("disabled", "");
        $('#inlineCheckbox1').attr("disabled", "");
        $('#inlineCheckbox2').attr("disabled", "");
        $('#inlineCheckbox3').attr("disabled", "");
        $('#inlineCheckbox4').attr("disabled", "");
        $('#inlineCheckbox5').attr("disabled", "");
        $('.modal_cargaHoraria').attr("disabled", "");
        $('.modal_enderecoExecucao').attr("disabled", "");
        $('#salvarGrupo').attr("disabled", "");
        $('#staticBackdrop2Label').text("Visualizar Grupos");
    }
    else{
        $('#editarGrupo').removeAttr("style");
        $('#rb_comTermo').attr("disabled", "");
        $('#rb_semTermo').attr("disabled", "");
        $('.modal_nomeTecnicoOSC').attr("disabled", "");
        $('.modal_nomeGrupo').attr("disabled", "");
        $('.modal_faixaEtaria').attr("disabled", "");
        $('#inlineCheckbox1').attr("disabled", "");
        $('#inlineCheckbox2').attr("disabled", "");
        $('#inlineCheckbox3').attr("disabled", "");
        $('#inlineCheckbox4').attr("disabled", "");
        $('#inlineCheckbox5').attr("disabled", "");
        $('.modal_cargaHoraria').attr("disabled", "");
        $('.modal_enderecoExecucao').attr("disabled", "");
        $('#salvarGrupo').attr("disabled", "");
        $("input[type='checkbox']").attr("disabled", "");
        $('#staticBackdrop2Label').text("Visualizar Grupos");

        var idGrupo = $('.modal_Grupos') .val();
        var idOSC = $('#modal_spanIdOSC').text();
        $.ajax({
            url: 'buscarDadosGrupo.php',
            async: false,
            type: 'POST',
            data: { idOSC: idOSC, idGrupo: idGrupo},
            dataType: 'json',
            done: function () {
                alert("feito");
                console.log('feito');
            },
            success: function (resultado) {
                if(resultado.nomeGrupo===null){
                    $('.modal_nomeGrupo').val('');    
                }
                else{
                    $('.modal_nomeGrupo').val(resultado.nomeGrupo);
                }
                
                $('.modal_faixaEtaria').val(resultado.idFaixaEtaria);
                $('.modal_cargaHoraria').val(resultado.cargaHoraria);
                $('.modal_enderecoExecucao').val(resultado.enderecoExecucao);
                $('.modal_nomeTecnicoOSC').val(resultado.nomeTecnicoOsc);
                if(resultado.comSemTermo=="COM TERMO"){
                    $('#rb_comTermo').prop("checked", true);
                }
                else{
                    $('#rb_semTermo').prop("checked", true);
                }
                var arrayDiaDasemana = resultado.idsDiaSemana.split(";");
                $("input[type='checkbox']").prop("checked", false);
                arrayDiaDasemana.forEach(function (id) {
                    $("#ckbDiaSemana" + id).prop("checked", true);
                });
            },
            fail: function (resultado) {
                alert("falha");
                console.log(resultado);
            },
            error: function (resultado) {
                alert("error");
                console.log(resultado);
            }
        });
        
    }
    
});
//#endregion

// #region CLICAR NO BOTÃO GRUPOS
$('#grupos').click(function () {
    $('#rb_comTermo').attr("disabled", "");
    $('#rb_semTermo').attr("disabled", "");
    $('.modal_nomeTecnicoOSC').attr("disabled", "");
    $('.modal_nomeGrupo').attr("disabled", "");
    $('.modal_faixaEtaria').attr("disabled", "");
    $('#inlineCheckbox1').attr("disabled", "");
    $('#inlineCheckbox2').attr("disabled", "");
    $('#inlineCheckbox3').attr("disabled", "");
    $('#inlineCheckbox4').attr("disabled", "");
    $('#inlineCheckbox5').attr("disabled", "");
    $('.modal_cargaHoraria').attr("disabled", "");
    $('.modal_enderecoExecucao').attr("disabled", "");
    $('#salvarGrupo').attr("disabled", "");
    $('.modal_Grupos').val(0);
    
});
//#endregion

// #region CLICAR NO BOTÃO EDITAR GRUPO
$('#editarGrupo').click(function () {
    $('#rb_comTermo').removeAttr("disabled");
    $('#rb_semTermo').removeAttr("disabled");
    $('.modal_nomeTecnicoOSC').removeAttr("disabled");
    $('.modal_nomeGrupo').removeAttr("disabled");
    $('.modal_faixaEtaria').removeAttr("disabled");
    $('#inlineCheckbox1').removeAttr("disabled");
    $('#inlineCheckbox2').removeAttr("disabled");
    $('#inlineCheckbox3').removeAttr("disabled");
    $('#inlineCheckbox4').removeAttr("disabled");
    $('#inlineCheckbox5').removeAttr("disabled");
    $('.modal_cargaHoraria').removeAttr("disabled");
    $('.modal_enderecoExecucao').removeAttr("disabled");
    $('#salvarGrupo').removeAttr("disabled");
    $("input[type='checkbox']").removeAttr("disabled");
    $('#staticBackdrop2Label').text("Editar Grupo");
});
// #endregion

// #region CLICAR NO BOTÃO NOVO GRUPO
$('#novoGrupo').click(function () {
    $('#rb_comTermo').removeAttr("disabled");
    $('#rb_semTermo').removeAttr("disabled");
    $('.modal_nomeTecnicoOSC').removeAttr("disabled");
    $('.modal_nomeGrupo').removeAttr("disabled");
    $('.modal_faixaEtaria').removeAttr("disabled");
    $('#inlineCheckbox1').removeAttr("disabled");
    $('#inlineCheckbox2').removeAttr("disabled");
    $('#inlineCheckbox3').removeAttr("disabled");
    $('#inlineCheckbox4').removeAttr("disabled");
    $('#inlineCheckbox5').removeAttr("disabled");
    $('.modal_cargaHoraria').removeAttr("disabled");
    $('.modal_enderecoExecucao').removeAttr("disabled");
    $('#salvarGrupo').removeAttr("disabled");
    $('#staticBackdrop2Label').text("Novo Grupo");
    $('#editarGrupo').attr("style", "display:none;");
    $('.modal_Grupos').attr("style", "display:none;");
    $('#labelModal_grupos').attr("style", "display:none;");
    $("input[type='checkbox']").removeAttr("disabled");
    limparDadosGrupo();
});
// #endregion

function limparDadosGrupo(){
    $('#rb_comTermo').prop("checked", false);
    $('#rb_semTermo').prop("checked", false);
    $('.modal_nomeTecnicoOSC').val("");
    $('.modal_nomeGrupo').val("");
    $('.modal_faixaEtaria').val(0);
    $('#ckbDiaSemana1').prop("checked", false);
    $('#ckbDiaSemana2').prop("checked", false);
    $('#ckbDiaSemana3').prop("checked", false);
    $('#ckbDiaSemana4').prop("checked", false);
    $('#ckbDiaSemana5').prop("checked", false);
    $('.modal_cargaHoraria').val("");
    $('.modal_enderecoExecucao').val("");
}
// #region MUDANÇA NO COMBO STATUS
$('.modal_status').change(function () {
    if ($(this).val() == 5) {
        $(".modal_motivoDesligamento option:contains('ALTERAÇÃO DE GRUPO')").prop("selected", true);
        $(".modal_motivoDesligamento").removeAttr("disabled");
        $(".modal_dataDesligamento").removeAttr("disabled");
        $(".modal_numeroGrupoTransferido").removeAttr("disabled");
    }
    else {
        if ($(this).val() == 2) {
            $(".modal_motivoDesligamento").removeAttr("disabled");
            $(".modal_dataDesligamento").removeAttr("disabled");
            $(".modal_numeroGrupoTransferido").attr("disabled", "");
            $(".modal_motivoDesligamento option:contains('Selecione...')").prop("selected", true);
            $(".modal_numeroGrupoTransferido").val(0);

        }
        else {
            $(".modal_motivoDesligamento").attr("disabled", "");
            $(".modal_dataDesligamento").attr("disabled", "");
            $(".modal_numeroGrupoTransferido").attr("disabled", "");
            $(".modal_motivoDesligamento option:contains('Selecione...')").prop("selected", true);
            $(".modal_numeroGrupoTransferido").val(0);
            $(".modal_dataDesligamento").val('');

        }

    }
});
//#endregion

// #region MUDANÇA NO COMBO POSSUI DEFICIÊNCIA
$('.modal_possuiDeficiencia').change(function () {
    if ($(this).val() == 2) {
        $(".modal_tipoDeficiencia").removeAttr("disabled");
    }
    else {
        $(".modal_tipoDeficiencia").attr("disabled", "");
        $(".modal_tipoDeficiencia option:contains('Selecione...')").prop("selected", true);

    }
});
// #endregion

// #region VERIFICAÇÃO APÓS DIGITAR O CPF
$('.modal_cpf').blur(function () {
    if ($(this).val().length !=11) {
        alert('CPF ínválido');
        $(this).val('');
    }
    else{
        if(!validarCPF($(this).val())){
            alert("CPF inválido");
            $(this).val('');
        }        
    }
    
});
$('.modal_cpf').keyup(function () {
    $(this).val(LimparDeixarApenasNumeros($(this).val()));
});
// #endregion

$('.modal_nis').keyup(function () {
    $(this).val(LimparDeixarApenasNumeros($(this).val()));
});

$(".modal_dataNascimento").keyup(function () {
    $(this).val(LimparDeixarApenasNumerosEbarra($(this).val()));
    $(this).val(formatarData($(this).val()));
});

$(".modal_dataNascimento").blur(function () {
    if(!validarData($(this).val())){
        alert('Data inválida');
        $(this).val('');
    }
});
$(".modal_dataInclusao").blur(function () {
    if(!validarData($(this).val())){
        alert('Data inválida');
        $(this).val('');
    }
});
$(".modal_dataDesligamento").blur(function () {
    if(!validarData($(this).val())){
        alert('Data inválida');
        $(this).val('');
    }
});


$(".modal_dataInclusao").keyup(function () {
    $(this).val(LimparDeixarApenasNumerosEbarra($(this).val()));
    $(this).val(formatarData($(this).val()));
});
$(".modal_dataDesligamento").keyup(function () {
    $(this).val(LimparDeixarApenasNumerosEbarra($(this).val()));
    $(this).val(formatarData($(this).val()));
});

function formatarData(texto){
    var conteudo;
    if (texto.length == 2) {
        conteudo = texto;
        texto=conteudo + "/";
    }
    if (texto.length == 5) {
        conteudo = texto;
        texto=conteudo + "/";
    }
    return texto;
}
/*function validarData(texto){
    if(texto.length<10){
        alert('Data inválida. Digite a data completa dd/mm/aaaa');
        return '';
    }
    var dia;
    var mes;
    var ano;

    dia = parseInt(texto.substring(0,2));
    mes = parseInt(texto.substring(3,5));
    ano = parseInt(texto.substring(6,10));

    if(dia<=0 || mes<=0 || ano <=1900 || mes>12){
        alert('Data inválida.');
        return '';
    }
    switch(mes){
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
            if(dia>31){
                alert('Data inválida.');
                return '';
            }
        case 4: case 6: case 9: case 11:
            if(dia>30){
                alert('Data inválida.');
                return '';
            }
        case 2:
            if(ano%4==0 && ((ano%400==0) || (ano%100!=0))){
                if(dia>29){
                    alert('Data inválida.');
                    return '';
                }
            }
            else{
                if(dia>28){
                    alert('Data inválida.');
                    return '';
                }
            }
    }
}*/
$(".modal_cep").keyup(function () {
    var conteudo;
    if ($(this).val().length == 5) {
        conteudo = $(this).val();
        $(this).val(conteudo + "-");
    }
    $(this).val(LimparDeixarApenasNumerosEtraco($(this).val()));
});
$(".modal_telefone").keyup(function () {
    $(this).val(formatarTelefone($(this).val()));
    $(this).val(LimparTelefone($(this).val()));
});

$(".modal_nis").blur(function () {
    if ($(this).val().length !=11) {
        alert("NIS inválido");
        $(this).val('');
    }
    else{
        if(!validarNIS($(this).val())){
            alert("NIS inválido");
            $(this).val('');
        }
        
    }
});
function limparTexto(texto) {
    texto = texto.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    texto = texto.toUpperCase();
    texto = texto.replace(/'/g, '');
    return texto;
}
$('.modal_nomeAtendido').keyup(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_adultoParticipante').keyup(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_responsavelFamilia').keyup(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_nomeGenitora').keyup(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_numeroEndereco').keyup(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_complementoEndereco').keyup(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_nomeOSC').keyup(function () {
    $(this).val(limparTexto($(this).val()));
    $(this).val(LimparDeixarApenasLetrasEnumeros($(this).val()));
});
$('.modal_apelidoOSC').keyup(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_cnpj').keyup(function () {
    $(this).val(LimparDeixarApenasNumeros($(this).val()));
});

/*$('.modal_cep').keyup(function () {
    $(this).val(LimparDeixarApenasNumerosEtraco($(this).val()));
});*/
$('.modal_telefoneOSC').keyup(function () {
    $(this).val(formatarTelefone($(this).val()));
    $(this).val(LimparTelefone($(this).val()));
});
$('.modal_telefonePresidente').keyup(function () {
    $(this).val(formatarTelefone($(this).val()));
    $(this).val(LimparTelefone($(this).val()));
});
$('.modal_nomeTecnicoOSC').keyup(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_nomeGrupo').keyup(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_cargaHoraria').keyup(function () {
    $(this).val(deixarMaiusculo($(this).val()));
});
$('.modal_enderecoExecucao').keyup(function () {
    $(this).val(deixarMaiusculo($(this).val()));
});
$('.modal_nomePresidente').keyup(function () {
    $(this).val(limparTexto($(this).val()));
    $(this).val(LimparDeixarApenasLetrasEnumeros($(this).val()));
});

$('.modal_cnpj').blur(function () {
    if(!validarCNPJ($(this).val())){
        alert("CNPJ inválido");
        $('.modal_cnpj').val('');
    }
});

$('#imprimirGrupo').click(function () {
    var cabecalho="";
    var dados="";
    var rodape="";
    var meses = [
        "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", 
        "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
    ];
    var dataAtual = new Date();
    var nomeMes = meses[dataAtual.getMonth()];
    var ano = dataAtual.getFullYear();

    cabecalho= $('.nome_osc').val()+"|"+$('.numeroGrupo').val()+"|"+$('.diasSemana').val()+"|"+$('.faixaEtaria').val()+"|"+$('.nomeGrupo').val()+"|"+
               $('.chSemanal').val()+"|"+$('.cras_osc').val()+"|"+$('.tecnicoCras').val()+"|"+$('.localExecucao').val()+"|"+ nomeMes+"/"+ano;

    // Seleciona a tabela
    var tabela = document.getElementById("tabelaAtendidos");

    // Pega todas as linhas do corpo da tabela (tbody)
    var linhas = tabela.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    // Usa um for loop tradicional para percorrer as linhas
    for (var i = 0; i < linhas.length; i++) {
        if(linhas[i].getElementsByTagName("td")[15].innerText!= "EXCLUIR" && linhas[i].getElementsByTagName("td")[15].innerText!= "TRANSFERIDO"){
            console.log(dados);
            dados += linhas[i].getElementsByTagName("td")[3].innerText +"|"+ linhas[i].getElementsByTagName("td")[4].innerText +"|"+ 
                 linhas[i].getElementsByTagName("td")[5].innerText +"|"+ linhas[i].getElementsByTagName("td")[6].innerText +"|"+ 
                 linhas[i].getElementsByTagName("td")[14].innerText +"|"+ linhas[i].getElementsByTagName("td")[25].innerText+"|FIM|";
            console.log(dados);
        }
        
    }

    rodape=$('.totalAtendidos').val()+"|"+$('.comNIS').val()+"|"+$('.referenciadosCRAS').val()+"|"+$('.paifPaefi').val()+"|"+$('.foraSituacaoPrioritaria').val()+"|"+"|"+$('.situacaoPrioritaria').val()+"|"+
           $('.deficiencia').val()+"|"+$('.autismo').val()+"|"+$('.fisica').val()+"|"+$('.intelectual').val()+"|"+$('.mental').val()+"|"+"|"+$('.sensorial').val();

    $("#form-impressao input[name='cabecalho']").val(cabecalho);
    $("#form-impressao input[name='dados']").val(dados);
    $("#form-impressao input[name='rodape']").val(rodape);
    // Submete o formulário
    $("#form-impressao").submit();
});

$('#downloadExcel').click(function () {
    $("#form-excel input[name='nomeOSC']").val($('.nome_OSC').val());
    $("#form-excel input[name='nomeCRAS']").val($('.nomeCRAS').val());
    $("#form-excel").submit();
});
$('#downloadTodosExcel').click(function () {
    $("#form-todos-excel").submit();
});


function formatarTelefone(texto){
    var conteudo;
    var subConteudo;
    if (texto.length == 1) {
        conteudo = texto;
        texto="(" + conteudo;
    }
    if (texto.length == 3) {
        conteudo = texto;
        $(this).val(conteudo + ")");
        texto=conteudo + ")";
    }
    if (texto.length == 5) {
        conteudo = texto;
        subConteudo = conteudo.substring(0, 4);
        texto=subConteudo + " " + conteudo.substr(conteudo.length - 1);
    }
    if (texto.length == 9) {
        conteudo = texto;
        texto = conteudo + "-";
    }
    if (texto.length == 11) {
        conteudo = texto;
        if (conteudo.charAt(5) == 9) {
            conteudo = conteudo.replace(/-/, '');
            subConteudo = conteudo.substring(0, 10);
            texto=subConteudo + "-";
        }

    }
    return texto;
}

function deixarMaiusculo(texto){
    texto = texto.toUpperCase();
    return texto;
}

function LimparDeixarApenasNumeros(texto){
    const regex = /[^0-9]/g;
    const str = texto;
    const subst = '';

    const result = str.replace(regex, subst);
    return result;
}
function LimparTelefone(texto){
    const regex = /[^0-9-() ]/g;
    const str = texto;
    const subst = '';

    const result = str.replace(regex, subst);
    return result;
}
function LimparDeixarApenasNumerosEtraco(texto){
    const regex = /[^0-9-]/g;
    const str = texto;
    const subst = '';

    const result = str.replace(regex, subst);
    return result;
}
function LimparDeixarApenasNumerosEbarra(texto){
    const regex = /[^0-9\/]/g;
    const str = texto;
    const subst = '';

    const result = str.replace(regex, subst);
    return result;
}
function LimparDeixarApenasLetrasEnumeros(texto){
    const regex = /[^0-9-^a-z-^A-Z ]/g;
    const str = texto;
    const subst = '';

    const result = str.replace(regex, subst);
    return result;
}

// #region CLICAR NO BOTÃO SALVAR DO MODAL
$("#salvarAlteracao").click(function () {
    var resultadoAlteracaoDadosAtendido = 0;
    var resultadoAlteracaoConteudoGrupo = 0;
    var resultadoCadastroAtendido;
    var resultadoCadastroConteudogrupo;
    var table = $("table tbody");
    var erros = 0;
    var titulo = $(".modal-title").text();
    var tds = '';
    var tabela_idAtendido = '';
    var tabela_idAtendidoNoGrupo = '';
    var tabela_seqAtendido = '';
    var nome = '';
    var nis = '';
    var cpf = '';
    var nascimento = '';
    var telefone = '';
    var adultoParticipante = '';
    var grauParentesco = '';
    var dataNascimento = '';
    var corRaca = '';
    var dataInclusao = '';
    var situacoesPrioritarias = '';
    var status = '';
    var referenciadoCras = '';
    var paifPaefi = '';
    var dataDesligamento = '';
    var motivoDesligamento = '';
    var encaminhamento = '';
    var numeroGrupoTransferido = '';
    var possuiDeficiencia = '';
    var tipoDeficiencia = '';
    var responsavelFamilia = '';
    var nomeGenitora = '';
    var idCEP = '';
    var numeroEndereco = '';
    var complementoEndereco = '';
    var faixaEtaria = '';

    // #region VALIDAÇÕES DE FALTA DE PREENCHIMENTO
    if ($('.modal_nomeAtendido').val() == '') {
        $('.modal_nomeAtendido').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_nomeAtendido').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_cpf').val() == '') {
        $('.modal_cpf').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_cpf').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_telefone').val() == '') {
        $('.modal_telefone').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_telefone').css({ border: '1px solid #dee2e6' });
    }
    if (parseInt($('.faixaEtaria').val().substring(0, 2)) == 0) {
        if ($('..modal_adultoParticipante').val() == '') {
            $('.modal_adultoParticipante').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_adultoParticipante').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_grauParentesco').val() == 0) {
            $('.modal_grauParentesco').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_grauParentesco').css({ border: '1px solid #dee2e6' });
        }
    }
    if ($('.modal_dataNascimento').val() == '') {
        $('.modal_dataNascimento').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_dataNascimento').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_corRaca').val() == 0) {
        $('.modal_corRaca').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_corRaca').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_dataInclusao').val() == '') {
        $('.modal_dataInclusao').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_dataInclusao').css({ border: '1px solid #dee2e6' });
    }

    var ids = ""; // Variável para armazenar os IDs
    // Percorre todas as checkboxes
    $("input[type='checkbox']").each(function () {
        // Verifica se a checkbox está marcada
        if ($(this).is(":checked")) {
            // Adiciona o ID da checkbox à variável
            ids += $(this).attr("id") + ";";
        }
    });
    ids = ids.replace(/ckbSituacaoPrioritaria/g, "");
    // Define o conteúdo do span oculto como a variável ids
    $("#situacoesPrioritarias").text(ids);

    if ($('#situacoesPrioritarias').text() == '') {
        $('#campoSituacoesPrioritarias').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('#campoSituacoesPrioritarias').css({ border: 'none' });
    }

    if ($('.modal_status').val() == 0) {
        $('.modal_status').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_status').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_referenciadoCras').val() == 0) {
        $('.modal_referenciadoCras').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_referenciadoCras').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_paifPaefi').val() == 0) {
        $('.modal_paifPaefi').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_paifPaefi').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_status').val() == 2) {
        if ($('.modal_dataDesligamento').val() == '') {
            $('.modal_dataDesligamento').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_dataDesligamento').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_motivoDesligamento').val() == 0) {
            $('.modal_motivoDesligamento').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_motivoDesligamento').css({ border: '1px solid #dee2e6' });
        }
    }
    if ($('.modal_status').val() == 5) {
        if ($('.modal_dataDesligamento').val() == '') {
            $('.modal_dataDesligamento').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_dataDesligamento').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_motivoDesligamento').val() == 0) {
            $('.modal_motivoDesligamento').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_motivoDesligamento').css({ border: '1px solid #dee2e6' });
        }
        if ($('.modal_numeroGrupoTransferido').val() == 0) {
            $('.modal_numeroGrupoTransferido').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_numeroGrupoTransferido').css({ border: '1px solid #dee2e6' });
        }
    }
    if ($('.modal_encaminhamento').val() == 0) {
        $('.modal_encaminhamento').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_encaminhamento').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_possuiDeficiencia').val() == 0) {
        $('.modal_possuiDeficiencia').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_possuiDeficiencia').css({ border: '1px solid #dee2e6' });
        if ($('.modal_possuiDeficiencia').val() == 2 && $('.modal_tipoDeficiencia').val() == 0) {
            $('.modal_tipoDeficiencia').css({ border: '2px solid red' });
            erros += 1;
        }
        else {
            $('.modal_tipoDeficiencia').css({ border: '1px solid #dee2e6' });
        }
    }
    if ($('.modal_responsavelFamilia').val() == '') {
        $('.modal_responsavelFamilia').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_responsavelFamilia').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_nomeGenitora').val() == '') {
        $('.modal_nomeGenitora').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_nomeGenitora').css({ border: '1px solid #dee2e6' });
    }
    if ($('.modal_cep').val() == '') {
        $('.modal_cep').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_cep').css({ border: '1px solid #dee2e6' });
        if ($('.modal_logradouro').val() == '') {
            $('#buscarCEP').css({ border: '3px solid red' });
            erros += 1;
        }
        else {
            $('#buscarCEP').css({ border: '1px solid #0d6efd' });
        }
    }
    if ($('.modal_numeroEndereco').val() == '') {
        $('.modal_numeroEndereco').css({ border: '2px solid red' });
        erros += 1;
    }
    else {
        $('.modal_numeroEndereco').css({ border: '1px solid #dee2e6' });
    }

    if (erros > 0) {
        alert("Estão faltando alguns dados obrigatórios.\nVerifique os campos destacados em vermelho");
        return false;
    }
    // #endregion

    // #region SALVAR EDIÇÃO DO ATENDIDO
    if (titulo == "Editar Atendido") {
        table.find('tr').each(function (i) {
            tds = $(this).find('td');
            tabela_idAtendido = tds.eq(1).text();
            tabela_idAtendidoNoGrupo = tds.eq(2).text();
            tabela_seqAtendido = tds.eq(3).text();
            if (tabela_seqAtendido == $('#SeqAtendido').text()) {
                if (tabela_idAtendidoNoGrupo == $('#idAtendidoNoGrupo').text() && tabela_idAtendido == $('#idAtendido').text()) {

                    nome = $('.modal_nomeAtendido').val();
                    nis = $('.modal_nis').val();
                    cpf = $('.modal_cpf').val();
                    nascimento = $('.modal_dataNascimento').val();
                    $.ajax({
                        url: 'editarDadosAtendido.php',
                        async: false,
                        type: 'POST',
                        data: { nome: nome, nis: nis, cpf: cpf, idAtendido: $('#idAtendido').text(), nascimento: nascimento },
                        dataType: 'text',
                        done: function () {
                            alert("feito");
                            console.log('feito');
                        },
                        success: function (resultado) {
                            resultadoAlteracaoDadosAtendido = resultado;
                            console.log('Alteração dados atendido: ' + resultado);
                        },
                        fail: function () {
                            alert("falha");
                            console.log('falha');
                        },
                        error: function () {
                            alert("error");
                            console.log('erro');
                        }
                    });

                    telefone = $('.modal_telefone').val();
                    adultoParticipante = $('.modal_adultoParticipante').val();
                    grauParentesco = $('.modal_grauParentesco').val();
                    dataNascimento = $('.modal_dataNascimento').val();
                    corRaca = $('.modal_corRaca').val();
                    dataInclusao = $('.modal_dataInclusao').val();
                    situacoesPrioritarias = $('#situacoesPrioritarias').text();
                    status = $('.modal_status').val();
                    referenciadoCras = $('.modal_referenciadoCras').val();
                    paifPaefi = $('.modal_paifPaefi').val();
                    dataDesligamento = $('.modal_dataDesligamento').val();
                    motivoDesligamento = $('.modal_motivoDesligamento').val();
                    encaminhamento = $('.modal_encaminhamento').val();
                    numeroGrupoTransferido = $('.modal_numeroGrupoTransferido').val();
                    possuiDeficiencia = $('.modal_possuiDeficiencia').val();
                    tipoDeficiencia = $('.modal_tipoDeficiencia').val();
                    responsavelFamilia = $('.modal_responsavelFamilia').val();
                    nomeGenitora = $('.modal_nomeGenitora').val();
                    idCEP = $('#idCEP').text();
                    numeroEndereco = $('.modal_numeroEndereco').val();
                    complementoEndereco = $('.modal_complementoEndereco').val();
                    faixaEtaria = parseInt($('.faixaEtaria').val().substring(0, 2));
                    $.ajax({
                        url: 'editarConteudoGrupo.php',
                        async: false,
                        type: 'POST',
                        data: {
                            telefone: telefone,
                            adultoParticipante: adultoParticipante,
                            grauParentesco: grauParentesco,
                            dataNascimento: dataNascimento,
                            corRaca: corRaca,
                            dataInclusao: dataInclusao,
                            situacoesPrioritarias: situacoesPrioritarias,
                            status: status,
                            referenciadoCras: referenciadoCras,
                            paifPaefi: paifPaefi,
                            dataDesligamento: dataDesligamento,
                            motivoDesligamento: motivoDesligamento,
                            encaminhamento: encaminhamento,
                            numeroGrupoTransferido: numeroGrupoTransferido,
                            possuiDeficiencia: possuiDeficiencia,
                            tipoDeficiencia: tipoDeficiencia,
                            responsavelFamilia: responsavelFamilia,
                            nomeGenitora: nomeGenitora,
                            idCEP: idCEP,
                            numeroEndereco: numeroEndereco,
                            complementoEndereco: complementoEndereco,
                            id: $('#idAtendidoNoGrupo').text(),
                            faixaEtaria: faixaEtaria
                        },
                        dataType: 'text',
                        done: function () {
                            alert("feito");
                        },
                        success: function (resultado) {
                            resultadoAlteracaoConteudoGrupo = resultado;
                            console.log('Alteração dados grupo: ' + resultado);
                        },
                        fail: function () {
                            alert("falha");
                        },
                        error: function () {
                            alert("error");
                        }
                    });

                }
                else {
                    alert('Não é possível realizar a alteração!');
                    return false;
                }
                return false;
            }
        });
        if (resultadoAlteracaoDadosAtendido == 1 && resultadoAlteracaoConteudoGrupo == 0) {
            alert('Nome, NIS e CPF do atendido foram atualizados. Os demais dados não puderam ser salvos.')
        }
        else if (resultadoAlteracaoDadosAtendido == 0 && resultadoAlteracaoConteudoGrupo == 1) {
            alert('A maioria dos dados do atendido puderam ser atualizados. Mas, infelizmente, o nome, NIS e CPF não puderam ser salvos.')
        }
        else if (resultadoAlteracaoDadosAtendido == 0 && resultadoAlteracaoConteudoGrupo == 0) {
            alert('Os dados não foram atualizados.')
        }
        else if (resultadoAlteracaoDadosAtendido == 1 && resultadoAlteracaoConteudoGrupo == 1) {
            alert('Os dados foram atualizados com sucesso!.');
            $('[aria-label="Close"]').click();
            history.go(0);
        }
    }
    // #endregion

    // #region SALVAR CADASTRO DE NOVO ATENDIDO
    else {
        nome = $('.modal_nomeAtendido').val();
        nis = $('.modal_nis').val();
        cpf = $('.modal_cpf').val();
        nascimento = $('.modal_dataNascimento').val();
        $.ajax({
            url: 'cadastrarDadosAtendido.php',
            async: false,
            type: 'POST',
            data: { nome: nome, nis: nis, cpf: cpf, nascimento: nascimento },
            dataType: 'text',
            done: function () {
                alert("feito");
                console.log('feito');
            },
            success: function (resultado) {
                resultadoCadastroAtendido=parseInt(resultado);
                console.log('Cadastro atendido: ' + resultado);
            },
            fail: function () {
                alert("falha");
                console.log('falha');
            },
            error: function () {
                alert("error");
                console.log('erro');
            }
        });
        if(resultadoCadastroAtendido>0){
            telefone = $('.modal_telefone').val();
            adultoParticipante = $('.modal_adultoParticipante').val();
            grauParentesco = $('.modal_grauParentesco').val();
            dataNascimento = $('.modal_dataNascimento').val();
            corRaca = $('.modal_corRaca').val();
            dataInclusao = $('.modal_dataInclusao').val();
            situacoesPrioritarias = $('#situacoesPrioritarias').text();
            status = $('.modal_status').val();
            referenciadoCras = $('.modal_referenciadoCras').val();
            paifPaefi = $('.modal_paifPaefi').val();
            dataDesligamento = $('.modal_dataDesligamento').val();
            motivoDesligamento = $('.modal_motivoDesligamento').val();
            encaminhamento = $('.modal_encaminhamento').val();
            numeroGrupoTransferido = $('.modal_numeroGrupoTransferido').val();
            possuiDeficiencia = $('.modal_possuiDeficiencia').val();
            tipoDeficiencia = $('.modal_tipoDeficiencia').val();
            responsavelFamilia = $('.modal_responsavelFamilia').val();
            nomeGenitora = $('.modal_nomeGenitora').val();
            idCEP = $('#idCEP').text();
            numeroEndereco = $('.modal_numeroEndereco').val();
            complementoEndereco = $('.modal_complementoEndereco').val();
            faixaEtaria = parseInt($('.faixaEtaria').val().substring(0, 2));
            idGrupo = $('#idGrupo').text();
            $.ajax({
                url: 'cadastrarConteudoGrupo.php',
                async: false,
                type: 'POST',
                data: {
                    telefone: telefone,
                    adultoParticipante: adultoParticipante,
                    grauParentesco: grauParentesco,
                    dataNascimento: dataNascimento,
                    corRaca: corRaca,
                    dataInclusao: dataInclusao,
                    situacoesPrioritarias: situacoesPrioritarias,
                    status: status,
                    referenciadoCras: referenciadoCras,
                    paifPaefi: paifPaefi,
                    dataDesligamento: dataDesligamento,
                    motivoDesligamento: motivoDesligamento,
                    encaminhamento: encaminhamento,
                    numeroGrupoTransferido: numeroGrupoTransferido,
                    possuiDeficiencia: possuiDeficiencia,
                    tipoDeficiencia: tipoDeficiencia,
                    responsavelFamilia: responsavelFamilia,
                    nomeGenitora: nomeGenitora,
                    idCEP: idCEP,
                    numeroEndereco: numeroEndereco,
                    complementoEndereco: complementoEndereco,
                    faixaEtaria: faixaEtaria,
                    idAtendido: resultadoCadastroAtendido,
                    idGrupo:idGrupo
                },
                dataType: 'text',
                done: function () {
                    alert("feito");
                },
                success: function (resultado) {
                    resultadoCadastroConteudogrupo = parseInt(resultado);
                    console.log('Cadastro dados grupo: ' + resultado);
                },
                fail: function () {
                    alert("falha");
                },
                error: function () {
                    alert("error");
                }
            });
            if (resultadoCadastroAtendido > 0 && resultadoCadastroConteudogrupo == 0) {
                alert('Nome, NIS e CPF do atendido foram cadastrados. Os demais dados não puderam ser salvos.')
            }
            else if (resultadoCadastroAtendido > 0 && resultadoCadastroConteudogrupo == 1) {
                alert('Os dados foram cadastrados com sucesso!.');
                $('[aria-label="Close"]').click();
                history.go(0);
            }
        }
        else{
            alert("Não foi possível cadastrar o novo atendido.");
            //fazer o código para deletar o atendido que foi cadastrado
        }
        
    }
    // #endregion
});
// #endregion

// #region VALIDAR CNPJ
function validarCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado1 = soma % 11 < 2 ? 0 : 11 - soma % 11;
    //if (resultado != digitos.charAt(0))
    //    return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado2 = soma % 11 < 2 ? 0 : 11 - soma % 11;
    digitosEncontrados=resultado1.toString()+resultado2.toString();
    digitosDigitados=cnpj.substring(12, 14);
    if (digitosEncontrados != digitosDigitados){
        return false;
    } 
    else{
        return true;
    }    
}
// #endregion

// #region VALIDAR CPF
function validarCPF(strCPF) {
    var soma;
    var resto1;
    var resto2;
    var digitosEncontrados;
    var digitosDigitados;
    soma = 0;
    if(strCPF == "00000000000" || strCPF == "11111111111" || strCPF == "22222222222" || strCPF == "33333333333" || strCPF == "44444444444" || strCPF == "55555555555" ||
      strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "99999999999" ) {
        return false;
    }

    for (i=1; i<=9; i++) soma = soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
    resto1 = (soma * 10) % 11;

    if ((resto1 == 10) || (resto1 == 11))  resto1 = 0;
    //if (resto != parseInt(strCPF.substring(9, 10)) ) return false;

    soma = 0;
    for (i = 1; i <= 10; i++) soma = soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    resto2 = (soma * 10) % 11;

    if ((resto2 == 10) || (resto2 == 11))  resto2 = 0;
    digitosEncontrados=resto1.toString()+resto2.toString();
    digitosDigitados=strCPF.substring(9, 11);
    if (digitosEncontrados != digitosDigitados){
        return false;
    } 
    else{
        return true;
    }
    
}
// #endregion

// #region VALIDAR NIS
function validarNIS(nis) {
    var multiplicadorBase = "3298765432";
    var total = 0;
    var resto = 0;
    var multiplicando = 0;
    var multiplicador = 0;
    var digito = 99;
    
    // Retira a mascara
    var numeroNIS = nis.replace(/[^\d]+/g, '');

    if (numeroNIS.length !== 11 || 
        numeroNIS === "00000000000" || 
        numeroNIS === "11111111111" || 
        numeroNIS === "22222222222" || 
        numeroNIS === "33333333333" || 
        numeroNIS === "44444444444" || 
        numeroNIS === "55555555555" || 
        numeroNIS === "66666666666" || 
        numeroNIS === "77777777777" || 
        numeroNIS === "88888888888" || 
        numeroNIS === "99999999999") {
        return false;
    } else {
        for (var i = 0; i < 10; i++) {
            multiplicando = parseInt( numeroNIS.substring( i, i + 1 ) );
            multiplicador = parseInt( multiplicadorBase.substring( i, i + 1 ) );
            total += multiplicando * multiplicador;
        }

        resto = 11 - total % 11;
        resto = resto === 10 || resto === 11 ? 0 : resto;

        digito = parseInt("" + numeroNIS.charAt(10));
        if (resto != digito){
            return false;
        }
        return true;
    }
}
// #endregion

// #region VALIDAR DATA
function validarData(data) {
    // Expressão regular para verificar o formato dd/MM/yyyy
    var pattern = /^(\d{2})\/(\d{2})\/(\d{4})$/;

    // Verifica se a data está no formato correto
    if (!pattern.test(data)) {
        return false;
    }

    // Divide a data em dia, mês e ano
    var parts = data.split('/');
    var dia = parseInt(parts[0], 10);
    var mes = parseInt(parts[1], 10);
    var ano = parseInt(parts[2], 10);

    // Verifica se os valores são válidos
    if (mes < 1 || mes > 12) {
        return false; // Mês inválido
    }
    if (dia < 1 || dia > 31) {
        return false; // Dia inválido
    }
    if(ano<1900){
        return false; // Ano inválido
    }

    // Verifica a validade dos dias por mês
    var diasPorMes = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    // Verifica se o ano é bissexto e ajusta o número de dias de fevereiro
    if (ano % 4 === 0 && (ano % 100 !== 0 || ano % 400 === 0)) {
        diasPorMes[1] = 29; // Fevereiro tem 29 dias em anos bissextos
    }

    // Verifica se o dia é válido para o mês específico
    if (dia > diasPorMes[mes - 1]) {
        return false;
    }

    return true;
}
// #endregion

// #region BUSCAR ENDEREÇO PELO CEP
$('#buscarCEP').click(function () {
    var cep = $('.modal_cep').val();
    if(cep!=''){
        $.ajax({
            url: 'buscaCEP.php', // URL da sua página PHP para processar a requisição
            method: 'POST', // Método da requisição (GET ou POST)
            data: { cep: cep }, // Dados a serem enviados para a página PHP
            dataType: 'json', // Tipo de dados esperado na resposta (JSON neste caso)
            success: function (data) {
                if (data.status == 'sucesso') {
                    $("#idCEP").text(data.id);
                    $('.modal_logradouro').val(data.logradouro);
                    $('.modal_vila').val(data.vila);
                    $('.modal_bairro').val(data.bairro);
                }
                else {
                    $("#idCEP").text('');
                    $('.modal_logradouro').val('');
                    $('.modal_vila').val('');
                    $('.modal_bairro').val('');
                    alert('CEP não localizado.\nVerifique o CEP e digite no formato 00000-000');
                }
            },
            error: function (xhr, status, error) {
                console.log(error); // Se houver um erro na requisição AJAX, exibe no console do navegador
            }
        });
    }
    else{
        $("#idCEP").text('');
        $('.modal_logradouro').val('');
        $('.modal_vila').val('');
        $('.modal_bairro').val('');
    }
    
});
//#endregion

// #region PREENCHER A TECNICA DO CRAS QUANDO O CRAS FOR ALTERADO
$('.modal_CRAS').change(function () {
    var idCRAS = $(this).val();
    $('.modal_tecnicoReferenciaCras').find('option').remove().end().append('<option value="0">Selecione...</option>')

    $.ajax({
        url: 'buscarTecnicoCras.php', // URL da sua página PHP para processar a requisição
        method: 'POST', // Método da requisição (GET ou POST)
        data: { idCRAS: idCRAS }, // Dados a serem enviados para a página PHP
        dataType: 'json', // Tipo de dados esperado na resposta (JSON neste caso)
        success: function (resultado) {
            var selectTecnicos = $('.modal_tecnicoReferenciaCras');
            for (var i = 0; i < resultado.length; i++) {
                var tecnico = resultado[i];
                var option = document.createElement('option');
                option.value = tecnico.id;
                option.text = tecnico.nome;
                selectTecnicos.append(option);
            }
        }
    });
});
//#endregion

// #region BUSCAR ENDEREÇO PELO ID DO CEP
function buscarCEPpeloID() {
    var idCep = $('#idCEP').text();
    if(idCep!=''){
        $.ajax({
            url: 'buscaIdCEP.php', // URL da sua página PHP para processar a requisição
            method: 'POST', // Método da requisição (GET ou POST)
            data: { idCep: idCep }, // Dados a serem enviados para a página PHP
            dataType: 'json', // Tipo de dados esperado na resposta (JSON neste caso)
            success: function (data) {
                if (data.status == 'sucesso') {
                    $('.modal_cep').val(data.numeroCEP);
                    $('.modal_logradouro').val(data.logradouro);
                    $('.modal_vila').val(data.vila);
                    $('.modal_bairro').val(data.bairro);
                }
                else {
                    $(".modal_cep").val('');
                    $('.modal_logradouro').val('');
                    $('.modal_vila').val('');
                    $('.modal_bairro').val('');
                    alert('Endereço não localizado');
                }
            },
            error: function (xhr, status, error) {
                console.log(error); // Se houver um erro na requisição AJAX, exibe no console do navegador
            }
        });
    }
    
}
//#endregion

/*function imprimirSI(){
    window.location.href = "impressaoSI.php";
}

$(document).ready(function() {
    $(document).on('click', '.excluir', function() {
        $(this).closest('tr').remove();
     });
     $(document).on('click', '.escolherEndereco', function() {
        var linhaSelecionada = $(this).closest('tr');
        var primeiroTD = "";
        var segundoTD = "";
        $.each(linhaSelecionada , function() {
            primeiroTD = $(this).find('td:first');
            segundoTD = $(this).find('td:eq(1)');
          });
        $('#logradouro').val(primeiroTD.text());
        $('#bairro').val(segundoTD.text());
        $("#numEndereco").removeAttr("disabled");
        $('#fecharModal').click();
    });
    $(document).on('click', '.escolherSI', function() {
        var linhaSelecionada = $(this).closest('tr');
        var primeiroTD = "";
        var siNumeroAno;
        console.log("linha selecionada "+linhaSelecionada);
        $.each(linhaSelecionada , function() {
            primeiroTD = $(this).find('td:first');
            siNumeroAno = primeiroTD.text().split("/");
            //segundoTD = $(this).find('td:eq(1)');
        });

        $.ajax({
            url: 'trazInfoSI.php',
            async:false,
            type: 'POST',
            data: {idSI:siNumeroAno[0],
                   anoSI:siNumeroAno[1]},
            dataType:'text',
            done: function () {
                alert("feito");
            },
            success: function (resultado) {
                //console.log("resultado " + resultado);
                var retorno = resultado.split('|');
                //console.log("retorno " + retorno);
                if (Array.isArray(retorno)){
                    if(retorno[0]>0){
                        $('#siNumero').val(retorno[0]);
                        $('#siData').val(retorno[1].substring(0,10));
                        $('#resp01 option:contains("'+$.trim(retorno[3])+'")').prop('selected', true);
                        $('#resp02 option:contains("'+$.trim(retorno[4])+'")').prop('selected', true);
                        $('#destino option:contains("'+$.trim(retorno[5])+'")').prop('selected', true);
                        $('#solicitante').val(retorno[6]);
                        $('#assunto').val(retorno[7]);
                        $('#logradouro').val(retorno[8]);
                        $('#numEndereco').val(retorno[9]);
                        $('#bairro').val(retorno[10]);
                        $('#obs').val(retorno[11]);
                        $('#anotacoes').val(retorno[12]);
                        if(retorno[2]=="URGENCIAR"){
                            document.getElementById("urgente").checked=true;
                        }
                        else if(retorno[2]=="PRIORIZAR"){
                            document.getElementById("priorizar").checked=true;
                        }
                        else if(retorno[2]=="NORMAL"){
                            document.getElementById("normal").checked=true;
                        }
                        $('#fecharModalPesquisa').click();
                        if(retorno[13]===document.getElementById("iniciais").innerText){
                            //desbloquearAlteracaoSI();
                            alert("Mesmo usuário da criação");
                        }
                        else{
                            alert("Não é o mesmo usuário da criação");
                        }
                    }
                    else{
                        console.log("primeiro item não é >0 = " + retorno);
                        alert("Erro ao pesquisar a SI. Verifique o console");
                    }
                }
                else{
                    console.log("retorno não é um array = " + retorno);
                    alert("Erro ao pesquisar a SI. Verifique o console");
                }
            },
            fail: function(){
                alert("falha");
            },
            error: function(){
                alert("error");
            }
        });
        $('#fecharModalPesquisa').click();
    });
});*/