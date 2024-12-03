<?php

class Biblioteca {
    private $libros = [];

    public function agregarLibro(Libro $libro) {
        $this->libros[] = $libro;
    }

    public function listarLibros() {
        return $this->libros;
    }

    public function buscarLibro($titulo) {
        foreach ($this->libros as $libro) {
            if (stripos($libro->getTitulo(), $titulo) !== false) {
                return $libro;
            }
        }
        return null;
    }

    public function buscarLibroPorId($id) {
        foreach ($this->libros as $libro) {
            if ($libro->getId() == $id) {
                return $libro;
            }
        }
        return null;
    }

    public function prestarLibro($id) {
        foreach ($this->libros as $libro) {
            if ($libro->getId() == $id && $libro->getEstado() === "disponible") {
                $libro->setEstado("prestado");
                return;
            }
        }
    }
    
    public function devolverLibro($id) {
        foreach ($this->libros as $libro) {
            if ($libro->getId() == $id && $libro->getEstado() === "prestado") {
                $libro->setEstado("disponible");
                return;
            }
        }
    }
}
