<?php 
require_once "../modelos/Proveedor.php";

$proveedor=new Proveedor();
$idproveedor =isset($_POST["idproveedor"])? limpiarCadena($_POST["idproveedor"]):"";
$nombreempresa=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";



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
					move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/proveedores/" . $imagen);
				}
			}

			if (empty($idproveedor))
			{
				$rspta=$proveedor->insertar($nombreempresa,$direccion,$telefono,$email,$imagen);
				echo $rspta ? "Proveedor registrado insert" : "Proveedor no se pudo registrar";
			}
			else {
				$rspta=$proveedor->editar($idproveedor,$nombreempresa,$direccion,$telefono,$email,$imagen);
				echo $rspta ? "Proveedor actualizado" : "Proveedor no se pudo actualizar";
			}
			break;
	case 'eliminar':
			$rspta=$proveedor->eliminar($idproveedor);
				echo $rspta ? "Proveedor eliminado":"Proveedor no se puedo eliminar".$rspta;
			break;
	case 'mostrar':
			$rspta=$proveedor->mostrar($idproveedor);
			echo json_encode($rspta) ;
			break;
	case 'listar':
			$rspta=$proveedor->listar();
			//Vamos a declarar un array
 		$data= Array();
			while ($reg=$rspta->fetch_object()) {
				$data[] = array(
					"0"=>$reg->nombre_empresa,
	 				"1"=>$reg->direccion,
	 				"2"=>$reg->telefono,
	 				"3"=>$reg->correo,
	 				"4"=>"<img src='../files/proveedores/".$reg->imagen."' height='50px' width='50px' >",
	 				"5"=>'<button class="btn btn-primary btn-sm" onclick="mostrar('.$reg->idproveedor.')"><span><img src="../public/Icons/intercambio2.png" width="20" ></span></button>'.
 					' <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idproveedor.')"><span><img src="../public/Icons/boton-x.png" width="20" ></span></button>'
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
