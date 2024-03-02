<?php
/**
 * Fitness Insight: Customizer
 *
 * @subpackage Fitness Insight
 * @since 1.0
 */

function fitness_insight_customize_register( $wp_customize ) {

	wp_enqueue_style('fitness-insight-customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );

  	//Register the sortable control type.
	$wp_customize->register_control_type( 'Fitness_Insight_Control_Sortable' );

	// Add homepage customizer file
  	require get_template_directory() . '/inc/customizer-home-page.php';

  	//Logo
    $wp_customize->add_setting('fitness_insight_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Fitness_Insight_Slider_Custom_Control( $wp_customize, 'fitness_insight_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','fitness-insight'),
		'section'=> 'title_tagline',
		'settings'=>'fitness_insight_logo_max_height',
		'input_attrs' => array(
			'reset'			   =>100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
        'priority' => 9,
	)));
	$wp_customize->add_setting('fitness_insight_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_logo_title',
			array(
				'settings'        => 'fitness_insight_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('fitness_insight_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_logo_text',
			array(
				'settings'        => 'fitness_insight_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

  	//pro section
 	$wp_customize->add_section('fitness_insight_pro', array(
        'title'    => __('UPGRADE FITNESS PREMIUM', 'fitness-insight'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('fitness_insight_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Fitness_Insight_Pro_Control($wp_customize, 'fitness_insight_pro', array(
        'label'    => __('FITNESS PREMIUM', 'fitness-insight'),
        'section'  => 'fitness_insight_pro',
        'settings' => 'fitness_insight_pro',
        'priority' => 1,
    )));

    // typography
	$wp_customize->add_section( 'fitness_insight_typography_settings', array(
		'title'       => __( 'Typography Settings', 'fitness-insight' ),
		'priority'       => 3,
	) );
	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	$wp_customize->add_setting( 'fitness_insight_section_typo_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'fitness-insight' ),
		'section'     => 'fitness_insight_typography_settings',
		'settings'    => 'fitness_insight_section_typo_heading',
	) ) );
	$wp_customize->add_setting( 'fitness_insight_headings_text', array(
		'sanitize_callback' => 'fitness_insight_sanitize_fonts',
	));
	$wp_customize->add_control( 'fitness_insight_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'fitness-insight'),
		'section' => 'fitness_insight_typography_settings',
		'choices' => $font_choices
	));
	$wp_customize->add_setting( 'fitness_insight_body_text', array(
		'sanitize_callback' => 'fitness_insight_sanitize_fonts'
	));
	$wp_customize->add_control( 'fitness_insight_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'fitness-insight' ),
		'section' => 'fitness_insight_typography_settings',
		'choices' => $font_choices
	) );

    // Theme General Settings
    $wp_customize->add_section('fitness_insight_theme_settings',array(
        'title' => __('Theme General Settings', 'fitness-insight'),
        'priority' => 3,
    ) );
    $wp_customize->add_setting( 'fitness_insight_section_sticky_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_sticky_heading', array(
		'label'       => esc_html__( 'Sticky Header Setting', 'fitness-insight' ),
		'section'     => 'fitness_insight_theme_settings',
		'settings'    => 'fitness_insight_section_sticky_heading',
	) ) );
    $wp_customize->add_setting(
		'fitness_insight_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_sticky_header',
			array(
				'settings'        => 'fitness_insight_sticky_header',
				'section'         => 'fitness_insight_theme_settings',
				'label'           => __( 'Show Sticky Header', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'fitness_insight_section_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_loader_heading', array(
		'label'       => esc_html__( 'Loader Setting', 'fitness-insight' ),
		'section'     => 'fitness_insight_theme_settings',
		'settings'    => 'fitness_insight_section_loader_heading',
	) ) );
	$wp_customize->add_setting(
		'fitness_insight_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_theme_loader',
			array(
				'settings'        => 'fitness_insight_theme_loader',
				'section'         => 'fitness_insight_theme_settings',
				'label'           => __( 'Show Site Loader', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('fitness_insight_loader_style',array(
        'default' => 'style_one',
        'sanitize_callback' => 'fitness_insight_sanitize_choices'
	));
	$wp_customize->add_control('fitness_insight_loader_style',array(
        'type' => 'select',
        'label' => __('Select Loader Design','fitness-insight'),
        'section' => 'fitness_insight_theme_settings',
        'choices' => array(
            'style_one' => __('Circle','fitness-insight'),
            'style_two' => __('Bar','fitness-insight'),
        ),
	) );
	
	$wp_customize->add_setting( 'fitness_insight_section_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_theme_width_heading', array(
		'label'       => esc_html__( 'theme Width Setting', 'fitness-insight' ),
		'section'     => 'fitness_insight_theme_settings',
		'settings'    => 'fitness_insight_section_theme_width_heading',
	) ) );
	$wp_customize->add_setting('fitness_insight_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'fitness_insight_sanitize_choices'
	));
	$wp_customize->add_control('fitness_insight_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','fitness-insight'),
        'section' => 'fitness_insight_theme_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','fitness-insight'),
            'container' => __('Container','fitness-insight'),
            'container_fluid' => __('Container Fluid','fitness-insight'),
        ),
	) );
	$wp_customize->add_setting( 'fitness_insight_section_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Settings', 'fitness-insight' ),
		'section'     => 'fitness_insight_theme_settings',
		'settings'    => 'fitness_insight_section_menu_heading',
	) ) );
	$wp_customize->add_setting('fitness_insight_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'fitness_insight_sanitize_choices'
	));
	$wp_customize->add_control('fitness_insight_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','fitness-insight'),
        'section' => 'fitness_insight_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','fitness-insight'),
            'UPPERCASE' => __('UPPERCASE','fitness-insight'),
            'LOWERCASE' => __('LOWERCASE','fitness-insight'),
        ),
	) );
	$wp_customize->add_setting( 'fitness_insight_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'fitness-insight' ),
		'section'     => 'fitness_insight_theme_settings',
		'settings'    => 'fitness_insight_section_scroll_heading',
	) ) );
	$wp_customize->add_setting(
		'fitness_insight_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_scroll_enable',
			array(
				'settings'        => 'fitness_insight_scroll_enable',
				'section'         => 'fitness_insight_theme_settings',
				'label'           => __( 'show Scroll Top', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'fitness_insight_scroll_options',
		array(
			'default' => 'right_align',
			'transport' => 'refresh',
			'sanitize_callback' => 'fitness_insight_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Fitness_Insight_Text_Radio_Button_Custom_Control( $wp_customize, 'fitness_insight_scroll_options',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Scroll Top Alignment', 'fitness-insight' ),
			'section' => 'fitness_insight_theme_settings',
			'choices' => array(
				'left_align' => __('LEFT','fitness-insight'),
				'center_align' => __('CENTER','fitness-insight'),
				'right_align' => __('RIGHT','fitness-insight'),
			)
		)
	) );
	$wp_customize->add_setting('fitness_insight_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_theme_settings',
		'setting'	=> 'fitness_insight_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting(
		'fitness_insight_enable_custom_cursor',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_enable_custom_cursor',
			array(
				'settings'        => 'fitness_insight_enable_custom_cursor',
				'section'         => 'fitness_insight_theme_settings',
				'label'           => __( 'show custom cursor', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	   
	// Post Layouts
	$wp_customize->add_panel( 'fitness_insight_post_panel', array(
		'title' => esc_html__( 'Post Layout', 'fitness-insight' ),
		'priority' => 4,
	));
    $wp_customize->add_section('fitness_insight_layout',array(
        'title' => __('Single-Post Layout', 'fitness-insight'),
        'panel' => 'fitness_insight_post_panel',
    ) );
    $wp_customize->add_setting( 'fitness_insight_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_post_heading', array(
		'label'       => esc_html__( 'Single Post Structure', 'fitness-insight' ),
		'section'     => 'fitness_insight_layout',
		'settings'    => 'fitness_insight_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'fitness_insight_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Fitness_Insight_Radio_Image_Control( $wp_customize, 'fitness_insight_single_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Single Post Page Layout', 'fitness-insight' ),
			'section' => 'fitness_insight_layout',
			'choices' => array(

				'single_right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'fitness-insight' )
				),
				'single_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'fitness-insight' )
				),
				'single_full_width' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'fitness-insight' )
				),
			)
		)
	) );
	$wp_customize->add_setting('fitness_insight_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_single_post_date',
			array(
				'settings'        => 'fitness_insight_single_post_date',
				'section'         => 'fitness_insight_layout',
				'label'           => __( 'Show Date', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_single_post_date',
	) );
	$wp_customize->add_setting('fitness_insight_single_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_single_date_icon',array(
		'label'	=> __('date Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_layout',
		'setting'	=> 'fitness_insight_single_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_single_post_admin',
			array(
				'settings'        => 'fitness_insight_single_post_admin',
				'section'         => 'fitness_insight_layout',
				'label'           => __( 'Show Author/Admin', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_single_post_admin',
	) );
	$wp_customize->add_setting('fitness_insight_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_single_author_icon',array(
		'label'	=> __('Author Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_layout',
		'setting'	=> 'fitness_insight_single_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_single_post_comment',
			array(
				'settings'        => 'fitness_insight_single_post_comment',
				'section'         => 'fitness_insight_layout',
				'label'           => __( 'Show Comment', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('fitness_insight_single_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_single_comment_icon',array(
		'label'	=> __('comment Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_layout',
		'setting'	=> 'fitness_insight_single_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_single_post_tag_count',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_single_post_tag_count',
			array(
				'settings'        => 'fitness_insight_single_post_tag_count',
				'section'         => 'fitness_insight_layout',
				'label'           => __( 'Show tag count', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('fitness_insight_single_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_single_tag_icon',array(
		'label'	=> __('tag Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_layout',
		'setting'	=> 'fitness_insight_single_tag_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_single_post_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_single_post_tag',
			array(
				'settings'        => 'fitness_insight_single_post_tag',
				'section'         => 'fitness_insight_layout',
				'label'           => __( 'Show Tags', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_single_post_tag', array(
		'selector' => '.single-tags',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_single_post_tag',
	) );
	$wp_customize->add_setting('fitness_insight_similar_post',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_similar_post',
			array(
				'settings'        => 'fitness_insight_similar_post',
				'section'         => 'fitness_insight_layout',
				'label'           => __( 'Show Similar post', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('fitness_insight_similar_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('fitness_insight_similar_text',array(
		'label' => esc_html__('Similar Post Heading','fitness-insight'),
		'section' => 'fitness_insight_layout',
		'setting' => 'fitness_insight_similar_text',
		'type'    => 'text'
	));
	$wp_customize->add_section('fitness_insight_archieve_post_layot',array(
        'title' => __('Archieve-Post Layout', 'fitness-insight'),
        'panel' => 'fitness_insight_post_panel',
    ) );
	$wp_customize->add_setting( 'fitness_insight_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'fitness-insight' ),
		'section'     => 'fitness_insight_archieve_post_layot',
		'settings'    => 'fitness_insight_section_archive_post_heading',
	) ) );
    $wp_customize->add_setting( 'fitness_insight_post_option',
		array(
			'default' => 'right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Fitness_Insight_Radio_Image_Control( $wp_customize, 'fitness_insight_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Post Page Layout', 'fitness-insight' ),
			'section' => 'fitness_insight_archieve_post_layot',
			'choices' => array(
				'right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'fitness-insight' )
				),
				'left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'fitness-insight' )
				),
				'one_column' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'fitness-insight' )
				),
				'three_column' => array(
					'image' => get_template_directory_uri().'/assets/images/3column.jpg',
					'name' => __( 'Three Column', 'fitness-insight' )
				),
				'four_column' => array(
					'image' => get_template_directory_uri().'/assets/images/4column.jpg',
					'name' => __( 'Four Column', 'fitness-insight' )
				),
				'grid_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
					'name' => __( 'Grid-Right-Sidebar Layout', 'fitness-insight' )
				),
				'grid_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-left.png',
					'name' => __( 'Grid-Left-Sidebar Layout', 'fitness-insight' )
				),
				'grid_post' => array(
					'image' => get_template_directory_uri().'/assets/images/grid.jpg',
					'name' => __( 'Grid Layout', 'fitness-insight' )
				)
			)
		)
	) );
	$wp_customize->add_setting( 'fitness_insight_grid_column',
		array(
			'default' => '3_column',
			'transport' => 'refresh',
			'sanitize_callback' => 'fitness_insight_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Fitness_Insight_Text_Radio_Button_Custom_Control( $wp_customize, 'fitness_insight_grid_column',
		array(
			'type' => 'select',
			'label' => esc_html__('Grid Post Per Row','fitness-insight'),
			'section' => 'fitness_insight_archieve_post_layot',
			'choices' => array(
				'1_column' => __('1','fitness-insight'),
	            '2_column' => __('2','fitness-insight'),
	            '3_column' => __('3','fitness-insight'),
	            '4_column' => __('4','fitness-insight'),
			)
		)
	) );
	$wp_customize->add_setting('archieve_post_order', array(
        'default' => array('title', 'image', 'meta','excerpt','btn'),
        'sanitize_callback' => 'fitness_insight_sanitize_sortable',
    ));
    $wp_customize->add_control(new Fitness_Insight_Control_Sortable($wp_customize, 'archieve_post_order', array(
    	'label' => esc_html__('Post Order', 'fitness-insight'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'fitness-insight') ,
        'section' => 'fitness_insight_archieve_post_layot',
        'choices' => array(
            'title' => __('title', 'fitness-insight') ,
            'image' => __('media', 'fitness-insight') ,
            'meta' => __('meta', 'fitness-insight') ,
            'excerpt' => __('excerpt', 'fitness-insight') ,
            'btn' => __('Read more', 'fitness-insight') ,
        ) ,
    )));
	$wp_customize->add_setting('fitness_insight_post_excerpt',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Fitness_Insight_Slider_Custom_Control( $wp_customize, 'fitness_insight_post_excerpt',array(
		'label' => esc_html__( 'Excerpt Limit','fitness-insight' ),
		'section'=> 'fitness_insight_archieve_post_layot',
		'settings'=>'fitness_insight_post_excerpt',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('fitness_insight_read_more_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('fitness_insight_read_more_text',array(
		'label' => esc_html__('Read More Text','fitness-insight'),
		'section' => 'fitness_insight_archieve_post_layot',
		'setting' => 'fitness_insight_read_more_text',
		'type'    => 'text'
	));
	$wp_customize->add_setting('fitness_insight_read_more_icon',array(
		'default'	=> 'fas fa-arrow-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_read_more_icon',array(
		'label'	=> __('Read More Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_archieve_post_layot',
		'setting'	=> 'fitness_insight_read_more_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_date',
			array(
				'settings'        => 'fitness_insight_date',
				'section'         => 'fitness_insight_archieve_post_layot',
				'label'           => __( 'Show Date', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_date', array(
		'selector' => '.date-box',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_date',
	) );
	$wp_customize->add_setting('fitness_insight_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_date_icon',array(
		'label'	=> __('date Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_archieve_post_layot',
		'setting'	=> 'fitness_insight_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_admin',
			array(
				'settings'        => 'fitness_insight_admin',
				'section'         => 'fitness_insight_archieve_post_layot',
				'label'           => __( 'Show Author/Admin', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_admin',
	) );
	$wp_customize->add_setting('fitness_insight_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_author_icon',array(
		'label'	=> __('Author Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_archieve_post_layot',
		'setting'	=> 'fitness_insight_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_comment',
			array(
				'settings'        => 'fitness_insight_comment',
				'section'         => 'fitness_insight_archieve_post_layot',
				'label'           => __( 'Show Comment', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_comment',
	) );
	$wp_customize->add_setting('fitness_insight_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_comment_icon',array(
		'label'	=> __('comment Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_archieve_post_layot',
		'setting'	=> 'fitness_insight_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_tag',
			array(
				'settings'        => 'fitness_insight_tag',
				'section'         => 'fitness_insight_archieve_post_layot',
				'label'           => __( 'Show tag count', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_tag', array(
		'selector' => '.tags',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_tag',
	) );
	$wp_customize->add_setting('fitness_insight_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_tag_icon',array(
		'label'	=> __('tag Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_archieve_post_layot',
		'setting'	=> 'fitness_insight_tag_icon',
		'type'		=> 'icon'
	)));

	// header-image
	$wp_customize->add_setting( 'fitness_insight_section_header_image_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_header_image_heading', array(
		'label'       => esc_html__( 'Header Image Settings', 'fitness-insight' ),
		'section'     => 'header_image',
		'settings'    => 'fitness_insight_section_header_image_heading',
		'priority'    =>'1',
	) ) );

	$wp_customize->add_setting('fitness_insight_show_header_image',array(
        'default' => 'on',
        'sanitize_callback' => 'fitness_insight_sanitize_choices'
	));
	$wp_customize->add_control('fitness_insight_show_header_image',array(
        'type' => 'select',
        'label' => __('Select Option','fitness-insight'),
        'section' => 'header_image',
        'choices' => array(
            'on' => __('With Header Image','fitness-insight'),
            'off' => __('Without Header Image','fitness-insight'),
        ),
	) );

	// breadcrumb 
	$wp_customize->add_section('fitness_insight_breadcrumb_settings',array(
        'title' => __('Breadcrumb Settings', 'fitness-insight'),
        'priority' => 4
    ) );
	$wp_customize->add_setting( 'fitness_insight_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_breadcrumb_heading', array(
		'label'       => esc_html__( ' Theme Breadcrumb Settings', 'fitness-insight' ),
		'section'     => 'fitness_insight_breadcrumb_settings',
		'settings'    => 'fitness_insight_section_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'fitness_insight_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_enable_breadcrumb',
			array(
				'settings'        => 'fitness_insight_enable_breadcrumb',
				'section'         => 'fitness_insight_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('fitness_insight_breadcrumb_separator', array(
        'default' => ' / ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('fitness_insight_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'fitness-insight'),
        'section' => 'fitness_insight_breadcrumb_settings',
        'type' => 'text',
    ));
	$wp_customize->add_setting( 'fitness_insight_single_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_single_breadcrumb_heading', array(
		'label'       => esc_html__( 'Single post & Page', 'fitness-insight' ),
		'section'     => 'fitness_insight_breadcrumb_settings',
		'settings'    => 'fitness_insight_single_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'fitness_insight_single_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_single_enable_breadcrumb',
			array(
				'settings'        => 'fitness_insight_single_enable_breadcrumb',
				'section'         => 'fitness_insight_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting( 'fitness_insight_woocommerce_breadcrumb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_woocommerce_breadcrumb_heading', array(
			'label'       => esc_html__( 'Woocommerce Breadcrumb', 'fitness-insight' ),
			'section'     => 'fitness_insight_breadcrumb_settings',
			'settings'    => 'fitness_insight_woocommerce_breadcrumb_heading',
		) ) );
		$wp_customize->add_setting(
			'fitness_insight_woocommerce_enable_breadcrumb',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Fitness_Insight_Customizer_Customcontrol_Switch(
				$wp_customize,
				'fitness_insight_woocommerce_enable_breadcrumb',
				array(
					'settings'        => 'fitness_insight_woocommerce_enable_breadcrumb',
					'section'         => 'fitness_insight_breadcrumb_settings',
					'label'           => __( 'Show Breadcrumb', 'fitness-insight' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'fitness-insight' ),
						'off'    => __( 'Off', 'fitness-insight' ),
					),
					'active_callback' => '',
				)
			)
		);
		$wp_customize->add_setting('woocommerce_breadcrumb_separator', array(
	        'default' => ' / ',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_breadcrumb_separator', array(
	        'label' => __('Breadcrumb Separator', 'fitness-insight'),
	        'section' => 'fitness_insight_breadcrumb_settings',
	        'type' => 'text',
	    ));
	}

	// woocommerce
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_section('fitness_insight_theme_woocommerce_settings',array(
	        'title' => __('WooCommerce Settings', 'fitness-insight'),
	        'priority'       => 4,
	    ) );
		$wp_customize->add_setting( 'fitness_insight_section_shoppage_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_shoppage_heading', array(
			'label'       => esc_html__( 'Sidebar Settings', 'fitness-insight' ),
			'section'     => 'fitness_insight_theme_woocommerce_settings',
			'settings'    => 'fitness_insight_section_shoppage_heading',
		) ) );
		$wp_customize->add_setting( 'fitness_insight_shop_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Fitness_Insight_Radio_Image_Control( $wp_customize, 'fitness_insight_shop_page_sidebar',
			array(
				'type'=>'select',
				'label' => __( 'Show Shop Page Sidebar', 'fitness-insight' ),
				'section'     => 'fitness_insight_theme_woocommerce_settings',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'fitness-insight' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'fitness-insight' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'fitness-insight' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'fitness_insight_wocommerce_single_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Fitness_Insight_Radio_Image_Control( $wp_customize, 'fitness_insight_wocommerce_single_page_sidebar',
			array(
				'type'=>'select',
				'label'           => __( 'Show Single Product Page Sidebar', 'fitness-insight' ),
				'section'     => 'fitness_insight_theme_woocommerce_settings',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'fitness-insight' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'fitness-insight' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'fitness-insight' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'fitness_insight_section_archieve_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_archieve_product_heading', array(
			'label'       => esc_html__( 'Archieve Product Settings', 'fitness-insight' ),
			'section'     => 'fitness_insight_theme_woocommerce_settings',
			'settings'    => 'fitness_insight_section_archieve_product_heading',
		) ) );
		$wp_customize->add_setting('fitness_insight_archieve_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'fitness_insight_sanitize_choices'
		));
		$wp_customize->add_control('fitness_insight_archieve_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','fitness-insight'),
	        'section' => 'fitness_insight_theme_woocommerce_settings',
	        'choices' => array(
	            '1' => __('One Column','fitness-insight'),
	            '2' => __('Two Column','fitness-insight'),
	            '3' => __('Three Column','fitness-insight'),
	            '4' => __('four Column','fitness-insight'),
	            '5' => __('Five Column','fitness-insight'),
	            '6' => __('Six Column','fitness-insight'),
	        ),
		) );
		$wp_customize->add_setting( 'fitness_insight_archieve_shop_perpage', array(
			'default'              => 6,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'fitness_insight_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'fitness_insight_archieve_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','fitness-insight' ),
			'section'     => 'fitness_insight_theme_woocommerce_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 30,
			),
		) );
		$wp_customize->add_setting( 'fitness_insight_section_related_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_related_heading', array(
			'label'       => esc_html__( 'Related Product Settings', 'fitness-insight' ),
			'section'     => 'fitness_insight_theme_woocommerce_settings',
			'settings'    => 'fitness_insight_section_related_heading',
		) ) );
		$wp_customize->add_setting('woocommerce_related_products_heading', array(
	        'default' => 'Related products',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_related_products_heading', array(
	        'label' => __('Related Products Heading', 'fitness-insight'),
	        'section' => 'fitness_insight_theme_woocommerce_settings',
	        'type' => 'text',
	    ));
		$wp_customize->add_setting('fitness_insight_related_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'fitness_insight_sanitize_choices'
		));
		$wp_customize->add_control('fitness_insight_related_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','fitness-insight'),
	        'section' => 'fitness_insight_theme_woocommerce_settings',
	        'choices' => array(
	            '1' => __('One Column','fitness-insight'),
	            '2' => __('Two Column','fitness-insight'),
	            '3' => __('Three Column','fitness-insight'),
	            '4' => __('four Column','fitness-insight'),
	            '5' => __('Five Column','fitness-insight'),
	            '6' => __('Six Column','fitness-insight'),
	        ),
		) );
		$wp_customize->add_setting( 'fitness_insight_related_shop_perpage', array(
			'default'              => 3,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'fitness_insight_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'fitness_insight_related_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','fitness-insight' ),
			'section'     => 'fitness_insight_theme_woocommerce_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 10,
			),
		) );
		$wp_customize->add_setting(
			'fitness_insight_related_product',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(new Fitness_Insight_Customizer_Customcontrol_Switch($wp_customize,'fitness_insight_related_product',
			array(
				'settings'        => 'fitness_insight_related_product',
				'section'         => 'fitness_insight_theme_woocommerce_settings',
				'label'           => __( 'Show Related Products', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		));
	}
	
	// mobile width
	$wp_customize->add_section('fitness_insight_mobile_options',array(
        'title' => __('Mobile Media settings', 'fitness-insight'),
        'priority' => 4,
    ) );
    $wp_customize->add_setting( 'fitness_insight_section_mobile_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_mobile_heading', array(
		'label'       => esc_html__( 'Mobile Media settings', 'fitness-insight' ),
		'section'     => 'fitness_insight_mobile_options',
		'settings'    => 'fitness_insight_section_mobile_heading',
	) ) );
	$wp_customize->add_setting(
		'fitness_insight_slider_button_mobile_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_slider_button_mobile_show_hide',
			array(
				'settings'        => 'fitness_insight_slider_button_mobile_show_hide',
				'section'         => 'fitness_insight_mobile_options',
				'label'           => __( 'Show Slider Button', 'fitness-insight' ),
				'description' => __('Control wont function if the button is off in the main slider settings.', 'fitness-insight') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'fitness_insight_scroll_enable_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_scroll_enable_mobile',
			array(
				'settings'        => 'fitness_insight_scroll_enable_mobile',
				'section'         => 'fitness_insight_mobile_options',
				'label'           => __( 'Show Scroll Top', 'fitness-insight' ),
				'description' => __('Control wont function if scroll-top is off in the main settings.', 'fitness-insight') ,					
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'fitness_insight_section_mobile_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_mobile_breadcrumb_heading', array(
		'label'       => esc_html__( 'Mobile Breadcrumb settings', 'fitness-insight' ),
		'description' => __('Controls wont function if the breadcrumb is off in the main breadcrumb settings.', 'fitness-insight') ,
		'section'     => 'fitness_insight_mobile_options',
		'settings'    => 'fitness_insight_section_mobile_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'fitness_insight_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_enable_breadcrumb_mobile',
			array(
				'settings'        => 'fitness_insight_enable_breadcrumb_mobile',
				'section'         => 'fitness_insight_mobile_options',
				'label'           => __( 'Theme Breadcrumb', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'fitness_insight_single_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_single_enable_breadcrumb_mobile',
			array(
				'settings'        => 'fitness_insight_single_enable_breadcrumb_mobile',
				'section'         => 'fitness_insight_mobile_options',
				'label'           => __( 'Single Post & Page', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_setting(
			'fitness_insight_woocommerce_enable_breadcrumb_mobile',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Fitness_Insight_Customizer_Customcontrol_Switch(
				$wp_customize,
				'fitness_insight_woocommerce_enable_breadcrumb_mobile',
				array(
					'settings'        => 'fitness_insight_woocommerce_enable_breadcrumb_mobile',
					'section'         => 'fitness_insight_mobile_options',
					'label'           => __( 'wooCommerce Breadcrumb', 'fitness-insight' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'fitness-insight' ),
						'off'    => __( 'Off', 'fitness-insight' ),
					),
					'active_callback' => '',
				)
			)
		);
	}
	
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'fitness_insight_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'fitness_insight_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'fitness_insight_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'fitness_insight_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'fitness-insight' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'fitness-insight' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'fitness_insight_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'fitness_insight_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'fitness_insight_customize_register' );

function fitness_insight_customize_partial_blogname() {
	bloginfo( 'name' );
}

function fitness_insight_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function fitness_insight_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function fitness_insight_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('FITNESS_INSIGHT_PRO_LINK',__('https://www.ovationthemes.com/wordpress/fitness-wordpress-theme/','fitness-insight'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Fitness_Insight_Pro_Control')):
    class Fitness_Insight_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( FITNESS_INSIGHT_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE FITNESS PREMIUM','fitness-insight');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="fitness_insight_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">

            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('FITNESS PREMIUM - Features', 'fitness-insight'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'fitness-insight');?> </li>
                    <li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'fitness-insight');?> </li>
                   	<li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'fitness-insight');?> </li>
                   	<li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'fitness-insight');?> </li>
                   	<li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'fitness-insight');?> </li>
                   	<li class="upsell-fitness_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'fitness-insight');?> </li>
                </ul>
        	</div>
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( FITNESS_INSIGHT_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE FITNESS PREMIUM','fitness-insight');?> </a>
		    </div>
			<p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'fitness-insight'), '<a target="blank" href="https://wordpress.org/support/theme/fitness-insight/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;