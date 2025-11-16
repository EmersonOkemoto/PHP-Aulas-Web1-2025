<?php

// Função simples que retorna o menor entre dois valores usando o operador ternário
function minor($a, $b)
{
    return $a < $b ? $a : $b;
}

echo minor(1, 2);

// Calcula a distância entre dois pontos (p1 e p2) usando a fórmula de Pitágoras
function dist($p1, $p2)
{
    return sqrt(pow($p2[0] - $p1[0], 2) + pow($p2[1] - $p1[1], 2));
}

// Pontos que serão usados para medir a distância
$p1 = [1, 2];
$p2 = [3, 4];
echo "<br>";
echo dist($p1, $p2);

// Calcula médias diferentes dependendo do tipo solicitado (A, P ou H)
function average($notes, $type)
{
    switch ($type) {
        case 'A':
            // Média aritmética: soma dividido pela quantidade de notas
            return array_sum($notes) / count($notes);
            break;
        case 'P':
            // Média ponderada: usa pesos diferentes para cada nota
            $weights = [5, 3, 2];
            $weightedSum = 0;
            for ($i = 0; $i < count($notes); $i++) {
                $weightedSum += $notes[$i] * $weights[$i];
            }
            return $weightedSum / array_sum($weights);
            break;
        case 'H':
            // Média harmônica: usada aqui como outro exemplo de cálculo
            return 3 / (1 / $notes[0] + 1 / $notes[1] + 1 / $notes[2]);
            break;
        default:
            return "Invalid type";
            break;
    }
}

// Notas que serão usadas nas médias acima
$notes = [10, 8, 7];
echo "<br>";
echo average($notes, 'A');
echo "<br>";
echo average($notes, 'P');
echo "<br>";
echo average($notes, 'H');

// Algoritmo de ordenação (bubble sort) que reorganiza o array de forma crescente
function sortArray($array){
    $lenght = count($array);

    // Loop externo controla quantas vezes vamos percorrer a lista
    for($i = 0; $i < $lenght - 1;$i++){
        // Loop interno compara itens lado a lado e faz as trocas
        for($j =0; $j< $lenght - $i -1; $j++){
            if($array[$j] > $array[$j+1]){
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $temp;
            }
        }
    }
    return $array;
}

// Lista de números que será ordenada
$array = [64,34,25,12,22,11,90];
echo "<br>";
$arr = sortArray($array);
print_r($arr);

// Encontra todos os divisores positivos de um número
function findDivisors($number){
    $divisors = [];

    // Testa cada número menor que $number e guarda os que dividirem sem resto
    for($i=1;$i<$number;$i++){
        if($number % $i == 0){
            $divisors[] = $i;
        }
    }

    return $divisors;
}

// Lista de números que serão testados
$testNumber = [12,16,20,25,30];

// Loop que mostra os divisores de cada número da lista
foreach($testNumber as $num){
    $divisors = findDivisors($num);
    echo "<br>Os divisores de $num são: ".implode(", " ,$divisors);
}

?>
