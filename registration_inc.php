<?php
  session_start();
  /*Nutzer die die URL erraten haben werden hier abgefangen*/
  if (isset($_POST['submit'])) {

    /*Verbindung zur Datenbank herstellen*/
    include 'db.php';

    //Alle usernamen und emails von der Datenbank abrufen
    $sql = "SELECT user_username, user_email FROM user_acc";
    $user_erg = mysqli_fetch_assoc($con->query($sql));

    //Daten wurden nicht abgerufen
    if($con->errno)
    {
      $reg_error = "Fehler beim abrufen der Daten vom Server!. "
          . "($con->errno - $con->error)";

    //Daten wurden abgerufen
    } else {
      //Username existiert nicht
      if(!array_search($_POST['benutzername'], $user_erg))
      {
        //Email existiert nicht
        if(!array_search($_POST['email'], $user_erg)) 
        {
          //Wenn gültige Email
          if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
          {
            /*mysqli_real_escape_string filtert sonderzeichen, sodass nur text in die datenbank kommt*/
            $firstname = mysqli_real_escape_string($con, $_POST['vorname']);
            $surname = mysqli_real_escape_string($con, $_POST['nachname']);
            $nickname = mysqli_real_escape_string($con, $_POST['benutzername']);
            $age = mysqli_real_escape_string($con, $_POST['alter']);
            $country = mysqli_real_escape_string($con, $_POST['land']);
            //email muss nicht gefiltert werden da sie ja sonderzeichen enthält und mit filter_var bereits überprüft wurde
            $email =  $_POST['email'];
            $password = mysqli_real_escape_string($con, $_POST['passwort']);
            $contype = mysqli_real_escape_string($con, $_POST['contype']);
            $timestamp = time();
            
            /*Passwort Hashcode erzeugen*/
            $Password_hashed = password_hash($password,PASSWORD_DEFAULT);

            //SQL befehl der variable zuweisen
            $sql = "INSERT INTO user_acc (user_firstname, user_surname, user_username, user_age, user_country, user_email, user_password, acc_creation_date) 
                      VALUES ('$firstname', '$surname', '$nickname', '$age', '$country', '$email', '$Password_hashed', '$timestamp');";
            
            // SQL-Befehl an die Datenbank senden
            $ergebnis = $con->query($sql);

            // Fehlerbehandlung, ob der Befehl erfolgreich ausgeführt wurde
            // im Fehlerfall Benutzer zurück zu registration.php
            if($con->errno)
            {
              $reg_error = "Daten konnten nicht gespeichert werden. "
                  . "($con->errno - $con->error)";
              
              //Benutzer wird mit der Entsprechenden Fehlermeldung wieder zurück geschickt
              header("Location: registration.php?reg_error=" . $reg_error);
              //Verbindung schließen
              $con->close();
              exit();

            } else {
              $data = "<p>Speichern war erfolgreich.</p>";
              //Kontrollausgabe in der Console
              debug_to_console($data);

              //SQL Befehl der variablen $sql zuweisen
              $sql = "SELECT user_id, user_username FROM user_acc WHERE user_username = '$nickname' AND user_email = '$email'";

              //SQL befehl an die Datenbank schicken und das ergebnis in ein assoziatives Array umwandeln 
              $login_erg = mysqli_fetch_assoc($con->query($sql));
              
              //Bei einem Fehler
              if($con->errno)
              {
                //Fehlermeldung in reg_error schreiben 
                $reg_error = "Fehler beim automatischen anmelden!. "
                    . "($con->errno - $con->error)";
                
                //Benutzer und die fehlermeldung auf die loginseite weiterleiten
                header("Location: login.php?reg_error=" . $reg_error);
                // Verbindung schließen
                $con->close();
                exit();

              } else {
                //Benutzer anmelden (Session variablen anlegen und die abgerufenen Daten in diese schreiben)
                $_SESSION['session_user_id'] = $login_erg['user_id'];;
                $_SESSION['session_user_username'] = $login_erg['user_username'];
                
                //User auf die Startseite weiterleiten
                header("Location: index.php");
                // Verbindung schließen
                $con->close();
                exit();
              }
            }
          } else {
            //Email ungültig
            //Fehlermeldung 
            $reg_error =  "Das ist keine gueltige Email Adresse!";
            //Die bereits eingegebenen Daten wieder zurück schicken damit der Benutzer sie nicht erneut
            //Eingeben muss
            //Sie werden hinten an die URL angehängt
            header("Location: registration.php?vorname=" . $_POST['vorname']
            . "&&nachname=" . $_POST['nachname']
            . "&&benutzername=" . $_POST['benutzername']
            . "&&alter=" . $_POST['alter']
            . "&&land=" . $_POST['land']
            . "&&reg_error=" . $reg_error);
            
            //Verbindung schließen
            $con->close();
            exit();
          }
        } else {
        //Email exisitert bereits
        //Fehlermeldung
        $reg_error =  "Diese Email ist bereits registriert!";
        header("Location: registration.php?vorname=" . $_POST['vorname'] 
        . "&&nachname=" . $_POST['nachname']
        . "&&benutzername=" . $_POST['benutzername']
        . "&&alter=" . $_POST['alter']
        . "&&land=" . $_POST['land']
        . "&&reg_error=" . $reg_error);
        
        // Verbindung schließen
        $con->close();
        exit();
        }
      } else {
        //Nutzername existiert bereits
        //Fehlermeldung
        $reg_error = "Username ist bereits vergeben";
        header("Location: registration.php?vorname=" . $_POST['vorname'] 
          . "&&nachname=" . $_POST['nachname']
          . "&&alter=" . $_POST['alter']
          . "&&land=" . $_POST['land']
          . "&&email=" . $_POST['email']
          . "&&reg_error=" . $reg_error);
        
          // Verbindung schließen
        $con->close();
        exit();
      }
    }
  } else {
    /*Die Nutzer mit der erratenen URL werden hier hin geschickt*/
    header("Location: registration.php");
    // Verbindung schließen
    $con->close();
    exit();
  }
?>