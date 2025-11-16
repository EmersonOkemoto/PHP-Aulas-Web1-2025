<?php

// Primeiro acesso ocorre antes de incluir o arquivo, então gera aviso
print_r($year["days"]);

// include carrega o arquivo e executa o código contido nele
include("variables.php");

// Chamar include novamente repete a execução (apenas para demonstração)
include("variables.php");

// include_once garante que o arquivo só roda uma vez
include_once("variables.php");

print_r($year["days"]);
print_r($year["months"]);
