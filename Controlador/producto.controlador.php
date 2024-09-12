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
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/productos/form.php";
        require_once "Vista/pie.php";
    }

    public function Guardar(){
        $p=new Producto();
        $p->setPro_id(intval($_POST['ID']));
        $p->setPro_name($_POST['Nombre']);
        $p->setPro_mar($_POST['Marca']);
        $p->setPro_cos($_POST['Costo']);
        $p->setPro_pre($_POST['Precio']);
        $p->setPro_can($_POST['Cantidad']);

        $p->getPro_id() > 0 ?
        $this->modelo->Actualizar($p) : 
        $this->modelo->Insertar($p);

        header("location:?c=producto");
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=producto");
    }

}