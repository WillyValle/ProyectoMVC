<?php

require_once "Modelo/producto.php";

class ProductoControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Producto;
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/productos/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrear(){
        $titulo="Registrar";
        $p=new Producto();
        if(isset($_GET['id_producto'])){
            $p=$this->modelo->Obtener($_GET['id_producto']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/productos/form.php";
        require_once "Vista/pie.php";
    }

    public function Guardar(){
        $p=new Producto();
        $p->setid_producto(intval($_POST['id_producto']));
        $p->setnombre_producto($_POST['nombre_producto']);
        $p->setdescripcion_producto($_POST['descripcion_producto']);
        $p->setcosto_produccion($_POST['costo_producción']);
        $p->setcantidad_disponible($_POST['cantidad_disponible']);
        $p->setfecha_creacion($_POST['fecha_creación']);

        $p->getid_producto() > 0 ?
        $this->modelo->Actualizar($p) : 
        $this->modelo->Insertar($p);

        header("location:?c=producto");
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id_producto"]);
        header("location:?c=producto");
    }

}