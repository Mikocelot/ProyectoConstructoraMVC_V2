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
	$("#idproveedor").val("");
	$("#nombre").val("");
	$("#direccion").val("");
	$("#telefono").val("");
	$("#email").val("");
	$("#imagen").val("");
	$("#imagenmuestra").hide();
	$("#imagenmuestra").val("");

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
					url: '../controllers/proveedor.php?op=listar',
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
	// $.ajax({
	// url: '../controllers/proveedor.php?op=listar',
	// success: function(respuesta) {
	// 	console.log(respuesta);
	// },
	// error: function() {
 //        console.log("No se ha podido obtener la información");
 //    }
 //   });
}

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../controllers/Proveedor.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          alert(datos);          
	          // mostrarform(false);
	          listar(); 
	    }

	});
	limpiar();
}

function mostrar(idproveedor)
{
	$.post("../controllers/Proveedor.php?op=mostrar",{idproveedor : idproveedor}, function(data, status)
	{
		data = JSON.parse(data);		
		//mostrarform(true);
		console.log(data);
		$("#idproveedor").val(data.idproveedor);
		$("#nombre").val(data.nombre_empresa);
		$("#direccion").val(data.direccion);
		$("#telefono").val(data.telefono);
		$("#email").val(data.correo);
		$("#imagenactual").val(data.imagen);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/proveedores/"+data.imagen);

 	})
}

//Función para Eliminar
function eliminar(idproveedor)
{
	// bootbox.confirm("¿Está Seguro eliminar el artículo?"+idproveedor, function(result){
	// 	if(result)
 //        {
 //       		$.post("../controllers/Proveedor.php?op=eliminar", {idproveedor : idproveedor}, function(e){
 //        		alert(e);
 //        	});	
 //        } 
	// })

	var mensaje;
    var opcion = confirm("Está Seguro eliminar el Proveedor?");
    if (opcion == true) {
        $.post("../controllers/Proveedor.php?op=eliminar", {idproveedor : idproveedor}, function(e){
         		alert(e);
         		listar(); 
         		});	
	} else {
	   
	}
}
init();

