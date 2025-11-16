<?php
// Constante com o caminho completo onde o arquivo do SQLite ficará salvo
define('DB_PATH', __DIR__ . '/database.sqlite');
// DSN usado pelo PDO para abrir a conexão
define('DB_DSN', 'sqlite:' . DB_PATH);
