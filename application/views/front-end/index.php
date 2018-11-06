<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">appCI</a>
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Películas<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Localizaciones</a>
            </li>
    </div>
</nav>

<div class="container">
<h1>Películas</h1>
    <div class="row">
    <?php   
    for($i=0;$i<count($movies);$i++){
        $info = $movies[$i];
        echo '<div class="col">
            <div class="card text-white bg-info">
              <img class="card-img-top mx-auto mt-2" src="http://localhost/ejercicios_servidor/appci/'.$info['cartel_src'].'" alt="img no disponible" style="width:300px">
              <div class="card-body">
                <h4 class="card-title">'.$info['titulo'].'</h4>
                <p class="card-text">'.$info['pais'].','.$info['anio'].'</p>
              </div>
            </div>
        </div>';
    }
        ?>
    </div>
</div>

<div class="container">
<h1>Localizaciones</h1>
    <div class="row">
    <?php   
    for($i=0;$i<count($locations);$i++){
        $info = $locations[$i];
        echo '<div class="card text-center m-4">
        <div class="card-header">
          '.$info['titulo'].' se rodó en '.$info['nombre'].'
        </div>
        <div class="card-body">
          <h5 class="card-title">'.$info['titulo'].'</h5>
          <p class="card-text">'.$info['descripcion'].'</p>
          <img class="img-fluid" src="http://localhost/ejercicios_servidor/appci/'.$info['fotografia_src'].'" style="width:300px"></img>
        </div>
      </div>';
    }
        ?>
    </div>
</div>