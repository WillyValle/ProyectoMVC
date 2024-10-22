<?php

class Produccion{

    private $pdo;

    private $id_produccion;
    private $id_proceso;
    private $id_inventario_mp;
    private $cantidad_usada;
    private $fecha_produccion;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Produccion ID
    public function getId_Produccion() : ?int{
        return $this->id_produccion;
    }

    public function setId_Produccion(int $id){
        $this-> id_produccion = $id;
    }

    //Proceso ID
    public function getId_Proceso() : ?int{
        return $this->id_proceso;
    }

    public function setId_Proceso(int $id){
        $this-> id_proceso = $id;
    }

    //Inventario Materia Prima ID
    public function getIdInventarioMP() : ?int{
        return $this->id_inventario_mp;
    }

    public function setIdInventarioMP(int $id){
        $this-> id_inventario_mp = $id;
    }

    //Cantidad Usada
    public function getCantidad_Usada() : ?string{
        return $this->cantidad_usada;
    }

    public function setCantidad_Usada(string $cantidad_usada){
        $this-> cantidad_usada = $cantidad_usada;
    }

    //Fecha Produccion
    public function getFecha_Produccion() : ?string{
        return $this->fecha_produccion;
    }

    public function setFecha_Produccion(string $fecha_produccion){
        $this-> fecha_produccion = $fecha_produccion;
    }


    /*public function Cantidad(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(pro_can) AS Cantidad FROM productos;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }*/

    public function ListarProduccion(){
        try{
            $consulta = $this->pdo->prepare
            ("SELECT p.*,mp.nombre AS nombre_materia_prima,pp.nombre_proceso
            FROM 
                produccion p
            INNER JOIN 
                inventariomateriaprima imp ON p.id_inventario_mp = imp.id_inventario_mp
            INNER JOIN 
                materia_prima mp ON imp.id_materia_prima = mp.id_materia_prima
            INNER JOIN 
                proceso_produccion pp ON p.id_proceso = pp.id_proceso;
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function InsertarProduccion(Produccion $p){
        try{
            $consulta = "INSERT INTO produccion
            (id_proceso, id_inventario_mp,cantidad_usada,fecha_produccion) VALUES 
            (?,?,?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getId_Proceso(),
                    $p->getIdInventarioMP(),
                    $p->getCantidad_Usada(),
                    $p->getFecha_Produccion()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerProduccion($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM produccion WHERE id_produccion=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Produccion();
            $p->setId_Produccion($r->id_produccion);
            $p->setId_Proceso($r->id_proceso);
            $p->setIdInventarioMP($r->id_inventario_mp);
            $p->setCantidad_Usada($r->cantidad_usada);
            $p->setFecha_Produccion($r->fecha_produccion);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ActualizarProduccion(Produccion $p){
        try{
            $consulta = "UPDATE produccion SET 
            id_proceso=?,
            id_inventario_mp=?,
            cantidad_usada=?,
            fecha_produccion=?
            WHERE id_produccion=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getId_Proceso(),
                    $p->getIdInventarioMP(),
                    $p->getCantidad_Usada(),
                    $p->getFecha_Produccion(),
                    $p->getId_Produccion()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function EliminarProduccion($id){
        try{
            $consulta = "DELETE FROM produccion WHERE id_produccion=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}