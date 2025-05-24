<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <div class="form-group mt-30">
                <div class="col-autos">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                </div>
            </div>
            <button class="bbtns d-block mt-20 w-100">Subcribe</button>
        </div>

        <?php if(is_active_sidebar('category_widget')) : ?>
            <div class="single-sidebar-widget post-category-widget">
             <?php dynamic_sidebar('category_widget')  ?>
           </div>
        <?php endif; ?>
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Popular Post</h4>
            <div class="popular-post-list">
                <?php
                
                $resent_post=new WP_Query([
                    'post_type'=>'post',
                    'posts_per_page'=>3,
                ]);
                if($resent_post->have_posts()): while($resent_post->have_posts()): $resent_post->the_post();
                ?>
                <div class="single-post-list">
                    <div class="thumb">
                        <?php $image_url=get_the_post_thumbnail(); ?>
                        <img class="card-img rounded-0" src="<?php echo $image_url; ?>" alt="">
                        <ul class="thumb-info">
                            <li><a href="#"><?php echo ucfirst(get_the_author()) ?></a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="<?php the_permalink();?>">
                            <h6><?php the_title() ?></h6>
                        </a>
                    </div>
                </div>
                <?php endwhile;wp_reset_postdata(); endif; ?>
            </div>
        </div>
        <?php if(is_active_sidebar('tag-sidebar')): ?>
            <div class="single-sidebar-widget tag_cloud_widget">
                <?php dynamic_sidebar('tag-sidebar') ?>
            </div>
        <?php endif;  ?>  
    </div>
</div>
</div>