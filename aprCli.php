<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aprCli</title>
</head>
<body>
<?php
    include_once "index.php";
?>
    <h1>INFORMAÇÕES DO CLIENTE</h1>
    <br>
    <h3><?php $_POST['txtNome'] ?></h3>
    <h3><?php $_POST['txtIdade'] ?></h3>
    <h3><?php $_POST['txtCpf'] ?></h3>
</body>
</html>