   <?php
   include './cuerpo/cabecera.php';
   
   ?>
<br><br><br>
    <div  align="center" class="container ">
<!--       
<div class="col" id="alerta"></div> -->
<!--  -->
      <div class=" grid-container ">
        <div class="col">
            <div class="grid-container-componentes">
                <div class="grid-item estilo-tarjeta">
                    <div>
                        <img id="img" class="" src="../public/Icons/skull.png" width="250px" height="250px" alt="">
                        <h3 id="Nomempleado" >Nombre Empleado</h3>
                        <h5 id="Puesto">Puesto</h5>
                        <hr>
                        <table id="Mostrar" class="table text-center">
                          <thead>
                            <tr>
                              <th scope="col">Obra</th>
                              <th scope="col">Salario</th>
                              <th scope="col">Telefono</th>
                            </tr>
                          </thead>
                          <tbody id="table">
                            <tr>
                              
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div   class="col">
                  <div class="grid-item estilo-formulario ">
                    <div class="container">
                      <form  name="formulario" id="formulario" method="POST">
                        <div class="row" >
                          <div class="col">
                            <input type="hidden" class="form-control" name="idempleado" placeholder="Nombre" id="idempleado"  required >
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre" required>
                          </div>
                          <div class="col" >
                            <input type="text" class="form-control" name="apellidoP" placeholder="Apellido Paterno" id="apellidoP"  required >
                          </div>
                        </div>
                        <br>
                        <div class="row" >
                          <div class="col" >
                            <input type="text" class="form-control" name="apellidoM" placeholder="Apellido Materno" id="apellidoM"  required >
                          </div>
                          <div class="col" >
                            <input type="text" class="form-control" name="telefono" placeholder="Telefono" id="telefono"  required >
                          </div>
                        </div>
                        <br>
                        <div class="row" >
                          <div class="col" >
                            <input type="text" class="form-control" name="tipodeempleado" placeholder="Puesto" id="tipodeempleado"  required >
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" name="salario_hora" placeholder="Salario" id="salario_hora"  required >
                          </div>
                        </div>
                        <br>
                        <br>
                        <div class="grid-item" >
                          <label>Obra(*):</label>
                          <select id="idobra" name="idobra" class="form-control" required >
                          </select>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col" >
                            
                            <input class="botones" type="button"  data-toggle="modal" data-target="#modal-qr"  value=" QR ">

                          </div>
                          <div class="col" >
                            <div class="custom-file  fondo_rojo">
                              <input type="file" class="custom-file-input" name="imagen" id="imagen" required>
                              <label class="custom-file-label" for="customFileLangHTML" data-browse="Foto"></label>
                              <input type="hidden" class="custom-file-input" name="imagenactual" id="imagenactual" required >
                                <!-- <img src="" width="150px" height="120px" id=""> -->
                            </div>
                          </div>
                        </div>
                        <br>
                        
                        <input class="botones" type="button" onclick="limpiar();" value=" Cancelar ">
                        <input class="botones" type="submit" id="btnGuardar" value=" Guardar ">
                      </form>
                    </div>
                  </div>                  
                </div>
              </div>
              <!-- <button class="btn btn-dark botones" > Imprimir Credencial </button> -->
              
<div class="col" id="alerta"></div>
              <input id="print_credencial" class="botones" type="hidden" name="print_credencial" value="Imprimir Credencial" >
              <br>
              <div class="abajo_tabla table ">
                 <table class="table " id="tbllistado">
                        <thead  align="center" >
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">A Paterno</th>
                            <th scope="col">A Materno</th>
                            <th scope="col">Telefono</th>                          
                            <th scope="col">Puesto</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Salario</th> 
                            <th scope="col">Obra</th>
                            <th scope="col">Opciones</th>  
                          </tr>
                        </thead>
                        <tbody  align="center" class="" >
                          <tr>
                          </tr>
                        </tbody>
                 </table>
                 
               </div>
            </div> 


            
<!-- slideInUp -->
    <!-- Modal -->
    <div class="modal fade   animated zoomIn" id="modal-qr" tabindex="-1" role="dialog" aria-labelledby="modal-nuevo-material" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Genera QR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <div class="modal-body ">
                <div class=" row col">
                  <div class="col">
                  <div id="qr">
                  <img id="qr" class="" src="../public/Icons/skull.png" width="220px" height="220px" alt="">

                  </div>
                  </div>
                  <div class="col text-center">
                  <br><br>
                  <button value="Generar" onclick="update_qrcode()" class="btn btn-dark"> Generar </button>
                  <br><br>
                  <button value="Generar" onclick="  " class="btn btn-dark"> Descargar </button>
                  </div>              
                </div>
              </div>
        </div>
      </div>
    </div>
    <!-- fin modal-->
<!--  -->
                                
<?php
include './cuerpo/pie.php';
?>

    <script type="text/javascript" src="scripts/qrcode.js"></script>
    <script type="text/javascript" src="scripts/Empleado.js"></script>

