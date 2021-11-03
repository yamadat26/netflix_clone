<?php
class Season {

  private $seasonNumber, $videos;

  public function __construct($seasonNumber, $videos) {
    $this->seasonNumber = $seasonNumber;
    $this->videos = $videos;
  }
  public function getSeasonNumeber() {
    return $this->seasonNumber;
  }
  public function getVideoNumber() {
    return $this->videos;
  }
  public function getVideos() {
    return $this->videos;
}
}

?>