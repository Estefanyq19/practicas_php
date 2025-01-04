<!--Ejercicio 1:
Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". 
Cada personaje tendrá una lógica diferente en sus ataques y velocidad. 
La creación de los personajes dependerá del nivel del juego:

- En el nivel fácil se creará un personaje "Esqueleto".
- En el nivel difícil se creará un personaje "Zombi".
Debes aplicar el patrón de diseño Factory para la creación de los personajes. -->

<?php
//Creando la interfaz para los personajes
interface Personaje {
    public function atacar();
    public function velocidad();
}

//Creación de clases
class Esqueleto implements Personaje {
    public function atacar() {
        echo "EL ESQUELETO TIRA HUESOS Y SUSTOS <br>";
    }

    public function velocidad() {
        echo "LA VELOCIDAD ES BAJA";
    }
}

class Zombi implements Personaje {
    public function atacar() {
        echo "EL ZOMBI ATACA CON MORDER Y COME CEREBROS <br>";
    }

    public function velocidad() {
        echo "LA VELOCIDDAD ES ALTA";
    }
}

//acá implementaré la clase personajeFactory para crear los personajes según su nivel
class PersonajeFactory {
    public static function crearPersonaje($nivel) {
        if ($nivel === 'facil') {
            return new Esqueleto();
        } elseif ($nivel === 'dificil') {
            return new Zombi();
        } else {
            throw new Exception("Nivel no válido.");
        }
    }
}

$nivel = 'dificil';
$personaje = PersonajeFactory::crearPersonaje($nivel);
$personaje->atacar();
$personaje->velocidad();
