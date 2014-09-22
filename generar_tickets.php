<?php 
    header('Content-type: text/plain; charset=utf-8');
    
    if( isset($_POST["json"]) ) { 
 

        //$test = '{"tickets":[{"descripcion":"2 cafes paga 1","Id_Usuario":1,"nombre_empresa":"Otra cafeter.a","email":"a@svalero.com","Unidades":1,"Id_Oferta":8},{"descripcion":"1 caf. paga 2","Id_Usuario":1,"nombre_empresa":"Una cafeter.a","email":"a@svalero.com","Unidades":1,"Id_Oferta":9}]}';

        $decode = $_POST["json"];
        //convertir a utf8 es necesario porque podría llegar en otra codificacion
        //por diversos motivos
        $cadena = utf8_encode($decode);

    //    $fp = fopen('data.txt', 'w');
    //    fwrite($fp, utf8_encode($decode));
    //    fclose($fp);
    //    //$decode = str_replace('&quot;', '"', $decode);
    //    $array =  (array) $decode;
    //    $cadena = implode("", $array);
    //    $cadena = stripslashes($cadena);
    //    $cadena = str_replace('&quot;', '"', $cadena);

        //echo $cadena;
        //$decode = json_decode($cadena);

        $decode = json_decode($cadena, true);
        //var_dump($decode);
        //$tickets = $decode->tickets;
        $tickets = $decode['tickets'];
        $num_tickets = count($tickets);

        require_once('config.php'); 

        $link = mysql_connect(HOSTNAME, USER_DB, PASS_DB);
        if (!$link) {
            die('No pudo conectar: ' . mysql_error());
        }

        mysql_select_db(DATABASE);
        mysql_query("SET NAMES utf8");
        
        for($i=0; $i<$num_tickets; $i++){

            $ticket = $tickets[$i];
            //echo $ticket['descripcion'];
            $query = "INSERT INTO TicketCompra(email, Unidades, Fecha_Compra, Id_Oferta, Id_Usuario) VALUES ('{$ticket['email']}',{$ticket['Unidades']},'{$ticket['Fecha_Compra']}',{$ticket['Id_Oferta']},{$ticket['Id_Usuario']})";
            $q=mysql_query($query);
        }
        
        $output = array(
                 'operacion' => 'exito'
                 );

        print(json_encode($output));

        mysql_close($link);

}

