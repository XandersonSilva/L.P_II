
var filtro = document.querySelector('.filtro');


filtro.addEventListener("input", function(){
    var numeros = document.querySelectorAll(".numero");
    var ref = this;
    
    var cont = 0

    if (this.value.length > 0){
        
        numeros.forEach(function(numero){
            var tdResult = numero.querySelector(".resultado");
            var resultado = tdResult.textContent;
            var expressao = new RegExp(ref.value, "i");
            
            var num1 = $(".numero .primeiro:eq("+cont+")").text()
            var num2 = $(".numero .segundo:eq("+cont+")").text()
            
            if (!expressao.test(resultado) && !expressao.test(num1) && !expressao.test(num2)) {
                numero.classList.add("invisivel")
            }else{
                numero.classList.remove("invisivel");
            }
            cont = cont +1
        });
    } else {
        numeros.forEach(function(numero){
            numero.classList.remove("invisivel");
        });


    }
    
});