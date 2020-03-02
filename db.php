<?php
    //Verbindung zur Datenbank herstellen
    $con = new mysqli('localhost', 'root', '', 'projektarbeit');
    
    //Fehlerbehandlung, falls beim Verbinden ein Fehler auftritt
    $errerNr = mysqli_connect_errno();

    if($errerNr != 0)
    {
        $data = "Verbindung fehlgeschlagen" . mysqli_connect_error() . "";
    
        debug_to_console($data);
    } else {
        $data = "Erfolgreich verbunden";

        debug_to_console($data);
    }
    function debug_to_console($data) {

        $output = "<script>console.log(\"$data\");</script>";
 
		echo $output;
	}
?>