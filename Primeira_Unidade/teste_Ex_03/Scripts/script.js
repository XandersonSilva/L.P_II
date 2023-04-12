var nome = document.getElementById("Nome");
var pH = nome.getAttribute("placeholder"); 

function campoVazio(){
    if (nome.blur){
    nome.setAttribute("placeholder", "Esse campo deve ser preenchido");
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