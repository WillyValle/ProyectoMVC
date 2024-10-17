<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Registrar Materia Prima</h1>
          <p>Ingresa los datos para registrar materia prima nueva</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Materia Prima</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Materia Prima</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method ="POST" action="?c=materiaprima&a=GuardarMP">
                    <legend><?=$titulo?> Materia Prima</legend>
                    <div class="mb-3">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getId_MP()?>">
                    </div>
                
                    <div class="mb-3">
                    <label class="form-label" for="Nombre">Nombre</label>
                    <input required class="form-control" name="Nombre" type="text" placeholder="Nombre Materia Prima" value="<?=$p->getNombreMP()?>">
                    </div>
                 
                    <div class="mb-3">
                    <label class="form-label" for="Descripcion">Descripcion</label>
                    <input required class="form-control" name="Descripcion" type="text" placeholder="Descripcion" value="<?=$p->getDescripcionMP()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="unidad_medida">Unidad de Medida</label>
                    <input required class="form-control" name="unidad_medida" type="text" placeholder="Unidad de Medida" value="<?=$p->getUnidad_MedidaMP()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="costo_unitario">Costo Unitario</label>
                    <input required class="form-control" name="costo_unitario" type="number" placeholder="Costo Unitario" value="<?=$p->getCostoMP()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="fecha_ingreso">Fecha de Ingreso</label>
                    <input required class="form-control" name="fecha_ingreso" type="date" placeholder="Fecha de Ingreso" value="<?=$p->getIngresoFecha()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="fecha_actualizacion">Fecha de Actualizacion</label>
                    <input required class="form-control" name="fecha_actualizacion" type="date" placeholder="Fecha de Actualizacion" value="<?=$p->getUpdateDate()?>">
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