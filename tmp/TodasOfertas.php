<?php

$ttipo="";
$ttipo = $_POST['tipo'];

$link = mysql_connect('mysql9.000webhost.com', 'a3080451_idiseas', 'qlpalr.1c');
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("a3080451_idiSeas");

mysql_query("SET NAMES utf8");

$resultadoSql="";

$resultadoSql = mysql_query("SELECT T_empresas.Nombre_empresa, T_empresas.Descripcion_empresa,T_empresas.Tipo, T_localizacion.Direccion_negocio, T_localizacion.telefono, T_localizacion.Latitud, T_localizacion.Longitud, T_localizacion.horario, T_localizacion.oferta, T_localizacion.Fecha_oferta, T_localizacion.Id_ciudad, T_tipo.descripcion
FROM T_tipo INNER JOIN (T_empresas INNER JOIN T_localizacion ON T_empresas.NIF_CIF = T_localizacion.NIF_CIF) ON T_tipo.Id_tipo = T_empresas.tipo
WHERE ((T_localizacion.oferta) IS NOT NULL)
ORDER BY T_localizacion.Fecha_oferta DESC ");


while($fila = mysql_fetch_assoc($resultadoSql))
{
 $output[]=$fila;
}
      print(json_encode($output));

mysql_close($link);
?>