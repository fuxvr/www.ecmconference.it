<?php
require_once('Connections/conn.php');
 
// variabili e modifica DB

$id = $_GET['idev'];	
$updateSQL = "DELETE FROM eventi  WHERE id=" . $id;
mysql_select_db($database_conn, $conn);
$Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());


// TORNA ALLA PAGINA
			header("location:../admin.php");
			break;

?>
