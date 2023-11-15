<?php
class Pizza extends Articulo
{
    private $ingredientes;

    // Constructor clase hija Pizza
    public function __construct($nombre, $coste, $precio, $contador, $ingredientes)
    {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->ingredientes = $ingredientes;
    }

    // Getter y setter
    public function getIngredientes()
    {
        return $this->ingredientes;
    }
    public function setIngredientes($ingredientes)
    {
        $this->ingredientes = $ingredientes;
    }
}
