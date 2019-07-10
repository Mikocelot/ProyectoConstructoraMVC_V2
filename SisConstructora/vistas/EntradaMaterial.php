
<?php
          include './cuerpo/cabecera.php';
?>



<br><br><br>
<div class="container style_form" >
  <form  method="POST">
    <div class=" row col ">
      <div class="col">
      
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre"  required >
        <br>
        <input type="text" class="form-control" name="direccion" placeholder="Codigo" id="direccion"  required >
        <br>
        <input type="text" class="form-control" name="encargado" placeholder="Marca" id="encargado"  required >
        <br>
        <input type="number" class="form-control" name="duedeobra" placeholder="Cantidad" id="duedeobra"  required >
        <br>
      </div>
        <div class="col">
    <input type="text" class="form-control" name="fechainicio" placeholder="Unidad de Medida" id="fechainicio"  required >
    <br>
    <input type="text" class="form-control " name="fechafin" placeholder="Descripcion" id="fechafin"  required >
    <br>
    <input type="number" class="form-control" name="costo" placeholder="Precio" value="" id="costo"  required >
    <br>
    <input type="date" class="form-control" name="costo" placeholder="Fecha" value="" id="costo"  required >
    <br>
    </div>
    </div>
    <div class="text-center">
    <button class="btn btn-dark" type="submit" id="btnGuardar" > <i class="fa fa-save"></i>Ingresar</button>
    </div>
    </form>

</div>

</body>



<?php
include './cuerpo/pie.php';
?>
<script type="text/javascript" src="scripts/Obra.js"></script>

