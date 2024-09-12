<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Registrar Producto</h1>
          <p>Ingresa los datos para registrar un producto nuevo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Productos</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Producto</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method ="POST" action="?c=producto&a=Guardar">
                    <legend><?=$titulo?> Producto</legend>
                    <div class="mb-3">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getPro_id()?>">
                    </div>
                
                    <div class="mb-3">
                    <label class="form-label" for="Nombre">Nombre</label>
                    <input required class="form-control" name="Nombre" type="text" placeholder="Nombre Producto" value="<?=$p->getPro_name()?>">
                    </div>
                 
                    <div class="mb-3">
                    <label class="form-label" for="Marca">Marca</label>
                    <input required class="form-control" name="Marca" type="text" placeholder="Marca" value="<?=$p->getPro_mar()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="Costo">Costo</label>
                    <input required class="form-control" name="Costo" type="number" placeholder="Costo" value="<?=$p->getPro_cos()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="Precio">Precio</label>
                    <input required class="form-control" name="Precio" type="number" placeholder="Precio" value="<?=$p->getPro_pre()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="Cantidad">Cantidad</label>
                    <input required class="form-control" name="Cantidad" type="number" placeholder="Cantidad" value="<?=$p->getPro_can()?>">
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