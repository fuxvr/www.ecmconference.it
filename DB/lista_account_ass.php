<?php require_once('Connections/conn.php'); 

// QUERY ALL PARTECIPANTI
mysql_select_db($database_conn, $conn);


// QUERY ALL Account
$query_rs_ass = "SELECT * FROM associazioni";

$rs_ass = mysql_query($query_rs_ass, $conn) or die(mysql_error());
$row_rs_ass = mysql_fetch_assoc($rs_ass);
$totalRows_rs_ass = mysql_num_rows($rs_ass);


?>
