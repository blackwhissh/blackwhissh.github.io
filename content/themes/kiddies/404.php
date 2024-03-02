<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Magfinity
 */
get_header();
?>

    <section class="site-section site-error-section error-block-top">
        <div class="wrapper">
            <h1 class="entry-title entry-title-large"><?php esc_html_e('Dang', 'kiddies'); ?></h1>
            <div class="site-section-subtitle">
                <?php esc_html_e('No page found. Sorry about that, let\'s keep you moving.', 'kiddies'); ?>
            </div>
        </div>
    </section>
    <section class="site-section site-error-section error-block-middle">
        <div class="wrapper">
            <div class="column-row">
                <div class="column column-12">
                    <h2 class="entry-title entry-title-large"><?php esc_html_e('Maybe it’s out there, somewhere...', 'kiddies'); ?></h2>
                    <div class="entry-subtitle">
                        <?php esc_html_e('In the meantime you can go back to on our', 'kiddies'); ?>
                        <a href="<?php echo esc_url(home_url()); ?>"><span class="highlight"><?php esc_html_e('Homepage', 'kiddies'); ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();

