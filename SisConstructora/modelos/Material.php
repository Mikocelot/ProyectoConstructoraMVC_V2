<?php 
require ('config/conexion.php');

class Material
{
	public function __construct()
	{

	}

	public function insertar($codigodebarras,$nombre,$marca,$cantidad_existente,$unidad_medida,$descripcion_material,$imagen,$idobra_fk)
	{
		$sql="INSERT INTO material_bodega(codigodebarras,nombre,marca,cantidad_existente,unidad_medida,descripcion_material,imagen,idobra_fk)VALUES ('$codigodebarras','$nombre','$marca','$cantidad_existente','$unidad_medida','$descripcion_material','$imagen','$idobra_fk')";
		return ejecutarConsulta($sql);
	}

	public function editar($idstock,$nombre,$marca,$cantidad_existente,$unidad_medida,$descripcion_material,$imagen,$idobra_fk)
	{
		$sql="UPDATE material_bodega set nombre='$nombre' ,apellidoP='$apellidoP' 
		,apellidoM='$apellidoM',telefono='$telefono',tipodeempleado='$tipodeempleado',imagen='$imagen',salario_hora='$salario_hora',idobra_fk='$idobra_fk'
		where idempleado='$idempleado'";
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
		$sql="SELECT material_bodega.idstock,material_bodega.codigodebarras,material_bodega.nombre,	material_bodega.marca,material_bodega.cantidad_existente,material_bodega.unidad_medida,material_bodega.descripcion_material,material_bodega.imagen,obra.nombreobra FROM material_bodega INNER JOIN obra on obra.idobra=material_bodega.idobra_fk";
		return ejecutarConsulta($sql);
	}
}

?>
