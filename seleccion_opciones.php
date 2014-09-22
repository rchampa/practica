<?php
require_once('config.php'); 

//$link = mysql_connect('mysql1.000webhost.com', 'a7432442_groupon', 'a123456');
$link = mysql_connect(HOSTNAME, USER_DB, PASS_DB);
if (!$link) {
    die('No pudo conectar: ' . mysql_error());
}

mysql_select_db(DATABASE);
mysql_query("SET NAMES utf8");

$response[] = fetch_all(HOSTNAME, USER_DB, PASS_DB);

echo json_encode($response);

function fetch_all($host, $user, $pass) {

    $tipos = listar($host, $user, $pass, 'Tipo');
    $ciudades = listar($host, $user, $pass, 'Ciudades');
    
    //echo $tipos;
    //echo $ciudades;
    
    $result = array("code" => "200",
                    "tipos" => $tipos,
                    "ciudades" => $ciudades );
    
    return $result;
}

function listar($host, $user, $pass, $tabla) {

    $db = mysql_connect($host, $user, $pass);
    if (!$db) {
        die('No pudo conectar: ' . mysql_error());
    }

    mysql_select_db("a7432442_groupon");
    mysql_query("SET NAMES utf8");

    $result = mysql_query("SELECT * FROM ".$tabla) or die('Could not query');
    
    $str_result = "";

    if (mysql_num_rows($result)) {
        //echo '{"testData":[';
        //$str_result.="{'".$tabla."':[";
        //$str_result.='{"testData":[';

        $str_result.= "[";
        
        //$first = true;
        $row = mysql_fetch_assoc($result);
        $str_result.=implode($row,":");
        while ($row = mysql_fetch_row($result)) {
            //  cast results to specific data types
            $str_result.=',';
            //$str_result.=json_encode($row);
            $str_result.=implode($row,":");
        }
        //$str_result.=']}';
        $str_result.=']';
    } else {
        $str_result.='[]';
    }
    
    mysql_close($db);
    return $str_result;
    
}

?>