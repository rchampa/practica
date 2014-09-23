<?php
require_once('config.php'); 

$user = $_POST['Usuario'];

$link = mysql_connect(HOSTNAME, USER_DB, PASS_DB);
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}


mysql_select_db(DATABASE);
mysql_query("SET NAMES utf8");

$query = "SELECT * FROM TicketCompra t inner join Ofertas o on t.Id_Oferta=o.Id_Oferta  where Id_Usuario={$user}";


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