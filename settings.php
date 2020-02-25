<!DOCTYPE html>
<html>
	<head>
		<title>Settings</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" id="stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Light/Custom/stylesheet_settings_light.css" title="light">
        <link rel="stylesheet" id="stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Light/Standard/stylesheet_standard_light.css" title="light">
        <link rel="alternate stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Dark/Custom/stylesheet_settings_dark.css" title="dark">
        <link rel="alternate stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Dark/Standard/stylesheet_standard_dark.css" title="dark">
        <script>
            "use strict";
            (function () {
                document.addEventListener("DOMContentLoaded", function () {
                    var currentSheetSTD = document.getElementById("stylesheet_standard"),
                    currentSheetSITE = document.getElementById("stylesheet_site"),
                    switcher = document.getElementById("darkmode");
                    console.log(switcher);

                    function loadStyle() {
                        if (localStorage.getItem("theme") == "dark") {
                            console.log(localStorage.getItem("theme"));
                            currentSheetSITE.href = "./Stylesheets/Dark/Custom/stylesheet_settings_dark.css";
                            currentSheetSTD.href = "./Stylesheets/Dark/Standard/stylesheet_standard_dark.css";
                        } else {
                            console.log(localStorage.getItem("theme"));
                            currentSheetSITE.href = "./Stylesheets/Light/Custom/stylesheet_settings_light.css";
                            currentSheetSTD.href = "./Stylesheets/Light/Standard/stylesheet_standard_light.css";
                        }
                    }

                    if (currentSheetSTD && currentSheetSITE && switcher) {
                        console.log("drin");
                        // set previously stored stylesheet?
                        loadStyle();

                        // listen for clicks on buttons
                        switcher.addEventListener("click", function (ev) {
                            
                            var x = document.getElementById("darkmode").checked;
                            if(x == true) {
                                localStorage.setItem(
                                        "theme",
                                        "dark"
                                );
                                loadStyle();
                            } else {
                                localStorage.setItem(
                                        "theme",
                                        "light"
                                );
                                loadStyle();
                            }
                        });
                    }
                });
            }());
        </script>
        <!--Manifest file für die Installation-->
        <link rel="manifest" href="manifest.json">
        <style type="text/css" media="screen">
            /*
            Darkfarben

            #61892F Dunkles Grüne
            #86C232 Helles Grün
            #222629 Schwarz
            #474B4F Dunkles Grau
            #6B6E70 Helles Grau
            */

        </style>
	</head>
	<body>
        <header>
            <div id="header_name">
                <h3 id="Ub_username">Username</h3>
                <h1 id="Ub_site">Home</h1>
            </div>
            <div id="header_picture">
                <img src=".\bilder\images_header\profile.png" style= "height: 80%; width: 80%;">
            </div>
        </header>
        <main>
            <div id="main_content">
                <script>
                    if(localStorage.getItem("theme") == "dark") {
                        document.getElementById("main_content").innerHTML = 
                            "<label class=\"switcher\">" 
                            + "<input type=\"checkbox\" id=\"darkmode\" checked>" 
                            + "<span class=\"slider round\"></span>" 
                            + "</label>";
                    } else {
                        document.getElementById("main_content").innerHTML = 
                            "<label class=\"switcher\">" 
                            + "<input type=\"checkbox\" id=\"darkmode\">" 
                            + "<span class=\"slider round\"></span>" 
                            + "</label>";
                    }
                </script>
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
                <a href="manu.php" class="footer_a"><img src=".\bilder\images_footer\back.png" style="height: 80%; width: 80%;"></a>
            </div>
        </footer>
    </body>
</html>