<?php
require_once('Connections/conn.php'); 
// Controlla se la sessione è stata registrata, altrimenti rimanda alla pagina di login
// Questa prima parte dobbiamo inserirla in tutte le pagine che vogliamo proteggere con password prima di qualsiasi altra cosa

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "-") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// variabili
session_start();
$permessi = $_SESSION['permessi'];

$data = date("y-m-d");
$evento = $_POST['evento'];
$nome= $_POST['partecipante'] ;
$notestampate = $_POST['notestampate'];
$note= $_POST['note'] ;


//  INSERT DATABASE 

 $insertSQL = sprintf("INSERT INTO partecipanti (data, evento, nome,notestampate, note) VALUES (%s, %s, %s, %s,%s)",
					   GetSQLValueString($data, "date"),
                       GetSQLValueString($evento , "text"),
					   GetSQLValueString($nome, "text"), 
					   GetSQLValueString($notestampate, "text"), 
                       GetSQLValueString($note, "text")) ;
                       

 $sql = $insertSQL;

 addslashes($sql); 

 		 mysql_select_db($database_conn, $conn);
 		 $Result1 = mysql_query( $sql, $conn) or die(mysql_error());
		 	 
echo  $sql;		 

header("location:../controllo.php?idev=" .$evento);
// TORNA INSERIMENTO


?>