/* JS - Msg de Alertas para suporte */

$(".viewDivFormAlertaSuporte").hide();

var checagemOLT;
var checagemCDR;
var checagemRamal;
var checagemCaixaRamal;

$("#btnNovoAlerta").click(function () {
    if ( $( ".viewDivFormAlertaSuporte" ).first().is( ":hidden" ) ) {
        $(".viewDivFormAlertaSuporte").slideDown( "slow" );
        $(".viewDivListAlertaSuporte").hide();
        $("#btnNovoAlerta").text("Listar Alertas");
    } else {
        $(".viewDivFormAlertaSuporte").hide();
        $(".viewDivListAlertaSuporte").show();
        $("#btnNovoAlerta").text("Novo Alertas");
    }    
});

window.addEventListener("load", function (event) { 
    
    var dataInicial;
    var dataFim;
    var resultDataInicial;
    var resultDatas;
    
    /* ----------------------------------------------- */
    /* Validando Horarios de Cadastros do Alerta */
    /* ----------------------------------------------- */
    
    $(".dtini").focusout(function (){ 
        dataInicial = $(".dtini").val();       
        $.ajax({      
            method: "POST",
            url: URL_SITE + "requests/",
            data: {funcao:'funcaoCalculaDataInicialAlerta', dtinicial:dataInicial   }
        }).done(function( result ) {
            resultDataInicial = result;
            if (result == 'datainicialerro1' ){
                alertaErroDataIncial();
                Swal.fire({
                    icon: 'error',
                    title: "A Data de Inicio não pode ser retroativa (anterior a hoje)",
                }).then(function(){});
            }        
            if (result == 'datainiciook' ){
                $("#dtini").css("border", "");
                $("#dtini").css("color", "black");
                $(".botaoSalvarAlerta").attr("disabled", false);
            }
        });       
    });
    
           
    $(".dtfim").focusout(function (){ 
        dataInicial = $(".dtini").val();
        dataFim =  $(".dtfim").val();    
        if (resultDataInicial == 'datainicialerro1'){
           alertaErroDataIncial();
           alertaErroDataInicialReforco()
           return false;
        } 
        $.ajax({      
            method: "POST",
            url: URL_SITE + "requests/",
            data: {funcao:'funcaoCalculaDatasAlerta', dtinicial:dataInicial, dtfinal:dataFim   }
        }).done(function( result ) {
            resultDatas = result;
            if (result == 'errodatafinalbranco' ){
                alertaErroDataFinal();
            }      
            if (result == 'errodatafinal1' ){
                alertaErroDataFinal();
                Swal.fire({
                    icon: 'error',
                    title: "A Data e Hora Final não pode ser MENOR a Data e Hora Inicial",
                }).then(function(){});
            }           
            if (result == 'datafinalok' ){
                $("#dtfim").css("border", "");
                $("#dtfim").css("color", "black");
                $("#dtini").css("border", "");
                $("#dtini").css("color", "black");
                 $(".botaoSalvarAlerta").attr("disabled", false);
            }
        });
    });
    
    /* ----------------------------------------------- */
    /* Carregando CIDADES para buscar OLT */
    /* ----------------------------------------------- */
    
    $.ajax({      
        method: "POST",
        url: URL_SITE + "requests/",
        data: {funcao:'funcaoCidadeOLT' }
        }).done(function( result ) {
            $(".inputCidade").html(result);
    });
    
    /* ---------------------------------------------------------- */
    /* Carrega as OLT COM BASE NA CIDADE (Gerando o Mapa FTTH)    */
    /* ---------------------------------------------------------- */
    
    $(".inputCidade").change(function () { 
        
        $("#oltBusca").val("");
        $(".inputCdr").val("");
        $("#ramaisCDR").val("");
        $("#caixaRamal").val("");
        
        $(".inputCdr").css("border", "");
        $(".inputCdr").css("color", "");
        
        $("#oltBusca").css("border", "");
        $("#oltBusca").css("color", "");
        
        $("#ramaisCDR").css("border", "");
        $("#ramaisCDR").css("color", "");
        
        $("#caixaRamal").css("border", "");
        $("#caixaRamal").css("color", "");
        
        if ($(this).val() != '') {          
            $.ajax({        
            method: "POST",
            url: URL_SITE + "requests/",
            data: { cidade:$(this).val(), funcao:'funcaoBuscaOLT' }
            
            }).done(function( result ) { 
                $("#oltBusca").html(result);
            });                       
        } else {
           $("#oltBusca").html("");
           $("#inputCdr").html("");
           $("#ramaisCDR").html("");
           $("#caixaRamal").html("");          
        }                        
    });
    
    $("#oltBusca").change(function () { 
        
        $(".inputCdr").val("");
        $("#ramaisCDR").val("");
        $("#caixaRamal").val("");
        
        $(".inputCdr").css("border", "");
        $(".inputCdr").css("color", "");
        
        $("#oltBusca").css("border", "");
        $("#oltBusca").css("color", "");
        
        $("#ramaisCDR").css("border", "");
        $("#ramaisCDR").css("color", "");
        
        $("#caixaRamal").css("border", "");
        $("#caixaRamal").css("color", "");
    });
    
    $("#oltBusca").focusout(function () { 
        
        var cdcidade = $(".inputCidade").val();
        var cdolt = $(this).val(); 
               
        if (resultDataInicial == 'datainicialerro1'){
           alertaErroDataIncial();
           alertaErroDataInicialReforco()
           
        } 
        
        if (resultDatas == "errodatafinal1"){
            alertaErroDataFinal();
            alertaErroDataFinalReforco();
            
        }
        
        $.ajax({
            
            method: "POST",
            url: URL_SITE + "requests/",
            data: {funcao:'verificaAlertaMapaFTTH', cdcidade:cdcidade, olt: cdolt  }
            
        }).done(function( result ) { 
     
            checagemOLT = result;
            console.log("Analisando OLTs");            
            console.log(checagemOLT);
            
            /*
            console.log(checagemCaixaRamal);
            console.log(checagemRamal);
            console.log(checagemCDR);
            console.log(checagemOLT);
            */
            
            if (result == 'olterro') {               
                alertaErroOLT();
                Swal.fire({
                    icon: 'warning',
                    title: 'Já existe um alerta cadastrado com essa cidade e nessa OLT',
                });
            } 
            
            if (result == 'oltok') {                
                removeErroOLT();
            }
            
        });  
    });
    
    /* -------------------------------------------------------   */
    /* Mapa FTTH  */
    /* -------------------------------------------------------   */
    
    $(".inputCdr").focusout(function () { 
        
        if ( $('.inputCidade').val() == '' || $('#oltBusca').val() == '') {
            if ($(".inputCdr").val() == ''){
                $(".inputCdr").css("border", "");
                $(".inputCdr").css("color", "");
            } else {
                console.log("Sem informações para buscar CDR");
                $(".inputCdr").css("border", "1px solid red");
                $(".inputCdr").css("color", "red");
                $("#helpCDR").css("color", "red");                   
                $("#helpCDR").html("Sem informações para buscar CDR");
                return false;
            }
        } else {
            $(".inputCdr").css("border", "");
            $(".inputCdr").css("color", "");
            $("#helpCDR").css("color", "");                   
            $("#helpCDR").html("Nro do CDR [4 digitos]");
        }
        if ($(this).val() != '') {            
            $.ajax({        
            method: "POST",
            url: URL_SITE + "requests/",
            data: {     
                cdcidade:$('.inputCidade').val(),
                noolt:$('#oltBusca').val(),
                cdcrd:$(this).val(),
                funcao:'funcaoVerificarCDR' 
            }            
            }).done(function( result ) {          
                if (result.trim() != 'error'){ 
                    $(".inputCdr").css("border", "");                    
                    var cdcdrBuscaRamais = result.trim();
                    $.ajax({        
                    method: "POST",
                    url: URL_SITE + "requests/",
                    data: { cdrBusca:cdcdrBuscaRamais, funcao:'funcaoBuscaRamaisCRD' }
                    }).done(function( result ) { 
                        $("#ramaisCDR").html(result);
                    });                     
                }
                else { 
                    $(".inputCdr").css("border", "1px solid red");
                    $(".inputCdr").css("color", "red");
                    $("#helpCDR").css("color", "red");                   
                    $("#helpCDR").html("CDR Informado inválido");
                    $("#ramaisCDR").html("");
                    $("#caixaRamal").html("");                    
                }                               
            });   
        } else {
            $("#ramaisCDR").html("");
            $("#caixaRamal").html("");
        }
    });
    
    $(".inputCdr").focusout(function () { 
        
        if (resultDataInicial == 'datainicialerro1'){
           alertaErroDataIncial();
           alertaErroDataInicialReforco()
        } 
        
        if (resultDatas == "errodatafinal1"){
            alertaErroDataFinal();
            alertaErroDataFinalReforco();
        }
        
        var cdcidade = $(".inputCidade").val();
        var cdolt = $("#oltBusca").val();
        var cdcdr_etiqueta = $(".inputCdr").val();
        
        $.ajax({ 
            
            method: "POST",
            url: URL_SITE + "requests/",
            data: {funcao:'verificaAlertaMapaFTTH_cdr', cdcidade:cdcidade, olt: cdolt, cdcdr: cdcdr_etiqueta }
            
        }).done(function( result ) { 
            
            checagemCDR = result;
            
            if ( result == 'cdrerro' ) {
                alertaErroCDR();
                Swal.fire({
                    icon: 'warning',
                    title: 'Já existe um alerta cadastrado com essa Cidade,  nessa OLT com este CDR',
                });
            }            
            if (result == 'cdrok') {
                removeErroCDR();          
            }
            if (result == 'olterro') {
                alertaErroOLT();
            }
        });
    });
    
    $("#ramaisCDR").change(function () {        
        if ($(this).val() != '') {           
            $.ajax({        
            method: "POST",
            url: URL_SITE + "requests/",
            data: { caixaBusca:$(this).val(), funcao:'funcaoBuscaCaixas' }
            
            }).done(function( result ) { 
                $("#caixaRamal").html(result);
            });                      
        } else {
           $("#caixaRamal").html("");
        }                       
    });
                 
    /* -----------------------------------------------------------------   */
    /*  VERIFICAR SE JÁ EXISTE ALERTA COM MAPA - PESANDO POR HIERARQUIA    */
    /* -----------------------------------------------------------------   */
           
    $("#ramaisCDR").focusout(function () { 
        
        if (resultDataInicial == 'datainicialerro1'){
           alertaErroDataIncial();
           alertaErroDataInicialReforco()
           return false;
        } 
        
        if (resultDatas == "errodatafinal1"){
            alertaErroDataFinal();
            alertaErroDataFinalReforco();
            return false;
        }
        
        var cdcidade = $(".inputCidade").val();
        var cdolt = $("#oltBusca").val();
        var cdcdr_etiqueta = $(".inputCdr").val();
        var ramais = $("#ramaisCDR").val();  
        
        $.ajax({ 
            method: "POST",
            url: URL_SITE + "requests/",
            data: {funcao:'verificaAlertaMapaFTTH_ramais', cdcidade:cdcidade, olt: cdolt, cdcdr: cdcdr_etiqueta, cdramais:ramais  }
        }).done(function( result ) { 
            checagemRamal = result;
            if ( result == 'ramalerro' ) {
                alertaErroRamal();          
                Swal.fire({
                    icon: 'warning',
                    title: 'Já existe um alerta cadastrado com essa Cidade,  nessa OLT com este CDR e neste Ramal',
                });            
            }
            
            if (result == 'ramalok') {
                removeErroRamal()
            }
            
            if (checagemOLT == 'olterro') {
                alertaErroOLT();
            }
            
            if (checagemCDR == 'cdrerro') {
                alertaErroCDR();
            }                      
            
        });     
    });
    
    $("#caixaRamal").focusout(function () {  
        
        if (resultDataInicial == 'datainicialerro1'){
           alertaErroDataIncial();
           alertaErroDataInicialReforco()
           return false;
        } 
        
        if (resultDatas == "errodatafinal1"){
            alertaErroDataFinal();
            alertaErroDataFinalReforco();
            return false;
        }
        
        var cdcidade = $(".inputCidade").val();
        var cdolt = $("#oltBusca").val();
        var cdcdr_etiqueta = $(".inputCdr").val();
        var ramais = $("#ramaisCDR").val();
        var caixaramal = $("#caixaRamal").val();
        
        $.ajax({ 
            method: "POST",
            url: URL_SITE + "requests/",
            data: {funcao:'verificaAlertaMapaFTTH_caixaramais', cdcidade:cdcidade, olt: cdolt, cdcdr: cdcdr_etiqueta, cdramais:ramais, caixa:caixaramal  }
        }).done(function( result ) {
            
            checagemCaixaRamal = result;
            
            if ( result == 'caixaerro' ) {
                alertaErroCaixa();       
                Swal.fire({
                    icon: 'warning',
                    title: 'Já existe um alerta cadastrado com essa Cidade,  nessa OLT com este CDR e neste Ramal com esta Caixa',
                });            
            }
            
            if (result == 'caixaok') {   
                  removeErroCaixa()      
            }
            
            if (checagemOLT == 'olterro') {
                alertaErroOLT();
            }
            
            if (checagemCDR == 'cdrerro') {
                alertaErroCDR();
            }
            
            if (checagemRamal == 'ramalerro') {
                alertaErroRamal(); 
            }  
            
        });
        
    });   
        
});

