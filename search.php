<?php

include_once("includes/header.php");



?>
<div class="textboxContainer">
  <input type="text" class="searchInput" placeholder="Search for videos" >
</div>
<div class="result"></div>

<script>

$(function(){

  var username = '<?php echo $userLoggedIn; ?>';
  var timer;

  $(".searchInput").keyup(function(){
    clearTimeout(timer);
    timer = setTimeout(function(){
      var val = $(".searchInput").val();
      if(val != "") {
        $.post("ajax/getSearchResult.php", { term: val, username: username }, function(data) {
          $(".result").html(data);
        });
      } else { 
        $(".result").html(""); 
      }
    }, 500);
  })
})

</script>