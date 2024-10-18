<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Registrar Producto</h1>
          <p>Ingresa los datos para registrar un producto nuevo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Producto</li>
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
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getId_producto()?>">
                    </div>
                
                    <div class="mb-3">
                    <label class="form-label" for="Nombre">Nombre</label>
                    <input required class="form-control" name="Nombre" type="text" placeholder="Nombre" value="<?=$p->getNombre_producto()?>">
                    </div>
                 
                    <div class="mb-3">
                    <label class="form-label" for="Descripcion">Descripcion</label>
                    <input required class="form-control" name="Descripcion" type="text" placeholder="Descripcion" value="<?=$p->getDescripcion_producto()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="Costo">Costo</label>
                    <input required class="form-control" name="Costo" type="number" step="0.01" placeholder="Costo" value="<?=$p->getCosto_produccion()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="Cantidad">Cantidad</label>
                    <input required class="form-control" name="Cantidad" type="number" placeholder="Cantidad" value="<?=$p->getCantidad_disponible()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="fechaOperacion">FechaOperacion</label>
                    <input required class="form-control" name="FechaOperacion" type="date" placeholder="FechaOperacion" value="<?=$p->getFecha_creacion()?>">
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