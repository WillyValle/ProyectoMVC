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
      <div><a class="btn btn-primary btn-flat" href="?c=cliente&a=FormCrearCliente"><i class="bi bi-plus-circle"></i></a>
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
                      <th>Email</th>
                      <th>Telefono</th>
                      <th>Direccion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modeloCliente->ListarCliente()as$r): ?>
                    <tr>
                      <td><?=$r->id_cliente?></td>
                      <td><?=$r->nombre?></td>
                      <td><?=$r->email?></td>
                      <td><?=$r->telefono?></td>
                      <td><?=$r->direccion?></td>
                      <td>
                        <a class="btn btn-info btn-flat" href="?c=cliente&a=FormCrearCliente&id=<?=$r->id_cliente?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-warning btn-flat" href="?c=cliente&a=BorrarCliente&id=<?=$r->id_cliente?>"><i class="bi bi-trash"></i></a>
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