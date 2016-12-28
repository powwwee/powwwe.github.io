<?php

	include 'assets/php/php.php';

	$Music = json_decode(file_get_contents("music.json"), true);

	$Design = json_decode(file_get_contents("assets/php/design.json"), true);

	$SpaceLoad = json_decode(file_get_contents($slsettings), true);

	if(file_exists("csgoload.json")){
		$csgo = json_decode(file_get_contents("csgoload.json"), true);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Alpha Load - Uploads Page</title>
	<link rel='icon' type='icon/x-image' href='assets/img/atomik.png'>

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/admin.css">
</head>
<body>
	<?php
		if($Design['design'] == "space" && $SpaceLoad['solidBg'] == "true"){ ?>
			<style type="text/css">
				body {
					background-color: <?php echo $SpaceLoad['solidBgColor']; ?>;
				}
			</style>
		<?php } if($Design['design'] == "space" && $SpaceLoad['videoBg'] == "true") {
			$videoDir = "video/";
    		$videoBackgrounds = scandir($videoDir);
    		$t = rand(2, sizeof($videoBackgrounds)-1);
    		echo "<video height='100%' autoplay loop id=\"video\">";
    		echo "<source type='video/webm' src='video/" . $videoBackgrounds[$t] . "'>";echo "</video>";
		} if($Design['design'] == "space" && $SpaceLoad['slides'] == "true"){
			$direct = "assets/uploads/spaceload/";
    		$scanarray = array_diff(scandir($direct), array('..', '.'));
    		echo "<div id=\"backgrounds\">";
    		    foreach ($scanarray as $single) {
    		        echo "<img src='assets/uploads/spaceload/".$single."' class='background' />";
    		    }
    		echo "</div>";
		}

		if($Design['design'] == "csgo"){
	?>
	<div id="backgrounds">
		<?php if($csgo['videoBackground'] == "true") {
	    		$videoDir = "video/";
	    		$videoBackgrounds = scandir($videoDir);
	    		$t = rand(2, sizeof($videoBackgrounds)-1);
	    		echo "<video muted height='100%' autoplay loop id=\"video\">";
	    		  echo "<source type='video/webm' src='video/" . $videoBackgrounds[$t] . "'>";echo "</video>";
	    	} else { ?>
	    		<img class="background" src="assets/uploads/csgoload/<?= $csgo['singleBack']; ?>">
	    	<?php } ?>
	</div>
	<?php } ?>
<div class="container">
	<div class="row">
		<?php if(!isset($_SESSION['steamid'])) header('Location: ./admin.php'); ?>
		<div class="tabbable-panel">
			<div class="tabbable-line">
				<ul class="nav nav-tabs ">
					<li <?php if($Design['design'] == "space"){ echo "class='active'"; } ?>>
						<a href="#tab2" data-toggle="tab">
						SpaceLoad </a>
					</li>
					<li <?php if($Design['design'] == "csgo"){ echo "class='active'"; } ?>>
						<a href="#tab4" data-toggle="tab">CSGOLoad </a>
					</li>
					<li class="pull-right">
						<a href="./admin.php">Back</a>
					</li>
					<?php if($Design['design'] == "laser"){ ?>
					<li><a href="#tab5" data-toggle="tab">Funny Gifs</a></li>
					<?php } ?>
				</ul>
				<div class="tab-content">
					<div class="tab-pane <?php if($Design['design'] == "space"){ echo "active"; } ?>" id="tab2">
						<?php if(isset($_POST['SLUpload']) or isset($_POST['CSUpload'])){ if($uploadOk == 0){ ?>
						<div class="alert alert-danger text-center">Your file was not uploaded: <!-- There is a space here #OCD -->
							<?php if(file_exists($target_file)){ ?>
							This file already exists.
							<?php } else { ?>
								<?php echo $error; ?>
							<?php } ?>
						</div>
						<?php } else { ?>
							<div class="alert alert-success text-center"><?php echo $filename; ?> was uploaded!</div>
						<?php } } ?>
						<?php if(isset($_POST['spacedelete']) && $deleted == 1){ ?>
							<div class="alert alert-success text-center"><?php echo $deletedfile; ?> was successfully deleted!</div>
						<?php } elseif($deleted = 0){ ?>
							<div class="alert alert-danger text-center">Uh-oh! Something happened and <?php echo $_POST['spacefile']; ?> was not deleted.</div>
						<?php } ?>
						<div class="well">
							<form class="form" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label">Upload background</label>
									<input name="fileToUpload" id="fileToUpload" type="file">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-success" value="Upload" name="SLUpload">
								</div>
							</form>
						</div>
						<?php
							$space = 'assets/uploads/spaceload/';
							$dir_handle = @opendir($space) or die("Unable to open $space");
							while ($file = readdir($dir_handle)) {

								if($file == "." || $file == ".." || $file == "index.php" || $file == ".htaccess" || $file == ".htpasswd" )

								continue;
								echo "
									<a class='file' href=\"assets/uploads/spaceload/$file\">$file </a>
									<form method='post' style='float:right;'><input type='text' hidden value='$file' name='spacefile'><input type='submit' class='btn btn-xs btn-danger' name='spacedelete' value='Delete'></form><br><br>
								";
							}
							closedir($dir_handle);
						?>
					</div>
					<div class="tab-pane <?php if($Design['design'] == "csgo"){ echo "active"; } ?>" id="tab4">
						<?php if(isset($_POST['SLUpload']) or isset($_POST['CSUpload']) or isset($_POST['LLUpload'])){ if($uploadOk == 0){ ?>
						<div class="alert alert-danger text-center">Your file was not uploaded: <!-- There is a space here #OCD -->
							<?php echo $error; ?>
						</div>
						<?php } else { ?>
							<div class="alert alert-success text-center"><?php echo $filename; ?> was uploaded!</div>
						<?php } } ?>
						<?php if(isset($_POST['csgodelete']) && $deleted == 1){ ?>
							<div class="alert alert-success text-center"><?php echo $deletedfile; ?> was successfully deleted!</div>
						<?php } elseif($deleted = 0){ ?>
							<div class="alert alert-danger text-center">Uh-oh! Something happened and <?php echo $_POST['csgofile']; ?> was not deleted.</div>
						<?php } ?>
						<div class="well">
							<form class="form" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label">Upload background</label>
									<input name="fileToUpload" id="fileToUpload" type="file">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-success" value="Upload" name="CSUpload">
								</div>
							</form>
						</div>
						<?php
							$csgo = 'assets/uploads/csgoload/';
							$dir_handle = @opendir($csgo) or die("Unable to open $csgo");
							while ($file = readdir($dir_handle)) {

								if($file == "." || $file == ".." || $file == "index.php" || $file == ".htaccess" || $file == ".htpasswd" )

								continue;
								echo "
									<a class='file' href=\"assets/uploads/csgoload/$file\">$file </a>
									<form method='post' style='float:right;'><input type='text' hidden value='$file' name='csgofile'><input type='submit' class='btn btn-xs btn-danger' name='csgodelete' value='Delete'></form><br><br>
								";
							}
							closedir($dir_handle);
						?>
					</div>
					<div class="tab-pane" id="tab5">
						<form class="form" method="post">
							<div class="form-group">
								<p>Gif link</p>
								<input type="text" class="form-control" name="giflink" placeholder="GIF Link">
								<br/>
								<input type="submit" class="form-control btn btn-success" name="newgif" value="Submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="tabbable-panel">
			<div class="tabbable-line">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab0" data-toggle="tab">
						Music Settings </a>
					</li>
					<li>
						<a href="#tab10" data-toggle="tab">
						Music Uploads </a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab0">
						<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<form class="form" method="post">
								<div class="form-group">
									Enable music?
									<select name="musicTog" class="form-control">
										<option <?php if($Music['musicTog'] == "true"){ echo $sel; } ?> value="true">Yes</option>
										<option <?php if($Music['musicTog'] == "false"){ echo $sel; } ?> value="false">No</option>
									</select>
								</div>
								<div class="form-group">
									Music volume
									<select name="musicVol" class="form-control">
										<option <?php if($Music['musicVol'] == "0.0"){ echo $sel; } ?> value="0.0">0.0</option>
										<option <?php if($Music['musicVol'] == "0.1"){ echo $sel; } ?> value="0.1">0.1</option>
										<option <?php if($Music['musicVol'] == "0.2"){ echo $sel; } ?> value="0.2">0.2</option>
										<option <?php if($Music['musicVol'] == "0.3"){ echo $sel; } ?> value="0.3">0.3</option>
										<option <?php if($Music['musicVol'] == "0.4"){ echo $sel; } ?> value="0.4">0.4</option>
										<option <?php if($Music['musicVol'] == "0.5"){ echo $sel; } ?> value="0.5">0.5</option>
										<option <?php if($Music['musicVol'] == "0.6"){ echo $sel; } ?> value="0.6">0.6</option>
										<option <?php if($Music['musicVol'] == "0.7"){ echo $sel; } ?> value="0.7">0.7</option>
										<option <?php if($Music['musicVol'] == "0.8"){ echo $sel; } ?> value="0.8">0.8</option>
										<option <?php if($Music['musicVol'] == "0.9"){ echo $sel; } ?> value="0.9">0.9</option>
										<option <?php if($Music['musicVol'] == "1.0"){ echo $sel; } ?> value="1.0">1.0</option>
									</select>
								</div>
								<div class="form-group">
									Randomize?
									<select name="musicRan" class="form-control">
										<option <?php if($Music['musicRan'] == "true"){ echo $sel; } ?> value="true">Yes</option>
										<option <?php if($Music['musicRan'] == "false"){ echo $sel; } ?> value="false">No</option>
									</select>
								</div>
								<div class="form-group">
									Single song name (if randomize is "No")
									<input type="text" name="musicNam" class="form-control" placeholder="Ex: dustsong.ogg" value="<?php echo $Music['musicNam']; ?>">
								</div>
								<div class="form-group">
									<input type="submit" class="form-control btn btn-success" name="musicsettings" value="Submit Music Settings!">
								</div>
							</form>
						</div>
						</div>
					</div>
					<div class="tab-pane" id="tab10">
						<div class="well">
							<form class="form" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label">Upload song (.ogg file)</label>
									<input name="songToUpload" id="songToUpload" type="file">
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-success" value="Upload" name="SUpload">
								</div>
							</form>
						</div>
						<?php
							$songs = 'assets/uploads/songs/';
							$son_handle = @opendir($songs) or die("Unable to open $songs");
							while ($file = readdir($son_handle)) {

								if($file == "." || $file == ".." || $file == "index.php" || $file == ".htaccess" || $file == ".htpasswd" )

								continue;
								echo "
									<a class='file' href=\"assets/uploads/songs/$file\">$file </a>
									<form method='post' style='float:right;'><input type='text' hidden value='$file' name='songfile'><input type='submit' class='btn btn-xs btn-danger' name='songdelete' value='Delete'></form><br><br>
								";
							}
							closedir($son_handle);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<?php
		if($Design['design'] == "laser" && $LaserLoad['slides'] == "true"){
    		echo "<script type='text/javascript' src='assets/js/cycle.js'></script>
    		      <script type='text/javascript'>
    		        $('#backgrounds').cycle({
    		            fx: 'fade',
    		            speed: 1000,
    		            timeout: ".$LaserLoad['slideDelay']."
    		        });
    		      </script>";
		}
	?>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/js.js"></script>
	<?php if(isset($_SESSION['steamid']) and $_SESSION['steamid'] !== $admin){ ?>
	<script type="text/javascript">
	$( document ).ready(function() {
		setTimeout(function(){
			window.location.replace("assets/php/logout.php");
		}, 3000);
	});
	</script>
	<?php } ?>
</html>
