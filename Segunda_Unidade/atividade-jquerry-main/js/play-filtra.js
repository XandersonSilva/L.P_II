
var filtro = document.querySelector('.filtro');

filtro.addEventListener("input", function(){
    var numeros = document.querySelectorAll(".numero");
    var ref = this;

    if (this.value.length > 0){

        numeros.forEach(function(numero){
            var tdResult = numero.querySelector(".resultado");
            var resultado = tdResult.textContent;
            
            var expressao = new RegExp(ref.value, "i");

            if (!expressao.test(resultado)) {
                numero.classList.add("invisivel");
            }else {
                numero.classList.remove("invisivel");
            }
        }); 
    } else {
        numeros.forEach(function(numero){
            numero.classList.remove("invisivel");
        });
    }
    
});