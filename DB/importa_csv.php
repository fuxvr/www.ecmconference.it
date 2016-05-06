
 <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Importa dati</title>
<script type="text/javascript" src="../js/jquery-1.12.3.min.js"></script> 
<!--<script  type="text/javascript" src="../js/site.js"></script> -->
</head>
<body>

<?php
// COPIA IMMAGINI DELLA CARTELLE SFONDI IN LOCALE

// cartella da copiare
$s = 'ftp://7119953@aruba.it:k3c731vd75@ftp.ecmconference.it/www.ecmconference.it/DB/sfondi';

// destinazione
$c = 'c:\xampp\htdocs\www.ecmconference.it\DB\sfondi';

// copia ricorsiva di tutto il contenuto della cartella sorgente
copia_tutto($s,$c);

function copia_tutto($src,$dest) {
  foreach (scandir($src) as $file) {
    if (!is_readable($src.'/'.$file)) continue;
    if (is_dir($file) && ($file!='.') && ($file!='..') ) {
      mkdir($dest . '/' . $file);
      copia_tutto($src.'/'.$file, $dest.'/'.$file);
    } else copy($src.'/'.$file, $dest.'/'.$file);
  }
}


// chiudo la connessione
//********************************************************
// INIZIO COPIA DATI DAL FILE CSV
// Apro la connessione al DB
// connessione _locale


// IMPORT FILE
// Recupero il file

?>

<div class="unite" id="unite">

 </div>
 

 
</body>
</html>
<?php
		// TORNA ALLA PAGINA
			header("location:../insert.php");
			break;
?>