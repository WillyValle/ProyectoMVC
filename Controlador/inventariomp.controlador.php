<?php

require_once "Modelo/inventariomp.php";
require_once "Modelo/materiaprima.php";

class InventarioMPControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new InventarioMP;
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/inventariomp/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearInventarioMP(){
        //echo "Entrando en FormCrearInventarioMP";
        $titulo="Registrar";
        $p=new InventarioMP();

        // Obtener todas las materias primas
        $modeloMateriaPrima = new MateriaPrima();
        $materiasPrimas = $modeloMateriaPrima->ListarMP ();

        // Añade esta línea para depuración
        //var_dump($materiasPrimas);

        if(isset($_GET['id'])){
            $p=$this->modelo->ObtenerInventarioMP($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/inventariomp/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarInventarioMP(){
        $p=new InventarioMP();
        $p->setIdInventarioMP(intval($_POST['ID']));
        $p->setIdMP($_POST['id_materia_prima']);
        $p->setCantidadDisponible($_POST['cantidad_disponible']);
        $p->setUbicacion($_POST['ubicacion']);
        $p->setUpdateDate($_POST['fecha_actualizacion']);

        $p->getIdInventarioMP() > 0 ?
        $this->modelo->ActualizarInventarioMP($p) : 
        $this->modelo->InsertarInventarioMP($p);

        header("location:?c=inventariomp");
    }

    public function BorrarInventarioMP(){
        $this->modelo->EliminarInventarioMP($_GET["id"]);
        header("location:?c=inventariomp");
    }
}