<?php

class PreviewProvider {
  private $con, $username;
  public function __construct($con, $username) {
    $this->con = $con;
    $this->username = $username;
  }

  public function createCategoryPreviewVideo($categoryId) {
    $entitiesArray = EntityProvider::getEntity($this->con, $categoryId, 1);

    if(sizeof($entitiesArray) == 0) {
      ErrorMessage::show("No TV shows to display");
    }
    
    return $this->createPreviewVideo($entitiesArray[0]);
  }

  public function createTVshowPreviewVideo() {
    $entitiesArray = EntityProvider::getTVshowEntity($this->con, null, 1);

    if(sizeof($entitiesArray) == 0) {
      ErrorMessage::show("No TV shows to display");
    }
    
    return $this->createPreviewVideo($entitiesArray[0]);
  }

  public function createMoviesPreviewVideo() {
    $entitiesArray = EntityProvider::getMoviesEntity($this->con, null, 1);

    if(sizeof($entitiesArray) == 0) {
      ErrorMessage::show("No m ovies to display");
    }
    
    return $this->createPreviewVideo($entitiesArray[0]);
  }

  public function createPreviewVideo($entity) {
    
    if($entity == null) {
      $entity = $this->getRandomEntity();
    }
    $id = $entity->getId();
    $name = $entity->getName();
    $thumbnail = $entity->getThumbnail();
    $preview = $entity->getPreview();

    $videoId = VideoProvider::getEntityVideoForUser($this->con, $id, $this->username);
    $video = new Video($this->con, $videoId);

    $inProgress = $video->isInProgress($this->username);
    $playButtonText = $inProgress ? "Continue watching" : "Play";

    $seasonEpisode = $video->getSeasonAndEpisode();
    $subHeading = $video->isMovie() ? "" : "<h4>$seasonEpisode</h4>";
    
    return "<div class='previewContainer'>
              <img src='$thumbnail' alt='$name' class='previewImage' hidden />

              <video autoplay muted class='previewVideo' onended='previewEnded()' >
                <source src='$preview' type='video/mp4'>
              </video>
              <div class='previewOverlay'>
                <div class='mainDetails'>
                  <h3>$name</h3>
                  $subHeading
                  <div class=''buttons>
                    <button onclick='watchVideo($videoId)'><i class='fas fa-play'></i> $playButtonText</button>
                    <button onclick='volumeToggle(this)'><i class='fas fa-volume-mute'></i></button>
                  </div>
                </div>
              </div>
            </div>";
  }

  public function createEntityPreviewSquare($entity) {
    $id = $entity->getId();
    $name = $entity->getName();
    $thumbnail = $entity->getThumbnail();

    return "<a href='entity.php?id=$id'>
              <div class='previewContainer small'>
                <img src='$thumbnail' title='$name'>
              </div>
            <a/>";
  }

  private function getRandomEntity() {
    $entity = EntityProvider::getEntity($this->con, null, 1);
    return $entity[0];
    // $query = $this->con->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");
    // $query->execute();

    // $row = $query->fetch(PDO::FETCH_ASSOC);
    // return new Entity($this->con, $row);

  }
}

?>