$("#formAlertaSuporte").submit(function () {
       
    console.log(checagemOLT);
    console.log(checagemCDR);
    console.log(checagemRamal);
    console.log(checagemCaixaRamal);
    
    var confereErro;
               
    $.ajax({
        method: "POST",
        url: URL_SITE + "alertaSuporte/cadastrarAlertaSuporte",
        data: $(this).serialize()

    }).done(function( result ) { 

        obj = jQuery.parseJSON(result); 
        console.log(obj.dados);
        
        if (obj.dados == 99) {                             
            Swal.fire({
                icon: 'warning',
                title: 'Ops! Já existe um alerta com esse mapa FTTH',
            });
        } else if (obj.dados == 98) { 
            alertaErroDataIncial();
            alertaErroDataFinal();     
            Swal.fire({
                icon: 'warning',
                title: 'Por favor verifique as datas e tente novamente.',
            });        
        } else if (obj.dados == 97) { 
            alertaErroDataFinal();     
            Swal.fire({
                icon: 'warning',
                title: 'Por favor verifique a Data Final, não pode ser menor que a data e hora do momento atual...',
            });
        } else if (obj.dados == 96) { 
            alertaErroDataFinal();     
            Swal.fire({
                icon: 'warning',
                title: 'Por favor verifique a Data Inicial, não pode ser retroativa, anterior a hoje...',
            });
        } else if (obj.dados == 95) { 
            alertaErroDataFinal();     
            Swal.fire({
                icon: 'warning',
                title: 'Campos obrigatórios não preenchidos, verifique a Cidade ou OLT...',
            });
        } else if (obj.dados == 1) {                             
            Swal.fire({
                icon: 'success',
                title: 'Alerta cadastrado com sucesso.',
            }).then(function(){
                window.location.href = URL_SITE + "alertaSuporte/abrirAlerta";  ;           
            });         
        }  
        else {
            Swal.fire({
                icon: 'error',
                title: "Ops, alerta não cadastrado. Revise os campos e tente novamente....",
            }).then(function(){}); 
        }  
            
    }).fail(function() {
        alert( "Ops! Desculpe mas ocorreu um erro ao enviar dados para página" );
    }).always(function() {
        /* alert( "Completo...ajax rodou" ); */
    });
    return false;            
});

