<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/SPedido.css">
    <script src="../JavaScript/jquery.js"></script>
    <link rel="shortcut icon" href="../Imagens/Favicon/logo.jpg" type="image/jpeg">
    <title>Comfirmação</title>
</head>
<body>

    <?php
        function verifica_vazio($BvQ ,$BfQ ,$BhQ){
            $Quant_item_pedido = array($BvQ ,$BfQ ,$BhQ);
            $Itens_Comprados = array();
            for($i = 0; $i <=2; $i++){
                if($Quant_item_pedido[$i] >0){
                    $Itens_Comprados[$i] = $Quant_item_pedido[$i]; 
                }
                else{
                    $Itens_Comprados[$i] = 0;
                }
            }
            if ($Itens_Comprados[0] == 0 and $Itens_Comprados[1] == 0 and $Itens_Comprados[2] == 0){
                if(isset($_GET['nome'])){
                    $nomeUser = $_GET['nome'];
                    echo '<p> Você não achou algo que lhe agrade? <br> Se trocar de ideia, visite a nossa <a href="../Paginas_PHP/index.php?nome='. $nomeUser .' "><strong>página de produtos!</strong></a></p>';
                }else{
                    echo '<p> Você não achou algo que lhe agrade? <br> Se trocar de ideia, visite a nossa <a href="../Paginas_PHP/index.php"><strong>página de produtos!</strong></a></p>';
                }
            }
        }

        $BvQtd = $_POST['BvQtd'];
        $BfQtd = $_POST['BfQtd'];
        $BhQtd = $_POST['BhQtd'];

        $PRECOBV = 25;
        $PRECOBF = 10;
        $PRECOBH = 20;
        
        $BvQtd = intval($BvQtd);
        $BfQtd = intval($BfQtd);
        $BhQtd = intval($BhQtd);

        
        $valorTotal = 0;
        $Quant_tot_itm = $BvQtd + $BfQtd + $BhQtd;    
        
        if (is_int($BvQtd) and $BvQtd >=1){
            $valorBV = $BvQtd * $PRECOBV;
            $valorTotal += $valorBV;
        }

        if (is_int($BfQtd) and $BfQtd >=1){
            $valorBF = $BfQtd * $PRECOBF;
            $valorTotal += $valorBF; 
        }    

        if (is_int($BhQtd) and $BhQtd >=1){
            $valorBH = $BhQtd * $PRECOBH;
            $valorTotal += $valorBH;
        }

        function voltar(){
            if(isset($_GET['nome'])){
                $nomeUser = $_GET['nome'];
                $nomeUser = urldecode($nomeUser);
                header("Location: index.php?nome=$nomeUser");
            }else{
                header("Location: index.php");
            }
        }
        
            if (isset($_POST['voltar'])){
                voltar();
            }
    ?>

    <header >
        <?php 
            if(isset($_GET['nome'])){
                $nomeUser = $_GET['nome'];
                echo   '<a href="index.php?nome='. $nomeUser .'"><img src="../Imagens/Logotipo/logo_150x80.jpg" id="logotipo" alt=""></a>';
            }else{
                echo   '<a href="index.php"><img src="../Imagens/Logotipo/logo_150x80.jpg" id="logotipo" alt=""></a>';
            }            
        ?>
        <article >
            <h1>Finalizar Compra</h1>
        </article>
        <nav id="entrar" onclick="logar()" >
            <?php
                if(isset($_GET['nome'])){
                    $nomeUser = $_GET['nome'];
                    $inicial = substr($nomeUser,0,1);
                    echo <<< LOGADO
                        <div id="UserLog">
                            $inicial
                        </div>
                        LOGADO;
                }else{    
                    echo <<< LOGIN
                        <p>Login</p>
                        <img id="login" src="../Imagens/Icones/conecte-se.png" alt="Log in">
                        </nav>
                    LOGIN;
                    
                }
            ?>
        </nav>
    </header>
    <main>
        <article id="itens">
                <?php
                    if ($valorTotal >0){
                        echo "Seu pedido foi processado com sucesso!";
                    }
                    else{
                        echo "Pedido Finalizado";
                    }

                    ?>
                <hr id="L_ttl">
        </article>
        <section id="conteudo">
            <?php
                verifica_vazio($BvQtd ,$BfQtd ,$BhQtd);
            ?>
             
                
            <article> <!-- Tabela com dados dos produtos da compra --> 
                <?php
                    if ($valorTotal >=1){
                        echo <<<TABELA
                        <table>
                        <caption>
                        Dados Da Compra
                        </caption>
                        <thead>
                            <tr>
                                <th><label> Nome do produto </label></th>
                                <th class="T_tabCentro"><label> Quantidade </label></th>
                                <th class="T_tabEsq"><label> Valor</label></th>
                            </tr>
                        </thead>
                        <tbody>
                        TABELA;
                
                        if (is_int($BvQtd) and $BvQtd >=1){
                            echo <<<LINHA
                            <tr>
                                <td>Bola de Volei</td>
                                <td> $BvQtd </td>
                                <td>R$ $valorBV </td>
                
                            </tr>
                            LINHA;
                        }
                        if (is_int($BfQtd) and $BfQtd >=1){
                            echo <<<LINHA
                            <tr>
                                <td>Bola de Futbol</td>
                                <td> $BfQtd </td>
                                <td>R$  $valorBF</td>
                
                            </tr>
                            LINHA;
                        }
                        if (is_int($BhQtd) and $BhQtd >=1){
                            echo <<<LINHA
                            <tr>
                                <td>Bola de Handebol</td>
                                <td> $BhQtd </td>
                                <td>R$ $valorBH</td>
                
                            </tr>
                            LINHA;
                        }
                        if($valorTotal >=1){
                            echo <<<FIM
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td> <strong> Total </strong> </td>
                                    <td> <strong> $Quant_tot_itm </strong> </td>
                                    <td> <strong> R$ $valorTotal </strong> </td>
                                </tr>
                            </tfoot>
                            </table>
                            FIM;
                        }
                    }
                ?>
            </article>
        
            <article>
                    
            </article>
            
            <article>
                <?php
                    if ($valorTotal >0){
                        echo <<<VOLTAR
                        <form method="post">
                            <strong><input type="submit" value="Finalizar compra e voltar para a páginar principal" class="botao" name="voltar" id="votarPrinc"></strong>
                        </form>
                        VOLTAR;
                        }
                ?>
            </article>
        </section>  
    
    </main>
    
    <article id="prec_indv_ttl">
        <?php
            if ($valorTotal >=1){
                echo <<<TITULO
                <aside>
                    Mostrar preço por unidade 
                    <input id="btnMostra" type="button" class="botao" value="Mostrar" onclick="mostrar()" >
                </aside>
                TITULO;
            }
        ?>
        <aside id="prec_indv"> <!-- Tabela com dados dos produtos -->    
            <?php
                if ($valorTotal >=1){
                    echo <<<TABELA
                    <table>
                        <thead>
                            <tr>
                            <th><label> Nome do produto </label></th>
                            <th class="T_tabEsq"><label> Valor (UNIDADE) </label></th>
                            </tr>
                        </thead>
                        <tbody>
                    TABELA;
                    if (is_int($BvQtd) and $BvQtd >=1){
                        echo <<<LINHA
                        <tr>
                            <td>Bola de Volei</td>
                            <td>R$ 25.00</td>
            
                        </tr>
                        LINHA;
                    }
                    if (is_int($BfQtd) and $BfQtd >=1){
                        echo <<<LINHA
                        <tr>
                            <td>Bola de Futbol</td>
                            <td>R$ 10.00</td>
            
                        </tr>
                        LINHA;
                    }
                    if (is_int($BhQtd) and $BhQtd >=1){
                        echo <<<LINHA
                        <tr>
                            <td>Bola de Handebol</td>
                            <td>R$ 20.00</td>
            
                        </tr>
                        LINHA;
                    }
                    if($valorTotal >=1){
                        echo <<<FIM
                            </tbody>
                        </table>
                        FIM;
                    }
                }
            ?>
            
        </aside>
    </article>

    <script src="../JavaScript/pedidoScript.js"></script>
</body>

</html>
