<?php
require_once("includes/header.php");

ini_set('display_errors', "On");

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createPreviewVideo(null);

$containers = new CategoryContainers($con, $userLoggedIn);
echo $containers->showAllCategories();

 
?>
