
function semNome(){
    var nome = document.getElementById("S_nome");
    if(nome.value == "" ){
        document.getElementById("lbt_01").innerHTML="Esse campo deve ser preenchido!!!";
    }else{
        document.getElementById("lbt_01").innerHTML="";
    }
    
 }
 function semSbrNome(){
    var nome = document.getElementById("Sbr_nome");
    if(nome.value == "" ){
        document.getElementById("lbt_02").innerHTML="Esse campo deve ser preenchido!!!";
    }else{
        document.getElementById("lbt_02").innerHTML="";
    }
 }
 function semEmail(){
    var nome = document.getElementById("E-mail");
    if(nome.value == "" ){
        document.getElementById("lbt_03").innerHTML="Esse campo deve ser preenchido!!!";
    }else{
        document.getElementById("lbt_03").innerHTML="";
    }
 }
 function semSenha(){
    var nome = document.getElementById("S_Senha");
    if(nome.value == "" ){
        document.getElementById("lbt_04").innerHTML="Esse campo deve ser preenchido!!!";
    }else{
        document.getElementById("lbt_04").innerHTML="";
    }
 }
 function naoConf(){
    var nome = document.getElementById("C_Senha");
    if(nome.value == "" ){
        document.getElementById("lbt_05").innerHTML="Esse campo deve ser preenchido!!!";
    }else{
        document.getElementById("lbt_05").innerHTML="";
    }
 }

function M_nome(){
    nome = nome.value;
    if ( nome != "") {
        alert(pH);
        var conteudo = document.getElementById("D_dij").textContent;
        
        document.getElementById("D_dij").innerHTML=conteudo + nome;
    }
}