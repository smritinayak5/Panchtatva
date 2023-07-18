<?php
require "../private/autoload.php";
$user_data = check_login($connection);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <div class="logo">
            <div id="header">
                <div><p>Hello <?=$_SESSION['username']?></p></div>
            </div>
            <ul><li><a href="logout.php">Logout</a></li></ul>
        </nav>
        <center>
            <div class="col">
                <div class="site" title="Air">
                    <a id='gfg' href="Music/musicsearch.php">
                        <input class="button" type="image" src="BG/air.jpg" height="100px"/>
                        <p>Musics</p>
                    </a>
                </div>
            </div>
        </center>
        <center>
            <div class="col1">
                <div class="site" title="Fire">
                    <a id='gfg' href="Games/game.php">
                        <input class="button" type="image" src="BG/fire.jpg" height="100px"/>
                        <p>Games</p>
                    </a>
                </div>
            </div>
            <div class="col1">
                <div class="site" title="land">
                    <a id='gfg' href="Stories/story.php">
                        <input class="button" type="image" src="BG/land.jpg" height="100px"/>
                        <p>Stories</p>
                    </a>
                </div>
            </div>
        </center>  
        <center>
            <div class="col2">
                <div class="site" title="Water">
                    <a id='gfg' href="Browsers/searchoptions.php">
                        <input class="button" type="image" src="BG/water.jpg" height="100px"/>
                        <p>Search</p>
                    </a>
                </div>
            </div>
            <div class="col2">
                <div class="site" title="Cloud">
                    <a id='gfg' href="WeatherForecast/weather.php">
                        <input class="button" type="image" src="BG/cloud.jpg" height="100px"/>
                        <p>Wether Forcast</p>
                    </a>
                </div>
            </div>
        </center>
    </body>
</html>