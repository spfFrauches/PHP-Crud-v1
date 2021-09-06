console.log("Carregando o formulário");

/* ------------------------------------------  */
/* Validando campos ao passar por eles...      */
/* ------------------------------------------  */
   
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

$(".passwordUser").focusout(function(){
    validarFormPasswdUser();
});

$(".passwordUserConfirm").focusout(function(){
    validarFormConfirmarPasswdUser();
});

/* ------------------------------------------  */
/* Trabalhando no Submit do formulário ...     */
/* ------------------------------------------  */

$("#formUsuarios").submit(function(){
    
    console.log("Submit do formulário, vamos trabalhar...");
    
    var nomeuser = $(".NomeUser").val();
    var emailuser = $(".EmailUser").val();
    var nivelPermUser = $(".NivelPermUser").val();
    var statusUser = $(".StatusUser").val();
    var passwordUser = $(".passwordUser").val();
    var passwordUserConfirm = $(".passwordUserConfirm").val();
    
        
    return false;
    
    
});

/* --------------------------------------  */
/* FUNÇÕES DO ARQUIVO */
/* --------------------------------------  */

function validarFormNomeUser() {
    var nomeuser = $(".NomeUser").val();
    if (nomeuser.trim() == '') {
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
    var emailuser = $(".EmailUser").val();   
    if (emailuser.trim() == '') {
        erroFormEmailUser();
    } else {
        normalFormEmailUser() ;
    }
}
function erroFormPasswdUser() {
    $(".passwordUser").css("border", "solid 1px red");
    $("#PasswdHelp").text("Campo obrigatório, informe uma senha");
    $("#PasswdHelp").css("color", "red"); 
}
function normalFormPasswdUser() {
    $(".passwordUser").css("border", "");
    $("#PasswdHelp").text("Senha de acesso ao sistema");
    $("#PasswdHelp").css("color", ""); 
}

function validarFormConfirmarPasswdUser() {
    var passwordUserConfirm = $(".passwordUserConfirm").val();  
    if (passwordUserConfirm.trim() == '') {
        erroFormConfirPasswdUser();     
    } else {
        normalFormConfirPasswdUser() 
    }
}

function erroFormConfirPasswdUser(){
    $(".passwordUserConfirm").css("border", "solid 1px red");
    $("#PasswdConfirmaHelp").text("Campo obrigatório, informe uma senha de confirmação");
    $("#PasswdConfirmaHelp").css("color", "red"); 
}

function normalFormConfirPasswdUser(){
    $(".passwordUser").css("border", "");
    $("#PasswdConfirmaHelp").text("Confirmação da senha de acesso");
    $("#PasswdConfirmaHelp").css("color", "");  
}



