<?php
$now=date('Y-m-d');
function mytheme_customize_register($wp_customize){
    // banner section 
    $wp_customize->add_section('banner_section', array(
        'title'=> __('Banner Section','mytheme'),
        'priority'=> 10,
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

    // banner sub title option 
    $wp_customize->add_setting('sub_title',array(
        'default'=>__('Tours & Travels','mytheme'),
        'transport'=>'postMessage',
    ));
    $wp_customize->add_control('sub_title',array(
        'label'=>__('Sub Title','mytheme'),
        'type'=> 'text',
        'section'=>'banner_section',
        'settings'=>'sub_title',
    ));

    $wp_customize->add_setting('banner_date',array(
        'default'=> date('Y-m-d'),
        'transport'=>'postMessage',

    ));
    $wp_customize->add_control('banner_date',array(
        'label'=>__('Banner Date','mytheme'),
        'type'=> 'date',
        'section'=>'banner_section',
        'settings'=>'banner_date',
    ));

}

add_action('customize_register', 'mytheme_customize_register');


?>