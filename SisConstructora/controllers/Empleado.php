<?php 
require_once "../modelos/Empleado.php";

$empleado=new Empleado();
$idempleado =isset($_POST["idempleado"])? limpiarCadena($_POST["idempleado"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellidoP=isset($_POST["apellidoP"])? limpiarCadena($_POST["apellidoP"]):"";
$apellidoM=isset($_POST["apellidoM"])? limpiarCadena($_POST["apellidoM"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$tipodeempleado=isset($_POST["tipodeempleado"])? limpiarCadena($_POST["tipodeempleado"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$salario_hora=isset($_POST["salario_hora"])? limpiarCadena($_POST["salario_hora"]):"";
$idobra=isset($_POST["idobra"])? limpiarCadena($_POST["idobra"]):"";


switch ($_GET["op"]) {
	 case 'guardaryeditar':

	 		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
			{
				$imagen=$_POST["imagenactual"];
			}
			else 
			{
				$ext = explode(".", $_FILES["imagen"]["name"]);
				if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
				{
					$imagen = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/empleados/" . $imagen);
				}
			}

			if (empty($idempleado))
			{
				$rspta=$empleado->insertar($nombre,$apellidoP,$apellidoM,$telefono,$tipodeempleado,$imagen,$salario_hora,$idobra);
				echo $rspta ? "Empleado Registrado" : "Empleado no se puedo Registrar";
			}
			else {
				$rspta=$empleado->editar($idempleado,$nombre,$apellidoP,$apellidoM,$telefono,$tipodeempleado,$imagen,$salario_hora,$idobra);
				echo $rspta ? "Empleado Actualizado" : "Empleado no se pudo Actualizar";
			}
			break;
	case 'eliminar':
			$rspta=$empleado->eliminar($idempleado);
				echo $rspta ? "Empleado Eliminado":"Empleado no se pudo Eliminar".$rspta;
			break;
	case 'mostrar':
			$rspta=$empleado->mostrar($idempleado);
			echo json_encode($rspta) ;
			break;
	case 'listar':
			$rspta=$empleado->listar();
			//Vamos a declarar un array
 		$data= Array();
			while ($reg=$rspta->fetch_object()) {
				$data[] = array(
					"0"=>$reg->nombre,
	 				"1"=>$reg->apellidoP,
	 				"2"=>$reg->apellidoM,
	 				"3"=>$reg->telefono,
	 				"4"=>$reg->tipodeempleado,
	 				"5"=>"<img src='../files/empleados/".$reg->imagen."' height='50px' width='50px' >",
	 				"6"=>$reg->salario_hora,
	 				"7"=>$reg->nombreobra,
	 				"8"=>'<button class="btn btn-primary btn-sm" onclick="mostrar('.$reg->idempleado.')"><span><img src="../public/Icons/intercambio2.png" width="20" ></span></button>'.
 					' <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idempleado.')"><span><img src="../public/Icons/boton-x.png" width="20" ></span></button>'
				);
			}
			$results = array(
	 			"sEcho"=>1, //Información para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
			echo json_encode($results);
			break;
	case "selectobra":
		require_once "../modelos/Obra.php";
		$obra=new Obra();

		$rspta = $obra->listar();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idobra . '>' . $reg->nombreobra . '</option>';
				}
			break;
}

 ?>
