<?php
/**
 * The header for our theme
 *
 * @subpackage Fitness Life Coach
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fitness-life-coach' ); ?></a>
	<?php if( get_option('fitness_insight_theme_loader',true) != 'off'){ ?>
		<?php $fitness_insight_loader_option = get_theme_mod( 'fitness_insight_loader_style','style_one');
		if($fitness_insight_loader_option == 'style_one'){ ?>
			<div id="preloader" class="circle">
				<div id="loader"></div>
			</div>
		<?php }
		else if($fitness_insight_loader_option == 'style_two'){ ?>
			<div id="preloader">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		<?php }?>
	<?php }?>
	<div id="page" class="site">
		<div class="top_header">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-8 align-self-center">
						<?php if( get_theme_mod('fitness_insight_call_text') != '' || get_theme_mod('fitness_insight_call') != ''){ ?>
							<span class="mr-3"><i class="<?php echo esc_attr(get_theme_mod('fitness_insight_call_icon','fas fa-phone')); ?> mr-2"></i><strong><?php echo esc_html(get_theme_mod('fitness_insight_call_text','')); ?></strong>: <?php echo esc_html(get_theme_mod('fitness_insight_call','')); ?></span>
						<?php }?>
						<?php if( get_theme_mod('fitness_insight_email_text') != '' || get_theme_mod('fitness_insight_email') != ''){ ?>
							<span><i class="<?php echo esc_attr(get_theme_mod('fitness_insight_email_icon','far fa-envelope')); ?> mr-2"></i><strong><?php echo esc_html(get_theme_mod('fitness_insight_email_text','')); ?></strong>: <?php echo esc_html(get_theme_mod('fitness_insight_email','')); ?></span>
						<?php }?>
					</div>
					<div class="col-lg-3 col-md-4 align-self-center">
						<?php if( get_option('fitness_insight_social_enable',false) != 'off'){ ?>
						<?php
				            $fitness_insight_header_twt_target = esc_attr(get_option('fitness_insight_header_twt_target','true'));
				            $fitness_insight_header_linkedin_target = esc_attr(get_option('fitness_insight_header_linkedin_target','true'));
				            $fitness_insight_header_youtube_target = esc_attr(get_option('fitness_insight_header_youtube_target','true'));
				            $fitness_insight_header_instagram_target = esc_attr(get_option('fitness_insight_header_instagram_target','true'));
				        ?> 
						<div class="links">
							<?php if( get_theme_mod('fitness_insight_twitter') != ''){ ?>
				            <a target="<?php echo $fitness_insight_header_twt_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('fitness_insight_twitter','')); ?>">
				              <i class="<?php echo esc_attr(get_theme_mod('fitness_insight_twitter_icon','fab fa-twitter')); ?>"></i>
				            </a>
				          <?php }?>
				          <?php if( get_theme_mod('fitness_insight_linkedin') != ''){ ?>
				            <a target="<?php echo $fitness_insight_header_linkedin_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('fitness_insight_linkedin','')); ?>">
				              <i class="<?php echo esc_attr(get_theme_mod('fitness_insight_linkedin_icon','fab fa-linkedin-in')); ?>"></i>
				            </a>
				          <?php }?>
				          <?php if( get_theme_mod('fitness_insight_youtube') != ''){ ?>
				            <a target="<?php echo $fitness_insight_header_youtube_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('fitness_insight_youtube','')); ?>">
				              <i class="<?php echo esc_attr(get_theme_mod('fitness_insight_youtube_icon','fab fa-youtube')); ?>"></i>
				            </a>
				          <?php }?>
				          <?php if( get_theme_mod('fitness_insight_instagram') != ''){ ?>
				            <a target="<?php echo $fitness_insight_header_instagram_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('fitness_insight_instagram','')); ?>">
				              <i class="<?php echo esc_attr(get_theme_mod('fitness_insight_instagram_icon','fab fa-instagram')); ?>"></i>
				            </a>
				          <?php }?>	
						</div>
						<?php  }?>
					</div>
				</div>
			</div>
		</div>
		<div class="wrap_figure py-3">
			<div class="fixed_header">
				<div class="container">
					<div class="row">
					<div class="col-lg-3 col-md-5 col-sm-4 col-9 align-self-center">
						<div class="logo">
					        <?php if ( has_custom_logo() ) : ?>
			            		<?php the_custom_logo(); ?>
				            <?php endif; ?>
			              	<?php $fitness_insight_blog_info = get_bloginfo( 'name' ); ?>
			              		<?php if( get_option('fitness_insight_logo_title',false) != 'off'){ ?>
					                <?php if ( ! empty( $fitness_insight_blog_info ) ) : ?>
					                  	<?php if ( is_front_page() && is_home() ) : ?>
					                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					                  	<?php else : ?>
				                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				                  		<?php endif; ?>
					                <?php endif; ?>
					            <?php }?>
				                <?php
			                  		$fitness_insight_description = get_bloginfo( 'description', 'display' );
				                  	if ( $fitness_insight_description || is_customize_preview() ) :
				                ?>
				                <?php if( get_option('fitness_insight_logo_text',true) != 'off'){ ?>
				                  	<p class="site-description">
				                    	<?php echo esc_html($fitness_insight_description); ?>
				                  	</p>
				                <?php } ?>
			              	<?php endif; ?>
					    </div>
					</div>
					<div class="col-lg-9 col-md-7 col-sm-8 col-3 align-self-center">
						<div class="menu_header">
							<div class="toggle-menu gb_menu">
								<button onclick="fitness_insight_gb_Menu_open()" class="gb_toggle"><i class="fas fa-ellipsis-h"></i><p><?php esc_html_e('Menu','fitness-life-coach'); ?></p></button>
							</div>
					   		<?php get_template_part('template-parts/navigation/navigation'); ?>
						</div>
					</div>
					</div>
				</div>	
			</div>
		</div>
	</div>