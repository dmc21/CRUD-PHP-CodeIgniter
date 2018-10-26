
    <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Peliculas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lugares</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  
  <h1>Panel de administración de películas</h1>
    <h2><?php if(isset($msg)) echo "$msg" ?></h2>
      <h3>Estás logueado como <?php echo $informacion[0]['nombre']; ?></h3>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nueva película &nbsp; <i class="fas fa-plus"></i></button>
      <?php echo "<a href='".site_url('ControllerUser/logout')."'><button class='btn btn-danger'>Salir &nbsp; <i class='fas fa-sign-out-alt'></i></button></a>";?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alta de películas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo '<form action="'.site_url('ControllerMovies/insertMovie').'" method="get" enctype="multipart/form-data">'; ?>
          <div class="form-group">
            <label for="titulo" class="col-form-label">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
          </div>

          <div class="form-group">
            <label for="anio" class="col-form-label">Año:</label>
            <input type="number" class="form-control" id="anio" name="anio">
          </div>

          <div class="form-group">
            <label for="pais" class="col-form-label">País:</label>
            <input type="text" class="form-control" id="pais" name="pais">
          </div>

          <div class="form-group">
            <label for="imagen" class="col-form-label">Imagen de cartel:</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
          </div>
          <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Insertar</button>
        <button type="reset" class="btn btn-secondary">Reestablecer</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

      <div class="row">
          <div class="col">Título</div>
          <div class="col">Año</div>
          <div class="col">País</div>
          <div class="col">Imágen</div>
          <div class="col">Editar</div>
          <div class="col">Eliminar</div>
        </div>

            <?php 
            for($i=0;$i<count($movies);$i++){
              $info = $movies[$i];
              echo '<form action="'.site_url('ControllerMovies/updateMovie/'.$info['id']).'" method="get">';
              echo "<div class='row mt-1 mb-1'>";
                echo "<div class='col'><input type='text' class='form-control' value='".$info["titulo"]."' name='titulo'></div>";
                echo "<div class='col'><input type='number' class='form-control' value='".$info["anio"]."' name='anio'></div>";
                echo "<div class='col'><input type='text' class='form-control' value='".$info["pais"]."' name='pais'></div>";
                echo "<div class='col'><input type='text' class='form-control' value='".$info["cartel_src"]."' name='imagen'></div>";
                echo "<div class='col'><button type='submit' class='btn btn-success'>Aplicar cambios &nbsp; <i class='fas fa-retweet'></i></button></div>";
                echo "<div class='col'><a href='".site_url('ControllerMovies/deleteMovie/'.$info['id'])."'>
                <input type='button' class='btn btn-danger' value='Eliminar'></a></div>";
              echo "</div>";
              echo "</form>";
            }

            ?>

  </div>


  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              
  <h1>Panel de administración de Lugares</h1>
    <h2><?php if(isset($msg)) echo "$msg" ?></h2>
      <h3>Estás logueado como <?php echo $informacion[0]['nombre']; ?></h3>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#otro" data-whatever="@fat">Nuevo Lugar &nbsp; <i class="fas fa-plus"></i></button>
      <?php echo "<a href='".site_url('ControllerUser/logout')."'><button class='btn btn-danger'>Salir &nbsp; <i class='fas fa-sign-out-alt'></i></button></a>";?>

<div class="modal fade" id="otro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alta de lugares</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo '<form action="'.site_url('ControllerSites/insertSite').'" method="get" enctype="multipart/form-data">'; ?>
          <div class="form-group">
            <label for="titulo" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>

          <div class="form-group">
            <label for="anio" class="col-form-label">Descripción:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
          </div>

          <div class="form-group">
            <label for="pais" class="col-form-label">Latitud:</label>
            <input type="text" class="form-control" id="latitud" name="latitud">
          </div>

          <div class="form-group">
            <label for="imagen" class="col-form-label">Longitud:</label>
            <input type="text" class="form-control" id="longitud" name="longitud">
          </div>
          <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Insertar</button>
        <button type="reset" class="btn btn-secondary">Reestablecer</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>

      <div class="row">
          <div class="col">Nombre</div>
          <div class="col">Descripción</div>
          <div class="col">Latitud</div>
          <div class="col">Longitud</div>
          <div class="col">Editar</div>
          <div class="col">Eliminar</div>
        </div>

            <?php 
            if (isset($sites)){
            for($i=0;$i<count($sites);$i++){
              $info = $sites[$i];
              echo '<form action="'.site_url('ControllerSites/updateSite/'.$info['id']).'" method="get">';
              echo "<div class='row mt-1 mb-1'>";
                echo "<div class='col'><input type='text' class='form-control' value='".$info["nombre"]."' name='nombre'></div>";
                echo "<div class='col'><input type='text' class='form-control' value='".$info["descripcion"]."' name='descripcion'></div>";
                echo "<div class='col'><input type='number' class='form-control' value='".$info["longitud"]."' name='longitud'></div>";
                echo "<div class='col'><input type='number' class='form-control' value='".$info["latitud"]."' name='latitud'></div>";
                echo "<div class='col'><button type='submit' class='btn btn-success'>Aplicar cambios &nbsp; <i class='fas fa-retweet'></i></button></div>";
                echo "<div class='col'><a href='".site_url('ControllerSites/deleteSite/'.$info['id'])."'>
                <input type='button' class='btn btn-danger' value='Eliminar'></a></div>";
              echo "</div>";
              echo "</form>";
            }
          }

            ?>

  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <h1>Panel en desarrollo (Usuarios)</h1>
  </div>
     </div>
</div>