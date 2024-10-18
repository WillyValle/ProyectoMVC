<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-table"></i> Inventario Materia Prima</h1>
          <p>Descripción de la cantidad de materia prima</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Materia Prima</li>
          <li class="breadcrumb-item active"><a href="#">Inventario Materia Prima</a></li>
        </ul>
      <div><a class="btn btn-primary btn-flat" href="?c=inventariomp&a=FormCrearInventarioMP"><i class="bi bi-plus-circle"></i></a>
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
                      <th>Materia Prima</th>
                      <th>Cantidad Disponible</th>
                      <th>Ubicación</th>
                      <th>Fecha Actualizacion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modelo->ListarInventarioMP()as$r): ?>
                    <tr>
                      <td><?=$r->id_inventario_mp?></td>
                      <td><?=$r->nombre_materia_prima?></td>
                      <td><?=$r->cantidad_disponible?></td>
                      <td><?=$r->ubicacion?></td>
                      <td><?=$r->fecha_actualizacion?></td>
                      <td>
                        <a class="btn btn-info btn-flat" href="?c=inventariomp&a=FormCrearInventarioMP&id=<?=$r->id_inventario_mp?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-warning btn-flat" href="?c=inventariomp&a=BorrarInventarioMP&id=<?=$r->id_inventario_mp?>"><i class="bi bi-trash"></i></a>
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