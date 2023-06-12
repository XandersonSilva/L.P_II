<?php
$email = trim($_POST['Email']);
$senha = trim($_POST['Senha']);


$ArquivoUsers = fopen("../Arquivos_json/usuarios.json" , "r");

$jsonPessoas = fread($ArquivoUsers, filesize("../Arquivos_json/usuarios.json"));

$usuarioValid = 0;

// Decodificar o JSON para um array
$pessoas = json_decode($jsonPessoas, true);


// Percorrer os objetos do array e fazer verificações
foreach ($pessoas as $pessoa) {

    // Exemplo de verificação
    if ($pessoa['Senha'] == $senha and $pessoa['Email'] == $email) {
        $usuarioValid ++;
        $usserAtu = $pessoa['nome'];
    }
}

$usserAtu = urlencode($usserAtu);


if ($usuarioValid == 0){
    header("Location: ../Cadastro_Login/login.html");
}else{
    header("Location: ../Paginas_PHP/index.php?nome=" . $usserAtu ."");
}


fclose($ArquivoUsers);


/*
 *
 *var email  = $("#email").val();
 *var senha  = $("#senha").val();
 *
 *
 *var pessoa ={
 *		nome: "",
 *		email: "",
 *		endereco: "",
 *		cpf: null,
 *		nascimento: null,
 *		senha:""
 *	};
 *
 *Object.values(pessoa).forEach(element => {
 *    alert(element)
 *});
 *
 *
 */
?>

