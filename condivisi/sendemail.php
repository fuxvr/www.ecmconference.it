<?
 $a=$email;
 $oggetto="Ordine n. ";
 $oggetto.= $id;
 $messaggio ="Ordine fatto da : ";
 $messaggio .= $referente;
 $messaggio .=" Numero ordine : ";
 $messaggio .= $id;
 $messaggio .=" in data : "; 
 $messaggio .= $data;
 $messaggio .=" per acquisto di : "; 
 $messaggio .= $descrizione;
 $messaggio .=" dal fornitore : "; 
 $messaggio .= $fornitore;
 $messaggio .="    è STATO : "; 
 $messaggio .= $stato_desc;
 $messaggio .="   NOTE : "; 
 $messaggio .= $note;

 $messaggio .=".   Per maggiorni informazioni contattare Fabio. "; 
 
  $messaggio .="http://www.gardadivertimento.it/approved/"; 

 $intestazioni= "From: fabio@canevaworld.it";
 mail($a, $oggetto, $messaggio, $intestazioni);
 
 ?>
