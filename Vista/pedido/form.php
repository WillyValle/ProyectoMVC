<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-ui-checks"></i> Registrar Pedido</h1>
            <p>Ingresa los datos para registrar un nuevo pedido</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item">Pedido</li>
            <li class="breadcrumb-item"><a href="#"><?=$titulo?> Pedido</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-6">
                        <form method="POST" action="?c=pedido&a=GuardarPedido">
                            <legend><?=$titulo?> Pedido</legend>
                            <div class="mb-3">
                                <input class="form-control" name="ID" type="hidden" value="<?=$pedido->getIdPedido()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="id_cliente">ID Cliente</label>
                                <input required class="form-control" name="id_cliente" type="number" placeholder="ID Cliente" value="<?=$pedido->getIdCliente()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="fecha_pedido">Fecha Pedido</label>
                                <input required class="form-control" name="fecha_pedido" type="date" placeholder="Fecha Pedido" value="<?=$pedido->getFechaPedido()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="estado_pedido">Estado Pedido</label>
                                <input required class="form-control" name="estado_pedido" type="text" placeholder="Estado Pedido" value="<?=$pedido->getEstadoPedido()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="fecha_entrega">Fecha Entrega</label>
                                <input required class="form-control" name="fecha_entrega" type="date" placeholder="Fecha Entrega" value="<?=$pedido->getFechaEntrega()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="detalles">Detalles del Pedido</label>
                                <div id="detalles">
                                    <!-- Aquí se agregarán dinámicamente los detalles del pedido -->
                                    <?php if (isset($detalles)): ?>
                                        <?php foreach ($detalles as $detalle): ?>
                                            <div class="detalle-pedido">
                                                <input type="hidden" name="detalles[<?=$detalle->getIdDetallePedido()?>][id_detalle_pedido]" value="<?=$detalle->getIdDetallePedido()?>">
                                                <div class="mb-3">
                                                    <label class="form-label" for="id_producto">ID Producto</label>
                                                    <input required class="form-control" name="detalles[<?=$detalle->getIdDetallePedido()?>][id_producto]" type="number" placeholder="ID Producto" value="<?=$detalle->getIdProducto()?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="cantidad">Cantidad</label>
                                                    <input required class="form-control" name="detalles[<?=$detalle->getIdDetallePedido()?>][cantidad]" type="number" placeholder="Cantidad" value="<?=$detalle->getCantidad()?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="precio_unitario">Precio Unitario</label>
                                                    <input required class="form-control" name="detalles[<?=$detalle->getIdDetallePedido()?>][precio_unitario]" type="number" step="0.01" placeholder="Precio Unitario" value="<?=$detalle->getPrecioUnitario()?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="subtotal">Subtotal</label>
                                                    <input required class="form-control" name="detalles[<?=$detalle->getIdDetallePedido()?>][subtotal]" type="number" step="0.01" placeholder="Subtotal" value="<?=$detalle->getSubtotal()?>">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="agregarDetalle()">Agregar Detalle</button>
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
    </div>
</main>

<script>
function agregarDetalle() {
    const detallesDiv = document.getElementById('detalles');
    const detalleIndex = detallesDiv.children.length;
    const detalleHtml = `
        <div class="detalle-pedido">
            <div class="mb-3">
                <label class="form-label" for="id_producto">ID Producto</label>
                <input required class="form-control" name="detalles[${detalleIndex}][id_producto]" type="number" placeholder="ID Producto">
            </div>
            <div class="mb-3">
                <label class="form-label" for="cantidad">Cantidad</label>
                <input required class="form-control" name="detalles[${detalleIndex}][cantidad]" type="number" placeholder="Cantidad">
            </div>
            <div class="mb-3">
                <label class="form-label" for="precio_unitario">Precio Unitario</label>
                <input required class="form-control" name="detalles[${detalleIndex}][precio_unitario]" type="number" step="0.01" placeholder="Precio Unitario">
            </div>
            <div class="mb-3">
                <label class="form-label" for="subtotal">Subtotal</label>
                <input required class="form-control" name="detalles[${detalleIndex}][subtotal]" type="number" step="0.01" placeholder="Subtotal">
            </div>
        </div>
    `;
    detallesDiv.insertAdjacentHTML('beforeend', detalleHtml);
}
</script>
