<?php
require_once('config.php'); 

$tipo = $_POST['tipo'];
$ciudad = $_POST['ciudad'];

/*$user = 'a@svalero.com';
$pass = '1234';*/


//$link = mysql_connect('mysql1.000webhost.com', 'a7432442_groupon', 'a123456');
$link = mysql_connect(HOSTNAME, USER_DB, PASS_DB);
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db(DATABASE);
mysql_query("SET NAMES utf8");


if($ciudad=="-1" && $tipo=="-1"){
    $query = "SELECT * FROM Empresas e inner join Ofertas o on e.Id_Empresa=o.Id_Empresa";
}
else if($ciudad!="-1" && $tipo!="-1"){
    $query = "SELECT * FROM Empresas e inner join Ofertas o on e.Id_Empresa=o.Id_Empresa WHERE e.Id_Tipo='{$tipo}' AND e.Id_Ciudad='{$ciudad}'";
}
else if($tipo!="-1"){
    $query = "SELECT * FROM Empresas e inner join Ofertas o on e.Id_Empresa=o.Id_Empresa WHERE e.Id_Tipo='{$tipo}' ";
}
else if($ciudad!="-1"){
    $query = "SELECT * FROM Empresas e inner join Ofertas o on e.Id_Empresa=o.Id_Empresa WHERE e.Id_Ciudad='{$ciudad}'";
}



$q=mysql_query($query);

while($e=mysql_fetch_assoc($q)){
    $output[]=$e;
}

if(!isset($output)){
    $output = array(
	 'Id_Empresa' => '-1'
	 );
    
}

print(json_encode($output));

mysql_close($link);
?>