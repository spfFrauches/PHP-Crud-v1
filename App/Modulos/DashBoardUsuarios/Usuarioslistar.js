$("body").on("click",".modalEditar",function () {
    
    $.ajax({ 
        method: "POST",
        url: URL + "App/Modulos/DashBoardUsuarios/UsuariosFunctions.php",
        data: {  funcao: 'carregarDadosUsuarioEditarPorCodigo', cduser: $(this).data("user") }
    }).done(function( result ) {
        $(".modal-body.editar").html(result); 
    });  
  
});


$("body").on("click",".modalExcluir",function () {
    
    $.ajax({ 
        method: "POST",
        url: URL + "App/Modulos/DashBoardUsuarios/UsuariosFunctions.php",
        data: {  funcao: 'carregarDadosUsuarioPorCodigo', cduser: $(this).data("user") }
    }).done(function( result ) {
            
        $(".modal-body.excluir").html(result); 

    });      
   
});

