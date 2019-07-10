var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	}) 
	//Cargamos los items al  
	$.post("../controllers/Empleado.php?op=selectobra", function(r){
	            $("#idobra").html(r);
	            $('#idobra').querySelector('refresh');
	});
	$("#imagenmuestra").hide();
}

//Función limpiar
function limpiar()
{
	$("#idempleado").val("");
	$("#nombre").val("");
	$("#apellidoP").val("");
	$("#apellidoM").val("");
	$("#telefono").val("");
	$("#tipodeempleado").val("");
	$("#salario_hora").val("");
	$("#idobra").val("");
	$("#imagen").val("");
	$("#imagenmuestra").hide();
	$("#print_credencial").hide();   // boton credencial

	$("#imagenmuestra").val("");
	$("#img").attr("src","../public/Icons/skull.png")
	var Nomempleado = document.getElementById("Nomempleado");
	var puesto = document.getElementById("Puesto");
	let res = document.querySelector('#table');
	Nomempleado.innerHTML='Nombre Empleado';
	puesto.innerHTML='Puesto';
	res.innerHTML ='';

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
					url: '../controllers/Empleado.php?op=listar',
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
		url: "../controllers/Empleado.php?op=guardaryeditar",
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


function mostrar(idempleado)
{
	$.post("../controllers/Empleado.php?op=mostrar",{idempleado : idempleado}, function(data, status)
	{
		data = JSON.parse(data);
		$("#idempleado").val(data.idempleado);
		$("#nombre").val(data.nombre);
		$("#apellidoP").val(data.apellidoP);
		$("#apellidoM").val(data.apellidoM);
		$("#telefono").val(data.telefono);
		$("#tipodeempleado").val(data.tipodeempleado);
		$("#salario_hora").val(data.salario_hora);
		$("#idobra").val(data.idobra_fk);
		$('#idobra').selectpicker('refresh');
		$("#imagenactual").val(data.imagen);
		$("#imagenmuestra").show();
		$("#print_credencial").show();   // boton credencial
		$("#imagenmuestra").attr("src","../files/empleados/"+data.imagen);		
		 var Nomempleado = document.getElementById("Nomempleado");
		 var puesto = document.getElementById("Puesto");
		 let res = document.querySelector('#table');
		 res.innerHTML ='';
		 $("#img").val("");
		 $("#img").attr("src","../files/empleados/"+data.imagen);
		 $("#img").attr("height='50px' width='50px'");
		Nomempleado.innerHTML = data.nombre+" "+data.apellidoP+" "+data.apellidoM;
		puesto.innerHTML = data.tipodeempleado;

   		 res.innerHTML += `
            <tr>    
                <td>${data.idobra_fk}</td>
                <td>${data.salario_hora}</td>
                <td>${data.telefono}</td>
            </tr>
        `;
 	})
}


function fallo () {
    document.getElementById("alerta").innerHTML =  '<div align="center" class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Datos Incorrectos</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';  
}

//Función para eliminar registros
function eliminar(idempleado)
{
	var mensaje;
    var opcion = confirm("Está Seguro eliminar el Empleado?");
    if (opcion == true) {
        $.post("../controllers/Empleado.php?op=eliminar", {idempleado : idempleado}, function(e){
				 alert(e);
				 fallo();
				 $('.toast').toast('show')
         		listar(); 
         		});	
	} else {
	   
	}
}


init();