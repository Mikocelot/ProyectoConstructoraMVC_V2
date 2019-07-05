<?php 
require_once "../modelos/Obra.php";

$obra=new Obra();
$idobra =isset($_POST["idobra"])? limpiarCadena($_POST["idobra"]):"";
$nombreobra=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$encargado=isset($_POST["encargado"])? limpiarCadena($_POST["encargado"]):"";
$nombre_due=isset($_POST["duedeobra"])? limpiarCadena($_POST["duedeobra"]):"";
$fechadeinicio=isset($_POST["fechainicio"])? limpiarCadena($_POST["fechainicio"]):"";
$fechadetermino=isset($_POST["fechafin"])? limpiarCadena($_POST["fechafin"]):"";
$costofinal=isset($_POST["costo"])? limpiarCadena($_POST["costo"]):"";

switch ($_GET["op"]) {
	 case 'guardaryeditar':
			if (empty($idobra))
			{
				$rspta=$obra->insertar($nombreobra,$direccion,$encargado,$nombre_due,$fechadeinicio,$fechadetermino,$costofinal);
				echo $rspta ? "Obra Registrada" : "Obra no se pudo registrar";
			}
			else {
				$rspta=$obra->editar($idobra,$nombreobra,$direccion,$encargado,$nombre_due,$fechadeinicio,$fechadetermino,$costofinal);
				echo $rspta ? "Obra actualizada" : "Obra no se pudo actualizar";
			}
			break;
	case 'eliminar':
			$rspta=$obra->eliminar($idobra);
				echo $rspta ? "Obra eliminada":"Obra no se puedo eliminar".$rspta;
			break;
	case 'mostrar':
			$rspta=$obra->mostrar($idobra);
			echo json_encode($rspta) ;
			break;
	case 'listar':
			$rspta=$obra->listar();
			//Vamos a declarar un array
 		$data= Array();
			while ($reg=$rspta->fetch_object()) {
				$data[] = array(
					"0"=>$reg->nombreobra,
	 				"1"=>$reg->direccion,
	 				"2"=>$reg->encargado,
	 				"3"=>$reg->nombre_dueño,
	 				"4"=>$reg->fechadeinicio,
	 				"5"=>$reg->fechadetermino,
	 				"6"=>$reg->costofinal,
	 				"7"=>'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-nueva-obra" onclick="mostrar('.$reg->idobra.')"><span><img src="../public/Icons/intercambio2.png" width="20" ></span></button>'.
 					' <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idobra.')"><span><img src="../public/Icons/boton-x.png" width="20" ></span></button>'
				);
			}
			$results = array(
	 			"sEcho"=>1, //Información para el datatables
	 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
	 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
	 			"aaData"=>$data);
			echo json_encode($results);
			break;
}

 ?>
