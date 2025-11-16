<?php

require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Classe de apoio que centraliza o uso do Monolog no projeto
class MeuLogger
{
    private $logger;

    public function __construct()
    {
        // Cria um canal chamado "meu-app" e envia as mensagens para app.log
        $this->logger = new Logger('meu-app');
        $this->logger->pushHandler(new StreamHandler('app.log', Logger::DEBUG));
    }

    // Atalho para registrar mensagens informativas
    public function logInfo($mensagem){
        $this->logger->info($mensagem);
    }

    // Atalho para registrar erros e facilitar o debug
    public function logError($mensagem){
        $this->logger->error($mensagem);
    }
}

//$logger = new MeuLogger();
//$logger->logError('Erro na conexão com o banco.');
//$logger->logInfo('Aplicação iniciada.');
