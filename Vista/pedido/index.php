<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-table"></i> Pedidos</h1>
            <p>Listado de pedidos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item">Pedido</li>
            <li class="breadcrumb-item active"><a href="#">Listado de Pedidos</a></li>
        </ul>
        <div>
            <a class="btn btn-primary btn-flat" href="?c=pedido&a=FormCrearPedido"><i class="bi bi-plus-circle"></i> Nuevo Pedido</a>
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
                                    <th>ID Pedido</th>
                                    <th>ID Cliente</th>
                                    <th>Fecha Pedido</th>
                                    <th>Estado Pedido</th>
                                    <th>Fecha Entrega</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($this->modeloPedido->ListarPedidos() as $pedido): ?>
                                <tr>
                                    <td><?=$pedido->id_pedido?></td>
                                    <td><?=$pedido->id_cliente?></td>
                                    <td><?=$pedido->fecha_pedido?></td>
                                    <td><?=$pedido->estado_pedido?></td>
                                    <td><?=$pedido->fecha_entrega?></td>
                                    <td>
                                        <a class="btn btn-info btn-flat" href="?c=pedido&a=FormCrearPedido&id=<?=$pedido->id_pedido?>"><i class="bi bi-pencil-square"></i> Editar</a>
                                        <a class="btn btn-warning btn-flat" href="?c=pedido&a=BorrarPedido&id=<?=$pedido->id_pedido?>" onclick="return confirm('¿Está seguro de que desea eliminar este pedido?');"><i class="bi bi-trash"></i> Eliminar</a>
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
