¿<?php

require_once "Modelo/pedido.php";
require_once "Modelo/producto.php";

class PedidoControlador {

    private $modeloPedido;

    public function __CONSTRUCT() {
        $this->modeloPedido = new Pedido();
    }

    public function Inicio() {
        require_once "Vista/encabezado.php";
        require_once "Vista/pedido/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearPedido() {
        $titulo = "Registrar";
        $pedido = new Pedido();

        // Obtener todos los productos
        $modeloProducto = new Producto();
        $productos = $modeloProducto->Listar();

        if (isset($_GET['id'])) {
            $pedido = $this->modeloPedido->ObtenerPedido($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/pedido/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarPedido() {
        $pedido = new Pedido();

        // Verificar si el ID está vacío o no
        if (!empty($_POST['ID'])) {
            $pedido->setIdPedido((int)$_POST['ID']);
        }

        $pedido->setIdCliente((int)$_POST['id_cliente']);
        $pedido->setFechaPedido($_POST['fecha_pedido']);
        $pedido->setEstadoPedido($_POST['estado_pedido']);
        $pedido->setFechaEntrega($_POST['fecha_entrega']);

        if ($pedido->getIdPedido()) {
            $this->modeloPedido->ActualizarPedido($pedido);
        } else {
            $this->modeloPedido->InsertarPedido($pedido);
        }

        header("location:?c=pedido");
    }

    public function BorrarPedido() {
        $this->modeloPedido->EliminarPedido($_GET["id"]);
        header("location:?c=pedido");
    }
}
?>
