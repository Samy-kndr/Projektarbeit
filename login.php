<!DOCTYPE html>
<html>
	<head>
		<title>Registration</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" id="stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Light/Custom/stylesheet_login_light.css" title="light">
        <link rel="stylesheet" id="stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Light/Standard/stylesheet_standard_light.css" title="light">
        <link rel="alternate stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Dark/Custom/stylesheet_login_dark.css" title="dark">
        <link rel="alternate stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Dark/Standard/stylesheet_standard_dark.css" title="dark">
        <script>
            (function () {
                document.addEventListener("DOMContentLoaded", function () {
                    var currentSheetSTD = document.getElementById("stylesheet_standard"),
                    currentSheetSITE = document.getElementById("stylesheet_site");

                    console.log(localStorage.getItem("theme"));
                    if (localStorage.getItem("theme") == "dark") {
                        
                        currentSheetSITE.href = "./Stylesheets/Dark/Custom/stylesheet_login_dark.css";
                        currentSheetSTD.href = "./Stylesheets/Dark/Standard/stylesheet_standard_dark.css";
                    } else {
                        currentSheetSITE.href = "./Stylesheets/Light/Custom/stylesheet_login_light.css";
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
                <form  id="main_content_form" action="login_inc.php" method="post">
                    <fieldset id="form_fieldset">
                        <h1 id="form_h1">Anmelden</h1>

                        <p class="form_p">
                            <label class="form_label">Nickname</label>
                        </p>
                        <p class="form_p">
                            <input class="form_input" type="text" name="nickname" required>
                        </p>
                        <p class="form_p">
                            <label class="form_label">Passwort</label>
                        </p>
                        <p class="form_p">
                            <input id="pw" class="form_input" type="password" name="password" required>
                        </p>
                        <button id="form_button_submit" name="submit" type="submit">Anmelden</button>
                        <p id="form_p_login">
                            Noch keinen Account? Hier <a href="registration.php">registrieren</a>
                        </p>
                    </fieldset>
                </form>
            </div>
        </main>
        <footer>
            <div id="footer_location">
                <a href="location.php" class="footer_a"><img src=".\bilder\images_footer\location.png" style="height: 80%; width: 80%;"></a>
            </div>
            <div id="footer_home">
                <a href="index.php" class="footer_a"><img src=".\bilder\images_footer\home.png" style="height: 80%; width: 80%;"></a>
            </div>
            <div id="footer_back">
                <a href="index.php" class="footer_a"><img src=".\bilder\images_footer\back.png" style="height: 80%; width: 80%;"></a>
            </div>
        </footer>
    </body>
</html>