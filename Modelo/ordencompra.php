<?php

class OrdenCompra {

    private $pdo;

    private $id_orden_compra;
    private $No_OrdenCompra; // Nueva propiedad
    private $id_materia_prima;
    private $cantidad;
    private $fecha_solicitud;
    private $costo;

    public function __CONSTRUCT() {
        $this->pdo = BasedeDatos::Conectar();
    }

    // ID Orden Compra
    public function getIdOrdenCompra() : ?string {
        return $this->id_orden_compra;
    }

    public function setIdOrdenCompra(string $id) {
        $this->id_orden_compra = $id;
    }

    // No Orden Compra
    public function getNoOrdenCompra() : ?string {
        return $this->No_OrdenCompra;
    }

    public function setNoOrdenCompra(string $noOrden) {
        $this->No_OrdenCompra = $noOrden;
    }

    // ID Materia Prima
    public function getIdMateriaPrima() : ?int {
        return $this->id_materia_prima;
    }

    public function setIdMateriaPrima(int $id) {
        $this->id_materia_prima = $id;
    }

    // Cantidad
    public function getCantidad() : ?int {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad) {
        $this->cantidad = $cantidad;
    }

    // Fecha Solicitud
    public function getFechaSolicitud() : ?string {
        return $this->fecha_solicitud;
    }

    public function setFechaSolicitud(string $fecha) {
        $this->fecha_solicitud = $fecha;
    }

    // Costo
    public function getCosto() : ?float {
        return $this->costo;
    }

    public function setCosto(float $costo) {
        $this->costo = $costo;
    }

    // Insertar Orden de Compra
    public function InsertarOrdenCompra(OrdenCompra $orden) {
        try {
            $consulta = "INSERT INTO orden_compra (id_orden_compra, No_OrdenCompra, id_materia_prima, cantidad, fecha_solicitud, costo) VALUES (?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $orden->getIdOrdenCompra(),
                    $orden->getNoOrdenCompra(),
                    $orden->getIdMateriaPrima(),
                    $orden->getCantidad(),
                    $orden->getFechaSolicitud(),
                    $orden->getCosto()
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Obtener Orden de Compra
    public function ObtenerOrdenCompra($id) {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM orden_compra WHERE id_orden_compra = ?");
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $orden = new OrdenCompra();
            $orden->setIdOrdenCompra($r->id_orden_compra);
            $orden->setNoOrdenCompra($r->No_OrdenCompra); // Nuevo atributo
            $orden->setIdMateriaPrima($r->id_materia_prima);
            $orden->setCantidad($r->cantidad);
            $orden->setFechaSolicitud($r->fecha_solicitud);
            $orden->setCosto($r->costo);

            return $orden;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Listar Ordenes de Compra
    public function ListarOrdenesCompra() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM orden_compra");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Actualizar Orden de Compra
    public function ActualizarOrdenCompra(OrdenCompra $orden) {
        try {
            $consulta = "UPDATE orden_compra SET No_OrdenCompra = ?, id_materia_prima = ?, cantidad = ?, fecha_solicitud = ?, costo = ? WHERE id_orden_compra = ?";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $orden->getNoOrdenCompra(), // Nuevo atributo
                    $orden->getIdMateriaPrima(),
                    $orden->getCantidad(),
                    $orden->getFechaSolicitud(),
                    $orden->getCosto(),
                    $orden->getIdOrdenCompra()
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Eliminar Orden de Compra
    public function EliminarOrdenCompra($id) {
        try {
            $consulta = "DELETE FROM orden_compra WHERE id_orden_compra = ?";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
