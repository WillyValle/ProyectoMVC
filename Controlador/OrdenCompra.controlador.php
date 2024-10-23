<?php

require_once "Modelo/ordencompra.php";
require_once "Modelo/materiaprima.php";

class OrdenCompraControlador {

    private $modeloOrden;

    public function __CONSTRUCT() {
        $this->modeloOrden = new OrdenCompra();
    }

    public function Inicio() {
        require_once "Vista/encabezado.php";
        require_once "Vista/ordencompra/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearOrdenCompra() {
        $titulo = "Registrar";
        $orden = new OrdenCompra();

        // Obtener todas las materias primas
        $modeloMateriaPrima = new MateriaPrima();
        $materiasPrimas = $modeloMateriaPrima->ListarMP();

        if (isset($_GET['id'])) {
            $orden = $this->modeloOrden->ObtenerOrdenCompra($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/ordencompra/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarOrdenCompra() {
        $orden = new OrdenCompra();
        $orden->setIdOrdenCompra($_POST['ID']);
        $orden->setNoOrdenCompra($_POST['No_OrdenCompra']);
        $orden->setIdMateriaPrima($_POST['id_materia_prima']);
        $orden->setCantidad($_POST['cantidad']);
        $orden->setFechaSolicitud($_POST['fecha_solicitud']);
        $orden->setCosto($_POST['costo']);

        if ($orden->getIdOrdenCompra()) {
            $this->modeloOrden->ActualizarOrdenCompra($orden);
        } else {
            $this->modeloOrden->InsertarOrdenCompra($orden);
        }

        header("location:?c=ordencompra");
    }

    public function EliminarOrdenCompra() {
        $this->modeloOrden->EliminarOrdenCompra($_GET["id"]);
        header("location:?c=ordencompra");
    }
}
?>
