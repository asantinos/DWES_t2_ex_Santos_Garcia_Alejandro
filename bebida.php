<?php
class Bebida extends Articulo
{
    private $alcoholica;

    // Constructor clase hija Bebida
    public function __construct($nombre, $coste, $precio, $contador, $alcoholica)
    {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->alcoholica = $alcoholica;
    }

    // Getter y setter
    public function getAlcoholica()
    {
        return $this->alcoholica;
    }
    public function setAlcoholica($alcoholica)
    {
        $this->alcoholica = $alcoholica;
    }
}
