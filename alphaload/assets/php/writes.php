<?php

$slsettings = "spaceload.json";
$cssettings = "csgoload.json";
$songsettings = "music.json";


if(!file_exists($slsettings)){
	$slopen = fopen($slsettings, 'w') or die("Don't forget to change the directory's permissions! Refer to the README.txt");
	$slwrite = json_encode(array(
		"topTitle" => "Welcome back",
		"topTitleFont" => "32pt",
		"avatar_style" => "round",
		"leftTitle" => "Donor Info",
		"leftBox" => "#### **$5** Donor
- 1 Player Model
- 1000 Pointshop Points
- Extra Commands

#### **$10** V.I.P.
- 2 Player Model
- 50,000 Pointshop Points
- Unrestricted Access

#### **$25** God
- Multiple Player Models
- Unlimited Pointshop Points
- Absolute Power
	",
		"middleTitle" => "Server Title",
		"about" => "<span>Welcome to the server!</span><br>We hope that you have the <b>BEST</b> experience and come back to enjoy yourself once more!<br>The download shouldn't be too long unless we've spammed the server with addons, so sit back and enjoy the music!",
		"rightTitle" => "Rules",
		"rules" => "1. Do not RDM
1. Kill me
1. Seriously kill me
1. Haha tricked get banned
1. gg
1. very long rule here because yah cool weeeeeee",
		"textOne" => "Welcome to our server!",
		"textTwo" => "We hope that you enjoy yourself here!",
		"textThree" => "Please read our rules so you dont get banned!",
		"textFour" => "Dont forget to join our steam group for extra money!",
		"textFive" => "Our friendly staff will assist you in any way!",
		"textSix" => "Choose what you would like to put in here.",
		"textSeven" => "Webmaster, dont forget to log in and change these!",
		"textDelay" => "2000",
		"pattern" => "false",
		"patternChoice" => "pattern.png",
		"backgroundDelay" => "1800",
		"musicVolume" => "0.3",
		"solidBg" => "true",
		"solidBgColor" => "#477AB1",
		"videoBg" => "true",
		"slides" => "false",
		"slideDelay" => "2000"
	));
	fwrite($slopen, $slwrite);
	fclose($slopen);
}
if(!file_exists($cssettings)){
	$csopen = fopen($cssettings, 'w') or die("Failed to open csgoload.json");
	$cswrite = '{
	"icon": "default",
	"customicon": "assets/img/custom.png",
	"slide1": "Turning your view away from a Flashbang Grenade will lessen its blinding effects.",
	"slide2": "Whoops this isn\'t CSGO... THIS IS GARRY\'S MOD!",
	"slide3": "Visit ATomIK\'s website: www.atomik.info",
	"slide4": "Check out our forums located at: example.com/forums",
	"slide5": "Now I\'m just repeating the same crap again.",
	"slide6": "Total of 6 slides!",
	"hintDelay": 8000,
	"gametracker": "true",
	"csgomaps": "false",
	"csgomap": "dust2",
	"mainT": "custom",
	"mainTitle": "Dust II",
	"secoT": "custom",
	"secoTitle": "Deathmatch",
	"description": "All weapons are free and selectable for a time after spawning.<br><br>Win the match by having the highest score when the round time ends.<br><br>Settings:<br><ul><li>Instant random respawn</li><li>Friendly fire is OFF</li><li>Team collision is OFF</li><li>10 minute match length</li></ul>",
	"icon2": "dust2",
	"customicon2": "assets/img/dust2.png",
	"loadingbar": "true",
	"loadcolor": "#0FFF00",
	"slides": "false",
	"slideDelay": "2000",
	"solidBg": "false",
	"solidBgColor": "#477AB1",
	"videoBackground": "false",
	"singleBackground": "true",
	"singleBack": "dust2.png"
}';
	fwrite($csopen, $cswrite);
	fclose($csopen);
}
if(!file_exists($songsettings)){
	$sopen = fopen($songsettings, 'w') or die("Failed to open music.json");
	$swrite = '{
	"musicTog": "false",
	"musicVol": "0.0",
	"musicRan": "false",
	"musicNam": ""
}';
	fwrite($sopen, $swrite);
	fclose($sopen);
}
