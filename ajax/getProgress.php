<?php
require_once("../includes/config.php");
ini_set('display_errors', "On");

if(isset($_POST["videoId"]) && isset($_POST["username"])) {
  $query = $con->prepare("SELECT progress FROM videoProgress  
                        WHERE username=:username AND videoId=:videoId");
  $query->bindValue(":username", $_POST["username"]);
  $query->bindValue(":videoId", $_POST["videoId"]);


  $query->execute();
  echo $query->fetchColumn();

  
}
else {
  echo "No videoId or username passed into file";
}

?>