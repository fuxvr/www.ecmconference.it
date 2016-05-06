<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_conn = "127.0.0.1";
$database_conn = "test"; 
$username_conn = "utentedb";
$password_conn = "";

#$hostname_conn = "89.46.111.15";
#$database_conn = "Sql958442_1"; 
#$username_conn = "Sql958442";
#$password_conn = "f1021pm747";
 
$conn = mysql_connect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 

?>
