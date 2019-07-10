var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	}) 
}

//Función limpiar
function limpiar()
{
	$("#idobra").val("");
	$("#nombre").val("");
	$("#direccion").val("");
	$("#encargado").val("");
	$("#duedeobra").val("");
	$("#fechainicio").val("");
	$("#fechafin").val("");
	$("#costo").val("");

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
					url: '../controllers/Obra.php?op=listar',
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
		url: "../controllers/Obra.php?op=guardaryeditar",
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

function mostrar(idobra)
{
	$.post("../controllers/Obra.php?op=mostrar",{idobra : idobra}, function(data, status)
	{
		data = JSON.parse(data);
		$("#idobra").val(data.idobra);
		$("#nombre").val(data.nombreobra);
		$("#direccion").val(data.direccion);
		$("#encargado").val(data.encargado);
		$("#duedeobra").val(data.nombre_dueño);
		$("#fechainicio").val(data.fechadeinicio);
		$("#fechafin").val(data.fechadetermino);
		$("#costo").val(data.costofinal);

 	})
}

//Función para Eliminar
function eliminar(idobra)
{
	var mensaje;
    var opcion = confirm("Está Seguro eliminar la Obra?");
    if (opcion == true) {
        $.post("../controllers/Obra.php?op=eliminar", {idobra : idobra}, function(e){
         		alert(e);
         		listar(); 
         		});	
	} else {
	   
	}
}
init();
