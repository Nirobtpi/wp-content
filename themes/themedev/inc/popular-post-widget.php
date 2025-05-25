<?php

class Popular_post_widget extends WP_Widget{
    public function __construct(){
        parent::__construct(
            'my_popular_post_widget',
            'Popular Post Widget',
            array('description' => 'Displays your most popular posts.')
        );
    }

    public function widget( $args, $instance ) {
            echo $args['before_widget'];
            $title=!empty($instance['title']) ? $instance['title'] : __('','themedav');
            $post_count=!empty($instance['post_count']) ? $instance['post_count'] : 3;

            if(!empty($title)){
                echo $args['before_title']. apply_filters('widget_title',$title) .$args['after_title'];
            }
            echo ' <div class="popular-post-list">';
            ?>
            <?php
                $resent_post=new WP_Query([
                    'post_type'=>'post',
                    'posts_per_page'=>$post_count,
                ]);
                if($resent_post->have_posts()): while($resent_post->have_posts()): $resent_post->the_post();
            ?>
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                        <ul class="thumb-info">
                            <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo ucfirst(get_the_author()) ?></a>
                            </li>
                            <li><?php echo get_the_date() ?></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="<?php the_permalink();?>">
                            <h6><?php the_title() ?></h6>
                        </a>
                    </div>
                </div>
                <?php endwhile;wp_reset_postdata(); endif; ?>

        <?php
        echo '</div>';

        echo $args['after_widget'];
    }

    public function form($instance){
       $title=!empty($instance['title']) ? apply_filters('widget_title',$instance['title']): __('','themedev');
       $post_count=!empty($instance['post_count']) ? $instance['post_count'] : 3;

       ?>
<p>
    <label for="<?php echo $this->get_field_id('title') ?>">Title</label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>"
        name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($title) ?>">

</p>
<p>
    <label for="<?php echo $this->get_field_id('post_count') ?>">Limite Post</label>
    <input type="number" class="tyned-text" id="<?php echo $this->get_field_id('post_count') ?>"
        name="<?php echo $this->get_field_name('post_count') ?>" value="<?php echo esc_attr($post_count) ?>">
</p>
<?php
    }

    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['post_count'] = sanitize_text_field($new_instance['post_count']);
        return $instance;
    }

  
}
function register_popular_post_widget(){
    register_widget('Popular_post_widget');
}
add_action('widgets_init', 'register_popular_post_widget');


?>