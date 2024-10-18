<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-table"></i> Tipos de Procesos</h1>
          <p>Detalle de los tipos de procesos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Producción</li>
          <li class="breadcrumb-item active"><a href="#">Tipos de Procesos</a></li>
        </ul>
      <div><a class="btn btn-primary btn-flat" href="?c=proceso&a=FormCrearProceso"><i class="bi bi-plus-circle"></i></a>
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
                      <th>Nombre Proceso</th>
                      <th>Descripcion Proceso</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modelo->ListarProceso()as$r): ?>
                    <tr>
                      <td><?=$r->id_proceso?></td>
                      <td><?=$r->nombre_proceso?></td>
                      <td><?=$r->descripcion_proceso?></td>
                      <td>
                        <a class="btn btn-info btn-flat" href="?c=proceso&a=FormCrearProceso&id=<?=$r->id_proceso?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-warning btn-flat" href="?c=proceso&a=BorrarProceso&id=<?=$r->id_proceso?>"><i class="bi bi-trash"></i></a>
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