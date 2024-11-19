<!--Problema de números Primos:
Crea una función llamada esPrimo que determine si un número dado es primo o no. 
Un número primo es aquel que solo es divisible por 1 y por sí mismo.-->

<?php

function esPrimo($number){
    if($number <= 1){
        return false;
    }

    for($i = 2; $i <= sqrt($number); $i++){
        if($number % $i == 0){
            return false;
        }
    }

    return true;
}

$number = 2;
if(esPrimo($number)){
    echo "$number es un número primo";
}
else {
    echo "$number no es un número primo";
}