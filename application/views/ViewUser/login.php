<?php  session_destroy(); ?>
<!doctype html>
<html lang="es">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
  <h1>FIRST APLICATION CODE IGNITER</h1>
  <?php
    if(isset($intentaEntrarMal)){
      echo "<h1 style='color:red; text-decoration:underline;'>".$intentaEntrarMal."</h1>";
    }
  ?>

  <?php echo '<form action="'.site_url('ControllerUser/confirmLogin').'" method="post">'; ?>
      <div class="form-group">
        <label for="user">User:</label>
        <input type="text"
          class="form-control" name="nombre" id="nombre" placeholder="Usuario" required>
      </div>
      <div class="form-group">
        <label for="pass">Password:</label>
        <input type="text"
          class="form-control" name="pass" id="pass" placeholder="Contraseña" required>
      </div>
      <button type="submit" class="btn btn-primary">LOGIN</button>
      </form>
  </div>

 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>