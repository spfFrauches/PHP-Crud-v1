/* ------------------------------------------  */
/* Validando campos ao passar por eles...      */
/* ------------------------------------------  */

$(".loadingOnSubmit").hide();
   
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

/* ------------------------------------------  */
/* Trabalhando no Submit do formulário         */
/* ------------------------------------------  */

$("#formUsuarios").submit(function() {
    
    iniciarLoad(); 
    
    setTimeout( function() {
        sendAjax(); 
    }, 1500);
    
    return false;
    
});

function sendAjax() {
    
    validarFormNomeUser();
    validarFormEmailUser();
    validarFormNivelPermissaoUser();
    validarFormStatusUser();
    validarFormPasswdUser();
    validarFormConfirmarPasswdUser();
    compararSenhas();
     
    $.ajax({
        
        method: "POST",
        url: URL + "adminDashBoard/usuarios/store",
        data: $(this).serialize()
        
    }).done(function( result ) { 
        
        console.log(result);
        
        
        if (result == "success") {
                      
           
        } else {
           
        } 
  
        
    }).fail(function() {
        alert( "Ops! Desculpe mas ocorreu um erro ao enviar dados para página" );
    }).always(function() {
        /* alert( "Completo...ajax rodou" ); */
    });
       
}

function iniciarLoad(){
   $(".formularioCadastro").hide();
   $(".loadingOnSubmit").show(); 
}
function pararLoad() {
   $(".formularioCadastro").show();
   $(".loadingOnSubmit").hide();
}

/* ---------------------------------------------  */
/* FUNÇÕES DE VALIDAÇÕES DOS CAMPOS DE FORMULARIO */
/* ---------------------------------------------  */

function validarFormNomeUser() {
    var nomeuser = $(".NomeUser").val();
    if (nomeuser.trim() == '') {
        pararLoad();
        erroFormNomeUser();
    } else {
        normalFormNomeUser();
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
    } else {
        normalFormEmailUser();
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
    } else {
        normalFormNivelPermUser();
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
    } else {
        normalFormStatusUser();
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
    } else {
        normalFormPasswdUser() ;
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
function normalFormConfirPasswdUser(){
    $(".PasswordUserConfirm").css("border", "");
    $("#PasswdConfirmaHelp").text("Confirmação da senha de acesso");
    $("#PasswdConfirmaHelp").css("color", "");  
}

/* ---------------------------------------------  */
/* fUNÇÃO PARA COMPARAÇÕES DE SENHAS */
/* ---------------------------------------------  */

function compararSenhas(){
    
    var passwordUser = $(".PasswordUser").val();
    var passwordUserConfirm = $(".PasswordUserConfirm").val(); 
    
    if (passwordUser != passwordUserConfirm) {
        pararLoad();
        
        $(".PasswordUserConfirm").css("border", "solid 1px red");
        $("#PasswdConfirmaHelp").text("A senha de confirmação não está igual a senha informada. Por favor confirme a senha corretamente, usando a mesma.");
        $("#PasswdConfirmaHelp").css("color", "red"); 
        
    } else {
        normalFormConfirPasswdUser();
    }
    
    
}



