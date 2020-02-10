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
            .management_form_button_submit {
                height: 30px;
                width: 70%;
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
            #management_header {
                height: 50px;
                width: 100vw;
            }
            #management_main {
                height: calc(100vh - 50px - 70px);
                width: 100vw;
            }
            #management_footer {
                height: 70px;
                width: 100vw;
                display: flex;
                justify-content: space-around;
                align-items: center;
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
            .management_main_content_left_label {
                color: #D1E8E2;
                font-size: 1rem;
                font-weight: 600;
                margin-left: 6%;
            }
            .management_main_content_left_select {
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
        </style>
	</head>
	<body>
        <?php 
            $sort = "";
            $id = "";
            $alter = "";
			$vorname = "";
			$nachname = "";
			$benutzername = "";
			$email = "";

			if(!empty($_POST))
			{
                //Eingabe des Selectfelds der Variablen $sort zuweisen
                $sort = $_POST['sortieren'];

                //Eingabe der Inputfelder den Variablen zuweisen
                $id = $_POST['id'];
                $alter = $_POST['alter'];
                $vorname = $_POST['vorname'];
                $nachname = $_POST['nachname'];
                $benutzername = $_POST['benutzername'];
                $email = $_POST['email'];
			}
 
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
            $spalte2 = "user_acc_alter";
            $spalte3 = "user_acc_vorname";
            $spalte4 = "user_acc_nachname";
            $spalte5 = "user_acc_benutzername";
            $spalte6 = "user_acc_email";

            $datenbank = "user_acc";
            $tabelle1 = "user_acc";
            $tabelle2 = "user_position";

            //Variable initzialisiernen
            $where = "";
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
                    <form id="management_main_content_left_form" action="management_benutzerabfrage.php" method="post" enctype="multipart/form-data">
                        <p class="management_main_content_left_p">
                            <label class="management_main_content_left_label" for="sortieren">Sortieren nach:</label>
                        </p>
                        <p class="management_main_content_left_p">
                            <select class="management_main_content_left_select" id="sortieren" name="sortieren">
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
                        <p class="management_main_content_left_p">
                            <label class="management_main_content_left_label" for="<?php echo $inp1 ?>"><?php echo $inp1 ?></label>
                        </p>
                        <p class="management_main_content_left_p">
                            <input class="management_main_content_left_input" type="text" name="id"  value="<?php echo $id; ?>">
                        </p>
                        <p class="management_main_content_left_p">
                            <label class="management_main_content_left_label" for="<?php echo $inp2 ?>"><?php echo $inp2 ?></label>
                        </p>
                        <p class="management_main_content_left_p">
                            <input class="management_main_content_left_input" type="text" name="alter" value="<?php echo $alter; ?>">
                        </p>
                        <p class="management_main_content_left_p">
                            <label class="management_main_content_left_label" for="<?php echo $inp3 ?>"><?php echo $inp3 ?></label>
                        </p>
                        <p class="management_main_content_left_p">
                            <input class="management_main_content_left_input" type="text" name="vorname" value="<?php echo $vorname; ?>">
                        </p>
                        <p class="management_main_content_left_p">
                            <label class="management_main_content_left_label" for="<?php echo $inp4 ?>"><?php echo $inp4 ?></label>
                        </p>
                        <p class="management_main_content_left_p">
                            <input class="management_main_content_left_input" type="text" name="nachname"  value="<?php echo $nachname; ?>">
                        </p>
                        <p class="management_main_content_left_p">
                            <label class="management_main_content_left_label" for="<?php echo $inp5 ?>"><?php echo $inp5 ?></label>
                        </p>
                        <p class="management_main_content_left_p">
                            <input class="management_main_content_left_input" type="text" name="benutzername"  value="<?php echo $benutzername; ?>">
                        </p>
                        <p class="management_main_content_left_p">
                            <label class="management_main_content_left_label" for="<?php echo $inp6 ?>"><?php echo $inp6 ?></label>
                        </p>
                        <p class="management_main_content_left_p">
                            <input class="management_main_content_left_input" type="text" name="email"  value="<?php echo $email; ?>">
                        </p>
                </div>
                <div id="management_main_content_right">
                    <?php
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
                            
                            if(!empty($id)) {
                                $where = "WHERE " . $spalte1 . " LIKE '$id' ";
                            }
                            
                            if(!empty($alter)) {
                                if(!empty($where)) {
                                    $where = $where . "AND ";
                                }
                                else {
                                    $where = "WHERE ";
                                }
                                $where = $where . $spalte2 . " LIKE '%$alter%' ";
                            }
                            
                            if(!empty($vorname)) {
                                if(!empty($where)) {
                                    $where = $where . "AND ";
                                }
                                else {
                                    $where = "WHERE ";
                                }
                                
                                $where = $where . $spalte3 . " LIKE '%$vorname%' ";
                            }
                            
                            if(!empty($nachname)) {
                                if(!empty($where)) {
                                    $where = $where . "AND ";
                                }
                                else {
                                    $where = "WHERE ";
                                }
                                $where = $where . $spalte4 . " LIKE '$nachname%' ";
                            }
            
                            if(!empty($benutzername)) {
                                if(!empty($where)) {
                                    $where = $where . "AND ";
                                }
                                else {
                                    $where = "WHERE ";
                                }
                                $where = $where . $spalte5 . " LIKE '$benutzername%' ";
                            }
                            
                            if(!empty($email)) {
                                if(!empty($where)) {
                                    $where = $where . "AND ";
                                }
                                else {
                                    $where = "WHERE ";
                                }
                                $where = $where . $spalte6 . " LIKE '$email%' ";
                            }
            
                            $sql = "SELECT * "
                                    . "FROM " . $datenbank . " "
                                    . "$where "
                                    . " ORDER BY $sort";
                                    
                            $ergebnis = $db->query($sql);
                            
                            if($db->errno)
                            {
                                echo "<p class=\"error\">"
                                        . "Daten konnten nicht gelesen werden werden. "
                                        . "($db->errno - $db->error)"
                                . "</p>";
                            }
                        }

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
            <button class="management_form_button_submit" name="submit" type="submit">Suchen</button>
        </footer>
                    </form>
        <?php
            //Verbindung schließen
            $db->close();
        ?>
    </body>
</html>