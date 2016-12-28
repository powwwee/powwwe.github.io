<?php

include 'functions.php';

$settings = "assets/php/design.json";

// Write to json config files
include 'writes.php';

// All form posts
include 'posts.php';

// Upload page posts
include 'uploads.php';

// Installation settings
include 'settings.php';

// steam login
include 'steamauth.php';

$fast_fetch = curl_init();
$mapname = (isset($_GET['mapname'])?$_GET['mapname']:"ttt_minecraft_b5");
$steamid64 = (isset($_GET['steamid'])?$_GET['steamid']:$admin);
$xml = simplexml_load_string(file_get_contents("http://steamcommunity.com/profiles/".$steamid64."?xml=1"));
$username = $xml->steamID;
$avatar = $xml->avatarFull;
$communityid = ID64To32($steamid64);

$sel = "selected='selected'";
?>
