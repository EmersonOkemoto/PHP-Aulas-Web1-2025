
<?php

session_start();

// Salva um nome fixo na sessão para ser lido em outra página
$_SESSION["usuario"] = "Felipe";

echo "Usuário salvo na sessão";
