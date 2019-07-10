<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
     <!-- DATATABLES -->
    <!-- <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    
    <title>Obras</title>
</head>
<body> -->

<?php
          include './cuerpo/cabecera.php';
   ?>

    <div  align="center" class="container  ">
      <br>
      <br><br>
      <div  class="text-center animated fadeInUp">
        
      <button class="btn btn-dark" data-toggle="modal" data-target="#modal-nueva-obra">Nueva Obra</button>
      </div>
      <br>
      <table class="table text-center " id="tbllistado">
          <thead align="center">
              <th scope="col">Nombre Obra</th>
              <th scope="col">Direccion</th>
              <th scope="col">Encargado de la obra</th>
              <th scope="col">Dueño</th>
              <th scope="col">Fecha de Inicio</th>
              <th scope="col">Fecha de Finalizacion</th>
              <th scope="col">Costo total</th>
              <th scope="col">Opciones</th>
            </thead>
            <tbody>                            
            </tbody>
      </table>
      <!-- Modal -->
      <div class="modal fade" id="modal-nueva-obra" tabindex="-1" role="dialog" aria-labelledby="modal-nuevo-material" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form name="formulario" id="formulario" method="POST">
                              <div class="modal-body "><div class=" row col">
                                <div class="col">
                                    <input type="hidden" class="form-control" name="idobra" id="idobra"  required   >
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre"  required >
                                    <br>
                                    <input type="text" class="form-control" name="direccion" placeholder="Direccion" id="direccion"  required >
                                    <br>
                                    <input type="text" class="form-control" name="encargado" placeholder="Encargado" id="encargado"  required >
                                    <br>
                                    <!-- <input type="text" class="form-control" name="duedeobra" placeholder="Dueño de Obra" id="duedeobra"> -->
                                  </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="duedeobra" placeholder="Dueño de Obra" id="duedeobra"  required >
                                    <!-- <input type="date" class="form-control" name="fechainicio" placeholder="Fecha de Inicio" id="fechainicio"> -->
                                    <br>
                                    <div class="row col-xl">
                                      <p class="col">Fecha de Inicio</p>
                                        <input type="date" class="form-control col-lg-9" name="fechainicio" placeholder="Fecha de Inicio" id="fechainicio"  required >
                                    </div>
                                    <!-- <input type="date" class="form-control" name="fechainicio" placeholder="Fecha de Inicio" id="fechainicio"> -->
                                    <!-- <input type="date" class="form-control" name="fechafin" placeholder="Fecha de Fin" id="fechafin"> -->
                                    <br>                                    
                                    <div class="row col-xl">
                                        <p class="col">Fecha de Finalizacion</p>
                                        <input type="date" class="form-control col-lg-9 " name="fechafin" placeholder="Fecha de Fin" id="fechafin"  required >
                                      </div>
                                    <!-- <input type="date" class="form-control" name="fechafin" placeholder="Fecha de Fin" id="fechafin"> -->
                                    <input type="hidden" class="form-control" name="costo" placeholder="Costo total" value="0" id="costo"  required >  
                                    <br>
                                </div>              
                              </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-dark" type="submit" id="btnGuardar" > <i class="fa fa-save"></i> Guardar</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </body>




<?php
          include './cuerpo/pie.php';
?>


<script type="text/javascript" src="scripts/Obra.js"></script>

<!-- 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<!-- 
<script type="text/javascript">
  $(function () {
      $('#datetimepicker1').datetimepicker();
  });
</script> -->
 <!-- jQuery 2.1.4 -->
            <!-- <script src="../public/js/jquery-3.1.1.min.js"></script> -->
            <!-- Bootstrap 3.3.5 -->
            <!-- <script src="../public/js/bootstrap.min.js"></script> -->
            <!-- DATATABLES -->
            <!-- <script src="../public/datatables/jquery.dataTables.min.js"></script>    
            <script src="../public/datatables/dataTables.buttons.min.js"></script>
            <script src="../public/datatables/buttons.html5.min.js"></script>
            <script src="../public/datatables/buttons.colVis.min.js"></script>
            <script src="../public/datatables/jszip.min.js"></script>
            <script src="../public/datatables/pdfmake.min.js"></script>
            <script src="../public/datatables/vfs_fonts.js"></script> 
            <script src="../public/js/bootstrap-select.min.js"></script> -->
            <!-- <script type="text/javascript" src="scripts/Obra.js"></script> -->

<!-- </html> -->