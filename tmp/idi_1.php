<?php


if($_GET){
$tipo = $_GET['tipo'];
} else if($_POST){
$tipo = $_POST['tipo'];
}

if($_GET){
$idciudad = $_GET['idciudad'];
} else if($_POST){
$idciudad = $_POST['idciudad'];
}

$link = mysql_connect('mysql1.000webhost.com', 'a7432442_p', 'a123456');
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("a7432442_p");


$resultado = "";
$sql="";

mysql_query("SET NAMES utf8");


if ($tipo == 1)
{
$resultado=mysql_query("SELECT T_empresas.Nombre_empresa, T_empresas.Descripcion_empresa, T_empresas.Tipo, T_localizacion.Direccion_negocio, T_localizacion.Latitud, 
T_localizacion.Longitud, T_localizacion.telefono, T_localizacion.horario, T_localizacion.oferta, T_localizacion.Fecha_oferta, T_localizacion.Id_ciudad, T_tipo.descripcion FROM T_tipo INNER JOIN (T_empresas INNER JOIN T_localizacion ON T_empresas.NIF_CIF = T_localizacion.NIF_CIF) ON T_tipo.Id_tipo = T_empresas.tipo WHERE ((T_localizacion.oferta) IS NOT NULL)AND T_empresas.Tipo <> '' AND T_localizacion.Id_ciudad = {$_POST['idciudad']} ORDER BY T_localizacion.Fecha_oferta DESC;");
}
else
{
$resultado=mysql_query("SELECT T_empresas.Nombre_empresa, T_empresas.Descripcion_empresa, T_empresas.Tipo, T_localizacion.Direccion_negocio, T_localizacion.Latitud, 
T_localizacion.Longitud, T_localizacion.telefono, T_localizacion.horario, T_localizacion.oferta, T_localizacion.Fecha_oferta, T_localizacion.Id_ciudad, T_tipo.descripcion FROM T_tipo INNER JOIN (T_empresas INNER JOIN T_localizacion ON T_empresas.NIF_CIF = T_localizacion.NIF_CIF) ON T_tipo.Id_tipo = T_empresas.tipo WHERE ((T_localizacion.oferta) IS NOT NULL)AND T_empresas.Tipo = {$_POST['tipo']} AND T_localizacion.Id_ciudad = {$_POST['idciudad']} ORDER BY T_localizacion.Fecha_oferta DESC;");
}


/*
$resultado=mysql_query("SELECT T_empresas.Nombre_empresa, T_empresas.Descripcion_empresa, T_empresas.Tipo, T_localizacion.Direccion_negocio, T_localizacion.Latitud, 
T_localizacion.Longitud, T_localizacion.telefono, T_localizacion.horario, T_localizacion.oferta, T_localizacion.Fecha_oferta, T_localizacion.Id_ciudad, T_tipo.descripcion FROM T_tipo INNER JOIN (T_empresas INNER JOIN T_localizacion ON T_empresas.NIF_CIF = T_localizacion.NIF_CIF) ON T_tipo.Id_tipo = T_empresas.tipo WHERE ((T_localizacion.oferta) IS NOT NULL)AND T_empresas.Tipo = {$_POST['tipo']} AND T_localizacion.Id_ciudad = {$_POST['idciudad']} ORDER BY T_localizacion.Fecha_oferta DESC;");
*/	


//$resultado=mysql_query($sql);
	
while($e=mysql_fetch_assoc($resultado)){
	$output[]=$e;
}
print(json_encode($output));
mysql_close($link);
?>