var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	}) 
	$("#imagenmuestra").hide();
}

//Función limpiar
function limpiar()
{
	$("#idstock").val("");
	$("#codigo").val("");
	$("#nombre").val("");
	$("#marca").val("");
	$("#cantidadexistente").val("");
	$("#unidadmedida").val("");
	$("#descripcion").val("");
	$("#precio").val("");
	$("#imagen").val("");
	$("#imagenactual").val("");
	$("#idobra").val("");
	$("#imagenmuestra").hide();

}
//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../controllers/Materiales.php?op=listar',
					type : "GET",
					dataType : "json",					
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../controllers/Materiales.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          alert(datos);          
	          // $('#modal-nuevo-material').modal('hide');
	          // $('body').removeClass('modal-open');
	          listar(); 
	    }

	});
	 limpiar();
}

function mostrar(idstock)
{
	$.post("../controllers/Materiales.php?op=mostrar",{idstock : idstock}, function(data, status)
	{
		data = JSON.parse(data);
		console.log(data);
		$("#idstock").val(data.idstock);
		$("#codigo").val(data.codigodebarras);
		$("#nombre").val(data.nombre);
		$("#marca").val(data.marca);
		$("#cantidadexistente").val(data.cantidad_existente);
		$("#unidadmedida").val(data.unidad_medida);
		$("#descripcion").val(data.descripcion_material);
		$("#precio").hide();
		$("#imagenactual").val(data.imagen);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/materiales/"+data.imagen);

 	})
}

//Función para Eliminar
function eliminar(idstock)
{
	var mensaje;
    var opcion = confirm("Está Seguro eliminar El material?");
    if (opcion == true) {
        $.post("../controllers/Materiales.php?op=eliminar", {idstock : idstock}, function(e){
         		alert(e);
         		listar(); 
         		});	
	} else {
	   
	}
}

function generarbarcode()
{
	codigo=$("#codigo").val();
	JsBarcode("#barcode", codigo);
	$("#print").show();
}


function imprimir()
{
	$("#print").printArea();
}
init();
