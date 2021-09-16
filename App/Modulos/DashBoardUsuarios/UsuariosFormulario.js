/* ------------------------------------------  */
/* Validando campos ao passar por eles...      */
/* ------------------------------------------  */

hidenDivs()

$(".NomeUser").focusout(function(){
    validarFormNomeUser();
});

$(".EmailUser").focusout(function(){
    validarFormEmailUser();
});

$(".NivelPermUser").focusout(function(){
    validarFormNivelPermissaoUser();
});

$(".StatusUser").focusout(function(){
    validarFormStatusUser();
});

$(".PasswordUser").focusout(function(){
    validarFormPasswdUser();
});

$(".PasswordUserConfirm").focusout(function(){
    validarFormConfirmarPasswdUser();
});

$(".btnSalvarFormularioUsuarios").click(function() {
    
    console.log("Clicando em botão salvar...");
    
    validarFormNomeUser();
    validarFormEmailUser();
    validarFormNivelPermissaoUser();
    validarFormStatusUser();
    validarFormPasswdUser();
    validarFormConfirmarPasswdUser();
    compararSenhas();
    
});

/* ------------------------------------------  */
/* Trabalhando no Submit do formulário         */
/* ------------------------------------------  */

$("#formUsuarios").submit(function() {
    
    console.log("Enviando o formulário...");   
    iniciarLoad(); 
    
    $.ajax({
        
        method: "POST",
        url: URL + "adminDashBoard/usuarios/store",
        data: $(this).serialize()
        
    }).done(function( result ) { 
        
        console.log(result);
                
        if (result == "success") {
            
            setTimeout(function() {
                loadSuccessMsg(); 
            }, 1000);
                      
           
        } else {
            
            setTimeout(function() {
                loadErroMsg(); 
            }, 1000);
            $(".detalheErroTexto").text(result);
            $(".detalheErro").show();
            $(".btnSalvarFormularioUsuarios").attr("disabled", true);
            
        } 
          
    }).fail(function() {
        alert( "Ops! Desculpe mas ocorreu um erro ao enviar dados para página" );
    }).always(function() {
        /* alert( "Completo...ajax rodou" ); */
    });

    
    return false;
    
});






/* ---------------------------------------------  */
/* FUNÇÕES GERAIS PARA USO NO ARQUIVO             */
/* ---------------------------------------------  */



/* ---------------------------------------------  */
/* FUNÇÕES PARA OCULTAR DIVS DE INICIO            */
/* ---------------------------------------------  */



function hidenDivs() {
    $(".loadingOnSubmit").hide();
    $(".msgSucess").hide();
    $(".msgError").hide();
    $(".detalheErro").hide();
}


/* ---------------------------------------------  */
/* FUNÇÕES PARA EFEITOS DE LOAD*/
/* ---------------------------------------------  */


function iniciarLoad(){
   $(".formularioCadastro").hide();
   $(".loadingOnSubmit").show(); 
}
function pararLoad() {
   $(".formularioCadastro").show();
   $(".loadingOnSubmit").hide();
}

function loadErroMsg() {
    $(".formularioCadastro").hide();
    $(".loadingOnSubmit").hide();
    $(".msgSucess").hide();
    $(".msgError").show();
}

function loadSuccessMsg() {
    $(".formularioCadastro").hide();
    $(".loadingOnSubmit").hide();
    $(".msgSucess").show();
    $(".msgError").hide();
}

/* ---------------------------------------------  */
/* FUNÇÕES DE VALIDAÇÕES DOS CAMPOS DE FORMULARIO */
/* ---------------------------------------------  */

function validarFormNomeUser() {
    var nomeuser = $(".NomeUser").val();
    if (nomeuser.trim() == '') {
        pararLoad();
        erroFormNomeUser();
        $(".btnSalvarFormularioUsuarios").attr("disabled", true);
        console.log("Nome de usuário em branco - validação Front End");
    } else {
        normalFormNomeUser();
        $('.btnSalvarFormularioUsuarios').removeAttr("disabled");
    }
}
function erroFormNomeUser() {
    $(".NomeUser").css("border", "solid 1px red");
    $("#NomeUserHelp").text("Campo obrigatório, preencha o nome");
    $("#NomeUserHelp").css("color", "red");
}
function normalFormNomeUser() {
    $(".NomeUser").css("border", "");
    $("#NomeUserHelp").text("Nome completo do usuário");
    $("#NomeUserHelp").css("color", ""); 
}

function validarFormEmailUser() {
    var emailuser = $(".EmailUser").val();
    if (emailuser.trim() == '') {
        pararLoad();
        erroFormEmailUser();
        $(".btnSalvarFormularioUsuarios").attr("disabled", true);
        console.log("E-mail em branco - validação Front End");
    } else {
        normalFormEmailUser();
        $('.btnSalvarFormularioUsuarios').removeAttr("disabled");
    }       
}
function erroFormEmailUser(){
    $(".EmailUser").css("border", "solid 1px red");
    $("#EmailHelp").text("Campo obrigatório, preencha o e-mail");
    $("#EmailHelp").css("color", "red");  
}
function normalFormEmailUser(){
    $(".EmailUser").css("border", "");
    $("#EmailHelp").text("E-mail válido para o usuário, servirá como login");
    $("#EmailHelp").css("color", "");
}

