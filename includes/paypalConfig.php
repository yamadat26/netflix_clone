<?php
require_once("PayPal-PHP-SDK/autoload.php");

$apiContext = new \PayPal\Rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
      'AWZStjFVb71-4qzfbd7_eTUp8JqiVDmbOGqDClWy6TvCrRkZ8jhhlLx1L4BlL_iB9BI91SKsFY19y7EL',     // ClientID
      'ECAXIDBf0_bqYc0ymlht8t6LlvApUVhq3IqptUem0z1jqu38G_WmO341LwlmnZzHx70GURzjLfaby3Xi'      // ClientSecret
  )
);

?>