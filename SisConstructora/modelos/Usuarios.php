<?php 
require ('config/conexion.php');

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($usuario,$clave,$tipodeusuario,$idempleado)
	{
		$sql="INSERT INTO usuarios (idusuario,login,clave, tipodeusuario,idempleado_fk) VALUES('$usuario','$clave','$tipodeusuario','$idempleado')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idusuario,$usuario,$clave,$tipodeusuario,$idempleado)
	{
		$sql="UPDATE usuarios SET login = '$usuario', clave = '$clave', tipodeusuario = $tipodeusuario, idempleado_fk = '$idempleado' WHERE usuarios.idusuario = '$idusuario'";
		ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function eliminar($idusuario)
	{
		$sql="DELETE FROM usuarios WHERE idusuario = '$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM usuario";
		return ejecutarConsulta($sql);		
	}
	//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	$sql="SELECT usuarios.login,usuarios.tipodeusuario,empleado.nombre,empleado.apellidoP,empleado.apellidoM FROM usuarios INNER JOIN empleado on empleado.idempleado=usuarios.idempleado_fk  WHERE login='$login' AND clave='$clave' "; 
    	return ejecutarConsulta($sql);  
    }
}

?>