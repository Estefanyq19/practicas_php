<!--Problema de la serie Fibonacci:
Escribe una función llamada generar Fibonacci que reciba un número n como parámetro y genere los primeros n términos de la serie Fibonacci. 
La serie comienza con 0 y 1, y cada término subsiguiente es la suma de los dos anteriores.-->

<?php
function Fibonacci($num) {
    if ($num <= 0) {
        return [];
    }
    $fibonacci = [0, 1];
    for ($i = 2; $i < $num; $i++) {
        $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    
    return array_slice($fibonacci, 0, $num);
}

$num = 4;
$result = Fibonacci($num);

echo "Los primeros $num términos de la serie son: " . implode(", ", $result);
?>