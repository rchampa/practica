<?php
$var = "";
if($_GET){
$var = $_GET['tipo'] . ".png";
} else if($_POST){
$var = $_POST['tipo'] . ".png";
}
$link = mysql_connect('mysql1.000webhost.com', 'a7432442_groupon', 'a123456');
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db("a7432442_groupon");
$q = "";
mysql_query("SET NAMES utf8");
if($var != "Todos.png"){
	$q=mysql_query("SELECT * FROM seas01 where imagen like '%".$var ."%'");
} else {
	$q=mysql_query("SELECT * FROM seas01");
}
while($e=mysql_fetch_assoc($q)){
	$output[]=$e;
}
print(json_encode($output));
mysql_close($link);
?>
