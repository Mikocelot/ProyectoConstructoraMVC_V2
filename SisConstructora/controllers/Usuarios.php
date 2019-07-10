<?php
session_start(); 
require_once "../modelos/Usuarios.php";

$usuario=new Usuario();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$tipodeusuario=isset($_POST["tipodeusuario"])? limpiarCadena($_POST["tipodeusuario"]):"";
$idempleado=isset($_POST["idempleado"])? limpiarCadena($_POST["idempleado"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':

		//Hash SHA256 en la contraseña
		$clavehash=hash("SHA256",$clave);

		if (empty($idusuario)){
			if ($idempleado=="Encargadodeobra") {
				$rspta=$usuario->insertar($login,$clavehash,$tipodeusuario,$idempleado);
				echo $rspta ? "Usuario registrado" : "No se pudo registrar usuario";
			}
			else{
				$rspta=$usuario->insertar($login,$clavehash,$tipodeusuario,null);
				echo $rspta ? "Usuario registrado" : "No se pudo registrar usuario";
			}
			
		}
		else {
			$rspta=$usuario->editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clavehash,$imagen,$_POST['permiso']);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
	break;
	case 'eliminar':
		$rspta=$usuario->eliminar($idusuario);
 		echo $rspta ? "Usuario Eliminado" : "Usuario no se puede eliminar";
	break;

	case 'mostrar':
		$rspta=$usuario->mostrar($idusuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->tipo_documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->telefono,
 				"5"=>$reg->email,
 				"6"=>$reg->login,
 				"7"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px' >",
 				"8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'verificar':
		$cuenta=$_POST['cuenta'];
	    $contraseña=$_POST['contraseña'];

	    //Hash SHA256 en la contraseña
		//$clavehash=hash("SHA256",$contraseña);

		$rspta=$usuario->verificar($cuenta,$contraseña);

		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        // $_SESSION['login']=$fetch->login;
	        // $_SESSION['tipodeusuario']=$fetch->tipodeusuario;
	       	// $_SESSION['nombre']=$fetch->nombre." ".$fetch->apellidoP." ".$fetch->apellidoM;
	    }

	    echo json_encode($fetch);
	break;

	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;
}
?>