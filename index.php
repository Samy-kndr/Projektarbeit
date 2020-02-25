<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" id="stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Light/Custom/stylesheet_index_light.css" title="light">
        <link rel="stylesheet" id="stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Light/Standard/stylesheet_standard_light.css" title="light">
        <link rel="alternate stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Dark/Custom/stylesheet_index_dark.css" title="dark">
        <link rel="alternate stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Dark/Standard/stylesheet_standard_dark.css" title="dark">
        <script>
            (function () {
                document.addEventListener("DOMContentLoaded", function () {
                    var currentSheetSTD = document.getElementById("stylesheet_standard"),
                    currentSheetSITE = document.getElementById("stylesheet_site");

                    console.log(localStorage.getItem("theme"));
                    if (localStorage.getItem("theme") == "dark") {
                        
                        currentSheetSITE.href = "./Stylesheets/Dark/Custom/stylesheet_index_dark.css";
                        currentSheetSTD.href = "./Stylesheets/Dark/Standard/stylesheet_standard_dark.css";
                    } else {
                        currentSheetSITE.href = "./Stylesheets/Light/Custom/stylesheet_index_light.css";
                        currentSheetSTD.href = "./Stylesheets/Light/Standard/stylesheet_standard_light.css";
                    }
                });
            }());
        </script>
        <!--Manifest file für die Installation-->
        <link rel="manifest" href="manifest.json">
        <!--Registrierungsscript des Service-Workers-->
        <script src="reg.js"></script>
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
                <a href="manu.php" class="footer_a"><img src=".\bilder\images_header\profile.png" style= "height: 80%; width: 80%;"></a>
            </div>
        </header>
        <main>
            <div id="main_content">
                <div id="main_content_top">
                    <div id="main_content_top_text">
                        <h1 id="main_content_top_text_h1">Letztes Training</h1>
                    </div>
                </div>
                <div id="main_content_left">
                    <a id="main_content_left_1_link" href="training.php">
                        <div id="main_content_left_1">
                            <div id="main_content_left_1_text">
                                <h1 id="main_content_left_1_text_h1">Training</h1>
                            </div>
                        </div>
                    </a>
                    <div id="main_content_left_2">
                        <div id="main_content_left_2_text">
                            <h1 id="main_content_left_2_text_h1">Anderes Training</h1>
                        </div>
                    </div>
                </div>
                <div id="main_content_right">
                    <div id="main_content_right_text">
                        <h1 id="main_content_right_text_h1">Tagesziel</h1>
                    </div>
                </div>
                <div id="main_content_middle">
                    <div id="main_content_middle_text">
                        <h1 id="main_content_middle_text_h1">Noch keine Idee</h1>
                    </div>
                </div>
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