<?php 
    session_start();
    // Somente usuários autenticados acessam o dashboard
    if(!isset($_SESSION["usuario"])){
        header("Location: /mysql/20251023/index.php");
    }

    if(isset($_GET["logout"])){
        session_destroy();
        header("Location: /mysql/20251023/index.php");
        exit();
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
    <!-- Link adiciona ?logout=1 para encerrar a sessão -->
    Vocês está logado!!!! <a href="?logout=1"> Sair</a>
</body>
</html>
