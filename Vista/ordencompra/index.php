<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="bi bi-table"></i> Ordenes de Compra</h1>
      <p>Ordenes pendientes de Confirmar</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
      <li class="breadcrumb-item">Orden de Compra</li>
      <li class="breadcrumb-item active"><a href="#">Ordenes de Compra Generadas</a></li>
    </ul>
    <div><a class="btn btn-primary btn-flat" href="?c=inventariomp&a=FormCrearInventarioMP"><i class="bi bi-plus-circle"></i> Nueva Orden de Compra</a></div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>ID Orden</th>
                  <th>ID Materia Prima</th>
                  <th>Cantidad</th>
                  <th>Fecha Solicitud</th>
                  <th>Costo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($this->modeloOrden->ListarOrdenesCompra() as $orden): ?>
                <tr>
                  <td><?= $orden->id_orden_compra ?></td>
                  <td><?= $orden->id_materia_prima ?></td>
                  <td><?= $orden->cantidad ?></td>
                  <td><?= $orden->fecha_solicitud ?></td>
                  <td><?= $orden->costo ?></td>
                  <td>
                    <a class="btn btn-info btn-flat" href="?c=ordencompra&a=FormCrearOrdenCompra&id=<?= $orden->id_orden_compra ?>"><i class="bi bi-pencil-square"></i> Editar</a>
                    <a class="btn btn-warning btn-flat" href="?c=ordencompra&a=EliminarOrdenCompra&id=<?= $orden->id_orden_compra ?>"><i class="bi bi-trash"></i> Eliminar</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
