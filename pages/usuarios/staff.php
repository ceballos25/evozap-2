<!--Requerimos el encabezado-->
<?php
// Muestra todos los errores en el script
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../plantilla/header.php"?>
<!--Requerimos el encabezado-->
<link rel="stylesheet" href="css/participantes.css">

      <!-- Contenido central -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h2 class="text-center">Staff</h2>

        <div class="table-responsive table-shadow">
                    <table class="table table-hover" id="miTabla">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>Product</th>
                          <th>Sale</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Jacob</td>
                          <td>Photoshop</td>
                          <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        <tr>
                          <td>Messsy</td>
                          <td>Flash</td>
                          <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                        <tr>
                          <td>John</td>
                          <td>Premier</td>
                          <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-info">Fixed</label></td>
                        </tr>
                        <tr>
                          <td>Peter</td>
                          <td>After effects</td>
                          <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

      </div>
      <!-- main-panel ends -->
    </div>   
  </div>
  <!-- contenido central -->


<!--Requerimos el footer-->
<?php require "../plantilla/footer.php" ?>
<script src="js/participantes.js"></script>
<!--Requerimos el footer-->