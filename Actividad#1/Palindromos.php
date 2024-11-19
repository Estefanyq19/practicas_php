<!--Problema de Palíndromos:
Implementa una función llamada esPalindromo que determine si una cadena de texto dada es un palíndromo. 
Un palíndromo es una palabra, frase o secuencia que se lee igual en ambas direcciones.-->

<?php

function esPalindromo($text){
    $text = preg_replace('/\s+/','',strtolower($text));
    return $text === strrev($text);
}

$text = "Luz azul";
echo esPalindromo($text)?"$text es un palindromo":"$text no es un palindromo";