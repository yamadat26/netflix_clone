<?php
ob_start(); // Turn on output buffering
session_start();

date_default_timezone_set("Asia/Tokyo");

try {
  $con = new PDO("mysql:dbname=reeceflix;host=localhost:8889", "root", "root");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
   exit("Connection failed: " . $e->getMessage()); 
}
?>