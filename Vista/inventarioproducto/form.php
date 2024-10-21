
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Agregar a Inventario Producto</h1>
          <p>Ingresa los datos para agregar informacion al inventario los productos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Inventario Producto</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Inventario Producto</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method ="POST" action="?c=inventarioproducto&a=GuardarInventarioPRODUCT">
                    <legend><?=$titulo?> Inventario Producto</legend>
                    <div class="mb-3">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getIdInventarioProduct()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="id_producto">Productos</label>
                    <select required class="form-control" name="id_producto">
                        <option value="">Seleccione un Producto</option>
                          <?php foreach($selectproductos as $mp): ?>
                            <option value="<?=$mp->id_producto?>" <?=$p->getId_producto() == $mp->id_producto ? 'selected' : ''?>>
                                <?=$mp->nombre_producto?>
                            </option>
                          <?php endforeach; ?>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="cantidad_disponible">Cantidad Disponible</label>
                    <input required class="form-control" name="cantidad_disponible" type="number" placeholder="cantidad_disponible" value="<?=$p->getCantidadDisponible()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="ubicacion_almacen">Ubicacion Almacen</label>
                    <input required class="form-control" name="ubicacion_almacen" type="text" placeholder="ubicacion_almacen" value="<?=$p->getUbicacionAlmacen()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="fecha_entrada">Fecha de Actualizacion</label>
                    <input required class="form-control" name="fecha_entrada" type="date" placeholder="fecha_entrada" value="<?=$p->getUpdateDate()?>">
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
