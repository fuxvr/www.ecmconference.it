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
// per prima cosa verifico che il file sia stato effettivamente caricato


//percorso della cartella dove mettere i file caricati dagli utenti
$uploaddir = 'sfondi/';

//Recupero il percorso temporaneo del file
$userfile_tmp = $_FILES['file_inviato']['tmp_name'];

//recupero il nome originale del file caricato
$userfile_name = $_FILES['file_inviato']['name'];
move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name);

//copio il file dalla sua posizione temporanea alla mia cartella upload
if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {
  //Se l'operazione è andata a buon fine...
  echo 'File inviato con successo.';
}else{
  //Se l'operazione è fallta...
  echo 'Upload NON valido!'; 
}

// Recupero delle informazioni sul file inviato
$nome_file_temporaneo = $_FILES["file_inviato"]["tmp_name"];
$nome_file_vero = $_FILES["file_inviato"]["name"];
$tipo_file = $_FILES["file_inviato"]["type"];


// Leggo il contenuto del file
$dati_file = file_get_contents($nome_file_temporaneo);

// Preparo il contenuto del file per la query sql
$dati_file = addslashes($dati_file);

// variabili
session_start();
$permessi = $_SESSION['permessi'];


$evento = $_POST['evento'];
$data= $_POST['data'] ;

//  INSERT DATABASE 

 $insertSQL = "INSERT INTO eventi SET evento = '$evento',
								data = '$data',
								immagine = '$nome_file_vero',
								datimmagine = '$dati_file',
								tipofile = '$tipo_file'";

 $sql = $insertSQL;

 addslashes($sql); 

 		 mysql_select_db($database_conn, $conn);
 		 $Result1 = mysql_query( $sql, $conn) or die(mysql_error());
		 	 

// TORNA INSERIMENTO
header("location:../admin.php");



?>
