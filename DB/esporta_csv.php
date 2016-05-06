<?php
// Apro la connessione al DB
// connessione _locale
require_once('Connections/conn.php'); 
// seleziona database


//$result = mysql_query("SELECT * FROM partecipanti")or die("Errore nella query: " . mysql_error());


// Database Connection

$host= $hostname_conn;
$uname= $username_conn;
$pass= $password_conn;
$database = $database_conn;

$connection = mysql_connect($host,$uname,$pass); 

echo mysql_error();

//or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or 
die("Database could not be selected"); 
$result=mysql_select_db($database)
or die("database cannot be selected <br>");

// Fetch Record from Database

$output = "";
$table = "partecipanti"; // Enter Your Table Name 
$sql = mysql_query("select * from $table");
$columns_total = mysql_num_fields($sql);



// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .=$row["$i"].';';
}
$output .="\n";
}

// Download the file

$filename = "partecipanti.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;


?>