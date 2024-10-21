<?php

class ProductoProduccion{

    private $pdo;

    private $id_producto_produccion;
    private $id_producto;
    private $id_produccion;
    private $cantidad_producida;
    private $fecha;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Producto Produccion ID
    public function getId_Producto_Produccion() : ?int{
        return $this->id_producto_produccion;
    }

    public function setId_Producto_Produccion(int $id){
        $this-> id_producto_produccion = $id;
    }

    //Producto ID
    public function getId_Producto() : ?int{
        return $this->id_producto;
    }

    public function setId_Producto(int $id){
        $this-> id_producto = $id;
    }

    //Produccion ID
    public function getId_Produccion() : ?int{
        return $this->id_produccion;
    }

    public function setId_Produccion(int $id){
        $this-> id_produccion = $id;
    }

    //Cantidad Producida
    public function getCantidad_Producida() : ?string{
        return $this->cantidad_producida;
    }

    public function setCantidad_Producida(string $cantidad_producida){
        $this-> cantidad_producida = $cantidad_producida;
    }

    //Fecha
    public function getFecha() : ?string{
        return $this->fecha;
    }

    public function setFecha(string $fecha){
        $this-> fecha = $fecha;
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

    public function ListarProductoProduccion(){
        try{
            $consulta = $this->pdo->prepare
            ("SELECT prodp.*,procp.nombre_proceso AS nombre_proceso,p.nombre_producto
            FROM 
                producto_produccion prodp
            INNER JOIN 
                produccion imp ON prodp.id_produccion = imp.id_produccion
            INNER JOIN 
                proceso_produccion procp ON imp.id_proceso = procp.id_proceso
            INNER JOIN 
                producto p ON prodp.id_producto = p.id_producto;
            ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function InsertarProductoProduccion(ProductoProduccion $p){
        try{
            $consulta = "INSERT INTO producto_produccion
            (id_producto,id_produccion,cantidad_producida,fecha) VALUES 
            (?,?,?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getId_Producto(),
                    $p->getId_Produccion(),
                    $p->getCantidad_Producida(),
                    $p->getFecha()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerProductoProduccion($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM producto_produccion 
            WHERE id_producto_produccion=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new ProductoProduccion();
            $p->setId_Producto_Produccion($r->id_producto_produccion);
            $p->setId_Producto($r->id_producto);
            $p->setId_Produccion($r->id_produccion);
            $p->setCantidad_Producida($r->cantidad_producida);
            $p->setFecha($r->fecha);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ActualizarProductoProduccion(ProductoProduccion $p){
        try{
            $consulta = "UPDATE producto_produccion SET 
            id_producto=?,
            id_produccion=?,
            cantidad_producida=?,
            fecha=?
            WHERE id_producto_produccion=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getId_Producto(),
                    $p->getId_Produccion(),
                    $p->getCantidad_Producida(),
                    $p->getFecha(),
                    $p->getId_Producto_Produccion()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function EliminarProductoProduccion($id){
        try{
            $consulta = "DELETE FROM producto_produccion WHERE id_producto_produccion=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}