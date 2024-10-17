<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-table"></i> Data Table</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      <div><a class="btn btn-primary btn-flat" href="?c=materiaprima&a=FormCrearMP"><i class="bi bi-plus-circle"></i></a>
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
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Unidad de Medida</th>
                      <th>Costo Unitario</th>
                      <th>Fecha de Ingreso</th>
                      <th>Fecha Actualizacion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modeloMateriaPrima->ListarMP()as$r): ?>
                    <tr>
                      <td><?=$r->id_materia_prima?></td>
                      <td><?=$r->nombre?></td>
                      <td><?=$r->descripcion?></td>
                      <td><?=$r->unidad_medida?></td>
                      <td><?=$r->costo_unitario?></td>
                      <td><?=$r->fecha_ingreso?></td>
                      <td><?=$r->fecha_actualizacion?></td>
                      <td>
                        <a class="btn btn-info btn-flat" href="?c=materiaprima&a=FormCrearMP&id=<?=$r->id_materia_prima?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-warning btn-flat" href="?c=materiaprima&a=BorrarMP&id=<?=$r->id_materia_prima?>"><i class="bi bi-trash"></i></a>
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