<?php
// Incluimos los archivos necesarios
require("articulo.php");
require("pizza.php");
require("bebida.php");

// Creación de los objetos en un array
$articulos = [
    new Articulo("Lasagna", 3.50, 7.00, 20),
    new Articulo("Pan de ajo y mozzarella", 2.00, 4.50, 15),
    new Pizza("Pizza Margarita", 4.00, 8.00, 30, ["Tomate", "Mozzarella", "Albahaca"]),
    new Pizza("Pizza Pepperoni", 5.00, 10.00, 25, ["Tomate", "Mozzarella", "Pepperoni"]),
    new Pizza("Pizza Vegetal", 4.50, 9.00, 18, ["Tomate", "Mozzarella", "Verduras Variadas"]),
    new Pizza("Pizza 4 quesos", 5.50, 11.00, 20, ["Mozzarella", "Gorgonzola", "Parmesano", "Fontina"]),
    new Bebida("Refresco", 1.00, 2.00, 50, false),
    new Bebida("Cerveza", 1.50, 3.00, 40, true)
];

// Llamada a las funciones
mostrarMenu($articulos);
mostrarMasVendidos($articulos);
mostrarMasLucrativos($articulos);

// Función mostrarMenu que muestra el menú separado en secciones según el tipo de artículo
function mostrarMenu($articulos)
{
    echo "<h1>Nuestro menú</h1>";

    echo "<h2>Pizzas</h2>";
    foreach ($articulos as $articulo) {
        if (get_class($articulo) == "Pizza") {
            echo $articulo->getNombre() . "<br>";
        }
    }

    echo "<h2>Bebidas</h2>";
    foreach ($articulos as $articulo) {
        if (get_class($articulo) == "Bebida") {
            echo $articulo->getNombre() . "<br>";
        }
    }

    echo "<h2>Otros</h2>";
    foreach ($articulos as $articulo) {
        if (get_class($articulo) != "Pizza" && get_class($articulo) != "Bebida") {
            echo $articulo->getNombre() . "<br>";
        }
    }
}

// Función mostrarMasVendidos que muestra los 3 artículos más vendidos
function mostrarMasVendidos($articulos)
{
    usort($articulos, function ($a, $b) {
        return $b->getContador() - $a->getContador();
    });

    echo "<h1>Los más vendidos</h1>";
    foreach (array_slice($articulos, 0, 3) as $articulo) {
        echo $articulo->getNombre() . " - Vendidos: " . $articulo->getContador() . "<br>";
    }
}

// Función mostrarMasLucrativos que muestra los artículos más lucrativos
function mostrarMasLucrativos($articulos)
{
    usort($articulos, function ($a, $b) {
        $totalBeneficioA = ($a->getPrecio() - $a->getCoste()) * $a->getContador();
        $totalBeneficioB = ($b->getPrecio() - $b->getCoste())  * $b->getContador();
        return $totalBeneficioB - $totalBeneficioA;
    });

    echo "<h2>¡Los más lucrativos!</h2>";
    foreach ($articulos as $item) {
        $beneficio = ($item->getPrecio() * $item->getContador()) - ($item->getCoste() * $item->getContador());
        echo $item->getNombre() . " - Beneficio: " . $beneficio . "€<br>";
    }
}
