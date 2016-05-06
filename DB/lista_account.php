<?php require_once('Connections/conn.php'); 

// QUERY ALL PARTECIPANTI
mysql_select_db($database_conn, $conn);


// QUERY ALL Account
$query_rs_utenti = "SELECT * FROM utenti";

$rs_utenti = mysql_query($query_rs_utenti, $conn) or die(mysql_error());
$row_rs_utenti = mysql_fetch_assoc($rs_utenti);
$totalRows_rs_utenti = mysql_num_rows($rs_utenti);


?>