/* ----------------------------------------------- */
/* Validando a digitação do CDR com 4 caracteres  */
/* ----------------------------------------------- */

$( ".inputCdr" ).keyup(function() {        
    var tamanhoDigitos = $( ".inputCdr" ).val().length;
    if (tamanhoDigitos > 4) {            
        $("#helpCDR").css("color", "red"); 
        $(".inputCdr").css("border", "1px solid red");
        $("#helpCDR").html("CDR máx. de 4 digitos");
        $(".inputCdr").css("color", "red");            
    } else {
         $("#helpCDR").css("color", ""); 
        $(".inputCdr").css("border", "");
        $("#helpCDR").html("Nro do CDR [4 digitos]");
        $(".inputCdr").css("color", "");
    }        
});

/* -------------------------------------------------------   */
/*  Carregar o modal Detalhes/Edit */
/* -------------------------------------------------------   */

$("body").on("click",".carregarModalAlerta",function () {  
    $.ajax({ 
        method: "POST",
        url: URL_SITE + "requests/",
        data: {  cdalerta: $(this).data("modal"), funcao: 'buscaDadosParaModalAlerta' }
    }).done(function( result ) {
        $(".modal-body.edit").html(result); 
    });              
});

/* -------------------------------------------------------   */
/*  Carregar o modal Excluir/Confirmação de Exclusão*/
/* -------------------------------------------------------   */

