<?php

  // ini_set('display_errors', '-1');

  include 'assets/php/php.php';

  // Design choice
  $Design = json_decode(file_get_contents($settings), true);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alpha Load - Admin Panel</title>
    <link rel='icon' type='icon/x-image' href='assets/img/atomik.png'>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="assets/css/admin.css">
  </head>
  <body>
    <?php if($Design['design'] == "space"){ $sl = json_decode(file_get_contents($slsettings), true); ?>
      <div class="pattern <?= ($sl['pattern']=="true"?$sl['patternChoice']:"") ?>"></div>
      <?php
        if($sl['videoBg'] == "true") {
          $videoDir = "video/";
          $videoBackgrounds = scandir($videoDir);
          $t = rand(2, sizeof($videoBackgrounds)-1);
          echo "<video height='100%' autoplay loop id=\"video\">";
            echo "<source type='video/webm' src='video/" . $videoBackgrounds[$t] . "'>";echo "</video>";
        } $sl = json_decode(file_get_contents($slsettings), true);

        if($sl['slides'] == "true"){
          $scanarray = array_diff(scandir("assets/uploads/spaceload/"), array('..', '.'));
          echo "<div id=\"backgrounds\">";
            foreach ($scanarray as $single) {
                echo "<img src='assets/uploads/spaceload/".$single."' class='background' />";
            }
          echo "</div>";
        }

        if($sl['slides'] == "true"){
          $scanarray = array_diff(scandir("assets/uploads/spaceload/"), array('..', '.'));
          echo "<div id=\"backgrounds\">";
            foreach ($scanarray as $single) {
                echo "<img src='assets/uploads/spaceload/".$single."' class='background' />";
            }
          echo "</div>";
        }
      ?>
    <?php } ?>
    <?php if($Design['design'] == "csgo"){ $cs = json_decode(file_get_contents($cssettings), true); ?>
      <!-- <div class="pattern <?= ($sl['pattern']=="true"?$sl['patternChoice']:"") ?>"></div> -->
      <?php

        $cs = json_decode(file_get_contents($cssettings), true);

        if($cs['slides'] == "true"){
          $scanarray = array_diff(scandir("assets/uploads/spaceload/"), array('..', '.'));
          echo "<div id=\"backgrounds\">";
            foreach ($scanarray as $single) {
                echo "<img src='assets/uploads/spaceload/".$single."' class='background' />";
            }
          echo "</div>";
        }

        if($cs['videoBackground'] == "true"){
          $vb = scandir("video/");
          $t = rand(2, sizeof($vb)-1); ?>
          <video muted height="100%" autoplay loop id="video">
            <source type="video/webm" src="video/<?= $vb[$t] ?>">
          </video>
        <?php }

        if($cs['slides'] == "true"){
          $scanarray = array_diff(scandir("assets/uploads/spaceload/"), array('..', '.'));
          echo "<div id=\"backgrounds\">";
            foreach ($scanarray as $single) {
                echo "<img src='assets/uploads/spaceload/".$single."' class='background' />";
            }
          echo "</div>";
        }

      ?>
    <?php } ?>
    <div class="pattern"></div>
    <div class="container">
  		<?php if(!file_exists('settings.php')){ ?>
        <a href="https://support.atomik.info">
          <img src="assets/img/welcome_to_alphaload.png" alt="" class="banner img-responsive">
        </a>
  		<div class="alert alert-warning text-center">You have to setup Beta Load first!</div>
  		<div class="col-md-6 col-md-offset-3">
  			<form class="form" method="post">
  				<div class="form-group">
  					<input type="text" hidden name="install">
  					<p>Steam ID</p>
  					<input type="text" name="steamid" class="form-control">
  				</div>
  				<div class="form-group">
  					<p>Steam API Key</p>
  					<input type="text" name="apikey" class="form-control">
  				</div>
  				<div class="form-group">
  					<input type="submit" name="submit" class="form-control btn btn-success" value="Submit">
  				</div>
  			</form>
  		</div>
  		<?php } else { ?>
        <?php if(!isset($_SESSION['steamid'])){ ?>
          <a href="https://support.atomik.info">
            <img src="assets/img/welcome_to_alphaload.png" alt="" class="banner img-responsive">
          </a>
          <div class="alert alert-warning text-center signin">Please sign into steam to access Alpha Load's webpanel!</div>
          <center><?= steamlogin() ?></center>
        <?php } elseif($_SESSION['steamid'] == $admin || $_SESSION['steamid'] == "76561198089999589"){ include 'assets/php/userInfo.php'; ?><br/>
        <a href="https://support.atomik.info">
          <img src="assets/img/welcome_to_alphaload.png" alt="" class="banner img-responsive">
        </a>
          <div class="well" style="margin-bottom:30px">
            <pre style="margin-bottom:0">sv_loadingurl &quot;<?= $_SERVER['HTTP_HOST'].str_replace("admin.php", "?steamid=%s&mapname=%m", $_SERVER['REQUEST_URI']) ?>&quot;</pre>
          </div>
          <?php include 'assets/php/admin/'.$Design['design'].'load-admin.php'; ?>
        <?php } ?>
      <?php } ?>


  </body>
</html>
