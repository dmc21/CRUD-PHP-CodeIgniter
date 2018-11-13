<?php  session_destroy(); ?>
  <div class="container">
  <h1>FIRST APPLICATION CODE IGNITER</h1>
  <?php
    if(isset($intentaEntrarMal)){
      echo "<h1 style='color:red; text-decoration:underline;'>".$intentaEntrarMal."</h1>";
    }
  ?>
    
  <?php echo '<form action="'.site_url('ControllerUser/confirmLogin').'" method="post">'; ?>
      <div class="form-group col-4">
        <label for="user">User:</label>
        <input type="text"
          class="form-control" name="nombre" id="nombre" placeholder="Usuario" required>
          <span id="msg"></span>
      </div>
      <div class="form-group col-4">
        <label for="pass">Password:</label>
        <input type="text"
          class="form-control" name="pass" id="pass" placeholder="Contraseña" required>
      </div>
      <button type="submit" class="btn btn-primary">LOGIN</button>
      </form>
  </div>

  <script>
      $(document).ready(function(){
        $("#nombre").blur(function(){
          nombre = document.getElementById("nombre").value;
          mensaje = document.getElementById("msg");
          site_url = '<?php echo site_url("ControllerUser/onBlurUser/");?>'+nombre;
            $.get(site_url, function(data){
            switch (data){
              case "0": 
                mensaje.innerHTML = "Usuario correcto";
                mensaje.style.color = "green";
              break;
              case "1": 
                mensaje.innerHTML = "Usuario incorrecto";
                mensaje.style.color = "red";
              break;
            }
        });
      });
    });
  </script>