

//lendo o botão do HTML
var botao = document.querySelector("#botao");

//Lendo o evento de clique no botão e chamando uma função quando clicado
botao.addEventListener('click', function(event){

    //Previne a pagina de dar um reload apos pressionar o botão
    event.preventDefault();

    //Lendo o formulario e os inputs do HTML
    var formulario = document.querySelector('#formulario');
    var dados = obtemNumerosForm(formulario);
 
    var erros = validaDados(dados);
    
    if (erros.length > 0) {
        exibeErro(erros);
        
        return;
    }
    var ul = document.querySelector('#mensagem-erro');
    ul.innerHTML = "";
    //Cria TR
    var dadosTr = criaTr(dados);
    
     //Lê a TBODY do HTML
     var tabela = document.querySelector('#tabela-pacientes');

     //Insere o TR dentro do TBODY
     tabela.appendChild(dadosTr);
     ehVerdadeiro();
     formulario.reset();
    
    });

    function obtemNumerosForm(formulario) {
        var dados = {
            num1: formulario.primeiro.value,
            num2: formulario.segundo.value,
            soma: somaDoisNumeros(formulario.primeiro.value,formulario.segundo.value)
        }
        return dados;
    }

    function criaTr(dados) {

        //Criando elementos TR e TD para inserir na tabela
        var elementoTr = document.createElement('tr');
        elementoTr.classList.add('numero');
        //Insere as TDs dentro da TR criada
        elementoTr.appendChild(criaTd(dados.num1,"primeiro"));
        elementoTr.appendChild(criaTd(dados.num2,"segundo"));
        elementoTr.appendChild(criaTd(dados.soma,"resultado"));

        return elementoTr;
       
    }

    function criaTd (dado,classe){
        var td = document.createElement('td');
        td.textContent = dado;
        td.classList.add(classe);

        return td;
    }

    function validaDados (dados) {

        var erros = [];
        var num1Vazio = false;
        var num2Vazio = false;
    
        if(dados.num1.length == 0) {
            erros.push("Insira o primeiro numero");
            num1Vazio = true;
        }
        
        if (dados.num2.length == 0) {
            erros.push("Insira o segundo numero");
            num2Vazio = true;
        }
    
        if (!num1Vazio && !num2Vazio) {
            if(!validaNum1(dados.num1)) erros.push("Numero 1 esta invalido");
            if(!validaNum2(dados.num2)) erros.push("Numero 2 esta invalido");
        }

        var dadosComparativo = document.querySelectorAll('.numero');
        dadosComparativo.forEach(function(dadoComparativo) {

            var dado1 = dadoComparativo.querySelector('.primeiro');
            var dado2 = dadoComparativo.querySelector('.segundo');
            
            if(dado1.textContent == dados.num1 && dado2.textContent == dados.num2) {
                
                erros.push("O calculo solicitado ja existe na tabela");
            }

        });

        
        return erros;
        }

    function exibeErro (erros) {
        var ul = document.querySelector('#mensagem-erro');
        ul.innerHTML = "";
        erros.forEach(function(erro) {
            var li = document.createElement("li");
            li.classList.add('mensagem-erro');
            li.textContent = erro;
            ul.appendChild(li);
            
        });
    }