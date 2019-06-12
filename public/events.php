<?php
  require_once '../includes/config.php';
  require_once '../includes/database.php';
  require_once '../includes/event.php';

  $eventResult = Event::findByDisplayStatus();
?>

<?php require_once '../includes/layouts/header.php' ?>


  <section class="intro-news-area section-padding-100-0 mb-70">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-12">
          <div class="intro-news-tab">
            <div class="intro-news-filter d-flex justify-content-between">
              <h6>Events</h6>
            </div>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                <div class="row">
                  <?php
                    for ($i=0; $i < 6; $i++) {
                      $formatedDate = new DateTime($eventResult[$i]->date);
                      $imageNumber = rand(1, 35);
                      echo '<div class="col-12 col-sm-6 col-lg-4">';
                      echo '<div class="single-blog-post style-2 mb-5">';
                      echo '<div class="blog-thumbnail">';
                      echo '    <a href="#"><img src="../public/assets/img/bg-img/'.$imageNumber.'.jpg" alt=""></a>';
                      echo '</div>';
                      echo '<div class="blog-content">';
                      echo '<span class="post-date">'. $formatedDate->format(('M d, Y')) .'</span>';
                      echo '<a href="#" class="post-title">'. $eventResult[$i]->title .'</a>';
                      echo '<a href="#" class="post-author">By Michael Smith</a>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php include_once '../includes/layouts/footer.php' ?>
