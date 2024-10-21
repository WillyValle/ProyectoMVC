<!-- Vista/ordencompra/form.php -->
<h1><?= $titulo ?> Orden de Compra</h1>
<form action="?c=ordencompra&a=GuardarOrdenCompra" method="post">
    <input type="hidden" name="id_orden_compra" value="<?= $orden->getIdOrdenCompra() ?>">
    <div>
        <label for="id_materia_prima">Materia Prima</label>
        <select name="id_materia_prima" id="id_materia_prima">
            <?php foreach($materiasPrimas as $materiaPrima): ?>
            <option value="<?= $materiaPrima->id_materia_prima ?>" <?= $materiaPrima->id_materia_prima == $orden->getIdMateriaPrima() ? 'selected' : '' ?>>
                <?= $materiaPrima->nombre ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value="<?= $orden->getCantidad() ?>">
    </div>
    <div>
        <label for="fecha_solicitud">Fecha de Solicitud</label>
        <input type="date" name="fecha_solicitud" id="fecha_solicitud" value="<?= $orden->getFechaSolicitud() ?>">
    </div>
    <div>
        <label for="costo">Costo</label>
        <input type="number" step="0.01" name="costo" id="costo" value="<?= $orden->getCosto() ?>">
    </div>
    <button type="submit">Guardar</button>
</form>
