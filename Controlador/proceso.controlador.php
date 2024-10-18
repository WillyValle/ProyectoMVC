<?php

require_once "Modelo/proceso.php";

class ProcesoControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Proceso;
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/proceso/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearProceso(){
        $titulo="Registrar";
        $p=new Proceso();
        if(isset($_GET['id'])){
            $p=$this->modelo->ObtenerProceso($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/proceso/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarProceso(){
        $p=new Proceso();
        $p->setId_Proceso(intval($_POST['ID']));
        $p->setNombre_Proceso($_POST['Nombre']);
        $p->setDescripcion_Proceso($_POST['Descripcion']);

        $p->getId_Proceso() > 0 ?
        $this->modelo->ActualizarProceso($p) : 
        $this->modelo->InsertarProceso($p);

        header("location:?c=proceso");
    }

    public function BorrarProceso(){
        $this->modelo->EliminarProceso($_GET["id"]);
        header("location:?c=proceso");
    }

}