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
      <div><a class="btn btn-primary btn-flat" href="?c=producto&a=FormCrear"><i class="bi bi-plus-circle"></i></a>
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
                      <th>Marca</th>
                      <th>Costo</th>
                      <th>Precio</th>
                      <th>Imagen</th>
                      <th>Cantidad</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modelo->Listar()as$r): ?>
                    <tr>
                      <td><?=$r->pro_id?></td>
                      <td><?=$r->pro_name?></td>
                      <td><?=$r->pro_mar?></td>
                      <td><?=$r->pro_cos?></td>
                      <td><?=$r->pro_pre?></td>
                      <td><?=$r->pro_img?></td>
                      <td><?=$r->pro_can?></td>
                      <td>
                        <a class="btn btn-info btn-flat" href="?c=producto&a=FormCrear&id=<?=$r->pro_id?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-warning btn-flat" href="?c=producto&a=Borrar&id=<?=$r->pro_id?>"><i class="bi bi-trash"></i></a>
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