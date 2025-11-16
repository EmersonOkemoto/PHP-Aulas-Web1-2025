<?php

// Retorna true se o número não tiver divisores além de 1 e dele mesmo
function isPrime($number)
{
    if ($number < 2)
        return false;
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0)
            return false;
    }
    return true;
}

// Gera uma lista com a quantidade desejada de números primos
function generatePrimes($count)
{
    $primes = [];
    $number = 2;

    while (count($primes) < $count) {
        if (isPrime($number)) {
            $primes[] = $number;
        }
        $number++;
    }

    return $primes;
}

// Lista com os 10.000 primeiros primos
$primes = generatePrimes(10000);

$filename = "primos.txt";
$file = fopen($filename, "w");

if ($file) {
    // Escreve cada primo em uma linha numerada
    foreach ($primes as $index => $prime) {
        fwrite($file, ($index + 1) . "- " . $prime . "\n");
    }

    fclose($file);
    echo "Números primos salvos!";
} else {
    echo "Erro ao abrir o arquivo!\n";
}
