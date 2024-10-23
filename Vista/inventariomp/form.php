
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Agregar a Inventario Materia Prima</h1>
          <p>Ingresa los datos para agregar informacion al inventario de materia prima</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Materia Prima</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Inventario Materia Prima</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method ="POST" action="?c=inventariomp&a=GuardarInventarioMP">
                    <legend><?=$titulo?> Inventario Materia Prima</legend>
                    <div class="mb-3">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getIdInventarioMP()?>">
                    </div>

                    <div class="mb-3">
                      
                    <label class="form-label" for="id_materia_prima">Materia Prima</label>
                    <select required class="form-control" name="id_materia_prima">
                        <option value="">Seleccione una materia prima</option>
                          <?php foreach($materiasPrimas as $mp): ?>
                            <option value="<?=$mp->id_materia_prima?>" <?=$p->getIdMP() == $mp->id_materia_prima ? 'selected' : ''?>>
                                <?=$mp->nombre?>
                            </option>
                          <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="cantidad_disponible">Cantidad Disponible</label>
                    <input required class="form-control" name="cantidad_disponible" type="number" placeholder="Cantidad Según Unidad de Medida (kg,lb,oz)" value="<?=$p->getCantidadDisponible()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="ubicacion">Ubicacion</label>
                    <input required class="form-control" name="ubicacion" type="text" placeholder="Ubicación" value="<?=$p->getUbicacion()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="fecha_actualizacion">Fecha de Actualizacion</label>
                    <input required class="form-control" name="fecha_actualizacion" type="date" placeholder="Fecha de Actualización" value="<?=$p->getUpdateDate()?>">
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
