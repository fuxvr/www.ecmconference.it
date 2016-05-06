<?php


$evento = $_POST["evento"];
$nome = $_POST["myusername"];
$codice = $_POST["codice"];

if ($_POST["codice"]== ""){
	header("location:../controllo.php?idev=" .$evento);
} else{

require_once('Connections/conn.php'); 
// Query cotrollo se esiste il partecipante per questo evento 
$selectSQL = "SELECT * FROM partecipanti WHERE id = "  . $codice . " AND evento = ". $evento ; 

mysql_select_db("test", $conn);
$rs_part = mysql_query($selectSQL, $conn) or die(mysql_error());
$row_rs_part = mysql_fetch_assoc($rs_part);
$totalRows_rs_part = mysql_num_rows($rs_part);
// Ritorno alla Pagina
if ($totalRows_rs_part == 0){
	header("location:../controllo.php?stato=ko&idev=" .$evento);
	}
	
if ($totalRows_rs_part == 1){
// Query se il partecipante è gia entrato 
$selectingressi = "SELECT * FROM ingressi WHERE idpartecipante = "  . $codice . " AND idevento = ". $evento ; 
$rs_ingres = mysql_query($selectingressi, $conn) or die(mysql_error());
$row_rs_ingres = mysql_fetch_assoc($rs_ingres);
$totalRows_rs_ingres = mysql_num_rows($rs_ingres);
if ($totalRows_rs_ingres & 1 ){
		$stato = "USCITA";
	}else {
		$stato = "ENTRATA";		
	}
	
// If se già entrato fa 2 tipi di insert
$data_ora = date("Y/m/d H:i:s"); // data e ora inserimento 
$insertSQL = "INSERT INTO ingressi SET idevento = '$evento',
								idpartecipante = '$codice',
								data_ora = '$data_ora',
								terminale = '1',
								stato = '$stato'";

 addslashes($insertSQL); 
 		 mysql_select_db($database_conn, $conn);
 		 $Result1 = mysql_query( $insertSQL, $conn) or die(mysql_error());
		 	 
// Query insert ingresso partecipoante
	echo  $stato;

	header("location:../controllo.php?stato=" .$stato ."&idev=" .$evento);

}

}
?>