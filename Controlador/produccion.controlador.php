<?php

require_once "Modelo/produccion.php";
require_once "Modelo/inventariomp.php";
require_once "Modelo/proceso.php";

class ProduccionControlador{

    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Produccion;
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/produccion/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearProduccion(){
        //echo "Entrando en FormCrearInventarioMP";
        $titulo="Registrar";
        $p=new Produccion();

        // Obtener nombres procesos
        $modeloProceso = new Proceso();
        $proceso = $modeloProceso->ListarProceso ();

        // Obtener nombres materias primas
        $modeloInventarioMP = new InventarioMP();
        $inventario = $modeloInventarioMP->ListarInventarioMP ();

        if(isset($_GET['id'])){
            $p=$this->modelo->ObtenerProduccion($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/produccion/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarProduccion(){
        $p=new Produccion();
        $p->setId_Produccion(intval($_POST['ID']));
        $p->setId_Proceso($_POST['id_proceso']);
        $p->setIdInventarioMP($_POST['id_inventario_mp']);
        $p->setCantidad_Usada($_POST['cantidad_usada']);
        $p->setFecha_Produccion($_POST['fecha_produccion']);

        $p->getId_Produccion() > 0 ?
        $this->modelo->ActualizarProduccion($p) : 
        $this->modelo->InsertarProduccion($p);

        header("location:?c=produccion");
    }

    public function BorrarProduccion(){
        $this->modelo->EliminarProduccion($_GET["id"]);
        header("location:?c=produccion");
    }
}