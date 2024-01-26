<!--Requerimos el encabezado-->
<?php
// Muestra todos los errores en el script
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../plantilla/header.php"?>
<!--Requerimos el encabezado-->

<!-- Contenido central -->
<div class="main-panel">
  <div class="content-wrapper">
    <h3 class="text-center">Configuración formulario</h3>
    <div class="col-12 mt-4 d-flex justify-content-center">
      <div class="card" style="width:300px">
        <div class="card-body">
 
          <!-- Formulario -->
          <form method="POST" action="update-formulario.php">
        <div class="form-group">
            <label for="seleccion">Entrenamiento:</label>
            <select class="form-control text-dark" name="entrenamiento" id="entrenamiento" required>
                <option value=""></option>
                <option value="Basico">Básico</option>
                <option value="Avanzado">Avanzado</option>
                <option value="Superior">Superior</option>
            </select>
        </div>

        <div class="form-group">
            <label for="desde">Desde:</label>
            <input type="date" name="desde" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="hasta">Hasta:</label>
            <input type="date" name="hasta" class="form-control" required>
        </div>

        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
      </form>

        </div>
      </div>
    </div>

    <!-- main-panel ends -->
  </div>
</div>
</div>

<!-- contenido central -->

<!--Requerimos el footer-->
<?php require "../plantilla/footer.php" ?>

<!-- Aquí incluye el script de formulario.js después de jQuery y jQuery UI -->
<script src="js/formulario.js"></script>
<!--Requerimos el footer-->
