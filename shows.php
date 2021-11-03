<?php
require_once("includes/header.php");

ini_set('display_errors', "On");

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createTVshowPreviewVideo();

$containers = new CategoryContainers($con, $userLoggedIn);
echo $containers->showTVshowCategories();

 
?>
