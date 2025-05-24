<?php 
function themedev_setup() {

    add_theme_support( 'post-thumbnails' );
    add_theme_support('title-tag');
    load_theme_textdomain('themeDev');

    register_nav_menus( array(
        'primary_menu'=> __('Primary Menu','themeDev'),
        'secondary_menu'=> __('Secondary Menu','themeDev'),
    ));
   
}
add_action('after_setup_theme','themedev_setup');

function themedev_widget(){
    register_sidebar(array(
        'id' => 'category_widget',
        'name' => 'Category Widget',
        'description' => 'Set Your Category Widget',
        'before_widget' => '<ul class="cat-list mt-20">',
        'after_widget' => '</ul>',
        'before_title' => '<h4 class="single-sidebar-widget__title">',
        'after_title' => '</h4>',
    ));

    register_sidebar([
        'name'=>'Tags',
        'id'=>'tag-sidebar',
        'description'=>'Set Your Tags',
        'before_widget' => '<ul class="list">',
        'after_widget' => '</ul>',
        'before_title' => '<h4 class="single-sidebar-widget__title">',
        'after_title' => '</h4>',
    ]);


}
add_action('widgets_init','themedev_widget');

function my_theme_enqueue_styles() {
    // css 
    wp_register_style( 'bootstrap-style', get_template_directory_uri() . '/assets/vendors/bootstrap/bootstrap.min.css' );
    wp_register_style( 'fontawesome-style', get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css' );
    wp_register_style( 'themify-icon', get_template_directory_uri() . '/assets/vendors/themify-icons/themify-icons.css' );
    wp_register_style( 'liner-icon', get_template_directory_uri() . '/assets/vendors/linericon/style.css' );
    wp_register_style( 'liner-icon', get_template_directory_uri() . '/assets/vendors/linericon/style.css' );
    wp_register_style( 'owl-carousel', get_template_directory_uri() . '/assets/vendors/owl-carousel/owl.theme.default.min.css' );
    wp_register_style( 'owl-carousel-min', get_template_directory_uri() . '/assets/vendors/owl-carousel/owl.carousel.min.css' );
    wp_register_style( 'parent-style', get_template_directory_uri() . '/assets/css/style.css' );
    wp_register_style('style_css',get_stylesheet_uri());

    wp_enqueue_style('bootstrap-style');
    wp_enqueue_style('fontawesome-style');
    wp_enqueue_style('themify-icon');
    wp_enqueue_style('liner-icon');
    wp_enqueue_style('owl-carousel');
    wp_enqueue_style('owl-carousel-min');
    wp_enqueue_style('parent-style');
    wp_enqueue_style('style_css');

    // all js 

    wp_register_script('jquery-js', get_template_directory_uri() .'/assets/vendors/jquery/jquery-3.2.1.min.js') ;
    wp_register_script('bootstrap-js', get_template_directory_uri() .'/assets/vendors/bootstrap/bootstrap.bundle.min.js') ;
    wp_register_script('owl-js', get_template_directory_uri() .'/assets/vendors/owl-carousel/owl.carousel.min.js') ;
    wp_register_script('ajax-js', get_template_directory_uri() .'/assets/js/jquery.ajaxchimp.min.js') ;
    wp_register_script('mail-js', get_template_directory_uri() .'/assets/js/mail-script.js') ;
    wp_register_script('main-js', get_template_directory_uri() .'/assets/js/main.js') ;

    wp_enqueue_script('jquery-js');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('owl-js');
    wp_enqueue_script('ajax-js');
    wp_enqueue_script('mail-js');
    wp_enqueue_script('main-js');


}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );
add_filter('use_widgets_block_editor', '__return_false');
add_filter('wp_enqueue_scripts',function(){
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );

    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );

    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );

    // Remove classic-themes CSS for backwards compatibility for button blocks.
    wp_dequeue_style( 'classic-theme-styles' );
}, 20);

function custom_post_type(){
    register_post_type('events',array(
        'labels'=>[
            'name'=> __('Events','themedev'),
            'singular_name'=> __('Event','themedev'),
            'add_new'=>__('Add New Event','themedev'),
            'add_new_item'=>__('Add New Event','themedev'),
            'edit_item'=>'Edit Event',
            'new_item'=>'New Event',
            'featured_image'=>'Featured Image',
            'set_featured_image'=>'Set Featured Image',
            'all_items'=>'All Events',
            'not_found'=>'No Events Found',
            'not_found_in_trash'=>'No Events Found in Trash',

        ],
        'public'=>true,
        'menu_position'=>5,
        'hierarchical'=>true,
        'menu_icon'=>'dashicons-calendar-alt',
        'supports'=> array('title','editor','thumbnail','excerpt','author'),
    ));

    register_taxonomy('events_category','events',array(
        'labels'=>[
            'name'=> 'Event Categories',
            'add_new'=>'Add New Event Category',
            'add_new_item'=>'Add New Event Category',
            'edit_item'=>'Edit Event Category',
            'new_item_name'=>'New Event Category',
            'parent_item'=> 'Parent Category',
            'search_items'=>'Search Event Categories',
            'all_items'=>'All Event Categories',
            'view_item'=>'View Event Category',
            'update_item'=>'Update Event Category',

        ],
        'public'=>true,
        'hierarchical'=>true,
    ));
}
add_action('init','custom_post_type',10,2);


// add custom coloumn in events post
function events_columns($columns){
    $columns['event_location'] = 'Event Location';
    $columns['events_category']='Event Category';
    return $columns;
}

add_filter('manage_events_posts_columns','events_columns');

// add columns value 
function events_columns_content($column_name,$post_id){
   switch($column_name){
    case 'event_location':
        echo get_post_meta($post_id,'event_location',true);
        break;
    case 'events_category':
        $terms= get_the_term_list($post_id,'events_category','','');
        echo $terms ? $terms : '—';
        break;
   }
}
add_action('manage_events_posts_custom_column','events_columns_content',10,2);

// Add 'event_location' to the sortable columns.
function events_sortable_columns($columns) {
 
    $columns['event_location'] = 'event_location';
    $columns['events_category'] = 'events_category';
    return $columns;
}

add_filter('manage_edit-events_sortable_columns', 'events_sortable_columns');

function nav_walker(){
    require_once get_template_directory().'/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme','nav_walker');

include_once get_template_directory().'/inc/tag-widget.php';
?>