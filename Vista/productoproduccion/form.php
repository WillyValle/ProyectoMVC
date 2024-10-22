<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Agregar Nuevo Producto en Producción</h1>
          <p>Ingresa los datos para agregar un nuevo producto en producción</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Producto en Producción</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Producto en Producción</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method ="POST" action="?c=productoproduccion&a=GuardarProductoProduccion">
                    <legend><?=$titulo?> Producto en Producción</legend>
                    <div class="mb-3">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getId_Producto_Produccion()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="id_producto">Producto</label>
                    <select required class="form-control" name="id_producto">
                        <option value="">Seleccione el producto</option>
                          <?php foreach($producto as $pdt): ?>
                            <option value="<?=$pdt->id_producto?>" <?=$p->getId_Producto() == $pdt->id_producto ? 'selected' : ''?>>
                                <?=$pdt->nombre_producto?>
                            </option>
                          <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="id_produccion">Producción</label>
                    <select required class="form-control" name="id_produccion">
                        <option value="">Seleccione el nombre del proceso de producción</option>
                          <?php foreach($produccion as $tp): ?>
                            <option value="<?=$tp->id_produccion?>" <?=$p->getId_Produccion() == $tp->id_produccion ? 'selected' : ''?>>
                                <?=$tp->nombre_proceso?>
                            </option>
                          <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="cantidad_producida">Cantidad Producida</label>
                    <input required class="form-control" name="cantidad_producida" type="number" placeholder="Cantidad Producida" value="<?=$p->getCantidad_Producida()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="fecha">Fecha de Producción</label>
                    <input required class="form-control" name="fecha" type="date" placeholder="Fecha de Produccioón" value="<?=$p->getFecha()?>">
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
