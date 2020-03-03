<?php 
    session_start();
    session_destroy();

    if(isset($_SESSION)) {
        $data = "Erfolgreich ausgeloggt!";
        alert($data);
    } else {
        $data = "Fehler beim ausloggen!";
        alert($data);
    }
    
    function alert($data) {
        $out = "<script>alert(\"$data\");</script>";

        echo $out;
    }
?>