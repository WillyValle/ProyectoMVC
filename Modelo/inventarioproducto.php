<?php

class InventarioProducto{

    private $pdo;

    private $id_inventario_producto;
    private $id_producto;
    private $cantidad_disponible;
    private $ubicacion_Almacen;
    private $fecha_entrada;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Inventario id
    public function getIdInventarioProduct() : ?int{
        return $this->id_inventario_producto;
    }

    public function setIdInventarioProduct(int $id){
        $this-> id_inventario_producto = $id;
    }

    //Id producto
    public function getId_producto() : ?int{
        return $this->id_producto;
    }

    public function setId_producto(int $IdPro){
        $this-> id_producto = $IdPro;
    }

    //Inventario Cantidad Disponible
    public function getCantidadDisponible() : ?float{
        return $this-> cantidad_disponible;
    }

    public function setCantidadDisponible(float $Cantidad){
        $this-> cantidad_disponible = $Cantidad;
    }

    //Inventario Ubicacion Almacen
    public function getUbicacionAlmacen() : ?string{
        return $this->ubicacion_Almacen;
    }

    public function setUbicacionAlmacen(string $ubicacion){
        $this-> ubicacion_Almacen = $ubicacion;
    }

    //Inventario Fecha entrada Almacen
    public function getUpdateDate() : ?string{
        return $this->fecha_entrada;
    }

    public function setUpdateDate(string $updatedate){
        $this-> fecha_entrada = $updatedate;
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

    public function ListarInventarioPRODUCT(){
        try{
            $consulta = $this->pdo->prepare
            ("SELECT * FROM inventario_producto");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function InsertarInventarioPRODUCT(InventarioProducto $p){
        try{
            $consulta = "INSERT INTO inventario_producto
            (id_producto, cantidad_disponible, ubicacion_almacen, fecha_entrada) VALUES 
            (?,?,?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getId_producto(),
                    $p->getCantidadDisponible(),
                    $p->getUbicacionAlmacen(),
                    $p->getUpdateDate()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerInventarioPRODUCT($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM inventario_producto WHERE id_inventario_producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new InventarioProducto();
            $p->setIdInventarioProduct($r->id_inventario_producto);
            $p->setId_producto($r->id_producto);
            $p->setCantidadDisponible($r->cantidad_disponible);
            $p->setUbicacionAlmacen($r->ubicacion_almacen);
            $p->setUpdateDate($r->fecha_entrada);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ActualizarInventarioPRODUCT(InventarioProducto $p){
        try{
            $consulta = "UPDATE inventario_producto SET 
            id_producto=?,
            cantidad_disponible=?,
            ubicacion_almacen=?,
            fecha_entrada=?
            WHERE id_inventario_producto=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    
                    $p->getId_producto(),
                    $p->getCantidadDisponible(),
                    $p->getUbicacionAlmacen(),
                    $p->getUpdateDate(),
                    $p->getIdInventarioProduct()
                    
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function EliminarInventarioPRODUCT($id){
        try{
            $consulta = "DELETE FROM inventario_producto WHERE id_inventario_producto=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}