<?php
/**
 * Theme functions and definitions
 *
 * @package fitness_life_coach
 */ 

//enque files
if ( ! function_exists( 'fitness_life_coach_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function fitness_life_coach_enqueue_styles() {
		wp_enqueue_style( 'fitness-life-coach-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'fitness-life-coach-style', get_stylesheet_directory_uri() . '/style.css', array( 'fitness-life-coach-style-parent' ), '1.0.0' );

		// Theme Customize CSS.
		require get_parent_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'fitness-life-coach-style',$fitness_insight_custom_style );

		require get_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'fitness-life-coach-style',$fitness_insight_custom_style );

		// blocks css
        wp_enqueue_style( 'fitness-life-coach-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'fitness-life-coach-style' ), '1.0' );
		
	}
endif;
add_action( 'wp_enqueue_scripts', 'fitness_life_coach_enqueue_styles', 99 );

//theme setup
function fitness_life_coach_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'fitness-life-coach-featured-image', 2000, 1200, true );
	add_image_size( 'fitness-life-coach-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fitness-life-coach' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css', fitness_insight_fonts_url() ) );
}
add_action( 'after_setup_theme', 'fitness_life_coach_setup' );

// widgets
function fitness_life_coach_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fitness-life-coach' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'fitness-life-coach' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'fitness-life-coach' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'fitness-life-coach' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'fitness-life-coach' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'fitness-life-coach' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'fitness-life-coach' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'fitness-life-coach' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'fitness-life-coach' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'fitness-life-coach' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'fitness-life-coach' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'fitness-life-coach' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'fitness-life-coach' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'fitness-life-coach' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'fitness_life_coach_widgets_init' );

// remove sections
function fitness_life_coach_customize_register() {
  	global $wp_customize;

  	$wp_customize->remove_section( 'fitness_insight_pro' );	

  	$wp_customize->remove_section( 'fitness_insight_theme_width_settings' );	

	$wp_customize->remove_setting( 'fitness_insight_mid_section_icon1' );
	$wp_customize->remove_control( 'fitness_insight_mid_section_icon1' );

	$wp_customize->remove_setting( 'fitness_insight_mid_section_icon2' );
	$wp_customize->remove_control( 'fitness_insight_mid_section_icon2' );

	$wp_customize->remove_setting( 'fitness_insight_mid_section_icon3' );
	$wp_customize->remove_control( 'fitness_insight_mid_section_icon3' );

	$wp_customize->remove_setting( 'fitness_insight_mid_section_icon4' );
	$wp_customize->remove_control( 'fitness_insight_mid_section_icon4' );

	$wp_customize->remove_setting('fitness_insight_footer_text');
	$wp_customize->remove_control('fitness_insight_footer_text');
	
	$wp_customize->remove_setting('fitness_insight_slider_excerpt_show_hide');
	$wp_customize->remove_control('fitness_insight_slider_excerpt_show_hide');

}
add_action( 'customize_register', 'fitness_life_coach_customize_register', 11 );

function fitness_life_coach_sanitize_dropdown_pages( $fitness_life_coach_page_id, $setting ) {
	$fitness_life_coach_page_id = absint( $fitness_life_coach_page_id );
	return ( 'publish' == get_post_status( $fitness_life_coach_page_id ) ? $fitness_life_coach_page_id : $setting->default );
}

