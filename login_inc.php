<?php
/*Sitzung starten damit der Nutzer auch eingeloggt bleibt*/
session_start();
if (isset($_POST['submit'])) {

    include 'db.php';

    $nickname = mysqli_real_escape_string($con, $_POST['benutzername']);
    $password = mysqli_real_escape_string($con, $_POST['passwort']);

    // Error handlers
    // Existiert der Benutzername?
    $sql = "SELECT * FROM user_data WHERE user_benutzername = '$nickname'";
    
    $result = mysqli_query($connection, $sql);
    
    // mysqli_num_rows gibt die Anzahl an, wie oft die Bedingung von $sql erfüllt wird
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
        // ?login=user gibt die Information an die index.php weiter
        header("Location: login.html?login=user");
        exit();
    } else {
        // Ist das Passwort korrekt?
        // Die Variable row wird als Array mit den Informationen aus der Datenbank befüllt
        if ($row = mysqli_fetch_assoc($result)) {
            // De-Hashing des Passwortes 
            // password_verify($password, $row['password']) gibt true oder false zurück
            $hashedPassword = password_verify($password, $row['user_passwort']);
            
            if ($hashedPassword == false) {
                header("Location: login.html?login=password");
                exit();
              // elseif fängt unvorhergesehene Fehler ab
            } elseif($hashedPassword == true){
              // Benutzer anmelden
              $_SESSION['session_id'] = $row['user_id'];
              $_SESSION['session_user'] = $row['user_nickname'];
              $_SESSION['session_firstname'] = $row['user_firstname'];
              $_SESSION['session_surename'] = $row['user_surename'];
              header("Location: taktiks.php");
              exit();
            }
        }
    }

} else {
    header("Location: login.php?login=error");
    exit();
}