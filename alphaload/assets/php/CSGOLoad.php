<?php
	include 'settings.php';
	if(file_exists("csgoload.json")){
		$csgo = json_decode(file_get_contents("csgoload.json"), true);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>CSGO Load</title>
    <link href="assets/css/stylesthree.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="centered">
	<div class="top">
		<div class="icon">
			<?php if($csgo['icon'] == "default"){ ?>
				<img src="assets/img/hint.png">
			<?php } else { ?>
				<img src="<?= $csgo['customicon']; ?>">
			<?php } ?>
		</div>
		<div class="hint">
			<p class="quotes"><?= $csgo['slide1']; ?></p>
			<p class="quotes"><?= $csgo['slide2']; ?></p>
			<p class="quotes"><?= $csgo['slide3']; ?></p>
			<p class="quotes"><?= $csgo['slide4']; ?></p>
			<p class="quotes"><?= $csgo['slide5']; ?></p>
			<p class="quotes"><?= $csgo['slide6']; ?></p>
		</div>
	</div>

	<div class="main">
		<div class="map">
			<?php if($csgo['gametracker'] == "true"){ ?>
				<div class="mapoverlay"></div>
				<img src="http://image.www.gametracker.com/images/maps/160x120/garrysmod/rp_c18_v1.jpg">
			<?php } else { ?>
				<img src="assets/img/csgo/<?= $csgo['csgomap']; ?>.png">
			<?php } ?>
		</div>
		<div class="desc">
			<div class="tportion">
				<h1>
					<?php if($csgo['mainT'] == "gm"){ ?>
						<div id="gamemode" style="font-size:25px;">Gamemode</div>
					<?php } elseif($csgo['mainT'] == "map"){ ?>
						<div id="mapname">Map</div>
					<?php } elseif($csgo['mainT'] == "custom"){ ?>
						<?= $csgo['mainTitle']; ?>
					<?php } ?>
				</h1>
					<?php if($csgo['secoT'] == "gm"){ ?>
						<div id="gamemode">Gamemode</div>
					<?php } elseif($csgo['secoT'] == "map"){ ?>
						<div id="mapname">Map</div>
					<?php } elseif($csgo['secoT'] == "custom"){ ?>
						<p><?= $csgo['secoTitle']; ?></p>
					<?php } ?>
				<div class="ticon">
					<?php if($csgo['icon2'] !== "custom"){ ?>
						<img src="assets/img/<?= $csgo['icon2']; ?>.png">
					<?php } else { ?>
						<img src="<?= $csgo['customicon2']; ?>">
					<?php } ?>
				</div>
			</div>
			<hr>
			<div class="bportion">
				<p><?= $csgo['description']; ?></p>
			</div>
		</div>
		<?php if($csgo['loadingbar'] == "true"){ ?>
		<div class="loading">
			<div id="statuschanger"><p>Retrieving server info...</p></div>
			<div class="bar">
				<div style="background-color:<?= $csgo['loadcolor']; ?>" class="filler"></div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div id="backgrounds">
	<?php
		if($csgo['slides'] == "true"){
			$direct = "assets/uploads/csgoload/";
    		$scanarray = array_diff(scandir($direct), array('..', '.'));
        foreach ($scanarray as $single) {
            echo "<img src='".$direct.$single."' class='background' />";
        }
    	} elseif($csgo['solidBg'] == "true") { ?>
    		<style type="text/css">
    			body {
    				background-color: <?= $csgo['solidBgColor']; ?>;
    			}
    		</style>
    	<?php
    	} elseif($csgo['videoBackground'] == "true") {
    		$videoDir = "video/";
    		$videoBackgrounds = scandir($videoDir);
    		$t = rand(2, sizeof($videoBackgrounds)-1);
    		echo "<video muted height='100%' autoplay loop id=\"video\">";
    		  echo "<source type='video/webm' src='video/" . $videoBackgrounds[$t] . "'>";echo "</video>";
    	} else { ?>
    		<img class="background" src="assets/uploads/csgoload/<?= $csgo['singleBack']; ?>">
    	<?php } ?>
</div>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<?php
if($csgo['slides'] == "true"){
    echo "<script type='text/javascript' src='assets/js/cycle.js'></script>
          <script type='text/javascript'>
            $('#backgrounds').cycle({
                fx: 'fade',
                speed: 1000,
                timeout: ".$csgo['slideDelay']."
            });
          </script>";
}
?>
<script type="text/javascript">
  (function() {
    var quotes = $(".quotes");
    var quoteIndex = -1;

    function showNextQuote() {
      ++quoteIndex;
      quotes.eq(quoteIndex % quotes.length).fadeIn({left: 1000}).delay(<?= $csgo['hintDelay'] ?>).fadeOut(1000, showNextQuote);
    }

    showNextQuote();
  })();
	var totalFiles, neededFiles, percent;
	function SetFilesTotal( total ) {
	  totalFiles = total;
	}
	function SetFilesNeeded( needed ) {
	  neededFiles = needed;
	  percent = Math.round((totalFiles - neededFiles)/totalFiles * 100);
	  document.getElementById("bar").innerHTML = "<div class='filler' style='width:"+percent+"%;'></div>";
	}
	function SetStatusChanged( status ) {
	  status = status;
	  document.getElementById("statuschanger").innerHTML = "<p>" + status + "</p>";
	  if(status = "Sending client info..."){
	  	document.getElementById("bar").innerHTML = "<div class='filler' style='width:"+percent+"%;'></div>";
	  }
	}
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
			document.getElementById("gamemode").innerHTML = "<p class='gamemodeText'>" + newGamemode + "</p>";
			document.getElementById("map").innerHTML = "<p class='mapText'>" + mapname + "</p>";
	}
</script>
</body>
</html>
