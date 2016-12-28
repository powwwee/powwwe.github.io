<?php
header("Location: ../../admin.php");
session_start();
unset($_SESSION['steamid']);
unset($_SESSION['steam_uptodate']);
?>