<!DOCTYPE html>
<html>
	<head>
		<title>Alle Mieter</title>
        <meta charset="UTF-8">
        <style type="text/css" media="screen">
/***CSS für allgemeine Elemente***/
            body {
                padding: 0;
                margin: 0;
            }
/***CSS für den header***/
            #management_header {
                height: 50px;
                width: 100vw;
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
            .management_header_a {
                text-decoration: none;
                color: black;
            }

/***CSS für den main***/
            #management_main {
                height: calc(100vh - 50px - 150px);
                width: 100vw;
            }
            #management_main_content {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-content: center;
            }

        /*CSS für den linken container*/
            #management_main_content_left {
                height: 100%;
                width: 225px;
                background-color: rgba(44, 53, 49, 0.8);
            }
            
            .management_main_content_left_p {
                margin: 8px;
            }

        /*CSS für rechten container*/
            #management_main_content_right {
                height: 100%;
                width: calc(100% - 225px);
                background-color: #D1E8E2;
                display: flex;
                justify-content: space-around;
                align-items: center;
            }

/***CSS für footer***/
            #management_footer {
                height: 150px;
                width: 100vw;
                display: flex;
                background-color: #2C3531;
            }
            #management_footer_search {
                width: 30%;
                height: 100%;
            }
            .management_footer_p {
                margin: 8px;
            }
            #management_footer_actions {
                width: 70%;
                height: 100%;
            }
/***FORMULAR CSS***/
            .management_label {
                color: #D1E8E2;
                font-size: 1rem;
                font-weight: 600;
                margin-left: 5px;
            }
            .management_input {
                background-color: #116466;
                width: 90%;
                height: 20px;
                border: 2px solid #FFCB9A;
                border-radius: 10px;
                padding-left: 1%;
                font-weight: 500;
                color: #D9B08C;
            }
            .management_select {
                width: 92%;
                height: 25px;
                border: 2px solid #FFCB9A;
                border-radius: 10px;
                margin-right: 5%;
                padding-left: 1%;
                font-size: 1rem;
                font-weight: 500;
                color: #D9B08C;
                background-color: #116466;
            }
            .management_submit {
                height: 30px;
                width: 90%;
                border: 0;
                border: 2px solid #FFCB9A;
                border-radius: 15px;
                background-color: #116466;
                margin-top: 10px;
                font-size: 1rem;
                font-weight: 600;
                color: #D1E8E2;
            }
            #management_main_form {
                width: 100%;
                height: 100%;
            }
            #management_footer_form {
                width: 100%;
                height: 100%;
            }
            
