<?php

require_once "Modelo/cliente.php";

class ClienteControlador{

    private $modeloCliente;

    public function __CONSTRUCT(){
        $this->modeloCliente=new Cliente;
    }

    public function Inicio(){
        require_once "Vista/encabezado.php";
        require_once "Vista/clientes/index.php";
        require_once "Vista/pie.php";
    }

    public function FormCrearCliente(){
        $titulo="Registrar";
        $p=new Cliente();
        if(isset($_GET['id'])){
            $p=$this->modeloCliente->ObtenerCliente($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "Vista/encabezado.php";
        require_once "Vista/clientes/form.php";
        require_once "Vista/pie.php";
    }

    public function GuardarCliente(){
        $p=new Cliente();
        $p->setId_cliente(intval($_POST['ID']));
        $p->setNombreCliente($_POST['Nombre']);
        $p->setEmailCliente($_POST['Email']);
        $p->setTelefonoCliente($_POST['Telefono']);
        $p->setDireccionCliente($_POST['Direccion']);

        $p->getId_cliente() > 0 ?
        $this->modeloCliente->ActualizarCliente($p) : 
        $this->modeloCliente->InsertarCliente($p);

        header("location:?c=cliente");
    }

    public function BorrarCliente(){
        $this->modeloCliente->EliminarCliente($_GET["id"]);
        header("location:?c=cliente");
    }

}