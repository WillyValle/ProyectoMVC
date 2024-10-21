<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-table"></i> Producto Produccion</h1>
          <p>Descripción de los productos en producción</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Productos Producción</li>
          <li class="breadcrumb-item active"><a href="#">Productos Produccioón</a></li>
        </ul>
      <div><a class="btn btn-primary btn-flat" href="?c=productoproduccion&a=FormCrearProductoProduccion"><i class="bi bi-plus-circle"></i></a>
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
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Tipo de Producción</th>
                      <th>Cantidad de Producto Producido</th>
                      <th>Fecha de Produccion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modelo->ListarProductoProduccion()as$r): ?>
                    <tr>
                      <td><?=$r->id_producto_produccion?></td>
                      <td><?=$r->nombre_producto?></td>
                      <td><?=$r->nombre_proceso?></td>
                      <td><?=$r->cantidad_producida?></td>
                      <td><?=$r->fecha?></td>
                      <td>
                        <a class="btn btn-info btn-flat" href="?c=productoproduccion&a=FormCrearProductoProduccion&id=<?=$r->id_producto_produccion?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-warning btn-flat" href="?c=productoproduccion&a=BorrarProductoProduccion&id=<?=$r->id_producto_produccion?>"><i class="bi bi-trash"></i></a>
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