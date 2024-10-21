<?php

class DetallePedido{

    private $pdo;

    private $id_detalle_pedido;
    private $id_pedido;
    private $id_producto;
    private $cantidad;
    private $precio_unitario;
    private $subtotal;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Detallde Id
    public function getId_detalle_Pedido() : ?int{
        return $this->id_detalle_pedido;
    }

    public function setId_detalle_Pedido(int $idP){
        $this-> id_detalle_pedido = $idP;
    }

    // Pedido ID
    public function getId_pedido() : ?int{
        return $this->id_pedido;
    }

    public function setId_pedido(int $Ip){
        $this-> id_pedido= $Ip;
    }
       
    //Id producto
    public function getId_producto() : ?int{
        return $this->id_producto;
    }

    public function setId_producto(int $IdPro){
        $this-> id_producto = $IdPro;
    }

    //Cantidad Pedido
    public function getCantidad() : ?float{
        return $this-> cantidad;
    }

    public function setCantidad(float $Cant){
        $this-> cantidad = $Cant;
    }

    //Precio Detalle Unitario
    public function getPrecioUnitario() : ?float{
        return $this-> precio_unitario;
    }

    public function setPrecioUnitario(float $PreU){
        $this-> precio_unitario = $PreU;
    }

    //Inventario Fecha entrada Almacen
    public function getSubtotal() : ?float{
        return $this->subtotal;
    }

    public function setSubtotal(float $Sub){
        $this-> subtotal = $Sub;
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

    public function ListarDetallePedido(){
        try{
            $consulta = $this->pdo->prepare
            ("SELECT * FROM detalle_pedido");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function InsertarDetallePedido(DetallePedido $p){
        try{
            $consulta = "INSERT INTO detalle_pedido
            (id_pedido, id_producto, cantidad, precio_unitario, subtotal) VALUES 
            (?,?,?,?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getId_pedido(),
                    $p->getId_producto(),
                    $p->getCantidad(),
                    $p->getPrecioUnitario(),
                    $p->getSubtotal()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ObtenerDetallePedido($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM detalle_pedido WHERE id_detalle_pedido=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new DetallePedido();
            $p->setId_detalle_Pedido($r->id_detalle_pedido);
            $p->setId_pedido($r->id_pedido);
            $p->setId_producto($r->id_producto);
            $p->setCantidad($r->cantidad);
            $p->setPrecioUnitario($r->precio_unitario);
            $p->setSubtotal($r->subtotal);
            return $p;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ActualizarDetallePedido(DetallePedido $p){
        try{
            $consulta = "UPDATE detalle_pedido SET 
            id_pedido=?,
            id_producto=?,
            cantidad=?,
            precio_unitario=?,
            subtotal=?
            WHERE id_detalle_pedido=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getId_pedido(),
                    $p->getId_producto(),
                    $p->getCantidad(),
                    $p->getPrecioUnitario(),
                    $p->getSubtotal(),
                    $p->getId_detalle_Pedido()
                    
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function EliminarDetallePedido($id){
        try{
            $consulta = "DELETE FROM detalle_pedido WHERE id_detalle_pedido=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}