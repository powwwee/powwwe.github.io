<?php
ob_start();
session_start();
require ('assets/php/openid.php');

function logoutbutton() {
    echo "<form action=\"assets/php/logout.php\" method=\"post\"><input value=\"Logout\" type=\"submit\" /></form>"; //logout button
}

function steamlogin()
{
try {

    include 'settings.php';
    $openid = new LightOpenID($steamauth['domainname']);
    
    $button['small'] = "small";
    $button['large_no'] = "large_noborder";
    $button['large'] = "large_border";
    $button = $button[$steamauth['buttonstyle']];
    
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'http://steamcommunity.com/openid';
            header('Location: ' . $openid->authUrl());
        }
    echo "<form action=\"?login\" method=\"post\"> <input type=\"image\" style=\"margin-bottom:10px;\" src=\"https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_landing.png\"></form>";
}

     elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        if($openid->validate()) { 
                $id = $openid->identity;
                $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn, $id, $matches);
              
                session_start();
                $_SESSION['steamid'] = $matches[1]; 
                 if (isset($steamauth['loginpage'])) {
					header('Location: '.$steamauth['loginpage']);
                 }
        } else {
                echo "User is not logged in.\n";
        }

    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
}

?>
