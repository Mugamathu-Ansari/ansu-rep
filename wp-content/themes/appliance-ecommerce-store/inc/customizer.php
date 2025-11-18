<?php
/**
 * Appliance Ecommerce Store: Customizer
 *
 * @package Appliance Ecommerce Store
 * @subpackage appliance_ecommerce_store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function appliance_ecommerce_store_customize_register( $wp_customize ) {

	// Pro Version
    class appliance_ecommerce_store_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>Unlock Premium <strong>'. esc_html( $this->label ) .'</strong>? </span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( APPLIANCE_ECOMMERCE_STORE_BUY_TEXT,'appliance-ecommerce-store' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function appliance_ecommerce_store_sanitize_custom_control( $input ) {
        return $input;
    }

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');
	
	// Register the custom control type.
	$wp_customize->register_control_type( 'Appliance_Ecommerce_Store_Toggle_Control' );
	
	//Register the sortable control type.
	$wp_customize->register_control_type( 'Appliance_Ecommerce_Store_Control_Sortable' );

	//add home page setting pannel
	$wp_customize->add_panel( 'appliance_ecommerce_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'appliance-ecommerce-store' ),
	    'description' => __( 'Description of what this panel does.', 'appliance-ecommerce-store' ),
	) );
	
	//TP GENRAL OPTION
	$wp_customize->add_section('appliance_ecommerce_store_tp_general_settings',array(
        'title' => __('TP General Option', 'appliance-ecommerce-store'),
        'priority' => 1,
        'panel' => 'appliance_ecommerce_store_panel_id'
    ) );

    $wp_customize->add_setting('appliance_ecommerce_store_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
    $wp_customize->add_control('appliance_ecommerce_store_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'appliance-ecommerce-store'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'appliance-ecommerce-store'),
        'section' => 'appliance_ecommerce_store_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','appliance-ecommerce-store'),
            'Container' => __('Container','appliance-ecommerce-store'),
            'Container Fluid' => __('Container Fluid','appliance-ecommerce-store')
        ),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('appliance_ecommerce_store_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('appliance_ecommerce_store_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'appliance-ecommerce-store'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'appliance-ecommerce-store'),
        'section' => 'appliance_ecommerce_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','appliance-ecommerce-store'),
            'left' => __('Left','appliance-ecommerce-store'),
            'right' => __('Right','appliance-ecommerce-store'),
            'three-column' => __('Three Columns','appliance-ecommerce-store'),
            'four-column' => __('Four Columns','appliance-ecommerce-store'),
            'grid' => __('Grid Layout','appliance-ecommerce-store')
        ),
	) );

	// Add Settings and Controls for post sidebar Layout
	$wp_customize->add_setting('appliance_ecommerce_store_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('appliance_ecommerce_store_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'appliance-ecommerce-store'),
        'description'   => __('This option work for single blog page', 'appliance-ecommerce-store'),
        'section' => 'appliance_ecommerce_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','appliance-ecommerce-store'),
            'left' => __('Left','appliance-ecommerce-store'),
            'right' => __('Right','appliance-ecommerce-store'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('appliance_ecommerce_store_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('appliance_ecommerce_store_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'appliance-ecommerce-store'),
        'description'   => __('This option work for pages.', 'appliance-ecommerce-store'),
        'section' => 'appliance_ecommerce_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','appliance-ecommerce-store'),
            'left' => __('Left','appliance-ecommerce-store'),
            'right' => __('Right','appliance-ecommerce-store')
        ),
	) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_sticky', array(
		'label'       => esc_html__( 'Show Sticky Header', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_sticky',
	) ) );

	//tp typography option
	$appliance_ecommerce_store_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'Inter'                  => 'Inter',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Karla'                  => 'Karla',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Manrope'           	 => 'Manrope',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Oxanium'                => 'Oxanium',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Roboto Serif'           => 'Roboto Serif',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Satisfy'                => 'Satisfy',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('appliance_ecommerce_store_typography_option',array(
		'title'         => __('TP Typography Option', 'appliance-ecommerce-store'),
		'priority' => 1,
		'panel' => 'appliance_ecommerce_store_panel_id'
   	));

   	$wp_customize->add_setting('appliance_ecommerce_store_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control(	'appliance_ecommerce_store_heading_font_family', array(
		'section' => 'appliance_ecommerce_store_typography_option',
		'label'   => __('heading Fonts', 'appliance-ecommerce-store'),
		'type'    => 'select',
		'choices' => $appliance_ecommerce_store_font_array,
	));

	$wp_customize->add_setting('appliance_ecommerce_store_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control(	'appliance_ecommerce_store_body_font_family', array(
		'section' => 'appliance_ecommerce_store_typography_option',
		'label'   => __('Body Fonts', 'appliance-ecommerce-store'),
		'type'    => 'select',
		'choices' => $appliance_ecommerce_store_font_array,
	));

	//TP Preloader Option
	$wp_customize->add_section('appliance_ecommerce_store_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'appliance-ecommerce-store'),
		'priority' => 1,
		'panel' => 'appliance_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_preloader_show_hide',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'appliance-ecommerce-store'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'appliance-ecommerce-store'),
	    'section' => 'appliance_ecommerce_store_prelaoder_option',
	    'settings' => 'appliance_ecommerce_store_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'appliance_ecommerce_store_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'appliance-ecommerce-store'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'appliance-ecommerce-store'),
	    'section' => 'appliance_ecommerce_store_prelaoder_option',
	    'settings' => 'appliance_ecommerce_store_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'appliance_ecommerce_store_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'appliance-ecommerce-store'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'appliance-ecommerce-store'),
	    'section' => 'appliance_ecommerce_store_prelaoder_option',
	    'settings' => 'appliance_ecommerce_store_tp_preloader_bg_color_option',
  	)));

  	// Pro Version
    $wp_customize->add_setting( 'appliance_ecommerce_store_preloader_pro_version_logo', array(
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new appliance_ecommerce_store_Customize_Pro_Version ( $wp_customize,'appliance_ecommerce_store_preloader_pro_version_logo', array(
        'section'     => 'appliance_ecommerce_store_prelaoder_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'appliance-ecommerce-store' ),
        'description' => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//TP Color Option
	$wp_customize->add_section('appliance_ecommerce_store_color_option',array(
     'title'         => __('TP Color Option', 'appliance-ecommerce-store'),
     'priority' => 1,
     'panel' => 'appliance_ecommerce_store_panel_id'
    ) );
    
	$wp_customize->add_setting( 'appliance_ecommerce_store_tp_color_option_first', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_tp_color_option_first', array(
			'label'     => __('Theme First Color', 'appliance-ecommerce-store'),
	    'description' => __('It will change the complete theme color in one click.', 'appliance-ecommerce-store'),
	    'section' => 'appliance_ecommerce_store_color_option',
	    'settings' => 'appliance_ecommerce_store_tp_color_option_first',
  	)));

	//TP Blog Option
	$wp_customize->add_section('appliance_ecommerce_store_blog_option',array(
        'title' => __('TP Blog Option', 'appliance-ecommerce-store'),
        'priority' => 1,
        'panel' => 'appliance_ecommerce_store_panel_id'
    ) );

    $wp_customize->add_setting('appliance_ecommerce_store_edit_blog_page_title',array(
		'default'=> __('Home','appliance-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_edit_blog_page_title',array(
		'label'	=> __('Change Blog Page Title','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_edit_blog_page_description',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_edit_blog_page_description',array(
		'label'	=> __('Add Blog Page Description','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_blog_option',
		'type'=> 'text'
	));

	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment','category', 'time'),
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_sortable',
    ));
    $wp_customize->add_control(new Appliance_Ecommerce_Store_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'appliance-ecommerce-store'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'appliance-ecommerce-store') ,
        'section' => 'appliance_ecommerce_store_blog_option',
        'choices' => array(
            'date' => __('date', 'appliance-ecommerce-store') ,
            'author' => __('author', 'appliance-ecommerce-store') ,
            'comment' => __('comment', 'appliance-ecommerce-store') ,
            'category' => __('category', 'appliance-ecommerce-store') ,
            'time' => __('time', 'appliance-ecommerce-store') ,
        ) ,
    )));

    $wp_customize->add_setting( 'appliance_ecommerce_store_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appliance_ecommerce_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'appliance_ecommerce_store_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('appliance_ecommerce_store_read_more_text',array(
		'default'=> __('Read More','appliance-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_read_more_text',array(
		'label'	=> __('Edit Button Text','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_post_image_round', array(
	  'default' => '0',
      'sanitize_callback' => 'appliance_ecommerce_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Appliance_Ecommerce_Store_Range_Slider($wp_customize, 'appliance_ecommerce_store_post_image_round', array(
       'section' => 'appliance_ecommerce_store_blog_option',
      'label' => esc_html__('Edit Post Image Border Radius', 'appliance-ecommerce-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 180,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('appliance_ecommerce_store_post_image_width', array(
	  'default' => '',
      'sanitize_callback' => 'appliance_ecommerce_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Appliance_Ecommerce_Store_Range_Slider($wp_customize, 'appliance_ecommerce_store_post_image_width', array(
       'section' => 'appliance_ecommerce_store_blog_option',
      'label' => esc_html__('Edit Post Image Width', 'appliance-ecommerce-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 367,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('appliance_ecommerce_store_post_image_length', array(
	  'default' => '',
      'sanitize_callback' => 'appliance_ecommerce_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Appliance_Ecommerce_Store_Range_Slider($wp_customize, 'appliance_ecommerce_store_post_image_length', array(
       'section' => 'appliance_ecommerce_store_blog_option',
      'label' => esc_html__('Edit Post Image height', 'appliance-ecommerce-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 900,
        'step' => 1
    )
	)));
	
	$wp_customize->add_setting( 'appliance_ecommerce_store_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_remove_read_button',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_remove_tags',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_remove_category',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'appliance-ecommerce-store' ),
	 'section'     => 'appliance_ecommerce_store_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'appliance_ecommerce_store_remove_comment',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
 	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'appliance-ecommerce-store' ),
	 'section'     => 'appliance_ecommerce_store_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'appliance_ecommerce_store_remove_related_post',
	) ) );

	$wp_customize->add_setting('appliance_ecommerce_store_related_post_heading',array(
		'default'=> __('Related Posts','appliance-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_related_post_heading',array(
		'label'	=> __('Edit Section Title','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'appliance_ecommerce_store_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appliance_ecommerce_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'appliance_ecommerce_store_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appliance_ecommerce_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'appliance_ecommerce_store_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );

	$wp_customize->add_setting('appliance_ecommerce_store_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('appliance_ecommerce_store_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'appliance-ecommerce-store'),
        'section' => 'appliance_ecommerce_store_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','appliance-ecommerce-store'),
            'content-image' => __('Content-Media','appliance-ecommerce-store'),
        ),
	) );

	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'appliance_ecommerce_store_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'appliance-ecommerce-store' ),
    	'priority' => 2,
		'panel' => 'appliance_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('appliance_ecommerce_store_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control(	'appliance_ecommerce_store_menu_font_family', array(
		'section' => 'appliance_ecommerce_store_menu_typography',
		'label'   => __('Menu Fonts', 'appliance-ecommerce-store'),
		'type'    => 'select',
		'choices' => $appliance_ecommerce_store_font_array,
	));

	$wp_customize->add_setting('appliance_ecommerce_store_menu_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('appliance_ecommerce_store_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'appliance-ecommerce-store'),
     'section' => 'appliance_ecommerce_store_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','appliance-ecommerce-store'),
         '200' => __('200','appliance-ecommerce-store'),
         '300' => __('300','appliance-ecommerce-store'),
         '400' => __('400','appliance-ecommerce-store'),
         '500' => __('500','appliance-ecommerce-store'),
         '600' => __('600','appliance-ecommerce-store'),
         '700' => __('700','appliance-ecommerce-store'),
         '800' => __('800','appliance-ecommerce-store'),
         '900' => __('900','appliance-ecommerce-store')
     ),
	) );

	$wp_customize->add_setting('appliance_ecommerce_store_menu_text_tranform',array(
		'default' => '',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
 	));
 	$wp_customize->add_control('appliance_ecommerce_store_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','appliance-ecommerce-store'),
		'section' => 'appliance_ecommerce_store_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','appliance-ecommerce-store'),
		   'Lowercase' => __('Lowercase','appliance-ecommerce-store'),
		   'Capitalize' => __('Capitalize','appliance-ecommerce-store'),
		),
	) );
	$wp_customize->add_setting('appliance_ecommerce_store_menu_font_size', array(
	  'default' => '',
      'sanitize_callback' => 'appliance_ecommerce_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Appliance_Ecommerce_Store_Range_Slider($wp_customize, 'appliance_ecommerce_store_menu_font_size', array(
        'section' => 'appliance_ecommerce_store_menu_typography',
        'label' => esc_html__('Font Size', 'appliance-ecommerce-store'),
        'input_attrs' => array(
          'min' => 0,
          'max' => 20,
          'step' => 1
    )
	)));

	$wp_customize->add_setting( 'appliance_ecommerce_store_menu_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_menu_color', array(
			'label'     => __('Change Menu Color', 'appliance-ecommerce-store'),
	    'section' => 'appliance_ecommerce_store_menu_typography',
	    'settings' => 'appliance_ecommerce_store_menu_color',
  	)));

  	// Topbar detail
	$wp_customize->add_section( 'appliance_ecommerce_store_topbar_sec', array(
    	'title'      => __( 'Top Header Details', 'appliance-ecommerce-store' ),
    	'description' => __( 'Add your Contact details here', 'appliance-ecommerce-store' ),
		'panel' => 'appliance_ecommerce_store_panel_id',
      'priority' => 2,
	) );

	$wp_customize->add_setting('appliance_ecommerce_store_topbar_visibility', array(
	    'default'           => true, 
	    'transport'         => 'refresh',
	    'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	));
	$wp_customize->add_control(new Appliance_Ecommerce_Store_Toggle_Control($wp_customize, 'appliance_ecommerce_store_topbar_visibility', array(
	    'label'       => esc_html__('Show / Hide Topbar', 'appliance-ecommerce-store'),
	    'section'     => 'appliance_ecommerce_store_topbar_sec',
	    'type'        => 'toggle',
	    'settings'    => 'appliance_ecommerce_store_topbar_visibility',
	)));

	$wp_customize->add_setting( 'appliance_ecommerce_store_currency_switcher', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_currency_switcher', array(
		'label'       => esc_html__( 'Show / Hide Currency Switcher', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_topbar_sec',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_currency_switcher',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_cart_language_translator', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_cart_language_translator', array(
		'label'       => esc_html__( 'Show / Hide Language Translator', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_topbar_sec',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_cart_language_translator',
	) ) );

	$wp_customize->add_setting('appliance_ecommerce_store_about_us_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_about_us_text',array(
		'label'	=> __('Add About Us Text','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_topbar_sec',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('appliance_ecommerce_store_about_us_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('appliance_ecommerce_store_about_us_link',array(
		'label'	=> __('Add About Us Page Link','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_topbar_sec',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_free_delivery_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_free_delivery_text',array(
		'label'	=> __('Add Free Delivery Text','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_topbar_sec',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('appliance_ecommerce_store_free_delivery_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('appliance_ecommerce_store_free_delivery_link',array(
		'label'	=> __('Add Free Delivery Page Link','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_topbar_sec',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_return_policy_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_return_policy_text',array(
		'label'	=> __('Add Return Policy Text','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_topbar_sec',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('appliance_ecommerce_store_return_policy_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('appliance_ecommerce_store_return_policy_link',array(
		'label'	=> __('Add Return Policy Page Link','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_topbar_sec',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_help_center_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_help_center_text',array(
		'label'	=> __('Add Help Center Text','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_topbar_sec',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('appliance_ecommerce_store_help_center_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('appliance_ecommerce_store_help_center_link',array(
		'label'	=> __('Add Help Center Page Link','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_topbar_sec',
		'type'		=> 'url'
	));

	// Pro Version
    $wp_customize->add_setting( 'appliance_ecommerce_store_top_header_pro_version_logo', array(
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new appliance_ecommerce_store_Customize_Pro_Version ( $wp_customize,'appliance_ecommerce_store_top_header_pro_version_logo', array(
        'section'     => 'appliance_ecommerce_store_topbar_sec',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'appliance-ecommerce-store' ),
        'description' => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	// Header detail
	$wp_customize->add_section( 'appliance_ecommerce_store_header_sec', array(
    	'title'      => __( 'Header Details', 'appliance-ecommerce-store' ),
    	'description' => __( 'Add your Contact details here', 'appliance-ecommerce-store' ),
		'panel' => 'appliance_ecommerce_store_panel_id',
      'priority' => 2,
	) );

	$wp_customize->add_setting('appliance_ecommerce_store_call_contact_no_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_call_contact_no_text',array(
		'label'	=> __('Add Phone Text','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_header_sec',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_call_contact_no',array(
		'default'=> '',
		'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_phone_number'
	));
	$wp_customize->add_control('appliance_ecommerce_store_call_contact_no',array(
		'label'	=> __('Add Phone Number','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_header_sec',
		'type'=> 'text'
	));

    $wp_customize->add_setting('appliance_ecommerce_store_category_text',array(
		'default' => 'SHOP CATEGORIES',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'appliance_ecommerce_store_category_text', array(
	   'settings' => 'appliance_ecommerce_store_category_text',
	   'section'   => 'appliance_ecommerce_store_header_sec',
	   'label' => __('Add Category Text', 'appliance-ecommerce-store'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_product_category_number',array(
		'default' => '',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_number_absint',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'appliance_ecommerce_store_product_category_number', array(
	   'settings' => 'appliance_ecommerce_store_product_category_number',
	   'section'   => 'appliance_ecommerce_store_header_sec',
	   'label' => __('Add Category Limit', 'appliance-ecommerce-store'),
	   'type'      => 'number'
	));

	// Pro Version
    $wp_customize->add_setting( 'appliance_ecommerce_store_header_pro_version_logo', array(
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new appliance_ecommerce_store_Customize_Pro_Version ( $wp_customize,'appliance_ecommerce_store_header_pro_version_logo', array(
        'section'     => 'appliance_ecommerce_store_header_sec',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'appliance-ecommerce-store' ),
        'description' => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//home page slider
	$wp_customize->add_section( 'appliance_ecommerce_store_slider_section' , array(
    	'title'      => __( 'Our Products Sale Section', 'appliance-ecommerce-store' ),
    	'priority' => 3,
		'panel' => 'appliance_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_slider_arrows', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide Section', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_slider_section',
		'priority' => 1,
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_slider_arrows',
	) ) );


    for ($appliance_ecommerce_store_i = 1; $appliance_ecommerce_store_i <= 3; $appliance_ecommerce_store_i++) {

        // Slider Image
        $wp_customize->add_setting('appliance_ecommerce_store_slider_image' . $appliance_ecommerce_store_i, [
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ]);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'appliance_ecommerce_store_slider_image' . $appliance_ecommerce_store_i, [
            'label'   => __('Add Slider Image ', 'appliance-ecommerce-store') . $appliance_ecommerce_store_i,
            'section' => 'appliance_ecommerce_store_slider_section',
        ]));

        // Short Heading
        $wp_customize->add_setting('appliance_ecommerce_store_slider_short_heading' . $appliance_ecommerce_store_i, [
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('appliance_ecommerce_store_slider_short_heading' . $appliance_ecommerce_store_i, [
            'label'   => __('Add Slider Short Heading ', 'appliance-ecommerce-store') . $appliance_ecommerce_store_i,
            'section' => 'appliance_ecommerce_store_slider_section',
            'type'    => 'text',
        ]);

        // Main Heading
        $wp_customize->add_setting('appliance_ecommerce_store_slider_heading' . $appliance_ecommerce_store_i, [
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('appliance_ecommerce_store_slider_heading' . $appliance_ecommerce_store_i, [
            'label'   => __('Add Slider Main Heading ', 'appliance-ecommerce-store') . $appliance_ecommerce_store_i,
            'section' => 'appliance_ecommerce_store_slider_section',
            'type'    => 'text',
        ]);

        // Content
        $wp_customize->add_setting('appliance_ecommerce_store_slider_content' . $appliance_ecommerce_store_i, [
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('appliance_ecommerce_store_slider_content' . $appliance_ecommerce_store_i, [
            'label'   => __('Add Slider Content ', 'appliance-ecommerce-store') . $appliance_ecommerce_store_i,
            'section' => 'appliance_ecommerce_store_slider_section',
            'type'    => 'text',
        ]);

        // Button Text
        $wp_customize->add_setting('appliance_ecommerce_store_slider_button_text' . $appliance_ecommerce_store_i, [
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control('appliance_ecommerce_store_slider_button_text' . $appliance_ecommerce_store_i, [
            'label'   => __('Add Slider Button Text ', 'appliance-ecommerce-store') . $appliance_ecommerce_store_i,
            'section' => 'appliance_ecommerce_store_slider_section',
            'type'    => 'text',
        ]);

        // Button URL
        $wp_customize->add_setting('appliance_ecommerce_store_slider_button_link' . $appliance_ecommerce_store_i, [
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'transport'         => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ]);
        $wp_customize->add_control('appliance_ecommerce_store_slider_button_link' . $appliance_ecommerce_store_i, [
            'label'   => __('Add Slider Button URL ', 'appliance-ecommerce-store') . $appliance_ecommerce_store_i,
            'section' => 'appliance_ecommerce_store_slider_section',
            'type'    => 'url',
        ]);
    }

	// right part
	$wp_customize->add_setting(
    	'appliance_ecommerce_store_product_title',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'appliance_ecommerce_store_product_title',
		array(
		    'label'   		=> __('Add Product Of Day Heading','appliance-ecommerce-store'),
		    'section'		=> 'appliance_ecommerce_store_slider_section',
			'type' 			=> 'text',
		)
	);

	$wp_customize->add_setting(
    	'appliance_ecommerce_store_product_content',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'appliance_ecommerce_store_product_content',
		array(
		    'label'   		=> __('Add Product Of Day Content','appliance-ecommerce-store'),
		    'section'		=> 'appliance_ecommerce_store_slider_section',
			'type' 			=> 'text',
		)
	);

	// Helper: Get products for dropdown
	if ( ! function_exists( 'appliance_ecommerce_store_get_products_list' ) ) {
	    function appliance_ecommerce_store_get_products_list() {
	        $products = get_posts(array(
	            'post_type'   => 'product',
	            'numberposts' => -1,
	            'post_status' => 'publish',
	        ));

	        $choices = array('' => __('— Select Product —', 'appliance-ecommerce-store'));
	        foreach ( $products as $product ) {
	            $choices[$product->ID] = $product->post_title;
	        }
	        return $choices;
	    }
	}

	$wp_customize->add_setting('appliance_ecommerce_store_product_of_day', array(
	    'default'           => '',
	    'sanitize_callback' => 'absint',
	));
	$wp_customize->add_control(new WP_Customize_Control(
	    $wp_customize,
	    'appliance_ecommerce_store_product_of_day',
	    array(
	        'label'    => __('Select Product of the Day', 'appliance-ecommerce-store'),
	        'section'  => 'appliance_ecommerce_store_slider_section',
	        'type'     => 'select',
	        'choices'  => appliance_ecommerce_store_get_products_list(),
	    )
	));

	// Pro Version
    $wp_customize->add_setting( 'appliance_ecommerce_store_slider_pro_version_logo', array(
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new appliance_ecommerce_store_Customize_Pro_Version ( $wp_customize,'appliance_ecommerce_store_slider_pro_version_logo', array(
        'section'     => 'appliance_ecommerce_store_slider_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'appliance-ecommerce-store' ),
        'description' => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	/*=========================================
	service Section
	=========================================*/
	$wp_customize->add_section( 
		'appliance_ecommerce_store_service_section' , 
		array(
	        'title'      => __( 'Product Offer Section', 'appliance-ecommerce-store' ),
	        'priority' => 3,
	        'panel' => 'appliance_ecommerce_store_panel_id',
    	) 
    );

    $wp_customize->add_setting( 'appliance_ecommerce_store_offer_product_sec', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_offer_product_sec', array(
		'label'       => esc_html__( 'Show / Hide Section', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_service_section',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_offer_product_sec',
	) ) );

	$wp_customize->add_setting('appliance_ecommerce_store_offer_number_of_categories', array(
	    'default'           => 4,
	    'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control('appliance_ecommerce_store_offer_number_of_categories', array(
	    'type'    => 'number',
	    'label'   => __('Number of Product Categories to Show', 'appliance-ecommerce-store'),
	    'section' => 'appliance_ecommerce_store_service_section',
	    'input_attrs' => array(
	        'min'  => 1,
	        'max'  => 20,
	        'step' => 1,
	    ),
	));


	// Pro Version
    $wp_customize->add_setting( 'appliance_ecommerce_store_about_pro_version_logo', array(
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new appliance_ecommerce_store_Customize_Pro_Version ( $wp_customize,'appliance_ecommerce_store_about_pro_version_logo', array(
        'section'     => 'appliance_ecommerce_store_service_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'appliance-ecommerce-store' ),
        'description' => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ),
    )));


	//----------------------------footer------------------------
	$wp_customize->add_section('appliance_ecommerce_store_footer_section',array(
		'title'	=> __('Footer Widget Settings','appliance-ecommerce-store'),
		'panel' => 'appliance_ecommerce_store_panel_id',
		'priority' => 4,
	));

	$wp_customize->add_setting('appliance_ecommerce_store_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_number_absint'
	));
	$wp_customize->add_control('appliance_ecommerce_store_footer_columns',array(
		'label'	=> __('Footer Widget Columns','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_footer_section',
		'setting'	=> 'appliance_ecommerce_store_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'appliance_ecommerce_store_tp_footer_bg_color_option', array(
		'default' => '#151515',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_tp_footer_bg_color_option', array(
		'label'     => __('Footer Widget Background Color', 'appliance-ecommerce-store'),
		'description' => __('It will change the complete footer widget backgorund color.', 'appliance-ecommerce-store'),
		'section' => 'appliance_ecommerce_store_footer_section',
		'settings' => 'appliance_ecommerce_store_tp_footer_bg_color_option',
	)));

	$wp_customize->add_setting('appliance_ecommerce_store_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'appliance_ecommerce_store_footer_widget_image',array(
       'label' => __('Footer Widget Background Image','appliance-ecommerce-store'),
       'section' => 'appliance_ecommerce_store_footer_section'
	)));

	//footer widget title font size
	$wp_customize->add_setting('appliance_ecommerce_store_footer_widget_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_number_absint'
	));
	$wp_customize->add_control('appliance_ecommerce_store_footer_widget_title_font_size',array(
		'label'	=> __('Change Footer Widget Title Font Size in PX','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_footer_section',
	    'setting'	=> 'appliance_ecommerce_store_footer_widget_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'appliance_ecommerce_store_footer_widget_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_footer_widget_title_color', array(
			'label'     => __('Change Footer Widget Title Color', 'appliance-ecommerce-store'),
	    'section' => 'appliance_ecommerce_store_footer_section',
	    'settings' => 'appliance_ecommerce_store_footer_widget_title_color',
  	)));
  	
	$wp_customize->add_setting( 'appliance_ecommerce_store_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_footer_section',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_return_to_header',
	) ) );

	$wp_customize->add_setting('appliance_ecommerce_store_return_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appliance_Ecommerce_Store_Icon_Changer(
       $wp_customize,'appliance_ecommerce_store_return_icon',array(
		'label'	=> __('Return to header Icon','appliance-ecommerce-store'),
		'transport' => 'refresh',
		'section'	=> 'appliance_ecommerce_store_footer_section',
		'type'		=> 'appliance-ecommerce-store-icon'
	)));


    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('appliance_ecommerce_store_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('appliance_ecommerce_store_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'appliance-ecommerce-store'),
        'description'   => __('This option work for scroll to top', 'appliance-ecommerce-store'),
        'section' => 'appliance_ecommerce_store_footer_section',
        'choices' => array(
            'Right' => __('Right','appliance-ecommerce-store'),
            'Left' => __('Left','appliance-ecommerce-store'),
            'Center' => __('Center','appliance-ecommerce-store')
        ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'appliance_ecommerce_store_footer_widget_pro_version_logo', array(
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new appliance_ecommerce_store_Customize_Pro_Version ( $wp_customize,'appliance_ecommerce_store_footer_widget_pro_version_logo', array(
        'section'     => 'appliance_ecommerce_store_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'appliance-ecommerce-store' ),
        'description' => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//footer
	$wp_customize->add_section('appliance_ecommerce_store_footer_copyright_section',array(
		'title'	=> __('Footer Copyright Settings','appliance-ecommerce-store'),
		'description'	=> __('Add copyright text.','appliance-ecommerce-store'),
		'panel' => 'appliance_ecommerce_store_panel_id',
		'priority' => 5,
	));

	$wp_customize->add_setting('appliance_ecommerce_store_footer_text',array(
		'default' => __( 'Appliance Ecommerce Store WordPress Theme', 'appliance-ecommerce-store' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_footer_text',array(
		'label'	=> __('Copyright Text','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_footer_copyright_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_footer_copyright_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_number_absint'
	));
	$wp_customize->add_control('appliance_ecommerce_store_footer_copyright_font_size',array(
		'label'	=> __('Change Footer Copyright Font Size in PX','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_footer_copyright_section',
	    'setting'	=> 'appliance_ecommerce_store_footer_copyright_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'appliance_ecommerce_store_footer_copyright_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_footer_copyright_text_color', array(
			'label'     => __('Change Footer Copyright Text Color', 'appliance-ecommerce-store'),
	    'section' => 'appliance_ecommerce_store_footer_copyright_section',
	    'settings' => 'appliance_ecommerce_store_footer_copyright_text_color',
  	)));

  	$wp_customize->add_setting('appliance_ecommerce_store_footer_copyright_top_bottom_padding',array(
		'default'	=> '',
		'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_number_absint'
	));
	$wp_customize->add_control('appliance_ecommerce_store_footer_copyright_top_bottom_padding',array(
		'label'	=> __('Change Footer Copyright Padding in PX','appliance-ecommerce-store'),
		'section'	=> 'appliance_ecommerce_store_footer_copyright_section',
	    'setting'	=> 'appliance_ecommerce_store_footer_copyright_top_bottom_padding',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	// Add Settings and Controls for Scroll top
	$wp_customize->add_setting('appliance_ecommerce_store_copyright_text_position',array(
        'default' => 'Center',
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('appliance_ecommerce_store_copyright_text_position',array(
        'type' => 'radio',
        'label'     => __('Copyright Text Position', 'appliance-ecommerce-store'),
        'description'   => __('This option work for Copyright', 'appliance-ecommerce-store'),
        'section' => 'appliance_ecommerce_store_footer_copyright_section',
        'choices' => array(
            'Right' => __('Right','appliance-ecommerce-store'),
            'Left' => __('Left','appliance-ecommerce-store'),
            'Center' => __('Center','appliance-ecommerce-store')
        ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'appliance_ecommerce_store_copyright_pro_version_logo', array(
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new appliance_ecommerce_store_Customize_Pro_Version ( $wp_customize,'appliance_ecommerce_store_copyright_pro_version_logo', array(
        'section'     => 'appliance_ecommerce_store_footer_copyright_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'appliance-ecommerce-store' ),
        'description' => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//Mobile resposnsive
	$wp_customize->add_section('appliance_ecommerce_store_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'appliance-ecommerce-store'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'appliance-ecommerce-store'),
		'priority' => 5,
		'panel' => 'appliance_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_mobile_blog_description', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_mobile_blog_description', array(
		'label'       => esc_html__( 'Show / Hide Blog Page Description', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_mobile_blog_description',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_slider_buttom_mob',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'appliance-ecommerce-store' ),
		'section'     => 'appliance_ecommerce_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_related_post_mob',
	) ) );

	//Slider height
    $wp_customize->add_setting('appliance_ecommerce_store_slider_img_height_responsive',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('appliance_ecommerce_store_slider_img_height_responsive',array(
        'label' => __('Slider Height','appliance-ecommerce-store'),
        'description'   => __('Add slider height in px(eg. 700px).','appliance-ecommerce-store'),
        'section'=> 'appliance_ecommerce_store_mobile_media_option',
        'type'=> 'text'
    ));
    
    // Pro Version
    $wp_customize->add_setting( 'appliance_ecommerce_store_responsive_pro_version_logo', array(
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_custom_control'
    ));
    $wp_customize->add_control( new appliance_ecommerce_store_Customize_Pro_Version ( $wp_customize,'appliance_ecommerce_store_responsive_pro_version_logo', array(
        'section'     => 'appliance_ecommerce_store_mobile_media_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'appliance-ecommerce-store' ),
        'description' => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL ),
        'priority'    => 100
    )));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	//site Title
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'Appliance_Ecommerce_Store_Customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'Appliance_Ecommerce_Store_Customize_partial_blogdescription',
	) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'appliance-ecommerce-store' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_site_title',
	) ) );

	// logo site title size
	$wp_customize->add_setting('appliance_ecommerce_store_site_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_number_absint'
	));
	$wp_customize->add_control('appliance_ecommerce_store_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','appliance-ecommerce-store'),
		'section'	=> 'title_tagline',
		'setting'	=> 'appliance_ecommerce_store_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
		    'step'             => 1,
			'min'              => 0,
			'max'              => 30,
			),
	));

	$wp_customize->add_setting( 'appliance_ecommerce_store_site_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_site_tagline_color', array(
			'label'     => __('Change Site Title Color', 'appliance-ecommerce-store'),
	    'section' => 'title_tagline',
	    'settings' => 'appliance_ecommerce_store_site_tagline_color',
  	)));

	$wp_customize->add_setting( 'appliance_ecommerce_store_site_tagline', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'appliance-ecommerce-store' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('appliance_ecommerce_store_site_tagline_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_number_absint'
	));
	$wp_customize->add_control('appliance_ecommerce_store_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','appliance-ecommerce-store'),
		'section'	=> 'title_tagline',
		'setting'	=> 'appliance_ecommerce_store_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));

	$wp_customize->add_setting( 'appliance_ecommerce_store_logo_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_logo_tagline_color', array(
			'label'     => __('Change Site Tagline Color', 'appliance-ecommerce-store'),
	    'section' => 'title_tagline',
	    'settings' => 'appliance_ecommerce_store_logo_tagline_color',
  	)));

    $wp_customize->add_setting('appliance_ecommerce_store_logo_width',array(
	   'default' => 80,
	   'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_number_absint'
	));
	$wp_customize->add_control('appliance_ecommerce_store_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','appliance-ecommerce-store'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_number_absint'
	));
	$wp_customize->add_control('appliance_ecommerce_store_per_columns',array(
		'label'	=> __('Product Per Row','appliance-ecommerce-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('appliance_ecommerce_store_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'appliance_ecommerce_store_sanitize_number_absint'
	));
	$wp_customize->add_control('appliance_ecommerce_store_product_per_page',array(
		'label'	=> __('Product Per Page','appliance-ecommerce-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'appliance_ecommerce_store_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'appliance-ecommerce-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_product_sidebar',
	) ) );
	$wp_customize->add_setting('appliance_ecommerce_store_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('appliance_ecommerce_store_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'appliance-ecommerce-store'),
        'description'   => __('This option work for Archieve Products', 'appliance-ecommerce-store'),
        'section' => 'woocommerce_product_catalog',
        'choices' => array(
            'left' => __('Left','appliance-ecommerce-store'),
            'right' => __('Right','appliance-ecommerce-store'),
        ),
	) );
	$wp_customize->add_setting( 'appliance_ecommerce_store_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'appliance-ecommerce-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_single_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'appliance_ecommerce_store_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'appliance-ecommerce-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'appliance_ecommerce_store_related_product',
	) ) );

	
	//Page template settings
	$wp_customize->add_panel( 'appliance_ecommerce_store_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Page Template Settings', 'appliance-ecommerce-store' ),
	    'description' => __( 'Description of what this panel does.', 'appliance-ecommerce-store' ),
	) );

	// 404 PAGE
	$wp_customize->add_section('appliance_ecommerce_store_404_page_section',array(
		'title'         => __('404 Page', 'appliance-ecommerce-store'),
		'description'   => __('Here you can customize 404 Page content.', 'appliance-ecommerce-store'),
		'panel' => 'appliance_ecommerce_store_page_panel_id'
	) );

	$wp_customize->add_setting('appliance_ecommerce_store_edit_404_title',array(
		'default'=> __('Oops! That page cant be found.','appliance-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('appliance_ecommerce_store_edit_404_title',array(
		'label'	=> __('Edit Title','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_404_page_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('appliance_ecommerce_store_edit_404_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','appliance-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_edit_404_text',array(
		'label'	=> __('Edit Text','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_404_page_section',
		'type'=> 'text'
	));

	// Search Results
	$wp_customize->add_section('appliance_ecommerce_store_no_result_section',array(
		'title'         => __('Search Results', 'appliance-ecommerce-store'),
		'description'  => __('Here you can customize Search Result content.', 'appliance-ecommerce-store'),
		'panel' => 'appliance_ecommerce_store_page_panel_id'
	) );

	$wp_customize->add_setting('appliance_ecommerce_store_edit_no_result_title',array(
		'default'=> __('Nothing Found','appliance-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('appliance_ecommerce_store_edit_no_result_title',array(
		'label'	=> __('Edit Title','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_no_result_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('appliance_ecommerce_store_edit_no_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','appliance-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appliance_ecommerce_store_edit_no_result_text',array(
		'label'	=> __('Edit Text','appliance-ecommerce-store'),
		'section'=> 'appliance_ecommerce_store_no_result_section',
		'type'=> 'text'
	));

	 // Header Image Height
    $wp_customize->add_setting(
        'appliance_ecommerce_store_header_image_height',
        array(
            'default'           => 500,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'appliance_ecommerce_store_header_image_height',
        array(
            'label'       => esc_html__( 'Header Image Height', 'appliance-ecommerce-store' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the height of the header image. Default is 350px.', 'appliance-ecommerce-store' ),
            'input_attrs' => array(
                'min'  => 220,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    );

    // Header Background Position
    $wp_customize->add_setting(
        'appliance_ecommerce_store_header_background_position',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'appliance_ecommerce_store_header_background_position',
        array(
            'label'       => esc_html__( 'Header Background Position', 'appliance-ecommerce-store' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'top'    => esc_html__( 'Top', 'appliance-ecommerce-store' ),
                'center' => esc_html__( 'Center', 'appliance-ecommerce-store' ),
                'bottom' => esc_html__( 'Bottom', 'appliance-ecommerce-store' ),
            ),
            'description' => esc_html__( 'Choose how you want to position the header image.', 'appliance-ecommerce-store' ),
        )
    );

    // Header Image Parallax Effect
    $wp_customize->add_setting(
        'appliance_ecommerce_store_header_background_attachment',
        array(
            'default'           => 1,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'appliance_ecommerce_store_header_background_attachment',
        array(
            'label'       => esc_html__( 'Header Image Parallax', 'appliance-ecommerce-store' ),
            'section'     => 'header_image',
            'type'        => 'checkbox',
            'description' => esc_html__( 'Add a parallax effect on page scroll.', 'appliance-ecommerce-store' ),
        )
    );

        //Opacity
	$wp_customize->add_setting('appliance_ecommerce_store_header_banner_opacity_color',array(
       'default'              => '0.5',
       'sanitize_callback' => 'appliance_ecommerce_store_sanitize_choices'
	));
    $wp_customize->add_control( 'appliance_ecommerce_store_header_banner_opacity_color', array(
		'label'       => esc_html__( 'Header Image Opacity','appliance-ecommerce-store' ),
		'section'     => 'header_image',
		'type'        => 'select',
		'settings'    => 'appliance_ecommerce_store_header_banner_opacity_color',
		'choices' => array(
           '0' =>  esc_attr(__('0','appliance-ecommerce-store')),
           '0.1' =>  esc_attr(__('0.1','appliance-ecommerce-store')),
           '0.2' =>  esc_attr(__('0.2','appliance-ecommerce-store')),
           '0.3' =>  esc_attr(__('0.3','appliance-ecommerce-store')),
           '0.4' =>  esc_attr(__('0.4','appliance-ecommerce-store')),
           '0.5' =>  esc_attr(__('0.5','appliance-ecommerce-store')),
           '0.6' =>  esc_attr(__('0.6','appliance-ecommerce-store')),
           '0.7' =>  esc_attr(__('0.7','appliance-ecommerce-store')),
           '0.8' =>  esc_attr(__('0.8','appliance-ecommerce-store')),
           '0.9' =>  esc_attr(__('0.9','appliance-ecommerce-store'))
		), 
	) );

   $wp_customize->add_setting( 'appliance_ecommerce_store_header_banner_image_overlay', array(
	    'default'   => true,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'appliance_ecommerce_store_sanitize_checkbox',
	));
	$wp_customize->add_control( new Appliance_Ecommerce_Store_Toggle_Control( $wp_customize, 'appliance_ecommerce_store_header_banner_image_overlay', array(
	    'label'   => esc_html__( 'Show / Hide Header Image Overlay', 'appliance-ecommerce-store' ),
	    'section' => 'header_image',
	)));

    $wp_customize->add_setting('appliance_ecommerce_store_header_banner_image_ooverlay_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appliance_ecommerce_store_header_banner_image_ooverlay_color', array(
		'label'    => __('Header Image Overlay Color', 'appliance-ecommerce-store'),
		'section'  => 'header_image',
	)));

    $wp_customize->add_setting(
        'appliance_ecommerce_store_header_image_title_font_size',
        array(
            'default'           => 40,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'appliance_ecommerce_store_header_image_title_font_size',
        array(
            'label'       => esc_html__( 'Change Header Image Title Font Size', 'appliance-ecommerce-store' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the font Size of the header image title. Default is 40px.', 'appliance-ecommerce-store' ),
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 200,
                'step' => 1,
            ),
        )
    );

	$wp_customize->add_setting( 'appliance_ecommerce_store_header_image_title_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'appliance_ecommerce_store_header_image_title_text_color', array(
			'label'     => __('Change Header Image Title Color', 'appliance-ecommerce-store'),
	    'section' => 'header_image',
	    'settings' => 'appliance_ecommerce_store_header_image_title_text_color',
  	)));

}
add_action( 'customize_register', 'appliance_ecommerce_store_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Appliance Ecommerce Store 1.0
 * @see appliance_ecommerce_store_customize_register()
 *
 * @return void
 */
function Appliance_Ecommerce_Store_Customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Appliance Ecommerce Store 1.0
 * @see appliance_ecommerce_store_customize_register()
 *
 * @return void
 */
function Appliance_Ecommerce_Store_Customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_PRO_THEME_NAME' ) ) {
	define( 'APPLIANCE_ECOMMERCE_STORE_PRO_THEME_NAME', esc_html__( 'Ecommerce Store Pro', 'appliance-ecommerce-store'));
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL' ) ) {
	define( 'APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL', esc_url('https://www.themespride.com/products/appliance-wordpress-theme', 'appliance-ecommerce-store'));
}

if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_DOCS_URL' ) ) {
	define( 'APPLIANCE_ECOMMERCE_STORE_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/appliance-ecommerce-store-lite/'));
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_TEXT' ) ) {
    define( 'APPLIANCE_ECOMMERCE_STORE_TEXT', __( 'Appliance Ecommerce Store Pro','appliance-ecommerce-store' ));
}
if ( ! defined( 'APPLIANCE_ECOMMERCE_STORE_BUY_TEXT' ) ) {
    define( 'APPLIANCE_ECOMMERCE_STORE_BUY_TEXT', __( 'Upgrade Pro','appliance-ecommerce-store' ));
}

add_action( 'customize_register', function( $manager ) {

// Load custom sections.
load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

    $manager->register_section_type( appliance_ecommerce_store_Button::class );

    $manager->add_section(
        new appliance_ecommerce_store_Button( $manager, 'appliance_ecommerce_store_pro', [
            'title'       => esc_html( APPLIANCE_ECOMMERCE_STORE_TEXT,'appliance-ecommerce-store' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'appliance-ecommerce-store' ),
            'button_url'  => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL )
        ] )
    );

    // Register sections.
	$manager->add_section(
		new appliance_ecommerce_store_Customize_Section_Pro(
			$manager,
			'appliance_ecommerce_store_documentation',
			array(
				'priority'   => 500,
				'title'    => esc_html__( 'Theme Documentation', 'appliance-ecommerce-store' ),
				'pro_text' => esc_html__( 'Click Here', 'appliance-ecommerce-store' ),
				'pro_url'  => esc_url( APPLIANCE_ECOMMERCE_STORE_DOCS_URL, 'appliance-ecommerce-store'),
			)
		)
	);

} );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Appliance_Ecommerce_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Appliance_Ecommerce_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Appliance_Ecommerce_Store_Customize_Section_Pro(
				$manager,
				'appliance_ecommerce_store_section_pro',
				array(
					'priority'   => 9,
					'title'    => APPLIANCE_ECOMMERCE_STORE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'appliance-ecommerce-store' ),
					'pro_url'  => esc_url( APPLIANCE_ECOMMERCE_STORE_PRO_THEME_URL, 'appliance-ecommerce-store' ),
				)
			)
		);

	}
	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'appliance-ecommerce-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'appliance-ecommerce-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Appliance_Ecommerce_Store_Customize::get_instance();