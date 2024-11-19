<!--Problema de Frecuencia de Caracteres:
Implementa una función que tome una cadena de texto y devuelva un array asociativo 
que muestre la frecuencia de cada carácter en la cadena.-->

<?php

function fCharacter($text){
    $frequency = [];

    $text = str_replace(' ','',$text);

    foreach(str_split($text) as $character){
        if(isset($frequency[$character])){
            $frequency[$character]++;
        }else{
            $frequency[$character]=1;
        }
    }

    return $frequency;
}

$text = "Hola Kenia";
$frequency = fCharacter($text);

echo "Frecuencia de caracteres";
print_r($frequency);