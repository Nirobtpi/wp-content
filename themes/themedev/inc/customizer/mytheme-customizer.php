<?php
$now=date('Y-m-d');
function mytheme_customize_register($wp_customize){
    // banner section 
    $wp_customize->add_section('banner_section', array(
        'title'=> __('Banner Section','mytheme'),
        'priority'=> 10,
    ));
    // add_partial controll 
    $wp_customize->selective_refresh->add_partial('banner_heading_selective',array(
        'selector'=>'.hero-banner__content h1',
        'section'=>'banner_section',
        'settings'=>array('banner_heading'),
        'render_callback'=>function(){
            return get_theme_mod('banner_heading');
        }
    ));
    // hero heading settings 
    $wp_customize->add_setting('banner_heading',array(
        'default'=>__('Amazing Places on earth','mytheme'),
        'transport'=> 'postMessage',
    ));
    // hero heading banner controll 
    $wp_customize->add_control('banner_heading_control', array(
        'label'=>__('Banner Heading','mytheme'),
        'type'=>'text',
        'settings'=>'banner_heading',
        'section'=>'banner_section',

    ));
    // end banner heading 

    // banner color changer 
    $wp_customize->add_setting('banner_color',array(
        'default'=>'red',
        'transport'=>'postMessage',
    ));
    $wp_customize->add_control('banner_color_control',array(
        'label'=>__('Banner Color','mytheme'),
        'type'=>'color',
        'settings'=>'banner_color',
        'section'=>'banner_section',
        
    ));
    // end change color 

    // banner sub title option 
    $wp_customize->add_setting('sub_title',array(
        'default'=>__('Tours & Travels','mytheme'),
        'transport'=>'postMessage',
    ));
    // add_partial controll 
    $wp_customize->selective_refresh->add_partial('sub_title_selective',array(
        'selector'=>__('.hero-banner__content h3','themedev'),
        'section'=>'banner_section',
        'settings'=>array('sub_title'),
        'render_callback'=>function(){
            return get_theme_mod('sub_title');
        }
    ));
    $wp_customize->add_control('sub_title',array(
        'label'=>__('Sub Title','mytheme'),
        'type'=> 'text',
        'section'=>'banner_section',
        'settings'=>'sub_title',
    ));
    // end sub title option 

    // banner date start option 
    $wp_customize->add_setting('banner_date',array(
        'default'=> date('Y-m-d'),
        'transport'=>'postMessage',

    ));
    // add_partial controll 
    $wp_customize->selective_refresh->add_partial('banner_date_selective',array(
        'selector'=>__('.hero-banner__content h4','themedev'),
        'section'=>'banner_section',
        'settings'=>array('banner_date'),
        'render_callback'=>function(){
            return get_theme_mod('banner_date');
        }
    ));
    $wp_customize->add_control('banner_date',array(
        'label'=>__('Banner Date','mytheme'),
        'type'=> 'date',
        'section'=>'banner_section',
        'settings'=>'banner_date',
    ));
    // end banner date option 

    // banner background chnage 

    $wp_customize->add_setting('banner_bg',array(
        'default'=>'',
        'transport'=>'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'banner_bg_control',
        array(
            'label'=>__('Banner Background','memytheme'),
            'section'=>'banner_section',
            'settings'=>'banner_bg',
            )
        )
    );
    
    // this is my test item 
    $wp_customize->add_section('about_section',array(
        'title'=>__('About Section','mytheme'),
        'priority'=>20,
    ));
    $wp_customize->selective_refresh->add_partial('about_section_selective',array(
        'selector'=>__('.hero-banner__content p','mytheme'),
        'section'=> 'about_section',
        'settings'=>array('about_section_setting'),
        'render_callback'=>function(){
        return get_theme_mod('about_section_setting');
    }
    ));
    $wp_customize->add_setting('about_section_setting',array(
        'default'=> 'Lorem ipsum dolor sit amet.',
        'transport'=> 'postMessage',
    ));
    $wp_customize->add_control('about_section_con',array(
        'label'=>__('About Section','mytheme'),
        'section'=>'about_section',
        'settings'=>'about_section_setting',
        'type'=>'textarea',
    ));

}

add_action('customize_register', 'mytheme_customize_register');


?>