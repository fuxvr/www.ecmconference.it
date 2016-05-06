<?php
// Apro la connessione al DB
// ------
// ------


// Recupero il file
$file = $_FILES['filecsv'];

$nome_file = $file['tmp_name']; # Nome temporaneo file
$size_file = $file['size']; # Dimensione file

// Controllo che il file sia stato inserito e che quindi esista
if ( ($handle = fopen($nome_file, "r") ) !== FALSE) {
	// Uso un contatore per vedere se sono nella prima riga dei campi
	$cont = 0;
	
	// Uso la funzione fgetcsv per recuperare le informzioni nel modo corretto dal CSV
	// Il secondo parametro è la dimesione del file, che abbiamo recuperato sopra	
	// Come si vede il 3 parametro è il separatore dei campi (;)
	// Il separatore per ogni riga in automatico è l'a capo
	while ( ( $data = fgetcsv($handle, $size_file, ";") ) !== FALSE ) {
		if ( $cont == 0 ) {
			$cont++;
			
			// Assegno ad una variabile $campi_tabella, la prima riga del nome dei campi del CSV
			$campi_tabella = $data;
		}
		else {
			// Recupero i nomi dei campi
			$campo_nome = $campi_tabella[0];
			$campo_cognome = $campi_tabella[1];
			$campo_indirizzo = $campi_tabella[2];
			$campo_mail = $campi_tabella[3];
			$campo_telefono = $campi_tabella[4];			
			
			// Recupero i valori dei campi
			$nome = $data[0];
			$cognome = $data[1];
			$indirizzo = $data[2];
			$mail = $data[3];
			$telefono = $data[4];

			// Creo una query di inserimento e la eseguo
			$sql = "
				INSERT INTO utenti SET 
					$campo_nome = '$nome',
					$campo_cognome = '$cognome',
					$campo_indirizzo = '$indirizzo',
					$campo_mail = '$mail',
					$campo_telefono = '$telefono'
			";
			$rssql = mysql_query( $sql );
			
			// Controllo che l'importazione sia avvenuta con successo
			echo ( $rssql ) ? "Importazione avvenuta con successo" : "Errore nella query o connessione al DB mancante";			
		}
	}
}
else
	echo "Nessun file inserito";
?>