<!-- Vista/ordencompra/index.php -->
<h1>Órdenes de Compra</h1>
<a href="?c=ordencompra&a=FormCrearOrdenCompra">Nueva Orden de Compra</a>
<table>
    <thead>
        <tr>
            <th>ID Orden</th>
            <th>ID Materia Prima</th>
            <th>Cantidad</th>
            <th>Fecha Solicitud</th>
            <th>Costo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->modelo->ListarOrdenesCompra() as $orden): ?>
        <tr>
            <td><?= $orden->id_orden_compra ?></td>
            <td><?= $orden->id_materia_prima ?></td>
            <td><?= $orden->cantidad ?></td>
            <td><?= $orden->fecha_solicitud ?></td>
            <td><?= $orden->costo ?></td>
            <td>
                <a href="?c=ordencompra&a=FormCrearOrdenCompra&id=<?= $orden->id_orden_compra ?>">Editar</a>
                <a href="?c=ordencompra&a=BorrarOrdenCompra&id=<?= $orden->id_orden_compra ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
