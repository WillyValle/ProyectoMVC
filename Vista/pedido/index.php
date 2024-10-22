<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-table"></i> Detalle Pedido</h1>
            <p>Detalle de los pedidos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item">Detalle Pedido</li>
            <li class="breadcrumb-item active"><a href="#">Detalle Pedido</a></li>
        </ul>
        <div>
            <a class="btn btn-primary btn-flat" href="?c=detallepedido&a=FormCrearDetallePedido"><i class="bi bi-plus-circle"></i> Nueva Detalle Pedido</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Id Detalle Pedido</th>
                                    <th>Id Pedido</th>
                                    <th>Id Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($this->modelodetallepedido->ListarDetallePedido() as $r): ?>
                                <tr>
                                    <td><?=$r->id_detalle_pedido?></td>
                                    <td><?=$r->id_pedido?></td>
                                    <td><?=$r->id_producto?></td>
                                    <td><?=$r->cantidad?></td>
                                    <td><?=$r->precio_unitario?></td>
                                    <td><?=$r->subtotal?></td>
                                    <td>
                                        <a class="btn btn-info btn-flat" href="?c=detallepedido&a=FormCrearDetallePedido&id=<?=$r->id_detalle_pedido?>"><i class="bi bi-pencil-square"></i> Editar</a>
                                        <a class="btn btn-warning btn-flat" href="?c=detallepedido&a=BorrarDetallePedido&id=<?=$r->id_detalle_pedido?>" onclick="return confirm('¿Está seguro de que desea eliminar este detalle de pedido?');"><i class="bi bi-trash"></i> Eliminar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
