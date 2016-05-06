<?php
require_once('Connections/conn.php');
 
// variabili e modifica DB
$evento = $_GET['idevento'];
$id = $_GET['id'];	
$updateSQL = "DELETE FROM partecipanti  WHERE id=" . $id;
mysql_select_db($database_conn, $conn);
$Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());


// TORNA ALLA PAGINA
			header("location:../insert.php?idev=" .$evento);
			break;

?>
