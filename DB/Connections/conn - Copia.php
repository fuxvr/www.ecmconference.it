<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_conn = "127.0.0.1";
$database_conn = "Sql958442_1"; 
$username_conn = "root";
$password_conn = "12345";
 
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR);  

?>
