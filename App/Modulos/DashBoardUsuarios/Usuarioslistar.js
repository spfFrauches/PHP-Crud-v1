$("body").on("click",".modalEditar",function () {
    
    /*
    * 
        $.ajax({ 
            method: "POST",
            url: URL_SITE + "requests/",
            data: {  cdalerta: $(this).data("modal"), funcao: 'buscaDadosParaModalAlerta' }
        }).done(function( result ) {
            $(".modal-body.edit").html(result); 
        });  
    * 
    */ 
   
    var result = "Carregando o modal editar via jQuery sob demanda...";
    $(".modal-body.editar").html(result); 
   
});


$("body").on("click",".modalExcluir",function () {
    
     $.ajax({ 
            method: "POST",
            url: URL + "App/Modulos/DashBoardUsuarios/UsuariosFunctions.php",
            data: {  funcao: 'carregarDadosUsuarioPorCodigo' }
        }).done(function( result ) {
            
            $(".modal-body.excluir").html(result); 
            
        });      
   
});

