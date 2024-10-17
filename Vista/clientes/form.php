<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Registrar Cliente</h1>
          <p>Ingresa los datos para registrar un cliente nuevo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Clientes</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Cliente</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method ="POST" action="?c=cliente&a=GuardarCliente">
                    <legend><?=$titulo?> Cliente</legend>
                    <div class="mb-3">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getId_cliente()?>">
                    </div>
                
                    <div class="mb-3">
                    <label class="form-label" for="Nombre">Nombre</label>
                    <input required class="form-control" name="Nombre" type="text" placeholder="Nombre Cliente" value="<?=$p->getNombreCliente()?>">
                    </div>
                 
                    <div class="mb-3">
                    <label class="form-label" for="Email">Email</label>
                    <input required class="form-control" name="Email" type="text" placeholder="Email" value="<?=$p->getEmailCliente()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="Telefono">Teléfono</label>
                    <input required class="form-control" name="Telefono" type="number" placeholder="Telefono" value="<?=$p->getTelefonoCliente()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="Direccion">Dirección</label>
                    <input required class="form-control" name="Direccion" type="text" placeholder="Direccion" value="<?=$p->getDireccionCliente()?>">
                    </div>

                 </div>
                  <div class="tile-footer">
                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                  </div>
                </form>
              
            </div>
            
          </div>
        </div>
      </div>
    </main>