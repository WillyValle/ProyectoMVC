<?php

class Cliente{

    private $pdo;

    private $id_cliente;
    private $nombre;
    private $email;
    private $telefono;
    private $direccion;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Cliente ID
    public function getId_cliente() : ?int{
        return $this->id_cliente;
    }

    public function setId_cliente(int $id){
        $this-> id_cliente = $id;
    }

    //Cliente Nombre
    public function getNombreCliente() : ?string{
        return $this->nombre;
    }

    public function setNombreCliente(string $name){
        $this-> nombre = $name;
    }

    //Cliente Email
    public function getEmailCliente() : ?string{
        return $this->email;
    }

    public function setEmailCliente(string $mail){
        $this-> email = $mail;
    }

    //Cliente Telefono
    public function getTelefonoCliente() : ?int{
        return $this->telefono;
    }

    public function setTelefonoCliente(int $tel){
        $this-> telefono = $tel;
    }

    //Cliente Direccion
    public function getDireccionCliente() : ?string{
        return $this->direccion;
    }

    public function setDireccionCliente(string $dire){
        $this-> direccion = $dire;
    }

    public function CantidadCliente(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(id_cliente) AS CantidadCliente FROM cliente;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function ListarCliente(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM cliente;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function InsertarCliente(Cliente $p){
        try{
            $consulta = "INSERT INTO cliente(nombre,email,telefono,direccion) VALUES 
            (?,?,?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getNombreCliente(),
                    $p->getEmailCliente(),
                    $p->getTelefonoCliente(),
                    $p->getDireccionCliente()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerCliente($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM cliente WHERE id_cliente=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Cliente();
            $p->setId_cliente($r->id_cliente);
            $p->setNombreCliente($r->nombre);
            $p->setEmailCliente($r->email);
            $p->setTelefonoCliente($r->telefono);
            $p->setDireccionCliente($r->direccion);

            return $p;
            
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function ActualizarCliente(Cliente $p){
        try{
            $consulta = "UPDATE cliente SET 
            nombre=?,
            email=?,
            telefono=?,
            direccion=?
            WHERE id_cliente=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getNombreCliente(),
                    $p->getEmailCliente(),
                    $p->getTelefonoCliente(),
                    $p->getDireccionCliente(),
                    $p->getId_cliente()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function EliminarCliente($id){
        try{
            $consulta = "DELETE FROM cliente WHERE id_cliente=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}