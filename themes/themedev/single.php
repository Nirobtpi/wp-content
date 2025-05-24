<?php get_header(); ?>
<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>Blog details</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--================ Hero sm Banner end =================-->

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="main_blog_details">
          <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="">
          <a href="#">
            <h4><?php the_title(); ?></h4>
          </a>
          <div class="user_details">
            <div class="float-left">
              <?php 
              the_author();
              $tags=get_the_tags();
              foreach($tags as $tag){
                echo '<a href="#">'.$tag->name.'</a>';
              }
              ?>
            </div>
            <div class="float-right mt-sm-0 mt-3">
              <div class="media">
                <div class="media-body">
                  <h5><?php echo ucfirst(get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()))); ?></h5>
                  <p><?php echo get_the_date('d M, Y h:i a'); ?></p>
                </div>
                <div class="d-flex">
                  <img width="42" height="42" src="<?php echo get_template_directory_uri() ?>/assets/img/blog/user-img.png" alt="">
                </div>
              </div>
            </div>
          </div>
          <?php the_content(); ?>
          <div class="news_d_footer flex-column flex-sm-row">
            <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>Lily and 4 people like this</a>
            <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i
                  class="ti-themify-favicon"></i></span><?php echo get_comments_number($post->ID) ?> Comments</a>
            <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-dribbble"></i></a>
              <a href="#"><i class="fab fa-behance"></i></a>
            </div>
          </div>
        </div>


        <div class="navigation-area">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
              <div class="thumb">
                <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
              </div>
              <div class="arrow">
                <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
              </div>
              <div class="detials">
                <p>Prev Post</p>
                <a href="#">
                  <h4>A Discount Toner</h4>
                </a>
              </div>
            </div>
            </div>
          </div>
       
        <div class="comments-area">
          <h4>05 Comments</h4>
          <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
              <div class="user justify-content-between d-flex">
                <div class="thumb">
                  <img src="img/blog/c1.jpg" alt="">
                </div>
                <div class="desc">
                  <h5><a href="#">Emilly Blunt</a></h5>
                  <p class="date">December 4, 2017 at 3:12 pm </p>
                  <p class="comment">
                    Never say goodbye till the end comes!
                  </p>
                </div>
              </div>
              <div class="reply-btn">
                <a href="" class="btn-reply text-uppercase">reply</a>
              </div>
            </div>
          </div>
          <div class="comment-list left-padding">
            <div class="single-comment justify-content-between d-flex">
              <div class="user justify-content-between d-flex">
                <div class="thumb">
                  <img src="img/blog/c2.jpg" alt="">
                </div>
                <div class="desc">
                  <h5><a href="#">Elsie Cunningham</a></h5>
                  <p class="date">December 4, 2017 at 3:12 pm </p>
                  <p class="comment">
                    Never say goodbye till the end comes!
                  </p>
                </div>
              </div>
              <div class="reply-btn">
                <a href="" class="btn-reply text-uppercase">reply</a>
              </div>
            </div>
          </div>
          <div class="comment-list left-padding">
            <div class="single-comment justify-content-between d-flex">
              <div class="user justify-content-between d-flex">
                <div class="thumb">
                  <img src="img/blog/c3.jpg" alt="">
                </div>
                <div class="desc">
                  <h5><a href="#">Annie Stephens</a></h5>
                  <p class="date">December 4, 2017 at 3:12 pm </p>
                  <p class="comment">
                    Never say goodbye till the end comes!
                  </p>
                </div>
              </div>
              <div class="reply-btn">
                <a href="" class="btn-reply text-uppercase">reply</a>
              </div>
            </div>
          </div>
          <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
              <div class="user justify-content-between d-flex">
                <div class="thumb">
                  <img src="img/blog/c4.jpg" alt="">
                </div>
                <div class="desc">
                  <h5><a href="#">Maria Luna</a></h5>
                  <p class="date">December 4, 2017 at 3:12 pm </p>
                  <p class="comment">
                    Never say goodbye till the end comes!
                  </p>
                </div>
              </div>
              <div class="reply-btn">
                <a href="" class="btn-reply text-uppercase">reply</a>
              </div>
            </div>
          </div>
          <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
              <div class="user justify-content-between d-flex">
                <div class="thumb">
                  <img src="img/blog/c5.jpg" alt="">
                </div>
                <div class="desc">
                  <h5><a href="#">Ina Hayes</a></h5>
                  <p class="date">December 4, 2017 at 3:12 pm </p>
                  <p class="comment">
                    Never say goodbye till the end comes!
                  </p>
                </div>
              </div>
              <div class="reply-btn">
                <a href="" class="btn-reply text-uppercase">reply</a>
              </div>
            </div>
          </div>
        </div>
        <div class="comment-form">
          <h4>Leave a Reply</h4>
          <form>
            <div class="form-group form-inline">
              <div class="form-group col-lg-6 col-md-6 name">
                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
              </div>
              <div class="form-group col-lg-6 col-md-6 email">
                <input type="email" class="form-control" id="email" placeholder="Enter email address"
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Subject'">
            </div>
            <div class="form-group">
              <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
            </div>
            <a href="#" class="button submit_btn">Post Comment</a>
          </form>
        </div>
      </div>

      <!-- Start Blog Post Siddebar -->
      <?php get_sidebar(); ?>
      <!-- End Blog Post Siddebar -->
    </div>
</section>
<?php get_footer(); ?>