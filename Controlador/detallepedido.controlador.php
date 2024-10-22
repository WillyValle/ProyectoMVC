<?php

require_once "Modelo/detallepedido.php";
//require_once "Modelo/pedido.php";
require_once "Modelo/producto.php";

class DetallePedidoControlador{

    private $modelodetallepedido;

    public function __CONSTRUCT(){
        $this->modelodetallepedido=new DetallePedido();
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/detallepedido/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearDetallePedido(){
        $titulo="Registrar";
        $p=new DetallePedido();
           
        // Obtener los productos
        $modelo = new Producto();
        $selectproductos= $modelo->Listar ();

       

        // Añade esta línea para depuración
        //var_dump($materiasPrimas);

        if(isset($_GET['id'])){
            $p=$this->modelodetallepedido->ObtenerDetallePedido($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/detallepedido/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarDetallePedido(){
        $p=new DetallePedido();
        $p->setId_detalle_Pedido(intval($_POST['ID']));
        $p->setId_pedido($_POST['id_pedido']);
        $p->setId_producto($_POST['id_producto']);
        $p->setCantidad($_POST['cantidad']);
        $p->setPrecioUnitario($_POST['precio_unitario']);
        $p->setSubtotal($_POST['subtotal']);

        $p->getId_detalle_Pedido() > 0 ?
        $this->modelodetallepedido->ActualizarDetallePedido($p) : 
        $this->modelodetallepedido->InsertarDetallePedido($p);

        header("location:?c=detallepedido");
    }

    public function BorrarDetallePedido(){
        $this->modelodetallepedido->EliminarDetallePedido($_GET["id"]);
        header("location:?c=detallepedido");
    }
}
