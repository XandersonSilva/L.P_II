<?php 
    $usuarioValid = false;

    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $endereco = $_GET['endereco'];
    $cpf = $_GET['CPF'];
    $nascimento = $_GET['nascimento'];
    $senha = $_GET['senha'];



    $ArquivoUsers = fopen("../Arquivos_json/usuarios.json" , "r");

    $jsonPessoas = fread($ArquivoUsers, filesize("../Arquivos_json/usuarios.json"));


    $pessoas = json_decode($jsonPessoas, true);




    $$nome = array( 'nome' => $nome, 'Email' => $email, 'Endereco' => $endereco, 'CPF' => $cpf, 'Nascimento' => $nascimento, 'Senha' => $senha);


    foreach ($pessoas as $pessoa) {

        // Exemplo de verificação
        if ($pessoa['Email'] ==  $$nome['Email']) {
            header("Location: ../Cadastro_Login/cadastro.php?erro=userExistent");
            $usuarioValid = false;
            exit;
        }else{
            $usuarioValid = true;
        }

    }
    fclose($ArquivoUsers);
    
    $ArqSobresvr = fopen("../Arquivos_json/usuarios.json", "w");

    if($usuarioValid == true){
        array_push($pessoas, $$nome);
        $jsonPessoas = json_encode($pessoas);
        fwrite($ArqSobresvr, $jsonPessoas);

        header("Location: ../Cadastro_Login/login.html");

    }

    fclose($ArqSobresvr);

?>
