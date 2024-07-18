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
        $('#modal_grupos').removeAttr("style");
        $('#labelModal_grupos').removeAttr("style");
    });
    // #endregion

    // #region BOTÃO NOVO GRUPOS
    $("#novoGrupo").click(function () {
        $('#modal_grupos').attr("style", "display:none;");
        $('#labelModal_grupos').attr("style", "display:none;");
    });
    // #endregion
    novoGrupo
    // #region VISUALIZAR OSC
    $(".visualizarOSC").click(function () {
        var idOSC = $(this).closest("tr").find(".idOSC").text();
        $(".modal-title").text('Editar OSC');
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
                    $('.modal_tecnicoReferenciaCras').val(data.idTecnicoCRAS);
                    $('.modal_nomePresidente').val(data.nomePresidente);
                    $('.modal_telefonePresidente').val(data.telefonePresidente);
                    $('.modal_emailPresidente').val(data.emailPresidente);
                }
                else {
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
    });
    // #endregion

    // #region EDITAR OSC
    $(".editarOSC").click(function () {
        var idOSC = $(this).closest("tr").find(".idOSC").text();
        $(".modal-title").text('Editar OSC');
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
                    $('.modal_nomeOSC').val(data.nomeOSC);
                    $('.modal_apelidoOSC').val(data.apelidoOSC);
                    $('.modal_inscricaoCMAS').val(data.inscricaoCMAS);
                    $('.modal_cnpj').val(data.cnpj);
                    $('#idCEP').text(data.id);
                    $('#buscarCEP').click();
                    $('.modal_numeroEndereco').val(data.numeroEndereco);
                    $('.modal_telefoneOSC').val(data.telefone);
                    $('.modal_site').val(data.site);
                    $('.modal_email').val(data.email);
                    $('.modal_CRAS').val(data.idCRAS);
                    $('.modal_tecnicoReferenciaCras').val(data.idTecnicoCRAS);
                    $('.modal_nomePresidente').val(data.nomePresidente);
                    $('.modal_telefonePresidente').val(data.telefonePresidente);
                    $('.modal_emailPresidente').val(data.emailPresidente);
                }
                else {
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
        //$('.modal_numeroGrupoTransferido').val(numeroGrupoTransferido);
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
    $(".modal_nomeOSC").text('');
    $(".modal_apelidoOSC").text('');
    $(".modal_inscricaoCMAS").text('');
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
});
// #endregion

// #region MUDANÇA NO COMBO GRUPO
$('.modal_Grupos').change(function () {
    if ($(this).val() == 0) {
        $('#editarGrupo').attr("style", "display:none;");
    }
    else{
        $('#editarGrupo').removeAttr("style");
    }
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
});
// #endregion

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
$('.modal_cpf').change(function () {
    if ($(this).val().length > 3) {
        //alert('cpf digitado');
    }
});
// #endregion

$(".modal_dataNascimento").keyup(function () {
    var conteudo;
    if ($(this).val().length == 2) {
        conteudo = $(this).val();
        $(this).val(conteudo + "/");
    }
    if ($(this).val().length == 5) {
        conteudo = $(this).val();
        $(this).val(conteudo + "/");
    }
});
$(".modal_dataInclusao").keyup(function () {
    var conteudo;
    if ($(this).val().length == 2) {
        conteudo = $(this).val();
        $(this).val(conteudo + "/");
    }
    if ($(this).val().length == 5) {
        conteudo = $(this).val();
        $(this).val(conteudo + "/");
    }
});
$(".modal_dataDesligamento").keyup(function () {
    var conteudo;
    if ($(this).val().length == 2) {
        conteudo = $(this).val();
        $(this).val(conteudo + "/");
    }
    if ($(this).val().length == 5) {
        conteudo = $(this).val();
        $(this).val(conteudo + "/");
    }
});
$(".modal_cep").keyup(function () {
    var conteudo;
    if ($(this).val().length == 5) {
        conteudo = $(this).val();
        $(this).val(conteudo + "-");
    }
});
$(".modal_telefone").keyup(function () {
    var conteudo;
    var subConteudo;
    if ($(this).val().length == 1) {
        conteudo = $(this).val();
        $(this).val("(" + conteudo);
    }
    if ($(this).val().length == 3) {
        conteudo = $(this).val();
        $(this).val(conteudo + ")");
    }
    if ($(this).val().length == 5) {
        conteudo = $(this).val();
        subConteudo = conteudo.substring(0, 4);
        $(this).val(subConteudo + " " + conteudo.substr(conteudo.length - 1));
    }
    if ($(this).val().length == 9) {
        conteudo = $(this).val();
        $(this).val(conteudo + "-");
    }
    if ($(this).val().length == 11) {
        conteudo = $(this).val();
        if (conteudo.charAt(5) == 9) {
            conteudo = conteudo.replace(/-/, '');
            subConteudo = conteudo.substring(0, 10);
            $(this).val(subConteudo + "-");
        }

    }
});
$('.modal_nis').change(function () {
    //alert('cpf digitado');
});
function limparTexto(texto) {
    texto = texto.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    texto = texto.toUpperCase();
    texto = texto.replace(/'/g, '');
    return texto;
}
$('.modal_nomeAtendido').change(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_adultoParticipante').change(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_responsavelFamilia').change(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_nomeGenitora').change(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_numeroEndereco').change(function () {
    $(this).val(limparTexto($(this).val()));
});
$('.modal_complementoEndereco').change(function () {
    $(this).val(limparTexto($(this).val()));
});

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
            /*verificar todo o salvamento do conteudo_grupo. Parece que nenhum campo está sendo salvo*/
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