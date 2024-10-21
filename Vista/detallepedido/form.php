
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-ui-checks"></i> Listar Detalle Pedidos</h1>
          <p>Listar Detalle de los Pedidos de los clientes</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item">Detalle Pedido</li>
          <li class="breadcrumb-item"><a href="#"><?=$titulo?> Detalle Pedido</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-lg-6">
                <form method ="POST" action="?c=detallepedido&a=GuardarDetallePedido">
                    <legend><?=$titulo?> Detalle Pedido</legend>
                    <div class="mb-3">
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getId_detalle_Pedido()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="id_pedido">Id Pedido</label>
                    <input required class="form-control" name="id_pedido" type="number" placeholder="id_pedido" value="<?=$p->getId_pedido()?>">
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
                    <label class="form-label" for="cantidad">Cantidad</label>
                    <input required class="form-control" name="cantidad" type="number" placeholder="cantidad" value="<?=$p->getCantidad()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="precio_unitario">Precio Unitario</label>
                    <input required class="form-control" name="precio_unitario" type="text" placeholder="precio_unitario" value="<?=$p->getPrecioUnitario()?>">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="subtotal">Subtotal</label>
                    <input required class="form-control" name="subtotal" type="number" placeholder="subtotal" value="<?=$p->getSubtotal()?>">
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