// customizer
function fitness_life_coach_customize( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

	require get_theme_file_path( 'inc/custom-control.php' );

	// pro section
	$wp_customize->add_section('fitness_life_coach_pro', array(
		'title'    => __('UPGRADE FITNESS LIFE PREMIUM', 'fitness-life-coach'),
		'priority' => 1,
	));
	$wp_customize->add_setting('fitness_life_coach_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Fitness_Life_Coach_Pro_Control($wp_customize, 'fitness_life_coach_pro', array(
		'label'    => __('FITNESS LIFE PREMIUM', 'fitness-life-coach'),
		'section'  => 'fitness_life_coach_pro',
		'settings' => 'fitness_life_coach_pro',
		'priority' => 1,
	)));

	//slider
	$wp_customize->add_setting(
		'fitness_life_coach_slider_excerpt_show_hide',
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
		new Fitness_Life_Coach_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_life_coach_slider_excerpt_show_hide',
			array(
				'settings'        => 'fitness_life_coach_slider_excerpt_show_hide',
				'section'         => 'fitness_insight_slider_section',
				'label'           => __( 'Show Hide excerpt', 'fitness-life-coach' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-life-coach' ),
					'off'    => __( 'Off', 'fitness-life-coach' ),
				),
			)
		)
	);

	// About Us Section
	$wp_customize->add_section( 'fitness_life_coach_about_us_section' , array(
    	'title'      => __( 'About Us Settings', 'fitness-life-coach' ),
		'priority'   => 4,
		'panel' => 'fitness_insight_custompage_panel',
	) );
	$wp_customize->add_setting( 'fitness_life_coach_about_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Fitness_Life_Coach_Customizer_Customcontrol_Section_Heading( $wp_customize, 'fitness_life_coach_about_heading', array(
		'label'       => esc_html__( 'About Us Settings', 'fitness-life-coach' ),
		'section'     => 'fitness_life_coach_about_us_section',
		'settings'    => 'fitness_life_coach_about_heading',
	) ) );
	$wp_customize->add_setting(
		'fitness_life_coach_about_us_show_hide',
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
		new Fitness_Life_Coach_Customizer_Customcontrol_Switch(
			$wp_customize,
			'fitness_life_coach_about_us_show_hide',
			array(
				'settings'        => 'fitness_life_coach_about_us_show_hide',
				'section'         => 'fitness_life_coach_about_us_section',
				'label'           => __( 'Check To Show Section', 'fitness-life-coach' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'fitness-life-coach' ),
					'off'    => __( 'Off', 'fitness-life-coach' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('fitness_life_coach_about_us_settigs',array(
		'sanitize_callback' => 'fitness_life_coach_sanitize_dropdown_pages',
	));
	$wp_customize->add_control('fitness_life_coach_about_us_settigs',array(
		'type'    => 'dropdown-pages',
		'label' => __('Select Page','fitness-life-coach'),
		'section' => 'fitness_life_coach_about_us_section',
	));

	//footer
	$wp_customize->add_setting('fitness_life_coach_footer_text',array(
		'default'	=> 'Life Coach WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_life_coach_footer_text',array(
		'label'	=> esc_html__('Copyright Text','fitness-life-coach'),
		'section'	=> 'fitness_insight_footer_copyright',
		'type'		=> 'textarea'
	));
	$wp_customize->selective_refresh->add_partial( 'fitness_life_coach_footer_text', array(
		'selector' => '.site-info a',
		'render_callback' => 'fitness_insight_customize_partial_fitness_life_coach_footer_text',
	) );
}
add_action( 'customize_register', 'fitness_life_coach_customize' );

// comments
function fitness_life_coach_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'fitness_life_coach_enqueue_comments_reply' );

// Footer Text
function fitness_life_coach_copyright_link() {
    $footer_text = get_theme_mod('fitness_insight_footer_text', esc_html__('Life Coach WordPress Theme', 'fitness-life-coach'));
    $credit_link = esc_url('https://www.ovationthemes.com/wordpress/free-life-coach-wordpress-theme/');

    echo '<a href="' . $credit_link . '" target="_blank">' . esc_html($footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'fitness-life-coach') . '</span></a>';
}

define('FITNESS_LIFE_COACH_PRO_LINK',__('https://www.ovationthemes.com/wordpress/fitness-coach-wordpress-theme/','fitness-life-coach'));

if ( ! defined( 'FITNESS_INSIGHT_SUPPORT' ) ) {
define('FITNESS_INSIGHT_SUPPORT',__('https://wordpress.org/support/theme/fitness-life-coach/','fitness-life-coach'));
}
if ( ! defined( 'FITNESS_INSIGHT_REVIEW' ) ) {
define('FITNESS_INSIGHT_REVIEW',__('https://wordpress.org/support/theme/fitness-life-coach/reviews/','fitness-life-coach'));
}
if ( ! defined( 'FITNESS_INSIGHT_LIVE_DEMO' ) ) {
define('FITNESS_INSIGHT_LIVE_DEMO',__('https://www.ovationthemes.com/demos/fitness-life-coach/','fitness-life-coach'));
}
if ( ! defined( 'FITNESS_INSIGHT_BUY_PRO' ) ) {
define('FITNESS_INSIGHT_BUY_PRO',__('https://www.ovationthemes.com/wordpress/fitness-coach-wordpress-theme/','fitness-life-coach'));
}
if ( ! defined( 'FITNESS_INSIGHT_PRO_DOC' ) ) {
define('FITNESS_INSIGHT_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-fitness-life-coach-pro-doc/','fitness-life-coach'));
}
if ( ! defined( 'FITNESS_INSIGHT_FREE_DOC' ) ) {
define('FITNESS_INSIGHT_FREE_DOC',__('https://ovationthemes.com/docs/ot-fitness-life-coach-free-doc','fitness-life-coach'));
}
if ( ! defined( 'FITNESS_INSIGHT_THEME_NAME' ) ) {
define('FITNESS_INSIGHT_THEME_NAME',__('Premium Fitness Theme','fitness-life-coach'));
}

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Fitness_Life_Coach_Pro_Control')):
    class Fitness_Life_Coach_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( FITNESS_LIFE_COACH_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE FITNESS LIFE PREMIUM','fitness-life-coach');?> </a>
            </div>
            <div class="col-md">
                <img class="fitness_life_coach_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('FITNESS LIFE PREMIUM - Features', 'fitness-life-coach'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'fitness-life-coach');?> </li>
                    <li class="upsell-fitness_life_coach"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'fitness-life-coach');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( FITNESS_LIFE_COACH_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE FITNESS LIFE COACH PREMIUM','fitness-life-coach');?> </a>
            </div>
        </label>
    <?php } }
endif;