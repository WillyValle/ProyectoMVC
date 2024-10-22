<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-table"></i> Produccion</h1>
          <p>Descripción produccion en proceso</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Producción</li>
          <li class="breadcrumb-item active"><a href="#">Producción</a></li>
        </ul>
      <div><a class="btn btn-primary btn-flat" href="?c=produccion&a=FormCrearProduccion"><i class="bi bi-plus-circle"></i></a>
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
                      <th>Tipo de Proceso</th>
                      <th>Materia Prima</th>
                      <th>Cantidad Usada de Materia Prima</th>
                      <th>Fecha de Produccion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modelo->ListarProduccion()as$r): ?>
                    <tr>
                      <td><?=$r->id_produccion?></td>
                      <td><?=$r->nombre_proceso?></td>
                      <td><?=$r->nombre_materia_prima?></td>
                      <td><?=$r->cantidad_usada?></td>
                      <td><?=$r->fecha_produccion?></td>
                      <td>
                        <a class="btn btn-info btn-flat" href="?c=produccion&a=FormCrearProduccion&id=<?=$r->id_produccion?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-warning btn-flat" href="?c=produccion&a=BorrarProduccion&id=<?=$r->id_produccion?>"><i class="bi bi-trash"></i></a>
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