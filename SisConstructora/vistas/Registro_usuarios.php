<?php
include './cuerpo/cabecera.php';
?>

<br><br><br>

<div class="container style_form" >
  <form  method="POST">
    <div class=" row col">
      <div class="col-8">
        <input type="text" class="form-control" name="nombreusuario" placeholder="Nombre de Usuario" id="nombre"  required >
        <br>
        <input type="text" class="form-control" name="clave" placeholder="Clave" id="clave"  required >
        <br>
      </div>


      <div class="col" >
        <div class="form-check">
          <input class="form-check-input" type="radio" name="blankRadio" id="radioadministrador" value="option1">
          <label class="form-check-label" for="radioadministrador"> Administrador </label>
        </div>
        <br><br>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="blankRadio" id="radioencargado" value="option1">
          <label class="form-check-label" for="radioencargado"> Encargado de Obra </label>
        </div>
        
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
<!-- <script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/Material.js"></script> -->
