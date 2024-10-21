<?php

class MateriaPrima{

    private $pdo;

    private $id_materia_prima;
    private $nombre;
    private $descripcion;
    private $unidad_medida;
    private $costo_unitario;
    private $fecha_ingreso;
    private $fecha_actualizacion;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //MateriaPrima ID
    public function getId_MP() : ?int{
        return $this->id_materia_prima;
    }

    public function setId_MP(int $id){
        $this-> id_materia_prima = $id;
    }

    //MateriaPrima Nombre
    public function getNombreMP() : ?string{
        return $this->nombre;
    }

    public function setNombreMP(string $name){
        $this-> nombre = $name;
    }

    //MateriaPrima Descripcion
    public function getDescripcionMP() : ?string{
        return $this->descripcion;
    }

    public function setDescripcionMP(string $desc){
        $this-> descripcion = $desc;
    }

    //MateriaPrima Unidad Medida (kg, lb)
    public function getUnidad_MedidaMP() : ?string{
        return $this->unidad_medida;
    }

    public function setUnidad_MedidaMP(string $unimedi){
        $this-> unidad_medida = $unimedi;
    }

    //MateriaPrima CostoUnitario
    public function getCostoMP() : ?float{
        return $this->costo_unitario;
    }

    public function setCostoMP(float $costunit){
        $this-> costo_unitario = $costunit;
    }

    //MateriaPrima FechaIngreso
    public function getIngresoFecha() : ?string{
        return $this->fecha_ingreso;
    }

    public function setIngresoFecha(string $entrydate){
        $this-> fecha_ingreso = $entrydate;
    }

    //MateriaPrima FechaActualizacion
    public function getUpdateDate() : ?string{
        return $this->fecha_actualizacion;
    }

    public function setUpdateDate(string $updatedate){
        $this-> fecha_actualizacion = $updatedate;
    }


    public function NivelesMateriaPrima() {
        try {
            $consulta = $this->pdo->prepare("
                SELECT imp.id_materia_prima, mp.nombre, imp.cantidad_disponible, imp.fecha_actualizacion
                FROM inventariomateriaprima imp
                JOIN materia_prima mp ON imp.id_materia_prima = mp.id_materia_prima;
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarMP(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM materia_prima;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function InsertarMP(MateriaPrima $p){
        try{
            $consulta = "INSERT INTO materia_prima(nombre,descripcion,unidad_medida,costo_unitario, fecha_ingreso,fecha_actualizacion) VALUES 
            (?,?,?,?,?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getNombreMP(),
                    $p->getDescripcionMP(),
                    $p->getUnidad_MedidaMP(),
                    $p->getCostoMP(),
                    $p->getIngresoFecha(),
                    $p->getUpdateDate(),
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerMP($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM materia_prima WHERE id_materia_prima=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new MateriaPrima();
            $p->setId_MP($r->id_materia_prima);
            $p->setNombreMP($r->nombre);
            $p->setDescripcionMP($r->descripcion);
            $p->setUnidad_MedidaMP($r->unidad_medida);
            $p->setCostoMP($r->costo_unitario);
            $p->setIngresoFecha($r->fecha_ingreso);
            $p->setUpdateDate($r->fecha_actualizacion);
            return $p;

        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function ActualizarMP(MateriaPrima $p){
        try{
            $consulta = "UPDATE materia_prima SET 
            nombre=?,
            descripcion=?,
            unidad_medida=?,
            costo_unitario=?,
            fecha_ingreso=?,
            fecha_actualizacion=?
            WHERE id_materia_prima=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getNombreMP(),
                    $p->getDescripcionMP(),
                    $p->getUnidad_MedidaMP(),
                    $p->getCostoMP(),
                    $p->getIngresoFecha(),
                    $p->getUpdateDate(),
                    $p->getId_MP()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function EliminarMP($id){
        try{
            $consulta = "DELETE FROM materia_prima WHERE id_materia_prima=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}