$("body").on("click",".carregarModalAlertaExcluir",function () {          
    console.log("Carregando dados para o modal excuir alerta...");
    $.ajax({ 
        method: "POST",
        url: URL_SITE + "requests/",
        data: {  cdalerta: $(this).data("modal"), funcao: 'buscaDadosParaModalAlertaExcluir' }
    }).done(function( result ) {
        $(".modal-body.excluir").html(result); 
    });

});

/* -------------------------------------------------------   */
/*  Update via Modal Detalhes / Edit   */
/* -------------------------------------------------------   */

$("body").on("submit",".formAlertaSuporteUpdate",function () { 
    console.log("Disparando update via modal");
    $.ajax({ 
        method: "POST",
        url: URL_SITE + "alertaSuporte/updateAlertaSuporte",
        data: $(this).serialize()
    }).done(function( result ) {

        obj = jQuery.parseJSON(result); 
        console.log(obj.dados);
        if (obj.dados == 1) {   
            Swal.fire({
                icon: 'success',
                title: 'Alerta Alterado com sucesso.',
            }).then(function(){
                window.location.href = URL_SITE  + "alertaSuporte/abrirAlerta";           
            }); 
        }
        if (obj.dados == 0) {   
            Swal.fire({
                icon: 'info',
                title: 'Nenhum dado alterado.',
            }).then(function(){
                window.location.href = URL_SITE  + "alertaSuporte/abrirAlerta";            
            }); 
        } 
    });   
    return false;
});

