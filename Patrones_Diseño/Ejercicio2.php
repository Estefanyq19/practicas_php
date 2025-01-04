<!-- Ejercicio 2:
Estamos trabajando con distintas versiones de sistemas operativos 
Windows 7 y Windows 10. Al compartir archivos como Word, Excel, Power Point, 
surgen problemas al abrirlos en Windows 10 debido a la falta de compatibilidad con 
la versión Windows 7. Debes crear un programa donde Windows 10 pueda aceptar estos 
archivos independientemente de que sean de versiones anteriores.
Para ello, aplica el patrón de diseño Adapter. -->

<?php
//Creando la interfaz
interface Archivo {
    public function abrir(): string;
}

class ArchivoWindows7 implements Archivo {
    private string $tipo;

    public function __construct(string $tipo) {
        $this->tipo = $tipo;
    }

    public function abrir(): string {
        return "ATENCIÓN..! ABRIENDO ARCHIVO TIPO: $this->tipo EN WINDOWS 7 <br>";
    }
}

class ArchivoWindows10 {
    private string $tipo;

    public function __construct(string $tipo) {
        $this->tipo = $tipo;
    }

    public function abrirArchivoWindows10(): string {
        return "ATENCIÓN..! ABRIENDO ARCHIVO TIPO: $this->tipo EN WINDOWS 10";
    }
}

class AdaptadorArchivoWindows10 implements Archivo {
    private ArchivoWindows10 $archivoWindows10;

    public function __construct(ArchivoWindows10 $archivoWindows10) {
        $this->archivoWindows10 = $archivoWindows10;
    }

    public function abrir(): string {
        return $this->archivoWindows10->abrirArchivoWindows10();
    }
}

function abrirArchivo(Archivo $archivo) {
    echo $archivo->abrir() . PHP_EOL;
}

//Ejemplo para crear un archivo de Windows 7
$archivoWindows7 = new ArchivoWindows7("POWER POINT");
abrirArchivo($archivoWindows7);

//Ejemplo para crear un archivo de Windows 10 usando el adaptado
$archivoWindows10 = new ArchivoWindows10("EXCEL");
$adaptador = new AdaptadorArchivoWindows10($archivoWindows10);
abrirArchivo($adaptador);
?>