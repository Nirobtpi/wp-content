<?php get_header(); ?>
<main class="site-main">
  <!--================Hero Banner start =================-->
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner" style="background:url('<?php echo esc_url(get_theme_mod('banner_bg')) ?>'); background-position: center;background-size: cover; background-repeat: no-repeat;">
        <div class="hero-banner__content">
          <h3><?php echo get_theme_mod('sub_title') ?></h3>
          <h1><?php echo get_theme_mod('banner_heading') ?></h1>
          <h4><?php 
          $time=get_theme_mod('banner_date');
          if($time){
            echo date('M d, Y',strtotime($time));
          }
           ?></h4>
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner end =================-->

  <?php get_template_part('template-part/content','fasion')  ?>

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin mt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
          <div class="single-recent-blog-post">
            <div class="thumb">
              <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="">
              <ul class="thumb-info">
                <li><i class="ti-user"></i><?php
                  $author_id=get_the_author_meta('ID');
                  $author_name=ucfirst(get_the_author());
                  $author_url=get_author_posts_url($author_id);
                  echo '<a href="'.esc_url($author_url).'">'.esc_html($author_name).'</a>';
                  ?></>
                </li>
                <li><a href="#"><i class="ti-notepad"></i> <?php echo get_the_date(); ?></a></li>
                <li><a href="#"><i class="ti-themify-favicon"></i><?php echo get_comments_number( $post->ID ) ?>
                    Comments</a></li>
              </ul>
            </div>
            <div class="details mt-20">
              <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
              </a>
              <p class="tag-list-inline">Tag: <?php $tags= get_the_tags();
                $total = count($tags);
                
                foreach($tags as $index=>$tag){
                 
                    echo '<a href="#">'.$tag->name.'</a>';
                  if ($index < $total - 1) {
                      echo ', ';
                  }
                }
                ?></p>
              <p><?php $content=get_the_content(); echo wp_trim_words($content, 20,'...'); ?></p>
              <a class="button" href="<?php the_permalink(); ?>">Read More <i class="ti-arrow-right"></i></a>
            </div>
          </div>

          <?php endwhile; wp_reset_postdata(); endif; ?>
          <!-- 
            <div class="row">
              <div class="col-lg-12">
                  <nav class="blog-pagination justify-content-center d-flex">
                      <ul class="pagination">
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Previous">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-left"></i>
                                  </span>
                              </a>
                          </li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Next">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-right"></i>
                                  </span>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
            </div> -->
        </div>

        <!-- Start Blog Post Siddebar -->
        <?php get_sidebar(); ?>
        <!-- End Blog Post Siddebar -->
      </div>
  </section>
  <!--================ End Blog Post Area =================-->
</main>
<?php get_footer();  ?>