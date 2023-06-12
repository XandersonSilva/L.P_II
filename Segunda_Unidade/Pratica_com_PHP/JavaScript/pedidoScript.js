function mostrar(){
    $("#prec_indv").toggle();
    var contem = $("#btnMostra").val();
    //alert(contem);
    if (contem == "Mostrar"){
        $("#btnMostra").val("Ocultar");
    }
    else{
        $("#btnMostra").val("Mostrar");
    }
}

function  logar(){
    window.location.href = "../Cadastro_Login/login.html";
}