<?php
  require_once '../includes/config.php';
  require_once '../includes/database.php';
  require_once '../includes/news.php';

  $newsResult = News::findAll();
?>

<?php require_once '../includes/layouts/header.php' ?>
  <!-- ##### Hero Area Start ##### -->


  <!-- ##### Intro News Area Start ##### -->
  <section class="intro-news-area section-padding-100-0 mb-70">
    <div class="container">
      <div class="row justify-content-center">
        <!-- Intro News Tabs Area -->
        <div class="col-12 col-lg-12">
          <div class="intro-news-tab">

            <!-- Intro News Filter -->
            <div class="intro-news-filter d-flex justify-content-between">
              <h6>News</h6>
            </div>

            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                <div class="row">
                  <?php
                    for ($i=0; $i < sizeof($newsResult); $i++) {

                      $date = new DateTime($newsResult[$i]->publish_date);
                      $imageNumber = rand(3, 8);
                      echo '<div class="col-12 col-sm-4">';
                      echo '<div class="single-blog-post style-2 mb-5">';
                      echo '<div class="blog-thumbnail">';
                      echo '<a href="#"><img src="../public/assets/img/bg-img/'. $imageNumber .'.jpg" alt=""></a>';
                      echo '</div>';
                      echo '<div class="blog-content">';
                      echo '<span class="post-date">'. $date->format(('M d, Y')) .'</span>';
                      echo '<a href="#" class="post-title">'. $newsResult[$i]->title .'</a>';
                      echo '<a href="#" class="post-body">'. substr($newsResult[$i]->story_content, 0, 100) .'</a>';
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
  <!-- ##### Intro News Area End ##### -->

<?php include_once '../includes/layouts/footer.php' ?>
