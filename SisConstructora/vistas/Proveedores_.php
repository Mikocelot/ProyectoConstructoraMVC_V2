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
    
    <title>Provedores</title>
</head>
<body> -->



<?php
          include './cuerpo/cabecera.php';
   ?>

    <div  align="center" class="container " >
        
        <br><br><br>
        <!-- <button class="btn btn-dark" data-toggle="modal" data-target="#modal-buscar-proveedor" >Buscar Proveedor</button> -->
        <hr>
        <div class="grid-item form-estilo  ">
            <div class="container style_form">
                <br>
                <form name="formulario" id="formulario" method="POST">
                    <div class="row" >
                        <div class="col" >
                            <input type="hidden" name="idproveedor" id="idproveedor"    required>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"   required>
                        </div>
                        <div class="col" >
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion"  required >
                        </div>
                        <div class="col" >
                            <input type="number" class="form-control" name="telefono" id="telefono"placeholder="Telefono"   required>
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col" >
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo"  required >
                        </div>
                        <div class="col" >
                            <div class="custom-file">
                                <!-- <input type="file" class="custom-file-input" name="imagen" id="imagen"> -->
                                <label data-browse="Foto" class="custom-file-label" for="imagen"></label>
                                <input type="file" class="" name="imagen" id="imagen">                                
                                <!-- <img src="" width="170px" height="140px" id="imagen"> -->
                                <!-- <img src="" width="150px" height="120px" id="imagenmuestra"> -->
                            </div>
                            <br><br>
                            
                                <img src="" width="170px" height="140px" id="imagenmuestra">
                                <input type="hidden" class="custom-file-input" name="imagenactual" id="imagenactual">                            
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-dark" type="submit" id="btnGuardar" > <i class="fa fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
        <br>
        <div class="grid-item  ">
            <div class="container ">
                <table class="table text-center " id="tbllistado">
                    <thead align="center">
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                      </thead>
                      <tbody>                            
                      </tbody>
                </table>
            </div>
        </div>
        
    </div>
    
</body>


<?php
include './cuerpo/pie.php';
?>

<script type="text/javascript" src="scripts/proveedor.js"></script>

