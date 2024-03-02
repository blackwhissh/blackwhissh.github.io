<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php
        for ( $i = 1; $i <= 4; $i++ ) {
          $mod =  get_theme_mod( 'fitness_insight_post_setting' . $i );
          if ( 'page-none-selected' != $mod ) {
            $fitness_insight_slide_post[] = $mod;
          }
        }
        if( !empty($fitness_insight_slide_post) ) :
        $args = array(
          'post_type' =>array('post','page'),
          'post__in' => $fitness_insight_slide_post,
          'ignore_sticky_posts'  => true, // Exclude sticky posts by default
        );

        // Check if specific posts are selected
        if (empty($fitness_insight_slide_post) && is_sticky()) {
            $args['post__in'] = get_option('sticky_posts');
        }

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
      ?>
      <div class="carousel-inner" role="listbox">
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <?php }else { ?><div class="bg-color"></div> <?php } ?>
          <div class="carousel-caption">
            <h2><?php the_title();?></h2>
            <?php if( get_option('fitness_life_coach_slider_excerpt_show_hide',false) != 'off'){ ?>
              <p class="slider-excerpt"><?php echo wp_trim_words(get_the_content(), get_theme_mod('fitness_insight_slider_excerpt_count',30) );?></p>
            <?php } ?>
            <div class="slider-btn">
              <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('fitness_insight_slider_read_more',__('GET STARTED','fitness-life-coach'))); ?></a>
            </div>
          </div>
        </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
      <div class="no-postfound"></div>
        <?php endif;
      endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-double-left"></i><?php esc_html_e('PREV','fitness-life-coach'); ?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><?php esc_html_e('NEXT','fitness-life-coach'); ?><i class="fas fa-angle-double-right"></i></span>
        </a>
    </div>
    <div class="clearfix"></div>
  </section>

<?php if( get_option('fitness_life_coach_about_us_show_hide') == '1'){ ?>
  <?php if( get_theme_mod('fitness_life_coach_about_us_settigs') != ''){ ?>
    <section id="about-us" class="py-5">
      <div class="container">
        <div class="row">
          <?php
            $fitness_life_coach_mod =  get_theme_mod( 'fitness_life_coach_about_us_settigs');
            if ( 'page-none-selected' != $fitness_life_coach_mod ) {
              $fitness_insight_about_page[] = $fitness_life_coach_mod;
            }
            if( !empty($fitness_insight_about_page) ) :
            $fitness_life_coach_args = array(
              'post_type' =>array('page'),
              'post__in' => $fitness_insight_about_page,
            );

            $fitness_life_coach_query = new WP_Query( $fitness_life_coach_args );
            if ( $fitness_life_coach_query->have_posts() ) :
          ?>
          <?php  while ( $fitness_life_coach_query->have_posts() ) : $fitness_life_coach_query->the_post(); ?>
            <div class="col-lg-6 col-md-6 align-self-center"> 
              <div class="abt-img-border">
                <?php
                  if(has_post_thumbnail()) { ?>
                  <div class="abt-img-box first">
                    <?php the_post_thumbnail(); ?>
                  </div>
                <?php }?>
              </div>              
            </div>
            <div class="col-lg-6 col-md-6 align-self-center">              
              <h4 class="mb-4"><?php the_title();?></h4>
              <p class="mb-0"><?php echo wp_trim_words( get_the_content(),30 );?></p> 
              <div class="slider-btn">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('GET STARTED','fitness-life-coach'); ?></a>
            </div>            
            </div>
          <?php endwhile;
          wp_reset_postdata();?>
          <?php else : ?>
          <div class="no-postfound"></div>
            <?php endif;
          endif;?>
        </div>
      </div>
    </section>
  <?php }?>
<?php }?>

<?php if( get_option('fitness_insight_service_show_hide') == '1'){ ?>
  <?php if( get_theme_mod('fitness_insight_middle_sec_settigs1') != ''){ ?>
    <section id="middle-sec">
      <div class="row m-0">
        <?php
          for ( $mid_sec = 1; $mid_sec <= 4; $mid_sec++ ) {
            $mod =  get_theme_mod( 'fitness_insight_middle_sec_settigs'.$mid_sec );
            if ( 'page-none-selected' != $mod ) {
              $fitness_insight_post[] = $mod;
            }
          }
           if( !empty($fitness_insight_post) ) :
          $args = array(
            'post_type' =>array('post','page'),
            'post__in' => $fitness_insight_post,
            'ignore_sticky_posts'  => true, // Exclude sticky posts by default
          );

          // Check if specific posts are selected
          if (empty($fitness_insight_post) && is_sticky()) {
              $args['post__in'] = get_option('sticky_posts');
          }
            
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $mid_sec = 1;
        ?>
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 p-0">
            <div class="classes-box pt-3">
              <div class="row m-0">
                <div class="col-lg-6 col-md-6 col-sm-6 p-0 align-self-center">
                  <img src="<?php echo (the_post_thumbnail_url('full')); ?>"/>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 p-0 align-self-center">
                  <div class="classes-content-box">
                    <img src="<?php echo (the_post_thumbnail_url('full')); ?>"/>
                    <div class="classes-inner-box pl-3">
                      <h4><?php the_title();?></h4>
                      <hr>
                      <p><?php echo wp_trim_words( get_the_content(),30 );?></p>
                      <div class="slider-btn">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('GET STARTED','fitness-life-coach'); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php $mid_sec++; endwhile;
        wp_reset_postdata();?>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
      </div>
    </section>
  <?php }?>
<?php }?>
<section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>