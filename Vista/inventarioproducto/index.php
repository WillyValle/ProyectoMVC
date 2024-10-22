<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-table"></i> Inventario Productos</h1>
          <p>Descripcion Productos en el Inventario</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Invetario Producto</li>
          <li class="breadcrumb-item active"><a href="#">Inventario Producto</a></li>
        </ul>
      <div><a class="btn btn-primary btn-flat" href="?c=inventarioproducto&a=FormCrearInventarioPRODUCT"><i class="bi bi-plus-circle"></i></a>
      </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Id Producto Inventario</th>
                      <th>Producto</th>
                      <th>Cantidad Disponible</th>
                      <th>Ubicación Almacen</th>
                      <th>Fecha Entrada Almacen</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modeloinventarioproducto->ListarInventarioPRODUCT()as$r): ?>
                    <tr>
                      <td><?=$r->id_inventario_producto?></td>
                      <td><?=$r->id_producto?></td>
                      <td><?=$r->cantidad_disponible?></td>
                      <td><?=$r->ubicacion_almacen?></td>
                      <td><?=$r->fecha_entrada?></td>
                      <td>
                        <a class="btn btn-info btn-flat" href="?c=inventarioproducto&a=FormCrearInventarioPRODUCT&id=<?=$r->id_inventario_producto?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-warning btn-flat" href="?c=inventarioproducto&a=BorrarInventarioPRODUCT&id=<?=$r->id_inventario_producto?>"><i class="bi bi-trash"></i></a>
                      </td>
                    </tr>
                <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>