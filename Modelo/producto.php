<?php

class Producto{

    private $pdo;
   
    private $id_producto;
    private $nombre_producto;
    private $descripcion_producto;
    private $costo_produccion;
    private $cantidad_disponible;
    private $fecha_creacion;
    

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Producto ID
    public function getId_producto() : ?int{
        return $this->id_producto;
    }

    public function setId_producto(int $id){
        $this-> id_producto = $id;
    }

    //Producto Nombre
    public function getNombre_producto() : ?string{
        return $this->nombre_producto;
    }

    public function setNombre_producto(string $name){
        $this-> nombre_producto = $name;
    }

    //Producto descripcion
    public function getDescripcion_producto() : ?string{
        return $this->descripcion_producto;
    }

    public function setDescripcion_producto(string $descripcion){
        $this-> descripcion_producto = $descripcion;
    }

    //Producto costo producto
    public function getCosto_produccion() : ?float{
        return $this->costo_produccion;
    }

    public function setCosto_produccion(float $cos){
        $this-> costo_produccion = $cos;
    }

    //Producto cantidad disponible
    public function getCantidad_disponible() : ?float{
        return $this->cantidad_disponible;
    }

    public function setCantidad_disponible(float $pre){
        $this-> cantidad_disponible = $pre;
    }

    //Producto Fecha Operacion
    public function getFecha_creacion() : ?string{
        return $this->fecha_creacion;
    }

    public function setFecha_creacion(string $fechop= 'default_date'){
        $this-> fecha_creacion= $fechop;
    }

    public function Cantidad() {
        try {
            $consulta = $this->pdo->prepare("SELECT id_producto, nombre_producto, cantidad_disponible AS Cantidad FROM producto;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM producto");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function Insertar(Producto $p){
        try{
            $consulta = "INSERT INTO producto (nombre_producto, descripcion_producto, costo_produccion, cantidad_disponible, fecha_creacion) VALUES 
            (?,?,?,?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getNombre_producto(),
                    $p->getDescripcion_producto(),
                    $p->getCosto_produccion(),
                    $p->getCantidad_disponible(),
                    $p->getFecha_creacion()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener_Producto($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM producto WHERE id_producto=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Producto();
            $p->setId_producto($r->id_producto);
            $p->setNombre_producto($r->nombre_producto);
            $p->setDescripcion_producto($r->descripcion_producto);
            $p->setCosto_produccion($r->costo_produccion);
            $p->setCantidad_disponible($r->cantidad_disponible);
            $p->setFecha_creacion($r->fecha_creacion);

            return $p;
            


        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function Actualizar(Producto $p){
        try{
            $consulta = "UPDATE producto SET 
            nombre_producto=?,
            descripcion_producto=?,
            costo_produccion=?,
            cantidad_disponible=?,
            fecha_creacion=?
            WHERE id_producto=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    
                    $p->getnombre_producto(),
                    $p->getdescripcion_producto(),
                    $p->getCosto_produccion(),
                    $p->getCantidad_disponible(),
                    $p->getFecha_creacion(),
                    $p->getId_producto()
                    
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta = "DELETE FROM producto WHERE id_producto=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}