<?php
class Tag_widget extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            "description"=> __("Set Your Tags","themeDev"),
            "show_instance_title"=> true,
            );
        parent::__construct("tag_widget",__("Tag Widget","themeDev"),$widget_ops);
    }
    public function widget( $args, $instance ) {
      echo $args['before_widget'];
      $title=!empty($instance['title']) ? $instance['title'] : __('','themedev');
        if(!empty($instance['title'])){
            echo $args['before_title']. apply_filters('widget_title',$title). $args['after_title'];
        }
      echo '<ul class="list">';

        ?>
            <?php 
              $tags=get_tags([
                'hide_empty' => false,
              ]);
              if(!empty($tags)){
                foreach($tags as $tas){
                   echo '<li><a href="'.esc_url(get_tag_link($tas->term_id)).'">'.$tas->name.'</a></li>';
                }
              }
            ?>
        <?php
      echo '</ul>';
      echo $args['after_widget'];

    }
    public function form($instance){
        $title=!empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : __('','themedev');
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Add Title','themedev') ?></label>
                <input
                class="widefat"
                id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
            </p>

        <?php
    }
    public function update($new_instance, $old_instance){
        $instance=$old_instance;
        $instance['title']=$new_instance['title'];
        return $instance;
    }
}
function tag_widget_register(){
    register_widget('Tag_widget');
}
add_action('widgets_init','tag_widget_register');
?>