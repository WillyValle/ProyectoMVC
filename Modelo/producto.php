<?php

class Producto{

    private $pdo;

    private $pro_id;
    private $pro_name;
    private $pro_mar;
    private $pro_cos;
    private $pro_pre;
    private $pro_can;
    private $pro_img;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Producto ID
    public function getPro_id() : ?int{
        return $this->pro_id;
    }

    public function setPro_id(int $id){
        $this-> pro_id = $id;
    }

    //Producto Name
    public function getPro_name() : ?string{
        return $this->pro_name;
    }

    public function setPro_name(string $name){
        $this-> pro_name = $name;
    }

    //Producto Marca
    public function getPro_mar() : ?string{
        return $this->pro_mar;
    }

    public function setPro_mar(string $mar){
        $this-> pro_mar = $mar;
    }

    //Producto Costo
    public function getPro_cos() : ?float{
        return $this->pro_cos;
    }

    public function setPro_cos(float $cos){
        $this-> pro_cos = $cos;
    }

    //Producto Precio
    public function getPro_pre() : ?float{
        return $this->pro_pre;
    }

    public function setPro_pre(float $pre){
        $this-> pro_pre = $pre;
    }

    //Producto Cantidad
    public function getPro_can() : ?int{
        return $this->pro_can;
    }

    public function setPro_can(int $can){
        $this-> pro_can = $can;
    }

    //Producto Imagen
    public function getPro_img() : ?string{
        return $this->pro_img;
    }

    public function setPro_img(string $img){
        $this-> pro_img = $img;
    }

    public function Cantidad(){
        try{
            $consulta = $this->pdo->prepare("SELECT SUM(pro_can) AS Cantidad FROM productos;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function Listar(){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM productos;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function Insertar(Producto $p){
        try{
            $consulta = "INSERT INTO productos(pro_name,pro_mar,pro_cos,pro_pre,pro_can) VALUES 
            (?,?,?,?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getPro_name(),
                    $p->getPro_mar(),
                    $p->getPro_cos(),
                    $p->getPro_pre(),
                    $p->getPro_can()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta = $this->pdo->prepare("SELECT * FROM productos WHERE pro_id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $p=new Producto();
            $p->setPro_id($r->pro_id);
            $p->setPro_name($r->pro_name);
            $p->setPro_mar($r->pro_mar);
            $p->setPro_cos($r->pro_cos);
            $p->setPro_pre($r->pro_pre);
            $p->setPro_can($r->pro_can);

            return $p;
            


        }catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function Actualizar(Producto $p){
        try{
            $consulta = "UPDATE productos SET 
            pro_name=?,
            pro_mar=?,
            pro_cos=?,
            pro_pre=?,
            pro_can=?
            WHERE pro_id=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getPro_name(),
                    $p->getPro_mar(),
                    $p->getPro_cos(),
                    $p->getPro_pre(),
                    $p->getPro_can(),
                    $p->getPro_id()
                ));

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta = "DELETE FROM productos WHERE pro_id=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}