<?php

namespace App;

// Classe simples usada para demonstrar testes unitários
class Calculator
{

    // Soma dois números e devolve o resultado
    public function add($a, $b)
    {
        return $a + $b;
    }

    // Divide $a por $b e protege contra divisão por zero
    public function divide($a, $b)
    {
        if ($b == 0)
            throw new \InvalidArgumentException("Divisão por zero não é permitida");
        return $a / $b;
    }

}
