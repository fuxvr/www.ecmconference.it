<?php require_once('Connections/conn.php'); 

// QUERY Ingressi
mysql_select_db($database_conn, $conn);
if (isset($_GET['idev'])){
$query_rs_ingressi = "SELECT  * , DATE_FORMAT(data_ora,'%d/%m/%Y %H:%i:%s') as data FROM ingressi INNER JOIN partecipanti
ON ingressi.idpartecipante = partecipanti.id WHERE idevento = " .$_GET['idev'] . " ORDER BY data DESC" ;
// 

$rs_ingressi = mysql_query($query_rs_ingressi, $conn) or die(mysql_error());
$row_rs_ingressi = mysql_fetch_assoc($rs_ingressi);
$totalRows_rs_ingressi = mysql_num_rows($rs_ingressi);
};

	
?>
