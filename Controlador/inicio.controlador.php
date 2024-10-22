<?php

require_once "Modelo/producto.php"; //Añadir el modelo de producto
require_once "Modelo/cliente.php"; // Añadir el modelo de clientes
require_once "Modelo/materiaprima.php"; // Añadir el modelo de materia prima
require_once "Modelo/inventariomp.php";
require_once "Modelo/ordencompra.php";
require_once "Modelo/inventarioproducto.php";
require_once "Modelo/detallepedido.php";


class InicioControlador{
    private $modeloOrden;
    private $modelo;
    private $modeloProducto;
    private $modeloCliente; // Añadir la propiedad para clientes
    private $modeloMateriaPrima; // Añadir la propiedad para materia prima
    private $modeloInventarioMP; // Añadir la propiedad para inventario de materia prima
    


    private $modeloinventarioproducto; // Propiedad Inventario Producto
    private $modelodetallepedido; // Propiedad Detalle Pedido
    

    public function __CONSTRUCT(){
        $this -> modeloProducto = new Producto();
        $this -> modeloCliente = new Cliente(); // Instanciar el modelo de clientes
        $this -> modeloMateriaPrima = new MateriaPrima(); // Instanciar el modelo de materia prima
        $this -> modeloInventarioMP = new InventarioMP(); // Instanciar el modelo de inventario de materia prima
        $this -> modeloOrden = new OrdenCompra();
        $this -> modeloinventarioproducto = new InventarioProducto(); // Instancia Inventario Producto
        $this -> modelodetallepedido = new DetallePedido(); // Instancia Detalle Pedido
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/inicio/principal.php";
        require_once "Vista/pie.php";
    }

}