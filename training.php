<!DOCTYPE html>
<php>
	<head>
		<title>Training</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" id="stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Light/Custom/stylesheet_training_light.css" title="light">
        <link rel="stylesheet" id="stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Light/Standard/stylesheet_standard_light.css" title="light">
        <link rel="alternate stylesheet_site" media="screen" type="text/css" href="./Stylesheets/Dark/Custom/stylesheet_training_dark.css" title="dark">
        <link rel="alternate stylesheet_standard" media="screen" type="text/css" href="./Stylesheets/Dark/Standard/stylesheet_standard_dark.css" title="dark">
        <script>
            (function () {
                document.addEventListener("DOMContentLoaded", function () {
                    var currentSheetSTD = document.getElementById("stylesheet_standard"),
                    currentSheetSITE = document.getElementById("stylesheet_site");

                    console.log(localStorage.getItem("theme"));
                    if (localStorage.getItem("theme") == "dark") {
                        
                        currentSheetSITE.href = "./Stylesheets/Dark/Custom/stylesheet_training_dark.css";
                        currentSheetSTD.href = "./Stylesheets/Dark/Standard/stylesheet_standard_dark.css";
                    } else {
                        currentSheetSITE.href = "./Stylesheets/Light/Custom/stylesheet_training_light.css";
                        currentSheetSTD.href = "./Stylesheets/Light/Standard/stylesheet_standard_light.css";
                    }
                });
            }());
        </script>
        <!--Manifest file für die Installation-->
        <link rel="manifest" href="manifest.json">
        <style type="text/css" media="screen">
            #main_content {
                background: linear-gradient(#86C232, #4D6D25);
            }
            #main_leftside {
                background-color: #6B6E70;
            }
            #main_rightside {
                background-color: #6B6E70;
            }
        </style>
	</head>
	<body>
        <header>
            <div id="header_name">
                <h3 id="Ub_username">Username</h3>
                <h1 id="Ub_site">Training</h1>
            </div>
            <div id="header_picture">
                <img src=".\bilder\images_header\profile.png" style="height: 80%; width: 80%;">
            </div>
        </header>
        <main>
            <div id="main_leftside">

            </div>
            <div id="main_content">
                <a class="a_margin" href="training_1_selection.php"><button class="main_main_content_buttons">Lauf - Training</button></a>
                <a class="a_margin" href="notavaiable.php"><button class="main_main_content_buttons">Modus 2</button></a>
                <a class="a_margin" href="notavaiable.php"><button class="main_main_content_buttons">Modus 3</button></a>
                <a class="a_margin" href="notavaiable.php"><button class="main_main_content_buttons">Modus 4</button></a>
                <a class="a_margin" href="notavaiable.php"><button class="main_main_content_buttons">Modus 5</button></a>
                <a class="a_margin" href="notavaiable.php"><button class="main_main_content_buttons">Modus 6</button></a>
            </div>
            <div id="main_rightside">

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