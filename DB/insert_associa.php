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


$account = $_POST['account'];
$acc_arr = split(':',$account);


$evento = $_POST['evento'] ;
$eve_arr = split(':',$evento);

//  INSERT DATABASE 

 $insertSQL = sprintf("INSERT INTO associazioni (id_account, id_evento, account, evento) VALUES (%s, %s, %s, %s)",
						GetSQLValueString($acc_arr[0], "int"),
						GetSQLValueString($eve_arr[0], "int"),
					    GetSQLValueString($acc_arr[1], "text"),
                        GetSQLValueString($eve_arr[1] , "text"));

 $sql = $insertSQL;

 addslashes($sql); 

 		 mysql_select_db($database_conn, $conn);
 		 $Result1 = mysql_query( $sql, $conn) or die(mysql_error());
		 	 
	 

// TORNA INSERIMENTO
			header("location:../account_ass.php");
			break;






?>