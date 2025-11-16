<?php
// Variáveis começam vazias e serão preenchidas com os parâmetros recebidos
$nome = "";
$idade = "";

// Testa se os dois parâmetros chegaram pela URL antes de usar
if (isset($_GET["nome"]) && isset($_GET["idade"])) {
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($nome != "" & $idade != ""): ?>
        <h1><?= $nome ?> tem <?= $idade ?> anos</h1>
    <?php else: ?>
        <h1>Parâmetros incorretos.</h1>
    <?php endif; ?>
</body>

</html>
