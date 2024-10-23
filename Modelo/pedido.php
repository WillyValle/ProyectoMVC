<?php

class Pedido {
    private $pdo;

    private $id_pedido;
    private $id_cliente;
    private $fecha_pedido;
    private $estado_pedido;
    private $fecha_entrega;

    public function __CONSTRUCT() {
        $this->pdo = BasedeDatos::Conectar();
    }

    // Getters y Setters
    public function getIdPedido() : ?int {
        return $this->id_pedido;
    }

    public function setIdPedido(int $id) {
        $this->id_pedido = $id;
    }

    public function getIdCliente() : ?int {
        return $this->id_cliente;
    }

    public function setIdCliente(int $id) {
        $this->id_cliente = $id;
    }

    public function getFechaPedido() : ?string {
        return $this->fecha_pedido;
    }

    public function setFechaPedido(string $fecha) {
        $this->fecha_pedido = $fecha;
    }

    public function getEstadoPedido() : ?string {
        return $this->estado_pedido;
    }

    public function setEstadoPedido(string $estado) {
        $this->estado_pedido = $estado;
    }

    public function getFechaEntrega() : ?string {
        return $this->fecha_entrega;
    }

    public function setFechaEntrega(string $fecha) {
        $this->fecha_entrega = $fecha;
    }

    // Métodos CRUD
    public function InsertarPedido(Pedido $pedido) {
        try {
            $consulta = "INSERT INTO pedido (id_cliente, fecha_pedido, estado_pedido, fecha_entrega) VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $pedido->getIdCliente(),
                    $pedido->getFechaPedido(),
                    $pedido->getEstadoPedido(),
                    $pedido->getFechaEntrega()
                ));
            $pedido->setIdPedido($this->pdo->lastInsertId());
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarPedido(Pedido $pedido) {
        try {
            $consulta = "UPDATE pedido SET id_cliente = ?, fecha_pedido = ?, estado_pedido = ?, fecha_entrega = ? WHERE id_pedido = ?";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $pedido->getIdCliente(),
                    $pedido->getFechaPedido(),
                    $pedido->getEstadoPedido(),
                    $pedido->getFechaEntrega(),
                    $pedido->getIdPedido()
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function EliminarPedido($id) {
        try {
            $consulta = "DELETE FROM pedido WHERE id_pedido = ?";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerPedido($id) {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM pedido WHERE id_pedido = ?");
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $pedido = new Pedido();
            $pedido->setIdPedido($r->id_pedido);
            $pedido->setIdCliente($r->id_cliente);
            $pedido->setFechaPedido($r->fecha_pedido);
            $pedido->setEstadoPedido($r->estado_pedido);
            $pedido->setFechaEntrega($r->fecha_entrega);

            return $pedido;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarPedidos() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM pedido");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
