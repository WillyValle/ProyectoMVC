<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer"></i> Dashboard</h1>
            <p>A free and open source Bootstrap 5 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card bg-grey">
                <div class="card-body">
                    <h3 class="card-title">Cantidad Clientes</h3>
                    <p><?php $p = $this->modeloCliente->CantidadCliente(); ?></p>
                    <p><?=$p->CantidadCliente?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card bg-grey">
                <div class="card-body">
                    <h3 class="card-title">Cantidad Productos</h3>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $productos = $this->modeloProducto->Cantidad();
                            foreach ($productos as $producto) {
                                echo "<tr>";
                                echo "<td>{$producto->id_producto}</td>"; 
                                echo "<td>{$producto->nombre_producto}</td>";
                                echo "<td>{$producto->Cantidad}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Niveles de Materia Prima -->
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-grey">
                <div class="card-body">
                    <h3 class="card-title">Niveles de Materia Prima</h3>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID Materia Prima</th>
                                <th>Nombre</th>
                                <th>Cantidad Disponible</th>
                                <th>Fecha de Actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $materiasPrimas = $this->modeloMateriaPrima->NivelesMateriaPrima();
                            $umbralBajo = 50; // Definir el umbral para niveles bajos
                            if ($materiasPrimas) {
                                foreach ($materiasPrimas as $materiaPrima) {
                                    $color = $materiaPrima->cantidad_disponible < $umbralBajo ? 'red' : 'black';
                                    echo "<tr>";
                                    echo "<td>{$materiaPrima->id_materia_prima}</td>";
                                    echo "<td>{$materiaPrima->nombre}</td>";
                                    echo "<td style='color: {$color};'>" . intval($materiaPrima->cantidad_disponible) . "</td>";
                                    echo "<td>{$materiaPrima->fecha_actualizacion}</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No se pudo obtener los niveles de materia prima.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
