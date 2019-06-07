<?php
  require_once '../includes/config.php';
  require_once '../includes/functions.php';
  require_once '../includes/database.php';
  require_once '../includes/session.php';
  require_once '../includes/news.php';
  require_once '../includes/event.php';

  $newsResult = News::findAll();
  $eventResult = Event::findByDisplayStatus();
?>

<?php require_once '../includes/layouts/header.php' ?>
  <!-- ##### Hero Area Start ##### -->
  <div class="hero-area">
    <!-- Hero Post Slides -->
    <div class="hero-post-slides owl-carousel">

        <!-- Single Slide -->
        <div class="single-slide">
            <div class="container-fluid">
                <div class="row">
                    <!-- Single Blog Post Area -->
                    <div class="col-12 col-md-6">
                        <div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="100ms" data-duration="1000ms">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail bg-overlay">
                                <a href="#"><img src="../public/assets/img/bg-img/1.jpg" alt=""></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date">June 20, 2019</span>
                                <a href="#" class="post-title">Traffic Problems in Time Square</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <!-- Single Blog Post Area -->
                        <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail bg-overlay">
                                <a href="#"><img src="../public/assets/img/bg-img/2.jpg" alt=""></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date">June 20, 2019</span>
                                <a href="#" class="post-title">The best way to spend your holiday</a>
                            </div>
                        </div>
                        <!-- Single Blog Post Area -->
                        <div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="500ms" data-duration="1000ms">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail bg-overlay">
                                <a href="#"><img src="../public/assets/img/bg-img/3.jpg" alt=""></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date">June 20, 2019</span>
                                <a href="#" class="post-title">Sport results for the weekend games</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Slide -->
        <div class="single-slide">
            <div class="container-fluid">
                <div class="row">
                    <!-- Single Blog Post Area -->
                    <div class="col-12 col-md-6">
                        <div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="100ms" data-duration="1000ms">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail bg-overlay">
                                <a href="#"><img src="../public/assets/img/bg-img/1.jpg" alt=""></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date">June 20, 2019</span>
                                <a href="#" class="post-title">Traffic Problems in Time Square</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <!-- Single Blog Post Area -->
                        <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail bg-overlay">
                                <a href="#"><img src="../public/assets/img/bg-img/2.jpg" alt=""></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date">June 20, 2019</span>
                                <a href="#" class="post-title">The best way to spend your holliday</a>
                            </div>
                        </div>
                        <!-- Single Blog Post Area -->
                        <div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="500ms" data-duration="1000ms">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail bg-overlay">
                                <a href="#"><img src="../public/assets/img/bg-img/3.jpg" alt=""></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date">June 20, 2019</span>
                                <a href="#" class="post-title">Sport results for the weekend games</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>
  <!-- ##### Hero Area End ##### -->

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
                    for ($i=0; $i < 3; $i++) {
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
                  <div class="col-12">
                    <div class="load-more-button text-center">
                      <a href="news.php" class="btn newsbox-btn">View More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Intro News Area End ##### -->

  <!-- ##### Video Area Start ##### -->
  <section class="video-area bg-img bg-overlay bg-fixed" style="background-image: url(../public/assets/img/bg-img/10.jpg);">
    <div class="container">
      <div class="row">
        <!-- Featured Video Area -->
        <div class="col-12">
          <div class="featured-video-area d-flex align-items-center justify-content-center">
            <div class="video-content text-center">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Video Area End ##### -->

  <!-- ##### Top News Area Start ##### -->
  <div class="top-news-area section-padding-100">
    <div class="container">
      <div class="row">
        <?php
          for ($i=0; $i < 6; $i++) {
            $formatedDate = new DateTime($eventResult[$i]->date);
            $imageNumber = rand(1, 35);
            echo '<div class="col-12 col-sm-6 col-lg-4">';
            echo '<div class="single-blog-post style-2 mb-5">';
            // Blog Thumbnail
            echo '<div class="blog-thumbnail">';
            echo '    <a href="#"><img src="../public/assets/img/bg-img/'.$imageNumber.'.jpg" alt=""></a>';
            echo '</div>';

            // Blog Content
            echo '<div class="blog-content">';
            echo '<span class="post-date">'. $formatedDate->format(('M d, Y')) .'</span>';
            echo '<a href="#" class="post-title">'. $eventResult[$i]->title .'</a>';
            echo '<a href="#" class="post-author">By Michael Smith</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        ?>

        <div class="col-12">
          <div class="load-more-button text-center">
            <a href="events.php" class="btn newsbox-btn">View More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Top News Area End ##### -->

<?php include_once '../includes/layouts/footer.php' ?>
