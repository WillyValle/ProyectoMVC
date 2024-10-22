<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-ui-checks"></i> Registrar Orden de Compra</h1>
            <p>Ingresa los datos para registrar una nueva orden de compra</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item">Orden de Compra</li>
            <li class="breadcrumb-item"><a href="#"><?=$titulo?> Orden de Compra</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-6">
                        <form method="POST" action="?c=ordencompra&a=GuardarOrdenCompra">
                            <legend><?=$titulo?> Orden de Compra</legend>
                            <div class="mb-3">
                                <input class="form-control" name="ID" type="hidden" value="<?=$orden->getIdOrdenCompra()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="No_OrdenCompra">No Orden Compra</label>
                                <input required class="form-control" name="No_OrdenCompra" type="text" placeholder="Número de Orden de Compra" value="<?=$orden->getNoOrdenCompra()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="id_materia_prima">ID Materia Prima</label>
                                <input required class="form-control" name="id_materia_prima" type="number" placeholder="ID Materia Prima" value="<?=$orden->getIdMateriaPrima()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="cantidad">Cantidad</label>
                                <input required class="form-control" name="cantidad" type="number" step="0.01" placeholder="Cantidad" value="<?=$orden->getCantidad()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="fecha_solicitud">Fecha de Solicitud</label>
                                <input required class="form-control" name="fecha_solicitud" type="date" placeholder="Fecha de Solicitud" value="<?=$orden->getFechaSolicitud()?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="costo">Costo</label>
                                <input required class="form-control" name="costo" type="number" step="0.01" placeholder="Costo" value="<?=$orden->getCosto()?>">
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
