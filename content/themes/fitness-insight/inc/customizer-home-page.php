<?php
/**
 * Fitness Insight: Customizer-home-page
 *
 * @subpackage Fitness Insight
 * @since 1.0
 */
	
	//  Home Page Panel
	$wp_customize->add_panel( 'fitness_insight_custompage_panel', array(
		'title' => esc_html__( 'Custom Page Settings', 'fitness-insight' ),
		'priority' => 2,
	));
	// Top Header
    $wp_customize->add_section('fitness_insight_top',array(
        'title' => __('Contact info', 'fitness-insight'),
        'priority'       => 3,
        'panel' => 'fitness_insight_custompage_panel',
    ) );
    $wp_customize->add_setting( 'fitness_insight_section_contact_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_contact_heading', array(
		'label'       => esc_html__( 'Contact Settings', 'fitness-insight' ),	
		'description' => __( 'Add contact info in the below feilds', 'fitness-insight' ),		
		'section'     => 'fitness_insight_top',
		'settings'    => 'fitness_insight_section_contact_heading',
	) ) );
    $wp_customize->add_setting('fitness_insight_call_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_insight_call_text',array(
		'label' => esc_html__('Add Text','fitness-insight'),
		'section' => 'fitness_insight_top',
		'setting' => 'fitness_insight_call_text',
		'type'    => 'text',
	));
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_call_text', array(
		'selector' => '.top_header span i',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_call_text',
	) );
	$wp_customize->add_setting('fitness_insight_call',array(
		'default' => '',
		'sanitize_callback' => 'fitness_insight_sanitize_phone_number'
	));
	$wp_customize->add_control('fitness_insight_call',array(
		'label' => esc_html__('Add Phone Number','fitness-insight'),
		'section' => 'fitness_insight_top',
		'setting' => 'fitness_insight_call',
		'type'    => 'text',
	));
	$wp_customize->add_setting('fitness_insight_call_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_call_icon',array(
		'label'	=> __('Add Call Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_top',
		'setting'	=> 'fitness_insight_call_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('fitness_insight_email_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_insight_email_text',array(
		'label' => esc_html__('Add Text','fitness-insight'),
		'section' => 'fitness_insight_top',
		'setting' => 'fitness_insight_email_text',
		'type'    => 'text',
	));
	$wp_customize->add_setting('fitness_insight_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('fitness_insight_email',array(
		'label' => esc_html__('Add Email Address','fitness-insight'),
		'section' => 'fitness_insight_top',
		'setting' => 'fitness_insight_email',
		'type'    => 'text',
	));
	$wp_customize->add_setting('fitness_insight_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_email_icon',array(
		'label'	=> __('Add Email Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_top',
		'setting'	=> 'fitness_insight_email_icon',
		'type'		=> 'icon'
	)));

	// Social Media
    $wp_customize->add_section('fitness_insight_urls',array(
        'title' => __('Social Media', 'fitness-insight'),
        'priority'       => 3,
        'panel' => 'fitness_insight_custompage_panel',
    ) );
    $wp_customize->add_setting( 'fitness_insight_section_social_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_social_heading', array(
		'label'       => esc_html__( 'Social Media Settings', 'fitness-insight' ),
		'description' => __( 'Add social media links in the below feilds', 'fitness-insight' ),			
		'section'     => 'fitness_insight_urls',
		'settings'    => 'fitness_insight_section_social_heading',
	) ) );
	$wp_customize->add_setting(
		'fitness_insight_social_enable',
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
			'fitness_insight_social_enable',
			array(
				'settings'        => 'fitness_insight_social_enable',
				'section'         => 'fitness_insight_urls',
				'label'           => __( 'Check to show social fields', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'fitness_insight_section_twitter_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_twitter_heading', array(
		'label'       => esc_html__( 'Twittter Settings', 'fitness-insight' ),		
		'section'     => 'fitness_insight_urls',
		'settings'    => 'fitness_insight_section_twitter_heading',
	) ) );
	$wp_customize->add_setting('fitness_insight_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_twitter_icon',array(
		'label'	=> __('Add Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_urls',
		'setting'	=> 'fitness_insight_twitter_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_twitter', array(
		'selector' => '.social-icon a i',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_twitter',
	) );
	$wp_customize->add_setting('fitness_insight_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('fitness_insight_twitter',array(
		'label' => esc_html__('Add URL','fitness-insight'),
		'section' => 'fitness_insight_urls',
		'setting' => 'fitness_insight_twitter',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'fitness_insight_header_twt_target',
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
			'fitness_insight_header_twt_target',
			array(
				'settings'        => 'fitness_insight_header_twt_target',
				'section'         => 'fitness_insight_urls',
				'label'           => __( 'Open link in a new tab', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'fitness_insight_section_limkedin_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_limkedin_heading', array(
		'label'       => esc_html__( 'Linkedin Settings', 'fitness-insight' ),		
		'section'     => 'fitness_insight_urls',
		'settings'    => 'fitness_insight_section_limkedin_heading',
	) ) );
	$wp_customize->add_setting('fitness_insight_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_linkedin_icon',array(
		'label'	=> __('Add Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_urls',
		'setting'	=> 'fitness_insight_linkedin_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_linkedin',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('fitness_insight_linkedin',array(
		'label' => esc_html__('Add URL','fitness-insight'),
		'section' => 'fitness_insight_urls',
		'setting' => 'fitness_insight_linkedin',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'fitness_insight_header_linkedin_target',
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
			'fitness_insight_header_linkedin_target',
			array(
				'settings'        => 'fitness_insight_header_linkedin_target',
				'section'         => 'fitness_insight_urls',
				'label'           => __( 'Open link in a new tab', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'fitness_insight_section_youtube_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_youtube_heading', array(
		'label'       => esc_html__( 'Youtube Settings', 'fitness-insight' ),		
		'section'     => 'fitness_insight_urls',
		'settings'    => 'fitness_insight_section_youtube_heading',
	) ) );
	$wp_customize->add_setting('fitness_insight_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_youtube_icon',array(
		'label'	=> __('Add Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_urls',
		'setting'	=> 'fitness_insight_youtube_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('fitness_insight_youtube',array(
		'label' => esc_html__('Add URL','fitness-insight'),
		'section' => 'fitness_insight_urls',
		'setting' => 'fitness_insight_youtube',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'fitness_insight_header_youtube_target',
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
			'fitness_insight_header_youtube_target',
			array(
				'settings'        => 'fitness_insight_header_youtube_target',
				'section'         => 'fitness_insight_urls',
				'label'           => __( 'Open link in a new tab', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'fitness_insight_section_instagram_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_instagram_heading', array(
		'label'       => esc_html__( 'Instagram Settings', 'fitness-insight' ),		
		'section'     => 'fitness_insight_urls',
		'settings'    => 'fitness_insight_section_instagram_heading',
	) ) );
	$wp_customize->add_setting('fitness_insight_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fitness_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'fitness_insight_instagram_icon',array(
		'label'	=> __('Add Icon','fitness-insight'),
		'transport' => 'refresh',
		'section'	=> 'fitness_insight_urls',
		'setting'	=> 'fitness_insight_instagram_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('fitness_insight_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('fitness_insight_instagram',array(
		'label' => esc_html__('Add URL','fitness-insight'),
		'section' => 'fitness_insight_urls',
		'setting' => 'fitness_insight_instagram',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'fitness_insight_header_instagram_target',
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
			'fitness_insight_header_instagram_target',
			array(
				'settings'        => 'fitness_insight_header_instagram_target',
				'section'         => 'fitness_insight_urls',
				'label'           => __( 'Open link in a new tab', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'fitness_insight_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'fitness-insight' ),
    	'priority'   => 3,
    	'panel' => 'fitness_insight_custompage_panel',
	) );
	$wp_customize->add_setting( 'fitness_insight_section_slide_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'fitness-insight' ),
		'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'fitness-insight' ),		
		'section'     => 'fitness_insight_slider_section',
		'settings'    => 'fitness_insight_section_slide_heading',
		'priority'    =>1,
	) ) );

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst_sls[]= __('Select','fitness-insight');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('fitness_insight_post_setting'.$i,array(
			'sanitize_callback' => 'fitness_insight_sanitize_choices',
		));
		$wp_customize->add_control('fitness_insight_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','fitness-insight'),
			'section' => 'fitness_insight_slider_section',
			'priority'    =>1,
		));
		$wp_customize->selective_refresh->add_partial( 'fitness_insight_post_setting'.$i, array(
			'selector' => '.carousel-caption h2',
			'render_callback' => 'fitness_insight_customize_partial_fitness_insight_post_setting'.$i,
		) );
	}
	wp_reset_postdata();

	$wp_customize->add_setting(
		'fitness_insight_slider_excerpt_show_hide',
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
			'fitness_insight_slider_excerpt_show_hide',
			array(
				'settings'        => 'fitness_insight_slider_excerpt_show_hide',
				'section'         => 'fitness_insight_slider_section',
				'label'           => __( 'Show Hide excerpt', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
			)
		)
	);
	$wp_customize->add_setting('fitness_insight_slider_excerpt_count',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'fitness_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Fitness_Insight_Slider_Custom_Control( $wp_customize, 'fitness_insight_slider_excerpt_count',array(
		'label' => esc_html__( 'Excerpt Limit','fitness-insight' ),
		'section'=> 'fitness_insight_slider_section',
		'settings'=>'fitness_insight_slider_excerpt_count',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));
	$wp_customize->add_setting(
		'fitness_insight_slider_button_show_hide',
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
			'fitness_insight_slider_button_show_hide',
			array(
				'settings'        => 'fitness_insight_slider_button_show_hide',
				'section'         => 'fitness_insight_slider_section',
				'label'           => __( 'Show Hide Button', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
			)
		)
	);
	$wp_customize->add_setting('fitness_insight_slider_read_more',array(
		'default' => 'GET STARTED',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('fitness_insight_slider_read_more',array(
		'label' => esc_html__('Button Text','fitness-insight'),
		'section' => 'fitness_insight_slider_section',
		'setting' => 'fitness_insight_slider_read_more',
		'type'    => 'text',
	));

	$wp_customize->add_setting( 'fitness_insight_slider_content_alignment',
		array(
			'default' => 'LEFT-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'fitness_insight_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Fitness_Insight_Text_Radio_Button_Custom_Control( $wp_customize, 'fitness_insight_slider_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Slider Content Alignment', 'fitness-insight' ),
			'section' => 'fitness_insight_slider_section',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','fitness-insight'),
	            'CENTER-ALIGN' => __('CENTER','fitness-insight'),
	            'RIGHT-ALIGN' => __('RIGHT','fitness-insight'),
			),
		)
	) );

	//Middle Section
	$wp_customize->add_section( 'fitness_insight_middle_section' , array(
    	'title'      => __( 'Services Settings', 'fitness-insight' ),
		'priority'   => 4,
		'panel' => 'fitness_insight_custompage_panel',
	) );
	$wp_customize->add_setting( 'fitness_insight_section_service_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_service_heading', array(
		'label'       => esc_html__( 'Services Settings', 'fitness-insight' ),
		'description' => __( 'Image Dimension ( 500 x 500 ) px', 'fitness-insight' ),		
		'section'     => 'fitness_insight_middle_section',
		'settings'    => 'fitness_insight_section_service_heading',
	) ) );
	$wp_customize->add_setting(
		'fitness_insight_service_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'fitness_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Fitness_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_insight_service_show_hide',
			array(
				'settings'        => 'fitness_insight_service_show_hide',
				'section'         => 'fitness_insight_middle_section',
				'label'           => __( 'Check To Show Section', 'fitness-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-insight' ),
					'off'    => __( 'Off', 'fitness-insight' ),
				),
				'active_callback' => '',
			)
		)
	);
	$args = array('numberposts' => -1); 
	$post_list = get_posts($args);
	$s = 0;	
	$pst_sls[]= __('Select','fitness-insight');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $s = 1; $s <= 4; $s++ ) {
		$wp_customize->add_setting('fitness_insight_mid_section_icon'.$s,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)); 
		$wp_customize->add_control('fitness_insight_mid_section_icon'.$s,array(
			'label' => esc_html__('Icon','fitness-insight'),
			'input_attrs' => array(
            	'placeholder' => __( 'fas fa-envelope','fitness-insight' ),
        	),
			'section' => 'fitness_insight_middle_section',
			'setting' => 'fitness_insight_mid_section_icon',
			'type'    => 'text'
		));
		$wp_customize->add_setting('fitness_insight_middle_sec_settigs'.$s,array(
			'sanitize_callback' => 'fitness_insight_sanitize_choices',
		));
		$wp_customize->add_control('fitness_insight_middle_sec_settigs'.$s,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','fitness-insight'),
			'section' => 'fitness_insight_middle_section',
		));
	}
	wp_reset_postdata();

	//Footer
    $wp_customize->add_section( 'fitness_insight_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'fitness-insight' ),
    	'priority'       => 6,
    	'panel' => 'fitness_insight_custompage_panel',
	) );
	$wp_customize->add_setting( 'fitness_insight_section_footer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Insight_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_insight_section_footer_heading', array(
		'label'       => esc_html__( 'Footer Settings', 'fitness-insight' ),		
		'section'     => 'fitness_insight_footer_copyright',
		'settings'    => 'fitness_insight_section_footer_heading',
	) ) );
    $wp_customize->add_setting('fitness_insight_footer_text',array(
		'default'	=> 'Fitness WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_insight_footer_text',array(
		'label'	=> esc_html__('Copyright Text','fitness-insight'),
		'section'	=> 'fitness_insight_footer_copyright',
		'type'		=> 'textarea'
	));
	$wp_customize->selective_refresh->add_partial( 'fitness_insight_footer_text', array(
		'selector' => '.site-info a',
		'render_callback' => 'fitness_insight_customize_partial_fitness_insight_footer_text',
	) );
	$wp_customize->add_setting( 'fitness_insight_footer_content_alignment',
		array(
			'default' => 'CENTER-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'fitness_insight_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Fitness_Insight_Text_Radio_Button_Custom_Control( $wp_customize, 'fitness_insight_footer_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Footer Content Alignment', 'fitness-insight' ),
			'section' => 'fitness_insight_footer_copyright',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','fitness-insight'),
	            'CENTER-ALIGN' => __('CENTER','fitness-insight'),
	            'RIGHT-ALIGN' => __('RIGHT','fitness-insight'),
			),
			'active_callback' => '',
		)
	) );
	$wp_customize->add_setting( 'fitness_insight_footer_widget',
		array(
			'default' => '4',
			'transport' => 'refresh',
			'sanitize_callback' => 'fitness_insight_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Fitness_Insight_Text_Radio_Button_Custom_Control( $wp_customize, 'fitness_insight_footer_widget',
		array(
			'type' => 'select',
			'label' => esc_html__('Footer Per Column','fitness-insight'),
			'section' => 'fitness_insight_footer_copyright',
			'choices' => array(
				'1' => __('1','fitness-insight'),
	            '2' => __('2','fitness-insight'),
	            '3' => __('3','fitness-insight'),
	            '4' => __('4','fitness-insight'),
			)
		)
	) );