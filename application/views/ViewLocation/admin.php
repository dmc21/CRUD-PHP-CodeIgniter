
    <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Peliculas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lugares</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Publicaciones</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  
  <h1>Panel de administración de películas</h1>
    <h2><?php if(isset($msg)) echo "$msg" ?></h2>
    <h3>Estás logueado como <?php echo $nick[0]['nombre']; ?></h3>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nueva película &nbsp; <i class="fas fa-plus"></i></button>
      <?php echo "<a href='".site_url('ControllerUser/cerrar_sesion')."'><button class='btn btn-danger'>Salir &nbsp; <i class='fas fa-sign-out-alt'></i></button></a>";?>

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
      <?php echo '<form action="'.site_url('ControllerMovies/insertMovie').'" method="post" enctype="multipart/form-data">'; ?>
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
            <input type="file" class="form-control" name="imagenData">
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
          <div class="col">Cartel</div>
          <div class="col">Editar</div>
          <div class="col">Eliminar</div>
        </div>

            <?php 
            $this->load->helper('url');
            for($i=0;$i<count($movies);$i++){
              $info = $movies[$i];
              echo '<form action="'.site_url('ControllerMovies/updateMovie/'.$info['id']).'" method="post" enctype="multipart/form-data">';
              echo "<div class='row mt-1 mb-1'>";
                echo "<div class='col'><input type='text' class='form-control' value='".$info["titulo"]."' name='titulo'></div>";
                echo "<div class='col'><input type='number' class='form-control' value='".$info["anio"]."' name='anio'></div>";
                echo "<div class='col'><input type='text' class='form-control' value='".$info["pais"]."' name='pais'></div>";
                echo "<div class='col'><input type='file' class='form-control' name='imagenData'>
                  <img src='http://localhost/ejercicios_servidor/appci/".$info['cartel_src']."' alt='img no disponible' style='width:200px;'>
                  <input type='hidden' name='srcOculto' value='http://localhost/ejercicios_servidor/appci/".$info['cartel_src']."'>
                  </div>";
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
    <h2><?php if(isset($msgSite)) echo "$msgSite" ?></h2>
    <h3>Estás logueado como <?php echo  $nick[0]['nombre']; ?></h3>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#otro" data-whatever="@fat">Nuevo Lugar &nbsp; <i class="fas fa-plus"></i></button>
      <?php echo "<a href='".site_url('ControllerUser/cerrar_sesion')."'><button class='btn btn-danger'>Salir &nbsp; <i class='fas fa-sign-out-alt'></i></button></a>";?>

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
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>

          <div class="form-group">
            <label for="descripcion" class="col-form-label">Descripción:</label>
            <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
          </div>

          <div class="form-group">
            <label for="latitud" class="col-form-label">Latitud:</label>
            <input type="text" class="form-control" id="latitud" name="latitud">
          </div>

          <div class="form-group">
            <label for="longitud" class="col-form-label">Longitud:</label>
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
            for($i=0;$i<count($sites);$i++){
              $info = $sites[$i];
              echo '<form action="'.site_url('ControllerSites/updateSite/'.$info['id']).'" method="get">';
              echo "<div class='row mt-1 mb-1'>";
                echo "<div class='col'><input type='text' class='form-control' value='".$info["nombre"]."' name='nombre'></div>";
                echo "<div class='col'> <textarea class='form-control' rows='5' id='descripcion' name='descripcion'>".$info['descripcion']."</textarea></div>";
                echo "<div class='col'><input type='number' class='form-control' value='".$info["longitud"]."' name='longitud'></div>";
                echo "<div class='col'><input type='number' class='form-control' value='".$info["latitud"]."' name='latitud'></div>";
                echo "<div class='col'><button type='submit' class='btn btn-success'>Aplicar cambios &nbsp; <i class='fas fa-retweet'></i></button></div>";
                echo "<div class='col'><a href='".site_url('ControllerSites/deleteSite/'.$info['id'])."'>
                <input type='button' class='btn btn-danger' value='Eliminar'></a></div>";
              echo "</div>";
              echo "</form>";
            }

            ?>

  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <h1>Panel de administración de publicaciones</h1>
    <h2><?php if(isset($msgLocations)) echo "$msgLocations" ?></h2>
      <h3>Estás logueado como <?php echo  $nick[0]['nombre']; ?></h3>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#otro1" data-whatever="@mdo">Nueva publicación &nbsp; <i class="fas fa-plus"></i></button>
      <?php echo "<a href='".site_url('ControllerUser/cerrar_sesion')."'><button class='btn btn-danger'>Salir &nbsp; <i class='fas fa-sign-out-alt'></i></button></a>";?>

<div class="modal fade" id="otro1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alta de publicaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo '<form action="'.site_url('ControllerLocations/insertLocation').'" method="post" enctype="multipart/form-data">'; ?>
          <div class="form-group">
          <label for="anio" class="col-form-label">Título:</label>
           <select name="pelis" id="pelis" class="form-control" required>
           <?php 
            for ($i=0;$i<count($movies);$i++){
              $info = $movies[$i];
             echo "<option value='".$info['id']."'>".$info['titulo']."</option>";
            }
           ?>
           </select>
          </div>

          <div class="form-group">
            <label for="anio" class="col-form-label">Lugar de producción:</label>
            <select name="sites" class="form-control" required>
           <?php 
            for ($i=0;$i<count($sites);$i++){
              $info = $sites[$i];
             echo "<option value='".$info['id']."'>".$info['nombre']."</option>";
            }
           ?>
           </select>
          </div>

          <div class="form-group">
            <label for="imagen" class="col-form-label">Imagen de publicación:</label>
            <input type="file" class="form-control" name="imagenLocation" required>
          </div>

          <div class="form-group">
            <label for="comment">Descripción:</label>
            <textarea class="form-control" rows="5" id="descripcion" name="descripcion" required></textarea>
          </div> 

          <div class='form-check'>
                <input type='checkbox' class='form-check-input' id='check' name='check' value='s'>
                <label class='form-check-label' for='exampleCheck1'>Publicar</label>
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
          <div class="col">Película</div>
          <div class="col">Lugar de producción</div>
          <div class="col">Imagen</div>
          <div class="col">Descripción</div>
          <div class="col">Publicar (S/N)</div>
          <div class="col">Editar</div>
          <div class="col">Eliminar</div>
        </div>

            <?php 
            for($i=0;$i<count($locations);$i++){ //MODIFICAR ESTA PARTE PARA MOSTRAR LOS DATOS DE LA RELACION DE N:N (tabla localizaciones)
              $info = $locations[$i];
              echo '<form action="'.site_url('ControllerLocations/updateLocation/'.$info['id']).'" method="post" enctype="multipart/form-data">';
              echo "<div class='row mt-1 mb-1'>"; 
                echo "<div class='col'>
                <select name='pelis' id='pelis' class='form-control'>";
                 for ($k=0;$k<count($movies);$k++){
                   $infor = $movies[$k];
                   if($infor['id'] == $info['id_pelicula']){
                  echo "<option value='".$infor['id']."' selected>".$infor['titulo']."</option>";
                   }else{
                    echo "<option value='".$infor['id']."'>".$infor['titulo']."</option>"; 
                   }
                 }
                
                echo "</select>
                </div>";
                echo "<div class='col'>";
                echo "<select name='sites' id='sites' class='form-control'>";
                for ($j=0;$j<count($sites);$j++){
                  $inform = $sites[$j];
                  if($inform['id'] == $info['id_lugar']){
                 echo "<option value='".$inform['id']."' selected>".$inform['nombre']."</option>";
                  }else{
                    echo "<option value='".$inform['id']."'>".$inform['nombre']."</option>";
                  }
                }
                echo "</select>
                </div>";
                echo "<div class='col'>";
               echo "<input type='file' class='form-control' name='imagenLocation'>
                      <img src='http://localhost/ejercicios_servidor/appci/".$info['fotografia_src']."' alt='img no disponible' style='width:200px;'>
               </div>";
                echo "<div class='col'> <textarea class='form-control' rows='5' name='descripcion'>".$info['descripcion']."</textarea></div>";
                echo "<div class='form-check'>";
                if($info['publicada'] == "s"){
                  echo "<input type='checkbox' class='form-check-input' id='check' name='check' value='s' checked>";
                }else{
                  echo "<input type='checkbox' class='form-check-input' id='check' name='check' value='n'>";
                }

                echo "<label class='form-check-label' for='exampleCheck1'>Publicar</label>
              </div>";
                echo "<div class='col'><button type='submit' class='btn btn-success'>Aplicar cambios &nbsp; <i class='fas fa-retweet'></i></button></div>";
                echo "<div class='col'><a href='".site_url('ControllerLocations/deleteLocation/'.$info['id'])."'>
                <input type='button' class='btn btn-danger' value='Eliminar'></a></div>";
              echo "</div>";
              echo "</form>";
            }

            ?>

  </div>
</div>
</div>