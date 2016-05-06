<?php

try
{
	require_once('Connections/conn.php'); 
	//Open database connection
	//$con = mysql_connect("127.0.0.1","utentedb","");
	mysql_select_db("test", $conn);

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database DATE_FORMAT(data_ora,'%d/%m/%Y %H:%i:%s') as data
		$result = mysql_query("SELECT ingressi.id , stato, nome , idpartecipante , data_ora as data  FROM ingressi INNER JOIN partecipanti
ON ingressi.idpartecipante = partecipanti.id WHERE idevento = " .$_GET['idev'] . " ORDER BY data DESC;");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysql_query("INSERT INTO ingressi (idevento, stato, idpartecipante, data_ora) VALUES(".$_GET['idev']. ", '" . $_POST["stato"] . "', " . $_POST["idpartecipante"] . ", '" . $_POST["data"] . "')");
																					 
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM ingressi WHERE id = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE ingressi SET stato = '" . $_POST["stato"] . "', idpartecipante = " . $_POST["idpartecipante"] . ", data_ora = '". $_POST["data"]."' WHERE id = " . $_POST["id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM ingressi WHERE id = " . $_POST["id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($conn);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>