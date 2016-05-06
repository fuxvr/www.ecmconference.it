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


$user = $_POST['user'];
$password = $_POST['password'] ;
$permessi = $_POST['permessi'] ;
$email = $_POST['email'] ;



//  INSERT DATABASE 

 $insertSQL = sprintf("INSERT INTO utenti (user, password, permessi, email) VALUES (%s, %s, %s, %s)",
						GetSQLValueString($user, "text"),
						GetSQLValueString($password, "text"),
					    GetSQLValueString($permessi, "int"),
                        GetSQLValueString($email , "text"));

 $sql = $insertSQL;

 addslashes($sql); 

 		 mysql_select_db($database_conn, $conn);
 		 $Result1 = mysql_query( $sql, $conn) or die(mysql_error());
		 	 
echo  $sql;		 

// TORNA INSERIMENTO
			header("location:../account.php");
			break;
	

?>