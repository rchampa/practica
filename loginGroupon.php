<?php
require_once('config.php'); 

$user = $_POST['Usuario'];
$pass = $_POST['Contrasena'];

/*$user = 'a@svalero.com';
$pass = '1234';*/


//$link = mysql_connect('mysql1.000webhost.com', 'a7432442_groupon', 'a123456');
$link = mysql_connect(HOSTNAME, USER_DB, PASS_DB);
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db(DATABASE);
mysql_query("SET NAMES utf8");
$query = "SELECT * FROM Usuario WHERE EMail='{$user}' AND Pass='{$pass}'";
$q=mysql_query($query);

while($e=mysql_fetch_assoc($q)){
    $output[]=$e;
}

if(!isset($output)){
    $output = array(
	 'Id_usuario' => '-1'
	 );
    
}

print(json_encode($output));

mysql_close($link);
?>