<?php

require_once "Modelo/producto.php"; //Añadir el modelo de producto
require_once "Modelo/cliente.php"; // Añadir el modelo de clientes
require_once "Modelo/materiaprima.php"; // Añadir el modelo de materia prima


class InicioControlador{
=======
    private $modeloProducto;
    private $modeloCliente; // Añadir la propiedad para clientes
    private $modeloMateriaPrima; // Añadir la propiedad para materia prima

    public function __CONSTRUCT(){
        $this -> modeloProducto = new Producto();
        $this -> modeloCliente = new Cliente(); // Instanciar el modelo de clientes
        $this -> modeloMateriaPrima = new MateriaPrima(); // Instanciar el modelo de materia prima
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/inicio/principal.php";
        require_once "Vista/pie.php";
    }

}