<?php $rawDesign = file_get_contents("assets/php/design.json"); $Design = json_decode($rawDesign, true); $design = $Design['design']; $rawMusic = file_get_contents("music.json"); $Music = json_decode($rawMusic, true); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Alpha Load</title>
	<link rel='icon' type='icon/x-image' href='assets/img/atomik.png'>
	<?php if(!file_exists('settings.php')){ header('Location: ./admin.php'); } include 'assets/php/php.php'; ?>
</head>
<body>
	<?php if($design == "laser"){ include 'assets/php/LaserLoad.php'; } elseif($design == "space"){ include 'assets/php/SpaceLoad.php'; } else { include 'assets/php/CSGOLoad.php'; }

  if($Music['musicTog'] == "true"){ ?>

  <script type="text/javascript">$(document).ready(function(){$('.audio').prop("volume",<?php echo $Music['musicVol']; ?>);});</script>
  <?php
  if($Music['musicRan'] == "true"){
    $dir = "assets/uploads/songs/";
    $song = scandir($dir);
    $i = rand(2, sizeof($song)-1);

    echo "<audio class='audio' autoplay autobuffer='autobuffer'>";
      echo "<source type='audio/ogg' src='assets/uploads/songs/" . $song[$i] . "'>";
    echo "</audio>";
  } else {
    echo "<audio class='audio' autoplay autobuffer='autobuffer'>";
      echo "<source type='audio/ogg' src='assets/uploads/songs/" . $Music['musicNam'] . "'>";
    echo "</audio>";
  }

 } ?>
</body>
<script type="text/javascript" src="assets/js/downloads.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</html>
