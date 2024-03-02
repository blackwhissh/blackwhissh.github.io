<?php
/**
 * Displays the site header.
 *
 * @package Kiddies
 */

$wrapper_classes = 'site-header theme-site-header';
$enable_header_bg_overlay = kiddies_get_option('enable_header_bg_overlay');
$header_style = kiddies_get_option('header_style');
$enable_top_bar = kiddies_get_option('enable_top_bar');
$header_template = str_replace('header_', '', $header_style);
$header_template = str_replace('_', '-', $header_template);
if (!empty(get_header_image())) {
    $wrapper_classes .= ' data-bg';
}
if ($enable_header_bg_overlay) {
    $wrapper_classes .= ' header-has-overlay';
}
?>

<?php 
if ($enable_top_bar) {
    get_template_part('template-parts/header/theme-topbar');
}
?>
    <header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" <?php if (!empty(get_header_image())) { ?> data-background="<?php echo esc_url(get_header_image()); ?>" <?php } ?> role="banner">
        <?php
        get_template_part('template-parts/header/styles/'.$header_template);
        ?>
    </header><!-- #masthead -->

<?php get_template_part('template-parts/header/components/header-offcanvas-widget'); ?>
<?php get_template_part('template-parts/header/components/header-offcanvas'); ?>
<?php get_template_part('template-parts/header/components/header-search'); ?>