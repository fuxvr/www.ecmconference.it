<?php 
require_once('Connections/conn.php');


// Nome utente e password inviate attraverso il form
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];
$tbl_name = "utenti";

mysql_select_db($database_conn, $conn);
$sql = "SELECT * FROM $tbl_name WHERE user='$myusername' and password='$mypassword'";
$result = mysql_query($sql, $conn);
$rs_utenti = mysql_fetch_assoc($result);
$count = mysql_num_rows($result);

// if se utente e password sono giute
if($count==1){
// Register $myusername, $mypassword and redirect to file “login_success.php” 
session_start();
$_SESSION['myusername'] = $myusername ;
$_SESSION['mypassword'] = $mypassword ;  
$_SESSION['permessi'] = $rs_utenti['permessi'] ;
echo $_SESSION['myusername'] ;
echo $_SESSION['mypassword']  ;
echo $_SESSION['permessi'] ;
// if permessi utenti
 switch ($rs_utenti['permessi']) {
	case 0:
			header("location:../insert.php");
			break;
	case 1:
			header("location:../admin.php");
			break;
	case 2:
			header("location:../controllo.php");
			break;

	}
} else {
	header("location:../index.php");
} ?>