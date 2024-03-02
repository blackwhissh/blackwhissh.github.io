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
            <div class="carousel-caption ">
            <div class="slider-inner">
              <h2><?php the_title();?></h2>
              <?php if( get_option('fitness_insight_slider_excerpt_show_hide',true) != 'off'){ ?>
                <p class="slider-excerpt mb-0"><?php echo wp_trim_words(get_the_content(), get_theme_mod('fitness_insight_slider_excerpt_count',30) );?></p>
              <?php } ?>
              <div class="home-btn">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('fitness_insight_slider_read_more',__('GET STARTED','fitness-insight'))); ?></a>
              </div>
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
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-double-left"></i><?php echo esc_html('PREV','fitness-insight'); ?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><?php echo esc_html('NEXT','fitness-insight'); ?><i class="fas fa-angle-double-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php if( get_option('fitness_insight_service_show_hide') == '1'){ ?>
    <section id="middle-sec">
      <div class="row m-0">
         <?php
      for ( $s = 1; $s <= 4; $s++ ) {
        $mod =  get_theme_mod( 'fitness_insight_middle_sec_settigs' . $s );
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
        $s = 1;
      ?>
       <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="col-lg-3 col-md-6 p-0">
        <div class="box">
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="outer-box">
            <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
          </div>
          <div class="box-content">
            <i class="<?php echo esc_html(get_theme_mod('fitness_insight_mid_section_icon'. $s)); ?>"></i>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
            <p><?php echo wp_trim_words( get_the_content(),8 );?></p>
          </div>
        </div>
      </div>
    <?php $s++; endwhile;
        wp_reset_postdata();?>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
      </div>
    </section>
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
