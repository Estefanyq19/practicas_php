<!-- Ejercicio 4:

Tenemos un sistema donde mostramos mensajes en distintos tipos de salida, 
como por consola, formato JSON y archivo TXT. Debes crear un programa donde 
se muestren todos estos tipos de salidas.

Para este propósito, aplica el patrón de diseño Strategy. -->

<?php
interface EstrategiaSalida {
    public function mostrar(string $mensaje): void;
}
class SalidaConsola implements EstrategiaSalida {
    public function mostrar(string $mensaje): void {
        echo "MENSAJE ESCRITO EN CONSOLA: $mensaje" . PHP_EOL;
    }
}
class SalidaJSON implements EstrategiaSalida {
    public function mostrar(string $mensaje): void {
        echo json_encode(["MENSAJE" => $mensaje]) . PHP_EOL;
    }
}
class SalidaArchivoTXT implements EstrategiaSalida {
    private string $nombreArchivo;

    public function __construct(string $nombreArchivo = "salida.txt") {
        $this->nombreArchivo = $nombreArchivo;
    }

    public function mostrar(string $mensaje): void {
        file_put_contents($this->nombreArchivo, "mensaje: $mensaje" . PHP_EOL, FILE_APPEND);
        echo "<br>MENSAJE GUARDADO: $this->nombreArchivo" . PHP_EOL;
    }
}

class SistemaMensajes {
    private EstrategiaSalida $estrategia;

    public function __construct(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function setEstrategia(EstrategiaSalida $estrategia): void {
        $this->estrategia = $estrategia;
    }

    public function mostrarMensaje(string $mensaje): void {
        $this->estrategia->mostrar($mensaje);
    }
}

$sistema = new SistemaMensajes(new SalidaConsola());
$sistema->mostrarMensaje("Hola kenia<br>");

$sistema->setEstrategia(new SalidaJSON());
$sistema->mostrarMensaje("Hola a todos");

$sistema->setEstrategia(new SalidaArchivoTXT("saludo.txt"));
$sistema->mostrarMensaje("Hola de nuevo :3");
?>