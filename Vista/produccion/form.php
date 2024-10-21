<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Agregar Nueva Produccion</h1>
          <p>Ingresa los datos para agregar una nueva producción</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Producción</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Producción</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method ="POST" action="?c=produccion&a=GuardarProduccion">
                    <legend><?=$titulo?> Producción</legend>
                    <div class="mb-3">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getId_Produccion()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="id_proceso">Tipo de Proceso</label>
                    <select required class="form-control" name="id_proceso">
                        <option value="">Seleccione un tipo de proceso</option>
                          <?php foreach($proceso as $tp): ?>
                            <option value="<?=$tp->id_proceso?>" <?=$p->getId_Proceso() == $tp->id_proceso ? 'selected' : ''?>>
                                <?=$tp->nombre_proceso?>
                            </option>
                          <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="id_inventario_mp">Tipo de Materia Prima</label>
                    <select required class="form-control" name="id_inventario_mp">
                        <option value="">Seleccione la materia prima</option>
                          <?php foreach($inventario as $in): ?>
                            <option value="<?=$in->id_inventario_mp?>" <?=$p->getIdInventarioMP() == $in->id_inventario_mp ? 'selected' : ''?>>
                                <?=$in->nombre_materia_prima?>
                            </option>
                          <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="cantidad_usada">Cantidad a Usar</label>
                    <input required class="form-control" name="cantidad_usada" type="number" placeholder="Cantidad a usar" value="<?=$p->getCantidad_Usada()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="fecha_produccion">Fecha de Producción</label>
                    <input required class="form-control" name="fecha_produccion" type="date" placeholder="Fecha de Produccioón" value="<?=$p->getFecha_Produccion()?>">
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
