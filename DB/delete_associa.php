<?php
require_once('Connections/conn.php');
 
// variabili e modifica DB

$id = $_GET['id'];	
$updateSQL = "DELETE FROM associazioni  WHERE id=" .$id;
mysql_select_db($database_conn, $conn);
$Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());


// TORNA ALLA PAGINA
			header("location:../account_ass.php");
			break;

?>
