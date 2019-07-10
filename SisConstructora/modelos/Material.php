<?php 
require ('config/conexion.php');

class Material
{
	public function __construct()
	{

	}

	public function insertar($codigodebarras,$nombre,$marca,$cantidad_existente,$unidad_medida,$descripcion_material,$imagen)
	{
		$sql="INSERT INTO material_bodega(codigodebarras,nombre,marca,cantidad_existente,unidad_medida,descripcion_material,imagen)VALUES ('$codigodebarras','$nombre','$marca','$cantidad_existente','$unidad_medida','$descripcion_material','$imagen')";
		return ejecutarConsulta($sql);
	}
	public function insertar_entrada($codigodebarras,$nombre,$marca,$cantidad_existente,$unidad_medida,$descripcion_material,$imagen,$idobra_fk)
	{
		$sql="INSERT INTO material_bodega(codigodebarras,nombre,marca,cantidad_existente,unidad_medida,descripcion_material,imagen,idobra_fk)VALUES ('$codigodebarras','$nombre','$marca','$cantidad_existente','$unidad_medida','$descripcion_material','$imagen','$idobra_fk')";
		return ejecutarConsulta($sql);
	}
	public function consultarentrad($idobra,$codigodebarras)
	{
		$sql="SELECT * FROM material_bodega where idobra_fk='$idobra' and codigodebarras=";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function actualizarstock()
	{
		$sql="UPDATE material_bodega set nombre='$nombre' ,apellidoP='$apellidoP' 
		,apellidoM='$apellidoM',telefono='$telefono',tipodeempleado='$tipodeempleado',imagen='$imagen',salario_hora='$salario_hora',idobra_fk='$idobra_fk'
		where idempleado='$idempleado'";
		return ejecutarConsulta($sql);

	}

	/*Terminan metodos para insertar materiales*/

	public function editar($idstock,$codigodebarras,$nombre,$marca,$cantidad_existente,$unidad_medida,$descripcion_material,$imagen)
	{
		$sql="UPDATE material_bodega SET codigodebarras = '$codigodebarras', nombre = '$nombre', marca = '$marca', cantidad_existente = '$cantidad_existente', unidad_medida = '$unidad_medida', descripcion_material = '$descripcion_material', imagen = '$imagen' WHERE idstock = '$idstock'";
		return ejecutarConsulta($sql);
	}
	
	public function eliminar($idstock)
	{
		$sql="DELETE FROM material_bodega 
		WHERE idstock='$idstock'";
		return ejecutarConsulta($sql);
	}
	
	public function mostrar($idstock)
	{
		$sql="SELECT * FROM material_bodega where idstock='$idstock'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function listar()
	{
		$sql="SELECT * FROM material_bodega";
		return ejecutarConsulta($sql);
	}
}

?>
