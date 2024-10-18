<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i>Registrar Proceso Producción</h1>
          <p>Ingresa los datos para registrar un proceso de produccion</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Proceso Producción</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Proceso Producción</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method ="POST" action="?c=proceso&a=GuardarProceso">
                    <legend><?=$titulo?> Proceso Producción</legend>
                    <div class="mb-3">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getId_Proceso()?>">
                    </div>
                
                    <div class="mb-3">
                    <label class="form-label" for="Nombre">Nombre Proceso</label>
                    <input required class="form-control" name="Nombre" type="text" placeholder="Nombre Proceso" value="<?=$p->getNombre_Proceso()?>">
                    </div>
                 
                    <div class="mb-3">
                    <label class="form-label" for="Descripcion">Descripcion Proceso</label>
                    <textarea required class="form-control" name="Descripcion" type="text" placeholder="Descripcion Proceso" value="<?=$p->getDescripcion_Proceso()?>"rows="5"></textarea>
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