<?php
// Lê o arquivo JSON e devolve a lista de produtos já como array PHP
function loadProducts()
{
    $arquivo = "products.json";
    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        return json_decode($conteudo, true) ?: [];
    }
    return [];
}

// Procura um produto específico percorrendo a lista até achar o ID desejado
function encontrarProdutoPorId($produtos, $id)
{
    foreach ($produtos as $produto) {
        if ($produto["id"] == $id) {
            return $produto;
        }
    }
    return null;
}
