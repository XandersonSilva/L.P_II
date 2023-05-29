var titulo = document.querySelector(".titulo");

titulo.addEventListener("click", () => {
    console.log("Oi fui clicado por uma arrow function..O que voce quer?");
});




function ehVerdadeiro () {
    var linhas = document.querySelectorAll(".numero");
    for (var i = 0; i < linhas.length; i ++) {

        var linhaAtual = linhas[i];
    
        var num1 = linhaAtual.querySelector(".primeiro").textContent;
        var num2 = linhaAtual.querySelector(".segundo").textContent;
        var res = linhaAtual.querySelector(".resultado");

        var num1EhValido = validaNum1(num1);
        var num2EhValido = validaNum2(num2);

        if (!num1EhValido) {
            console.log("Numero 1 Invalido");
            res.textContent = "Numero 1 Invalido";
            num1EhValido = false;
            linhaAtual.classList.add("numero-invalido");
        }
        
        if (!num2EhValido) {
            console.log("Numero 2 Invalido");
            res.textContent = "Numero 2 Invalido";
            num2EhValido = false;
            linhaAtual.classList.add("numero-invalido");
        }

        if (!num1EhValido && !num2EhValido) {
            console.log("Os dois numeros estao invalidos");
            res.textContent = "Os dois numeros estao invalidos";
            num2EhValido = false;
            linhaAtual.classList.add("numero-invalido");
        }
        
        if (num1EhValido && num2EhValido) {
            res.textContent = somaDoisNumeros(num1,num2);
        }
        
    }
}

ehVerdadeiro();

function somaDoisNumeros(primeiro,segundo) {
    var resultado = (+primeiro + +segundo).toFixed(2);
    return resultado;
}

function validaNum1(num1) {

        if(num1 > 0 && num1 <= 10 && num1 != null) {
            return true;
        }else{
            return false;
        }
}

function validaNum2 (num2) {
    if(num2 > 0 && num2 <= 10 && num2 != null ) {
        return true;
    }else{
        return false;
    }
}

