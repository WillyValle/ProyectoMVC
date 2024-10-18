<?php

class Proceso{

    private $pdo;

    private $id_proceso;
    private $nombre_proceso;
    private $descripcion_proceso;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Proceso ID
    public function getId_Proceso() : ?int{
        return $this->id_proceso;
    }

    public function setId_Proceso(int $id){
        $this-> id_proceso = $id;
    }

    //Nombre Proceso
    public function getNombre_Proceso() : ?string{
        return $this->nombre_proceso;
    }

    public function setNombre_Proceso(string $name){
        $this-> nombre_proceso = $name;
    }

    //Descripcion Proceso
    public function getDescripcion_Proceso() : ?string{
        return $this->descripcion_proceso;
    }

    public function setDescripcion_Proceso(string $descripcion){
        $this-> descripcion_proceso = $descripcion;
    }

    /*public function CantidadCliente(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(id_cliente) AS CantidadCliente FROM cliente;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }*/

    public function ListarProceso(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM proceso_produccion;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function InsertarProceso(Proceso $p){
        try{
            $consulta = "INSERT INTO proceso_produccion(nombre_proceso,descripcion_proceso) VALUES 
            (?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getNombre_Proceso(),
                    $p->getDescripcion_Proceso(),
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerProceso($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM proceso_produccion WHERE id_proceso=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Proceso();
            $p->setId_Proceso($r->id_proceso);
            $p->setNombre_Proceso($r->nombre_proceso);
            $p->setDescripcion_Proceso($r->descripcion_proceso);
            return $p;
            
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function ActualizarProceso(Proceso $p){
        try{
            $consulta = "UPDATE proceso_produccion SET 
            nombre_proceso=?,
            descripcion_proceso=?
            WHERE id_proceso=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getNombre_Proceso(),
                    $p->getDescripcion_Proceso(),
                    $p->getId_Proceso()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function EliminarProceso($id){
        try{
            $consulta = "DELETE FROM proceso_produccion WHERE id_proceso=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}