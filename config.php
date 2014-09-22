<?php

//define('HOSTNAME', 'localhost');  
//define('USER_DB', 'root');  
//define('PASS_DB', '');  
//define('DATABASE', 'a7432442_groupon');  

define('HOSTNAME', getenv('OPENSHIFT_MYSQL_DB_HOST'). ':' . getenv('OPENSHIFT_MYSQL_DB_PORT'));  
define('USER_DB', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));  
define('PASS_DB', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));  
define('DATABASE', getenv('OPENSHIFT_APP_NAME'));  
