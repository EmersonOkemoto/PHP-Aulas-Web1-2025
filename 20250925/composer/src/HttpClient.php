<?php

require_once 'vendor/autoload.php';

require 'Logger.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Cliente HTTP simples que usa Guzzle e registra o resultado das chamadas
class MeuHttpClient
{
    private $client;
    private $logger;

    public function __construct()
    {
        $this->logger = new MeuLogger();
        // Configurações básicas: desabilita validação SSL e define timeout
        $this->client = new Client([
            'verify' => false,
            'timeout' => 30
        ]);
    }

    // Faz uma requisição GET e devolve o JSON já convertido em array
    public function buscarDados($url)
    {
        try {
            $response = $this->client->get($url);
            $json = json_decode($response->getBody(), true);
            $this->logger->logInfo('Foi possível chamar a url ' . $url);
            return $json;
        } catch (RequestException $e) {
            echo "Erro na requisição: " . $e->getMessage();
            $this->logger->logError('Não Foi possível chamar a url ' . $url);
            return null;
        }
    }
}


$httpClient = new MeuHttpClient();
$dados = $httpClient->buscarDados('https://viacep.com.br/ws/79823590/json/');
print_r($dados);
