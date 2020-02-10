<!DOCTYPE html>
<html>
	<head>
		<title>Alle Mieter</title>
        <meta charset="UTF-8">
        <style type="text/css" media="screen">
            #management_main_content {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-content: center;
            }
            #management_header {
                height: 50px;
                width: 100vw;
            }
            #management_main {
                height: calc(100vh - 50px - 150px);
                width: 100vw;
            }
            #management_footer {
                height: 150px;
                width: 100vw;
                display: flex;
                background-color: #2C3531;
            }
            body {
                padding: 0;
                margin: 0;
            }
            .management_header_nav {
                border: 3px solid #2C3531;
                height: calc(100% - 6px);
                width: calc(25% - 6px);
                background-color: #2C3531;
                float: left;
                color: #D9B08C;
                font-weight: 600;
                font-size: 1.1rem;
                text-align: center;
            }
            .management_header_nav:hover {
                border: 3px solid #FFCB9A;
                height: calc(100% - 6px);
                width: calc(25% - 6px);
            }
            #management_main_content_left {
                height: 100%;
                width: 225px;
                background-color: rgba(44, 53, 49, 0.8);
            }
            #management_main_content_right {
                height: 100%;
                width: calc(100% - 225px);
                background-color: #D1E8E2;
                display: flex;
                justify-content: space-around;
                align-items: center;
            }
            .management_header_a {
                text-decoration: none;
                color: black;
            }
            .management_main_content_left_input {
                background-color: #116466;
                width: 90%;
                height: 20px;
                border: 2px solid #FFCB9A;
                border-radius: 10px;
                margin-left: 5%;
                margin-right: 5%;
                padding-left: 1%;
                font-weight: 500;
                color: #D9B08C;
            }
            .management_form_button_submit {
                height: 30px;
                width: 90%;
                border: 0;
                border: 2px solid #FFCB9A;
                border-radius: 15px;
                background-color: #116466;
                margin-left: 5%;
                margin-top: 20px;
                margin-bottom: 20px;
                font-size: 1rem;
                font-weight: 600;
                color: #D1E8E2;
            }
            .management_main_content_left_label {
                color: #D1E8E2;
                font-size: 1rem;
                font-weight: 600;
                margin-left: 6%;
            }
            .management_main_content_left_p {
                margin: 8px;
            }
            .management_main_content_right_table {
				width: 100%;
            }
            table, th, td {
                border: 2px solid #FFCB9A;
				padding: 0.6em;
                border-collapse: collapse;
                border-spacing: 0px;
            }
            .management_main_content_right_tr:nth-child(2n) {
                background-color: rgb(17, 100, 102, 0.7);
            }
            .management_footer_p {
                margin: 6px;
            }
            .management_footer_label {
                color: #D1E8E2;
                font-size: 1rem;
                font-weight: 600;
                margin-left: 6%;
            }
            .management_footer_input {
                background-color: #116466;
                width: 90%;
                height: 20px;
                border: 2px solid #FFCB9A;
                border-radius: 10px;
                margin-left: 2%;
                margin-right: 5%;
                padding-left: 1%;
                margin-bottom: 1%;
                font-weight: 500;
                color: #D9B08C;
            }
            .management_footer_form {
                width: 100vw;
                height: 100%;
            }
            .management_footer_form_select {
                width: 92%;
                height: 25px;
                border: 2px solid #FFCB9A;
                border-radius: 10px;
                margin-left: 5%;
                margin-right: 5%;
                padding-left: 1%;
                font-size: 1rem;
                font-weight: 500;
                color: #D9B08C;
                background-color: #116466;
            }
        </style>
	</head>
	<body>
        <?php             
            //Beim Verwenden für eine Andere Datenbank die name="" im select beachten!!!
            //Beschriftung der Input Felder
            $inp1 = "ID";
            $inp2 = "Alter";
            $inp3 = "Vorname";
            $inp4 = "Nachname";
            $inp5 = "Benutzername";
            $inp6 = "Email";

            //Namen der Spalten der Tabelle
            $spalte1 = "user_acc_id";
            
            $datenbank = "user_acc";
            
            $andern_auswahl = $_POST['such_auswahl'];
            
            //Variable initzialisiernen
            $where = "";

            //Verbindung zur Datenbank herstellen
            @$db = new mysqli('localhost', 'root', '', 'proarb');
            
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

            if(!empty($_POST)) {

                //Eingabe der Inputfelder den Variablen zuweisen
                $id = $_POST['id'];
                
                if(!empty($id)) {
					$where = "WHERE " . $spalte1 . " LIKE '$id' ";
				}

                $sql = "SELECT * "
                        . "FROM " . $datenbank
                        . " $where ";
                
                $ergebnis = $db->query($sql);
                
                if($db->errno)
                {
                    echo "<p class=\"error\">"
                            . "Daten konnten nicht gelesen werden werden. "
                            . "($db->errno - $db->error)"
                    . "</p>";
                }
            }
        ?>
        <header id="management_header">
            <a class="management_header_a" href="management_benutzerabfrage.php">
                <div class="management_header_nav">
                    <p>Benutzerabfrage</p>
                </div>
            </a>
            <a class="management_header_a" href="management_benutzerverwaltung.php">
                <div class="management_header_nav">
                    <p>Benutzerverwaltung</p>
                </div>
            </a>
            <a class="management_header_a" href="">
                <div class="management_header_nav">
                    <p>Datenver&auml;ndern</p>
                </div>
            </a>
            <a class="management_header_a" href="management_benutzerdatenverandern.php">
                <div class="management_header_nav">
                    <p></p>
                </div>
            </a>
        </header>
        <main id="management_main">
            <div id="management_main_content">
                <div id="management_main_content_left">
                    <form id="management_main_content_left_form" action="management_benutzerverwaltung.php" method="post" enctype="multipart/form-data">
                    <p class="management_main_content_left_p">    
                        <label class="management_footer_label" for="alter">Anrede</label>
                        <input class="management_footer_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_footer_label" for="alter">Alter</label>
                        <input class="management_footer_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_footer_label" for="alter">Vorname</label>
                        <input class="management_footer_input" type="text" name="vorname" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_footer_label" for="alter">Nachname</label>
                        <input class="management_footer_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_footer_label" for="alter">Benutzername</label>
                        <input class="management_footer_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_footer_label" for="alter">Land</label>
                        <input class="management_footer_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_footer_label" for="alter">Email</label>
                        <input class="management_footer_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_footer_label" for="alter">Zweite Email</label>
                        <input class="management_footer_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <button class="management_form_button_submit" name="submit" type="submit">Insert</button>
                    </p>
                    </form>
                </div>
                <div id="management_main_content_right">
                    <?php 
                        if(!EMPTY($ergebnis)) {

                            // Daten aus $ergebnis auslesen
                            echo "<table id =\"management_main_content_right_table\">"; 
                            echo "	<tr class =\"management_main_content_right_tr\">";
                            echo "		<th class =\"management_main_content_right_th\">$inp1</th>";
                            echo "      <th class =\"management_main_content_right_th\">$inp2</th>";
                            echo "      <th class =\"management_main_content_right_th\">$inp3</th>";
                            echo "      <th class =\"management_main_content_right_th\">$inp4</th>";
                            echo "      <th class =\"management_main_content_right_th\">$inp5</th>";
                            echo "      <th class =\"management_main_content_right_th\">$inp6</th>";
                            echo "	</tr>";
                            
                            
                            while($daten = $ergebnis->fetch_object())
                            {
                                echo "<tr class =\"management_main_content_right_tr\">";
                                    echo "	<td class =\"management_main_content_right_td\">$daten->user_acc_id</td>";
                                    echo "	<td class =\"management_main_content_right_td\">$daten->user_acc_alter</td>";
                                    echo "	<td class =\"management_main_content_right_td\">$daten->user_acc_vorname</td>";
                                    echo "	<td class =\"management_main_content_right_td\">$daten->user_acc_nachname</td>";
                                    echo "	<td class =\"management_main_content_right_td\">$daten->user_acc_benutzername</td>";
                                    echo "	<td class =\"management_main_content_right_td\">$daten->user_acc_email</td>";
                                echo "</tr>";
                            }
                            
                            echo "</table>";
                        }   
                    ?>
                </div>
            </div>
        </main>
        <footer id="management_footer">
            <form id="management_footer_form" action="management_benutzerverwaltung.php" method="post" enctype="multipart/form-data">
                <p class="management_footer_p">
                    <label class="management_main_content_left_label" for="sortieren">Suchen nach:</label>
                </p>
                <select class="management_footer_form_select" id="such_auswahl" name="such_auswahl">
                    <option value="user_acc_id"><?php echo $inp1 ?></option>
                        <?php 
                            if($sort == "user_acc_id")
                            echo "selected"
                        ?>
                    <option value="user_acc_alter"><?php echo $inp2 ?></option>
                        <?php 
                            if($sort == "user_acc_alter")
                            echo "selected"
                        ?>
                    <option value="user_acc_vorname"><?php echo $inp3 ?></option>
                        <?php 
                            if($sort == "user_acc_vorname")
                            echo "selected"
                        ?>
                    <option value="user_acc_nachname"><?php echo $inp4 ?></option>
                        <?php 
                            if($sort == "user_acc_nachname")
                            echo "selected"
                        ?>
                    <option value="user_acc_benutzername"><?php echo $inp5 ?></option>
                        <?php 
                            if($sort == "user_acc_benutzername")
                            echo "selected"
                        ?>
                    <option value="user_acc_email"><?php echo $inp6 ?></option>
                        <?php 
                            if($sort == "user_acc_email")
                            echo "selected"
                        ?>
                </select>    
                <p class="management_footer_p">
                    <label class="management_main_content_left_label" for="<?php echo $andern_auswahl ?>"><?php echo $andern_auswahl ?></label>
                </p>
                    <input class="management_main_content_left_input" type="text" name="<?php echo $andern_auswahl; ?>" <?php if(!EMPTY($andern_eingabe)) {echo "value=\"$andern_eingabe\"";} ?>>
                <button class="management_form_button_submit" name="submit" type="submit">Suchen</button>
            </form>
        </footer>
        <?php
            //Verbindung schließen
            $db->close();
        ?>
    </body>
</html>