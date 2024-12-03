<?php
require_once 'Libro.php';
require_once 'Biblioteca.php';


$biblioteca = new Biblioteca();

//datos quemados
$biblioteca->agregarLibro(new Libro(1, "Harry Potter y la piedra filosofal", "J.K Rowling", "Fantasía"));
$biblioteca->agregarLibro(new Libro(2, "Harry Potter y la cámara secreta", "J.K Rowling", "Fantasía"));
$biblioteca->agregarLibro(new Libro(3, "Harry Potter y el prisionero de Azkaban", "J.K Rowling", "Fantasía"));
$biblioteca->agregarLibro(new Libro(4, "Harry Potter y el cáliz de fuego", "J.K Rowling", "Fantasía"));
$biblioteca->agregarLibro(new Libro(5, "Divina Comedia", "Dante Alighieri", "Poesía"));
$biblioteca->agregarLibro(new Libro(6, "Eclipse", "Stephenie Meyer", "Novela"));
$biblioteca->agregarLibro(new Libro(7, "Código limpio","Robert C. Martin", "Programación"));

$mensaje = "";

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

    if ($accion === 'prestar' && $id) {
        $libro = $biblioteca->buscarLibroPorId($id);
        if ($libro && $libro->getEstado() === "disponible") {
            $biblioteca->prestarLibro($id);
            $mensaje = "El libro '{$libro->getTitulo()}' ha sido prestado con éxito.";
        } else {
            $mensaje = "El libro no está disponible para préstamo.";
        }
    } elseif ($accion === 'devolver' && $id) {
        $libro = $biblioteca->buscarLibroPorId($id);
        if ($libro && $libro->getEstado() === "prestado") {
            $biblioteca->devolverLibro($id);
            $mensaje = "El libro '{$libro->getTitulo()}' ha sido devuelto con éxito.";
        } else {
            $mensaje = "El libro no está marcado como prestado.";
        }
    }
}

$busqueda = null;
if (isset($_GET['busqueda']) && !empty(trim($_GET['busqueda']))) {
    $tituloBusqueda = trim($_GET['busqueda']);
    $busqueda = $biblioteca->buscarLibro($tituloBusqueda);
    if (!$busqueda) {
        $mensaje = "No se encontraron libros con el título '{$tituloBusqueda}'.";
    }
}

$libros = $biblioteca->listarLibros();

include 'diseño.php';