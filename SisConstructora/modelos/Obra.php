<?php 
require ('config/conexion.php');

class Obra
{
	public function __construct()
	{

	}

	public function insertar($nombreobra,$direccion,$encargado,$nombre_dueño,$fechadeinicio,$fechadetermino,$costofinal)
	{
		$sql="INSERT INTO obra(nombreobra,direccion,encargado,nombre_dueño,fechadeinicio,fechadetermino,costofinal)VALUES ('$nombreobra','$direccion','$encargado','$nombre_dueño','$fechadeinicio','$fechadetermino','$costofinal')";
		return ejecutarConsulta($sql);
	}

	public function editar($idobra,$nombreobra,$direccion,$encargado,$nombre_dueño,$fechadeinicio,$fechadetermino,$costofinal)
	{
		$sql="UPDATE obra set nombreobra='$nombreobra' ,direccion='$direccion' 
		,encargado='$encargado',nombre_dueño='$nombre_dueño',fechadeinicio='$fechadeinicio',fechadetermino='$fechadetermino',costofinal='$costofinal'
		where idobra='$idobra'";
		return ejecutarConsulta($sql);
	}
	
	public function eliminar($idobra)
	{
		$sql="DELETE FROM obra 
		WHERE idobra='$idobra'";
		return ejecutarConsulta($sql);
	}
	
	public function mostrar($idobra)
	{
		$sql="SELECT * FROM obra where idobra='$idobra'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function listar()
	{
		$sql="SELECT * FROM obra";
		return ejecutarConsulta($sql);
	}

}

?>
