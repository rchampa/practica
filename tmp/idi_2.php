<?php

$Nombre = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$Codigo = $_POST['Codigo'];
$Unidades = $_POST['Unidades'];
$Reserva = $_POST['Reserva'];
$FechaReserva = $_POST['FechaReserva'];
$HoraReserva = $_POST['HoraReserva'];


$link = mysql_connect('mysql1.000webhost.com', 'a7432442_p', 'a123456');
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("a7432442_p");


$resultado = "";

mysql_query("SET NAMES utf8");


$resultado = mysql_query("INSERT INTO T_ofertas( Nombre, Apellidos, Codigo, Unidades, Reserva, FechaReserva, HoraReserva ) VALUES ('$Nombre', '$Apellidos', '$Codigo', '$Unidades', '$Reserva', '$FechaReserva', '$HoraReserva');");

                                                                                                                                                                 

print(json_encode($output));
mysql_close($link);
?>