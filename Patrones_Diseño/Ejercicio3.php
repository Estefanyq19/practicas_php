<!-- Ejercicio 3:

Crear un programa donde sea posible añadir diferentes armas a ciertos personajes 
de videojuegos. Debes utilizar al menos dos personajes para este ejercicio.

Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator.-->

<?php
interface Personaje {
    public function descripcion(): string;
    public function poderDeAtaque(): int;
}

class Sayaying implements Personaje {
    public function descripcion(): string {
        return "ES GOKU <3, ";
    }

    public function poderDeAtaque(): int {
        return 10;
    }
}
class Pirata implements Personaje {
    public function descripcion(): string {
        return "<br><br>ES ZORO :3, ";
    }

    public function poderDeAtaque(): int {
        return 8;
    }
}

abstract class ArmaDecorator implements Personaje {
    protected Personaje $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }

    public function descripcion(): string {
        return $this->personaje->descripcion();
    }

    public function poderDeAtaque(): int {
        return $this->personaje->poderDeAtaque();
    }
}

class Tecnica extends ArmaDecorator {
    public function descripcion(): string {
        return $this->personaje->descripcion() . " ESTA HACIENDO UN KAME HAME HA, PARA ATACAR A ZORO, ";
    }

    public function poderDeAtaque(): int {
        return $this->personaje->poderDeAtaque() + 15;
    }
}

class Katanas extends ArmaDecorator {
    public function descripcion(): string {
        return $this->personaje->descripcion() . " PREPARA SU ESTILO DE 3 KATANAS PARA DEFENDERFE DEL KAME HAME HA ";
    }

    public function poderDeAtaque(): int {
        return $this->personaje->poderDeAtaque() + 10;
    }
}

class Vestimenta extends ArmaDecorator {
    public function descripcion(): string {
        return $this->personaje->descripcion() . ", SE AMARRA SU PAÑUELO PORQUE VA ENSERIO";
    }

    public function poderDeAtaque(): int {
        return $this->personaje->poderDeAtaque() + 5;
    }
}

function mostrarDetalles(Personaje $personaje) {
    echo $personaje->descripcion() . " EL PODER DE ATAQUE ES DE: " . $personaje->poderDeAtaque() . "." . PHP_EOL;
}

$sayaying = new Sayaying();
$pirata = new Pirata();
$sayayingTec = new Tecnica($sayaying);
$katanasVestimenta = new Vestimenta(new Katanas($pirata));
mostrarDetalles($sayayingTec);
mostrarDetalles($katanasVestimenta);
?>