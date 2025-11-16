<?php

// Variável declarada fora das funções, logo possui escopo global
$message_global = "Esta variável é global";

// Dentro da função criamos outra variável com o mesmo nome (escopo local)
function scopeSample()
{
    $message_global = "Esta é uma variável local";
    return $message_global;
}

// Usando global acessamos e alteramos a variável definida fora da função
function scopeOverideSample(){
    global $message_global;
    $message_global = "Esta é uma variável local";
    return $message_global;
}

// Mostra como o valor global não muda quando a função não usa global
echo "<br>$message_global " . scopeSample(). " $message_global";

// Aqui o global foi alterado, então o texto final muda
echo "<br>$message_global " . scopeOverideSample(). " $message_global";