function validarFormNivelPermissaoUser(){
    var nivelPermUser = $(".NivelPermUser").val();
    if (nivelPermUser.trim() == '') {
        pararLoad();
        erroFormNivelPermUser();
        $(".btnSalvarFormularioUsuarios").attr("disabled", true);
        console.log("Nivel permissão não informado - validação Front End");
    } else {
        normalFormNivelPermUser();
        $('.btnSalvarFormularioUsuarios').removeAttr("disabled");
    } 
}
function erroFormNivelPermUser(){
    $(".NivelPermUser").css("border", "solid 1px red");
    $("#PermisaoHelp").text("Campo obrigatório, informe o nível de permissão");
    $("#PermisaoHelp").css("color", "red"); 
}
function normalFormNivelPermUser(){
    $(".NivelPermUser").css("border", "");
    $("#PermisaoHelp").text("Nível de permissões de acesso ao sistema");
    $("#PermisaoHelp").css("color", ""); 
}

function validarFormStatusUser() {
    var statusUser = $(".StatusUser").val();  
    if (statusUser.trim() == '') {
        pararLoad();
        erroFormStatusUser();
        $(".btnSalvarFormularioUsuarios").attr("disabled", true);
        console.log("Status do usuário não informado - validação Front End");
    } else {
        normalFormStatusUser();
        $('.btnSalvarFormularioUsuarios').removeAttr("disabled");
    } 
}
function erroFormStatusUser() {
    $(".StatusUser").css("border", "solid 1px red");
    $("#StatusHelp").text("Campo obrigatório, informe o status inicial");
    $("#StatusHelp").css("color", "red");  
}
function normalFormStatusUser() {
    $(".StatusUser").css("border", "");
    $("#StatusHelp").text("Status inicial de acesso ao sistema");
    $("#StatusHelp").css("color", "");  
}

function validarFormPasswdUser(){
    var passwordUser = $(".PasswordUser").val();   
    if (passwordUser.trim() == '') {
        pararLoad();
        erroFormPasswdUser();
        $(".btnSalvarFormularioUsuarios").attr("disabled", true);
        console.log("Senha não informado - validação Front End");
    } else {
        normalFormPasswdUser() ;
        $('.btnSalvarFormularioUsuarios').removeAttr("disabled");
    }
}
function erroFormPasswdUser() {
    $(".PasswordUser").css("border", "solid 1px red");
    $("#PasswdHelp").text("Campo obrigatório, informe uma senha");
    $("#PasswdHelp").css("color", "red"); 
}
function normalFormPasswdUser() {
    $(".PasswordUser").css("border", "");
    $("#PasswdHelp").text("Senha de acesso ao sistema");
    $("#PasswdHelp").css("color", ""); 
}

function validarFormConfirmarPasswdUser() {
    var passwordUserConfirm = $(".PasswordUserConfirm").val();  
    if (passwordUserConfirm.trim() == '') {
        pararLoad();
        erroFormConfirPasswdUser(); 
        $(".btnSalvarFormularioUsuarios").attr("disabled", true);
        console.log("Confirmação de senha não informado - validação Front End");
    } else {
        normalFormConfirPasswdUser();
        compararSenhas();
    }
}
function erroFormConfirPasswdUser(){
    $(".PasswordUserConfirm").css("border", "solid 1px red");
    $("#PasswdConfirmaHelp").text("Campo obrigatório, informe uma senha de confirmação");
    $("#PasswdConfirmaHelp").css("color", "red"); 
}
function normalFormConfirPasswdUser() {
    $(".PasswordUserConfirm").css("border", "");
    $("#PasswdConfirmaHelp").text("Confirmação da senha de acesso");
    $("#PasswdConfirmaHelp").css("color", "");  
}

/* ---------------------------------------------  */
/* fUNÇÃO PARA COMPARAÇÕES DE SENHAS */
/* ---------------------------------------------  */

function compararSenhas() {
    
    var passwordUser = $(".PasswordUser").val();
    var passwordUserConfirm = $(".PasswordUserConfirm").val(); 
    
    if ( (passwordUser != passwordUserConfirm) || passwordUserConfirm == '' ) {
        pararLoad();
        
        $(".PasswordUserConfirm").css("border", "solid 1px red");
        $("#PasswdConfirmaHelp").text("A senha de confirmação não está igual a senha informada. Por favor confirme a senha corretamente, usando a mesma.");
        $("#PasswdConfirmaHelp").css("color", "red"); 
        
    } else {
        normalFormConfirPasswdUser();
        $('.btnSalvarFormularioUsuarios').removeAttr("disabled");
    }
     
}

$(".btnVoltarErroCadastroUsuarios").click(function() {    
    $(".msgError").hide();
    $(".loadingOnSubmit").show(); 
    setTimeout(function() {
        $(".loadingOnSubmit").hide(); 
        $(".formularioCadastro").show(); 
        $('.btnSalvarFormularioUsuarios').removeAttr("disabled");
    }, 1000);   
});


