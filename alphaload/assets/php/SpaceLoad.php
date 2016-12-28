<?php
if(file_exists("spaceload.json")){
    $sl = json_decode(file_get_contents("spaceload.json"), true);
    include 'assets/php/parsedown.php';
    $parse = new Parsedown();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Space Load</title>
    <link rel="stylesheet" type="text/css" href="assets/css/stylestwo.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <style type="text/css">
        .centerText {
            font-size: <?= $sl['topTitleFont'] ?>;
        }
        body {
            background-color: <?= ($sl['solidBg'] == "true"?$sl['solidBgColor']:"") ?>;
        }
        .avatar {
            border-radius: <?= ($sl['avatar_style'] == "round"?"100px":"0px") ?> !important;
        }
    </style>
</head>
<body>
<div class="pattern <?= ($sl['pattern']=="true"?$sl['patternChoice']:"") ?>"></div>
<div class="mainWrapper">
    <div class="topBar">
        <h1 class="centerText"><img class="avatar" src="<?php echo $avatar; ?>"> <?php echo $sl['topTitle']; echo " ".$username; ?>!</h1>
    </div>

    <div id="centered">
        <div class="wrapper">
            <div class="left">
                <h1 class="title"><?= $sl['leftTitle']; ?></h1>
                <p>
                    <?= $parse->text($sl['leftBox']) ?>
                </p>
            </div>

            <div class="mid">
                <h1 style="padding-top:20px" class="title"><?php echo $sl['middleTitle']; ?></h1>
                <p>
                    <span id="mapname" class="map"><i class="glyphicon glyphicon-map-marker"></i> Mapname</span><br>
                    <span id="gamemode" class="gm"><i class="glyphicon glyphicon-cog"></i> Gamemode</span><br>
                </p>
                <hr class="sweg">
                <p class="about">
                    <?= htmlspecialchars_decode($sl['about']) ?>
                </p>
            </div>

            <div class="right">
                <h1 class="title"><?php echo $sl['rightTitle'] ?></h1>
                <div class="rules">
                    <?= $parse->text($sl['rules']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="bottomBar">
        <h1 class="textchanger quotes"><?php echo $sl['textOne']; ?></h1>
        <h1 class="textchanger quotes"><?php echo $sl['textTwo']; ?></h1>
        <h1 class="textchanger quotes"><?php echo $sl['textThree']; ?></h1>
        <h1 class="textchanger quotes"><?php echo $sl['textFour']; ?></h1>
        <h1 class="textchanger quotes"><?php echo $sl['textFive']; ?></h1>
        <h1 class="textchanger quotes"><?php echo $sl['textSix']; ?></h1>
        <h1 class="textchanger quotes"><?php echo $sl['textSeven']; ?></h1>
        <div class="downloadbox">
            <div id="statuschanger">
                <p>Retrieving server info...</p>
            </div>

            <div id="progress" class="progress">
                <div id="progressbar" class="progress-bar" role="progressbar">

                </div>
            </div>

            <div class="insideglow"></div>
        </div>
    </div>
</div>
</body>
<?php
  if($sl['slides'] == "true"){
    $direct = "assets/uploads/spaceload/";
    $scanarray = array_diff(scandir($direct), array('..', '.'));
    echo "<div id=\"backgrounds\">";
            foreach ($scanarray as $single) {
                echo "<img src='assets/uploads/spaceload/".$single."' class='background' />";
            }
    echo "</div>";
  } elseif($sl['videoBg'] == "true") {
    $videoDir = "video/";
    $videoBackgrounds = scandir($videoDir);
    $t = rand(2, sizeof($videoBackgrounds)-1);
    echo "<video height='100%' autoplay loop id=\"video\">";
      echo "<source type='video/webm' src='video/" . $videoBackgrounds[$t] . "'>";echo "</video>";
  } else {
    if($sl['solidBg'] == "true"){
        echo "<div id='backgrounds' style='background-color:".$sl['solidBgColor'].";'></div>";
    } else {
        echo "<div id='backgrounds' style='background-color:#fff;'></div>";
    }
  }
?>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <?php if($sl['slides'] == "true"){ ?>
  <script type="text/javascript" src="assets/js/cycle.js"></script>
  <script type="text/javascript">
    $('#backgrounds').cycle({
        fx: 'fade',
        speed: 1000,
        timeout: <?php echo $sl['backgroundDelay']; ?>
    });
  </script>
    <?php } ?>
<script type="text/javascript">
 <?php echo "$(document).ready(function(){
$('.music').prop(\"volume\", ".$sl['musicVolume'].");
});";
?>
</script>
<?php echo "
<script type=\"text/javascript\">
        (function() {

            var quotes = $(\".quotes\");
            var quoteIndex = -1;

            function showNextQuote() {
                ++quoteIndex;
                quotes.eq(quoteIndex % quotes.length)
                    .fadeIn({left: ".$sl['textDelay']."})
                    .delay(".$sl['textDelay'].")
                    .fadeOut(".$sl['textDelay'].", showNextQuote);
            }

            showNextQuote();

        })();
    </script>";
?>
<script type="text/javascript">
function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode ) {
    var newGamemode = gamemode;
    newGamemode = newGamemode.replace("terrortown", "Trouble In Terrorist Town");
  	newGamemode = newGamemode.replace("prophunt", "Prophunt");
  	newGamemode = newGamemode.replace("stronghold", "F2S: Stronghold");
  	newGamemode = newGamemode.replace("sandbox", "Sandbox");
  	newGamemode = newGamemode.replace("murder", "Murder");
  	newGamemode = newGamemode.replace("darkrp", "DarkRP");
  	newGamemode = newGamemode.replace("zombiesurvival", "Zombie Survival");
  	newGamemode = newGamemode.replace("jailbreak", "Jailbreak");
  	document.getElementById("gamemode").innerHTML = "<i class='glyphicon glyphicon-cog'></i> " + newGamemode;
  	document.getElementById("mapname").innerHTML = "<i class='glyphicon glyphicon-map-marker'></i> " + mapname;
}
</script>
</html>