/***TABELLEN CSS***/
            .management_table {
				width: 100%;
            }
            table, th, td {
                border: 2px solid #FFCB9A;
				padding: 0.6em;
                border-collapse: collapse;
                border-spacing: 0px;
            }
            .management_tr:nth-child(2n) {
                background-color: rgb(17, 100, 102, 0.7);
            }
            .management_number_3 {
                padding-top: 0.6em;
                padding-bottom: 0.6em;
                padding-right: 0.3em;
                padding-left: 0.3em;
                border-collapse: collapse;
                border-spacing: 0px;
                text-align: center;
            }
            .management_table_check {
                padding-top: 0.6em;
                padding-bottom: 0.6em;
                padding-right: 0.3em;
                padding-left: 0.3em;
                border-collapse: collapse;
                border-spacing: 0px;
                text-align: center;
            }
            @media only screen and (max-width: 880px) {
                table, th, td {
                    font-size: 0.8rem;
                    padding: 0.3em;
                }
            }
            @media only screen and (max-width: 700px) {
                table, th, td {
                    font-size: 0.6rem;
                    padding: 0.01em;
                    font-weight: bolder;
                    text-align: center
                }
                .management_table_check {
                    padding: 0;
                    border-collapse: collapse;
                    border-spacing: 0px;
                    text-align: center;
                }
                .management_td {
                    text-align: center;
                }
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
            <a class="management_header_a" href="./management_benutzerabfrage.php">
                <div class="management_header_nav">
                    <p>Benutzerabfrage</p>
                </div>
            </a>
            <a class="management_header_a" href="./management_benutzerverwaltung.php">
                <div class="management_header_nav">
                    <p>Benutzerverwaltung</p>
                </div>
            </a>
            <a class="management_header_a" href="">
                <div class="management_header_nav">
                    <p>Datenver&auml;ndern</p>
                </div>
            </a>
            <a class="management_header_a" href="./management_benutzerdatenverandern.php">
                <div class="management_header_nav">
                    <p></p>
                </div>
            </a>
        </header>
        <main id="management_main">
            <div id="management_main_content">
                <div id="management_main_content_left">
                    <form id="management_main_form" action="management_benutzerverwaltung.php" method="post" enctype="multipart/form-data">
                    <p class="management_main_content_left_p">    
                        <label class="management_label" for="alter">Anrede</label>
                        <input class="management_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_label" for="alter">Alter</label>
                        <input class="management_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_label" for="alter">Vorname</label>
                        <input class="management_input" type="text" name="vorname" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_label" for="alter">Nachname</label>
                        <input class="management_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_label" for="alter">Benutzername</label>
                        <input class="management_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_label" for="alter">Land</label>
                        <input class="management_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_label" for="alter">Email</label>
                        <input class="management_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <label class="management_label" for="alter">Zweite Email</label>
                        <input class="management_input" type="text" name="alter" <?php if(!EMPTY($alter)) {echo "value=\"$alter\"";} ?>>
                    </p>
                    <p class="management_main_content_left_p">
                        <button class="management_submit" name="user_insert_neue_werte" type="submit">Insert</button>
                    </p>
                    </form>
                </div>
                <div id="management_main_content_right">
                    <?php 
                        if(!EMPTY($ergebnis)) {

                            // Daten aus $ergebnis auslesen
                            echo "<table id =\"management_table\">"; 
                            echo "	<tr class =\"management_tr\">";
                            echo "		<th class =\"management_th\">$inp1</th>";
                            echo "      <th class =\"management_th\">$inp2</th>";
                            echo "      <th class =\"management_th\">$inp3</th>";
                            echo "      <th class =\"management_th\">$inp4</th>";
                            echo "      <th class =\"management_th\">$inp5</th>";
                            echo "      <th class =\"management_th\">$inp6</th>";
                            echo "      <th class =\"management_th\">&Auml;ndern</th>";
                            echo "	</tr>";
                            
                            
                            while($daten = $ergebnis->fetch_object())
                            {
                                echo "<tr class =\"management_tr\">";
                                    echo "	<td class =\"management_number_3\">$daten->user_acc_id</td>";
                                    echo "	<td class =\"management_number_3\">$daten->user_acc_alter</td>";
                                    echo "	<td class =\"management_td\">$daten->user_acc_vorname</td>";
                                    echo "	<td class =\"management_td\">$daten->user_acc_nachname</td>";
                                    echo "	<td class =\"management_td\">$daten->user_acc_benutzername</td>";
                                    echo "	<td class =\"management_td\">$daten->user_acc_email</td>";
                                    echo "	<td class =\"management_table_check\"><input type=\"checkbox\" name=\"loeschen[]\" value=\"\"></td>";
                                echo "</tr>";
                            }
                            
                            echo "</table>";
                        }   
                    ?>
                </div>
            </div>
        </main>
        <footer id="management_footer">
            <div id="management_footer_search">
                <form id="management_footer_form" action="management_benutzerverwaltung.php" method="post" enctype="multipart/form-data">
                    <label class="management_label" for="sortieren">Suchen nach:</label>
                    <p class="management_footer_p">
                        <select class="management_select" id="such_auswahl" name="such_auswahl">
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
                    </p>  
                    <p class="management_footer_p">
                        <input class="management_input" type="text" name="user_auswahl" <?php if(!EMPTY($user_auswahl)) {echo "value=\"$user_auswahl\"";} ?>>
                    </p>
                    <p class="management_footer_p">
                        <button class="management_submit" name="user_search" type="submit">Suchen</button>
                    </p>
                </form>
            </div>
            <div id="management_footer_actions">

            </div>
        </footer>
        <?php
            //Verbindung schließen
            $db->close();
        ?>
    </body>
</html>