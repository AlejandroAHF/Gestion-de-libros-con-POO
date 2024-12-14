<?php
    // Array global que almacena la lista de libros. Cada libro es un subarray con: título, autor, categoría y disponibilidad.
    $libros = array(
        array('farenheit', 'desconocido', 'misterio', 'Disponible'),
        array('desconocido', 'desconocido', 'desconocido', 'disponible')
    );

    // Clase que representa un libro y proporciona métodos para gestionarlo.
    class Libro {
        // Propiedad privada que almacena los datos de un libro (título, autor, categoría, estado).
        private $libro;

        // Constructor: Inicializa el objeto libro con los datos proporcionados.
        public function __construct($titulo, $autor, $categoria) {
            $this->libro = array($titulo, $autor, $categoria, 'Disponible');
        }

        // Método para agregar el libro actual al array global $libros.
        public function AgregarLibro() {
            global $libros; // Accede a la variable global $libros.
            array_push($libros, $this->libro); // Agrega el libro al final del array.
        }

        // Método para editar un libro existente en el array global $libros.
        // Recibe el índice del libro a editar y los nuevos valores para título, autor y categoría.
        public function EditarLibro($index, $titulo, $autor, $categoria) {
            global $libros; // Accede a la variable global $libros.
            $libros[$index][0] = $titulo;   // Actualiza el título.
            $libros[$index][1] = $autor;    // Actualiza el autor.
            $libros[$index][2] = $categoria; // Actualiza la categoría.
        }

        // Método para eliminar un libro del array global $libros basado en su índice.
        public function EliminarLibro($libro) {
            global $libros; // Accede a la variable global $libros.
            unset($libros[$libro]); // Elimina el elemento con el índice especificado.
            $libros = array_values($libros); // Reindexa el array después de eliminar el elemento.
        }

        // Método para buscar libros en el array global $libros según un criterio (Libro, Autor, Categoría).
        // Muestra la información de los libros que coincidan con el valor buscado.
        public function BuscarLibro($criterio, $valor) {
            global $libros; // Accede a la variable global $libros.
            if ($criterio == "Libro") { // Buscar por título.
                foreach ($libros as $libro) {
                    if ($libro[0] == $valor) { // Coincidencia con el título.
                        echo "------------------------------------".PHP_EOL;
                        echo "Libro: ".$libro[0].PHP_EOL;
                        echo "Autor: ".$libro[1].PHP_EOL;
                        echo "Categoria: ".$libro[2].PHP_EOL;
                        echo "Disponibilidad: ".$libro[3].PHP_EOL;
                    }
                }
            } else if ($criterio == "Autor") { // Buscar por autor.
                foreach ($libros as $libro) {
                    if ($libro[1] == $valor) { // Coincidencia con el autor.
                        echo "------------------------------------".PHP_EOL;
                        echo "Libro: ".$libro[0].PHP_EOL;
                        echo "Autor: ".$libro[1].PHP_EOL;
                        echo "Categoria: ".$libro[2].PHP_EOL;
                        echo "Disponibilidad: ".$libro[3].PHP_EOL;
                    }
                }
            } else if ($criterio == "Categoria") { // Buscar por categoría.
                foreach ($libros as $libro) {
                    if ($libro[2] == $valor) { // Coincidencia con la categoría.
                        echo "------------------------------------".PHP_EOL;
                        echo "Libro: ".$libro[0].PHP_EOL;
                        echo "Autor: ".$libro[1].PHP_EOL;
                        echo "Categoria: ".$libro[2].PHP_EOL;
                        echo "Disponibilidad: ".$libro[3].PHP_EOL;
                    }
                }
            } else {
                // Mensaje si no se encuentra ningún libro con el criterio dado.
                echo "No se ha encontrado ningún libro";
            }
        }
    }

    // Clase Biblioteca que hereda de la clase Libro.
    // Añade funcionalidad adicional para gestionar préstamos.
    class Biblioteca extends Libro {
        // Método para cambiar el estado de un libro a "En Uso" (simular un préstamo).
        public function PrestamoLibros($libro) {
            global $libros; // Accede a la variable global $libros.
            $libros[$libro][3] = "En Uso"; // Cambia la disponibilidad del libro.
        }
    }

    // Creación de una instancia de la clase Biblioteca con datos iniciales.
    $biblioteca = new Biblioteca('mormon', 'desconocido', 'sepajuda');
    $biblioteca->AgregarLibro(); // Agrega el libro recién creado al array global.
    $biblioteca->EditarLibro(1, "Habitos Atomicos", "James Clear", "Haitos XD"); // Edita el libro con índice 1.
    $biblioteca->EliminarLibro(0); // Elimina el libro con índice 0.
    $biblioteca->BuscarLibro("Autor", "desconocido"); // Busca libros cuyo autor sea "desconocido".
    $biblioteca->PrestamoLibros(0); // Cambia la disponibilidad del libro con índice 0 a "En Uso".

    // Imprime todos los libros actuales en la biblioteca.
    echo "********************************************************".PHP_EOL;
    foreach ($libros as $libro) {
        echo "------------------------------------".PHP_EOL;
        echo "Libro: ".$libro[0].PHP_EOL;
        echo "Autor: ".$libro[1].PHP_EOL;
        echo "Categoria: ".$libro[2].PHP_EOL;
        echo "Disponibilidad: ".$libro[3].PHP_EOL;
    } 
?>
