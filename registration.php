<!DOCTYPE html>
<html>
	<head>
		<title>Registration</title>
        <meta charset="UTF-8">
        <!--Standard Stylesheets-->
        <link rel="stylesheet" id="stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Light/Custom/stylesheet_registration_light.css" title="light">
        <link rel="stylesheet" id="stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Light/Standard/stylesheet_standard_light.css" title="light">
        <!--Alternative Stylesheet die aktiviert werden wenn im lokalen speicher in "theme" der Wert "dark" steht-->
        <link rel="alternate stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Dark/Custom/stylesheet_registration_dark.css" title="dark">
        <link rel="alternate stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Dark/Standard/stylesheet_standard_dark.css" title="dark">
        <script>
            (function () {
                //Eventlistener hinzufügen der beim laden der Seite ausgeführt wird
                document.addEventListener("DOMContentLoaded", function () {

                    //Die Elemente mit der entsprechenden ID den variablen zuweisen
                    var currentSheetSTD = document.getElementById("stylesheet_standard"),
                    currentSheetSITE = document.getElementById("stylesheet_site");

                    //Kontroll ausgabe
                    console.log(localStorage.getItem("theme"));

                    //Ausben speicher des geräts den Wert in Theme auslesen
                    if (localStorage.getItem("theme") == "dark") {
                        
                        //Wenn der Wert dark ist dann werden in den href teil der html tags die unten stehenden links  für 
                        // die dunklen sheets eingefügt
                        currentSheetSITE.href = "./Stylesheets/Dark/Custom/stylesheet_registration_dark.css";
                        currentSheetSTD.href = "./Stylesheets/Dark/Standard/stylesheet_standard_dark.css";
                    } else {
                        //Wenn der Wert light ist dann werden in den href teil der html tags die unten stehenden links für 
                        // die hellen sheets eingefügt
                        currentSheetSITE.href = "./Stylesheets/Light/Custom/stylesheet_registration_light.css";
                        currentSheetSTD.href = "./Stylesheets/Light/Standard/stylesheet_standard_light.css";
                    }
                });
            }());
            
        </script>
        <!--Manifest file für die Installation-->
        <link rel="manifest" href="manifest.json">
        <style type="text/css" media="screen">
            
        </style>
	</head>
	<body>
        <header>
            <div id="header_name">
                <h3 id="Ub_username">Username</h3>
                <h1 id="Ub_site">Home</h1>
            </div>
            <div id="header_picture">
                <img src=".\bilder\images_header\profile.png" style="height: 80%; width: 80%;">
            </div>
        </header>
        <main>
            <div id="main_content">
                <?php 
                    //Die Fehlermeldung der registrierung_inc.php wird hier ausgegeben
                    if(isset($_GET['reg_error'])) {
                        $data = $_GET['reg_error'];
                        alert($data);
                    }
                    //Function um ein Fenster mit der Fehlermeldung auszugeben
                    function alert($data) {
                        $out = "<script>alert(\"$data\")</script>";
                        echo $out;
                    }
                ?>
                <form  id="main_content_form" action="registration_inc.php" method="post">
                    <!--Script um inputfelder zu befüllen-->
                    <fieldset id="form_fieldset">
                        <h1 id="form_h1">Registrieren</h1>
                        <p class="form_p">
                            <label class="form_label">Vorname</label>
                        </p>
                        <p class="form_p">
                            <input class="form_input" type="text" name="vorname" <?php 
                            //Wenn der Benutzer wegen eines Fehlers die Registrierung wiederholen
                            //muss wird der bereits eingegebene Name automatisch in input feld geschrieben
                            if(isset($_GET['vorname'])) {
                                echo "value=" . $_GET['vorname'];
                            }
                                ?> required>
                        </p>
                        <p class="form_p">
                            <label class="form_label">Nachname</label>
                        </p>
                        <p class="form_p">
                            <input id="inputs" class="form_input" type="text" name="nachname" <?php 
                            if(isset($_GET['nachname'])) {
                                echo "value=" . $_GET['nachname'];
                            }
                                ?> required>
                        </p>
                        <p class="form_p">
                            <label class="form_label">Benutzername</label>
                        </p>
                        <p class="form_p">
                            <input class="form_input" type="text" name="benutzername" <?php 
                            if(isset($_GET['benutzername'])) {
                                echo "value=" . $_GET['benutzername'];
                            }
                                ?> required>
                        </p>
                        <p class="form_p">
                            <label class="form_label">Alter</label>
                        </p>
                        <p class="form_p">
                            <input class="form_input" type="number" name="alter" <?php 
                            if(isset($_GET['alter'])) {
                                echo "value=" . $_GET['alter'];
                            }
                            ?>>
                        </p>
                        <p class="form_p">
                            <label class="form_label">Land</label>
                        </p>
                        <p class="form_p">
                            <select class="form_select" size="1" name="land">
                                <option value="Deutschland" <?php 
                                //Wenn der Benutzer wegen eines Fehlers die Registrierung wiederholen
                                //muss wird das bereits ausgewählte Land wieder ausgewählt
                                if(isset($_GET['land']) && $_GET['land'] == "Deutschland") {
                                    echo "selected";
                                }
                                ?>>Deutschland</option>
                                <option value="Frankreich" <?php 
                                if(isset($_GET['land']) && $_GET['land'] == "Frankreich") {
                                    echo "selected";
                                }
                                ?>>Frankreich</option>
                                <option value="Frankreich" <?php 
                                if(isset($_GET['land']) && $_GET['land'] == "Frankreich") {
                                    echo "selected";
                                }
                                ?>>Spanien</option>
                                <option value="Spanien" <?php 
                                if(isset($_GET['land']) && $_GET['land'] == "Spanien") {
                                    echo "selected";
                                }
                                ?>>Tschechien</option>
                                <option value="Tschechien" <?php 
                                if(isset($_GET['land']) && $_GET['land'] == "Tschechien") {
                                    echo "selected";
                                }
                                ?>>Kroatien</option>
                                <option value="Kroatien" <?php 
                                if(isset($_GET['land']) && $_GET['land'] == "Kroatien") {
                                    echo "selected";
                                }
                                ?>>Italien</option>
                                <option value="Italien" <?php 
                                if(isset($_GET['land']) && $_GET['land'] == "Italien") {
                                    echo "selected";
                                }
                                ?>>Italien</option>
                            </select>
                        </p>
                        <p class="form_p">
                            <label class="form_label">Email</label>
                        </p>
                        <p class="form_p">
                            <input class="form_input" type="email" name="email" <?php 
                            if(isset($_GET['email'])) {
                                echo "value=" . $_GET['email'];
                            }
                                ?> required>
                        </p>
                        <p class="form_p">
                            <label class="form_label">Passwort</label>
                        </p>
                        <p class="form_p">
                            <input id="pw" class="form_input" type="password" name="passwort" required>
                        </p>
                        <p id="form_info">
                            * Passwort muss mindestens 6 Zeichen lang sein
                        </p>
                        <p class="form_p">
                            <label class="form_label">Passwort bestätigen</label>
                        </p>
                        <p class="form_p">
                            <input id="pwbe"class="form_input" type="password" name="pwbest" required>
                        </p>
                        <!--Feld für die Ausgabe des Skripts für den Passwortvergleich-->
                        <p id="error_message">

                        </p>
                        <!--Skript um die eingegebenen Passwörter zu vergleichen-->
                        <script>
                            const error_message = document.getElementById('error_message');

                            //Eventlistener wird hinzugefügt
                            /*Reagiert auf eine änderung des inputfeldes mit der ID pwbe
                            und ruft dann die funktion vergleich auf*/
                            document.querySelector('#pwbe').addEventListener('input', vergleich);

                            function vergleich() {
                                //Beide Passwörter werden verglichen
                                if(!(window.document.getElementById("pw").value === window.document.getElementById("pwbe").value)) {
                                    /*Wenn false herauskommt wird diese Error message unter dem Passwort
                                    bestätigen input angezeigt*/ 
                                    error_message.textContent = "Passwörter stimmen nicht überein!";
                                    //Der Registrierungs Button wird deaktiviert
                                    document.getElementById('form_button_submit').disabled = true;
                                } else {
                                    //wenn true heraus kommmt wird nichts angezeigt
                                    error_message.textContent = "";
                                    //Der Registrierungs Button wird aktiviert
                                    document.getElementById('form_button_submit').disabled = false;
                                }
                            }
                        </script>

                        <!--Verstecktes inputfeld das mit dem verbindungstyp befüllt wird-->
                        <input type="hidden" id="contype" name="contype" value="">

                        <!--Submit Buttom-->
                        <button id="form_button_submit" name="submit" type="submit">Registrieren</button>

                        <p id="form_p_login">
                            Bereits ein Konto? Hier <a href="login.html">anmelden</a>
                        </p>
                        <script>
                            document.getElementById("form_button_submit").addEventListener("click", function(){
                                document.getElementById("contype").value  =  navigator.connection.type;
                                
                                //Kontroll ausgabe
                                console.log(document.getElementById("con_type").value);
                            });
                    </script>
                    </fieldset>
                </form>
            </div>
        </main>
        <footer>
            <div id="footer_location">
                <a href="location.html" class="footer_a"><img src=".\bilder\images_footer\location.png" style="height: 80%; width: 80%;"></a>
            </div>
            <div id="footer_home">
                <a href="index.html" class="footer_a"><img src=".\bilder\images_footer\home.png" style="height: 80%; width: 80%;"></a>
            </div>
            <div id="footer_back">
                <a href="index.html" class="footer_a"><img src=".\bilder\images_footer\back.png" style="height: 80%; width: 80%;"></a>
            </div>
        </footer>
    </body>
</html>