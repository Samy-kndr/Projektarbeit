<?php
session_start();
/*Nutzer die die URL erraten haben werden hier abgefangen*/
if (isset($_POST['submit'])) {

/*Verbindung zur Datenbank herstellen*/
include 'db.php';
  
 /*mysqli_real_escape_string filtert sonderzeichen, sodass nur text in die datenbank kommt*/
  $firstname = mysqli_real_escape_string($connection, $_POST['vorname']);
  $surename = mysqli_real_escape_string($connection, $_POST['nachname']);
  $nickname = mysqli_real_escape_string($connection, $_POST['benutzername']);
  $age = mysqli_real_escape_string($connection, $_POST['alter']);
  $country = mysqli_real_escape_string($connection, $_POST['land']);
  $email =  $_POST['email'];
  $password = mysqli_real_escape_string($connection, $_POST['passwort']);
  
/*Passwort verschlüsseln*/
  $Password_hashed = password_hash($password,PASSWORD_DEFAULT);
  
/*Daten an die Datenbank übertragen*/
	$sql = "INSERT INTO user_data (user_vorname, user_nachname, user_benutzername, user_alter, user_land, user_email, user_passwort) 
			VALUES ('$firstname', '$surename', '$nickname', '$age', '$country', '$email', '$Password_hashed');";
  
  $result = mysqli_query($connection, $sql);
	$_SESSION['session_user'] = $nickname;
	$_SESSION['session_id'] = $row['user_id'];
  $_SESSION['session_user'] = $row['user_nickname'];
  $_SESSION['session_firstname'] = $row['user_firstname'];
  $_SESSION['session_surename'] = $row['user_surename'];
/*Wenn die Registrierung erfolgreich war*/
  header("Location: index.html");
  exit();
} else {
/*Die Nutzer mit der erratenen URL werden hier hin geschickt*/
    header("Location: registration.html");
    exit();
}
?>