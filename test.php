<!DOCTYPE html>
<html>
	<head>
		<title>testphp</title>
        <meta charset="UTF-8">
        <style type="text/css" media="screen">
            
        </style>
	</head>
	<body id="body">
        <script>
            document.getElementById("body").innerHTML = navigator.connection.type + "<br>";
            var txt = "";
            txt += "<p>Browser CodeName: " + navigator.appCodeName + "</p>";
            txt += "<p>Browser Name: " + navigator.appName + "</p>";
            txt += "<p>Browser Version: " + navigator.appVersion + "</p>";
            txt += "<p>Cookies Enabled: " + navigator.cookieEnabled + "</p>";
            txt += "<p>Browser Language: " + navigator.language + "</p>";
            txt += "<p>Browser Online: " + navigator.onLine + "</p>";
            txt += "<p>Platform: " + navigator.platform + "</p>";
            txt += "<p>User-agent header: " + navigator.userAgent + "</p>";

            document.getElementById("body").innerHTML = txt;

        </script>
        <?php 
            $ip = $_SERVER["REMOTE_ADDR"];  
            $host = gethostbyaddr($ip);
            $MAC = exec('getmac');
            $MAC = strtok($MAC, ' ');

            echo "IP Adresse: $ip<br>";  
            echo "Hostname: $host<br>"; 
            echo $MAC;
        ?>
         <?php
            //foreach ($_SERVER as $key=>$element) echo $key." - ".$element."<br>";
        ?> 
    </body>
</html>
