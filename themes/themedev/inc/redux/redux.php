<?php 
    if(! class_exists('Redux')){
        exit;
    }

    $option_name='redux_option';
    $theme=wp_get_theme();

    $args=[
        'display_name'=>$theme->get('Name'),
        'display_version'=>$theme->get('Version'),
        'menu_title'=>esc_html__('Theme Options','themedev'),
        'customizer'=>false,
        'menu_position'=>60,
    ];

    Redux::set_args($option_name,$args);

    Redux::set_section( 
        $option_name, 
         array(
            'title'  => esc_html__( 'Basic Field', 'your-textdomain-here' ),
            'id'     => 'basic',
            'desc'   => esc_html__( 'Basic field with no subsections.', 'your-textdomain-here' ),
            'icon'   => 'el el-home',
            'fields' => array(
            array(
                'id'       => 'opt-text',
                'type'     => 'text',
                'title'    => esc_html__( 'Example Text', 'your-textdomain-here' ),
                'desc'     => esc_html__( 'Example description.', 'your-textdomain-here' ),
                'subtitle' => esc_html__( 'Example subtitle.', 'your-textdomain-here' ),
                'hint'     => array(
                    'content' => 'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
                )
                ),
                array(
                    'id'=>'text-area',
                    'type'=>'textarea',
                    'title'=>esc_html__('Text Area','themedev'),
                    'desc'=>esc_html__('Example description','themedev'),
                    
                ),
         )
     ) 
    );
?>