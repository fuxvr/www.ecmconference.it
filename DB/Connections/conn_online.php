<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"


#$hostname_conn_online = "127.0.0.1";
#$database_conn_online = "test"; 
#$username_conn_online = "utentedb";
#$password_conn_online = "";

$hostname_conn_online = "89.46.111.15";
$database_conn_online = "Sql958442_5"; 
$username_conn_online = "Sql958442";
$password_conn_online = "f1021pm747";
 
$conn_online = mysql_connect($hostname_conn_online, $username_conn_online, $password_conn_online) or trigger_error(mysql_error(),E_USER_ERROR); 


?>
