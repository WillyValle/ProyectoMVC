<?php

require_once "Modelo/materiaprima.php";

class MateriaPrimaControlador{

    private $modeloMateriaPrima;

    public function __CONSTRUCT(){
        $this->modeloMateriaPrima=new MateriaPrima;
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/materiaprima/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearMP(){
        $titulo="Registrar";
        $p=new MateriaPrima();
        if(isset($_GET['id'])){
            $p=$this->modeloMateriaPrima->ObtenerMP($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/materiaprima/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarMP(){
        $p=new MateriaPrima();
        $p->setId_MP(intval($_POST['ID']));
        $p->setNombreMP($_POST['Nombre']);
        $p->setDescripcionMP($_POST['Descripcion']);
        $p->setUnidad_MedidaMP($_POST['unidad_medida']);
        $p->setCostoMP($_POST['costo_unitario']);
        $p->setIngresoFecha($_POST['fecha_ingreso']);
        $p->setUpdateDate($_POST['fecha_actualizacion']);

        $p->getId_MP() > 0 ?
        $this->modeloMateriaPrima->ActualizarMP($p) : 
        $this->modeloMateriaPrima->InsertarMP($p);

        header("location:?c=materiaprima");
    }

    public function BorrarMP(){
        $this->modeloMateriaPrima->EliminarMP($_GET["id"]);
        header("location:?c=materiaprima");
    }

}