console.log("Ola Mundo, formulário de usuário");


/* ------------------------------------------  */
/* Validando campos ao passar por eles...     */
/* ------------------------------------------  */
   
$(".NomeUser").focusout(function(){

    var nomeuser = $(".NomeUser").val();
    
    if (nomeuser.trim() == '') {
        $(".NomeUser").css("border", "solid 1px red");
        $("#NomeUserHelp").text("Campo obrigatório, preencha o nome");
        $("#NomeUserHelp").css("color", "red");
    } else {
        $(".NomeUser").css("border", "");
        $("#NomeUserHelp").text("Nome completo do usuário");
        $("#NomeUserHelp").css("color", ""); 
    }

});

$(".EmailUser").focusout(function(){

    var emailuser = $(".EmailUser").val();
    
    if (emailuser.trim() == '') {
        $(".EmailUser").css("border", "solid 1px red");
        $("#emailHelp").text("Campo obrigatório, preencha o e-mail");
        $("#emailHelp").css("color", "red");
    } else {
        $(".EmailUser").css("border", "");
        $("#emailHelp").text("E-mail válido para o usuário, servirá como login");
        $("#emailHelp").css("color", ""); 
    }

});
    





