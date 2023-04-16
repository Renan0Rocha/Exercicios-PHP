<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cad - Cliente</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="script.js"></script>
</head>
<body>
<?php

include_once "helpers.php";

session_start();
session_destroy();

//1. Escreva uma função que calcule a média de um array de números.
echo "A média dos números é: <b>". calcularMedia([2, 7, 6, 5]). "</b>";

//2. Crie uma função que receba um array de números e retorne a soma dos números pares nesse array.
echo "<br>A somo dos números pares é igual a: <b>". somarPares([2, 7, 6, 5, 8]). "</b>";

//3. Escreva uma função que receba uma matriz de inteiros e retorne o segundo maior número da matriz.
echo "<br>O segundo maior número da matriz é: <b>". segundoMaior([2, 7, 6, 5, 8, 9, 15]). "</b>";
//4. Escreva uma função que receba um número inteiro e retorne a soma de seus dígitos.
echo "<br>A soma dos digitos é igual a: <b>". somaDigitos(245). "</b>";
//5. Escreva uma função que receba uma matriz de inteiros e retorne uma nova matriz com apenas os números pares.
echo "<br>A matriz apenas com números pares é: <b>[ ";
foreach(matrizPares([2, 5, 1, 4, 9, 7, 7, 6, 0, 8]) as $numbers){
    echo $numbers.", ";
}
echo "]</b>";
/*6. Crie um sistema de cadastro de cliente que retorne um array (Não precisa salvar em nada, apenas apresentar)
-> Nome, idade e CPF
-> Verifique se o CPF é válido, caso seja invalido, retorne um erro e peça para re-inserir*/
if(isset($_POST['btnVerifyCpf']) and isset($_POST['txtCpf'])) {
        if (validarCPF($_POST['txtCpf'])){
            ?> <script>cadRealizado();</script>
            <?php
        }
        else{
            ?> <script>cpfInvalido();</script><?php
        }
}
/*7. Crie um jogo da adivinhação, o usuário tentará adivinhar o número gerado aleatóriamente
-> O jogador terá 10 vidas
-> A cada erro, perderá uma vida e caso perca todas: game over
-> Ele insere o nome antes de jogar
-> Sistema de pontuação
-> Quanto mais demorar para acertar, menor a pontuação 
-> Quanto menos vidas, menor a pontuação*/


?>
<hr>
<br>
<h3>Cliente</h3>
<form action="index.php" method="post" name="cadCli" id="cadCli">
        <label>NOME:</label>
        <input type="text" name="txtNome" id="txtNome">
        
        <label>IDADE:</label>
        <input type="text" name="txtIdade" id="txtIdade">

        <label>CPF:</label>
        <input type="text" name="txtCpf" id="txtCpf" 
            onkeydown="cpf(this);"
            onkeypress="cpf(this);"
            onkeyup="cpf(this);"
            maxlength="14" 
        />
        <br>
        <br>
        <input type="submit" name="btnVerifyCpf" class="button" value="Enviar"/>
    </form>
<hr>
<br>
    <form action="game.php" method="post" name="game" id="game">
        <h1 align="middle">JOGO DA ADIVINHAÇÃO</h1>
        <p>
        <img id="imgGame" src="imagens/imgGame.png">
        </p>
        <input id="buttonIndex" class="button" type="submit" name="btnAcessGame" align=middle value="Jogar" textsize="35"/>
    </form> 
<?php
?>
</body>
</html>

