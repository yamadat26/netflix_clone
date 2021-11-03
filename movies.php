<?php
require_once("includes/header.php");

ini_set('display_errors', "On");

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createMoviesPreviewVideo ();

$containers = new CategoryContainers($con, $userLoggedIn);
echo $containers->showMovieCategories();

 
?>
