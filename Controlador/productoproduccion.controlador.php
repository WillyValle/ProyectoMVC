<?php

require_once "Modelo/productoproduccion.php";
require_once "Modelo/produccion.php";
require_once "Modelo/producto.php";

class ProductoProduccionControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new ProductoProduccion;
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/productoproduccion/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearProductoProduccion(){
        //echo "Entrando en FormCrearInventarioMP";
        $titulo="Registrar";
        $p=new ProductoProduccion();

        // Obtener nombres procesos
        $modeloProduccion = new Produccion();
        $produccion = $modeloProduccion->ListarProduccion ();

        // Obtener nombres productos
        $modeloProducto = new Producto();
        $producto = $modeloProducto->Listar ();

        if(isset($_GET['id'])){
            $p=$this->modelo->ObtenerProductoProduccion($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/productoproduccion/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarProductoProduccion(){
        $p=new ProductoProduccion();
        $p->setId_Producto_Produccion(intval($_POST['ID']));
        $p->setId_Producto($_POST['id_producto']);
        $p->setId_Produccion($_POST['id_produccion']);
        $p->setCantidad_Producida($_POST['cantidad_producida']);
        $p->setFecha($_POST['fecha']);

        $p->getId_Producto_Produccion() > 0 ?
        $this->modelo->ActualizarProductoProduccion($p) : 
        $this->modelo->InsertarProductoProduccion($p);

        header("location:?c=productoproduccion");
    }

    public function BorrarProductoProduccion(){
        $this->modelo->EliminarProduccion($_GET["id"]);
        header("location:?c=productoproduccion");
    }
}