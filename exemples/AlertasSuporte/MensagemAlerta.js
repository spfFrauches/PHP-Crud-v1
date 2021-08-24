/* JS - Msg de Alertas para suporte */

$(".viewDivFormAlertaSuporte").hide();

$("#btnMsgNovoAlerta").click(function () {
    if ( $( ".viewDivFormAlertaSuporte" ).first().is( ":hidden" ) ) {
        $(".viewDivFormAlertaSuporte").slideDown( "slow" );
        $(".viewDivListAlertaSuporte").hide();
        $("#btnNovoAlerta").text("Listar Mensagens alertas");
    } else {
        $(".viewDivFormAlertaSuporte").hide();
        $(".viewDivListAlertaSuporte").show();
        $("#btnNovoAlerta").text("Nova Mensagem");
    }
});

/* -------------------------------------------------------   */
/*  Insert / Cadastro de mensagens   */
/* -------------------------------------------------------   */
    
$("#formMensagemAlertaSuporte").submit(function () {          
    $.ajax({
        method: "POST",
        url: URL_SITE + "alertaSuporte/cadastrarMensagemAlerta",
        data: $(this).serialize()
    }).done(function( result ) { 
        console.log(result);
        obj = jQuery.parseJSON(result); 
        console.log(obj.dados);
        if (obj.dados == 1) { 
            Swal.fire({
                icon: 'success',
                title: 'Mensagem para o Alerta cadastrado com sucesso.',
            }).then(function(){
                window.location.href = URL_SITE + "alertaSuporte/mensagemAlerta";  ;           
            }); 
        } else {
            Swal.fire({
                icon: 'error',
                title: "Ops, Mensagem não cadastrada.  Tente novamente mais tarde.",
            }).then(function(){}); 
        } 
        }).fail(function() {
            alert( "Ops! Desculpe mas ocorreu um erro ao enviar dados para página" );
        }).always(function() {
            /* alert( "Completo...ajax rodou" ); */
        });
    return false;      
});

/* -------------------------------------------------------   */
/*  Carregar o modal Detalhes/Edit */
/* -------------------------------------------------------   */

$("body").on("click",".carregarModalMsgAlerta",function () {  
    $.ajax({ 
        method: "POST",
        url: URL_SITE + "requests/",
        data: {  cdmsgalerta: $(this).data("modal"), funcao: 'buscaDadosParaModalMsgAlerta' }
    }).done(function( result ) {
        $(".modal-body.edit").html(result); 
    });              
});

$("body").on("click",".carregarModalMsgAlertaExcluir",function () {  
    $.ajax({ 
        method: "POST",
        url: URL_SITE + "requests/",
        data: {  cdmsgalerta: $(this).data("modal"), funcao: 'buscaDadosParaModalMsgAlertaExcluir' }
    }).done(function( result ) {
        $(".modal-body.excluir").html(result); 
    });              
});

/* -------------------------------------------------------   */
/*  Update via Modal Detalhes / Edit   */
/* -------------------------------------------------------   */

$("body").on("submit",".formMsgAlertaSuporteUpdate",function () { 
    $.ajax({ 
        method: "POST",
        url: URL_SITE + "alertaSuporte/updateMsgAlertaSuporte",
        data: $(this).serialize()
    }).done(function( result ) {
        console.log(result);       
        obj = jQuery.parseJSON(result); 
        console.log(obj.dados);
        if (obj.dados == 1) {   
            Swal.fire({
                icon: 'success',
                title: 'Alerta Alterado com sucesso.',
            }).then(function(){
                window.location.href = URL_SITE  + "alertaSuporte/mensagemAlerta";           
            }); 
        }
        if (obj.dados == 0) {   
            Swal.fire({
                icon: 'info',
                title: 'Nenhum dado alterado.',
            }).then(function(){
                window.location.href = URL_SITE  + "alertaSuporte/mensagemAlerta";            
            }); 
        } 
    });   
    return false;
});

/* -------------------------------------------------------   */
/*  Delete via Modal Confirmar exclusão   */
/* -------------------------------------------------------   */

$("body").on("submit",".formMsgAlertaSuporteExcluir",function () {    
    $.ajax({
        method: "POST",
        url: URL_SITE + "alertaSuporte/deleteMsgAlertaSuporte",
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
                window.location.href = URL_SITE  + "alertaSuporte/mensagemAlerta";           
            }); 
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Não foi possivel excluir o alerta.',
            }).then(function(){
                window.location.href = URL_SITE  + "alertaSuporte/mensagemAlerta";           
            });
        }           
    });   
    return false;
});

window.addEventListener("load", function (event) { 
    
        
}); 