/* -------------------------------------------------------   */
/*  Delete via Modal Confirmar exclusão   */
/* -------------------------------------------------------   */

$("body").on("submit",".formAlertaSuporteExcluir",function () {     
    $.ajax({ 
        method: "POST",
        url: URL_SITE + "alertaSuporte/deleteAlertaSuporte",
        data: $(this).serialize()
    }).done(function( result ) {           
        console.log(result);       
        obj = jQuery.parseJSON(result); 
        console.log(obj.dados);            
        if (obj.dados == 1) {   
            Swal.fire({
                icon: 'success',
                title: 'Alerta excluido com sucesso.',
            }).then(function(){
                window.location.href = URL_SITE  + "alertaSuporte/abrirAlerta";           
            }); 
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Não foi possivel excluir o alerta.',
            }).then(function(){
                window.location.href = URL_SITE  + "alertaSuporte/abrirAlerta";           
            });
        }           
    });   
    return false;
});

/* ---------------------------------------------  */
/* FUNÇÕES AUXILIARES */
/* ---------------------------------------------  */

function alertaErroDataIncial(){
    $("#dtini").css("border", "1px solid red");
    $("#dtini").css("color", "red");
    $(".botaoSalvarAlerta").attr("disabled", true);   
}
function alertaErroDataInicialReforco() {
    Swal.fire({
        icon: 'warning',
        title: 'Por favor, corriga a Data Inicial antes de prosseguir. Não pode ser retroativa (anterior a hoje)',
    }); 
}
function alertaErroDataFinal(){
    $("#dtfim").css("border", "1px solid red");
    $("#dtfim").css("color", "red");
    $(".botaoSalvarAlerta").attr("disabled", true);
}
function alertaErroDataFinalReforco() {
    Swal.fire({
        icon: 'warning',
        title: 'Por favor, corriga a Data Final antes de prosseguir. Não pode ser anterior a data inicial',
    }); 
}
function alertaErroOLT() {
    $(".inputCidade").css("border", "1px solid red");
    $(".inputCidade").css("color", "red");
    $("#oltBusca").css("border", "1px solid red");
    $("#oltBusca").css("color", "red");
    $(".botaoSalvarAlerta").attr("disabled", true); 
}
function removeErroOLT() {
    $(".inputCidade").css("border", "");
    $(".inputCidade").css("color", "black");
    $("#oltBusca").css("border", "");
    $("#oltBusca").css("color", "black");
    $('.botaoSalvarAlerta').attr("disabled", false);  
}
function alertaErroCDR() {
    $(".inputCidade").css("border", "1px solid red");
    $(".inputCidade").css("color", "red");               
    $("#oltBusca").css("border", "1px solid red");
    $("#oltBusca").css("color", "red");
    $(".inputCdr").css("border", "1px solid red");
    $(".inputCdr").css("color", "red");
    $(".botaoSalvarAlerta").attr("disabled", true);  
}
function removeErroCDR() {
    $(".inputCidade").css("border", "");
    $(".inputCidade").css("color", "black");               
    $("#oltBusca").css("border", "");
    $("#oltBusca").css("color", "black");
    $(".inputCdr").css("border", "");
    $(".inputCdr").css("color", "black");
    $(".botaoSalvarAlerta").attr("disabled", false); 
}
function alertaErroRamal() {
    $(".inputCidade").css("border", "1px solid red");
    $(".inputCidade").css("color", "red");               
    $("#oltBusca").css("border", "1px solid red");
    $("#oltBusca").css("color", "red");
    $(".inputCdr").css("border", "1px solid red");
    $(".inputCdr").css("color", "red");
    $("#ramaisCDR").css("border", "1px solid red");
    $("#ramaisCDR").css("color", "red");
    $(".botaoSalvarAlerta").attr("disabled", true); 
}
function removeErroRamal() {   
    $(".inputCidade").css("border", "");
    $(".inputCidade").css("color", "black");               
    $("#oltBusca").css("border", "");
    $("#oltBusca").css("color", "black");
    $(".inputCdr").css("border", "");
    $(".inputCdr").css("color", "black");
    $("#ramaisCDR").css("border", "");
    $("#ramaisCDR").css("color", "black");
    $(".botaoSalvarAlerta").attr("disabled", false);  
}
function alertaErroCaixa() {   
    $(".inputCidade").css("border", "1px solid red");
    $(".inputCidade").css("color", "red");               
    $("#oltBusca").css("border", "1px solid red");
    $("#oltBusca").css("color", "red");
    $(".inputCdr").css("border", "1px solid red");
    $(".inputCdr").css("color", "red");
    $("#ramaisCDR").css("border", "1px solid red");
    $("#ramaisCDR").css("color", "red");
    $("#caixaRamal").css("border", "1px solid red");
    $("#caixaRamal").css("color", "red");
    $(".botaoSalvarAlerta").attr("disabled", true); 
}

function removeErroCaixa() {
    $(".inputCidade").css("border", "");
    $(".inputCidade").css("color", "black");               
    $("#oltBusca").css("border", "");
    $("#oltBusca").css("color", "black");
    $(".inputCdr").css("border", "");
    $(".inputCdr").css("color", "black");
    $("#ramaisCDR").css("border", "");
    $("#ramaisCDR").css("color", "black");
    $("#caixaRamal").css("border", "");
    $("#caixaRamal").css("color", "black");
    $(".botaoSalvarAlerta").attr("disabled", false);   
}


