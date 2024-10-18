<?php

class InventarioMP{

    private $pdo;

    private $id_inventario_mp;
    private $id_materia_prima;
    private $cantidad_disponible;
    private $ubicacion;
    private $fecha_actualizacion;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Inventario Materia Prima ID
    public function getIdInventarioMP() : ?int{
        return $this->id_inventario_mp;
    }

    public function setIdInventarioMP(int $id){
        $this-> id_inventario_mp = $id;
    }

    //Inventario ID MP
    public function getIdMP() : ?int{
        return $this->id_materia_prima;
    }

    public function setIdMP(int $idmp){
        $this-> id_materia_prima = $idmp;
    }

    //Inventario Cantidad Disponible
    public function getCantidadDisponible() : ?float{
        return $this->cantidad_disponible;
    }

    public function setCantidadDisponible(float $cd){
        $this-> cantidad_disponible = $cd;
    }

    //Inventario Ubicacion
    public function getUbicacion() : ?string{
        return $this->ubicacion;
    }

    public function setUbicacion(string $ubicacion){
        $this-> ubicacion = $ubicacion;
    }

    //Inventario Fecha Actualizacion
    public function getUpdateDate() : ?string{
        return $this->fecha_actualizacion;
    }

    public function setUpdateDate(string $updatedate){
        $this-> fecha_actualizacion = $updatedate;
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

    public function ListarInventarioMP(){
        try{
            $consulta = $this->pdo->prepare
            ("SELECT i.*, m.nombre as nombre_materia_prima 
            FROM inventariomateriaprima i JOIN materia_prima m ON i.id_materia_prima = m.id_materia_prima;;
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function InsertarInventarioMP(InventarioMP $p){
        try{
            $consulta = "INSERT INTO inventariomateriaprima
            (id_materia_prima, cantidad_disponible, ubicacion, fecha_actualizacion) VALUES 
            (?,?,?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getIdMP(),
                    $p->getCantidadDisponible(),
                    $p->getUbicacion(),
                    $p->getUpdateDate()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerInventarioMP($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM inventariomateriaprima WHERE id_inventario_mp=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new InventarioMP();
            $p->setIdInventarioMP($r->id_inventario_mp);
            $p->setIdMP($r->id_materia_prima);
            $p->setCantidadDisponible($r->cantidad_disponible);
            $p->setUbicacion($r->ubicacion);
            $p->setUpdateDate($r->fecha_actualizacion);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ActualizarInventarioMP(InventarioMP $p){
        try{
            $consulta = "UPDATE inventariomateriaprima SET 
            id_materia_prima=?,
            cantidad_disponible=?,
            ubicacion=?,
            fecha_actualizacion=?
            WHERE id_inventario_mp=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getIdMP(),
                    $p->getCantidadDisponible(),
                    $p->getUbicacion(),
                    $p->getUpdateDate(),
                    $p->getIdInventarioMP()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function EliminarInventarioMP($id){
        try{
            $consulta = "DELETE FROM inventariomateriaprima WHERE id_inventario_mp=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}