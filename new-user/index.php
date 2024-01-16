<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Formulario Inscripción </title>
      <!-- CSS -->
      <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
      <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
      <script src="https://kit.fontawesome.com/cf96aaa9b2.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="assets/css/form-elements.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div class="container">
         <div class="row" style="margin-top:1%; margin-bottom:1%">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
               <form method="POST" action="funciones/registro.php" class="f1" id="miFormulario">
                  <?php include ("funciones/config-actual-formulario.php") ?>
                  <h3>Registro Entrenamiento <?php echo $nombre_entrenamiento ?></h3>
                  <h5>Del <?php echo $del ?> al <?php echo $al ?> </h5>
                  <div class="f1-steps">
                     <div class="f1-progress">
                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                     </div>
                     <div class="f1-step active">
                        <div class="f1-step-icon"><i class="fa-solid fa-address-card"></i></i></div>
                        <p>Tu información</p>
                        <i class="fa-dark fa-address-card"></i>
                     </div>
                     <div class="f1-step">
                        <div class="f1-step-icon"><i class="fa-solid fa-user-plus"></i></div>
                        <p>¿Quién te invitó?</p>
                     </div>
                     <div class="f1-step">
                        <div class="f1-step-icon"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                        <p>Tenga en cuenta</p>
                     </div>
                  </div>
                  <!--paso 1 -->
                  <fieldset>
                     <br>
                     <div class="form-group">
                        <input type="text" name="nombre" class="f1-first-name form-control" placeholder="Nombre Completo" id="nombre">
                     </div>
                     <div class="form-group">
                        <input type="text" name="cedula" placeholder="Número Doc. (sin puntos ni espacios)" class="f1-last-name numero-documento  form-control" id="cedula">
                        <select class="form-select d-flex tipo-doc" name="tipo_documento" id="">
                           <option selected>Tipo Doc..</option>
                           <option value="C.C">C.C</option>
                           <option value="C.E">C.E</option>
                           <option value="Pasaporte">Pasaporte</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <input type="text" name="celular" placeholder="Celular" class="form-control numero-documento" id="celular">
                     </div>
                     <div class="form-group">
                        <input type="email" name="correo" placeholder="Correo" class="form-control email" id="correo">
                     </div>
                     <div class="form-group">                                    
                        <textarea name="objetivos" placeholder="Menciona cuatro (4) objetivos que deseas lograr con este entrenamiento.." class="f1-about-yourself form-control" id="f1-about-yourself"></textarea>
                     </div>
                     <div class="form-group">
                        <div class="form-group d-flex">
                           <label for="exampleDataList" class="form-label">¿Estás actualmente en algún proceso o tratamiento psicológico, psiquiátrico o terapéutico?</label>
                           <select class="form-select" name="tratamientos" id="tratamientos" onchange="mostrarDetallesTratamiento()">
                              <option selected></option>
                              <option value="SI">SI</option>
                              <option value="NO">No</option>
                           </select>
                        </div>
                        <div class="form-group d-none" id="none">
                           <input type="text" name="detalle_tratamiento" id="detalle_tratamiento" placeholder="¿Cuál?" class="form-control">
                        </div>
                     </div>
                     <script>
                        function mostrarDetallesTratamiento() {
                            // Obtén el elemento select y el div oculto
                            var selectTratamientos = document.getElementById("tratamientos");
                            var detallesTratamientoDiv = document.getElementById("none");
                            var inputDetalle = document.getElementById("detalle_tratamiento");
                        
                            // Muestra u oculta el div según la selección del usuario
                            if (selectTratamientos.value === "SI") {
                                detallesTratamientoDiv.classList.remove("d-none");
                                inputDetalle.placeholder = "¿Cuál?";
                            } else {
                                detallesTratamientoDiv.classList.add("d-none");
                                inputDetalle.value = "N/A";
                            }
                        }
                     </script>
                     <div class="f1-buttons">
                        <button type="button" class="btn btn-next">Siguiente</button>
                     </div>
                  </fieldset>
                  <!--fin del paso 1 -->
                  <!---paso 2 -->
                  <fieldset>
                     <br>
                     <div class="form-group">
                        <input type="text" name="cedula_referido" placeholder="Cedula, de la persona que te invitó" class="f1-email form-control numero-documento" id="cedula-referido">
                     </div>
                     <div class="f1-buttons">
                        <button type="button" class="btn btn-previous">Atrás</button>
                        <button type="button" class="btn btn-next">Siguiente</button>
                     </div>
                  </fieldset>
                  <!--fin del paso 2 -->
                  <!--paso fin -->
                  <fieldset>
                     <br>
                     <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                           <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                 <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 ¿Cuánto Cuesta el Entrenamiento? <i class="fa-regular fa-money-bill-1"></i>
                                 </a>
                              </h4>
                           </div>
                           <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body" style="color:black">
                                 El entrenamiento Nivel EMPEZAR cuesta $850.000 <br>
                                 <span style="color:red">* </span>Este no incluye alimentación
                              </div>
                           </div>
                        </div>
                        <div class="panel panel-default">
                           <div class="panel-heading" role="tab" id="headingTwo">
                              <h4 class="panel-title">
                                 <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 Condiciones y restricciones <i class="fas fa-exclamation-triangle"></i>
                                 </a>
                              </h4>
                           </div>
                           <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                 <ol style="color:black">
                                    <li>Con el envío del presente formulario, te comprometes a participar en este entrenamiento según lo programado.</li>
                                    <br>
                                    <li>La cuota mínima de inscripción es de $200.000, la cual no es reembolsable.</li>
                                    <br>
                                    <li>En caso de no asistir al entrenamiento  por causa de fuerza mayor o caso fortuito demostrable, podrás conservar tu cupo o hacer uso de la transferencia para el próximo entrenamiento inmediatamente siguiente. Debes tener en cuenta, enviar los soportes correspondientes al whatsapp de ECO, máximo 3 días hábiles siguientes a la ocurrencia del suceso para poder hacer uso del cupo.</li>
                                    <br>
                                    <li>Si eliges no hacer uso del cupo para tu entrenamiento, podrás solicitar reembolso del 20% del valor pagado.</li>
                                    <br>
                                    <li>Las transferencias de cupo debe hacerse al mismo taller, Básico y básico, avanzado a avanzado, y de PL a PL.</li>
                                    <br>
                                    <li>Solo se permite una transferencia por persona.</li>
                                    <br>
                                    <li>El reembolso a que haya lugar, solo le será entregado a la persona inscrita.</li>
                                 </ol>
                              </div>
                           </div>
                        </div>
                        <div class="panel panel-default">
                           <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                 <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 Ley de Habeas Data <i class="fa-solid fa-gavel"></i>
                                 </a>
                              </h4>
                           </div>
                           <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body" style="color:black">
                                 De conformidad con lo definido por la <strong><a style="link-style:none;" href="https://www.funcionpublica.gov.co/eva/gestornormativo/norma.php?i=49981" target="_blank"> Ley 1581 de 2012,</strong></a> implementada por<strong> LA EMPRESA ABC </strong>y las demás normas concordantes, a través de las cuales se establecen disposiciones generales en materia de habeas data y se regula el tratamiento de la información que contenga datos personales, me permito declarar de manera expresa que:  autorizo de manera libre, voluntaria, previa, explícita, informada e inequívoca a <strong>LA EMPRESA ABC </strong> para que en los términos legalmente establecidos realice la recolección, almacenamiento, uso, circulación, supresión y en general, el tratamiento de los datos personales que he procedido a entregar o que entregaré, en virtud de las relaciones comerciales y/o de cualquier otra que surja. Autorizo a <strong>LA EMPRESA ABC,</strong> para utilizar mis imágenes, fotos y videos para finalidades comerciales que permitan evidenciar la esencia de la institución, estas serán utilizadas en la página web; redes sociales de la institución entre otros.
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h3 class="modal-title" id="myModalLabel">¡Alerta!</h3>
                              </div>
                              <div class="modal-body" style="color:#000">
                                 Debe aceptar nuestra política de <strong>Habes Data</strong> antes de enviar el formulario. <i class="fa-solid fa-circle-exclamation mt-2"></i>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-modal" data-dismiss="modal">Lo haré</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="checkbox form-group">
                        <label class="m-2">
                        <input type="checkbox" id="checkAcuerdo" name="checkAcuerdo"> Leí, comprendí y estoy de acuerdo
                        </label>
                     </div>
                     <div class="f1-buttons">
                        <button type="button" class="btn btn-previous">Atrás</button>
                        <button type="submit" class="btn btn-submit">Finalizar</button>
                     </div>
                  </fieldset>
                  <!--fin -->
               </form>
            </div>
         </div>
      </div>
      <!-- Javascript -->
      <script src="assets/js/jquery-1.11.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
      <script src="assets/js/jquery.backstretch.min.js"></script>
      <script src="assets/js/retina-1.1.0.min.js"></script>
      <script src="assets/js/scripts.js"></script>
      <!--[if lt IE 10]>
      <script src="assets/js/placeholder.js"></script>
      <![endif]-->
      <script></script>
   </body>
</html>