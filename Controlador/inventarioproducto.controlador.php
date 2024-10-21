<?php

require_once "Modelo/inventarioproducto.php";
require_once "Modelo/producto.php";

class InventarioProductoControlador{

    private $modeloinventarioproducto;

    public function __CONSTRUCT(){
        $this->modeloinventarioproducto=new InventarioProducto;
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/inventarioproducto/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearInventarioPRODUCT(){
        $titulo="Registrar";
        $p=new InventarioProducto();
           
        // Obtener los productos
        $modelo = new Producto();
        $selectproductos= $modelo->Listar ();

        // Añade esta línea para depuración
        //var_dump($materiasPrimas);

        if(isset($_GET['id'])){
            $p=$this->modeloinventarioproducto->ObtenerInventarioPRODUCT($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/inventarioproducto/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarInventarioPRODUCT(){
        $p=new InventarioProducto();
        $p->setIdInventarioProduct(intval($_POST['ID']));
        $p->setId_producto($_POST['id_producto']);
        $p->setCantidadDisponible($_POST['cantidad_disponible']);
        $p->setUbicacionAlmacen($_POST['ubicacion_almacen']);
        $p->setUpdateDate($_POST['fecha_entrada']);

        $p->getIdInventarioProduct() > 0 ?
        $this->modeloinventarioproducto->ActualizarInventarioPRODUCT($p) : 
        $this->modeloinventarioproducto->InsertarInventarioPRODUCT($p);

        header("location:?c=inventarioproducto");
    }

    public function BorrarInventarioPRODUCT(){
        $this->modeloinventarioproducto->EliminarInventarioPRODUCT($_GET["id"]);
        header("location:?c=inventarioproducto");
    }
}