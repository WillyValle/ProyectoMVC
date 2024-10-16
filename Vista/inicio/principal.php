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
      <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon">
            <div class="info">
              <h3 class="card-title">Cantidad Productos</h3>
              <p><?php $p=$this->modelo->Cantidad()?></p>
                <?=$p->Cantidad?>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon">
            <div class="info">
              <h3 class="card-title">Cantidad Productos</h3>
              <p><?php $p=$this->modelo->Cantidad()?></p>
                <?=$p->Cantidad?>
            </div>
          </div>
        </div>


    </main>