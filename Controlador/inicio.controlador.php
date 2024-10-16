<?php

require_once "Modelo/producto.php";


class InicioControlador{
   public $modelo;

    public function __CONSTRUCT(){
        $this -> modelo = new Producto();
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/inicio/principal.php";
        require_once "Vista/pie.php";
    }

}