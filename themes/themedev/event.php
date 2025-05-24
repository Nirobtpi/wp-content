<?php 
/*
Template Name: Event
*/
get_header();

?>
<main class="site-main">
    <!--================Hero Banner start =================-->
    <section class="mb-30px">
        <div class="container">
            <div class="hero-banner">
                <div class="hero-banner__content">
                    <h3>Tours & Travels</h3>
                    <h1>Amazing Places on earth</h1>
                    <h4>December 12, 2018</h4>
                </div>
            </div>
        </div>
    </section>
    <!--================Hero Banner end =================-->
    <div class="events  section-margin">
        <div class="container">
            <div class="row">
                <?php
                    $events=new WP_Query([
                        'post_type'=>'events',
                    ]);
                    if($events->have_posts()): while ($events->have_posts()): $events->the_post();
                ?>
                <div class="col-lg-6 col-md-6 col-sm-1 mb-3">
                    <div class="card text-start single-recent-blog-post">
                        <div class="thumb">
                            <img class="card-img-top" style="object-fit: cover;" width="100%" height="300px"
                                src="<?php the_post_thumbnail_url(); ?>" alt="Title" />
                            <ul class="thumb-info">
                                <li><i class="fas fa-map-marker-alt"></i><?php echo get_field('event_location') ?></li>
                                <li><i class="fas fa-calendar-week"></i><?php echo get_The_date() ?></li>
                                <?php
                                $terms=get_the_terms(get_the_ID(),'events_category');
                               foreach($terms as $term){
                                ?>
                                <li><i class="fas fa-tags"></i><a href="<?php echo esc_url(get_term_link($term->term_id)); ?>"><?php echo $term->name ?></a></li>
                                <?php
                               }
                                ?>
                            </ul>
                        </div>

                        <div class="card-body">

                            <h4 class="card-title"><?php the_title() ?></h4>
                            <p class="card-text"><?php the_excerpt() ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); endif ?>
            </div>
        </div>
    </div>

</main>


<?php get_footer(); ?>