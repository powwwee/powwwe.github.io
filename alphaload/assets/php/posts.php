<?php

/* Start initial setup form */
if(isset($_POST['steamid']) && isset($_POST['apikey'])){

	if(Is64($_POST['steamid'])){
		$steamid = $_POST['steamid'];
	} else {
		$steamid = ID32To64($_POST['steamid']);
	}

	if(!file_exists("settings.php")){
		$pSettings = fopen("settings.php", "w") or die("Failed to open settings.php!");
		$pSettingsFile = "<?php
	\$admin = \"".$steamid."\";
	\$steamauth['apikey'] = \"".$_POST['apikey']."\";
	\$steamauth['domainname'] = \"http://".$_SERVER['HTTP_HOST'].str_replace("/admin.php", "", $_SERVER['REQUEST_URI'])."\";
	\$steamauth['buttonstyle'] = \"large_no\";
	\$steamauth['logout'] = \"admin.php\";
	\$steamauth['loginpage'] = \"admin.php\";
?>";
		fwrite($pSettings, $pSettingsFile);
		fclose($pSettings);
		header('Location: admin.php');
		unlink('new');
	}


  if(!file_exists($settings)){
  	$pSetr = fopen($settings, "w") or die("Failed to open design.json!");
  	$pRubbish = '{
	"design": ""
}';
  	fwrite($pSetr, $pRubbish);
  	fclose($pSetr);
  }

}
/* End initial setup form */

/* Design form */
if(isset($_POST['submitdesign'])){
	$design = array('design' => $_POST['design']);
	$jsonDesign = json_encode($design);
	try {
		$designSelect = fopen("assets/php/design.json", 'w');
		fwrite($designSelect, $jsonDesign);
		fclose($designSelect);
	} catch (Exception $e) {
		die("Design submission failed. Make sure www-data has r permissions.");
	}
	header('Location: ./admin.php');
}
/* End design form */

/* Post settings */
if(isset($_POST['musicsettings'])){
	$musiconfig = array(
  	'musicTog' => $_POST['musicTog'],
  	'musicVol' => $_POST['musicVol'],
  	'musicRan' => $_POST['musicRan'],
  	'musicNam' => $_POST['musicNam']
  );

	$musicFile = str_replace('"', "\"", json_encode($musiconfig));

	try {
		$musicsetwrite = fopen("music.json", 'w');
		fwrite($musicsetwrite, $musicFile);
		fclose($musicsetwrite);

		header('Location: ./upload.php');
	} catch (Exception $e) {
		echo 'Caught exception: ', $e->getMessage(), "\n";
	}

}
if(isset($_POST['csgoload'])){
	if($_POST['solidBg'] == "false" && $_POST['videoBackground'] == "false" && $_POST['slides'] == "false" && $_POST['singleBackground'] == "false"){
		$_POST['singleBackground'] = "true";
		$allfalse = 1;
	}
	$csconfig = array(
	'icon' => $_POST['icon'],
	'customicon' => $_POST['customicon'],
	'slide1' => $_POST['slide1'],
	'slide2' => $_POST['slide2'],
	'slide3' => $_POST['slide3'],
	'slide4' => $_POST['slide4'],
	'slide5' => $_POST['slide5'],
	'slide6' => $_POST['slide6'],
	'hintDelay' => $_POST['hintDelay'],
	'gametracker' => (isset($_POST['gametracker'])?"true":"false"),
	'csgomaps' => (isset($_POST['csgomaps'])?"true":"false"),
	'csgomap' => $_POST['csgomap'],
	'mainT' => $_POST['mainT'],
	'mainTitle' => $_POST['mainTitle'],
	'secoT' => $_POST['secoT'],
	'secoTitle' => $_POST['secoTitle'],
	'description' => $_POST['description'],
	'icon2' => $_POST['icon2'],
	'customicon2' => $_POST['customicon2'],
	'loadingbar' => (isset($_POST['loadingbar'])?"true":"false"),
	'loadcolor' => $_POST['loadcolor'],
	'slides' => (isset($_POST['slides'])?"true":"false"),
	'slideDelay' => $_POST['slideDelay'],
	'solidBg' => (isset($_POST['solidBg'])?"true":"false"),
	'solidBgColor' => $_POST['solidBgColor'],
	'videoBackground' => (isset($_POST['videoBackground'])?"true":"false"),
	'singleBackground' => (isset($_POST['singleBackground'])?"true":"false"),
	'singleBack' => $_POST['singleBack']
);

	$jsonFileThree = str_replace('"', "\"", json_encode($csconfig));

	try {
		$cswrite = fopen("csgoload.json", 'w');
		fwrite($cswrite, $jsonFileThree);
		fclose($cswrite);
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	header('Location: ./admin.php');
}
if(isset($_POST['spaceload'])){
	$thirdConfig = array(
		'topTitle' => $_POST['topTitle'],
		'topTitleFont' => $_POST['topTitleFont'],
		'avatar_style' => (isset($_POST['avatar_style'])?"round":"square"),
		'leftTitle' => $_POST['leftTitle'],
		'leftBox' => htmlspecialchars($_POST['leftBox']),
		'middleTitle' => $_POST['middleTitle'],
		'about' => htmlspecialchars($_POST['about']),
		'rightTitle' => $_POST['rightTitle'],
		'rules' => htmlspecialchars($_POST['rules']),
		'textOne' => $_POST['textOne'],
		'textTwo' => $_POST['textTwo'],
		'textThree' => $_POST['textThree'],
		'textFour' => $_POST['textFour'],
		'textFive' => $_POST['textFive'],
		'textSix' => $_POST['textSix'],
		'textSeven' => $_POST['textSeven'],
	  'textDelay' => $_POST['textDelay'],
		'pattern' => (isset($_POST['pattern'])?"true":"false"),
		'patternChoice' => $_POST['patternChoice'],
	  'backgroundDelay' => $_POST['backgroundDelay'],
	  'solidBg' => (isset($_POST['solidBg'])?"true":"false"),
	  'solidBgColor' =>  $_POST['solidBgColor'],
		'videoBg' => (isset($_POST['videoBg'])?"true":"false"),
	  'slides' => (isset($_POST['slides'])?"true":"false")
	);

	$jsonFileTwo = str_replace('"', "\"", json_encode($thirdConfig));

	try
	{
		$thirdWrite = fopen("spaceload.json", 'w');
		fwrite($thirdWrite, $jsonFileTwo);
		fclose($thirdWrite);
	}
	catch(Exception $e)
	{
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	var_dump($_POST);
	header('Location: ./admin.php');
}
/* end post settings */
