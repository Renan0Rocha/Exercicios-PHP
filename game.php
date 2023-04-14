<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="script.js"></script>
    </script>
    <title>Jogo da Adivinhação</title>
</head>

<body>
    <?php include_once "helpers.php"; ?>

    <?php
    session_start(); // Inicia a sessão

    if (!isset($_SESSION['nome_jogador'])) {
        $_SESSION['nome_jogador'] = "<script>obterNome()</script>";
    }

    // Verifica se o contador já foi definido na sessão
    if (!isset($_SESSION['contador'])) {
        // Se o contador não estiver definido, inicializa com o valor 10
        $_SESSION['contador'] = 10;
    }

    // Verifica se o número aleatório já foi gerado na sessão
    if (!isset($_SESSION['numero_aleatorio'])) {
        // Gera um número aleatório de 0 a 20
        $_SESSION['numero_aleatorio'] = rand(0, 20);
    }

    // Verifica se a pontuação já foi definida na sessão
    if (!isset($_SESSION['pontuacao'])) {
        // Se a pontuação não estiver definida, inicializa com o valor 100
        $_SESSION['pontuacao'] = 100;
    }

    // Verifica se o botão foi clicado
    if (isset($_POST['botao'])) {
        // Se o botão foi clicado, decrementa o valor do contador na sessão e atualiza a pontuação
        if ($_SESSION['numero_aleatorio'] != $_POST['numero']) {
            $_SESSION['contador']--;
            $_SESSION['pontuacao'] = $_SESSION['pontuacao'] - 10;
        }


        // Verifica se o contador chegou a 0
        if ($_SESSION['contador'] == 0) {
    ?>
            <h1 class="text-shadows">Game Over!</h1>
            <p class="text-shadows">Pontuação: <?php echo $_SESSION['pontuacao']; ?></p>
            <form method="POST" id="formGameOver">
                <br></br>
                <input class="button" type="submit" name="reiniciar" value="Reiniciar">
            </form>
        <?php
            exit; // Encerra a execução do script
        }
        // Verifica se o número chutado é igual ao número aleatório gerado
        else if ($_POST['numero'] == $_SESSION['numero_aleatorio']) {
        ?>
            <h1 class="text-shadows">Parabéns! Você acertou!</h1>
            <p class="text-shadows">Pontuação: <?php echo $_SESSION['pontuacao']; ?></p>
            <form method="POST" id="formGameOver">
                <br></br>
                <input class="button" type="submit" name="reiniciar" value="Reiniciar">
            </form>
    <?php
            exit; // Encerra a execução do script
        }
    }
    // Verifica se o botão de reiniciar foi clicado
    if (isset($_POST['reiniciar'])) {
        // Reinicia o valor do contador na sessão para 10
        $_SESSION['contador'] = 10;

        $_SESSION['pontuacao'] = 100;

        // Gera um novo número aleatório de 0 a 20
        $_SESSION['numero_aleatorio'] = rand(0, 20);
    }
    ?>

    <h2 class="text-shadows">Bem-vindo, <?php echo $_SESSION['nome_jogador']; ?>!</h2>
    <h1 class="text-shadows">Total de Vidas: <?php echo $_SESSION['contador']; ?></h1>
    <form method="POST" id="formGame">
        <iframe src="https://giphy.com/embed/3o7aCSPqXE5C6T8tBC" width="200" height="200" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
        <p></p>
        <br><br>
        <label for="numero">Insira um número aleatório de 0 a 20:</label>
        <?php echo $_SESSION['numero_aleatorio']; ?>
        <input type="number" id="numero" name="numero" required>
        <br><br>
        <input type="submit" class="button" id="btnChute" name="botao" value="Chutar Número">
    </form>



</body>

</html>