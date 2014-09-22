<?php
$user = $_POST['Usuario'];
$pass = $_POST['Contrasena'];

/*$user = 'a';
$pass = 'a1'; */


$link = mysql_connect('mysql1.000webhost.com', 'a7432442_p', 'a123456');
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("a7432442_p");
mysql_query("SET NAMES utf8");
$q=mysql_query("SELECT * FROM T_usuarios WHERE email='{$user}' AND passwd='{$pass}'");

while($e=mysql_fetch_assoc($q))

              $output[]=$e;

      print(json_encode($output));

mysql_close($link);
?>