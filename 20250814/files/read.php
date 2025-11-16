<?php

$filename = "primos.txt";
$file = fopen($filename, "r");

$primes = [];
if ($file) {
    $lineNumber = 0;
    // Lê o arquivo linha por linha até chegar ao fim
    while (($line = fgets($file)) !== false) {
        $lineNumber++;

        $line = trim($line);
        if (empty($line)) {
            continue;
        }

        // Expressão regular que separa o índice do número primo
        if (preg_match('/^(\d+)\s*-\s*(\d+)$/', $line, $matches)) {
            $index = (int) $matches[1];
            $primeNumber = (int) $matches[2];
            $primes[$index] = $primeNumber;

            echo "Indice: $index | Número primo: $primeNumber<br>";
        }
    }
} else {
    echo "Arquivo não foi encontrado!";
}
