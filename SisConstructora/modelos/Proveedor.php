<?php 
require ('config/conexion.php');

class Proveedor
{
	public function __construct()
	{

	}

	public function insertar($nombreempresa,$direccion,$telefono,$email,$imagen)
	{
		$sql="INSERT INTO proveedor(nombre_empresa,direccion,telefono,correo,imagen)
		VALUES ('$nombreempresa','$direccion','$telefono','$email','$imagen')";
		return ejecutarConsulta($sql);
	}

	public function editar($idproveedor,$nombreempresa,$direccion,$telefono,$email,$imagen)
	{
		$sql="UPDATE proveedor set nombre_empresa='$nombreempresa' ,direccion='$direccion' 
		,telefono='$telefono',correo='$email',imagen='$imagen'
		where idproveedor='$idproveedor'";
		return ejecutarConsulta($sql);
	}
	
	public function eliminar($idproveedor)
	{
		$sql="DELETE FROM proveedor 
		WHERE idproveedor='$idproveedor'";
		return ejecutarConsulta($sql);
	}
	
	public function mostrar($idproveedor)
	{
		$sql="SELECT * FROM proveedor where idproveedor='$idproveedor'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function listar()
	{
		$sql="SELECT * FROM proveedor";
		return ejecutarConsulta($sql);
	}
	public function select()
	{
		$sql="SELECT * FROM  categoria where condicion=1";
		return ejecutarConsulta($sql);
	}
}

?>
